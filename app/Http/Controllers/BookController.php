<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::orderBy('id','desc')->simplePaginate(8);
        return response()->view('cms.books.index', compact('$books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.books.create');
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
            'date_of_issue' => 'required|string|min:3|max:20',
            'status' => 'required|string|min:3|max:20',

        ]);
        if($validator->fails()){
            $books = new Book();
            $books ->name =$request->get('name');
            $books ->date_of_issue =$request->get('date_of_issue');
            $books ->status =$request->get('status');



                $isSaved =$books->save();
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
        $books=Book::findOrFail($id);
        return response()->view('cms.books.edit', compact('$books'));
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
            'date_of_issue' => 'required|string|min:3|max:20',
            'status' => 'required|string|min:3|max:20',
                    ]);
                    if($validator->fails()){
                        $books = new Book();
                        $books ->name =$request->get('name');
                        $books ->date_of_issue =$request->get('date_of_issue');
                        $books ->status =$request->get('status');

                            $isUpdate =$books->save();
                            return ['redirect'=>route('books.index',$id)];
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
        $books=Book::destroy($id);
        if($books){
         return response()->json(['icon' => 'success','title' =>'Deleted is successfully'],200);
        }
 else{
        return response()->json(['icon' => 'error','title' =>'Deleted is Failes'],400);
         }
    }
}
