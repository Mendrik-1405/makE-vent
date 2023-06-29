<?php

namespace App\Http\Controllers;

use App\Models\Lieu;
use App\Models\Artiste;
use App\Models\Evenement;
use App\Models\Autreparam;
use App\Models\Logistique;
use App\Models\Sonorisation;
use Illuminate\Http\Request;
use App\Models\Evenementlieu;
use App\Models\Evenementartiste;
use Illuminate\Support\Facades\DB;
use App\Models\Evenementautreparam;
use App\Models\Evenementlogistique;
use App\Models\Evenementsonorisation;

class CEvenement extends Controller
{
	public function store(Request $request){
		$request->validate([
			"designation"=>"required",
			"datedebut"=>"required",
			"datefin"=>"required"
		]);
		$evenement = new Evenement;	
		$evenement->designation = $request->input("designation");
		$evenement->datedebut = date_create_from_format('Y-m-d\TH:i',$request->input("datedebut"));
		$evenement->datefin = date_create_from_format('Y-m-d\TH:i',$request->input("datefin"));
		$evenement->etat = 0;
		$evenement->save();
		return redirect("/List_Evenement");
	}

	public function update(Request $request, Evenement $evenement){
		$request->validate([
			"designation"=>"required",
			"datedebut"=>"required",
			"datefin"=>"required",
			"etat"=>"required",
		]);
		$evenement->designation = $request->input("designation");
		$evenement->datedebut =date_create_from_format('Y-m-d\TH:i',$request->input("datedebut"));
		$evenement->datefin = date_create_from_format('Y-m-d\TH:i',$request->input("datefin"));
		$evenement->etat = $request->input("etat");
		$evenement->save();
		return redirect("/List_Evenement");
	}
	public function list(Request $request){
		$query = Evenement::query();
		$evenements = $query->get();
		// $evenements->appends(request()->query());
		return view("Insert_Evenement",['data0'=>$evenements]);
	}
	public function destroy(Evenement $evenement){
		$evenement->delete();
		return redirect("/List_Evenement");
	}

	public function Form_Devis(Request $request){
		$data=array(			
			'Artiste' => Artiste::all(),
			'Lieu' => Lieu::all(),
			'Sonorisation' => Sonorisation::all(),
			'Logistique' => Logistique::all(),
			'Autreparam' => Autreparam::all()
		);
		$listdata=array(
			'Etotal' =>	DB::table('depense')->where('id','=',request('eventid'))->get(),
			'Eartiste' => Evenementartiste::query()->where('evenementid','=',request('eventid'))->with("evenement")->with("artiste")->get(),
			'Elieu' => Evenementlieu::query()->where('evenementid','=',request('eventid'))->with("evenement")->with("lieu")->get(),
			'Esonorisation' => Evenementsonorisation::query()->where('evenementid','=',request('eventid'))->with("evenement")->with("sonorisation")->get(),
			'Elogistique' => Evenementlogistique::query()->where('evenementid','=',request('eventid'))->with("evenement")->with("logistique")->get(),
			'Eautreparam' => Evenementautreparam::query()->where('evenementid','=',request('eventid'))->with("evenement")->with("autreparam")->get()
		);
		return view("Insert_Devis",['data'=>$data,'listdata'=>$listdata]);
	}
	public function piechart(Request $request){
		$data=DB::table('depense')->where('id','=',request('evenementid'))->get();
		return view("List_Pie",['data'=>$data]);
	}
	public function Insert_Bis(Request $request){
		$devenement=json_decode(json_encode(DB::table('evenement')->where('id','=',request('evenementid'))->get()), true);
			foreach($devenement as $d){
		$evenement2 = new Evenement;	
		$evenement2->designation = $d['designation'].'-bis';
		$evenement2->datedebut = date_create_from_format('Y-m-d\TH:i',$request->input("datedebut"));
		$evenement2->datefin = $d['datefin'];
		$evenement2->etat = 0;
		}
		$evenement2->save();
		$devenement2=json_decode(json_encode(DB::table('evenement')->where('designation','=',$evenement2->designation)->where('datedebut','=',$evenement2->datedebut)->get()), true);
		$devenementartiste=json_decode(json_encode(DB::table('evenementartiste')->where('evenementid','=',request('evenementid'))->get()), true);
		// dump($devenementartiste);
		foreach($devenementartiste as $d){
			$evenementartiste2 = new Evenementartiste;	
			$evenementartiste2->evenementid = $devenement2[0]['id'];
			$evenementartiste2->artisteid =$d['artisteid'];
			$evenementartiste2->duree = $d['duree'];
			$evenementartiste2->save();
		}
		$devenementautreparam1=json_decode(json_encode(DB::table('evenementautreparam')->where('evenementid','=',request('evenementid'))->get()), true);
		foreach($devenementautreparam1 as $d){
		$evenementautreparam = new Evenementautreparam;	
		$evenementautreparam->evenementid = $devenement2[0]['id'];
		$evenementautreparam->autreparamid =$d['autreparamid'];
		$evenementautreparam->prix = $d['prix'];
		$evenementautreparam->save();
		}
		$devenementlieu1=json_decode(json_encode(DB::table('evenementlieu')->where('evenementid','=',request('evenementid'))->get()), true);
		foreach($devenementlieu1 as $d){
		$evenementlieu = new Evenementlieu;	
		$evenementlieu->evenementid = $devenement2[0]['id'];
		$evenementlieu->lieuid =$d['lieuid'];
		$evenementlieu->prix = $d['prix'];
		$evenementlieu->save();
		}
		$devenementlogistique1=json_decode(json_encode(DB::table('evenementlogistique')->where('evenementid','=',request('evenementid'))->get()), true);
		foreach($devenementlogistique1 as $d){
		$evenementlogistique = new Evenementlogistique;	
		$evenementlogistique->evenementid = $devenement2[0]['id'];
		$evenementlogistique->logistiqueid =$d['logistiqueid'];
		$evenementlogistique->duree = $d['duree'];
		$evenementlogistique->save();
		}
		$devenementsonorisation1=json_decode(json_encode(DB::table('evenementsonorisation')->where('evenementid','=',request('evenementid'))->get()), true);
		foreach($devenementsonorisation1 as $d){
		$evenementsonorisation = new Evenementsonorisation;	
		$evenementsonorisation->evenementid = $devenement2[0]['id'];
		$evenementsonorisation->sonorisationid =$d['sonorisationid'];
		$evenementsonorisation->duree = $d['duree'];
		$evenementsonorisation->save();
		}
		return redirect("/List_Evenement");
	
		// dump($devenement2[0]['id']);
	}
}
