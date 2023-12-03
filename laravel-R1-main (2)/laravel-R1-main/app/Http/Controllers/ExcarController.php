<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExcarController extends Controller
{
    public function car(){
        return view("car");
    }

    public function addcar(Request $request) {
        $form = $request->all();

        if(isset($form["Published"])) {
            $published = "published";
        } else {
            $published = "not published";
        }

        $form["Published"] = $published;

        return view('addcar', $form);
    }
}
