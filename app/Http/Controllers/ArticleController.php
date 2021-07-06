<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function __construct()
    {
        // index create and store only user 
        $this->middleware(['auth', 'role:user'])->only(['create', 'store']);
        // destroy user and admin
        $this->middleware('auth')->only(['index', 'destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if($user->role == 'admin'){
            $articles = Article::all();
        } else if($user->role == 'user'){
            $articles = Article::where('user_id', $user->id)->get();
        }

        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('article.create', ['categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate inputs
        $request->validate([
            'category' => ['required', 'exists:categories,id'],
            'title' => ['required', 'max:255'],
            'description' => ['required'],
            'image' => ['required', 'file', 'mimes:jpg,jpeg,png,gif'],
        ]);
        
        // image name is article title
        $image = $request->image;
        $extension = $image->extension();
        $filename = $request->title . '.' . $extension; 

        Storage::putFileAs('public/images', $image, $filename);

        Article::create([
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'image' => $filename,
        ]);

        return redirect()->back()->with('status', 'Blog created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        // delete image from storage
        Storage::delete('public/images/' . $article->image);
        // delete article object
        $article->delete();
        // return msg
        return redirect()->back()->with('status', 'Article successfully deleted');
    }
}
