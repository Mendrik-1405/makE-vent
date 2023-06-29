<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Models\Prixplaceevenement;
use Illuminate\Support\Facades\DB;

class CPrixplaceevenement extends Controller
{
	public function store(Request $request){
		$request->validate([
			"evenementid"=>"required",
			"prixvip"=>"required",
			"prixreserve"=>"required",
			"prixnormal"=>"required",
		]);
		$prixplaceevenement = new Prixplaceevenement;
		$dt = Prixplaceevenement::where('evenementid','=',$request->input("evenementid"))->get();
		foreach($dt as $d){
			$prixplaceevenement=$d;
		}
		$prixplaceevenement->evenementid = $request->input("evenementid");
		$prixplaceevenement->prixvip = $request->input("prixvip");
		$prixplaceevenement->prixreserve = $request->input("prixreserve");
		$prixplaceevenement->prixnormal = $request->input("prixnormal");
		$prixplaceevenement->save();
		return redirect("/List_Prixplaceevenement/".$request->input("evenementid"));
	}

	public function update(Request $request, Prixplaceevenement $prixplaceevenement){
		$request->validate([
			"evenementid"=>"required",
			"prixvip"=>"required",
			"prixreserve"=>"required",
			"prixnormal"=>"required",
		]);
		$prixplaceevenement->evenementid = $request->input("evenementid");
		$prixplaceevenement->prixvip = $request->input("prixvip");
		$prixplaceevenement->prixreserve = $request->input("prixreserve");
		$prixplaceevenement->prixnormal = $request->input("prixnormal");
		$prixplaceevenement->save();
		return redirect("/List_Prixplaceevenement/".$request->input("evenementid"));
	}
	public function list(Request $request){
		$query = Prixplaceevenement::query();
		$prixplaceevenements = $query->where('evenementid','=',request('eventid'))->with("evenement")->paginate(5);
		$benef = DB::table('benefice')->where('id','=',request('eventid'))->get();
		$prixplaceevenements->appends(request()->query());
		return view("Insert_Prixplaceevenement",['data2'=>$benef,'data1'=>Evenement::all(),'data0'=>$prixplaceevenements]);
	}
	public function destroy(Prixplaceevenement $prixplaceevenement){
		$eventid=$prixplaceevenement->evenementid;
		$prixplaceevenement->delete();
		return redirect("/List_Prixplaceevenement/".$eventid);
	}
}
