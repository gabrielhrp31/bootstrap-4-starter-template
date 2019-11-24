<?php
get_header();
$cat = get_category( get_query_var( 'cat' ) );
// var_dump($cat->slug);
// die();
// WP_Query arguments
$args = array (
	'post_type'              => 'post_slide' ,
    'post_status'            =>  'publish' ,
    'category_name'          => $cat->slug,
	'nopaging'               => true,
	'order'                  => 'ASC',
);

// The Query
$services = new WP_Query( $args );

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
		</div>
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
	<?php endif; ?>
	<div class="container">
		<div class="row mt-4">
			<div class="col col-12">
				<h3 class="text-center"><?php  echo single_cat_title() ?></h3>
			</div>
		</div>
		<div class="row m-0 my-4 align-items-center justify-content-center">
			<? 
			// Restore original Post Data
			wp_reset_postdata(); ?>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="col col-12 col-lg-4 mb-4">
					<div class="card">
						<?php if(has_post_thumbnail()): ?>
							<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top d-block w-100" alt="...">
						<?php else:?>
							<div style="height:200px;overflow:hidden;">
								<img src="https://dentalmedsul.fbitsstatic.net/img/p/produto-nao-possui-foto-no-momento/sem-foto.jpg?w=420&h=420&v=no-change" class="card-img-top d-block w-100" alt="...">
							</div>
						<?php endif; ?>
						<div class="card-body">
							<h5 class="card-title  text-truncate"><?php echo get_the_title() ?></h5>
							<p class="card-text">
								<?php echo get_the_excerpt() ?>
							</p>
						</div>
							<div class="card-footer">
								<a href="<?php the_permalink()?>" class="btn btn-primary text-decoration-none">Ver Mais</a>
							</div>
					</div>
				</div>
			<?php endwhile; else: ?>
				<p><?php _e('Desculpe Não Encontramos Nenhum Post Para Essa Categoria'); ?></p>
			<?php endif; ?>
		</div>
	</div>
</main>
<?php
get_footer();
