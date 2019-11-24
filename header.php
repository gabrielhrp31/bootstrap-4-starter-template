<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="<?php bloginfo("stylesheet_url");?>">
    <title><?php echo bloginfo("name") ?></title>
</head>
<body <?php body_class(); ?>>
	<nav class="navbar navbar-expand-lg navbar-dark bg-transparent w-100  d-flex align-items-center px-4">
		
			<?php if(has_custom_logo()):
					echo get_custom_logo(); 
				else:?>
					<a class="navbar-brand" href="#">
						<?php echo bloginfo("name"); ?>
					</a>;
				<?php endif 
			?>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<i class="icofont-navigation-menu text-white"></i>
		</button>
		<div id="navbarNav" class="collapse navbar-collapse d-lg-flex justify-content-end">
			<button class="btn btn-link text-decoration-none text-dark position-absolute navbar-toggler"  data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" style="right:0;">
				<i class="icofont-ui-close"></i>
			</button>
			<div class="d-lg-none">
				<?php if(has_custom_logo()):
						echo get_custom_logo(); 
					else:?>
						<a class="navbar-brand" href="#">
							<?php echo bloginfo("name"); ?>
						</a>;
					<?php endif 
				?>
			</div>
			<?php
				wp_nav_menu( array(
					'theme_location'  => 'primary',
					'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
					'container'       => false,	
					'menu_class'      => 'navbar-nav',
					'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
					'walker'          => new WP_Bootstrap_Navwalker(),
				) ); 
			?>
		</div>
		<div class="overlay"></div>
	</nav>
<?php wp_body_open(); ?>

