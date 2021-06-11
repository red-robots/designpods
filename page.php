<?php get_header(); ?>
<div id="primary" class="content-area">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php $bottomImage = get_field("bottom_image"); ?>

		<div id="page-content" class="sp-flexwrap">

			<div class="col-left">

				<?php get_template_part("parts/subpage-logo"); ?>

				<h1 class="page-title"><?php the_title(); ?></h1>

				<?php if ($bottomImage) { ?>
				<div class="page-bottom-image hide-xs wow fadeIn">
					<img id="bottom-image" src="<?php echo $bottomImage['url'] ?>" alt="<?php echo $bottomImage['title'] ?>">
				</div>	
				<?php } ?>
			</div>

			<?php 
			$alt_title = get_field("alternative_title"); 
			$main_content = "";
			?>
			<div class="col-right pagetext">
				<div class="page-inner hidden">

					<?php ob_start(); ?>
					<?php if ($alt_title) { ?>
					<div class="titlediv">
						<h2 class="alt-title">
							<span class="svg-top">
								<?php include( locate_template('images/squiggles/svg/animated/traingle_x.svg') ); ?>
							</span>
							<?php echo $alt_title ?>
							<span class="svg-bottom">
								<?php include( locate_template('images/squiggles/svg/animated/sprinkle.svg') ); ?>
							</span>
						</h2>
					</div>
					<?php } ?>
					<?php the_content(); ?>

					<?php 
						$main_content = ob_get_contents(); 
						ob_end_clean();
						echo $main_content;
					?>

				</div>
			</div>
		</div>


		<div class="page-content-mirror">
			<div class="page-text-wrap">
				<div class="page-inner">
					<?php echo $main_content ?>
				</div>
			</div>
		</div>


		<?php if ($bottomImage) { ?>
		<div class="page-bottom-image white visible-xs">
			<div class="image" style="background-image:url('<?php echo $bottomImage['url'] ?>')"></div>
			<img id="bottom-image" src="<?php echo $bottomImage['url'] ?>" alt="<?php echo $bottomImage['title'] ?>">
		</div>	
		<?php } ?>

		
	
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
