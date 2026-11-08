<?php
/**
 * The template for displaying comments
 *
 * @package RajTech_BD
 */

if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area mt-16 pt-8 border-t border-[#E2E8F0]">

    <?php if ( have_comments() ) : ?>
        <h2 class="comments-title text-xl font-bold text-[#0F172A] mb-6">
            <?php
            $comment_count = get_comments_number();
            echo esc_html( sprintf(
                /* translators: 1: number of comments */
                _nx( '%1$s Thought', '%1$s Thoughts', $comment_count, 'comments title', 'rajtechbd' ),
                number_format_i18n( $comment_count )
            ) );
            ?>
        </h2>

        <ol class="comment-list space-y-6 list-none p-0">
            <?php
            wp_list_comments( array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 48,
            ) );
            ?>
        </ol>

        <?php the_comments_navigation(); ?>

    <?php endif; ?>

    <?php if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
        <p class="no-comments text-sm text-[#64748B] italic"><?php esc_html_e( 'Comments are closed.', 'rajtechbd' ); ?></p>
    <?php endif; ?>

    <?php
    comment_form( array(
        'class_submit'  => 'px-6 py-3 rounded bg-[#0284C7] text-white font-bold text-sm cursor-pointer hover:bg-[#0369a1] transition-all',
        'title_reply'   => esc_html__( 'Leave a Reply', 'rajtechbd' ),
        'comment_field' => '<p class="comment-form-comment mb-4"><label for="comment" class="block text-xs font-bold font-mono-tag uppercase text-[#334155] mb-2">' . _x( 'Comment', 'noun', 'rajtechbd' ) . '</label><textarea id="comment" name="comment" cols="45" rows="5" required class="form-textarea"></textarea></p>',
    ) );
    ?>

</div>
