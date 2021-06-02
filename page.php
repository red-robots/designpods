<?php get_header(); ?>

<div id="primary" class="content-area">
	<?php while ( have_posts() ) : the_post(); ?>

		<div class="sp-flexwrap">

			<div class="col-left">

				<?php if( get_custom_logo() ) { ?>
	        <div class="logo">
	        	<?php the_custom_logo(); ?>
	        </div>
	      <?php } else { ?>
	        <h1 class="logo">
	          <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
	        </h1>
	      <?php } ?>

				<h1 class="page-title"><?php the_title(); ?></h1>
			</div>

			<div class="col-right">
				<div class="inner">
					<?php the_content(); ?>
				</div>
			</div>

		</div>
	
	<?php endwhile; ?>
</div><!-- #primary -->

<?php
get_footer();
