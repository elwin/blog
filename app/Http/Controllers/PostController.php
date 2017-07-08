<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreBlogPost;
use App\Post;
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
        return view('post.index', ['posts' => Post::paginate()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogPost $request)
    {
        $post = $this->createPost($request);

        return redirect()->action('PostController@show', $post)->with('success', 'Post successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogPost $request, Post $post)
    {
        $this->updatePost($request, $post);

        return redirect()->route('post.show', $post)->with('success', 'Post successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('danger', 'Post successfully deleted!');
    }

    private function syncCategories(Post $post, array $categories)
    {
        $ids = [];
        foreach ($categories as $category) {
            $c = Category::find($category);
            if ($c == null)
                $c = Category::create(['title' => $category]);
            $ids[] = $c->id;
        }
        $post->categories()->sync($ids);
    }

    private function createPost(StoreBlogPost $request)
    {
        $post = Post::create($request->except('categories'));
        $this->syncCategories($post, $request->input('categories'));

        return $post;
    }

    private function updatePost(StoreBlogPost $request, Post $post)
    {
        $post->update($request->except(['categories']));
        $this->syncCategories($post, $request->input('categories'));
    }
}
