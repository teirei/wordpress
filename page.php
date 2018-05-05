<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>
	<div id="content">
		<h1 class="entry-title"><?php the_title(); ?></h1>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php the_content(); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">Pages', 'after' => '</div>' ) ); ?>
		</div>
<?php endwhile; endif; ?>
	</div>	
<?php get_footer(); ?>