# Phase 3 ヘッダー選択式 反映手順書

## 概要

ACF オプションで「ヘッダーレイアウト」と「ハンバーガーメニュー」を選択できるようにする。既存サイトは未設定時 `laiweb` レイアウト + `none`（ハンバーガー非表示）にフォールバックするので、**反映直後は表示が変わらない**。

| ACF フィールド | 選択肢 | デフォルト |
|---|---|---|
| `header_layout` | `laiweb` / `town` / `clinic` | `laiweb` |
| `header_hamburger` | `none` / `simple` / `rich` | `none` |
| `header_subcatch` | テキスト | 空 |
| `header_line_url` | URL | 空 |
| `header_reservation_url` | URL | 空 |
| `header_hamburger_image` | 画像（リッチパターン用） | 空 |

## 追加・変更ファイル一覧

### 新規

```
new-theme/lai-template/function/header-layout.php
new-theme/lai-template/include/headers/header-laiweb.php
new-theme/lai-template/include/headers/header-town.php
new-theme/lai-template/include/headers/header-clinic.php
new-theme/lai-template/include/hamburger.php
new-theme/lai-template/include/hamburgers/hamburger-simple.php
new-theme/lai-template/include/hamburgers/hamburger-rich.php
```

### 変更

```
new-theme/lai-template/functions.php        ← require_once 1行追加
new-theme/lai-template/include/header.php   ← ディスパッチャーに書き換え
```

## ローカル構文チェック（実施済）

全 9 ファイル `php -l` で構文エラーなし確認済み。

## サーバー反映手順（laiwebcms.com）

### 1. バックアップ取得

サーバー側で念のため既存ファイルをバックアップ：

```bash
ssh xs-tricktree2  # 利用する SSH 接続先に置き換え
cd /home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template
cp -p include/header.php include/header.php.bak-phase3-$(date +%Y%m%d)
cp -p functions.php functions.php.bak-phase3-$(date +%Y%m%d)
```

### 2. ファイル転送（ローカルから scp）

PowerShell で：

```powershell
$theme = "C:\Users\y-nuk\Documents\Codex\wp-theme-builder\new-theme\lai-template"
$remote = "<ssh-host>:/home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template"

# function 配下（新規 + 既存 functions.php）
scp "$theme\functions.php"                              "$remote/functions.php"
scp "$theme\function\header-layout.php"                 "$remote/function/header-layout.php"

# include 直下（ディスパッチャー + hamburger ディスパッチャー）
scp "$theme\include\header.php"                         "$remote/include/header.php"
scp "$theme\include\hamburger.php"                      "$remote/include/hamburger.php"

# include/headers/（新規ディレクトリ）
ssh <ssh-host> "mkdir -p /home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template/include/headers"
scp "$theme\include\headers\header-laiweb.php"          "$remote/include/headers/header-laiweb.php"
scp "$theme\include\headers\header-town.php"            "$remote/include/headers/header-town.php"
scp "$theme\include\headers\header-clinic.php"          "$remote/include/headers/header-clinic.php"

# include/hamburgers/（新規ディレクトリ）
ssh <ssh-host> "mkdir -p /home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template/include/hamburgers"
scp "$theme\include\hamburgers\hamburger-simple.php"    "$remote/include/hamburgers/hamburger-simple.php"
scp "$theme\include\hamburgers\hamburger-rich.php"      "$remote/include/hamburgers/hamburger-rich.php"
```

### 3. サーバー側構文チェック

```bash
ssh xs-tricktree2
cd /home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template
for f in functions.php function/header-layout.php include/header.php include/headers/*.php include/hamburger.php include/hamburgers/*.php; do
  echo "=== $f ===" && php -l "$f"
done
```

## 動作確認チェックリスト

### A. 既存表示の維持（無設定時）

- [ ] http://laiwebcms.com/ にアクセス → 200 OK
- [ ] ヘッダー表示が**Phase 3 反映前と完全に一致**（laiweb レイアウト + ハンバーガー非表示）
- [ ] 下層ページ（例：http://laiwebcms.com/cms/?p=任意 ）でも崩れがないこと
- [ ] PC / SP 両方で確認
- [ ] ブラウザコンソールに JS エラーがないこと

### B. 管理画面の動作

- [ ] WordPress 管理画面 → 初期設定 → ACF オプション画面に「ヘッダー設定」グループが表示される
- [ ] 「ヘッダーレイアウト」プルダウンに `laiweb / town / clinic` の 3 択が出る
- [ ] 「ハンバーガーメニュー」プルダウンに `表示しない / シンプル / リッチ` の 3 択が出る
- [ ] テキストフィールド 2 つ、URL フィールド 2 つ、画像フィールド 1 つが表示される

