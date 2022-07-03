<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $posts = Posts::withCount('tags')->get();
        return view('Posts.index', compact('categories', 'posts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image')) {
            $imageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images', $imageName);

            $post = Posts::create([
                'title' => $request->title,
                'category_id' => $request->categoryId,
                'user_id' => Auth::user()->id,
                'image' => $imageName,
            ]);
        }


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function getPostByTags($data)
    {
        $posts = Posts::whereHas('tags', function ($query) use ($data) {
            $query->where('title', 'like', '%'. $data .'%');
        })->get();

        return response()->json($posts);
    }
}
