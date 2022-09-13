<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $borrowers=Borrower::orderBy('id','desc')->simplePaginate(8);
        return response()->view('cms.borrowers.index', compact('borrowers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.borrowers.create');
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
            'name' => 'required|string|min:3|max:20',
            'age' => 'required|string|min:3|max:20',
            'email' => 'required|string|min:3|max:20',
            'mobile' => 'required|string|min:3|max:20',
        ]);
        if($validator->fails()){
            $borrowers = new Borrower();
            $borrowers ->name =$request->get('name');
            $borrowers ->age =$request->get('age');
            $borrowers ->mobile =$request->get('mobile');
            $borrowers ->email =$request->get('email');


                $isSaved =$borrowers->save();
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
        $borrowers=Borrower::findOrFail($id);
        return response()->view('cms.borrowers.edit', compact('borrowers'));
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
            'name' => 'required|string|min:3|max:20',
            'age' => 'required|string|min:3|max:20',
            'email' => 'required|string|min:3|max:20',
            'mobile' => 'required|string|min:3|max:20',
                    ]);
                    if($validator->fails()){
                        $borrowers = new Borrower();
                        $borrowers ->name =$request->get('name');
                        $borrowers ->age =$request->get('age');
                        $borrowers ->mobile =$request->get('mobile');
                        $borrowers ->email =$request->get('email');

                            $isUpdate =$borrowers->save();
                            return ['redirect'=>route('borrowers.index',$id)];
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
        $borrowers=Borrower::destroy($id);
        if($borrowers){
         return response()->json(['icon' => 'success','title' =>'Deleted is successfully'],200);
        }
 else{
        return response()->json(['icon' => 'error','title' =>'Deleted is Failes'],400);
         }
    }
}
