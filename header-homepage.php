<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
    <!-- METAS -->
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <!-- /METAS -->
    <?php wp_enqueue_script('jquery'); ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>
        <?php

        global $page, $paged;
        wp_title('|', true, 'right');
        // Agrega el nombre del blog.
        bloginfo('name');
        // Agrega la descripción del blog, en la página principal.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
            echo " | $site_description";
        // Agrega el número de página si es necesario:
        if ($paged >= 2 || $page >= 2)
            echo ' | ' . sprintf(__('Page %s', 'Te quiero Bonita'), max($paged, $page));
        ?>
    </title>
    <link href="<?php bloginfo('stylesheet_url') ?>" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/hamburgler.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('stylesheet_directory'); ?>/css/slick.css" rel="stylesheet" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/slick.min.js"></script>
    <?php if (is_home() || is_front_page()) { ?>
        <link href="<?php bloginfo('stylesheet_directory'); ?>/css/jquery.bxslider.min.css" rel="stylesheet"
              type="text/css">
        <script src="<?php bloginfo('stylesheet_directory'); ?>/js/jquery.bxslider.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.bxslider').bxSlider({
                    useCSS: false,
                    randomStart: false,
                    controls: true,
                    auto: true,
                    pause: 10000,
                });
            });
        </script>
    <?php } ?>

    <?php wp_head(); ?>
</head>

<body>
<header id="header-full" class="contenedor">
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
        <?php if (get_theme_mod('tqb_logo')) : { ?>
            <div class="logotipo">
                <a href="<?php echo esc_url(home_url('/')); ?>"
                   title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" class="logotype">
                    <img src="<?php echo esc_url(get_theme_mod('tqb_logo')); ?>"
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

<?php get_header('responsive'); ?>