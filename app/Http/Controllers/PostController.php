<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Button;
use App\Setting;
use File;
use Storage;
use DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show', 'pesan']);
    }

    public function index()
    {
        $posts = Post::all()->sortByDesc('created_at');

        return view('post.index', compact(['posts']));
    }

    public function show($id)
    {
        $post = Post::with('gambar','size', 'varSize')->findOrFail($id);
        $sizes = $post->size->unique();
        $varSizes = $post->varSize->unique();
        $setting = Setting::first();
        $button = Button::where('page' , 'Product')->get();

        return view('post.show', compact(['post', 'button', 'setting', 'sizes', 'varSizes']));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'excellence' => 'required',
            'price' => 'required',
            'price_old' => 'required',
            'image' => 'required|image',
        ]);


        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'excellence' => $request->excellence,
            'price' => $request->price,
            'price_old' => $request->price_old,
        ]);

        $dir = 'img/post/' . $post->id . '/';
        $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
        $fileName = str_random() . '.' . $extension; // rename image
        $request->file('image')->move($dir, $fileName);
        $post->image = $dir . $fileName;
        $post->save();
        
        $buttons = Button::all();
        $post->button()->attach($buttons, ["total" => 0]);
        
        return redirect()->route('post.index');
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        return view('post.edit', compact(['post']));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'excellence' => 'required',
            'price' => 'required',
            'price_old' => 'required',
        ]);

        $post = Post::findOrFail($id);

        if ($request->hasFile('image')) {
            $dir = 'img/post/' . $id . '/';
            if (($post->image != '') && (File::exists($post->image))){
                File::delete($post->image);
            }
            $extension = strtolower($request->file('image')->getClientOriginalExtension()); // get image extension
            $fileName = str_random() . '.' . $extension; // rename image
            $request->file('image')->move($dir, $fileName);
            $post->image = $dir . $fileName;
        }

        $post->title = $request->title;
        $post->description = $request->description;
        $post->excellence = $request->excellence;
        $post->price = $request->price;
        $post->price_old = $request->price_old;
        $post->save();

        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        File::deleteDirectory(public_path('img/post/'.$id));
        foreach ($post->gambar as $gambar) {
           $gambar->delete();
        }
        $post->delete();

        return redirect()->route('post.index');
    }

    public function pesan(Request $request, $id){
        DB::table('stat_button')
            ->where('button_id', $request->button_id)
            ->where('post_id', $id)
            ->increment('total');
        $setting = Setting::first();
        $post = Post::find($id);
        return redirect('https://api.whatsapp.com/send?phone='.$setting->whatsapp.'&text=Saya%20tertarik%20untuk%20membeli%20'.$post->title);
    }
}
