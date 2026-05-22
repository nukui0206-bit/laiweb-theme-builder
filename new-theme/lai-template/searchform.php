<form role="search" method="get" id="searchform" class="c-searchform" action="<?= home_url(); ?>">
  <div class="row">
    <div class="col-auto">
      <label class="screen-reader-text" for="s">女性検索:</label>
    </div>
    <div class="col-auto">
      <input type="text" value="" name="s" id="s">
    </div>
    <div class="col-auto">
      <input type="submit" id="searchsubmit" value="検索">
      <input type="hidden" name="post_type" value="woman">
    </div>
  </div>
</form>