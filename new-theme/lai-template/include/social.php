<?php if(get_option('show_share_button')): ?>
                <li class="fb-share">
                  <div class="fb-share-button" data-href="<?php the_permalink(); ?>" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">シェア</a></div>
                </li>
<?php endif; ?>
<?php if(get_option('show_like_button')): ?>
                <li class="fb">
                  <div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="button" data-action="like"  data-size="small" data-show-faces="false" data-share="false"></div>
                </li>
<?php endif; ?>
<?php if(get_option('show_tweet_button')): ?>
                <li class="tw">
                    <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-lang="ja" data-count="vertical">ツイート</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </li>
<?php endif; ?>
<?php if(get_option('show_line_button')): ?>
                <li class="gp">
                  <div class="line-it-button" data-lang="ja" data-type="share-a" data-url="<?php the_permalink(); ?>" style="display: none;"></div>
 <script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
                </li>
<?php endif; ?>
<?php if(get_option('show_google_button')): ?>
                <li class="gp">
                  <div class="g-plus" data-href="<?php the_permalink(); ?>" data-action="share" data-height="24"></div>
                </li>
<?php endif; ?>
<?php if(get_option('show_hatena_button')): ?>
                <li class="hb">
                  <a href="http://b.hatena.ne.jp/entry/<?php the_permalink(); ?>" class="hatena-bookmark-button" data-hatena-bookmark-title="<?php wmp_title(); ?>" data-hatena-bookmark-layout="standard" data-hatena-bookmark-lang="ja" title="このエントリーをはてなブックマークに追加"><img src="//b.hatena.ne.jp/images/entry-button/button-only@2x.png" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="//b.hatena.ne.jp/js/bookmark_button.js" charset="utf-8" async="async"></script>
                </li>
<?php endif; ?>
