<!-- Post -->
<article class="box post post-excerpt">
	<header>
		<h2><a title="<?php printf( esc_attr__( 'Permalink to %s', 'striped' ), the_title_attribute( 'echo=0' ) ); ?>" 
			   href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?>
			</a>
		</h2>							
	</header>
	<div class="info">
		<span class="date">
			<span class="month"><?php the_time( 'F' ); ?></span> 
			<span class="day"><?php the_time( 'j' ); ?></span>
			<span class="year"><?php the_time( 'Y' ); ?></span>
		</span>
		<ul class="stats">
			<li><a href="<?php echo get_comments_link(); ?>" class="fa fa-comment">
				<?php echo get_comments_number(); ?></a></li>
			<li><?php echo getPostLikeLink(get_the_ID());?></li>
		</ul>
	</div>
    <?php the_post_thumbnail( array( 853, 359 ), 'class=fl' ); ?>
	<p><?php the_content(); ?></p>

	<?php edit_post_link( __( 'Редактировать запись', 'striped' ), '<div class="edit-link">', '</div>' ); ?>
	<p class="tags"><?php the_tags(__( 'Метки: ', 'striped' ),', '); ?></p>
	<p class="categories"><?php _e( 'Рубрики: ', 'striped' ) . the_category(', '); ?></p>
</article>