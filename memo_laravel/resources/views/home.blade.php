@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<div class="main">
    <div class="container">
        <div class="form_area">
        <h2>簡易メモ帳</h2>
        <form action="" method="post">
            <p>メモ内容</p>
            <textarea name="comment" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="登録する">
        </form>
        </div>
    </div>
</div>
