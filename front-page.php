<?php
get_header();
// WP_Query arguments
$args = array (
	'post_type'              => 'post_slide' ,
    'post_status'            =>  'publish' ,
    'category_name'               => 'home',
	'nopaging'               => true,
	'order'                  => 'ASC',
);

// The Query
$services = new WP_Query( $args );

// Restore original Post Data
wp_reset_postdata();
?>
<main>
    <?php
        $index = 0; 
        if ( $services->have_posts() ) : ?>
        <div id="carouselExampleControls" class="carousel slide" style="top:0px;z-index:0;" data-ride="carousel">
            <div class="carousel-inner">
                <?php while ( $services->have_posts() ) :
                    $services->the_post(); ?>
					<div class="carousel-item <?php echo ($index==0?'active':'') ?>">
						<div class="container-fluid position-absolute d-flex align-items-center" style="z-index:1;height:100%;">
							<div class="w-100">
							<?php the_content() ?>
							</div>
						</div>
						<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="d-block w-100" alt="...">
                    </div>
                <?php
                    $index++; 
                    endwhile; ?>
            </div>
			<?php if($index>1): ?>
				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				<i class="icofont-rounded-left icofont-2x d-lg-none"></i>
					<i class="icofont-rounded-left icofont-3x d-none d-lg-block"></i>
				</a>
				<a class="carousel-control-next" style="right:20px;" href="#carouselExampleControls" role="button" data-slide="next">
					<i class="icofont-rounded-right icofont-2x d-lg-none"></i>
					<i class="icofont-rounded-right icofont-3x d-none d-lg-block"></i>
				</a>
			<?php endif; ?>
		<?php else: ?>
		<script>
			document.getElementsByClassName("navbar")[0].classList.add("position-relative");
			document.getElementsByClassName("navbar")[0].classList.add("navbar-light");
			document.getElementsByClassName("navbar")[0].classList.add("border-bottom");
			document.getElementsByClassName("navbar")[0].classList.add("border-primary");
			document.getElementsByClassName("navbar")[0].classList.add("shadow");
			document.getElementsByClassName("navbar")[0].classList.remove("bg-transparent");
			document.getElementsByClassName("navbar")[0].classList.remove("navbar-dark");
        </script>
        
        </div>
    <?php endif; ?>
</main>
<?php
get_footer();
