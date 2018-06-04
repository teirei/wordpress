<?php header("X-UA-Compatible: IE=edge,chrome=1");
/* WordPress CMS Theme WSC Project. */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php global $page, $paged; wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<div id="header">
	<div id="siteTitle"><a href="<?php echo home_url( '/' ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>"></a></div>
	<?php if(is_home()): ?>
	<h1 id="siteDescription"><?php bloginfo('description'); ?></h1>
	<?php elseif(is_front_page()): ?>
	<h1 id="siteDescription"><?php bloginfo('description'); ?></h1>
	<?php else: ?>
	<p id="siteDescription"><?php bloginfo('description'); ?></p>
	<?php endif; ?>
<?php wp_nav_menu( array( 'container_id' => 'sub-menu', 'theme_location' => 'sub-menu', 'depth' => 1, 'fallback_cb' => 0 ) ); ?>
</div>

<?php
if ( is_front_page() ) { ?>
	<div id="topImage">
		<div id="topImageWrap">
<?php if ( function_exists( 'easingslider' ) ) { easingslider( 281 ); } ?>
		</div>
	</div>
<?php } else { ?>
<!-- 	<div id="secondImage">
		<div id="breadcrumb">
		<?php if(function_exists('bcn_display')) { bcn_display(); } ?>
		</div>
	</div> -->
<?php } ?>

<div id="mainMenu">
<?php if ( is_front_page() ) {
		wp_nav_menu( array( 'theme_location' => 'top-menu' ) );
	  }else{
		wp_nav_menu( array( 'theme_location' => 'main-menu' ) );
	  }	?>
<br style="clear:both;">
</div>

<div id="wrap">