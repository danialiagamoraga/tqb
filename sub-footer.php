<section id="sub-footer">
    <div class="contenedor">
        <div class="contenedor-col">
            <?php
            if (is_active_sidebar('tqb_about')) {
                dynamic_sidebar('tqb_about');
            } else { ?>
                <div class="footer-div">
                    <p>Añade una breve reseña.</p>
                </div>
            <?php } ?>
        </div>
    </div>
</section>