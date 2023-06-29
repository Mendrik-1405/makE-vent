<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lieu;
class CLieu extends Controller
{
	public function store(Request $request){
		$request->validate([
			"designation"=>"required",
			"nbrplace"=>"required",
		]);
		$imgname='default.jpg';
        if (null !== $request->file('photo')) {
            $imgname = base64_encode(file_get_contents($request->file('photo')));
        }
		$lieu = new Lieu;	
		$lieu->designation = $request->input("designation");
		$lieu->nbrplace = $request->input("nbrplace");
		$lieu->photo = $imgname;
		$lieu->save();
		return redirect("/List_Lieu");
	}

	public function update(Request $request, Lieu $lieu){
		$request->validate([
			"designation"=>"required",
			"nbrplace"=>"required",
		]);
		$lieu->designation = $request->input("designation");
		$lieu->nbrplace = $request->input("nbrplace");
		$lieu->save();
		return redirect("/List_Lieu");
	}
	public function list(Request $request){
		$query = Lieu::query();
		$lieus = $query->paginate(5);
		$lieus->appends(request()->query());
		return view("Insert_Lieu",['data0'=>$lieus]);
	}
	public function destroy(Lieu $lieu){
		$lieu->delete();
		return redirect("/List_Lieu");
	}
}
