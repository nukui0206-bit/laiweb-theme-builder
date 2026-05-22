# Claude Code 引き継ぎ指示書

## プロジェクト概要

既存のWordPressテーマ3種類を参考に、案件ごとに高品質なサイトを作りやすい統合テーマを開発している。

目的は「完全ノーコードテーマ」ではなく、既存の制作フローを残しながら共通化できる部分だけ管理画面化すること。

既存制作フロー:

```text
WordPressをインストール
coreファイルをFTPで配置
All-in-One WP Migrationで既存テンプレートを移行
ACFでカスタムフィールドを調整
index.phpを編集
include内のパーツを編集
add.css / style.cssでデザイン調整
各ページを制作
```

新テーマの方針:

```text
管理画面で基本的なON/OFFやパターン選択をできるようにする
index.php / include / add.css の自由度は残す
既存データや既存サイトの表示を壊さない
既存のcore依存は短期的に維持する
```

## リポジトリ

```text
git@github.com:nukui0206-bit/laiweb-theme-builder.git
```

ローカル作業場所:

```text
C:\Users\y-nuk\Documents\Codex\wp-theme-builder
```

メインの作業テーマ:

```text
new-theme/lai-template
```

参考コピー:

```text
sources/laiweb/theme-doc
sources/town-suido/theme-doc
sources/4foot4/theme-doc
sources/laiweb/core
sources/town-suido/core
sources/4foot4/core
```

`sources/` はGit管理外。

## テストサイト

```text
http://laiwebcms.com/
```

WordPress本体:

```text
/home/laide/laiwebcms.com/public_html/cms
```

テーマ:

```text
/home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template
```

core:

```text
/home/laide/laiwebcms.com/core
```

管理画面:

```text
http://laiwebcms.com/cms/wp-admin/
```

現在、WordPress本体は `/cms` に置き、表側だけドメイン直下で表示している。

直下ファイル:

```text
/home/laide/laiwebcms.com/public_html/index.php
```

中身は `/cms/wp-blog-header.php` を読み込む形。

`index.html` は `index.html.bak-20260522` に退避済み。

## 現在の実装済み内容

### 1. テーマ名と基本メタ

`style.css` は仮名で以下に変更済み。

```text
Theme Name: Lai Template
Text Domain: lai-template
Version: 0.1.0
```

テーマ名は仮。後から正式名称に変更予定。

### 2. domain固定解除

`new-theme/lai-template/functions.php` の `ACTIVATE_DOMAIN` は、`laiweb.jp` 固定ではなく現在の `home_url()` から取得するように変更済み。

### 3. コンテンツ機能レジストリ

ファイル:

```text
new-theme/lai-template/function/content-modules.php
```

役割:

```text
カスタム投稿/コンテンツ機能を中央管理
初期設定の content_type の選択肢を生成
ON/OFFに応じて管理画面メニューを表示/非表示
トップページ部品側からON/OFF判定できるヘルパーを提供
```

主要関数:

```text
lai_template_content_modules()
lai_template_content_module_choices()
lai_template_enabled_content_modules()
lai_template_is_content_module_enabled($key)
lai_template_can_show_content_module($key)
lai_template_content_module_post_type($key)
```

注意:

```text
OFFにしても投稿データは削除しない
CPT自体も不用意に未登録化しない
まずは管理メニューやトップ部品の表示制御だけに使う
CPT UIで登録済みの投稿タイプと重複登録しない
```

現在の主要モジュール:

```text
news: お知らせ
voice: お客様の声
faq: よくある質問
case: 制作実績/施工事例
column: コラム
gallery: ギャラリー
product: 商品紹介
recruits: 採用情報
staff: スタッフ
project: プロジェクト
interview: インタビュー
catalog: カタログ
lineup: ラインナップ
```

`case` は既存互換のため、保存値を `実績・事例` にしている。表示ラベルは `制作実績/施工事例`。

### 4. トップページ部品

ディレクトリ:

```text
new-theme/lai-template/include/top-sections/
```

作成済み:

```text
latest-posts.php
voice.php
faq.php
```

`latest-posts.php`:

```text
news / column / case の新着一覧
ONかつ投稿タイプが存在するものだけ表示
1件種なら1カラム、2件種なら2カラム、3件種なら3カラム
```

