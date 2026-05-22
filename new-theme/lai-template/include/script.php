<?php if (get_option('visual_animation')) : ?>
  <script src="<?= home_url(); ?>/scripts.php?js=js/vegas/vegas.min.js"></script>
<?php endif; ?>


<?php
/*
<script src="//cdnjs.cloudflare.com/ajax/libs/velocity/1.5.1/velocity.min.js"></script>
<script src="<?= home_url(); ?>/scripts.php?js=js/waypoints/jquery.waypoints.min.js"></script>
<script src="<?= home_url(); ?>/scripts.php?js=js/slick/slick.min.js"></script>
*/
?>

<?= get_js('/assets/js/jquery.truncator.min.js'); ?>

<?= get_js('/assets/js/jquery.common.min.js'); ?>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>

<?= get_js('/assets/js/bootstrap.min.js'); ?>

<?php if (get_option('show_google_button')) : ?>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
<?php endif; ?>

<?php
/*
<script src="<?= home_url(); ?>/scripts.php?js=js/rellax/rellax.min.js"></script>
*/
?>

<?php //wmp_show_facebook_block(); 
?>

<?php
if (is_front_page() && is_home() || is_page('index')) :
  $args = array(
    'post_type' => 'kv',
    'posts_per_page' => 1,
  );
  $the_query = get_posts($args);
  $cnt = 1;
  if (count($the_query) > 0) :
    foreach ($the_query as $key => $post) : setup_postdata($post);
      $kvset = get_field('kvset', $post->ID);
      $movflag = false;
      foreach ($kvset as $kv) :
        if ($kv['type'] == '動画') {
          $yts[] = array('type' => $kv['type'], 'youtube' => $kv['youtube']);
          $movflag = true;
        }
      endforeach;
      if ($movflag) :
?>
        <script src="//www.youtube.com/iframe_api"></script>
        <script>
          // YouTubeの埋め込み
          function onYouTubeIframeAPIReady() {
            <?php foreach ($yts as $yt) : ?>

              ytPlayer<?= $cnt; ?> = new YT.Player(
                'youtube<?= $cnt; ?>', // 埋め込む場所の指定
                {
                  videoId: '<?= $yt['youtube']; ?>', // YouTubeのID
                  playerVars: {
                    height: '100%',
                    width: '100%',
                    loop: 1, //ループ設定
                    playlist: '<?= $yt['youtube']; ?>', //次に流すYouTubeのID　loopの設定が１の場合必須
                    controls: 0, //コントローラー無し
                    disablekb: 1, //キーボード操作無し
                    autoplay: 1, //オートプレイ
                    showinfo: 0, //動画タイトル表示しない
                    playsinline: 1, //iOS全画面
                    rel: 0, //関連動画の制御
                    iv_load_policy: 3, //動画のアノテーション
                    start: 0 //スタート秒数の指定
                  },
                  events: {
                    'onReady': onPlayerReady
                  }
                }
              );

            <?php $cnt++;
            endforeach; ?>
          }
          //プレイ準備完了後
          function onPlayerReady(event) {
            event.target.playVideo();
            event.target.mute();
          }
        </script>

  <?php
      endif;
    endforeach;
    wp_reset_query();
  endif;
  ?>
<?php
endif;
?>

<link rel="preload" as="style" href="//use.fontawesome.com/releases/v6.4.0/css/all.css" onload="this.onload=null;this.rel='stylesheet'" />

<script>
  $(function() {
    /*
        var rellax = new Rellax('.js-rellax', {
          center: true,
        });
    */

    // PC用：トグルメニューはどこクリックしても閉じるように
    if (!navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) {
      $(document).on('click', function(e) {
        var clickover = $(e.target);
        if (!clickover.hasClass("collapse")) {
          clickover.collapse('hide');
        }
      });
    };

    // SP用トグルメニューはどこクリックしても閉じるように
    if (navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)) {
      $(document).on('click tap', function(e) {
        var clickover = $(e.target);
        if (!clickover.hasClass("collapse")) {
          clickover.collapse('hide');
        }
      });
    };
  });
</script>

<script>
  // google fontsを非同期で読み込み
  window.WebFontConfig = {
    google: {
      //families: ['Noto+Sans+JP:wght@400,700&display=swap']
      families: ['Zen+Kaku+Gothic+New:400,700,900', 'Rubik:700']
      //families: ['Noto+Sans+JP:400;700;900&display=swap', 'Montserrat:300;500&display=swap', 'Roboto+Mono&display=swap']
    },
    active: function() {
      sessionStorage.fonts = true;
    },
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = '//ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();
</script>

<?php if (get_field('link_disabled', 'option')) : ?>
  <script>
    $('a[href]:not([href ^= "javascript:void(0)"],[href ^= "#"],[href ^= "tel:"],[class ^= gallery],[class ^= ok])').attr("href", "/");
  </script>
<?php endif; ?>