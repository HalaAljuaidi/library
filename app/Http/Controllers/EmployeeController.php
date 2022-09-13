<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::orderBy('id','desc')->simplePaginate(8);
        return response()->view('cms.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.employees.create');
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
            'number_of_hours_work' => 'required|string|min:3|max:20',
            'status' => 'required|string|min:3|max:20',
            'level_of_education' => 'required|string|min:3|max:20',
            'attendees' => 'required|string|min:3|max:20',
        ]);
        if($validator->fails()){
            $employees = new Employee();
            $employees ->name =$request->get('name');
            $employees ->age =$request->get('age');
            $employees ->status =$request->get('status');
            $employees ->number_of_hours_work =$request->get('number_of_hours_work');
            $employees ->level_of_education =$request->get('level_of_education');
            $employees ->attendees =$request->get('attendees');
                $isSaved =$employees->save();
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
        $employees=Employee::findOrFail($id);
        return response()->view('cms.employees.edit', compact('employees'));
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
            'number_of_hours_work' => 'required|string|min:3|max:20',
            'status' => 'required|string|min:3|max:20',
            'level_of_education' => 'required|string|min:3|max:20',
            'attendees' => 'required|string|min:3|max:20',
                    ]);
                    if($validator->fails()){
                        $employees = new Employee();
                        $employees ->name =$request->get('name');
                        $employees ->age =$request->get('age');
                        $employees ->status =$request->get('status');
                        $employees ->number_of_hours_work =$request->get('number_of_hours_work');
                        $employees ->level_of_education =$request->get('level_of_education');
                        $employees ->attendees =$request->get('attendees');

                            $isUpdate =$employees->save();
                            return ['redirect'=>route('employees.index',$id)];
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
        $employees=Employee::destroy($id);
        if($employees){
         return response()->json(['icon' => 'success','title' =>'Deleted is successfully'],200);
        }
 else{
        return response()->json(['icon' => 'error','title' =>'Deleted is Failes'],400);
         }
    }
}
