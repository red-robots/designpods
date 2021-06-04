<?php 
$email = get_field("email","option");
if ( $socialMedia = get_social_media() ) { ?>
<div class="social-media">
	<div class="wrap">
		<?php foreach ($socialMedia as $key=>$sm) { ?>

			<?php if ($key=='email') { ?>
				<a href="mailto:<?php echo antispambot($sm['url'],1) ?>" class="mail" aria-hidden="true"><i class="<?php echo $sm['icon'] ?>"></i></a>
			<?php } else { ?>
				<a href="<?php echo $sm['url'] ?>" class="<?php echo $key ?>" aria-hidden="true"><i class="<?php echo $sm['icon'] ?>" aria-label="<?php echo $key ?>"></i></a>
			<?php } ?>
		
		<?php } ?>
	</div>
</div>
<?php } ?>