# Laiweb統合テーマ 開発設計書

## 1. 開発目的

今回の開発は、既存の `doc` テーマを単純に合体する作業ではなく、既存の制作フローを活かした新しい統合WordPressテーマ `lai-template` を作ることを目的とする。

現在の制作フロー:

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

目標の制作フロー:

```text
WordPressをインストール
lai-templateを配置
必要に応じてcoreを配置、または将来的にテーマ/プラグイン内包
管理画面で基本デザイン・ヘッダー・フッター・CTA・ローディングを選択
index.php / include / add.cssで案件固有の自由な作り込み
各ページを制作
```

重要な方針:

```text
管理画面で全部作れるテーマにはしない。
制作スピードを上げるための共通化に留める。
高度なデザインや案件固有の表現は、index.php / include / add.cssで自由に触れる余地を残す。
```

## 2. 基本思想

### 2.1 管理画面化するもの

頻繁に変わるが、毎回PHPを触るほどではないものを管理画面化する。

対象:

```text
ヘッダーパターン
フッターパターン
ローディング画面の有無
ローディング画面のパターン
CTAパターン
メインビジュアル/FVパターン
基本カラー
ロゴ
電話番号
LINE URL
問い合わせページ
表示する投稿タイプ
使用するコンテンツ機能
Google Analytics等のタグ
```

### 2.2 管理画面化しすぎないもの

自由度を下げるため、細かすぎる制御は管理画面に寄せない。

対象外:

```text
トップページの完全ノーコード編集
細かい余白調整
複雑なカラム構成
案件ごとの特殊アニメーション
1案件だけの特殊デザイン
全セクションの細かい装飾設定
```

### 2.3 残す自由制作レイヤー

以下は今後も制作側が自由に触れる前提で残す。

```text
index.php
include/*.php
include/top-sections/*.php
assets/css/add.css
assets/scss/
page/*.php
```

### 2.4 カスタム投稿/コンテンツ機能の考え方

既存テーマでは、初期設定の `content_type` で選ばれていない投稿メニューを管理画面から隠す仕組みがある。
この考え方を新テーマでは正式な「使用するコンテンツ機能」設定として整理する。

対象候補:

```text
お知らせ
よくある質問
施工事例/制作実績/実績・事例
お客様の声
商品紹介
採用情報
スタッフ
コラム
ギャラリー
```

方針:

```text
チェックが入った機能だけ管理画面に表示する
チェックが外れた機能は管理画面メニューやトップページ候補から隠す
既存データを削除しない
初期段階ではCPT自体を無効化しすぎず、表示/非表示の制御を中心にする
3テーマ分のカスタム投稿が増えても、中央の一覧で管理できるようにする
```

注意:

```text
CPT UIやACFで既に作られている投稿タイプは重複登録しない
「施工事例」「制作実績」「実績・事例」のように呼び名が違うものはラベル変更できる余地を残す
アーカイブ/詳細テンプレートがある機能だけをトップページ部品として選びやすくする
```

## 3. 現在の構造理解

既存テーマは `get_template_part()` によって、共通パーツを `include/` に分けている。

トップページの基本構成:

```php
get_template_part('include/config');
get_template_part('include/doctype');
get_template_part('include/content_prepend');
get_template_part('include/header');
get_template_part('include/visual');

// index.php内にトップ固有セクション

get_template_part('include/cta');
get_template_part('include/bn');
get_template_part('include/footer');
get_template_part('include/content_append');
get_template_part('include/fixarea');
get_template_part('include/script');
```

下層ページの基本構成:

```php
get_template_part('include/config');
get_template_part('include/doctype');
get_template_part('include/header');
get_template_part('include/content_prepend');
get_template_part('include/visual-sub');
get_template_part('include/pankuzu');

// ページ本文

get_template_part('include/gmap');
get_template_part('include/cta');
get_template_part('include/bn');
get_template_part('include/footer');
get_template_part('include/content_append');
get_template_part('include/fixarea');
get_template_part('include/script');
```

この構造を壊さず、選択式にしたい部分だけディスパッチャー化する。

例:

```php
// include/header.php
$layout = get_field('header_layout', 'option') ?: 'default';
get_template_part('include/headers/header', $layout);
```

## 4. 推奨ディレクトリ設計

`lai-template` 内に、選択式パーツ用の階層を追加する。

```text
lai-template/
  include/
    header.php
    footer.php
    visual.php
    cta.php
    loading.php
    headers/
      header-laiweb.php
      header-town.php
      header-clinic.php
    footers/
      footer-standard.php
      footer-rich.php
      footer-simple.php
    visuals/
      visual-laiweb.php
      visual-service.php
      visual-clinic.php
    ctas/
      cta-standard.php
      cta-compact.php
      cta-phone-line.php
    loadings/
      loading-none.php
      loading-logo.php
      loading-progress.php
      loading-split.php
    top-sections/
      problem.php
      features.php
      service-cards.php
      news.php
      columns.php
      gallery.php
      pricing.php
      area.php
      faq.php
```

