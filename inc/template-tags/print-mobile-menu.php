<?php

/**
 * Displays the mobile menu with off-canvas background layer.
 *
 * @package Wordpress
 */

function iv_active_display_mobile_menu()
{
	// Bail if no mobile or primary menus are set.
	if (!has_nav_menu('mobile') && !has_nav_menu('primary')) {
		return '';
	}

	// Set a default menu location.
	$menu_location = 'primary';

	// If we have a mobile menu explicitly set, use it.
	if (has_nav_menu('mobile')) {
		$menu_location = 'mobile';
	}
?>
	<div class="off-canvas-container" aria-label="<?php esc_attr_e('Mobile Menu', THEME_DOMAIN); ?>" aria-hidden="true" tabindex="-1">
		<div class="mobile-header">
			<button class="mobile-close" tabindex="0">
				<span class="icon"><?php echo get_svg([
										'icon'   => 'close-menu-circle',
										'width'  => '24',
										'height' => '24',
									]) ?>
				</span>
				<span class="text">CLOSE</span>
			</button>
		</div>

		<nav id="mobile-navigation-menu" class="mobile-navigation dynamic-navigation" aria-label="<?php esc_attr_e('Mobile Navigation', THEME_DOMAIN); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_class'     => 'primary-menu',
					'menu_id'        => 'mobile-primary-menu',
					'walker'  => new IV - Active_Walker_Nav_Menu(),
					'use_excerpt' => false,
					'container'      => false,
				)
			);
			?>
			<?php
			wp_nav_menu(
				array(
					'fallback_cb'    => false,
					'theme_location' => 'courtesy',
					'menu_id'        => 'mobile-courtesy-menu',
					'menu_class'     => 'courtesy-menu',
					'walker'  => new IV - Active_Walker_Nav_Menu(),
					'use_excerpt' => false,
					'container'      => false,
				)
			);
			?>
		</nav>
		<div class="mobile-search">
			<form method="get" id="mobileSearchform" action="<?php bloginfo('url'); ?>">
				<input type="text" value="" name="s" id="ms" placeholder="I’m interested in..." />
				<label for=" ms">
					<input type="submit" id="searchsubmit" value="Search" />
					<svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M38.8974 36.1063L31.3326 28.4375C34.9496 23.6343 35.8997 17.2928 33.8517 11.6176C31.8044 5.94284 27.0421 1.71998 21.222 0.416811C15.4016 -0.886361 9.32753 0.910852 5.11315 5.18353C0.899115 9.45621 -0.874415 15.6138 0.411083 21.5139C1.69658 27.4139 5.86251 32.2417 11.46 34.3175C17.0578 36.3933 23.3133 35.4305 28.0517 31.7635L35.6166 39.4323C36.2157 39.9527 37.0339 40.1299 37.7905 39.9032C38.5468 39.6762 39.1387 39.0762 39.3626 38.3095C39.5859 37.5428 39.4114 36.713 38.8981 36.1056L38.8974 36.1063ZM17.4711 30.6908C14.0756 30.6908 10.8197 29.3234 8.41862 26.8897C6.01757 24.4557 4.66908 21.1549 4.66908 17.7128C4.66908 14.2706 6.01791 10.9699 8.41862 8.53585C10.8197 6.10178 14.0756 4.73475 17.4711 4.73475C20.8666 4.73475 24.1225 6.10214 26.5236 8.53585C28.9246 10.9699 30.2731 14.2706 30.2731 17.7128C30.2731 21.1549 28.9243 24.4557 26.5236 26.8897C24.1225 29.3234 20.8666 30.6908 17.4711 30.6908Z" fill="#1D0D33" />
					</svg>
				</label>
			</form>
		</div>
	</div>
<?php
}
