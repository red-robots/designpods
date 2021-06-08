<?php 
/* 
 * Template Name: Work
 */
get_header(); ?>

<div id="primary" class="content-area work-page">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php $bottomImage = get_field("bottom_image"); ?>

		<div id="page-content" class="sp-flexwrap">

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

				<?php if ($bottomImage) { ?>
				<div class="page-bottom-image hide-xs">
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
							<span class="svg-bottom arrow-down">
								<?php include( locate_template('images/squiggles/svg/animated/arrow_animate.svg') ); ?>
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
		<div class="page-bottom-image visible-xs">
			<div class="image" style="background-image:url('<?php echo $bottomImage['url'] ?>')"></div>
			<img id="bottom-image" src="<?php echo $bottomImage['url'] ?>" alt="<?php echo $bottomImage['title'] ?>">
		</div>	
		<?php } ?>
	
	<?php endwhile; ?>
</div><!-- #primary -->

<?php 
$projects = get_field("projects"); 
?>
<?php if ($projects) { ?>
<div class="masonry-wrapper">
	<div class="wrapper">
		<div class="masonry">
			<?php $i=1; foreach ($projects as $proj) { 
				$imageID = $proj['ID'];
				$pagelinkId = get_field("pagelink",$imageID);
				//$width = get_field("image_width",$imageID);
				$spanWidth = get_field("imageWidth",$imageID);
				$imagewidth_mobile = get_field("imagewidth_mobile",$imageID);
				$gridrow = get_field("gridrow",$imageID);
				//$styleAtt = ($width) ? ' style="width:'.$width.'%"':'';
				$styleAtt = ($spanWidth) ? ' style="width:'.$spanWidth.'%"':'';
				//$styleAtt = '';
				$link_open = '<div class="projlink">';
				$link_close = '</div>';
				if($pagelinkId) {
					$link_open = '<a href="'.get_permalink($pagelinkId).'" class="projlink">';
					$link_close = '</a>';
				}
				
				$spanClass = ($spanWidth) ? ' span'.$spanWidth :'';
				$image_helper = get_bloginfo("template_url") . "/images/span70.png";
				if($spanWidth==33.333) {
					$image_helper = get_bloginfo("template_url") . "/images/span30.png";
					$spanClass = ' span30';
				}
				if($spanWidth==33.333 && $gridrow>1) {
					$image_helper = get_bloginfo("template_url") . "/images/span30-long.png";
				}
				if($spanWidth>60 && $gridrow>1) {
					$image_helper = get_bloginfo("template_url") . "/images/span70-long.png";	
				}
				if($spanWidth>60) {
					$spanClass = ' span70';
				}
				if($imagewidth_mobile && is_numeric($imagewidth_mobile)) {
					$spanClass .= ' span-mobile' . $imagewidth_mobile;
					$spanClass .= ' span-mobile';
				}
				?>	
				<div id="masonry-item<?php echo $i?>" class="item<?php echo $spanClass?>"<?php echo $styleAtt ?>>
					<?php echo $link_open; ?>
					<span class="inner" style="background-image:url('<?php echo $proj['url'] ?>')">
					<img src="<?php echo $image_helper ?>" alt="" aria-hidden="true" class="helper1">
					
					<?php if($spanWidth>60) { ?>

						<?php if($gridrow>1) { ?>
							<img src="<?php echo get_bloginfo("template_url") ?>/images/span30.png" alt="" aria-hidden="true" class="helper2">
						<?php } else { ?>
							<img src="<?php echo get_bloginfo("template_url") ?>/images/span70.png" alt="" aria-hidden="true" class="helper2">
						<?php } ?>
					<?php } else { ?>
					<img src="<?php echo get_bloginfo("template_url") ?>/images/span30.png" alt="" aria-hidden="true" class="helper2">
					<?php } ?>
					</span>
					<?php echo $link_close; ?>
				</div>
			<?php $i++; } ?>
		</div>
	</div>
</div>
<?php } ?>
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

	// $('.masonry').masonry({
	// 	itemSelector: '.grid-item',
	// 	columnWidth : 200 
	// });

	// window.checkItemPositions = function( msnry, assert, positions ) {
	//   var i = 0;
	//   var position = positions[i];
	//   while ( position ) {
	//     var style = msnry.items[i].element.style;
	//     for ( var prop in position ) {
	//       var value = position[ prop ] + 'px';
	//       var message = 'item ' + i + ' ' + prop + ' = ' + value;
	//       assert.equal( style[ prop ], value, message );
	//     }
	//     i++;
	//     position = positions[i];
	//   }
	// };


});
</script>

<?php
get_footer();
