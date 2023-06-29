<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evenementautreparam;
use App\Models\Evenement;
use App\Models\Autreparam;
class CEvenementautreparam extends Controller
{
	public function store(Request $request){
		$request->validate([
			"evenementid"=>"required",
			"autreparamid"=>"required",
			"prix"=>"required",
		]);
		$evenementautreparam = new Evenementautreparam;	
		$evenementautreparam->evenementid = $request->input("evenementid");
		$evenementautreparam->autreparamid = $request->input("autreparamid");
		$evenementautreparam->prix = $request->input("prix");
		$evenementautreparam->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}

	public function update(Request $request, Evenementautreparam $evenementautreparam){
		$request->validate([
			"evenementid"=>"required",
			"autreparamid"=>"required",
			"prix"=>"required",
		]);
		$evenementautreparam->evenementid = $request->input("evenementid");
		$evenementautreparam->autreparamid = $request->input("autreparamid");
		$evenementautreparam->prix = $request->input("prix");
		$evenementautreparam->save();
		return redirect("/Evenement/Devis/".$request->input("evenementid"));
	}
	public function list(Request $request){
		$query = Evenementautreparam::query();
		$evenementautreparams = $query->with("evenement")->with("autreparam")->paginate(5);
		$evenementautreparams->appends(request()->query());
		return view("Insert_Evenementautreparam",['data1'=>Evenement::all(),'data2'=>Autreparam::all(),'data0'=>$evenementautreparams]);
	}
	public function destroy(Evenementautreparam $evenementautreparam){
		$eventid=$evenementautreparam->evenementid;
		$evenementautreparam->delete();
		return redirect("/Evenement/Devis/".$eventid);
	}
}
