<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\News;
use GuzzleHttp\Client;


class NewsController extends Controller
{
    private $columns = ['Title','content','author','published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news =News ::get();

        return view('news',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('addNews');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $news = new News();
        // $news->Title = $request->Title;
        // $news->content = $request->content;
        // $news->author = $request->author;
        // $published =$request->published;
        // if($published){
        //     $news->published=true;
        // }
        // else{
        //     $news->published=false;
        // }
         

        // $news->save();
        // return "news data added successfully";

        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;

        $request->validate([
            'Title'=>'required|string',
            'description'=>'required|string|max:100',
        ]);
        news::create($data);
        return'done';
    }


    // }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News ::findOrFail($id);
        return view('newsDetails',compact('news'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail( $id);
        return view('updateNews',compact('news'));
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->only($this->columns);
        $data['published'] = isset($data['published'])? true:false;

        News::where('id', $id)->update($data);

      
         return "Data Updated Successfully";
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(string $id): RedirectResponse
    {
        news::where('id', $id)->delete();
        return redirect(' News');
    }

    public function trashednew(){
        $news = news::onlyTrashed()->get();
        return view('trashednew', compact(' News'));
    }
    
    public function restore(string $id): 
    {
        news::where('id',$id)->delete();
        return 'Data Deleted Successfully';
    }


    public function restore(string $id): RedirectResponse
    {
        news::where('id', $id)->restore();
        return redirect('News');
    }

    public function delete(string $id): RedirectResponse
    {
        news::where('id', $id)->fordelete();
        return redirect('trashednew');
    }


}
