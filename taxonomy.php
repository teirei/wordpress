<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>

	<div id="content">

		<h1><?php single_term_title(); ?></h1>
			<?php echo category_description(); ?>
		<div id="contentWork">
<?php $count = 1; //ループ回数を入れる変数 ?>
<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
		<div <?php post_class(); ?>>
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>" class="workThumb"><?php the_post_thumbnail( 'thumbnail' ); ?></a>
			<?php } else { ?>
				<a href="<?php the_permalink(); ?>" class="workThumb"><img src="<?php echo get_template_directory_uri(); ?>/img/nophoto.png"></a>
			<?php } ?>
			<div class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></div>
		</div>
<?php
	//4番目だったらフロート解除
	if ($count%4 == 0) {echo '<div style="clear:both;"></div>';}
	$count++; //最後にループ回数を一つ進める
?>
<?php endwhile; ?>
		</div>

	<div class="navigation">
		<?php if(function_exists('wp_pagenavi')): ?>
		<?php wp_pagenavi(); ?>
		<?php else : ?>
		<div class="alignleft"><?php previous_posts_link('前のページ') ?></div>
		<div class="alignright"><?php next_posts_link('次のページ') ?></div>
		<?php endif; ?>
	</div>

<?php else : ?>
	</div>
<?php endif; ?>
	</div>

<div id="side" class="taxonomySide">
	<?php 	if ( ! dynamic_sidebar( 'side-taxonomy-widget-area' ) ) : ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>