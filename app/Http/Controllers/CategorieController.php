<?php

namespace App\Http\Controllers;
use App\Post;
use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories =Categorie::paginate(10);
        return view('admin.topics',['categories'=>$categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.addTopic');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:30|min:2'
        ]);
         $categories = new Categorie();
         $categories->name=$request->input('name');
         $categories->save();
        return redirect()->route('topics')
            ->with('successCreate','categories created successfuly');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        return view('admin.editTopic',['categorie'=>Categorie::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name'=>'required|max:30|min:2'
        ]);
        $categorie=Categorie::findOrFail($id);
        $categorie->name=$request->input('name');
        $categorie->save();
        return redirect()->route('topics')
            ->with('successEdit','categorie updated successfuly');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    $post=Post::where('categorie_id','=',$id)->get();
    if(count($post)>0){
        return redirect()->route('topics')
        ->with('errorDelete','categories cannot deleted ');
    }
    else{
        $categorie=Categorie::findOrFail($id);
        $categorie->delete();
        return redirect()->route('topics')
        ->with('successDelete','categories deleted successfuly');
    }

    }
}
