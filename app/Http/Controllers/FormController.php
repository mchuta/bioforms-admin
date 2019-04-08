<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class FormController extends Controller
{
    public function index($id)
    {
        
        $form = null;
        if (auth()->user()->forms) {
            $form = auth()->user()->forms[$id];
        }
        return view('form', ['form' => $form]);
    }

    public function data($id)
    {
        
        $form = null;
        if (auth()->user()->forms) {
            $form = auth()->user()->forms[$id];
        }
        return view('formdata', ['form' => $form]);
    }

    public function edit($id)
    {
        
        $form = null;
        if (auth()->user()->forms) {
            $form = auth()->user()->forms[$id];
        }
        return view('formedit', ['form' => $form]);
    }
}
