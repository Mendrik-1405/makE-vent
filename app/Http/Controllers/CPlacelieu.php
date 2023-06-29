<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Placelieu;
use App\Models\Lieu;
class CPlacelieu extends Controller
{
	public function store(Request $request){
		$request->validate([
			"lieuid"=>"required",
			"vip"=>"required",
			"reserve"=>"required",
			"normal"=>"required",
		]);
		$placelieu =new Placelieu;
		$dt = Placelieu::where('lieuid','=',$request->input("lieuid"))->get();
		foreach($dt as $d){
			$placelieu=$d;
		}
		$placelieu->lieuid = $request->input("lieuid");
		$placelieu->vip = $request->input("vip");
		$placelieu->reserve = $request->input("reserve");
		$placelieu->normal = $request->input("normal");
		$placelieu->save();
		return redirect("/List_Placelieu/".$request->input("lieuid"));
	}

	public function update(Request $request, Placelieu $placelieu){
		$request->validate([
			"lieuid"=>"required",
			"vip"=>"required",
			"reserve"=>"required",
			"normal"=>"required",
		]);
		$placelieu->lieuid = $request->input("lieuid");
		$placelieu->vip = $request->input("vip");
		$placelieu->reserve = $request->input("reserve");
		$placelieu->normal = $request->input("normal");
		$placelieu->save();
		return redirect("/List_Placelieu/".$request->input("lieuid"));
	}
	public function list(Request $request){
		$query = Placelieu::query();
		$placelieus = $query->where('lieuid','=',request('lieuid'))->with("lieu")->paginate(5);
		$placelieus->appends(request()->query());
		return view("Insert_Placelieu",['data1'=>Lieu::all(),'data0'=>$placelieus]);
	}
	public function destroy(Placelieu $placelieu){
		$eventid=$placelieu->lieuid;
		$placelieu->delete();
		return redirect("/List_Placelieu/".$eventid);
	}
}
