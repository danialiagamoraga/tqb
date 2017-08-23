<?php get_header('homepage'); ?>
<?php require_once('lateral-menu.php'); ?>

<section id="nofound" class="contenedor">

    <h1 class="titulo"><?php _e('404', 'tequierobonita'); ?></h1>
    <h2 class="subtitulo"><?php _e('Página NO disponible. ', 'tequierobonita'); ?></h2>

    <article class="wow zoomIn">
        <h1 class="title-404"><span>Oops!</span> El contenido no esta disponible. Lo estamos dejando bonito para ti :).
        </h1>

        <div><a href="<?php echo esc_url(home_url('/')); ?>" class="boton-back">Regresar al inicio</a></div>
    </article>
</section>

<?php get_footer(); ?>

