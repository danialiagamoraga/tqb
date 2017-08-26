<header id="header-responsive" class="contenedor">
    <div class="col-4">
        <div class="mobilenav" id="nav-phone">
            <div class="contenedor">
                <?php
                if (function_exists('wp_nav_menu')) {
                    wp_nav_menu(array("theme_location" => 'navegacion'));
                } else {
                    theme_default_menu();
                }; ?>
            </div>
        </div>
        <a href="javascript:void(0)" class="icon">
            <div class="hamburger">
                <div class="menui top-menu"></div>
                <div class="menui mid-menu"></div>
                <div class="menui bottom-menu"></div>
            </div>
            <div class="word">Menú</div>
        </a>
    </div>
    <div class="col-4">
        <?php if (get_theme_mod('tqb_logo_2')) : { ?>
            <div class="logotipo-2">
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="logotype">
                    <img src="<?php echo esc_url(get_theme_mod('tqb_logo_2')); ?>"
                         alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" title="">
                </a>
            </div> <!-- /logotype -->
        <?php } else : { ?>
            <h1 class="logo-else"><?php echo get_bloginfo( 'name' ); ?></h1>
        <?php } ?>
        <?php endif; ?>
    </div>
    <nav class="col-4">
        <?php wp_nav_menu(array("theme_location" => 'navegacion-secundaria')); ?>
    </nav>
</header>