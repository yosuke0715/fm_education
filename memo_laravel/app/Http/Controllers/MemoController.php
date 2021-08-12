<?php

namespace App\Http\Controllers;
use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;


class MemoController extends Controller
{
    //
        
    public function __construct()
    {
       // ログインしていなかったらログインページに遷移する（この処理を消すとログインしなくてもページを表示する）
        $this->middleware('auth');
    }

    public function addData(Request $request){
        //二重送信防止
        $request->session()->regenerateToken();
        $oneLetter = substr($request->comment, 0, 1);
        if($oneLetter == "#"){
            return self::colorPalette($request);
        }
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
            $fileName = $file->getClientOriginalName();
            $imgUrl = $request->thumbnail->storeAs('public', $fileName);
        }
        //データ追加機能
        $memo = new Memo();
        $memo->comment = $request->comment;
        if($request->hasFile('thumbnail')){
            $memo->file_path = $imgUrl;
        }
        $memo->save();
        return Memo::showComment();
    }
    
    public function delete($id){
        $targetId = Memo::where('id', $id);
        //削除機能
        $getFilePath = $targetId->first();
        $delFileExit = $targetId->select('file_path')->exists();
        if($delFileExit){
            Storage::delete($getFilePath);
        }
        $items = $targetId->delete();
        return Memo::showComment();
    }

    public function edit($id){
        //編集機能
        $comments = \DB::table('memo')->where('id', $id)->first();
        return view('edit')->with('comments',$comments);
    }
    
    public function update($id, Request $request){
        //上書き保存
        $oneLetter = substr($request->comment, 0, 1);
        if($oneLetter == "#"){
            \DB::table('memo')->where('id', $id)->update(['color_code' => $request->comment]);
        }
        \DB::table('memo')->where('id', $id)->update(['comment' => $request->comment]);
        return Memo::showComment();
    }

    public function search(Request $request){
        //検索機能
        $searchWord = $request->search;
        $oneLetter = substr($searchWord, 0, 1);
        if($searchWord == ""){
            $searchFieldKind = "EMPTY_WORD";
            return Memo::showComment($searchFieldKind);
        }
        if($oneLetter == "="){
            return self::searchGoogle($searchWord);
        }
        //検索ワードが格納されていた時の処理
        $targetWord = \DB::table('memo')->where('comment', 'LIKE', "%$searchWord%");
        if($targetWord->exists()){
            $items = $targetWord->get();
            $searchFieldKind = "REDISPLAY";
            return view('memo',['items' => $items, 'NULL' => $searchFieldKind]);
        } 
        //格納されていたが存在しなかったときの処理
        $searchFieldKind = "NOT_EXIT";
        return Memo::showComment($searchFieldKind);
    }

    public function allDelete(){
        $delFileExit = \DB::table('memo')->select('file_path')->exists();
        if($delFileExit){
            Storage::deleteDirectory('public');
        }
        $items = Memo::query()->delete();
        return Memo::showComment();
    }

    public function colorPalette($request){
        //隠しコマンド カラーパレット
        $colorCode = $request->comment;
        $memo = new Memo();
        $memo->comment = $colorCode;
        $memo->color_code = $colorCode;
        $memo->save();
        $items = \DB::table('memo')->get();
        return view('memo')->with('items', $items);
    }

    public function searchGoogle($searchWord){
        //隠しコマンドその２ Google検索機能
        return redirect("https://www.google.com/search?q$searchWord");
    }

    public function sortComment(Request $request){
        //並び替え機能
        //radioボタンは$request->nameでvalueの値が取得できるよ！
        $sortItem = $request->sort_radio_btn;
        $sortImg = $request->sort_img;
        $query = \DB::table('memo')->whereNull('deleted_at');

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
        return view('memo', ['items' => $items]);
    }

}

