<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\VarSize;

class VarSizeController extends Controller
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
        $varSizes = VarSize::all();

        return view('var-size.index', compact(['varSizes']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('var-size.create');
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
        ]);

        VarSize::create([
            'name' => $request->name,
        ]);

        return redirect()->route('var-size.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $varSize = VarSize::findOrFail($id);
        $varSize->delete();

        return redirect()->route('var-size.index');
    }
}
