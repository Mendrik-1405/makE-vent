<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Cuser extends Controller
{
    public function insert_users(Request $req){
            $pro = new User();
            $pro->nom = request('nom');
            $pro->email = request('email');
            $pro->password = request('password');
            $pro->save();
        return redirect('/');
    }

    public function connect_users(Request $req){
        $req->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        
        $name =request('name');
        $password = request('password');
        $usr=User::login($name,$password);
        if($usr==null){
            return redirect('/')->withErrors([ 'error'=>'check username or password'])->withInput();
        }
        $usr->password=null;
        $req->session()->put('user',$usr);
        return redirect('/List_Artiste');
    }

    public function logout_users(Request $req){
        $req->session()->flush();
        return redirect('/');
    }

    public function list_userspoint (){
        $table = DB::table('v_userspoint')
            ->select('v_userspoint.id','v_userspoint.nom', 'v_userspoint.pointdevente')
            ->paginate(2);
        return view('ListUsers',['data'=>$table]);
    }    
}
