<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\HTTP;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::latest('created_at')->paginate(5);

        $recentlyPosts = Article::latest('created_at')->take(5)->get();
        return view('index', ['articles' => $articles, 'recentlyPosts' => $recentlyPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $article = new Article();
        return view('articles.create', ['article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
        $article = new Article();
        $article->title = $request->title;
        $article->body = $request->body;

        if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $article->images = 'images/' . $imageName;
    } else {
        if (!$request->hasFile('image')) {
            $response = Http::get('https://api.unsplash.com/photos/random', [
                'query' => 'finance',
                'client_id' => config('services.unsplash.access_key'),
            ]);
            $image = optional($response->json())[0]['urls']['regular'] ?? null;
            if ($image) {
                $imageName = time() . '_dummy_image.jpg';
                file_put_contents(public_path('images/' . $imageName), file_get_contents($image));
                $article->images = 'images/' . $imageName;
            }
        }
    }

        $user->articles()->save($article);
        return redirect(route('articles.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.details', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
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
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);

    }
}
