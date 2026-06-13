<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="login">
        <h1 class="login-title">Login</h1>

        <div class="login-form">
            <form action="/login" method="POST">
                @csrf

                <div class="form-group">
                    <label>メールアドレス</label>
                    <input type="email" name="email">
                </div>

                <div class="form-group">
                    <label>パスワード</label>
                    <input type="password" name="password">
                </div>

                <button class="login-button" type="submit">ログイン</button>
            </form>
        </div>
    </div>
</body>
</html>