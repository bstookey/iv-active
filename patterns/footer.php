<?php

/**
 * Title: Footer
 * Slug: iv-active/footer
 * Categories: footer
 * Block Types: core/template-part/footer
 * Description: Footer columns with logo, and links.
 *
 * @package WordPress
 * @subpackage IV Active
 * @since IV Active 1.0
 */

?>

<!-- wp:group {"metadata":{"name":"Footer"},"className":"site-footer","layout":{"type":"constrained"}} -->
<div class="wp-block-group site-footer"><!-- wp:group {"metadata":{"name":"Footer Container"},"align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-group alignwide"><!-- wp:columns {"metadata":{"name":"Bootstrap Row"},"className":"row"} -->
		<div class="wp-block-columns row"><!-- wp:column {"width":"","className":"col-xl-4"} -->
			<div class="wp-block-column col-xl-4"><!-- wp:group {"align":"full","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"flex","flexWrap":"wrap","justifyContent":"space-between"}} -->
				<div class="wp-block-group alignfull"><!-- wp:site-logo /-->

					<!-- wp:paragraph -->
					<p>IV Active is a mobile IV therapy provider in NWPA. Our companies mission is to enable our clients to achieve optimal health and wellness through offering high quality IV Therapy solutions. We commit to providing excellent customer service and an extraordinary client experience at every visit. Our goal is to keep our clients active.</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":"col-sm-6 col-md-4 col-xl-3"} -->
			<div class="wp-block-column col-sm-6 col-md-4 col-xl-3"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|aqua"}}}},"textColor":"aqua"} -->
				<h2 class="wp-block-heading has-aqua-color has-text-color has-link-color">Payments</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"textTransform":"uppercase","fontStyle":"normal","fontWeight":"600"}}} -->
				<p style="font-style:normal;font-weight:600;text-transform:uppercase">We accept all major credit cards including HSA and FSA Payments!</p>
				<!-- /wp:paragraph -->

				<!-- wp:image {"id":274,"width":"197px","sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full is-resized"><img src="http://localhost:8888/iv-active/wp-content/uploads/accepted-cards.webp" alt="" class="wp-image-274" style="width:197px" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":"col-sm-6 col-md-3 col-xl-2"} -->
			<div class="wp-block-column col-sm-6 col-md-3 col-xl-2"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|aqua"}}}},"textColor":"aqua"} -->
				<h2 class="wp-block-heading has-aqua-color has-text-color has-link-color">About Us</h2>
				<!-- /wp:heading -->

				<!-- wp:navigation {"ref":301,"overlayMenu":"never"} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"","className":"col-md-5 col-xl-3"} -->
			<div class="wp-block-column col-md-5 col-xl-3"><!-- wp:columns {"metadata":{"name":"Bootstrap Row"},"className":"row"} -->
				<div class="wp-block-columns row"><!-- wp:column {"metadata":{},"className":"col-sm-6 col-md-12"} -->
					<div class="wp-block-column col-sm-6 col-md-12"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|aqua"}}}},"textColor":"aqua"} -->
						<h2 class="wp-block-heading has-aqua-color has-text-color has-link-color">Contact Us</h2>
						<!-- /wp:heading -->

						<!-- wp:acf/footer-connect-block {"name":"acf/footer-connect-block","align":"full","mode":"preview"} /-->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"className":"col-sm-6 col-md-12"} -->
					<div class="wp-block-column col-sm-6 col-md-12"><!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|aqua"}}}},"textColor":"aqua"} -->
						<h2 class="wp-block-heading has-aqua-color has-text-color has-link-color">Follow Us</h2>
						<!-- /wp:heading -->

						<!-- wp:acf/footer-social-block {"name":"acf/footer-social-block","align":"full","mode":"preview"} /-->

						<!-- wp:image {"id":275,"sizeSlug":"full","linkDestination":"none"} -->
						<figure class="wp-block-image size-full"><img src="http://localhost:8888/iv-active/wp-content/uploads/image71-93w.webp" alt="" class="wp-image-275" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->

		<!-- wp:separator -->
		<hr class="wp-block-separator has-alpha-channel-opacity" />
		<!-- /wp:separator -->

		<!-- wp:group {"metadata":{"name":"Disclaimer"},"className":"disclaimer is-style-container-sm","fontSize":"small","layout":{"type":"constrained"}} -->
		<div class="wp-block-group disclaimer is-style-container-sm has-small-font-size"><!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">Disclaimer</p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"align":"center"} -->
			<p class="has-text-align-center">The products and/or services provided by our medical staff are not intended to diagnose, treat, cure or prevent any disease. Always consult your medical provider before beginning any therapy program. All medications and vitamin supplements are provided by federally regulated 503B compounding pharmacies and/or licensed medical distributors.</p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->

<!-- wp:group {"metadata":{"name":"Copyright Wrapper"},"className":"copyright","layout":{"type":"constrained"}} -->
<div class="wp-block-group copyright"><!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group"><!-- wp:acf/footer-copyright-block {"name":"acf/footer-copyright-block","align":"full","mode":"preview"} /-->

		<!-- wp:navigation {"ref":285,"overlayMenu":"never"} /-->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->