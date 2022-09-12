<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Library;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::with('library')->orderBy('id' , 'desc')->simplePaginate(5);
        return response()->view('cms.store.index' , compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libraries = Library::all();
        return response()->view('cms.store.create' , compact('libraries'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(),[
            'title' =>'required|string|min:3|max:20',
        ],[

        ]);

        if(! $validator->fails()){

            $stores = new Store();
            $stores->title = $request->get('title');
            $stores->library_id = $request->get('library_id');
            $isSaved = $stores->save();

            if($isSaved){
                return response()->json(['icon' => 'success' , 'title' => 'Created is Successfully'] , 200);
            }
        else{
            return response()->json(['icon' => 'error' , 'title'=> $validator->getMessageBag()->first()] , 400);
        }

    }}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libraries = Library::all();
        $stores = Store::findOrFail($id);
        return response()->view('cms.store.edit' , compact('libraries' , 'stores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores = Store::findOrFail($id);
        $libraries = Library::all();
        return response()->view('cms.store.edit' , compact('stores' , 'libraries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator=validator($request->all(),[
            'title'=>'required|string|min:3|max:200',
        ]);
        if(!$validator->fails()){
            $stores=Store::findOrFail($id);
            $stores->title=$request->get('title');
            $stores->library_id=$request->get('library_id');
            $isUpdate=$stores->save();
            return ['redirect' =>route('stores.index')];
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores = Store::destroy($id);
        return response()->json(['icon' => 'success' , 'title' => 'Deleted is Successfully'] ,200);
    }
}
