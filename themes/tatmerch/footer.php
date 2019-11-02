		<?php if ( is_active_sidebar( 'after-content' ) ) : ?>
			<?php dynamic_sidebar( 'after-content' ); ?>
		<?php endif; ?>
	</main>

	<footer>
		<div class="container">
			<div class="left">
				<div class="copr"><?php echo esc_html( str_replace('%%year%%', date('Y'), get_option('tatm_cr')) ) ?></div>
				<nav class="footerNav">
					<?php wp_nav_menu( array(
						'theme_location'  => 'main_menu',
						'item_spacing'    => 'discard',
						'container_class' => false,
					) ); ?>
				</nav>
			</div>
			<div class="copyright">
				<div class="copr mob"><?php echo esc_html( str_replace('%%year%%', date('Y'), get_option('tatm_cr')) ) ?></div>
			</div>
		</div>
	</footer>

	<div class="to-top"></div>

	<?php if ( is_active_sidebar( 'sidebar-hidden' ) ) : ?>
		<div hidden>
			<?php dynamic_sidebar( 'sidebar-hidden' ); ?>
		</div>
	<?php endif; ?>

	<?php if ( tatm_is_show_ad() ) : ?>
		<?php echo get_option('tatm_ac'); ?>
	<?php endif; ?>

	<?php wp_footer(); ?>
</body>
</html>