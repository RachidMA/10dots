<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(){
        return view('testing.Contact');
    }

    public function store(Request $request){
        $info = [
            'name' => 'required|min:3',     
            'email' => 'required|email',   
            'message' => 'required|min:10',
        ];

        $request->validate($info);

        // $name = $request->input('name');
        // $email = $request->input('email');
        // $message = $request->input('message');
    

    }
}
