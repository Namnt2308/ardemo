<?php

namespace App\Http\Controllers;

use App\Models\Text;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class HomeController extends Controller
{
    private $session;
    public function __construct(Store $session)
    {
        $this->session = $session;
    }


    public function index()
    {
        $texts = Text::all();
        return view('home', compact('texts'));
    }
    //CREATE TEXT
    public function createText(Request $req)
    {
        $text = $req->input('text');
        Text::create([
            'content' => $text
        ]);
        return redirect('/');
    }

    //EDIT TEXT

    public function editText($id)
    {
        $text = Text::find($id);
        return view('editText', compact('text'));
    }

    public function updateText(Request $request, $id)
    {
        $text = Text::find($id);
        $text->content = $request->input('text');
        $text->save();
        return redirect('/');
    }
    //DELETE TEXT
    public function deleteText($id)
    {
        $text = Text::find($id);
        $text->delete();
        return redirect('/');
    }

    //SHOW TEXT 3D BY ID

    public function showText($id)
    {
        $texts = Text::find($id);
        if (!$this->isTextViewed($texts))
	    {
	        $texts->increment('viewer');
	        $this->storeText($texts);
	    }
        // $texts->increment('viewer');
        $text = Text::where('id', $id)->first();
        $viewer = Text::find($id);

        return view('showText', compact('text'));
    }

    private function isTextViewed($texts)
    {
        $viewed = $this->session->get('viewed_texts', []);
        return in_array($texts->id, $viewed);
    }

    private function storeText($texts)
    {
        $key = 'viewed_texts.' . $texts->id;

        $this->session->put($key, time());
    }
}
