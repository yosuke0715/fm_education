@extends('layouts.app')
@section('content')
<?php $LOCALHOST_URL = 'http://localhost:8888/laravel/original_memo/memo'; ?>
<main>
    <div class="container flex">
        <div class="form_area">
            <h2>簡易メモ帳</h2>
            <form action="{{$LOCALHOST_URL}}/public/register"
                enctype="multipart/form-data" method="post" name="comment_form" onsubmit="return check()">
                @csrf
                <p>メモは全部で{{count($items)}}個あります。</p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <textarea name="comment" id="comment" cols="30" rows="3"></textarea>
                <input type="file" id="thumbnail" name="thumbnail" class="thumbnail">
                <input type="reset" value="リセット" class="reset_btn">
                <input type="submit" name="submit" value="登録する">
            </form>
            <div class="omikuji_area">
                <button class="omikuji_btn">おみくじをひく</button>
                <h3 class="omikuji_name">今日の運勢は？？？</h3>
                <p class="omikuji_text"></p>
            </div>
            <div class="img_btn_area">
                <input type="button" value="全ての画像をみる" class="img_btn">
            </div>
            <div class="history_area">
                <input type="button" value="最近削除したメモをみる" class="history_btn">
            </div>
        </div>
        <div class="memo_area">
            <form action="{{$LOCALHOST_URL}}/public/search" method="post"
                class="search_area">
                @csrf
                <input type="search" name="search" id="search">
                <input type="submit" value="検索する" name="search_btn" class="search_btn">
            </form>
            <input type="button" value="↓並び替える" name="sort_btn" class="sort_btn">
            <input type="button" value="メモを全て削除" name="all_delete" class="all_delete">
            <form action="{{$LOCALHOST_URL}}/public/sort" method="post"
                class="sort_area display_none">
                @csrf
                <input class="sort_radio_btn" type="radio" name="sort_radio_btn" id="sort_new" value="sort_new"
                    checked><label class="sort_text" for="sort_new">新しいメモ順にする</label>
                <input class="sort_radio_btn even" type="radio" name="sort_radio_btn" id="sort_old"
                    value="sort_old"><label class="sort_text" for="sort_old">古いメモ順にする</label><br>
                <input class="sort_radio_btn" type="radio" name="sort_radio_btn" id="sort_a_z" value="sort_a_z"><label
                    class="sort_text" for="sort_a_z">五十音順に並べる</label>
                <p style="text-align:center;">----------------- 画像について ------------------</p>
                <input class="sort_radio_btn " type="radio" name="sort_img" id="img_true" value="img_true"><label
                    class="sort_text" for="img_true">画像があるやつだけ</label>
                <input class="sort_radio_btn even" type="radio" name="sort_img" id="img_false" value="img_false"><label
                    class="sort_text" for="img_false">画像なしだけ</label><br>
                <input class="sort_radio_btn " type="radio" name="sort_img" id="img" value="img" checked><label
                    class="sort_text" for="img">画像あるなし関係なく表示する</label>
                <input type="submit" value="並び替える" class="sort_submit" name="sort_submit">
            </form>
            @if(!empty($searchFieldKind))
                @if($searchFieldKind == "EMPTY_WORD")
                    <p style="color:red; font-weight:bold; margin-left:30px;">検索ワードを入力してください。</p>
                @elseif($searchFieldKind == "NOT_EXIT")
                    <p style="color:red; font-weight:bold; margin-left:30px;">このワードの検索結果はありません。</p>
                @elseif($searchFieldKind == "REDISPLAY")
                    <p style="font-weight:bold; margin-left:30px;">もう一度全て表示するには検索ボタンをクリックしてください。</p>
                @endif
            @endif
            <ul class="memo_list">
                @foreach ($items as $item)
                @if(empty($item->color_code))
                    <li class="memo_list_item" style="background-color:#72cccd;">
                @else
                    <li class="memo_list_item" style="background-color: {{ $item->color_code }} ;">
                @endif
                    <span>
                        @if(isset($item->file_path))
                            <img src="{{$LOCALHOST_URL}}/storage/app/{{ $item->file_path }}"
                            alt="写真"><br>
                        @endif {{ $item->comment }}
                    </span>
                    <input name="edi_btn" class="edi_btn" type="button" value="編集する">
                    <input type="hidden" name="comment_id" value="{{ $item->id }}">
                    <input name="del_btn" class="del_btn" type="button" value="×">
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</main>
@endsection