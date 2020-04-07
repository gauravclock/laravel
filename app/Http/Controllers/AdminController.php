<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
public function LoginSubmit(Request $req)
{

$req->validate([
"user"=>"required",
"pass"=>"required|min:6"
]);
 $user=$req->input('user');
 $pass=$req->input('pass');

//print_r($req->input(user));

}
public function RegFrm(Request $req){

	echo "dsdssd";
	exit();
}
}
