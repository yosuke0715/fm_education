<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistoryController extends Controller
{
    //
    public function history(){
        $items = \DB::table('memo')->whereNotNull('deleted_at')->get();
        return view('history', ['items' => $items]);
    }

    public function historyAdd($id){
        $items = Memo::where('id', $id)->restore();
        return Memo::showComment();
    }

    public function historySort(Request $request){
        //並び替え機能
        //radioボタンは$request->nameでvalueの値が取得できるよ！
        $sortItem = $request->sort_radio_btn;
        $sortImg = $request->sort_img;
        $query = \DB::table('memo')->whereNotNull('deleted_at');

        if($sortItem == "sort_new"){
            $query->orderBy('created_at','desc');

        }elseif($sortItem == "sort_old"){
            $query->orderBy('created_at','asc');

        }elseif($sortItem == "sort_a_z"){
            $query->orderBy('comment','asc');
        }

        if($sortImg == "img_true"){
            $query->whereNotNull('file_path');
        }elseif($sortImg == "img_false"){
            $query->whereNull('file_path');
        }
        $items = $query->get();
        return view('history', ['items' => $items]);
    }

    public function historySearch(Request $request){
        //検索機能
        $searchWord = $request->search;
        $oneLetter = substr($searchWord, 0, 1);
        if($searchWord == ""){
            $searchFieldKind = "EMPTY_WORD";
            $items = \DB::table('memo')->whereNotNull('deleted_at')->get();
            return view('history', ['items' => $items,'NULL' => $searchFieldKind]);
        }
        //検索ワードが格納されていた時の処理
        $targetWord = \DB::table('memo')->where('comment', 'LIKE', "%$searchWord%");
        if($targetWord->exists()){
            $items = $targetWord->get();
            $searchFieldKind = "REDISPLAY";
            return view('history',['items' => $items, 'NULL' => $searchFieldKind]);
        } 
        //格納されていたが存在しなかったときの処理
        $searchFieldKind = "NOT_EXIT";
        $items = \DB::table('memo')->whereNotNull('deleted_at')->get();
        return view('history', ['items' => $items,'NULL' => $searchFieldKind]);

    }
}