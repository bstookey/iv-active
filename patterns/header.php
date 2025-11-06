<?php

/**
 * Title: Header
 * Slug: happytapir/header
 * Categories: header
 * Block Types: core/template-part/header
 * Description: Header with site title and navigation.
 *
 * @package WordPress
 * @subpackage Happy Tapir Press
 * @since Happy Tapir Press 1.0
 */

?>
<!-- wp:group {"metadata":{"name":"Site Header"},"align":"full","className":"site-header header-desktop","layout":{"type":"default"}} -->
<div class="wp-block-group alignfull site-header header-desktop">

	<!-- wp:group {"metadata":{"name":"Header Main"},"className":"header-main is-style-default","layout":{"type":"default"}} -->
	<div class="wp-block-group header-main is-style-default"><!-- wp:site-logo {"width":166,"shouldSyncIcon":false} /-->

		<!-- wp:html -->
		<div class="mobile-menu-trigger test">
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