<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Button;
use App\Post;

class ButtonController extends Controller
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
     public function index()
    {
        $buttons = Button::all();
        return view('button.index', compact(['buttons']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('button.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'page' => 'required',
        ]);

        $button = Button::create([
                    'name' => $request->name,
                    'page' => $request->page,
                ]);

        $posts = Post::all();
        $button->post()->attach($posts ,['total' => 0]);

        return redirect()->route('button.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $button = Button::findOrFail($id);
        $button->delete();

        return redirect()->route('button.index');
    }
}
