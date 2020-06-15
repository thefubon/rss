<?php
  function true_fetch_feed($f, $q){
  	if(function_exists('fetch_feed')) {
  		$my_feed = fetch_feed($f);
  		$limit = $my_feed->get_item_quantity($q);
  		$posts = $my_feed->get_items(0, $limit); // массив постов
  	}
  	if ($limit == 0) {
  		echo '<p>К сожалению, RSS-лента либо пуста, либо недоступна.</p>';
  	} else {
      echo '<div data-uk-slider="sets: true; finite: true; index: 0;"><div class="uk-position-relative" tabindex="0"><div class="uk-slider-container"><ul class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-2@m uk-child-width-1-3@l uk-grid-medium uk-grid-match" data-uk-grid>';
  		foreach ($posts as $post) { ?>
        <li>
          <a class="news_box__card uk-card uk-card-border uk-card-body uk-border-rounded-15 uk-link-reset" href="<?php echo $post->get_permalink(); ?>" title="<?php echo $post->get_title(); ?>" target="_blank">

            <div class="news_box__category"><?php echo $post->get_date('d.m.Y'); ?></div>
      			<h2 class="uk-card-title"><?php echo mb_strimwidth($post->get_title(), 0, 0, "..."); ?></h2>
      			<p class="uk-card-text"><?php echo mb_strimwidth($post->get_description(), 0, 110, "..."); ?></p>
          </a>
        </li>
        <?php
  		}
      echo '</ul></div></div><ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul></div>';
  	}
  }
?>

<?php true_fetch_feed('https://web.site/feed/', 10); ?>
