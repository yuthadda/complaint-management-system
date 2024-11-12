<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        // $categories = Category::latest()->paginate(5);

        return view('admin.categories.categories',['categories'=>$categories])->with('i',($request->input('page')-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::where('parent_id','=',null)->get();
        return view('admin.categories.create',['parents'=>$parents]);
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
            'name' => 'required'
        ],
    [
        'name.required' => 'Enter category name'
    ]);
        // dd($request->except('_token'));
        Category::create($request->except('_token'));
        return redirect()->route('categories.index')->with('success','Category is successfully added');
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
    public function edit(Category $category)
    {
        $parents = Category::where('parent_id','=',null)->get();
        return view('admin.categories.edit',['category'=>$category,'parents'=>$parents]);
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
            'name' => 'required'
        ],
    [
        'name.required' => 'Enter category name'
    ]);
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->parent_id = $request->input('parent_id');
        $category->save();
        return redirect()->route('categories.index')->with('success',"Category is successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        try{
            $category->delete();
        }
        catch(QueryException $e){
            return redirect()->route('categories.index')->with('success','Category cannot delete');
        }

        // return redirect()->route('categories.index')->with('success','Category is successfully deleted');
        return response()->json(['success'=>'successfully deleted']);
    }

    public function restore(){
        $trashed = Category::onlyTrashed()->get();
        foreach($trashed as $item){
            $item->restore();
        }
        // dd($trashed);
        return redirect()->route('categories.index')->with('success','Category restore all');
    }
}
