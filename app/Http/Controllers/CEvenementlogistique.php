<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenementlogistique;
use App\Models\Evenement;
use App\Models\Logistique;
class CEvenementlogistique extends Controller
{
	public function store(Request $request){
		$request->validate([
			"evenementid"=>"required",
			"logistiqueid"=>"required",
			"duree"=>"required",
		]);
		$evenementlogistique = new Evenementlogistique;	
		$evenementlogistique->evenementid = $request->input("evenementid");
		$evenementlogistique->logistiqueid = $request->input("logistiqueid");
		$evenementlogistique->duree = $request->input("duree");
		$evenementlogistique->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}

	public function update(Request $request, Evenementlogistique $evenementlogistique){
		$request->validate([
			"evenementid"=>"required",
			"logistiqueid"=>"required",
			"duree"=>"required",
		]);
		$evenementlogistique->evenementid = $request->input("evenementid");
		$evenementlogistique->logistiqueid = $request->input("logistiqueid");
		$evenementlogistique->duree = $request->input("duree");
		$evenementlogistique->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}
	public function list(Request $request){
		$query = Evenementlogistique::query();
		$evenementlogistiques = $query->with("evenement")->with("logistique")->paginate(5);
		$evenementlogistiques->appends(request()->query());
		return view("Insert_Evenementlogistique",['data1'=>Evenement::all(),'data2'=>Logistique::all(),'data0'=>$evenementlogistiques]);
	}
	public function destroy(Request $request,Evenementlogistique $evenementlogistique){
		$eventid=$evenementlogistique->evenementid;
		$evenementlogistique->delete();
		return redirect("/Evenement/Devis/".$eventid);
	}
}
