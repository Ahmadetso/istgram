<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function index(User $user){
        return view('user.profile',compact('user'));
    }
    public function edit(User $user){
        return view('user.edit',compact('user'));
    }
    public function update(User $user, UserProfileUpdateRequest $request){

        $data = $request->safe();

        if($data['password'] == ''){
            unset($data['password']);
        }else{
            $data['password']= Hash::make($data['password']);
        }

         if($data->has('image')){
             $path = $request->file('image')->store('Storage','public');
             $data['image'] = '/' . $path;
         }

         $data['private_account'] = $request->has('privat_account');
         $user->update($data->toArray());
         session()->flash('success', __('You profile has been updated successfully!'));
         return redirect()->route('user_profile' ,$user);
    }
}
