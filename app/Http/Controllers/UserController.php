<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Image;
use App\User;
use Illuminate\Support\Facades\Input;

use App\Http\Controllers\Controller;
class UserController extends Controller
{
    

    public function profile(User $user){
    	$user = Auth()->user();
    	$avatar = $user->avatar;
    	return view('profile', compact('user','avatar'));
    }

    public function update_avatar(Request $request){
    	$id = Auth()->user()->id;
    	        $this->validate(request(),[
        'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
        $user = User::where('id',$id);
        if (Input::hasFile('avatar')){
        $avatar = Input::file('avatar');
         $filename = time() . '.'. $avatar->getClientOriginalExtension();

     Image::make($avatar)->resize(300,300)->save(public_path('/storage/uploads/avatars/' . $filename));  
        $user->update([
        'avatar' => $filename,
        
            ]); 
        	 }
		/*

    	if ($request->hasFile('avatar')){
    		$avatar = $request->file('avatar');
    		$filename = time() . '.'. $avatar->getClientOriginalExtension();
       
     Image::make($avatar)->resize(300,300)->save(public_path('/storage/uploads/avatar/' . $filename));  
    	
    	$user = Auth::user();
    	$user->avatar = $filename;
    	$user->save();
		}
		*/
		//return redirect('/bugs')->with('response','Bug Updated Successfully');
    	//return redirect('profile',array('user' => Auth::user() ));
    	return redirect('/profile');

    }

}
