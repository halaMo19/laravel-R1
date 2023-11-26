<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('news');
        $new = news::get();

       return view("new",compact("new"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $new = new News();

        $new->newTitle = $request->Title;
        $new->author = $request->Author;
        $new->content = $request->Content;
        
        if(isset($request->Published)) {
            $new->published = true;
        } else {
            $new->published = false;
        }

        $new->save();

        return "News added successfully";

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $new = New::findOrFail($id);
        return  view ('updateCar',compact('new'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
