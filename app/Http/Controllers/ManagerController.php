<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $managers=Manager::orderBy('id','desc')->simplePaginate(5);
        return  response()->view('cms.manager.index',compact('managers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  response()->view('cms.manager.create');
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

            'managerName'=>'required|string|min:3|max:50',
            'age'=>'required',
            'address'=>'required|string|min:3|max:50',

        ]);
        if(!$validetor->fails()){
            $managers=new Manager();
            $managers->managerName=$request->get('managerName');
            $managers->age=$request->get('age');
            $managers->mobile=$request->get('mobile');
            $managers->email=$request->get('email');
            $managers->password=$request->get('password');
            $managers->address=$request->get('address');
            $managers->gender=$request->get('gender');
            $isSave=$managers->save();
            if($isSave){
                    return response()->json(['icon'=>'success','title'=>"Created is Successfully"],200);
                }

                return response()->json(['icon'=>'erorr','title'=>"Created is Failed"],400);
            }
        else{
            return response()->json(['icon'=>'erorr','title'=>$validetor->getMessageBag()->first()],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function show(Manager $manager)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $managers=Manager::findOrFail($id);
        return  response()->view('cms.manager.edit',compact('managers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $validetor=Validator($request->all(),[

            'managerName'=>'required|string|min:3|max:200',
            'age'=>'required',

        ]);
        if(!$validetor->fails()){
            $managers=Manager::findOrFail($id);
            $managers->managerName=$request->get('managerName');
            $managers->age=$request->get('age');
            $managers->mobile=$request->get('mobile');
            $managers->email=$request->get('email');
            $managers->password=Hash::make($request->get('password'));
            $managers->address=$request->get('address');
            $managers->gender=$request->get('gender');
            $isSave=$managers->save();
            return  ['redirect'=>route('managers.index',$id)];

            if($isSave){
                    return response()->json(['icon'=>'success','title'=>"Created is Successfully"],200);
                }

                return response()->json(['icon'=>'erorr','title'=>"Created is Failed"],400);
            }
        else{
            return response()->json(['icon'=>'erorr','title'=>$validetor->getMessageBag()->first()],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manager  $manager
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $managers=Manager::destroy($id);
        if( $managers){
            return  response()->json(['icon'=>'sucess','title'=>"Delete  is  Successfully"],200);

        }else{
            return  response()->json(['icon'=>'error','title'=>"Delete  is  Failed"],400);

        }
    }}

