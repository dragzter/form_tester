<?php 
function do_nav_section() { ?>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav" role="navigation">
<div class="container">
    <a id="page-logo" class="navbar-brand js-scroll-trigger" href="#page-top"><?php echo the_custom_logo(); ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
    <?php
        wp_nav_menu( array(
            'theme_location'  => 'primary',
            'depth'	          => 2, // 1 = no dropdowns, 2 = with dropdowns.
            'container'       => 'ul',
            'container_class' => 'collapse navbar-collapse',
            'container_id'    => 'bs-example-navbar-collapse-1',
            'menu_class'      => 'navbar-nav ml-auto',
            'walker'          => new WP_Bootstrap_Navwalker(),
        ) );
    ?>
    </div>
</div>
</nav>

<?php
}