<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenementsonorisation;
use App\Models\Evenement;
use App\Models\Sonorisation;
class CEvenementsonorisation extends Controller
{
	public function store(Request $request){
		$request->validate([
			"evenementid"=>"required",
			"sonorisationid"=>"required",
			"duree"=>"required",
		]);
		$evenementsonorisation = new Evenementsonorisation;	
		$evenementsonorisation->evenementid = $request->input("evenementid");
		$evenementsonorisation->sonorisationid = $request->input("sonorisationid");
		$evenementsonorisation->duree = $request->input("duree");
		$evenementsonorisation->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}

	public function update(Request $request, Evenementsonorisation $evenementsonorisation){
		$request->validate([
			"evenementid"=>"required",
			"sonorisationid"=>"required",
			"duree"=>"required",
		]);
		$evenementsonorisation->evenementid = $request->input("evenementid");
		$evenementsonorisation->sonorisationid = $request->input("sonorisationid");
		$evenementsonorisation->duree = $request->input("duree");
		$evenementsonorisation->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}
	public function list(Request $request){
		$query = Evenementsonorisation::query();
		$evenementsonorisations = $query->with("evenement")->with("sonorisation")->paginate(5);
		$evenementsonorisations->appends(request()->query());
		return view("Insert_Evenementsonorisation",['data1'=>Evenement::all(),'data2'=>Sonorisation::all(),'data0'=>$evenementsonorisations]);
	}
	public function destroy(Evenementsonorisation $evenementsonorisation){
		$eventid=$evenementsonorisation->evenementid;
		$evenementsonorisation->delete();
		return redirect("/Evenement/Devis/".$eventid);
	}
}
