<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenementlieu;
use App\Models\Evenement;
use App\Models\Lieu;
class CEvenementlieu extends Controller
{
	public function store(Request $request){
		$request->validate([
			"evenementid"=>"required",
			"lieuid"=>"required",
			"prix"=>"required",
		]);
		$evenementlieu = new Evenementlieu;	
		$evenementlieu->evenementid = $request->input("evenementid");
		$evenementlieu->lieuid = $request->input("lieuid");
		$evenementlieu->prix = $request->input("prix");
		$evenementlieu->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}

	public function update(Request $request, Evenementlieu $evenementlieu){
		$request->validate([
			"evenementid"=>"required",
			"lieuid"=>"required",
			"prix"=>"required",
		]);
		$evenementlieu->evenementid = $request->input("evenementid");
		$evenementlieu->lieuid = $request->input("lieuid");
		$evenementlieu->prix = $request->input("prix");
		$evenementlieu->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}
	public function list(Request $request){
		$query = Evenementlieu::query();
		$evenementlieus = $query->with("evenement")->with("lieu")->paginate(5);
		$evenementlieus->appends(request()->query());
		return view("Insert_Evenementlieu",['data1'=>Evenement::all(),'data2'=>Lieu::all(),'data0'=>$evenementlieus]);
	}
	public function destroy(Evenementlieu $evenementlieu){
		$eventid=$evenementlieu->evenementid;
		$evenementlieu->delete();
		return redirect("/Evenement/Devis/".$eventid);
	}
}
