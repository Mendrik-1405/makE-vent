create database laravel9;
alter database laravel9 owner to manager;


\c laravel9 manager
root

;

create table users (
  id       serial not null,
  email varchar(60),
  nom      varchar(50), 
  password varchar(50), 
  grade int,
  primary key (id));

create table artiste(
  id serial primary key,
  nom varchar(50),
  tarif double precision,
  photo text
);

create table sonorisation(
  id serial primary key,
  typesono varchar(50),
  tarif double precision
);

create table logistique(
  id serial primary key,
  typesono varchar(50),
  tarif double precision
);

create table lieu(
  id serial primary key,
  designation varchar(50),
  nbrplace double precision
);

create table autreparam(
  id serial primary key,
  designation varchar(50)
);

create table evenement(
  id serial primary key,
  designation varchar(50),
  datedebut timestamp,
  datefin timestamp,
  etat int --0 devis 1 organise
);

create table evenementartiste(
  id serial primary key,
  evenementid int,
  artisteid int,
  duree double precision,
  FOREIGN KEY (evenementid) references evenement(id),
  FOREIGN KEY (artisteid) references artiste(id)
);

create table evenementsonorisation(
  id serial primary key,
  evenementid int,
  sonorisationid int,
  duree double precision,
  FOREIGN KEY (evenementid) references evenement(id),
  FOREIGN KEY (sonorisationid) references sonorisation(id)
);

create table evenementlogistique(
  id serial primary key,
  evenementid int,
  logistiqueid int,
  duree double precision,
  FOREIGN KEY (evenementid) references evenement(id),
  FOREIGN KEY (logistiqueid) references logistique(id)
);

create table evenementlieu(
  id serial primary key,
  evenementid int,
  lieuid int,
  prix double precision,
  FOREIGN KEY (evenementid) references evenement(id),
  FOREIGN KEY (lieuid) references lieu(id)
);

create table evenementautreparam(
  id serial primary key,
  evenementid int,
  autreparamid int,
  prix double precision,
  FOREIGN KEY (evenementid) references evenement(id),
  FOREIGN KEY (autreparamid) references autreparam(id)
);

create table placelieu(
  id serial primary key,
  lieuid int unique,
  vip int default 0,
  reserve int default 0,
  normal int default 0,
  FOREIGN KEY (lieuid) references lieu(id)
);

create table prixplaceevenement(
  id serial primary key,
  evenementid int unique,
  prixvip double precision default 0,
  prixreserve double precision default 0,
  prixnormal double precision default 0,
  FOREIGN KEY (evenementid) references evenement(id)
);

create table taxe(
  id serial primary key,
  pourcentage double precision default 0
);


create table placevendu(
  id serial primary key,
  evenementid int unique,
  vip int default 0,
  reserve int default 0,
  normal int default 0,
  FOREIGN KEY (evenementid) references evenement(id)
);

create or replace view totalartiste as(
select
  evenement.id as id,
  evenement.designation as designation,
  evenement.datedebut as datedebut,
  evenement.datefin as datefin,
  sum(artiste.tarif*evenementartiste.duree) as totalartiste
  from evenement
  left join evenementartiste on evenement.id=evenementartiste.evenementid
  left join artiste on artiste.id=evenementartiste.artisteid
  group by evenement.id
);

create or replace view totalsonorisation as(
select
  evenement.id as id,
  evenement.designation as designation,
  evenement.datedebut as datedebut,
  evenement.datefin as datefin,
  sum(sonorisation.tarif*coalesce(evenementsonorisation.duree,0)) as totalsonorisation
  from evenement
  left join evenementsonorisation on evenement.id=evenementsonorisation.evenementid
  left join sonorisation on sonorisation.id=evenementsonorisation.sonorisationid
  group by evenement.id
);

create or replace view totallogistique as(
select
  evenement.id as id,
  evenement.designation as designation,
  evenement.datedebut as datedebut,
  evenement.datefin as datefin,
  sum(logistique.tarif*coalesce(evenementlogistique.duree,0)) as totallogistique
  from evenement
  left join evenementlogistique on evenement.id=evenementlogistique.evenementid
  left join logistique on logistique.id=evenementlogistique.logistiqueid
  group by evenement.id
);

create or replace view totallieu as(
select
  evenement.id as id,
  evenement.designation as designation,
  evenement.datedebut as datedebut,
  evenement.datefin as datefin,
  sum(coalesce(evenementlieu.prix,0)) as totallieu
  from evenement
  left join evenementlieu on evenement.id=evenementlieu.evenementid
  left join lieu on lieu.id=evenementlieu.lieuid
  group by evenement.id
);

create or replace view totalautreparam as(
select
  evenement.id as id,
  evenement.designation as designation,
  evenement.datedebut as datedebut,
  evenement.datefin as datefin,
  sum(coalesce(evenementautreparam.prix,0)) as totalautreparam
  from evenement
  left join evenementautreparam on evenement.id=evenementautreparam.evenementid
  left join autreparam on autreparam.id=evenementautreparam.autreparamid
  group by evenement.id
);

create or replace view depense as(
select
totalartiste.id,
totalartiste.designation,
totalartiste.datedebut,
totalartiste.datefin,
totalartiste.totalartiste,
totalsonorisation.totalsonorisation,
totallogistique.totallogistique,
totallieu.totallieu,
totalautreparam.totalautreparam,
totalartiste.totalartiste+totalsonorisation.totalsonorisation+totallogistique.totallogistique+totallieu.totallieu+totalautreparam.totalautreparam as total
from totalartiste
join totalsonorisation on totalartiste.id=totalsonorisation.id
join totallogistique on totalartiste.id=totallogistique.id
join totallieu on totalartiste.id=totallieu.id
join totalautreparam on totalartiste.id=totalautreparam.id);


create or replace view recette as(
select
evenement.id as id,
lieu.designation as lieudesignation,
coalesce(placelieu.vip,0) as nbrvip,
coalesce(prixplaceevenement.prixvip,0) as prixvip,
coalesce(placelieu.reserve,0) as nbrreserve,
coalesce(prixplaceevenement.prixreserve,0) as prixreserve,
coalesce(placelieu.normal,0) as nbrnormal,
coalesce(prixplaceevenement.prixnormal,0) as prixnormal,
coalesce(placelieu.vip,0)*coalesce(prixplaceevenement.prixvip,0)
+coalesce(placelieu.reserve,0)*coalesce(prixplaceevenement.prixreserve,0)
+coalesce(placelieu.normal,0)*coalesce(prixplaceevenement.prixnormal,0) as total
from evenement
left join evenementlieu on evenement.id=evenementlieu.evenementid
left join lieu on lieu.id=evenementlieu.lieuid
left join placelieu on lieu.id=placelieu.lieuid
left join prixplaceevenement on lieu.id=evenementlieu.lieuid
);

create view benefice as(
select
recette.id,
nbrvip,
nbrnormal,
nbrreserve,
recette.total as recette,
depense.total as depense,
recette.total-depense.total as benefice
from recette
join depense on recette.id=depense.id);


create or replace view recettereel as(
select
evenement.id as id,
lieu.designation as lieudesignation,
coalesce(placevendu.vip,0) as nbrvip,
coalesce(prixplaceevenement.prixvip,0) as prixvip,
coalesce(placevendu.reserve,0) as nbrreserve,
coalesce(prixplaceevenement.prixreserve,0) as prixreserve,
coalesce(placevendu.normal,0) as nbrnormal,
coalesce(prixplaceevenement.prixnormal,0) as prixnormal,
coalesce(placevendu.vip,0)*coalesce(prixplaceevenement.prixvip,0)
+coalesce(placevendu.reserve,0)*coalesce(prixplaceevenement.prixreserve,0)
+coalesce(placevendu.normal,0)*coalesce(prixplaceevenement.prixnormal,0) as total
from evenement
left join evenementlieu on evenement.id=evenementlieu.evenementid
left join lieu on lieu.id=evenementlieu.lieuid
left join placevendu on evenement.id=placevendu.evenementid
left join prixplaceevenement on lieu.id=evenementlieu.lieuid
);

create view beneficereel as(
select
recettereel.id,
nbrvip,
nbrnormal,
nbrreserve,
recettereel.total as recette,
depense.total as depense,
recettereel.total-depense.total as beneficebrut,
taxe.pourcentage as pourcentagetaxe,
(recettereel.total-depense.total)*taxe.pourcentage/100 as taxe,
(recettereel.total-depense.total)-(recettereel.total-depense.total)*taxe.pourcentage/100 as beneficenet
from recettereel
join depense on recettereel.id=depense.id
cross join taxe
);