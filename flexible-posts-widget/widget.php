<?php

if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

if ( !empty($title) )
	echo $before_title . $title . $after_title;

if( $flexible_posts->have_posts() ):
?>
	<ul class="dpe-flexible-posts">
	<?php while( $flexible_posts->have_posts() ) : $flexible_posts->the_post(); global $post; ?>
		<li id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<a href="<?php echo the_permalink(); ?>">
				<?php
					if( $thumbnail == true ) {
						if( has_post_thumbnail() ) {
							the_post_thumbnail( $thumbsize );
						}
					}
				?>
				<h4 class="title"><?php the_title(); ?></h4>
				<div class="excerpt"><?php echo mb_substr(get_the_excerpt(), 0, 104); ?></div>
			</a>
		</li>
	<?php endwhile; ?>
	</ul>
<?php else: ?>
	<div class="dpe-flexible-posts no-posts">
	</div>
<?php	
endif;
	
echo $after_widget;
