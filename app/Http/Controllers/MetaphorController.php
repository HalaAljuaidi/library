<?php

namespace App\Http\Controllers;

use App\Models\Metaphor;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class metaphorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metaphors=Metaphor::orderBy('id','desc')->simplePaginate(8);
        return response()->view('cms.metaphors.index', compact('$metaphors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.metaphors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator= Validator($request->all(),[
            'time' => 'required|string|min:3|max:20',
            'date' => 'required|string|min:3|max:20',
            'return_date' => 'required|string|min:3|max:20',

        ]);
        if($validator->fails()){
            $metaphors = new Metaphor();
            $metaphors ->time =$request->get('time');
            $metaphors ->date =$request->get('date');
            $metaphors ->return_date =$request->get('return_date');



                $isSaved =$metaphors->save();
                if($isSaved){
                    return response()->json(['icon' => 'success','title' =>'Created is successfully'],200);
                }
                else{
                    return response()->json(['icon' => 'error','title' =>'Created is Failes'],400);
                    }
                }
                else{
                    return response()->json(['icon' => 'error','title' =>$validator->getMessageBag()->first()],400);
                }
            }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $metaphors=Metaphor::findOrFail($id);
        return response()->view('cms.metaphors.edit', compact('$metaphors'));
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
        $validator= Validator($request->all(),[
            'time' => 'required|string|min:3|max:20',
            'date' => 'required|string|min:3|max:20',
            'return_date' => 'required|string|min:3|max:20',

                    ]);
                    if($validator->fails()){
                        $metaphors = new Metaphor();
                        $metaphors ->time =$request->get('time');
            $metaphors ->date =$request->get('date');
            $metaphors ->return_date =$request->get('return_date');

                            $isUpdate =$metaphors->save();
                            return ['redirect'=>route('metaphors.index',$id)];
                            if($isUpdate){
                                return response()->json(['icon' => 'success','title' =>'Updated is successfully'],200);
                            }
                            else{
                                return response()->json(['icon' => 'error','title' =>'Updated is Failes'],400);
                                }
                            }
                            else{
                                return response()->json(['icon' => 'error','title' =>$validator->getMessageBag()->first()],400);
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
        $metaphors=Metaphor::destroy($id);
        if($metaphors){
         return response()->json(['icon' => 'success','title' =>'Deleted is successfully'],200);
        }
 else{
        return response()->json(['icon' => 'error','title' =>'Deleted is Failes'],400);
         }
    }
}
