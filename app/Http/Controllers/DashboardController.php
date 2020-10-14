<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAction;
use App\Button;
use App\Post;
use App\Setting;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['landing', 'catalog']);
    }

    public function index()
    {
        $buttons = Button::all();
        $posts = Post::with('button')->get();
        
        return view('dashboard.index', compact('buttons', 'posts'));
    }

    public function activity()
    {
        $activities = UserAction::all()->sortByDesc('created_at');

        return view('dashboard.activity', compact(['activities']));
    }

    public function landing()
    {
        $posts = Post::all()->sortBy('created_at')->take(6);
        $setting = Setting::first();

        return view('landing', compact('posts', 'setting'));
    }

    public function catalog()
    {
        $posts = DB::table('posts')->simplePaginate(6);
        $setting = Setting::first();
        return view('catalog', compact('posts','setting'));
    }

}
