<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>

	<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
			<?php the_tags( '<span class="tags">' , '', '</span>'); ?>
			<div class="postmetadata"><span class="updated">作成日: <?php the_time('Y年n月j日') ?></span> | <?php the_category(', ') ?></div>
		</div>
		<?php comments_template(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('%link', '前のページ' ,'TRUE') ?></div>
			<div class="alignright"><?php next_post_link('%link', '次のページ' ,'TRUE') ?></div>
		</div>
<?php endwhile; endif; ?>
	</div>

<div id="side">
	<?php 	if ( ! dynamic_sidebar( 'side-widget-area' ) ) : ?>
	<?php endif; ?>
</div>
	
<?php get_footer(); ?>