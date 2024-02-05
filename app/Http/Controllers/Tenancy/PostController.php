<?php

namespace App\Http\Controllers\Tenancy;
use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate();

        return view('tenancy.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenancy.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /*
        if ($request->file('image_url')) {

          } else {
      
            echo 'file not found';
          }
        */

        $data = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'image_url' => 'nullable|image',
            ]
        );


        $data['image_url'] = Storage::put('posts', $request->file('image_url'));

        Post::create($data);
        return redirect()->route('posts.index')->with('sucess', 'Se agregó el post ok');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('tenancy.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('tenancy.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'image_url' => 'nullable|image',
            ]
        );


        // verificar si se envio una imagen
        if ($request->hasFile('image_url')) {
            // eliminar imagen anterior
            Storage::delete($task->image_url);

            // guardar la nueva iamgen
            $data['image_url'] = Storage::put('posts', $request->file('image_url'));
        }
        
        $post->update($data);
        return redirect()->route('posts.index')->with('sucess', 'Se modificó el post ok');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Storage::delete($post->image_url);
        $post->delete();

        return redirect()->route('posts.index')->with('sucess', 'Se eliminó el post ok');
    }

}
