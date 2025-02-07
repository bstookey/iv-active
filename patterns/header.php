<?php

/**
 * Title: Header
 * Slug: iv-active/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Header with site title and navigation.
 *
 * @package WordPress
 * @subpackage IV Active
 * @since IV Active 1.0
 */

?>
<!-- wp:group {"metadata":{"name":"Site Header"},"align":"full","className":"site-header header-desktop","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull site-header header-desktop"><!-- wp:group {"metadata":{"name":"Header Connect"},"align":"full","className":"connect-wrapper","layout":{"type":"constrained"}} -->
	<div class="wp-block-group alignfull connect-wrapper"><!-- wp:acf/header-connect-block {"name":"acf/header-connect-block","data":{},"align":"full","mode":"preview"} /--></div>
	<!-- /wp:group -->

	<!-- wp:group {"metadata":{"name":"Header Main"},"className":"header-main is-style-default","layout":{"type":"default"}} -->
	<div class="wp-block-group header-main is-style-default"><!-- wp:site-logo {"width":166,"shouldSyncIcon":false} /-->

		<!-- wp:navigation {"ref":224,"overlayMenu":"never","className":"nav-primary desktop"} /-->

		<!-- wp:navigation {"ref":225,"overlayMenu":"never","className":"nav-primary mobile"} /-->

		<!-- wp:buttons {"className":"header-buttons on-dark-background"} -->
		<div class="wp-block-buttons header-buttons on-dark-background"><!-- wp:button {"textColor":"white","className":"is-style-outline","style":{"elements":{"link":{"color":{"text":"var:preset|color|white"}}}}} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link has-white-color has-text-color has-link-color wp-element-button" href="sms:+18664504185?&amp;body=Hi%2520there%252C%2520I%2527d%2520like%2520to%2520learn%2520more%2520about%2520IV%2520Active">Text Us</a></div>
			<!-- /wp:button -->

			<!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link wp-element-button" href="/book-now/">Book Now</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:html -->
		<div class="mobile-menu-trigger">
			<button type="button" class="nav-icon2 mobile-menu-open" aria-expanded="false" aria-controls="mobile-navigation-menu" aria-label="Open Menu">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
		</div>
		<!-- /wp:html -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->