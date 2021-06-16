<?php 
/* 
 * Template Name: About
 */
get_header(); ?>
<style type="text/css">
	.alt-title {
		position: relative;
	}
	.alt-title:before {
		content: "";
		display: inline-block;
		width: 70px;
		height: 70px;
		background-image: url('<?php echo get_bloginfo("template_url") ?>/images/squiggles/svg/animated/traingle_x.svg');
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		position: absolute;
		top: -35px;
		left: -44px;
	}
	.alt-title:after {
		content: "";
		display: inline-block;
		width: 60px;
		height: 60px;
		background-image: url('<?php echo get_bloginfo("template_url") ?>/images/squiggles/svg/animated/sprinkle.svg');
		background-size: contain;
		background-position: center;
		background-repeat: no-repeat;
		position: absolute;
		margin-top: 20px;
	}
	@media screen and (max-width: 768px) {
		.alt-title:before {
			left: -18px;
		}
		.page-inner .alt-title {
			padding-left: 20px;
		}
	}
</style>
<div id="primary" class="content-area about-page">
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
							<?php echo $alt_title ?>
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
