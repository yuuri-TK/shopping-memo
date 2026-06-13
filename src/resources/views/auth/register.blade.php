<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
</head>
<body>

    <h1>会員登録</h1>

    <form action="/register" method="POST">
        @csrf

        <div>
            <label>名前</label>
            <input type="text" name="name">
        </div>

        <div>
            <label>メールアドレス</label>
            <input type="email" name="email">
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" name="password">
        </div>

        <button type="submit">登録</button>
    </form>

</body>
</html>