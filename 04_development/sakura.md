# さくらレンタルサーバ利用手順

## 参考URL
----------------------------------------

* <a href="https://help.sakura.ad.jp/hc/ja/articles/206106542" target="_blank">さくらのレンタルサーバ スタートアップ 目次</a>
* <a href="https://help.sakura.ad.jp/hc/ja/articles/206053952" target="_blank">レンタルサーバ-データベースの作成-追加-削除</a>



## ログイン
----------------------------------------

### 会員ログイン

* <a href="https://secure.sakura.ad.jp/auth/login" target="_blank">https://secure.sakura.ad.jp/auth/login</a>
	- 会員ID: xxxx
	- パスワード: xxxx

### コントロールパネルにログイン

* <a href="https://secure.sakura.ad.jp/rscontrol/rs/" target="_blank">https://secure.sakura.ad.jp/rscontrol/rs/</a>
* 契約情報 > 契約サービスの確認 > サーバ設定 > コントロールパネルが表示される



## データベース
----------------------------------------

### データベースの作成

1. サイドバー「アプリケーションの設定」から「データベースの設定」
2. 「データベースの新規作成」
3. 接続に必要な情報を入力して「データベースを作成する」

### 接続情報

* データベースサーバ: mysqlxxx.db.sakura.ne.jp
* データベース ユーザ名: xxxx
* データベース名: xxxx
* パスワード: xxxx

### 管理ツールログイン(phpMyAdmin)

1. 「データベース一覧」から「管理ツール ログイン」
2. 上記接続情報でログイン

### テーブル作成

1. phpMyAdminのサイドバーからデータベースを選択
2. 「SQL」を選択
3. 下記（例）を貼り付けて実行

```
CREATE TABLE tbl_name(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	name VARCHAR(256) NOT NULL
);
```


## BASIC認証
----------------------------------------

### アクセスを制限する

1. ファイルマネージャにログイン
2. アクセスを制限したいフォルダを選択した状態でメニューバーの「表示アドレスへの操作」
3. 「アクセス設定」
4. 「パスワード制限」から「パスワード制限を使用する」にチェックを入れる
5. 「接続元アクセス制限との併用」で「両方の許可がないとアクセス不能」
6. 「パスワードファイル」の「編集」
7. 「追加」
8. 「ユーザ名」「パスワード」を設定する
	- ユーザ名: xxxx
	- パスワード: xxxx

9. 「OK」で終わる



## ファイルアップロード
----------------------------------------

* <a href="https://secure.sakura.ad.jp/rscontrol/rs/fileman2/" target="_blank">https://secure.sakura.ad.jp/rscontrol/rs/fileman2/</a>

### ファイルマネージャを開く

1. サイドバー「運用に便利なツール」から「ファイルマネージャー」
2. メニューバー「アップロード」 > 「ファイルを追加」
3. ファイルを選択して「アップロード開始」
4. http://xxxx.sakura.ne.jp にブラウザからアクセスして確認

