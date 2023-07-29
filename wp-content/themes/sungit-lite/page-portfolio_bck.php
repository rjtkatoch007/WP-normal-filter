<?php
/**
 * Template Name: Portfolio Template backup

 */

get_header(); ?>

<section class="sec-content blog-page-content">
        <div class="container">
            <div class="row">                
                <div class="col-md-12">
                    <main id="main" class="site-main clearfix">
						<?php the_title( '<h1 class="entry-title text-center separator">', '</h1>' ); ?>
						<?php
							$terms = get_terms('portfolio_category');
							//var_dump($terms);
						?>
						<ul class="simplefilter menu row">
							<li class="active" data-filter="all">All</li>
							<?php foreach($terms as $term): ?>
								<li data-filter="<?php echo $term->term_taxonomy_id;?>"><?php echo $term->name;?></li>
							<?php endforeach;?>
						</ul>
						<div class="row">
							Portfolio Filter
							<input type="text" class="filtr-search" name="filtr-search" data-search>
						</div>

						<?php
						$args = array(
							'post_type'=>'portfolio',
							'posts_per_page'=>-1,
							'orderby'=>'title',
							'order'=>'ASC'
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) : ?>
						<div class="row">
							<div class="filtr-container">
								<div class="row small-up-2 medium-up-3 large-up-4">
								<?php while ( $query->have_posts() ) : $query->the_post(); ?>
								<?php $terms = wp_get_post_terms( get_the_ID(), 'portfolio_category'); //var_dump($terms);?>
								<?php
									$catIDs = array();
									foreach($terms as $term):
										$catIDs[] = $term->term_taxonomy_id;
									endforeach;
									$ids = implode(" , ", $catIDs);
								?>
								<div class="column filtr-item" data-category="<?php echo $ids;?>">
								<a href="<?php the_permalink();?>">
									<?php the_post_thumbnail('portfolio'); ?>
									<p class="text-center">
										<?php the_title(); ?>
									</p>
									
								</a>	
								</div>
								<?php endwhile;?>
								</div>							
							</div>
						</div>
						<?php endif; ?>
						<?php wp_reset_postdata(); ?>
                    </main>
	            </div>
	        </div>
	    </div>
	</section>
<?php
get_footer();
