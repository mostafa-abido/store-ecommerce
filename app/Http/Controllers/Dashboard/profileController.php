<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class profileController extends Controller
{
    public function editProfile()
    {
        $admin = Admin::find( auth('admin') -> user()-> id);
        return view('dashboard.profile.edit',compact('admin')) ;
    }

    
    public function updateProfile(ProfileRequest $request)
    {
        //validation

        //db
        
        try{
            $admin = Admin::find(auth('admin') -> user()-> id);
           
           if ($request -> filled('password')){
               return $request ->merge(['password' => bcrypt($request -> password)]);
           }

           unset($request['id']);
           
            $admin -> update($request -> all());
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
        }catch(\Exception $ex){
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']); 
        }
    }

   

}
