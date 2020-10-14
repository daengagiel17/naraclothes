<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gambar;
use File;

class GambarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index($post_id)
    {
        $gambars = Gambar::where('post_id', $post_id)->get();

        return view('gambar.index', compact(['gambars', 'post_id']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_id)
    {
        return view('gambar.create', compact(['post_id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {
        $request->validate([
            'url' => 'image|required',
        ]);

        $dir = 'img/post/' . $post_id . '/';
        $extension = strtolower($request->file('url')->getClientOriginalExtension()); // get image extension
        $fileName = str_random() . '.' . $extension; // rename image
        $request->file('url')->move($dir, $fileName);

        Gambar::create([
            'url' => $dir . $fileName,
            'post_id' => $post_id,
        ]);

        return redirect()->route('gambar.index', ["post_id" => $post_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_id, $id)
    {
        $gambar = Gambar::findOrFail($id);
        File::delete($gambar->url);
        $gambar->delete();

        return redirect()->route('gambar.index', ["post_id" => $post_id]);
    }
}
