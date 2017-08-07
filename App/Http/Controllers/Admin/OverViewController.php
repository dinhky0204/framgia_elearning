<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OverViewController extends Controller
{
    public function overview(){
        return view('admin.contents.overview');
    }
}
