<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Autreparam;
class CAutreparam extends Controller
{
	public function store(Request $request){
		$request->validate([
			"designation"=>"required",
		]);
		$autreparam = new Autreparam;	
		$autreparam->designation = $request->input("designation");
		$autreparam->save();
		return redirect("/List_Autreparam");
	}

	public function update(Request $request, Autreparam $autreparam){
		$request->validate([
			"designation"=>"required",
		]);
		$autreparam->designation = $request->input("designation");
		$autreparam->save();
		return redirect("/List_Autreparam");
	}
	public function list(Request $request){
		$query = Autreparam::query();
		$autreparams = $query->paginate(5);
		$autreparams->appends(request()->query());
		return view("Insert_Autreparam",['data0'=>$autreparams]);
	}
	public function destroy(Autreparam $autreparam){
		$autreparam->delete();
		return redirect("/List_Autreparam");
	}
}
