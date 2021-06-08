<?php if( get_custom_logo() ) { ?>
  <div class="logo">
  	<?php the_custom_logo(); ?>
  </div>
<?php } else { ?>
  <h1 class="logo">
    <a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a>
  </h1>
<?php } ?>