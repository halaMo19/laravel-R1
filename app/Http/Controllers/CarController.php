<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Traits\Common;

use App\Models\Car;

use Symfony\Component\HttpFoundation\Test\Constraint\ResponseIsRedirected;


class CarController extends Controller
{
    use Common;
    private $columns = ['carTitle', 'description','published'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('cars', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addCar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $cars = new Car;
        // $cars->carTitle = $request->title;
        // $cars->description = $request->description;
        // if(isset($request->published)){
        //     $cars->published = true;
        // }else{
        //     $cars->published = false;
        // }
        // $cars->save();

        // $data = $request->only($this->columns);
        // $data['published'] = isset($data['published'])? true : false;

        // $request->validate([
        //     'carTitle'=>'required|string',
        //     'description'=>'required|string|max:100',
        // ]);
        // Car::create($data);
        // return'done';
        $messages=[
            'carTitle.required'=>'Title is required',
            'description.required'=>'Tshould de text',
        ];
        $date=$request->validate([
                'carTitle'=>'required|string',
                'description'=>'required|string',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ],$messages);

            $fileName = $this->uploadfile($request->image,'assets/images');
            $date['image']=$fileName;
            $date['published']=isset($request['published']);
            Car::create($date);
            // Car::create($data);
             return'done'; 

            // $date['published']=isset($request['published'])? 1:0;
            // Car::create($date);
            // return'done'; 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('carDetails',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrFail($id);
        return view('updateCar',compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // $data = $request->only($this->columns);
        // $data['published'] = isset($data['published'])? true:false;

        // Car::where('id', $id)->update($data);

        

        $messages=[
            'carTitle.required'=>'Title is required',
            'description.required'=>'Tshould de text',
        ];
        $date=$request->validate([
                'carTitle'=>'required|string',
                'description'=>'required|string',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ],$messages);

            $fileName = $this->uploadfile($request->image,'assets/images');
            $date['image']=$fileName;
            $date['published']=isset($request['published']);
            Car::create($date);
            // Car::create($data);
             return'done'; 


        Car::where('id', $id)->update($request->only($this->columns));
        return 'Updated';

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Car::where('id', $id)->delete();
        return redirect('cars');
    }

    public function trashed(){
        $cars = Car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }

    public function restore(string $id): RedirectResponse
    {
        Car::where('id', $id)->restore();
        return redirect('cars');
    }
}
