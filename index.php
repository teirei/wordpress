<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>

	<div id="content">

			<?php $post = $posts[0]; ?>
			<?php if (is_category()) { ?>
			<h1><?php single_cat_title(); ?></h1>
			<?php echo category_description(); ?>
			<?php } elseif( is_tag() ) { ?>
			<h1>タグ &#8216;<?php single_tag_title(); ?>&#8217;</h1>
			<?php } elseif (is_day()) { ?>
			<h1><?php the_time('Y年n月j日'); ?></h1>
			<?php } elseif (is_month()) { ?>
			<h1><?php the_time('Y年n月'); ?></h1>
			<?php } elseif (is_year()) { ?>
			<h1><?php the_time('Y年'); ?></h1>
			<?php } elseif (is_author()) { ?>
			<h1>Author Archive</h1>
			<?php } elseif (is_search()) { ?>
			<h1>検索結果</h1>
			<p>キーワード「<?php the_search_query(); ?>」での検索結果は次の通りです。</p>
			<?php } elseif (is_404()) { ?>
			<h1>ページが見つかりません</h1>
			<p>お探しのページは削除されたか、すでに存在していません。<br>
ナビゲーションメニューからクリックしてお進みいただくか、<br>
下の検索フォームでキーワード検索をお試しください。</p>
			<?php get_search_form(); ?>
			<?php } else { ?>
			<h1>Topics</h1>
			<?php } ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
			<a href="<?php the_permalink(); ?>" class="thumbnail-align"><?php the_post_thumbnail( 'grid' ); ?></a>
		</div>
<?php endwhile; ?>
		
	<div class="navigation">
		<?php if( function_exists('wp_pagenavi') ): ?>
		<?php wp_pagenavi(); ?>
		<?php else : ?>
		<div class="alignleft"><?php previous_posts_link('前のページ') ?></div>
		<div class="alignright"><?php next_posts_link('次のページ') ?></div>
		<?php endif; ?>
	</div>
	
<?php else : ?>
<?php endif; ?>
	</div>
	
<div id="side">
	<?php 	if ( ! dynamic_sidebar( 'side-widget-area' ) ) : ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>