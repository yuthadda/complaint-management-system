<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.departments',['departments'=>$departments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.departments.create');
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
            'name' => 'required',
            'phone' => 'required',
            'code'=> 'required'
        ],
    [
        'name.required' => 'Enter category name',
        'phone.required' => 'Enter department phone',
        'code.required' => 'Enter department code'
    ]);

    Department::create($request->except('_token'));
    return redirect()->route('departments.index')->with('success','Department is successfully added');

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
    public function edit(Department $department)
    {

        return view('admin.departments.edit',['department'=>$department]);
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
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'phone'=> 'required'
        ],
    [
        'name.required' => 'Enter category name',
        'code.required' => 'Enter department code',
        'phone.required' => 'Enter department phone'
    ]);

    $department = Department::find($id);
    $department->name = $request->input('name');
    $department->code = $request->input('code');
    $department->phone = $request->input('phone');
    $department->save();

    return redirect()->route('departments.index')->with('success',"Department is successfully updated");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department = Department::find($id);
        try{
            $department->delete();
        }
        catch(QueryException $e){
            return redirect()->route('departments.index')->with('success','Department cannot delete');
        }

        return response()->json(['success'=>'successfully deleted']);
    }

    public function restore(){
        $trashed = Department::onlyTrashed()->get();
        foreach($trashed as $item){
            $item->restore();
        }
        return redirect()->route('departments.index')->with('success','Department restore all');
    }




}
