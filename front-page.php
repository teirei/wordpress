<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>

	<?php if(is_home()): ?>
	<div id="content">
<p><a href="./wp-admin/options-reading.php">表示設定</a>から、いずれかの固定ページをフロントページに指定してください。</p>
	</div>	
	<?php elseif(is_front_page()): ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div id="content">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
		</div>
	</div>	
<?php endwhile; endif; ?>
	<?php else: ?>
	<?php endif; ?>

<?php if ( is_active_sidebar( 'home-widget-left' ) ) : ?>
	<div id="homeWidgetLeft">
		<?php 	if ( ! dynamic_sidebar( 'home-widget-left' ) ) : ?>
		<?php endif; ?>
	</div>
<?php endif; ?>			

<?php if ( is_active_sidebar( 'home-widget-right' ) ) : ?>
	<div id="homeWidgetRight">
		<?php 	if ( ! dynamic_sidebar( 'home-widget-right' ) ) : ?>
		<?php endif; ?>
	</div>
<?php endif; ?>			

<?php get_footer(); ?>