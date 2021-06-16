<?php 
/* 
 * Template Name: Services
 */
get_header(); ?>
<div id="primary" class="content-area">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php $bottomImage = get_field("bottom_image"); ?>

		<div id="page-content" class="sp-flexwrap <?php echo ($bottomImage) ? 'has-bottom-image':'no-bottom-image'; ?>">

			<div class="col-left">
				<?php get_template_part("parts/subpage-logo"); ?>

				<h1 class="page-title"><?php the_title(); ?></h1>

				<?php if ($bottomImage) { ?>
				<div class="page-bottom-image-v2 hidden-xs wow fadeIn">
					<img id="bottom-image" src="<?php echo $bottomImage['url'] ?>" alt="<?php echo $bottomImage['title'] ?>">
				</div>	
				<?php } ?>
			</div>

			<div class="col-right pagetext">
				<div class="page-inner">

					<div class="entry-content">
						<?php $custom_content = get_field("services-content"); ?>
						<?php if ($custom_content) { ?>
						<div class="custom-content-repeater">
							<?php $i=1; foreach ($custom_content as $c) { 
								$small_title = $c['small_title'];
								$small_title_color = ($c['small_title_color']) ? $c['small_title_color'] : "#000";
								$big_title = $c['big_title'];
								$text = $c['text'];

								$squiggles = $c['squiggles'];
								$top_squiggles = ( isset($squiggles['top']) && $squiggles['top'] ) ? $squiggles['top'] : '';
								$top_squiggles_position = ( isset($squiggles['top_position']) && $squiggles['top_position'] ) ? $squiggles['top_position'] : 'left';
								$bottom_squiggles = ( isset($squiggles['bottom']) && $squiggles['bottom'] ) ? $squiggles['bottom'] : '';
								$bottom_squiggles_position = ( isset($squiggles['bottom_position']) && $squiggles['bottom_position'] ) ? $squiggles['bottom_position'] : 'right';
							
								$button = $c['button'];
								$buttonName = ( isset($button['title']) && $button['title'] ) ? $button['title'] : '';
								$buttonLink = ( isset($button['url']) && $button['url'] ) ? $button['url'] : '';
								$buttonTarget = ( isset($button['target']) && $button['target'] ) ? $button['target'] : '_self';
							?>
								<?php 
								/* TITLE SQUIGGLE CSS */
								if ($top_squiggles || $bottom_squiggles) { ?>
								<style type="text/css">
									<?php if ($top_squiggles) { ?>
										#custom-entry<?php echo $i?> .titlediv:before {
											content: "";
											display: block;
											width: 70px;
											height: 70px;
											background-image: url('<?php echo $top_squiggles['url']?>');
											background-size: contain;
											background-position: center;
											background-repeat: no-repeat;
											position:  absolute;
											top: -38px;
										}
										#custom-entry<?php echo $i?> .titlediv.has-small-title:before {top: -45px;}
										<?php if ($top_squiggles_position=='left') { ?>
											#custom-entry<?php echo $i?> .titlediv:before { left: -45px; }
											@media screen and (max-width: 768px) {
												#custom-entry<?php echo $i?> .titlediv:before { top: -30px!important; left: -10px; width:60px; height:60px;}
											}
										<?php } ?>
										<?php if ($top_squiggles_position=='right') { ?>
											#custom-entry<?php echo $i?> .titlediv:before {display:none;}
											#custom-entry<?php echo $i?> .big-title span:before {
												content: "";
												display: block;
												width: 100px;
												height: 100px;
												background-image: url('<?php echo $top_squiggles['url']?>');
												background-size: contain;
												background-position: center;
												background-repeat: no-repeat;
												position:  absolute;
												top: -50px;
												right: -85px;
											}
											@media screen and (max-width: 768px) {
												#custom-entry<?php echo $i?> .big-title span:before {right: -75px; top: -43px;width: 80px; height: 80px;}
											}
										<?php } ?>
									<?php } ?>

									<?php if ($bottom_squiggles) { ?>
										#custom-entry<?php echo $i?> .big-title span:after {
											content: "";
											display: inline-block;
											width: 50px;
											height: 50px;
											background-image: url('<?php echo $bottom_squiggles['url']?>');
											background-size: contain;
											background-position: center;
											background-repeat: no-repeat;
											position: absolute;
											transform: translateX(5px) translateY(15px);
										}
										<?php if ($bottom_squiggles_position=='left') { ?>
											#custom-entry<?php echo $i?> .big-title span:after { left: -45px; transform: translateX(-5px) translateY(20px); }
										<?php } ?>
									<?php } ?>
								</style>	
								<?php } ?>


								<div id="custom-entry<?php echo $i?>" class="entry">
									<?php if ($small_title || $big_title) { ?>
									<div class="titlediv<?php echo ($small_title) ? ' has-small-title':'' ?>">
											<?php if ($small_title) { ?>
											<p class="small-title" style="color:<?php echo $small_title_color?>"><?php echo $small_title ?></p>	
											<?php } ?>

											<?php if ($big_title) { ?>
											<div class="big-title-wrap">						
												<h2 class="big-title"><span><?php echo $big_title ?></span></h2>	
											</div>
											<?php } ?>
									</div>
									<?php } ?>

									<?php if ($text) { ?>
									<div class="text"><?php echo $text ?></div>
									<?php } ?>

									<?php if ($buttonName && $buttonLink) { ?>
									<div class="buttondiv">
										<a href="<?php echo $buttonLink ?>" target="<?php echo $buttonTarget ?>" class="more-btn get-started"><?php echo $buttonName ?> <span class="icon"><i class="fab fa-telegram-plane"></i></span></a>
									</div>	
									<?php } ?>
								</div>
							<?php $i++; } ?>
						</div>
						<?php } ?>
					</div>

				</div>

				<?php if ($bottomImage) { ?>
				<div class="page-bottom-image-v2 visible-xs">
					<img id="bottom-image" src="<?php echo $bottomImage['url'] ?>" alt="<?php echo $bottomImage['title'] ?>">
				</div>	
				<?php } ?>
			</div>

		</div>

	
	<?php endwhile; ?>
</div><!-- #primary -->

<script>
jQuery(document).ready(function($){
});
</script>
<?php
get_footer();
