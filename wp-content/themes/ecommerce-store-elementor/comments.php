<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ecommerce_store_elementor
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
				$ecommerce_store_elementor_comments_number = get_comments_number();
				if ( '1' === $ecommerce_store_elementor_comments_number ) {
					printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'ecommerce-store-elementor' ), get_the_title() );
				} else {
					printf(
						_nx(
							'%1$s Reply to &ldquo;%2$s&rdquo;',
							'%1$s Replies to &ldquo;%2$s&rdquo;',
							$ecommerce_store_elementor_comments_number,
							'comments title',
							'ecommerce-store-elementor'
						),
						number_format_i18n( $ecommerce_store_elementor_comments_number ),
						get_the_title()
					);
				}
			?>
		</h2>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ecommerce-store-elementor' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'ecommerce-store-elementor' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'ecommerce-store-elementor' ) ); ?></div>
				</div>
			</nav>
		<?php endif; ?>
			<ol class="comment-list">
				<?php
					wp_list_comments( array(
						'style'      => 'ol',
						'short_ping' => true,
					) );
				?>
			</ol>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'ecommerce-store-elementor' ); ?></h2>
				<div class="nav-links">
					<div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'ecommerce-store-elementor' ) ); ?></div>
					<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'ecommerce-store-elementor' ) ); ?></div>
				</div>
			</nav>
		<?php endif;?>
	<?php endif; ?>
		<?php
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'ecommerce-store-elementor' ); ?></p>
		<?php endif; ?>
	<?php comment_form(); ?>
</div>