# コンテンツ機能 棚卸し

## 目的

既存3テーマのカスタム投稿・テンプレート・初期設定を統合し、新テーマ側で「使う/使わない」を安全に選べるようにする。

## 既存の初期設定

`core/wLib/lib/admin/admin.php` と `core/lpLib/lib/admin/admin.php` では、ACFオプションの `content_type` に含まれない投稿メニューを隠している。

既存の対象:

```text
laiweb:
お知らせ / お客様の声 / よくある質問 / 実績・事例

town-suido:
お知らせ / お客様の声 / よくある質問 / 実績・事例 / 商品紹介 / 採用情報

4foot4:
お知らせ / お客様の声 / よくある質問 / 実績・事例 / 採用情報
```

テストサイト `laiwebcms.com` の現在値:

```text
お知らせ / お客様の声 / よくある質問
```

## 登録済み投稿タイプ

`laiwebcms.com` で登録されている主要CPT:

```text
cta: CTA
kv: キービジュアル
footer-bn: フッターバナー
news: NEWS
voice: お客様の声
faq: よくある質問
case: 制作実績
column: コラム
```

補足:

```text
Custom Post Type UI が有効。
news / voice / faq / case はDB側のCPT定義で登録されている可能性が高い。
column は現テーマの functions.php でも登録している。
```

## テンプレート上の機能候補

3テーマに存在する主なテンプレート:

```text
news:
archive-news.php / single-news.php / taxonomy-newscat.php

voice:
archive-voice.php / include/common-voice.php

faq:
archive-faq.php

case:
archive-case.php / single-case.php / taxonomy-casecat.php / include/sidebar-case.php

column:
archive-column.php / single-column.php / taxonomy-columncat.php / include/sidebar-column.php

gallery:
archive-gallery.php / single-gallery.php / taxonomy-gallerycat.php / include/common-menu-gallery.php

product:
archive-product.php / single-product.php / taxonomy-productcat.php / include/sidebar-product.php

recruits:
archive-recruits.php / single-recruits.php

recruit:
archive-recruit.php / single-recruit.php

staff:
archive-staff.php / single-staff.php / include/common-staff.php

project:
archive-project.php / single-project.php

interview:
archive-interview.php / single-interview.php

catalog:
archive-catalog.php / single-catalog.php

lineup:
archive-lineup.php / single-lineup.php / taxonomy-lineupsize.php
```

## 統合方針

短期:

```text
CPTは既存のCPT UI/ACF/テーマ登録を尊重する。
テーマ側では中央レジストリを持ち、ACFのcontent_type選択肢と管理メニュー非表示に使う。
無効化しても投稿データ、テンプレート、URLは削除しない。
```

中期:

```text
使用頻度の高いCPTはテーマまたは専用プラグイン側で登録できるようにする。
ただし、既にCPT UIで登録済みの場合は重複登録しない。
施工事例/制作実績/実績・事例のような呼び名違いは、ラベル設定で吸収する。
```

## 初期レジストリ案

```text
news: お知らせ
voice: お客様の声
faq: よくある質問
case: 制作実績
column: コラム
gallery: ギャラリー
product: 商品紹介
recruits: 採用情報
staff: スタッフ
project: プロジェクト
interview: インタビュー
catalog: カタログ
lineup: ラインナップ
cta: CTA
kv: キービジュアル
footer_bn: フッターバナー
```

優先実装:

```text
news / voice / faq / case / column / gallery / product / recruits
```
