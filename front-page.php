<?php get_header(); ?>

<div class="row-1">
	<div class="text">
		<div class="wrapper">
			<div class="titlediv fixed">
				<div class="inline fadeIn animated">
					<h1 id="row1-title">
						Look good<BR>
						and be nice
					</h1>
				</div>
			</div>
		</div>
	</div>
	<div class="balloondiv">
		<img class="balloon-logo" src="<?php imageDIR('balloon_logo.png') ?>" alt="Logo" />
	</div>
</div>

<div class="row-2 para" data-pos-x="left" data-parallax="1" data-src="<?php imageDIR('yellow.png') ?>">
	<div class="row-inner fadeInUp wow">
		<div class="balloon-hero"></div>
		<div class="wrapper sm">
			<div class="flexwrap">
				
				<div class="col left">
					<div class="wrap wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.5s">
						<h2 class="h2">Designpods is<BR>Lindsay Podrid.</h2>
						<div class="info">
							I'm a freelance graphic designer and doughnut eater doing good work with nice people. I like the color yellow, large balloons, and nicely kerned type. I'm currently working on a website redesign for a Fortune 50 company and a logo for my fictitious band, Girl Squirrel. Life and work are all about balance.
						</div>
						<div class="more">
							<a href="#" class="more-btn">Read More</a>
						</div>
					</div>
				</div>

				<div class="col right animatedEl">
					<div class="thinking wow fadeInRight" data-wow-duration="0.6s" data-wow-delay="0.8s">
						<?php  
							//include( locate_template('images/animated/me_thinking.svg') ); 
							$thinkingImg = get_bloginfo("template_url") ."/images/animated/me_thinking.svg";
						?>
							<img src="<?php echo $thinkingImg ?>" alt="">
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<div class="row-3">
	<div class="wrapper sm">
		<div class="flexwrapper">
			<div class="col">
				<img class="doughnut" src="<?php imageDIR('animated/doughnut.gif') ?>" alt="doughnut" />
			</div>
		</div>
			
	</div>
</div>

<?php
get_footer();
