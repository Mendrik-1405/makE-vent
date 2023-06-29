<?php

namespace App\Http\Controllers;

use App\Models\Artiste;
use Illuminate\Http\Request;
class CArtiste extends Controller
{
	public function store(Request $request){
		$request->validate([
			"nom"=>"required",
			"tarif"=>"required",
		]);
		$imgname='default.jpg';
        if (null !== $request->file('photo')) {
            $imgname = base64_encode(file_get_contents($request->file('photo')));
        }
		$artiste = new Artiste;	
		$artiste->nom = $request->input("nom");
		$artiste->tarif = $request->input("tarif");
		$artiste->photo = $imgname;
		$artiste->save();
		return redirect("/List_Artiste");
	}

	public function update(Request $request, Artiste $artiste){
		$request->validate([
			"nom"=>"required",
			"tarif"=>"required",
		]);
		$artiste->nom = $request->input("nom");
		$artiste->tarif = $request->input("tarif");
		$artiste->save();
		return redirect("/List_Artiste");
	}
	public function list(Request $request){
		$query = Artiste::query();
		$artistes = $query->paginate(5);
		$artistes->appends(request()->query());
		return view('Insert_Artiste',['data0'=>$artistes]);
	}
	public function destroy(Artiste $artiste){
		$artiste->delete();
		return redirect("/List_Artiste");
	}
}
