<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sonorisation;
class CSonorisation extends Controller
{
	public function store(Request $request){
		$request->validate([
			"typesono"=>"required",
			"tarif"=>"required",
		]);
		$sonorisation = new Sonorisation;	
		$sonorisation->typesono = $request->input("typesono");
		$sonorisation->tarif = $request->input("tarif");
		$sonorisation->save();
		return redirect("/List_Sonorisation");
	}

	public function update(Request $request, Sonorisation $sonorisation){
		$request->validate([
			"typesono"=>"required",
			"tarif"=>"required",
		]);
		$sonorisation->typesono = $request->input("typesono");
		$sonorisation->tarif = $request->input("tarif");
		$sonorisation->save();
		return redirect("/List_Sonorisation");
	}
	public function list(Request $request){
		$query = Sonorisation::query();
		$sonorisations = $query->paginate(5);
		$sonorisations->appends(request()->query());
		return view("Insert_Sonorisation",['data0'=>$sonorisations]);
	}
	public function destroy(Sonorisation $sonorisation){
		$sonorisation->delete();
		return redirect("/List_Sonorisation");
	}
}
