<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
	<main id="main" class="site-main">
			<!-- get_template_part( 'template-parts/content/content', 'single' ); -->

		<?php

		/* Start the Loop */
		while ( have_posts() ) :
			the_post(); ?>
			<div class="container my-4">
				<div class="row">
					<div class="col col-12">
						<?php the_title( '<h3 class="text-center">', '</h3>' ); ?>
					</div>
				</div>
				<div class="row">
					<div class="col col-12">
						<?php the_content() ?>
					</div>	
				</div>
			</div>
		<?php endwhile; // End of the loop.
		?>

	</main><!-- #main -->

	<script>
		document.getElementsByClassName("navbar")[0].classList.add("position-relative");
		document.getElementsByClassName("navbar")[0].classList.add("navbar-light");
		document.getElementsByClassName("navbar")[0].classList.add("border-bottom");
		document.getElementsByClassName("navbar")[0].classList.add("border-primary");
		document.getElementsByClassName("navbar")[0].classList.add("shadow");
		document.getElementsByClassName("navbar")[0].classList.remove("bg-transparent");
		document.getElementsByClassName("navbar")[0].classList.remove("navbar-dark");
	</script>

<?php
get_footer();
