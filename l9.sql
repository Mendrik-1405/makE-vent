--
-- PostgreSQL database dump
--

-- Dumped from database version 14.0
-- Dumped by pg_dump version 14.0

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: commission; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.commission (
    id integer NOT NULL,
    totalmin double precision,
    totalmax double precision,
    pourcentage double precision
);


ALTER TABLE public.commission OWNER TO manager;

--
-- Name: commission_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.commission_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.commission_id_seq OWNER TO manager;

--
-- Name: commission_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.commission_id_seq OWNED BY public.commission.id;


--
-- Name: laptop; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.laptop (
    id integer NOT NULL,
    referenceid integer NOT NULL,
    processeurid integer NOT NULL,
    ram double precision DEFAULT 2 NOT NULL,
    dur double precision DEFAULT 256 NOT NULL,
    prix double precision NOT NULL,
    prixvente double precision DEFAULT 0,
    ecran double precision DEFAULT 0
);


ALTER TABLE public.laptop OWNER TO manager;

--
-- Name: laptop_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.laptop_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.laptop_id_seq OWNER TO manager;

--
-- Name: laptop_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.laptop_id_seq OWNED BY public.laptop.id;


--
-- Name: marque; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.marque (
    id integer NOT NULL,
    designation character varying(50) NOT NULL
);


ALTER TABLE public.marque OWNER TO manager;

--
-- Name: marque_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.marque_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.marque_id_seq OWNER TO manager;

--
-- Name: marque_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.marque_id_seq OWNED BY public.marque.id;


--
-- Name: pointdevente; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.pointdevente (
    id integer NOT NULL,
    designation character varying(50) NOT NULL
);


ALTER TABLE public.pointdevente OWNER TO manager;

--
-- Name: pointdevente_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.pointdevente_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.pointdevente_id_seq OWNER TO manager;

--
-- Name: pointdevente_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.pointdevente_id_seq OWNED BY public.pointdevente.id;


--
-- Name: pointdevente_users; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.pointdevente_users (
    pointdeventeid integer NOT NULL,
    usersid integer NOT NULL
);


ALTER TABLE public.pointdevente_users OWNER TO manager;

--
-- Name: processeur; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.processeur (
    id integer NOT NULL,
    designation character varying(50) NOT NULL
);


ALTER TABLE public.processeur OWNER TO manager;

--
-- Name: processeur_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.processeur_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.processeur_id_seq OWNER TO manager;

--
-- Name: processeur_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.processeur_id_seq OWNED BY public.processeur.id;


--
-- Name: reference; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.reference (
    id integer NOT NULL,
    designation character varying(50) NOT NULL,
    marqueid integer NOT NULL
);


ALTER TABLE public.reference OWNER TO manager;

--
-- Name: reference_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.reference_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reference_id_seq OWNER TO manager;

--
-- Name: reference_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.reference_id_seq OWNED BY public.reference.id;


