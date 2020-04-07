<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\validator;
use App\Usermo;
class Usercon extends Controller
{
    function savedata(Request $req){
        $validator = validator::make($req->all(),[
            'name'=>'required|max:150',
            'pass'=>'required|max:150',
        ]); 
        if($validator->passes()){

          //Insert Record In Database
            $user = new Usermo;
            $user->name = $req->name;
            $user->pass = $req->pass;
            $file = $req->file('photo');
            $filename = $file->getClientOriginalName(); 
            $destinationPath = public_path();
            $file->move($destinationPath,$filename);
            $user->photo = $filename;
            $user->save();
            $req->session()->flash('msg',"Data Inserted Successfully");
            return redirect('add-user');
        }
        else{
              //redirect
            return redirect('add-user')->withErrors($validator)->withInput();
        }
    }

     function updateData($edit_id, Request $req){
             $validator = validator::make($req->all(),[
            'name'=>'required|max:150',
            'pass'=>'required|max:150',
        ]); 
        if($validator->passes()){

          //Insert Record In Database
            $user = Usermo::find($edit_id);
            $user->name = $req->name;
            $user->pass = $req->pass;
            $file = $req->file('photo');
            $filename = $file->getClientOriginalName();
            $destinationPath = public_path();
            $file->move($destinationPath,$filename);
            $user->photo = $filename;
            $user->save();
            $req->session()->flash('msg',"Data Updated Successfully");
            return redirect('list');
        }
        else{
              //redirect
            return redirect('add-user')->withErrors($validator)->withInput();
        }
    }

    function showData(Request $req){
        $data = Usermo::paginate(3);;
        return view('list',['data'=>$data]);
    }

      function deleteData(Request $req, $del_id){
       $user = Usermo::find($del_id);
       $user->delete();
       $req->session()->flash('msg',"Delete Data Successfully");
            return redirect('list');
    }


      function editData(Request $req, $edit_id){
       $data = Usermo::find($edit_id);
       return view('edit',['data'=>$data]);
    }
}