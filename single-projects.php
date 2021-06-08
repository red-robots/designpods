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
			<div class="fullwidth-images">
				<div class="wrapper">
				<?php foreach ($images as $row) { 
					$img = $row['image'];
					?>
					<figure class="fullwidth">
						<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>" class="full-image">
					</figure>
				<?php } ?>
				</div>
			</div>	
			<?php } ?>
		</div>
		
	
	<?php endwhile; ?>
</div><!-- #primary -->

<script>
jQuery(document).ready(function($){
	
	adjust_image_bottom();
	$(window).resize(function(){
		adjust_image_bottom();
	});

	function adjust_image_bottom() {
		if( $("#bottom-image").length > 0 ) {
			var imageHeight = Math.round($("#bottom-image").height() / 2) + 30;
			$(".pagetext").css("padding-bottom",imageHeight+"px");
		}
	}
});
</script>
<?php
get_footer();
