<?php

namespace App\Http\Controllers;

use App\Models\Library;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $libraries=Library::with('manager')->orderBy('id','desc')->simplePaginate(5);
        return  response()->view('cms.library.index',compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $managers=Manager::all();
        return  response()->view('cms.library.create',compact('managers'));
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
            'discription'=>'required|string|min:5|max:200',
        ]);
        if(!$validator->fails()){
            $libraries=new Library();
            $libraries->name=$request->get('name');
            $libraries->open_time=$request->get('open_time');
            $libraries->close_time=$request->get('close_time');
            $libraries->discription=$request->get('discription');
            $libraries->manager_id=$request->get('manager_id');
            $isSave=$libraries->save();
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
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $libraries=Library::findOrFail($id);
        $managers=Manager::all();

        return  response()->view('cms.library.edit',compact('libraries','managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=validator($request->all(),[
            'name'=>'required|string|min:3|max:200',
            'discription'=>'required|string|min:5|max:200',
        ]);
        if(!$validator->fails()){
            $libraries=Library::findOrFail($id);
            $libraries->name=$request->get('name');
            $libraries->open_time=$request->get('open_time');
            $libraries->close_time=$request->get('close_time');
            $libraries->discription=$request->get('discription');
            $libraries->manager_id=$request->get('manager_id');
            $isUpdate=$libraries->save();
            return ['redirect' =>route('libraries.index')];
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

    /**000000000
     *
     * @param  \App\Models\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $id)
    {
        $libraries=Library::destroy($id);
        if( $libraries){
            return  response()->json(['icon'=>'sucess','title'=>"Delete  is  Successfully"],200);

        }else{
            return  response()->json(['icon'=>'error','title'=>"Delete  is  Failed"],400);

        }

    }
}
