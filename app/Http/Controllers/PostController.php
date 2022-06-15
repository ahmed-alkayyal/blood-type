<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recordS=Post::latest()->paginate(10);
        return view("posts.index",compact('recordS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::pluck('name','id')->toArray();
        return view("posts.createPost",compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'title'         => 'required|unique:posts|max:255',
            'content'       =>'required',
            'image'         =>'required',//|image
            'category_id'  =>'required|exists:categories,id',
        ];
        $this->validate($request,$rules);
        $post=Post::Create($request->except('image'));
        $file=$request->file('image')->storeAs('posts',Str::random(20).'.'.$request->file('image')->getClientOriginalExtension());//'.'.$request->file('image')->getClientOriginalExtension()
        $post->image='storage/'.$file;
        $post->save();
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $record=Post::findorfail($id);
        return view("posts.showPost",compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model=Post::findorfail($id);
        $category=Category::pluck('name','id')->toArray();
        return view('posts.editPost',compact('model','category'));
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
        $record=Post::findorfail($id);
        $record->update($request->except('image'));
        $file=$request->file('image')
        ->storeAs('posts',Str::random(20).'.'.$request->file('image')->getClientOriginalExtension());//'.'.$request->file('image')->getClientOriginalExtension()
        $record->image='storage/'.$file;
        $record->save();
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $record=Post::findorfail($id);
        $record->delete();
        return back();
    }
}
