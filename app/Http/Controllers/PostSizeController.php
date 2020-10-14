<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Size;
use App\VarSize;
use DB;

class PostSizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($post_id)
    {        
        $post = Post::with('size', 'varSize')->find($post_id);
        $sizes = $post->size->unique();
        $varSizes = $post->varSize->unique();

        return view('post-size.index', compact(['post', 'sizes', 'varSizes']));
    }

    public function create($post_id)
    {
        $post = Post::with('size', 'varSize')->find($post_id);
        $sizes = Size::all();
        $varSizes = VarSize::all();

        return view('post-size.create', compact('post', 'sizes', 'varSizes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $varSizesPost = $post->varSize->unique()->pluck('id');
        $sizesPost = $post->size->unique()->pluck('id');
        
        foreach ($request->var_size_id as $value) {
            $post->size()->attach($request->size_id, [ 'var_size_id' => $value ]);
        }  

        return redirect()->route('post-size.index',[ 'post_id' => $post->id ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($post_id)
    {
        $post = Post::with('size', 'varSize')->find($post_id);
        $sizes = $post->size->unique();
        $varSizes = $post->varSize->unique();

        return view('post-size.edit', compact(['post', 'sizes', 'varSizes']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post_id)
    {
        $post = Post::find($post_id);
        $varSizesPost = $post->varSize->unique()->pluck('id');
        $sizesPost = $post->size->unique()->pluck('id');

        foreach ($sizesPost as $sizePost) {
            foreach ($varSizesPost as $varSizePost) {
                $tes = DB::table('post_size')
                        ->where('post_id', '=', $post_id)
                        ->where('size_id', '=', $sizePost)
                        ->where('var_size_id', '=', $varSizePost)
                        ->update(['number' => $request->number[$sizePost][$varSizePost] ]);
            }            
        }

        return redirect()->route('post-size.index',[ 'post_id' => $post->id ]);
    }

    public function destroy(Request $request, $post_id)
    {
        $post = Post::find($post_id);

        $post->size()->detach();

        return redirect()->route('post-size.index',[ 'post_id' => $post->id ]);
    }

}
