<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OverViewController extends Controller
{
    public function overview(){
        return view('admin.contents.overview');
    }
}
