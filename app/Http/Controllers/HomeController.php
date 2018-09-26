<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Picture;
use App\Quote;
use DB;

class HomeController extends Controller
{
    public $storage = 'foodPicture/';//repository, where all food pictures are stored
    private $originalname = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::id();
        $profile = User::where('id',$id)->get();
        $picture = Picture::where('user_fk',$id)->first();

        return view('home',['profile'=>$profile],['picture'=>$picture]);
    }

    public function foodPage()
    {
        $id=Auth::id();
        $profile = User::where('id',$id)->get();
        $picture = Picture::where('user_fk',$id)->first();
        //get all posted food quotes
        $quotes=DB::table('quotes')
        ->join('users','users.id','=','quotes.user_fk')
        ->orderBy('quotes.created_at', 'desc')
        ->get();

        return view('foodPage',['profile'=>$profile],['picture'=>$picture])->with(['quotes'=>$quotes]);
    }

    public function saveQuote(Request $request){

        $id=Auth::id();
        
        $profile = User::where('id',$id)->get();
        $picture = Picture::where('user_fk',$id)->first();

        //validate the types of file being accepted
        $this->validate($request, [
            'file'=> 'mimes|jpeg,jpg,png',
            'file'=> 'max:25600',
        ]);
        //check if the picture exists
    $foodPicture = $request->file('foodPicture');
    if($request->hasfile('foodPicture')){

    $quote = new Quote;

    $fileName = $this->storage.$foodPicture->getClientOriginalName();
    Storage::disk('public')->put($fileName, File::get($foodPicture));
    $quote->filename=url('/storage').'/'.$fileName;
    $quote->foodName=$request->foodName;
    $quote->foodQuote=$request->foodQuote;
    $quote->user_fk=$id;
    $quote->save();
    }
        //get all posted food quotes
        $quotes=DB::table('quotes')
        ->join('users','users.id','=','quotes.user_fk')
        ->orderBy('quotes.created_at', 'desc')
        ->get();

    return view('foodPage',['profile'=>$profile],['picture'=>$picture])->with(['quotes'=>$quotes]);
    
    }

}
