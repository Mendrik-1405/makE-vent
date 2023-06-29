<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logistique;
class CLogistique extends Controller
{
	public function store(Request $request){
		$request->validate([
			"typesono"=>"required",
			"tarif"=>"required",
		]);
		$logistique = new Logistique;	
		$logistique->typesono = $request->input("typesono");
		$logistique->tarif = $request->input("tarif");
		$logistique->save();
		return redirect("/List_Logistique");
	}

	public function update(Request $request, Logistique $logistique){
		$request->validate([
			"typesono"=>"required",
			"tarif"=>"required",
		]);
		$logistique->typesono = $request->input("typesono");
		$logistique->tarif = $request->input("tarif");
		$logistique->save();
		return redirect("/List_Logistique");
	}
	public function list(Request $request){
		$query = Logistique::query();
		$logistiques = $query->paginate(5);
		$logistiques->appends(request()->query());
		return view("Insert_Logistique",['data0'=>$logistiques]);
	}
	public function destroy(Logistique $logistique){
		$logistique->delete();
		return redirect("/List_Logistique");
	}
}
