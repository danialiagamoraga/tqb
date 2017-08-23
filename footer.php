<footer id="footer">
    <?php require_once('sub-footer.php'); ?>
    <div class="contenedor">
        <div class="contenedor-col">
            <?php
            if (is_active_sidebar('tqb_left')) {
                dynamic_sidebar('tqb_left');
            } else { ?>
                <div class="footer-div">
                    <p>Añade tus copyright</p>
                </div>
            <?php } ?>
            <div>
                <a href="#" id="back-to-top" title="Back to top"><i class="fa fa-angle-double-up"
                                                                    aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <script>
        var titulo = '<?php echo get_the_title(18); ?>';
        var excerpt = '<?php echo get_the_excerpt(18); ?>';

        if ($("#nav-phone").length > 0) {
            $("#nav-phone .contenedor").prepend("<div class='reseña'><h1>" + titulo + "</h1><p>" + excerpt + "</p></div>");
        } else {
            $(".reseña").hide();
        }
    </script>
    <?php wp_footer() ?>
</footer>
</body>
</html>
