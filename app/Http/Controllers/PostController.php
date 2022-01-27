<?php

namespace App\Http\Controllers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\File;
use App\Post;
use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Categorie::all();
        $posts =Post::orderBy('views','desc')->paginate(5);
        $Tposts=Post::orderBy('created_at','desc')->take(5)->get();
        return view('welcome', ['posts'=>$posts,'categories'=>$categories,'tposts'=>$Tposts]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories =Categorie::all();
        return view('admin.addPost',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titre' => 'required|max:255',
            'detail' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'topic'=>'required'

        ]);
        $post =new Post();
        $post->titre = $request->input('titre');
        $post->detail = $request->input('detail');
        $post->categorie_id=$request->input('topic');
        if ($request->hasFile('photo')) {
         $post->photo = $request->photo->store('images');
        }
        $post->save();
         return redirect()->route('adminPanel')
         ->with('succes_create','post created succesfully');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show( $titre)
    {

        $id= DB::table('posts')->where('titre',$titre)->value('id');
        DB::table('posts')
               ->where('id', $id)
               ->increment('views', 1);

        $post = Post::findOrFail($id);
        $categories=Categorie::all();
        $popularPosts=Post::orderBy('views','desc')->take(5)->get();
        return view('detail',['post'=>$post,'popularPosts'=>$popularPosts,'categories'=>$categories]);
        //
    }
    public function adminIndex()
    {
        return view('admin.index',['posts'=>Post::paginate(6)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $post= Post::findOrFail($id);
        $categories=Categorie::all();
        $post_categorie=Categorie::findOrFail($post->categorie_id);
        return view('admin.editPost',
        ['post'=>$post,'categories'=>$categories,'post_categorie'=>$post_categorie->name]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'titre' => 'required|max:255',
            'detail' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        $post =Post::find($id);
        $post->titre = $request->input('titre');
        $post->detail = $request->input('detail');
        $post->categorie_id=$request->input('topic');
        if ($request->hasFile('photo')) {
            $post->photo = $request->photo->store('images');
           }
        $post->save();
        return redirect()->route('adminPanel')
                        ->with('successUpdate','post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $post =Post::find($id);
        $post->delete();
        return redirect()->route('adminPanel')
        ->with('successDelete','post deleted successfully');
        //
    }

    public function categorie($nom){
        $categorie_id =DB::table('categories')->where('name',$nom)->value('id');
        $categories =Categorie::all();
        $posts = DB::table('posts')->where('categorie_id',$categorie_id)->paginate(3);
        $Tposts=Post::orderBy('views')->take(5)->get();
        return view('welcome', ['posts'=>$posts,'categories'=>$categories,'titre'=>'categorie : '.$nom]);
        }

        public function search(Request $request){
            $keyword=$request->input('search');
            $categories =Categorie::all();
            $Tposts=Post::orderBy('views')->take(5)->get();
            $posts=Post::where('titre','like','%'.$keyword.'%')->paginate(6);

            return view('welcome', ['posts'=>$posts,'categories'=>$categories,'titre'=>'result for : '.$keyword]);
        }

        public function recentPost(){
            $posts=Post::orderBy('created_at','desc')->paginate(6);
            $categories =Categorie::all();
            return view('welcome', ['posts'=>$posts,'categories'=>$categories,'titre'=>'Recent Post']);

        }
}
