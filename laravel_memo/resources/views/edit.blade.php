@extends('layouts.app')
@section('content')
<div class="main">
    <div class="container flex">
        <div class="form_area">
        <h2>簡易メモ帳【編集画面】</h2>
        <form action="http://localhost:8888/laravel/original_memo/memo/public/update/{{ $comments->id }}" method="post" name="edit_form" onsubmit="return checkEdit()">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <textarea name="comment" id="" cols="30" rows="3">{{ $comments->comment }}</textarea>
            <input type="submit" name="submit" value="編集する">
        </form>
        </div>
    </div>
</div>
@endsection