--
-- Name: retour; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.retour (
    id integer NOT NULL,
    transfertid integer,
    pointidreceive integer NOT NULL,
    quantite double precision,
    daty timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.retour OWNER TO manager;

--
-- Name: retour_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.retour_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.retour_id_seq OWNER TO manager;

--
-- Name: retour_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.retour_id_seq OWNED BY public.retour.id;


--
-- Name: stock; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.stock (
    id integer NOT NULL,
    laptopid integer NOT NULL,
    pointidreceive integer NOT NULL,
    quantite double precision,
    daty timestamp without time zone DEFAULT now() NOT NULL,
    typemvt integer
);


ALTER TABLE public.stock OWNER TO manager;

--
-- Name: stock_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.stock_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.stock_id_seq OWNER TO manager;

--
-- Name: stock_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.stock_id_seq OWNED BY public.stock.id;


--
-- Name: transfert; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.transfert (
    id integer NOT NULL,
    laptopid integer NOT NULL,
    pointidsend integer NOT NULL,
    pointidreceive integer NOT NULL,
    quantite double precision,
    daty timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.transfert OWNER TO manager;

--
-- Name: transfert_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.transfert_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.transfert_id_seq OWNER TO manager;

--
-- Name: transfert_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.transfert_id_seq OWNED BY public.transfert.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: manager
--

CREATE TABLE public.users (
    id integer NOT NULL,
    nom character varying(50),
    password character varying(50),
    email character varying(100)
);


ALTER TABLE public.users OWNER TO manager;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: manager
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO manager;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: manager
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: v_achatmois; Type: VIEW; Schema: public; Owner: manager
--

CREATE VIEW public.v_achatmois AS
 SELECT sum(((1)::double precision * stock.quantite)) AS quantite,
    ((EXTRACT(year FROM stock.daty) || '-'::text) || EXTRACT(month FROM stock.daty)) AS mois,
    stock.typemvt,
    sum(stock.quantite) AS nbrachat,
    sum((laptop.prix * stock.quantite)) AS prixtotal
   FROM (public.stock
     JOIN public.laptop ON ((laptop.id = stock.laptopid)))
  WHERE ((stock.typemvt = 0) AND (stock.pointidreceive = 1) AND (stock.quantite > (0)::double precision))
  GROUP BY stock.typemvt, ((EXTRACT(year FROM stock.daty) || '-'::text) || EXTRACT(month FROM stock.daty));


ALTER TABLE public.v_achatmois OWNER TO manager;

--
-- Name: v_perdu; Type: VIEW; Schema: public; Owner: manager
--

CREATE VIEW public.v_perdu AS
 SELECT transfert.id,
    transfert.laptopid,
    transfert.pointidsend,
    transfert.pointidreceive,
    retour.id AS retourid,
    retour.daty AS dtretour,
    (transfert.quantite - retour.quantite) AS perdu
   FROM (public.transfert
     JOIN public.retour ON ((transfert.id = retour.id)));


ALTER TABLE public.v_perdu OWNER TO manager;

--
-- Name: v_pertemois; Type: VIEW; Schema: public; Owner: manager
--

CREATE VIEW public.v_pertemois AS
 SELECT sum(v_perdu.perdu) AS quantite,
    sum((laptop.prix * v_perdu.perdu)) AS prixtotal,
    ((EXTRACT(year FROM v_perdu.dtretour) || '-'::text) || EXTRACT(month FROM v_perdu.dtretour)) AS mois
   FROM (public.v_perdu
     JOIN public.laptop ON ((laptop.id = v_perdu.laptopid)))
  GROUP BY ((EXTRACT(year FROM v_perdu.dtretour) || '-'::text) || EXTRACT(month FROM v_perdu.dtretour));


ALTER TABLE public.v_pertemois OWNER TO manager;

--
-- Name: v_venteglobal; Type: VIEW; Schema: public; Owner: manager
--

CREATE VIEW public.v_venteglobal AS
 SELECT sum((('-1'::integer)::double precision * stock.quantite)) AS quantite,
    ((EXTRACT(year FROM stock.daty) || '-'::text) || EXTRACT(month FROM stock.daty)) AS mois,
    stock.typemvt,
    sum((- stock.quantite)) AS nbrvendu,
    sum((laptop.prix * (- stock.quantite))) AS totalprixachat,
    sum((laptop.prixvente * (- stock.quantite))) AS prixtotal
   FROM (public.stock
     JOIN public.laptop ON ((laptop.id = stock.laptopid)))
  WHERE (stock.typemvt = 5)
  GROUP BY stock.typemvt, ((EXTRACT(year FROM stock.daty) || '-'::text) || EXTRACT(month FROM stock.daty));


ALTER TABLE public.v_venteglobal OWNER TO manager;

--
-- Name: v_benefice; Type: VIEW; Schema: public; Owner: manager
--

CREATE VIEW public.v_benefice AS
 SELECT v_venteglobal.quantite,
    v_venteglobal.mois,
    v_venteglobal.typemvt,
    v_venteglobal.nbrvendu,
    v_pertemois.quantite AS perdu,
    v_venteglobal.prixtotal AS prixvente,
    v_venteglobal.totalprixachat AS prixachat,
    v_pertemois.prixtotal AS pertemois,
    ((v_venteglobal.prixtotal - v_venteglobal.totalprixachat) - v_pertemois.prixtotal) AS totalbenef
   FROM (public.v_venteglobal
     JOIN public.v_pertemois ON ((v_pertemois.mois = v_venteglobal.mois)));


ALTER TABLE public.v_benefice OWNER TO manager;

--
-- Name: v_restestock; Type: VIEW; Schema: public; Owner: manager
--

CREATE VIEW public.v_restestock AS
 SELECT stock.laptopid,
    stock.pointidreceive,
    sum(stock.quantite) AS reste
   FROM public.stock
  GROUP BY stock.laptopid, stock.pointidreceive;


ALTER TABLE public.v_restestock OWNER TO manager;

--
-- Name: v_userspoint; Type: VIEW; Schema: public; Owner: manager
--

CREATE VIEW public.v_userspoint AS
 SELECT users.id,
    users.nom,
    users.password,
    pointdevente.id AS pointdeventeid,
    COALESCE(pointdevente.designation, 'AUCUN'::character varying) AS pointdevente
   FROM ((public.users
     LEFT JOIN public.pointdevente_users ON ((pointdevente_users.usersid = users.id)))
     LEFT JOIN public.pointdevente ON ((pointdevente.id = pointdevente_users.pointdeventeid)));


ALTER TABLE public.v_userspoint OWNER TO manager;

--
-- Name: v_ventepoint; Type: VIEW; Schema: public; Owner: manager
--

CREATE VIEW public.v_ventepoint AS
 SELECT stock.pointidreceive,
    ((EXTRACT(year FROM stock.daty) || '-'::text) || EXTRACT(month FROM stock.daty)) AS mois,
    stock.typemvt,
    sum((- stock.quantite)) AS nbrvendu,
    sum((laptop.prixvente * (- stock.quantite))) AS prixtotal
   FROM (public.stock
     JOIN public.laptop ON ((laptop.id = stock.laptopid)))
  WHERE (stock.typemvt = 5)
  GROUP BY stock.typemvt, ((EXTRACT(year FROM stock.daty) || '-'::text) || EXTRACT(month FROM stock.daty)), stock.pointidreceive;


ALTER TABLE public.v_ventepoint OWNER TO manager;

--
-- Name: commission id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.commission ALTER COLUMN id SET DEFAULT nextval('public.commission_id_seq'::regclass);


--
-- Name: laptop id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.laptop ALTER COLUMN id SET DEFAULT nextval('public.laptop_id_seq'::regclass);


--
-- Name: marque id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.marque ALTER COLUMN id SET DEFAULT nextval('public.marque_id_seq'::regclass);


--
-- Name: pointdevente id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.pointdevente ALTER COLUMN id SET DEFAULT nextval('public.pointdevente_id_seq'::regclass);


--
-- Name: processeur id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.processeur ALTER COLUMN id SET DEFAULT nextval('public.processeur_id_seq'::regclass);


--
-- Name: reference id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.reference ALTER COLUMN id SET DEFAULT nextval('public.reference_id_seq'::regclass);


--
-- Name: retour id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.retour ALTER COLUMN id SET DEFAULT nextval('public.retour_id_seq'::regclass);


--
-- Name: stock id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.stock ALTER COLUMN id SET DEFAULT nextval('public.stock_id_seq'::regclass);


--
-- Name: transfert id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.transfert ALTER COLUMN id SET DEFAULT nextval('public.transfert_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: commission; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.commission (id, totalmin, totalmax, pourcentage) FROM stdin;
1	0	2000000	3
2	2000001	5000000	8
3	5000001	300000000	15
\.


--
-- Data for Name: laptop; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.laptop (id, referenceid, processeurid, ram, dur, prix, prixvente, ecran) FROM stdin;
1	2	5	8	256	3850000	4000000	0
2	5	1	16	512	3000000	3000000	0
3	4	1	8	256	2000000	2500000	0
\.


--
-- Data for Name: marque; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.marque (id, designation) FROM stdin;
1	ASUS
2	Lenovo
3	HP
\.


--
-- Data for Name: pointdevente; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.pointdevente (id, designation) FROM stdin;
1	Alasora
2	analakely
\.


--
-- Data for Name: pointdevente_users; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.pointdevente_users (pointdeventeid, usersid) FROM stdin;
2	2
1	1
\.


--
-- Data for Name: processeur; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.processeur (id, designation) FROM stdin;
4	i5 4th
3	i3 5th
2	i7 5th
1	i5 5th
5	i5 10th
\.


--
-- Data for Name: reference; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.reference (id, designation, marqueid) FROM stdin;
2	Tuf-dash-F15	1
4	thinkpad-LP470	2
5	thinkpad-Gaming	2
\.


--
-- Data for Name: retour; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.retour (id, transfertid, pointidreceive, quantite, daty) FROM stdin;
1	1	2	4	2023-05-18 23:22:44.798764
2	2	2	3	2023-05-22 10:05:33.303704
\.


--
-- Data for Name: stock; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.stock (id, laptopid, pointidreceive, quantite, daty, typemvt) FROM stdin;
1	1	1	10	2023-05-18 18:19:05.467601	0
2	3	1	5	2023-05-18 18:31:43.38643	0
3	1	1	-3	2023-05-18 18:46:50.02929	0
4	1	1	13	2023-05-18 20:59:36.068468	0
5	1	1	-5	2023-05-18 22:01:32.04725	0
7	1	2	-1	2023-05-19 00:08:02.905677	5
8	1	2	-2	2023-05-19 05:07:09.005393	5
6	1	2	4	2023-05-18 23:22:44.798764	0
9	1	1	-3	2023-05-22 09:54:06.762523	0
10	2	2	3	2023-05-22 10:05:33.303704	0
\.


--
-- Data for Name: transfert; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.transfert (id, laptopid, pointidsend, pointidreceive, quantite, daty) FROM stdin;
1	1	1	2	5	2023-05-18 22:01:32.04725
2	1	1	2	3	2023-05-22 09:54:06.762523
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: manager
--

COPY public.users (id, nom, password, email) FROM stdin;
1	manager	root	manager@gmail.com
2	user1	user1	user1@user1.com
\.


--
-- Name: commission_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.commission_id_seq', 3, true);


--
-- Name: laptop_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.laptop_id_seq', 3, true);


--
-- Name: marque_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.marque_id_seq', 3, true);


--
-- Name: pointdevente_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.pointdevente_id_seq', 2, true);


--
-- Name: processeur_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.processeur_id_seq', 5, true);


--
-- Name: reference_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.reference_id_seq', 5, true);


--
-- Name: retour_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.retour_id_seq', 2, true);


--
-- Name: stock_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.stock_id_seq', 10, true);


--
-- Name: transfert_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.transfert_id_seq', 2, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: manager
--

SELECT pg_catalog.setval('public.users_id_seq', 2, true);


--
-- Name: commission commission_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.commission
    ADD CONSTRAINT commission_pkey PRIMARY KEY (id);


--
-- Name: laptop laptop_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.laptop
    ADD CONSTRAINT laptop_pkey PRIMARY KEY (id);


--
-- Name: marque marque_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.marque
    ADD CONSTRAINT marque_pkey PRIMARY KEY (id);


--
-- Name: pointdevente pointdevente_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.pointdevente
    ADD CONSTRAINT pointdevente_pkey PRIMARY KEY (id);


--
-- Name: pointdevente_users pointdevente_users_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.pointdevente_users
    ADD CONSTRAINT pointdevente_users_pkey PRIMARY KEY (pointdeventeid, usersid);


--
-- Name: processeur processeur_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.processeur
    ADD CONSTRAINT processeur_pkey PRIMARY KEY (id);


--
-- Name: reference reference_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.reference
    ADD CONSTRAINT reference_pkey PRIMARY KEY (id);


--
-- Name: retour retour_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.retour
    ADD CONSTRAINT retour_pkey PRIMARY KEY (id);


--
-- Name: stock stock_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.stock
    ADD CONSTRAINT stock_pkey PRIMARY KEY (id);


--
-- Name: transfert transfert_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.transfert
    ADD CONSTRAINT transfert_pkey PRIMARY KEY (id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: laptop fklaptop172181; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.laptop
    ADD CONSTRAINT fklaptop172181 FOREIGN KEY (processeurid) REFERENCES public.processeur(id);


--
-- Name: laptop fklaptop350557; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.laptop
    ADD CONSTRAINT fklaptop350557 FOREIGN KEY (referenceid) REFERENCES public.reference(id);


--
-- Name: pointdevente_users fkpointdeven749742; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.pointdevente_users
    ADD CONSTRAINT fkpointdeven749742 FOREIGN KEY (usersid) REFERENCES public.users(id);


--
-- Name: pointdevente_users fkpointdeven913662; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.pointdevente_users
    ADD CONSTRAINT fkpointdeven913662 FOREIGN KEY (pointdeventeid) REFERENCES public.pointdevente(id);


--
-- Name: reference fkreference477330; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.reference
    ADD CONSTRAINT fkreference477330 FOREIGN KEY (marqueid) REFERENCES public.marque(id);


--
-- Name: retour retour_pointidreceive_fkey; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.retour
    ADD CONSTRAINT retour_pointidreceive_fkey FOREIGN KEY (pointidreceive) REFERENCES public.pointdevente(id);


--
-- Name: retour retour_transfertid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.retour
    ADD CONSTRAINT retour_transfertid_fkey FOREIGN KEY (transfertid) REFERENCES public.transfert(id);


--
-- Name: stock stock_laptopid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.stock
    ADD CONSTRAINT stock_laptopid_fkey FOREIGN KEY (laptopid) REFERENCES public.laptop(id);


--
-- Name: stock stock_pointidreceive_fkey; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.stock
    ADD CONSTRAINT stock_pointidreceive_fkey FOREIGN KEY (pointidreceive) REFERENCES public.pointdevente(id);


--
-- Name: transfert transfert_laptopid_fkey; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.transfert
    ADD CONSTRAINT transfert_laptopid_fkey FOREIGN KEY (laptopid) REFERENCES public.laptop(id);


--
-- Name: transfert transfert_pointidreceive_fkey; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.transfert
    ADD CONSTRAINT transfert_pointidreceive_fkey FOREIGN KEY (pointidreceive) REFERENCES public.pointdevente(id);


--
-- Name: transfert transfert_pointidsend_fkey; Type: FK CONSTRAINT; Schema: public; Owner: manager
--

ALTER TABLE ONLY public.transfert
    ADD CONSTRAINT transfert_pointidsend_fkey FOREIGN KEY (pointidsend) REFERENCES public.pointdevente(id);


--
-- PostgreSQL database dump complete
--

