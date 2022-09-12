<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors=Author::orderBy('id','desc')->simplePaginate(5);

        return  response()->view('cms.author.index',compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  response()->view('cms.author.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validetor=Validator($request->all(),[


        ]);
        if(!$validetor->fails()){
            $authors=new Author();
            $authors->name=$request->get('name');
            $authors->email=$request->get('email');
            $authors->password=Hash::make($request->get('password'));
            $authors->mobile=$request->get('mobile');
            $authors->status=$request->get('status');
            $authors->date_of_birth=$request->get('date_of_birth');
            $isSaved=$authors->save();
            if($isSaved){
                    return response()->json(['icon'=>'success','title'=>"Created is Successfully"],200);
                }else{
                    return response()->json(['icon'=>'erorr','title'=>"Created is Failed"],400);

                }

        }else{
            return response()->json(['icon'=>'erorr','title'=>$validetor->getMessageBag()->first()],400);
        }}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $authors=Author::findOrFail($id);
        return  response()->view('cms.author.edit',compact('authors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validetor=Validator($request->all(),[


        ]);
        if(!$validetor->fails()){
            $authors= Author::findOrFail($id);
            $authors->name=$request->get('name');
            $authors->email=$request->get('email');
            $authors->password=Hash::make($request->get('password'));
            $authors->mobile=$request->get('mobile');
            $authors->status=$request->get('status');
            $authors->date_of_birth=$request->get('date_of_birth');
            $isUpdate=$authors->save();
            return  ['redirect'=>route('authors.index',$id)];

            if($isUpdate){
                    return response()->json(['icon'=>'success','title'=>"Created is Successfully"],200);
                }else{
                    return response()->json(['icon'=>'erorr','title'=>"Created is Failed"],400);

                }

        }else{
            return response()->json(['icon'=>'erorr','title'=>$validetor->getMessageBag()->first()],400);
        }}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $authors=Author::destroy($id);
        if($authors){
            return response()->json(['icon'=>'success','title'=>"Deleted is Successfully"],200);

        }else{
            return response()->json(['icon'=>'error','title'=>"Deleted is Failed"],400);

        }
    }
}
