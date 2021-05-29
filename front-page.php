<?php get_header(); ?>

<div class="row-1 w100">
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

<div class="row-2 w100 para" data-pos-x="left" data-parallax="1" data-src="<?php imageDIR('yellow.png') ?>">
	<div class="row-inner">
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
							include( locate_template('images/svg/me_thinking.svg') ); 
							$thinkingImg = get_bloginfo("template_url") ."/images/animated/me_thinking.svg";
						?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>


<div class="row-3 w100">
	<div class="wrapper sm">
		<div class="flexwrap">
			<div class="col left fadeIn wow" data-wow-duration="0.5s">
				<div class="inner">
					<img class="doughnut" src="<?php imageDIR('animated/doughnut.gif') ?>" alt="doughnut" />
				</div>
			</div>

			<div class="col right">
				<div class="text font2 fadeIn wow">
					<h2>You're here so you might as well look at some work.</h2>
				</div>
			</div>
		</div>
			
	</div>
</div>


<div class="row-4 w100 row-projects">
	<div class="wrapper sm">
		<div class="flexwrap projects">
			<div class="box wow fadeInUp" data-wow-delay="0.1s">
				<a href="#"><img src="<?php imageDIR('thumbnails/color_study_thumb.jpg') ?>" alt=""></a>
			</div>
			<div class="box wow fadeInUp" data-wow-delay="0.2s">
				<a href="#"><img src="<?php imageDIR('thumbnails/vf_thumb.jpg') ?>" alt=""></a>
			</div>
			<div class="box wow fadeInUp" data-wow-delay="0.3s">
				<a href="#"><img src="<?php imageDIR('thumbnails/eco_options_thumb.jpg') ?>" alt=""></a>
			</div>
		</div>
		<div class="illustration-logo">
			<span class="top-star"></span>
			<div class="flexwrap">
				<div class="col graphic wow fadeIn" data-wow-delay="0.3s">
					<?php include( locate_template('images/svg/logo_bigger.svg') );  ?>
				</div>
				<div class="col text wow fadeIn" data-wow-delay="0.4s">
					<h2 class="h2 font2">Let me make your logo bigger.</h2>
					<p>One of the oldest designers jokes is the client asking to make their logo bigger. The client asks, the designer sighs, the logo eventually ends up bigger. Let's make a logo, and let's make it bigger.</p>
					<div class="more">
						<a href="#" class="more-btn get-started">Get Started <span class="icon"><i class="fab fa-telegram-plane"></i></span></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row-5 w100 row-brands">
	<div class="wrapper sm">
		<div class="illustrations">
			<div class="flexwrap">
				<div class="col graphic wow fadeIn" data-wow-delay="0.3s">
					<img src="<?php imageDIR('animated/pop_desktop.gif') ?>" alt="">
				</div>
				<div class="col text wow fadeIn" data-wow-delay="0.4s">
					<div class="wrap">
						<h2 class="h2 font2">A few brands I've had the joy to work with.</h2>
						<div class="clients">
							<div class="logos">
								<img class="all" src="<?php imageDIR('clients/all_logos.png') ?>" alt="">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="row-6 w100 abracadabra">
	<div class="wrapper sm">
		<div class="flexwrap">
			<div class="skills">
				<div class="wrap">
					<h2 class="t1 h2 font2">
						Abracadabra!<BR>
						I'm a full-service Lindsay.
					</h2>
					<ul class="services">
						<li>Strategy</li>
						<li>User Experience</li>
						<li>Digital Design</li>
						<li>Art Direction</li>
						<li>Doughnut Eating</li>
						<li>Identity and Brand</li>
						<li>Packaging</li>
						<li>Presentation Design</li>
					</ul>

					<div class="more">
						<a href="#" class="more-btn">Read More</a>
					</div>
				</div>
				
			</div>

			<div class="graphic">
				<?php include( locate_template('images/svg/rabbit_hat.svg') );  ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
