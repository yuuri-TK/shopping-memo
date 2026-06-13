# Shopping Memo

＃作成した機能
・ユーザー認証
会員登録
ログイン
ログアウト

・メモ管理
メモ追加
メモ編集
メモ削除

・商品情報
店名登録
商品名登録
産地登録（国産・外国産）
値段登録
個数登録
小計表示
合計金額表示

・検索機能
店名検索
商品名検索
産地検索

・使用技術
PHP
Laravel
MySQL
Docker
HTML
CSS

テーブル設計
users
カラム名	型
id	        bigint
name	    string
email	    string
password	string
memos
カラム名	型
id	        bigint
shop	    string
name	    string
origin	    string
price	    integer
quantity	integer
created_at	timestamp
updated_at	timestamp