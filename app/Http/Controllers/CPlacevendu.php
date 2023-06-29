<?php

namespace App\Http\Controllers;

use App\Models\Evenement;
use App\Models\Placevendu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CPlacevendu extends Controller
{
	public function store(Request $request){
		$request->validate([
			"evenementid"=>"required",
			"vip"=>"required",
			"reserve"=>"required",
			"normal"=>"required",
		]);
	
		$data = json_decode(json_encode(DB::table('v_place')->where('evenementid','=',request('evenementid'))->get()), true);
		foreach($data as $d){
			if ($d['vip']<$request->input("vip")) {
				return redirect("/List_Placevendu/".$request->input("evenementid"))->withErrors([ 'error'=>'check vip']);
			}
			if ($d['reserve']<$request->input("reserve")) {
				return redirect("/List_Placevendu/".$request->input("evenementid"))->withErrors([ 'error'=>'check reserve']);
			}
			if ($d['normal']<$request->input("normal")) {
				return redirect("/List_Placevendu/".$request->input("evenementid"))->withErrors([ 'error'=>'check normal']);
			}
		}
		$placevendu =new Placevendu;
		$dt = Placevendu::where('evenementid','=',$request->input("evenementid"))->get();
		foreach($dt as $d){
			$placevendu=$d;
		}
		// dump($dt);
		$placevendu->evenementid = $request->input("evenementid");
		$placevendu->vip = $request->input("vip");
		$placevendu->reserve = $request->input("reserve");
		$placevendu->normal = $request->input("normal");
		$placevendu->save();
		return redirect("/List_Placevendu/".$request->input("evenementid"));
	}	

	public function update(Request $request, Placevendu $placevendu){
		$request->validate([
			"evenementid"=>"required",
			"vip"=>"required",
			"reserve"=>"required",
			"normal"=>"required",
		]);
		$placevendu->evenementid = $request->input("evenementid");
		$placevendu->vip = $request->input("vip");
		$placevendu->reserve = $request->input("reserve");
		$placevendu->normal = $request->input("normal");
		$placevendu->save();
		return redirect("/List_Placevendu/".$request->input("evenementid"));
	}
	public function list(Request $request){
		$query = Placevendu::query();
		$placevendus = $query->where('evenementid','=',request('evenementid'))->with("evenement")->paginate(5);
		$placevendus->appends(request()->query());
		$benef = DB::table('beneficereel')->where('id','=',request('evenementid'))->get();
		return view("Insert_Placevendu",['data2'=>$benef,'data1'=>Evenement::all(),'data0'=>$placevendus]);
	}
	public function destroy(Placevendu $placevendu){
		$eventid=$placevendu->lieuid;
		$placevendu->delete();
		return redirect("/List_Placevendu/".$eventid);
	}
}
