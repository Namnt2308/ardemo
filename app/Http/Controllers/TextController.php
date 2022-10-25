<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        return view('createText');
    }

    public function createText(Request $req)
    {
        $text = $req->input('text');
        Text::create([
            'text' => $text
        ]);
        return view('showText', ['text' => $text]);
    }
}
