<?php
/**
 * The template for displaying Comments.
 * @package WordPress
 */
?>
<div class="contenedor">
    <div id="comentarios">
        <?php if (post_password_required()) : ?>
        <p class="nopassword"><?php _e('This post is password protected. Enter the password to view any comments.', 'admincore'); ?></p>
    </div><!-- #comments -->
    <?php
    /* Stop the rest of comments.php from being processed,
     * but don't kill the script entirely -- we still have
     * to fully load the template.
     */
    return;
    endif;
    ?>

    <?php if (have_comments()) : ?>
        <article>
            <h1 class="titulo-comentarios"><?php printf(_n('#1 Comentario', '#%1$s Comentarios %2$s', get_comments_number(), 'admincore'),
                    number_format_i18n(get_comments_number()), '<em>' . '</em>'); ?></h1>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
                <div class="navigation">
                    <div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'admincore')); ?></div>
                    <div class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'admincore')); ?></div>
                </div> <!-- .navigation -->
            <?php endif; // check for comment navigation ?>

            <ol class="lista-comentarios">
                <?php wp_list_comments('type=comment&callback=tqb_comentarios'); ?>
            </ol>

            <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
                <div class="navigation">
                    <div class="nav-previous"><?php previous_comments_link(__('<span class="meta-nav">&larr;</span> Older Comments', 'admincore')); ?></div>
                    <div class="nav-next"><?php next_comments_link(__('Newer Comments <span class="meta-nav">&rarr;</span>', 'admincore')); ?></div>
                </div><!-- .navigation -->
            <?php endif; // check for comment navigation ?>
        </article>
    <?php else : // or, if we don't have comments:

        /* If there are no comments and comments are closed,
         * let's leave a little note, shall we?
         */
        if (!comments_open()) :
            ?>

        <?php endif; // end ! comments_open()
        ?>

    <?php endif; // end have_comments() ?>

    <?php
    $comments_args = array(
        // change the title of the reply section
        'title_reply' => __('Añadir comentario', 'admincore'),
        // change the title of send button
        'label_submit' => __('Dejar Comentario', 'adore'),
        // remove "Text or HTML to be displayed after the set of comment fields"
        'cancel_reply_link' => __('Cancelar', 'admincore'),
        'comment_notes_before' => '',
        'comment_notes_after' => '',
        // redefine your own textarea (the comment body)
        'comment_field' => '<label for="comment">' . _x('Escribe tu comentario', 'admincore') . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>',
        'must_log_in' => '<p class="must-log-in">' . sprintf(__('Debes estas <a href="%s">registrado</a> para realizar un comentario.', 'admincore'), wp_login_url(apply_filters('the_permalink', get_permalink()))) . '</p>',
        'logged_in_as' => '',
        'fields' => apply_filters('comment_form_default_fields', array(
            'author' => '<label for="author">' . __('Nombre', 'admincore') . '</label> ' . ($req? '<span class="required">*</span>' : '') . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' />',
            'email' => '<label for="email">' . __('Email', 'admincore') . '</label> ' . ($req? '<span class="required">*</span>' : '') . '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' />'/*,
		'url' => '<p class="comment-form-url"><label for="url">' . __( 'Website', 'admincore' ) . '</label>' . '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>' */))
    );

    comment_form($comments_args);
    ?>

</div><!-- #comments -->
</div>