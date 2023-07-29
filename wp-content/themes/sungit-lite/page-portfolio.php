<?php
/**
 * Template Name: Portfolio Template

 */

get_header(); ?>

<section class="sec-content blog-page-content">
<div class="container">
<?php the_title( '<h1 class="entry-title text-center separator">', '</h1>' ); ?>
						<?php
							$terms = get_terms('portfolio_category');
							//var_dump($terms);
						?>
        <div class="filters">
            <ul class="btn-group simplefilter d-flex p-2">
                <li class="btn m-1 fltr-controls btn-primary badge-pill active" data-filter="all">All</li>
				<?php foreach($terms as $term): ?>
                	<li class="btn m-1 fltr-controls btn-primary badge-pill" data-filter="<?php echo $term->term_taxonomy_id;?>"><?php echo $term->name;?></li>
                <?php endforeach;?>
            </ul>
            <div class="additional p-2 d-flex justify-content-between">
                <!-- Shuffle -->
                <button class="btn btn-warning" id="shuffle">Shuffle</button>
                <!-- To create a search control -->
                <div class="input-group pl-2 pr-2">
                    <input type="text" class="form-control fltr-controls" name="filtr-search" value=""
                        placeholder="Your search" data-search>
                </div>                
            </div>
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
        <div class="cards d-flex row filter-container">
		<?php while ( $query->have_posts() ) : $query->the_post(); ?>
								<?php $terms = wp_get_post_terms( get_the_ID(), 'portfolio_category'); //var_dump($terms);?>
								<?php
									$catIDs = array();
									foreach($terms as $term):
										$catIDs[] = $term->term_taxonomy_id;
									endforeach;
									$ids = implode(" , ", $catIDs);
								?>
            <div class="card col-lg-4 filtr-item" data-category="<?php echo $ids;?>" data-sort="valu" data-author="q">
			<a href="<?php the_permalink();?>">
			<?php the_post_thumbnail(); ?>
                <div class="filtr-title"><?php the_title(); ?></div>
				</a>	
            </div>
			<?php endwhile;?>			
        </div>		
		<?php wp_reset_postdata(); ?>
		<?php else : ?>
		<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>
    </div>
	</section>
<?php
get_footer();
