<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Memo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $table = 'memo';
    protected $fillable = ['comment'];

    public function scopeShowComment($NULL = false){
        //メモを表示
        $items = \DB::table('memo')->whereNull('deleted_at')->get();
        return view('memo', ['items' => $items, 'NULL' => $NULL]);
    }

}

