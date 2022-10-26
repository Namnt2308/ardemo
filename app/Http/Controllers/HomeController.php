<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $texts = Text::all();
        return view('home', compact('texts'));
    }

    public function createText(Request $req)
    {
        $text = $req->input('text');
        Text::create([
            'content' => $text
        ]);
        return redirect('/');
    }

    

    public function showText($id)
    {
        Text::find($id)->increment('viewer');
        $text = Text::where('id', $id)->first();
        $viewer= Text::find($id);

        return view('showText', compact('text'));
    }


    public function editText($id)
    {
        $text = Text::find($id);
        return view('editText', compact('text'));
    }

    public function deleteText($id)
    {
        $text = Text::find($id);
        $text->delete();
        return redirect('/');
    }
}
