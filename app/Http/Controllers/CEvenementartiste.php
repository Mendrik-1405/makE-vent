<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenementartiste;
use App\Models\Evenement;
use App\Models\Artiste;
class CEvenementartiste extends Controller
{
	public function store(Request $request){
		$request->validate([
			"evenementid"=>"required",
			"artisteid"=>"required",
			"duree"=>"required",
		]);
		$evenementartiste = new Evenementartiste;	
		$evenementartiste->evenementid = $request->input("evenementid");
		$evenementartiste->artisteid = $request->input("artisteid");
		$evenementartiste->duree = $request->input("duree");
		$evenementartiste->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}

	public function update(Request $request, Evenementartiste $evenementartiste){
		$request->validate([
			"evenementid"=>"required",
			"artisteid"=>"required",
			"duree"=>"required",
		]);
		$evenementartiste->evenementid = $request->input("evenementid");
		$evenementartiste->artisteid = $request->input("artisteid");
		$evenementartiste->duree = $request->input("duree");
		$evenementartiste->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}
	public function list(Request $request){
		$query = Evenementartiste::query();
		$evenementartistes = $query->with("evenement")->with("artiste")->paginate(5);
		$evenementartistes->appends(request()->query());
		return view("Insert_Evenementartiste",['data1'=>Evenement::all(),'data2'=>Artiste::all(),'data0'=>$evenementartistes]);
	}
	public function destroy(Request $request,Evenementartiste $Evenementartisteid){
		$eventid=$Evenementartisteid->evenementid;
		$Evenementartisteid->delete();
		return redirect("/Evenement/Devis/".$eventid);
	}
}
