<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Place;
use App\Traits\Common; 

class PlaceController extends Controller
{
    use Common;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $places = Place::latest()->take(6)->get();
        return view('place', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('addPlace');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string',
            'startPrice'=>'required',
            'endPrice'=>'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);

        $fileName = $this->uploadFile($request->image, 'assets/images');
        $data['image']= $fileName;
       
        Place::create($data);

        return 'done';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


        $place = Place::findORFail($id);

        return view('showPlace', compact('place'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
     * 
     * 
     * 
     */
    public function destroy(string $id)
    {


       place::where('id', $id)->delete();
        return redirect('place');
      
  //

    }



    public function trashed(){
        $cars =  place::onlyTrashed()->get();
        return view('trashedPlace', compact('place'));
    }
    public function restore(string $id): RedirectResponse
    {
        place::where('id', $id)->restore();
        return redirect('place');
    }

//     public function destroy(string $id) :RedirectResponse
//     {
//         Place::where('id', $id)->delete();;
//         return redirect('place');
// }
}