`voice.php`:

```text
お客様の声を最大3件表示
ONかつ投稿タイプが存在し、公開投稿がある時だけ表示
```

`faq.php`:

```text
FAQを最大5件表示
ONかつ投稿タイプが存在し、公開投稿がある時だけ表示
```

### 5. トップページ表示セクション設定

ファイル:

```text
new-theme/lai-template/function/top-sections.php
```

役割:

```text
ACFローカルフィールドで「トップページ表示セクション」を初期設定に追加
index.phpで選択済みセクションだけ表示
```

追加先:

```text
ACF options_page: theme-general-settings
管理画面名: 初期設定
```

フィールド:

```text
name: top_sections
label: トップページ表示セクション
type: checkbox
```

現在の選択肢:

```text
latest-posts: 新着一覧
voice: お客様の声
faq: よくある質問
```

保存値がない場合は、互換性のため以下をデフォルトで有効にする。

```text
latest-posts
voice
faq
```

`index.php` 側は以下のようなループで表示する。

```php
<?php foreach (lai_template_enabled_top_sections() as $top_section) : ?>
  <?php get_template_part('include/top-sections/' . $top_section); ?>
<?php endforeach; ?>
```

## 現在のテストサイト状態

`content_type` は以下がON。

```text
お知らせ
お客様の声
よくある質問
実績・事例
コラム
```

実際のトップ表示:

```text
NEWS
COLUMN
CASE
FAQ
```

`voice` はONだが、公開投稿が0件のためトップでは非表示。

確認済み:

```text
http://laiwebcms.com/ は 200 OK
ACFローカルフィールド group_lai_template_top_sections 登録OK
PHP構文チェックOK
```

## 次にやるとよい作業

### 優先1: トップセクション並び順の改善

今は `top_sections` がcheckboxなので、表示/非表示は管理画面から選べるが、並び順はテーマ側の選択肢順に依存する。

次の候補:

```text
select multiple に変更して並び順を扱いやすくする
または ACF Repeater で section key を選ぶ形にしてドラッグ並び替えを可能にする
```

おすすめ:

```text
最終的には Repeater がよい。
ただしまずは小さく進めるなら select multiple でも可。
```

ただし、既に `top_sections` がcheckboxで保存されるため、変更時は既存保存値との互換に注意。

### 優先2: トップセクション候補追加

候補:

```text
service
cta
gallery
product
recruits
staff
```

追加時は必ず `function/top-sections.php` のレジストリと `include/top-sections/*.php` をセットで追加する。

### 優先3: ヘッダー選択式

設計済みだが未実装。

想定:

```text
include/headers/
include/header.php をディスパッチャー化
ACF option: header_layout
```

既存の `include/header.php` と `include/nav.php` の関係を壊さないこと。

### 優先4: フッター選択式

想定:

```text
include/footers/
include/footer.php をディスパッチャー化
ACF option: footer_layout
```

### 優先5: ローディング選択式

既存テーマにはpreloaderがある。

想定:

```text
loading_enabled
loading_layout
loading_scope
```

## 開発時の注意点

```text
既存のindex.phpを一気に全部ビルダー化しない
index.php / include / add.css で作り込む自由度を残す
管理画面項目を増やしすぎない
OFFにした機能のデータを削除しない
CPT UIやACFで登録済みの投稿タイプを重複登録しない
本番サイトではなく laiwebcms.com で検証する
```

サーバーへ反映する時は、変更ファイルだけを `scp` でテーマへ送る運用でよい。

例:

```text
new-theme/lai-template/function/top-sections.php
→ /home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template/function/top-sections.php
```

PHP構文チェック:

```text
ローカル:
C:\laragon\bin\php\php-8.3.30-Win32-vs16-x64\php.exe -l 対象ファイル

サーバー:
php -l /home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template/対象ファイル
```

## 直近コミット

```text
830bbda Add top section admin settings
eae8f99 Add voice and faq top sections
df3832c Add latest posts top section
f281955 Add content module template helpers
77ede06 Add content module registry
df90001 Document content module settings strategy
9bff349 Initialize Lai Template theme identity
```

## 参照すべき設計書

```text
docs/development-roadmap.md
docs/content-modules-audit.md
docs/implementation-plan.md
docs/design-parts.md
docs/audit.md
```