### C. ヘッダーレイアウト切替

各レイアウトを ACF で選択 → トップページで表示確認：

- [ ] `laiweb` 選択時：左ロゴ + 中央ナビ + 右「無料相談はこちら」ボタン
- [ ] `town` 選択時：上段にロゴ + サブキャッチ（ACF設定時）+ LINE/メール/電話、下段にナビ
- [ ] `clinic` 選択時：中央ロゴ + 下段ナビ + 「オンライン予約」ボタン（URL設定時のみ）

### D. ハンバーガー切替

- [ ] `none` 選択時：ハンバーガーボタン非表示
- [ ] `simple` 選択時：ハンバーガーボタン表示、クリックで白背景 offcanvas が右からスライドイン
- [ ] `rich` 選択時：ハンバーガーボタン表示、offcanvas の左側に画像（未設定時はグレー背景）
- [ ] offcanvas 内のナビが `include/nav.php`（hamburger スロット）で正しく描画される
- [ ] 閉じるボタン（×）で閉じる
- [ ] PC / SP 両方で動作

### E. 案件固有要素の ACF 化動作

- [ ] `header_subcatch` 設定 → town レイアウトでロゴ上に表示
- [ ] `header_subcatch` 空欄 → 表示されない
- [ ] `header_line_url` 設定 → town で LINE ボタン表示
- [ ] `header_line_url` 空欄 → LINE ボタンが消えてメール相談だけ
- [ ] `header_reservation_url` 設定 → clinic で「オンライン予約」表示
- [ ] `header_reservation_url` 空欄 → 予約ボタン非表示
- [ ] `header_hamburger_image` 設定 → rich パターンで画像表示
- [ ] `header_hamburger_image` 空欄 → グレーグラデ背景

## 既知の制約

1. **既存 footer.php との offcanvas 重複ナシ**
   現在の `include/footer.php` には offcanvas HTML が含まれていない（laiweb系のため）。よって `hamburger.php` 側で offcanvas を出力しても重複は起きない。

2. **CSS 未調整の懸念**
   `g-header__nav-btn` `g-hamburger` 等のクラスは既存 SCSS で laiweb 用に最適化されていない。town / clinic レイアウト + simple / rich ハンバーガーを選択した場合、見た目の微調整が必要になる可能性あり。
   → Phase 3.1 として、`assets/scss/` 側に各レイアウト固有のスタイル追加を検討（次回タスク）。

3. **ハンバーガー本体の出力位置**
   現在はヘッダーディスパッチャー（`include/header.php`）の末尾で `get_template_part('include/hamburger')` を呼んでいる。Bootstrap offcanvas は body 内ならどこでも動作するため機能上は問題ないが、慣習的には body 末尾（footer 直前）が推奨。Phase 4（フッター選択式）と合わせて整理予定。

## ロールバック手順

問題が起きた場合の戻し方：

```bash
ssh xs-tricktree2
cd /home/laide/laiwebcms.com/public_html/cms/wp-content/themes/lai-template

# functions.php と include/header.php を バックアップから戻す
mv functions.php.bak-phase3-YYYYMMDD functions.php
mv include/header.php.bak-phase3-YYYYMMDD include/header.php

# 新規追加ファイルは残しておいて OK（require されなくなるので影響なし）
# 完全にクリーンに戻すなら以下を削除
rm function/header-layout.php
rm -rf include/headers include/hamburgers include/hamburger.php
```

## Git コミット案

論理単位で 4 コミット推奨：

```
1. Add header layout registry and ACF option fields
2. Add header patterns (laiweb / town / clinic)
3. Add hamburger dispatcher and patterns (simple / rich)
4. Wire header dispatcher and register in functions.php
```

または、Phase 単位で 1 コミット：

```
Add Phase 3 header layout selection (layouts + hamburger patterns + ACF fields)
```

## 次のステップ（Phase 3.1〜4）

1. **CSS 微調整**：town / clinic レイアウト + simple / rich ハンバーガー用のスタイルを `assets/scss/` に追加
2. **Phase 4 フッター選択式**：同じパターンで `include/footers/` + `footer_layout` ACF を実装
3. **ハンバーガーボタンの位置最適化**：各ヘッダーごとに最適な位置に配置されているか実機で再確認
