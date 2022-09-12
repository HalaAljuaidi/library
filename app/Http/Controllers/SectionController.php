<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections=Section::with('store')->orderBy('id','desc')->simplePaginate(5);
        return  response()->view('cms.section.index',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

            $stores=Store::all();
            return  response()->view('cms.section.create',compact('stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=validator($request->all(),[
            'name'=>'required|string|min:3|max:200',
        ]);
        if(!$validator->fails()){
            $sections=new Section();
            $sections->name=$request->get('name');
            $sections->store_id=$request->get('store_id');
            $isSave=$sections->save();
            if( $isSave){

                    return  response()->json(['icon'=>'success','title'=>"Created   is  successflly"],200);

                }

        }else{
            return  response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $id)
    {
        $sections=Section::findOrFail($id);
        $stores=Store::all();
        return  response()->view('cms.section.edit',compact('sections','stores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validator=validator($request->all(),[
            'name'=>'required|string|min:3|max:200',
        ]);
        if(!$validator->fails()){
            $sections=Section::findOrFail($id);
            $sections->name=$request->get('name');
            $sections->store_id=$request->get('store_id');
            $isUpdate=$sections->save();
            return ['redirect' =>route('sections.index')];
            if($isUpdate){
                return response()->json(['icon' => 'success' , 'title' => 'Updated is Successfully'] , 200);
            }
            else{
                return response()->json(['icon' => 'error' , 'title' => 'Updated is Failed'] , 400);
            }
        }
        else{
            return response()->json(['icon' => 'error' , 'title'=> $validator->getMessageBag()->first()] , 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $id)
    {
        $sections=Section::destroy($id);
        if( $sections){
            return  response()->json(['icon'=>'sucess','title'=>"Delete  is  Successfully"],200);

        }else{
            return  response()->json(['icon'=>'error','title'=>"Delete  is  Failed"],400);

        }

    }}
