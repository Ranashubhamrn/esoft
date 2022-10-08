<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('blog.create',compact('categories'));
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
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'slug' => 'required'
        ]);
        $requestData =$request->all();
        if($request->file('image')){
            $file= $request->file('image');
            $requestData['image']= $this->uploadImage($file); 
        }
        Blog::create($requestData);
        return redirect()->route('blog.index')->withSuccess('Blog added succesfully');
    }

    private function  uploadImage($file){
        $filename= date('YmdHi').$file->getClientOriginalName();
        $file-> move(public_path('public/Image'), $filename);
        return $filename;
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
        $blog = Blog::findOrfail($id);
        $categories = Category::all();
        return view('blog.edit',compact('blog','categories'));
    
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
            'title' => 'required',
            'category_id' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'slug' => 'required'
        ]);
        $requestData =$request->all();
        $blog= Blog::findORFail($id);
        if($request->file('image')){
            $file= $request->file('image');
            $requestData['image']= $this->uploadImage($file); 
        }
        $blog->update($requestData);
        return redirect()->route('blog.index')->withSuccess('Blog updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrfail($id);
        $blog->delete();
        return redirect()->route('blog.index')->withSuccess('Blog deleted succesfully');
    }
}
