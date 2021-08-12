@extends('layouts.app')
@section('content')
<div class="main">
    <h2 class="list_title">写真リスト</h2>
    <input type="button" value="メモに戻る" name="back_btn" class="back_btn">
    <div class="container">
        <div class="img_area">
            @if($photograph->isEmpty())
            <p style="color:red; font-weight:bold;">写真が存在しません。</p> 
            @endif
            @foreach($photograph as $photo)
            <div class="img_item">
                <img src="{{ 'http://localhost:8888/laravel/original_memo/memo/storage/app/'.$photo->file_path }}"
                    alt="写真">
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection