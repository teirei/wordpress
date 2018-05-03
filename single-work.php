<?php /* WordPress CMS Theme WSC Project. */ get_header(); ?>

	<div id="content">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1><?php the_title(); ?></h1>
			<?php the_content(); ?>

<?php if( is_plugin_activated('cfs.php')) : ?>

<?php if( $cfs->get('date')==true ) : ?>
<div id="cfs_date" class="cfs_box">
<h4><?php
$props = $cfs->get_field_info('date');
echo $props['label'];
?></h4>
<p><?php echo date('Y年n月j日', strtotime($cfs->get('date'))); ?></p>
</div>
<?php endif; ?>

<?php if( $cfs->get('url')==true ) : ?>
<div id="cfs_url" class="cfs_box">
<h4><?php
$props = $cfs->get_field_info('url');
echo $props['label'];
?></h4>
<p><a href="<?php echo $cfs->get('url'); ?>" target="_blank"><?php echo $cfs->get('url'); ?></a></p>
</div>
<?php endif; ?>

<?php if( $cfs->get('images')==true ) : ?>
<div id="cfs_images" class="cfs_box">
<h4><?php
$props = $cfs->get_field_info('images');
echo $props['label'];
?></h4>
			<?php if( $cfs->get('images')==true ) : ?>
			<ul id="images">
				<?php $fields = $cfs->get('images'); foreach ($fields as $field) { ?>
				<li class="imageBox">
				<?php echo wp_get_attachment_link($field['image'], "thumbnail" ); ?>
				</li>
				<?php } ?>
			</ul>
			<?php endif; ?>
</div>
<?php endif; ?>

<?php if( $cfs->get('note')==true ) : ?>
<div id="cfs_note" class="cfs_box">
<h4><?php
$props = $cfs->get_field_info('note');
echo $props['label'];
?></h4>
<p><?php echo $cfs->get('note'); ?></p>
</div>
<?php endif; ?>

<?php endif; ?>

<?php echo get_the_term_list( $post->ID, 'worktype', '<div id="postmeta_worktype">
<ul><li>', '</li><li>', '</li></ul></div>' ) ?>

		</div>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('%link',__( 'Previous page' ),'TRUE') ?></div>
			<div class="alignright"><?php next_post_link('%link',__( 'Next page' ),'TRUE') ?></div>
		</div>
<?php endwhile; endif; ?>
	</div>

<div id="side" class="taxonomySide">
	<?php 	if ( ! dynamic_sidebar( 'side-taxonomy-widget-area' ) ) : ?>
	<?php endif; ?>
</div>

<?php get_footer(); ?>