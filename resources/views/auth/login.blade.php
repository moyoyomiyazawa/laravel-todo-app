@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-offset-3 col-md-6">
                <div class="text-left text-muted" >
                    <p>
                        テストアカウント<br>
                        メールアドレス: test@test.com<br>
                        パスワード: abcd1234
                    </p>
                </div>
                <nav class="panel panel-default">
                    <div class="panel-heading">ログイン</div>
                    <div class="panel-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $message)
                                    <p>{{ $message }}</p>
                                @endforeach
                            </div>
                        @endif
                        <form action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">メールアドレス</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}">
                            </div>
                            <div class="form-group">
                                <label for="password">パスワード</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">送信</button>
                            </div>
                        </form>
                    </div>
                </nav>
                <div class="text-right">
                    <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>
                </div>
            </div>
        </div>
    </div>
@endsection
