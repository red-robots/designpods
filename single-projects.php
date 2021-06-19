<?php get_header(); ?>

<div id="primary" class="content-area post-projects">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php $bottomImage = get_field("bottom_image"); ?>

		<div id="page-content" class="sp-flexwrap">

			<div class="col-left">

				<?php get_template_part("parts/subpage-logo"); ?>

				<h1 class="page-title">Work</h1>

				<?php if ($bottomImage) { ?>
				<div class="page-bottom-image hide-xs">
					<img id="bottom-image" src="<?php echo $bottomImage['url'] ?>" alt="<?php echo $bottomImage['title'] ?>">
				</div>	
				<?php } ?>
			</div>

			<?php 
			$alt_title = (get_field("title1")) ? get_field("title1") : get_the_title(); 
			$small_title = get_field("title2");
			$main_content = get_field("text");
			?>
			<div class="col-right pagetext">
				<div class="page-inner">

					<?php if ($alt_title || $small_title) { ?>
					<div class="titlediv">
						<h2 class="alt-title">
							<span class="svg-top">
								<?php include( locate_template('images/squiggles/svg/animated/group_2.svg') ); ?>
							</span>
							<?php echo $alt_title ?>
						</h2>
						<?php if ($small_title) { ?>
							<h3 class="h3"><?php echo $small_title ?></h3>
						<?php } ?>
					</div>
					<?php } ?>

					<div class="entry-content">
						<?php echo $main_content; ?>
					</div>

				</div>
			</div>

			<?php $images = get_field("fullwidth_images"); ?>
			<?php if ($images) { ?>
			<div id="fullwidth-images" class="fullwidth-images">
				<div id="subnav">
					<div class="wrapper">
						<a href="<?php echo get_site_url() ?>/work/">&larr; Back to all projects</a>
					</div>
				</div>
				<div class="wrapper">
				<?php 
					$img_count = count($images);
					$i=1; foreach ($images as $row) { 
					$img = $row['image'];
					$isFirst = ($i==1) ? 'first':'next-img';?>
						<?php if ($i>1) { ?>
						<div id="offset-images">
						<?php } ?>
						<figure class="fullwidth fig-img <?php echo $isFirst ?>">
							<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>" class="full-image">
							<?php if ($i==1) { ?>
							<div id="subNavHelper" class="navRevealHelper"></div>
							<?php } ?>
						</figure>
					<?php if ($i==$img_count) { ?>
						</div>
					<?php } ?>
				<?php $i++; } ?>
				</div>
				
			</div>	
			<?php  } ?>
		</div>
		
	
	<?php endwhile; ?>
</div><!-- #primary -->


<script>
jQuery(document).ready(function($){

	$(window).scroll(function(){
		var screen_width = $(window).width();
		if(screen_width>820) {
			var inView1 = elementInViewport( document.getElementById('subNavHelper') );
		  var inView2 = elementInViewport( document.getElementById('offset-images') );
		  if(inView1 || inView2) {
		  	$("#fullwidth-images").addClass('show-nav');
		  } else {
		  	$("#fullwidth-images").removeClass('show-nav');
		  }
		} else {
		  if( elementInViewport( document.getElementById('offset-images') ) ) {
		  	$("#fullwidth-images").addClass('show-nav');
			} else {
				$("#fullwidth-images").removeClass('show-nav');
			}
		}
	  
	});

	

	function elementInViewport(el) {
	  var r, html;
    if ( !el || 1 !== el.nodeType ) { return false; }
    html = document.documentElement;
    r = el.getBoundingClientRect();

    return ( !!r
      && r.bottom >= 0
      && r.right >= 0
      && r.top <= html.clientHeight
      && r.left <= html.clientWidth
    );

	}



});
</script>
<?php
get_footer();
