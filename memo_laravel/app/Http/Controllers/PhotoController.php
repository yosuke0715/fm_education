<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Memo;


class PhotoController extends Controller
{
    //
    public function showImage(){
        $photograph = \DB::table('memo')->whereNull('deleted_at')->whereNotNull('file_path')->get();
        return view('img')->with('photograph', $photograph);
    }
}