`include/header.php` や `include/footer.php` は、直接HTMLを大量に持つファイルではなく、選択されたパターンを読み込む入口にしていく。

## 5. 開発フェーズ

## Phase 0: 現状再現と安全確認

目的:

```text
移行済みのdocテーマでテストサイトが正常に動くことを確認する。
lai-templateを配置した状態で、いつでも切り替え検証できる状態にする。
```

作業:

```text
laiwebcms.com/cms の表示確認
docテーマの現状確認
coreの配置確認
ACF/プラグイン状態確認
lai-templateの認識確認
PHP Warningの画面表示抑制
```

完了条件:

```text
docテーマでトップページが表示される
lai-templateがテーマ一覧に表示される
検索除外が有効
画面にPHP Warningが出ない
```

## Phase 1: lai-templateを有効化して既存表示を再現

目的:

```text
lai-templateを有効化しても、laiwebベースの表示が大きく崩れない状態にする。
```

作業:

```text
lai-templateを有効化
functions.phpのパス/core参照確認
style.css/add.css/script読み込み確認
トップページ表示確認
下層ページ表示確認
管理画面表示確認
```

完了条件:

```text
トップページが表示される
主要下層ページが表示される
管理画面に致命的エラーが出ない
docとlai-templateの見た目差分を把握できる
```

## Phase 2: テーマ名・初期メタ情報整理

目的:

```text
docコピーではなく、新テーマとして扱える状態にする。
```

作業:

```text
style.cssのTheme Name変更
README整備
不要な古いバックアップファイルの扱いを決める
テーマ内コメント整理
開発用バージョン管理ルールを決める
```

候補:

```text
Theme Name: Lai Template
Text Domain: lai-template
Version: 0.1.0
```

補足:

```text
Lai Templateは開発用の仮名。
正式なテーマ名/ブランド名は後から変更する前提で進める。
```

完了条件:

```text
WordPress管理画面で新テーマとして識別できる
Git上で変更差分が追いやすい
```

## Phase 3: ヘッダー選択式

目的:

```text
業種や用途に応じてヘッダーを選べるようにする。
```

初期候補:

```text
header-laiweb: 企業/サービスサイト向け
header-town: 電話/LINE/問い合わせ重視の地域サービス向け
header-clinic: 予約導線重視の店舗/医院向け
```

作業:

```text
include/headers/ を作成
既存3サイトのheader.phpを移植
include/header.phpをディスパッチャー化
ACFオプションに header_layout を追加
未設定時のデフォルトを header-laiweb にする
```

完了条件:

```text
管理画面の選択でヘッダーが切り替わる
既存nav.phpとの連携が壊れない
PC/SP表示で致命的な崩れがない
```

## Phase 3.5: コンテンツ機能の有効/無効化

目的:

```text
施工事例、よくある質問、お知らせなどのカスタム投稿を案件ごとに使う/使わないで切り替えられるようにする。
```

作業:

```text
既存content_typeの挙動を整理
3テーマ分の投稿タイプ/テンプレート/ACF項目を一覧化
コンテンツ機能レジストリを作成
ACFオプションに enabled_content_modules を追加
必要に応じて content_module_labels を追加
管理画面メニューの表示/非表示をレジストリ基準に変更
トップページセクション候補も有効な機能を優先表示
```

コンテンツ機能レジストリの項目:

```text
key
label
post_type
taxonomies
archive_template
single_template
admin_menu_label
default_enabled
dependencies
```

完了条件:

```text
初期設定のチェックで使う投稿機能を選べる
選ばれていない機能は管理画面で目立たない
既存投稿データは消えない
3テーマ由来の投稿タイプを一箇所で管理できる
```

## Phase 4: フッター選択式

目的:

```text
標準フッター、リッチフッター、シンプルフッターを選択できるようにする。
```

初期候補:

```text
footer-standard: nav/snav中心の標準型
footer-rich: laiwebのサービスリンク付き大型フッター
footer-simple: LPや小規模サイト用
```

作業:

```text
include/footers/ を作成
既存footer.phpから候補を分離
include/footer.phpをディスパッチャー化
ACFオプションに footer_layout を追加
ハンバーガー/offcanvasの扱いを整理
```

完了条件:

```text
管理画面の選択でフッターが切り替わる
ハンバーガーが必要なヘッダーと矛盾しない
```

## Phase 5: ローディング画面選択式

目的:

```text
ローディング画面の有無とパターンを選べるようにする。
```

初期候補:

```text
none: 表示しない
logo: ロゴ表示
progress: 進捗表示
split: 画面分割型
```

作業:

```text
include/loading.phpを作成
include/loadings/を作成
既存footer.php内のpreloaderを分離
ACFオプションに loading_enabled / loading_layout / loading_scope を追加
```

選択項目:

```text
loading_enabled: true/false
loading_layout: none/logo/progress/split
loading_scope: front_only/all_pages
```

完了条件:

