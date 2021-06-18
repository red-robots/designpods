<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>

<?php 
$row1Text = get_field("row1_text"); 
$row1TextMobile = get_field("row1_text_mobile"); 
$row1MobileText = ($row1TextMobile) ? $row1TextMobile : $row1Text;
?>
<div class="row-1 w100">
	<div class="text">
		<div class="wrapper">
			<div class="titlediv fixed">
				<div class="inline fadeIn animated">
					<?php if ($row1Text) { ?>
					<div id="row1-title" class="row1-title"><?php echo $row1Text ?></div>
					<?php } ?>

					<?php if ($row1MobileText) { ?>
					<div id="row1-title-mobile" class="row1-title"><?php echo $row1MobileText ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="balloondiv">
		<img class="balloon-logo" src="<?php imageDIR('balloon_logo.png') ?>" alt="Logo" />
	</div>
</div>


<?php 
	$row2_title = get_field("row2_title"); 
	$row2_text = get_field("row2_text"); 
	$row2_button = get_field("row2_button");
	$btn2Link =  (isset($row2_button['url']) && $row2_button['url']) ? $row2_button['url'] : ''; 
	$btn2Name =  (isset($row2_button['title']) && $row2_button['title']) ? $row2_button['title'] : ''; 
	$btn2Target =  (isset($row2_button['target']) && $row2_button['target']) ? $row2_button['target'] : '_self'; 
?>

<?php if ($row2_title || $row2_text) { ?>
<div class="row-2 w100 para" data-pos-x="left" data-parallax="1" data-src="<?php imageDIR('yellow.png') ?>">
	<div class="row-inner">
		<div class="balloon-hero"></div>
		<div class="wrapper sm">
			<div class="flexwrap">
				
				<div class="col left">

					<div id="thinking-svg-mobile" class="animated fadeIn"></div>

					<div class="wrap wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
						
						
						<?php if ($row2_title) { ?>
							<h2 class="h2"><?php echo $row2_title ?></h2>
						<?php } ?>
						
						<?php if ($row2_text) { ?>
						<div class="info"><?php echo $row2_text ?></div>
						<?php } ?>

						<?php if ($btn2Link && $btn2Name) { ?>
						<div class="more">
							<a href="<?php echo $btn2Link ?>" target="<?php echo $btn2Target ?>" class="more-btn"><?php echo $btn2Name ?></a>
						</div>
						<?php } ?>
						
					</div>
				</div>

				<?php $row2_svg = get_field("row2_svg"); ?>
				<?php if ($row2_svg) { ?>
				<div id="thinking-svg-desktop" class="col right animatedEl">
					<div class="thinking wow fadeInRight" data-wow-duration="0.6s" data-wow-delay="0.8s">
						<img src="<?php echo $row2_svg['url'] ?>" alt="<?php echo $row2_svg['title'] ?>">
						<?php  //include( locate_template('images/svg/me_thinking.svg') );  ?>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>


<?php 
$row3_image = get_field("row3_image");
$row3_text = get_field("row3_text");
if($row3_image || $row3_text) { ?>
<div class="row-3 w100">
	<div class="wrapper sm">
		<div class="flexwrap">
			<?php if ($row3_image) { ?>
			<div class="col left fadeIn wow" data-wow-duration="0.5s">
				<div class="inner doughnut-graphic">
					<img class="doughnut" src="<?php echo $row3_image['url'] ?>" alt="<?php echo $row3_image['title'] ?>" />
				</div>
			</div>
			<?php } ?>

			<?php if ($row3_text) { ?>
			<div class="col right">
				<div class="text font2 fadeIn wow">
					<h2><?php echo $row3_text ?></h2>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>




<?php  
/* PROJECTS / CASE STUDIES */
$featured_projects = get_field("featured_projects");
?>
<div class="row-4 w100 row-projects">
	<div class="wrapper sm">

		<?php if ($featured_projects) { ?>
		<div class="flexwrap projects">
			<?php 
			$second = round(10/100,2);
			$i=$second; foreach ($featured_projects as $p) { 
				$i = $second + $i;
				$pid = $p->ID;
				$pagelink = get_permalink($pid);
				$thumb = get_field("thumbnail_image",$pid);
				if($thumb) { ?>
				<div class="box wow fadeInUp" data-wow-delay="<?php echo $i ?>s">
					<a href="<?php echo $pagelink; ?>"><img src="<?php echo $thumb['url'] ?>" alt="<?php echo $thumb['title'] ?>"></a>
				</div>
				<?php } ?>
			<?php } ?>
		</div>
		<?php } ?>


		<?php 
		$row4ImageType = get_field("row4_image_type");
		$row4Type = ($row4ImageType) ? $row4ImageType : '';
		$row4_image = ($row4Type) ? get_field("row4_".$row4Type) : ""; 
		$row4_group = get_field("row4_group"); 
		$row4_svg = get_field("row4_svg"); 
		?>
		<div class="illustration-logo">
			<span class="top-star wow zoomIn"></span>
			<div class="flexwrap">
				<?php if($row4_svg) { ?>
				<div class="col graphic wow fadeIn" data-wow-delay="0.5s">
					<img src="<?php echo $row4_svg['url'] ?>" alt="<?php echo $row4_svg['title'] ?>" class="img-type">
				</div>
				<?php } ?>

				<?php if ($row4_group) { ?>
				<div class="col text wow fadeIn" data-wow-delay="0.7s">

					<?php if ( isset($row4_group['title']) && $row4_group['title'] ) { ?>
						<h2 class="h2 font2"><?php echo $row4_group['title'] ?></h2>
					<?php } ?>

					<?php if ( isset($row4_group['text']) && $row4_group['text'] ) { ?>
					<div class="svg-text">
						<?php echo $row4_group['text']; ?>
					</div>
					<?php } ?>


					<?php if ( isset($row4_group['button']) && $row4_group['button'] ) { 
						$r4Btn = $row4_group['button'];
						$r4BtnLink = ( isset($r4Btn['url']) && $r4Btn['url'] ) ? $r4Btn['url'] : '';
						$r4BtnName = ( isset($r4Btn['title']) && $r4Btn['title'] ) ? $r4Btn['title'] : '';
						$r4BtnTarget = ( isset($r4Btn['target']) && $r4Btn['target'] ) ? $r4Btn['target'] : '_self';
						?>
						<div class="more">
							<a href="<?php echo $r4BtnLink ?>" target="<?php echo $r4BtnTarget ?>" class="more-btn get-started"><?php echo $r4BtnName ?> <span class="icon"><i class="fab fa-telegram-plane"></i></span></a>
						</div>
					<?php } ?>

				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>

<?php  

$row5ImageType = get_field("row5_image_type");
$row5Type = ($row5ImageType) ? $row5ImageType : '';
$row5_image = ($row5Type) ? get_field("row5_".$row5Type) : ""; 
$row5Clients = get_field("row5_clients");
$row5Image = get_field("row5_image");
$row5Title = ( isset($row5Clients['heading']) && $row5Clients['heading'] ) ? $row5Clients['heading'] : '';
$row5Brands = ( isset($row5Clients['brands']) && $row5Clients['brands'] ) ? $row5Clients['brands'] : '';
$row5BrandsMobile = ( isset($row5Clients['brands_mobile']) && $row5Clients['brands_mobile'] ) ? $row5Clients['brands_mobile'] : '';
?>

<div class="row-5 w100 row-brands">
	<div class="wrapper sm">
		<div class="illustrations">
			<div class="flexwrap">

				<?php if($row5Image) { ?>
				<div class="col graphic wow fadeIn" data-wow-delay="0.4s">
					<img src="<?php echo $row5Image['url'] ?>" alt="<?php echo $row5Image['title'] ?>" class="img-type">
				</div>
				<?php } ?>

				<?php if ( $row5Title || $row5Brands ) { ?>
				<div class="col text wow fadeIn" data-wow-delay="0.4s">
					<div class="wrap">

						<?php if ($row5Title) { ?>
							<h2 class="h2 font2"><?php echo $row5Title ?></h2>
						<?php } ?>
						
						<?php if ($row5Brands || $row5BrandsMobile) { ?>
						<div class="clients">
							<div class="logos">
								<img class="all hidden-xs" src="<?php echo $row5Brands['url'] ?>" alt="<?php echo $row5Brands['title'] ?>">
								<?php if ($row5BrandsMobile) { ?>
								<img class="all visible-xs" src="<?php echo $row5BrandsMobile['url'] ?>" alt="<?php echo $row5BrandsMobile['title'] ?>">
								<?php } ?>
							</div>
						</div>
						<?php } ?>

					</div>
				</div>
				<?php } ?>

			</div>
		</div>
	</div>
</div>

<?php  
$row6_title = get_field("row6_title");
$row6_text = get_field("row6_text");
$row6_button = get_field("row6_button");
$btn6Link =  (isset($row6_button['url']) && $row6_button['url']) ? $row6_button['url'] : ''; 
$btn6Name =  (isset($row6_button['title']) && $row6_button['title']) ? $row6_button['title'] : ''; 
$btn6Target =  (isset($row6_button['target']) && $row6_button['target']) ? $row6_button['target'] : '_self'; 

$row6ImageType = get_field("row6_image_type");
$row6Type = ($row6ImageType) ? $row6ImageType : '';
$row6_image = ($row6Type) ? get_field("row6_".$row6Type) : ""; 
$row6_svg_image = get_field("row6_svg_image");

if( $row6_title || $row6_text ) { ?>
<div class="row-6 w100 abracadabra">
	<div class="wrapper sm">
		<div class="flexwrap">
			<div class="skills">

				<?php if ( $row6_svg_image ) { ?>
				<div class="graphic visible-xs mobile">
					<div class="graphic-svg wow fadeIn" data-wow-delay="0.5s">
						<img src="<?php echo $row6_svg_image['url'] ?>" alt="<?php echo $row6_svg_image['title'] ?>" class="img-type">
					</div>
				</div>
				<?php } ?>

				<div class="wrap wow fadeIn">
					<?php if ($row6_title) { ?>
					<h2 class="t1 h2 font2"><?php echo $row6_title ?></h2>
					<?php } ?>
						
					<?php if ($row6_text) { ?>
					<div class="services-list">
						<?php echo $row6_text ?>
					</div>
					<?php } ?>

					<?php if( $btn6Link || $btn6Name ) { ?>
					<div class="more">
						<a href="<?php echo $btn6Link ?>" target="<?php echo $btn6Target ?>" class="more-btn btn-pill white-pink"><?php echo $btn6Name ?></a>
					</div>
					<?php } ?>
				</div>
				
			</div>

			<?php if ( $row6_svg_image ) { ?>
			<div class="graphic hidden-xs desktop">
				<div class="graphic-svg wow fadeInUp" data-wow-delay="0.5s">
					<img src="<?php echo $row6_svg_image['url'] ?>" alt="<?php echo $row6_svg_image['title'] ?>" class="img-type">
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>

<?php endwhile; ?>

<script>
	if( $("#thinking-svg-desktop").length>0 ) {
		$("#thinking-svg-mobile").html( $("#thinking-svg-desktop .thinking").html() );
	}
</script>
<?php
get_footer();
