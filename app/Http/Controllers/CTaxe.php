<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Taxe;
class CTaxe extends Controller
{
	public function store(Request $request){
		$request->validate([
			"pourcentage"=>"required",
		]);
		$taxe = new Taxe;	
		$taxe->pourcentage = $request->input("pourcentage");
		$taxe->save();
		return redirect("/List_Taxe");
	}

	public function update(Request $request, Taxe $taxe){
		$request->validate([
			"pourcentage"=>"required",
		]);
		$taxe->pourcentage = $request->input("pourcentage");
		$taxe->save();
		return redirect("/List_Taxe");
	}
	public function list(Request $request){
		$query = Taxe::query();
		$taxes = $query->paginate(5);
		$taxes->appends(request()->query());
		return view("Insert_Taxe",['data0'=>$taxes]);
	}
	public function destroy(Taxe $taxe){
		$taxe->delete();
		return redirect("/List_Taxe");
	}
}
