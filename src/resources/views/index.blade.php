<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Shopping Memo</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">

        <h1>Shopping Memo</h1>

        <form action="/logout" method="POST">
            @csrf
            <button type="submit">ログアウト</button>
        </form>

        <form action="/" method="GET" class="search-form">
            <input
                type="text"
                name="keyword"
                value="{{ $keyword ?? '' }}"
                placeholder="店名・商品名・産地で検索"
            >

            <button type="submit">検索</button>

            <a href="/">リセット</a>
        </form>

        <form class="form" action="/store" method="POST">
            @csrf

            @if ($errors->any())
        <div style="color: red;">
            入力されていない項目があります
        </div>
            @endif

            <div>
                <label>店名</label>
                <input type="text" name="shop">
            </div>

            <div>
                <label>商品名</label>
                <input type="text" name="name">
            </div>

            <select name="origin">
                <option value="">産地を選択</option>
                <option value="国産">国産</option>
                <option value="外国産">外国産</option>
            </select>

            <div>
                <label>値段</label>
                <input type="number" name="price">
            </div>

            <div>
                <label>個数</label>
                <input type="number" name="quantity">
            </div>

            <button type="submit">追加</button>
        </form>

            <table>
                <tr>
                    <th>店名</th>
                    <th>商品名</th>
                    <th>産地</th>
                    <th>値段</th>
                    <th>個数</th>
                    <th>小計</th><th>削除</th>
                </tr>

                @foreach ($memos as $memo)
                <tr>
                    <td>
                        <form action="/update/{{ $memo->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="text" name="shop" value="{{ $memo->shop }}">
                    </td>

                    <td>
                            <input type="text" name="name" value="{{ $memo->name }}">
                    </td>

                    <td>
                        <select name="origin">
                            <option value="">産地を選択</option>
                            <option value="国産" {{ $memo->origin === '国産' ? 'selected' : '' }}>国産</option>
                            <option value="外国産" {{ $memo->origin === '外国産' ? 'selected' : '' }}>外国産</option>
                        </select>
                    </td>

                    <td>
                            <input type="number" name="price" value="{{ $memo->price }}">
                    </td>

                    <td>
                            <input type="number" name="quantity" value="{{ $memo->quantity }}">
                    </td>

                    <td>{{ $memo->price * $memo->quantity }}円</td>

                    <td>
                            <button type="submit">更新</button>
                        </form>

                        <form action="/delete/{{ $memo->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('本当に削除しますか？')">
                                削除
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
            <h2 class="total">合計: {{ $total }}円</h2>
        </form>
    </div>

</body>
</html>