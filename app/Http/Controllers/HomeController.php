<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\User;
use App\Picture;
use App\Recipe;
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
    //homepage
    public function index()
    {
        $id=Auth::id();
        $profile = User::where('id',$id)->get();
        $picture = Picture::where('user_fk',$id)->first();

        return view('home',['profile'=>$profile],['picture'=>$picture]);
    }

    public function viewMyPosts(){
        $id=Auth::id();
        $profile = User::where('id',$id)->get();
        $picture = Picture::where('user_fk',$id)->first();
        //get your posted recipes
        $recipes=Recipe::where('user_fk',$id)
        ->orderBy('recipes.created_at', 'desc')
        ->get();
        // dd($recipes);

        return view('myPosts',['profile'=>$profile],['picture'=>$picture])->with(['recipes'=>$recipes]);

    }
    //edit recipe
    public function editRecipe($rid){
        $id=Auth::id();
        $profile = User::where('id',$id)->get();
        $picture = Picture::where('user_fk',$id)->first();
        $recipes=Recipe::where([['user_fk',$id],['rid',$rid]])
        ->first();
        // dd($recipes);
        return view('editRecipe',['profile'=>$profile],['picture'=>$picture])->with(['recipes'=>$recipes]);

    }
//delete a recipe
public function deleteRecipe($rid){
    $delete = Recipe::where('rid',$rid)->delete();
    return redirect(url('/foodPage/myposts'));
}
    //save update
    public function updateRecipe($rid,Request $request){
        $this->validate($request, [
            'file'=> 'mimes|jpeg,jpg,mp4,png,flv,wmv',
            'file'=> 'max:25600',
        ]);
        $recipes = Recipe::where('rid', $rid)->update([
        "foodName"=>$request->input('foodName'),
        "foodRecipe"=>$request->input('foodRecipe')
        ]);

        return redirect(url('/foodPage/myposts'));
    }
    //recipe page
    public function foodPage()
    {
        $id=Auth::id();
        $profile = User::where('id',$id)->get();
        $picture = Picture::where('user_fk',$id)->first();
        //get all posted food recipes
        $recipes=DB::table('recipes')
        ->join('users','users.id','=','recipes.user_fk')
        ->orderBy('recipes.created_at', 'desc')
        ->get();
        // dd($recipes);

        return view('foodPage',['profile'=>$profile],['picture'=>$picture])->with(['recipes'=>$recipes]);
    }



    public function saveRecipe(Request $request){
        $id=Auth::id();
        //validate the types of file being accepted
        $this->validate($request, [
            'file'=> 'mimes|jpeg,jpg,png',
            'file'=> 'max:25600',
        ]);
        //check if the picture exists
    $foodPicture = $request->file('foodPicture');
    if($request->hasfile('foodPicture')){
        //create new instance of recipe
    $recipe = new Recipe;

    $fileName = $this->storage.$foodPicture->getClientOriginalName();
    Storage::disk('public')->put($fileName, File::get($foodPicture));
    $recipe->filename=url('/storage').'/'.$fileName;
    $recipe->foodName=$request->foodName;
    $recipe->foodRecipe=$request->foodRecipe;
    $recipe->user_fk=$id;
    $recipe->save();
    }


        return redirect(url('/foodPage'));

    // return view('foodPage',['profile'=>$profile],['picture'=>$picture])->with(['recipes'=>$recipes]);
    
    }

    public function viewRecipe($rid){
        $uid=Auth::id();
        $profile = User::where('id',$uid)->get();
        $picture = Picture::where('user_fk',$uid)->first();
        //view the recipe
        $recipes=DB::table('recipes')
        ->join('users','users.id','=','recipes.user_fk')
        ->where('recipes.rid',$rid)
        ->first();
        return view('viewRecipe',['profile'=>$profile],['picture'=>$picture])->with(['recipes'=>$recipes]);
    }

    public function searchRecipe(Request $request){
        $uid=Auth::id();
        $profile = User::where('id',$uid)->get();
        $picture = Picture::where('user_fk',$uid)->first();

        $searchedTerm=$request->searchRecipe;

        $recipes=DB::table('recipes')
        ->join('users','users.id','=','recipes.user_fk')
        ->where('recipes.foodName',"LIKE","%$searchedTerm%")
        ->orderBy('recipes.created_at', 'desc')
        ->get();

        return view('searchResultsRecipe',['profile'=>$profile],['picture'=>$picture])->with(['recipes'=>$recipes]);

    }

}
