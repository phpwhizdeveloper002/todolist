<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        
        return Inertia::render('Posts', [
            'posts' => $posts
        ]);
    }

    public function create() {
        return Inertia::render('CreatePost');
    }

    public function store(Request $request)
    {
        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);

        return redirect('dashboard');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('dashboard');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        // dd($post['title']);
        return Inertia::render('EditPost', [
            'post' => $post
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validate request data
        $validated = $request->validate([
            'title'   => 'required|min:3',
            'content' => 'required|min:5',
        ]);

        // Find post
        $post = Post::findOrFail($id);

        // Update with validated data (must be an array ✅)
        $post->update($validated);

        return redirect('dashboard');
    }

    public function view($id)
    {
        $post = Post::findOrFail($id);

        return Inertia::render('ViewPost', [
            'post' => $post
        ]);
    }

}
