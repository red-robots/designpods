<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bellaworks
 */

get_header(); ?>

	<div id="primary" class="content-area error-404 not-found">
		<div id="page-content" class="sp-flexwrap">

			<?php
				$title = get_field("404_title","option");
				$title2 = get_field("404_title2","option");
				$text = get_field("404_text","option");
				$bottomImage = get_field("404_bottom_image","option");
			?>

			<div class="col-left">
				<?php get_template_part("parts/subpage-logo"); ?>
				<h1 class="page-title"><?php esc_html_e( $title, 'bellaworks' ); ?></h1>
			</div>

			<div class="col-right pagetext">
				<div class="page-inner">
					<?php if ($title2) { ?>
					<div class="titlediv">
						<h2 class="alt-title">
							<span class="svg-right">
								<?php include( locate_template('images/squiggles/svg/animated/traingle_x.svg') ); ?>
							</span>
							<?php echo $title2 ?>
						</h2>
					</div>
					<?php } ?>

					<?php if ($title2) { ?>
					<div class="textdiv">
						<?php echo $text ?>
					</div>
					<?php } ?>

				</div>
			</div>

		</div>

		<?php if ($bottomImage) { ?>
		<div class="page404-bottom-image">
			<div class="image" style="background-image:url('<?php echo $bottomImage['url'] ?>')"></div>
			<img id="bottom-image" src="<?php echo $bottomImage['url'] ?>" alt="<?php echo $bottomImage['title'] ?>">
		</div>	
		<?php } ?>

	</div><!-- #primary -->

<?php
get_footer();
