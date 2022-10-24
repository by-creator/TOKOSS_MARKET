<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
   
    public function error()
    {
        return view('pages/category/error');
    }

    public function delete(Request $request)
    {
        $c = Category::find($request->id);
        if($c !=null)
        {
            $c->delete();
        }

        return redirect()->route('category.create');
    }

    public function search(Request $request)
    {
        $name = $request->category_search;

        $categoryData = Category::where('name', '=',$name)->get();

        if(isset($categoryData))
        {
            return view('pages/category/search', compact('categoryData'));
        }
        else
        {
            return redirect()->route('category.error');
        }

       
    }

    public function updates(Request $request)
    {
        $category = Category::find($request->id);
        $category->name = $request->get('name');
        

        $category->save();

        return redirect()->route('category.create');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        $categoryData = Category::orderBy('name','asc')->get();
        

        return view('pages/index/index_admin',['categoryData'=>$categoryData]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data= new Category();

        $data['name']= $request->category;

        $data->save();

        return redirect()->route('category.create');
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
        //
        $category = Category::find($id);
        
        return view('pages/category/edit',['category'=>$category]);
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
        //
       
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
