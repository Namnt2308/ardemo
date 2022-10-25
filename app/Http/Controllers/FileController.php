<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index()
    {
        return view('upload');
    }
    public function upload(Request $req)
    {
        $filename= null;
        if($req->hasFile('file'))
        {

            $file = $req->file('file');
            $filename = $file->getClientOriginalName();
            $path=$file->storeAS('public/uploads',$filename);
        }
        File::create([
                'path' => $path
        ]);
        
        return view('show', ['filename' => $filename]);
    }
}
