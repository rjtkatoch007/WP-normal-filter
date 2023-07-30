<?php
/**
 * Template Name: Filter Template
 */

get_header(); ?>

<section class="sec-content blog-page-content">
        <div class="container">
            <div class="row">                
                <div class="col-md-12">
                    <main id="main" class="site-main clearfix">
					<?php echo do_shortcode('[ajax_filter_posts per_page="1"]'); ?>
                    </main>
	            </div>
	        </div>
	    </div>
	</section>
<?php
get_footer();
