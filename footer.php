<?php /* WordPress CMS Theme WSC Project. */ ?>
</div>

<div id="footer">
<?php if ( is_active_sidebar( 'footer-widget-area' ) ) : ?>
	<div id="footerWrap">
		<div id="footerWidgetArea">
			<?php 	if ( ! dynamic_sidebar( 'footer-widget-area' ) ) : ?>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>			
</div>

			

<div id="footerBottom">
	<?php wp_nav_menu( array( 'container_id' => 'footer-menu', 'theme_location' => 'footer-menu', 'depth' => 1, 'fallback_cb' => 0 ) ); ?>
	<div id="copyright"><!-- コピーライト -->
	Ⓒ <?php echo date('Y'); ?> <?php bloginfo('name'); ?> 
	掲載画像の無断転載は固くお断り致します。
<!-- 	WordPress CMS Theme <a href="http://wsc.studiobrain.net/" target="_blank">WSC Project</a>. -->
	</div><!-- /コピーライト -->
</div>

</div>


<?php wp_footer(); ?>

</body>
</html>