```text
ローディングなしで表示できる
トップページだけ表示できる
全ページ表示も選べる
既存preloader.jsと連携する
```

## Phase 6: CTA選択式

目的:

```text
サイト種別に応じてCTAを選べるようにする。
```

初期候補:

```text
cta-standard
cta-compact
cta-phone-line
cta-reservation
```

作業:

```text
include/ctas/を作成
include/cta.phpをディスパッチャー化
include/cta-compact.phpとの役割を整理
ACFオプションに cta_layout を追加
電話/LINE/問い合わせ/予約URLの共通フィールドを整理
```

完了条件:

```text
下層ページとトップページでCTAが破綻しない
案件ごとのCTA差し替えが簡単になる
```

## Phase 7: トップページ用セクション整理

目的:

```text
index.phpの自由度を残しつつ、よく使うセクションをinclude化して再利用しやすくする。
```

方針:

```text
index.phpを完全自動生成にはしない。
よく使うセクションを include/top-sections/ に分離する。
必要な案件では index.php に直書きしてよい。
```

初期候補:

```text
problem.php
features.php
service-cards.php
news.php
columns.php
gallery.php
pricing.php
area.php
faq.php
```

完了条件:

```text
index.phpからセクションを呼び出せる
必要なセクションだけ流用できる
管理画面で全部制御しなくても制作しやすい
共通トップページ部品のON/OFFと基本的な表示順を管理画面から選べる
```

追加方針:

```text
新着一覧のように利用頻度が高く、見せ方だけ変えたい部品は表示形式を選べるようにする。
ただし、細かい余白や装飾までは管理画面化せず、add.cssやテンプレート編集で調整する。
```

新着一覧の初期表示形式:

```text
split: 既存デザインに近い分割型
list: 日付/タイトル中心の一覧型
card: 画像付きカード型
```

## Phase 8: カラー/デザイン変数

目的:

```text
サイトカラーの初期調整を管理画面で簡単にする。
```

作業:

```text
primary_color
secondary_color
accent_color
text_color
line_color
```

出力方法:

```php
<style>
:root {
  --kc: ...;
  --sc: ...;
  --ac: ...;
}
</style>
```

注意:

```text
細かい色調整までは管理画面化しない。
最終的なデザイン調整はadd.cssを使う。
```

## Phase 9: coreの扱い整理

目的:

```text
将来的に移植しやすい構成にする。
```

現状:

```text
テーマ外の /core に依存している。
```

短期方針:

```text
既存互換のため /core 依存を維持。
```

中期方針:

```text
coreをテーマ内または専用プラグインへ整理する。
```

候補:

```text
lai-template theme
lai-template-core plugin
```

判断ポイント:

```text
All-in-One WP Migrationとの相性
複数サイトへの展開しやすさ
WordPress標準構成への近さ
既存関数との互換性
```

## 6. 初期MVPの実装順

最初に作るべき順番:

```text
1. lai-template有効化と既存表示再現
2. テーマ名/メタ情報整理
3. コンテンツ機能の有効/無効化
4. ヘッダー選択式
5. フッター選択式
6. ローディング選択式
7. CTA選択式
8. トップページセクションの一部分離
9. カラー設定
```

最初からやらないこと:

```text
トップページ完全ビルダー化
全セクションの細かいGUI編集
coreの完全リライト
既存3テーマの全パーツ移植
```

## 7. テスト環境

テストサイト:

```text
http://laiwebcms.com/cms/
```

サーバー:

```text
xserver-business:/home/laide/laiwebcms.com
```

現在の構成:

```text
/home/laide/laiwebcms.com/core
/home/laide/laiwebcms.com/public_html/cms
/home/laide/laiwebcms.com/public_html/cms/wp-content/themes/doc
/home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template
```

現在の役割:

```text
doc: 移行済みベーステーマ
lai-template: 新テーマ開発用
core: 既存互換用共通基盤
```

## 8. Git運用

リポジトリ:

```text
git@github.com:nukui0206-bit/laiweb-theme-builder.git
```

管理対象:

```text
docs/
new-theme/lai-template/
README.md
.gitignore
```

管理対象外:

```text
sources/
*.wpress
*.zip
```

基本運用:

```text
ローカルで編集
Gitにコミット
必要に応じてテストサイトへ反映
表示確認
問題なければ次フェーズへ進む
```

## 9. 判断が必要な項目

今後相談しながら決める項目:

```text
管理画面化する範囲
ヘッダー候補の最終数
フッター候補の最終数
ローディング候補の最終数
CTA候補の最終数
トップセクションをどこまで共通化するか
カスタム投稿/コンテンツ機能をどこまでテーマ側で登録するか
coreを将来的にどうパッケージするか
テーマ名/ブランド名
```

## 10. 開発上の注意

```text
既存制作スタイルを壊さない
index.phpの自由度を残す
add.cssを残す
管理画面項目を増やしすぎない
まずは小さいMVPで動かす
既存docテーマと比較しながら進める
本番サイトではなくlaiwebcms.comで検証する
```
