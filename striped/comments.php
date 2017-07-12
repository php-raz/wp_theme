<?php
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">
<?php if ( post_password_required() ) : ?>
				<p class="nopassword">
					<?php _e( 'This post is password protected. Enter the password to view any comments.', 'striped' ); ?>
				</p>
			
<?php return;
	endif;
?>
 
<?php if ( have_comments() ) : ?>
			<h3 id="comments-title"><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'striped' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h3>
 
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous">
					<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'striped' ) ); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'striped' ) ); ?>
				</div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>
 
			<ol class="commentlist">
				<?php
					wp_list_comments();
				?>
			</ol>
 
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
			<div class="navigation">
				<div class="nav-previous">
					<?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'striped' ) ); ?>
				</div>
				<div class="nav-next">
					<?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'striped' ) ); ?>
				</div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>
 
	<?php
	/*
	 * If there are no comments and comments are closed, let's leave a little note.
	 */
	$num_comments = get_comments_number();
	if ( ! comments_open() && $num_comments == 0 ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'striped' ); ?></p>
	<?php endif;  ?>
 
<?php endif; // end have_comments() ?>
 

<?php comment_form(); ?>

</div><!-- #comments -->
