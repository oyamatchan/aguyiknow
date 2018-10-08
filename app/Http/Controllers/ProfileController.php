<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Picture;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ProfileController extends Controller
{

    public $storage = 'profilePicture/';//repository, where all profile pictures are stored
    private $originalname = '';



    public function updateProfile($id){
        
        $profile = User::findOrfail($id);
        $user=Auth::user();      
        return view('profile.updateProfile',compact('user','profile')); 
        }

        public function saveProfile($id,Request $request){
            $id=Auth::id();
            
        //validate the types of file being accepted
            $this->validate($request, [
                'file'=> 'mimes|jpeg,jpg,png',
                'file'=> 'max:25600',
            ]);

            $profile = User::where('id', $id)->update([
            "firstName"=>$request->input('firstName'),
           "lastName"=>$request->input('lastName'),
           "address"=>$request->input('address'),
           "contactNumber"=>$request->input('contactNumber'),
            "email"=>$request->input('email'),
            ]);
        
        $picture = $request->file('picture');

        if($request->hasfile('picture')){
        //delete existing profile
        $remove = Picture::where('user_fk',$id)->delete();

        $pictures = new Picture;
        $fileName = $this->storage.$picture->getClientOriginalName();
        Storage::disk('public')->put($fileName, File::get($picture));
        $pictures->filename=url('/storage').'/'.$fileName;
        
        $otherprofile = Picture::where('user_fk',$id)->update([
        "filename"=>$pictures
        ]);

        $pictures->user_fk=$id;

        $pictures->save();
        }

        return redirect(url('/home'))->with('status',
        'Updated successfully.');
        
        }
        
}
