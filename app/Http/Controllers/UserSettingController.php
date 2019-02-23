<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Storage;

class UserSettingController extends Controller
{
    public function form()
    {
    	$data = User::where('id',Auth::id())->first();
    	return view('admin.pages.user.setting',['dt'=>$data]);
    }
    public function update(Request $req)
    {


        
        if (empty($req->photo)) {
            $field = [
                'photo'=>$req->photo,
            ];

        }else {

            if ($req->user()->photo) {
                Storage::delete($req->user()->photo);
            }

            $photo = $req->file('photo')->store('photos');
            $field = [
                'photo' => $photo
                ];
        }
        


    	$id = Auth::id();
    	\Validator::make($req->all(), [
    		'name'=>'required|between:3,100',
    		'email'=>'required|email|unique:users,email,'.$id,
    		'password'=>'nullable|min:6',
    		'repassword'=>'same:password'
    	])->validate();

    	if (!empty($req->password)) {
    		$field = [
    			'name'=>$req->name,
    			'email'=>$req->email,
    			'password'=>bcrypt($req->password),
                'photo' => $photo,
    		];
    	}else{
    		$field = [
    			'name'=>$req->name,
    			'email'=>$req->email,
                'photo' => $photo,
    		];
    	}
    	$result = User::where('id',$id)->update($field);

    	if($result){
    		return back()->with('result','success');
    	}else {
    		return back()->with('result','fail');
    	}
    }
}
