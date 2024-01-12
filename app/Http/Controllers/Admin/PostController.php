<?php

namespace App\Http\Controllers\Admin; #coretto

use App\Http\Controllers\Controller; #aggiunto
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Support\Str;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {

        // $formData = $request->all(); prende tutto, posso cambiare con:
        $formData = $request->validated(); #prende i dati già validati
        #CREO SLUG
        $slug = Str::slug($formData['title'], '-');
        #ADD SLUG TO formData
        $formData['slug'] = $slug;
        #prendiamo l'id dell'utente loggato
        $userId = auth()->id();
        // dd($userId);
        #aggiungiamo id dell'utente
        $formData['user_id'] = $userId;

        $post = Post::create($formData);
        return redirect()->route('admin.posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}