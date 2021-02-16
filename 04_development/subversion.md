Subversion
==============================

## 概要

### バージョン管理とは

* ソフトウェアの変更をコントロール
* 成果物の橋渡し
* 本来の責務に注力する

### 集中型

* 単一リポジトリ
* 常時接続

### 分散型

* 複数(分散)リポジトリ
* オフライン可

### リポジトリ

* 成果物の格納
* 成果物のバージョン化
* 成果物の構成/関係をバージョン化

### 作業領域

* 成果物の識別
* 成果物の取得と更新
* 利用と引き渡し

### チェックアウト

* リポジトリから作業領域へ取り出す

### チェックイン、コミット

* 変更をリポジトリに反映

### コンフリクト

* 同じソースコードに対して違う変更がされて衝突した状態



## 準備

### インストール

```
xcode-select --install
Command Line Developer Tools
```

### 動作確認

```
svn --version
svnadmin --version
```



## 基本操作

* リポジトリ作成(svnadmin create)
* チェックアウト(svn checkout)
* ステータス確認(svn status)
* ファイル追加(svn add)
* コミット(svn commit)
* リポジトリ更新(svn update)
* ログの確認(svn log)
* 変更内容の確認(svn blame)
* 差分の確認(svn diff)
* ファイルをロック(svn lock)
* ファイルをアンロック(svn unlock)

** 自分のコミットを行う前に、アップデートをして他者の修正を取り込んでおく



## 作業手順

### リポジトリ作成

```
cd repository
svnadmin create testrepository
```

### チェックアウト

```
cd work
svn checkout file:///Users/user_name/__svn/remote_repository/test/testrepository
cd testrepository
```

### ファイル作成

```
echo "# Hello, SVN" > README.md
```

### ステータス確認

```
svn status
```

* ?  : バージョン管理下に入っていないファイルを示す
* A  : バージョン管理下に追加予定
* M  : 修正された
* '' : 変更なし
* D  : 削除された
* I  : 無視されている(svn:ignore)
* C  : 競合している
* K  : ロックがかかっている

### ファイル追加

```
svn add README.md
svn status
```

### コミット

```
svn commit -m "initial commit"
svn status -v
```

### リポジトリ更新

```
svn update
svn status -v
```

### ファイル編集、コミット、リポジトリ更新

```
echo "## modified" >> README.md
svn status

svn commit -m "modified"
svn status -v

svn update
svn status -v
```

### ログの確認

```
svn log -v
```

### 変更内容を確認

```
svn blame README.md
```

### 差分を確認

```
svn diff README.md
```

### ファイルをロック、アンロック
* 他の人に修正してほしくないファイルをロックできる
* コミットが完了するとロックが自動的に解除される

```
svn lock README.md
svn unlock README.md
```

<br>


# SVN


## tortoisesvn

### Download

#### 本体と日本語パッケージ

* <a href="https://tortoisesvn.net/downloads.html" target="_blank">https://tortoisesvn.net/downloads.html</a>
* <a href="https://ja.osdn.net/projects/tortoisesvn/releases/" target="_blank">https://ja.osdn.net/projects/tortoisesvn/releases/</a>

#### 参考URL

* <a href="http://tracpath.com/bootcamp/learning_tortoisesvn.html" target="_blank">http://tracpath.com/bootcamp/learning_tortoisesvn.html</a>
* <a href="https://mag.osdn.jp/08/08/29/0550232" target="_blank">https://mag.osdn.jp/08/08/29/0550232</a>

### インストール

* デフォルトで本体インストール
* 日本語化
