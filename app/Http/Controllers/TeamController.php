<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Team;
use App\Models\Department;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index',['teams'=>$teams]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        return view('admin.teams.create',['roles'=>$roles,'departments'=>$departments]);
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
            'email' => 'required',
            'phone' => 'required'
        ]);

        Team::create($request->except('_token'));
        return redirect()->route('teams.index')->with('success','Team successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        $roleCollections = Role::all();
        $depCollections = Department::all();
        return view('admin.teams.edit',['team' => $team ,'roleCollections'=> $roleCollections,'depCollections' => $depCollections]);
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
            'email' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'department_id' => 'required'
        ]);

        $team = Team::find($id);
        $team->name = $request->input('name');
        $team->email = $request->input('email');
        $team->phone = $request->input('phone');
        $team->role_id = $request->input('role_id');
        $team->department_id = $request->input('department_id');
        $team->save();

        return redirect()->route('teams.index')->with('success','Team successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        try{
            $team->delete();
        }
        catch(QueryException $e){
            return redirect()->route('teams.index')->with('success','Category cannot delete');
        }

        return response()->json(['success'=>'successfully deleted']);
    }

    public function restore(){
        $trashed = Team::onlyTrashed()->get();
        foreach($trashed as $item){
            $item->restore();
        }

        return redirect()->route('teams.index')->with('success','Team restore all');
    }
}
