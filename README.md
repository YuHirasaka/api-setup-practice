# api-setup-practice

## 概要
COACHTECH 教材 Tutorial 11-1「API開発環境の構築と疎通確認」で作成した成果物です。


## 使用技術
- PHP 8.x
- Laravel 10.x
- REST API（JSONレスポンス）
- Postman（動作確認）


## 学んだこと
- apiの基本概念（リソース、HTTPメソッド、ステータスコード）
- LaravelでのAPIルート（routes/api.php)の書き方
- Postmanを使ったAPIリクエスト送信とレスポンス確認

## 動作確認
Postmanで動作確認をします。

1. Postmanを起動する
2. 「+」タブをクリックして新しいリクエストを作成
3. メソッド: GET
4. URL: http://localhost/api/hello
5. 「send」ボタンをクリック
6. 以下のレスポンスが返ってくることを確認します。
```
{
    "message": "Hello, API!"
}
```
