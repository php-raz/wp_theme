<!-- Post -->
<article class="box post post-excerpt">
	<header>
		<h2><?php the_title(); ?></h2>							
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
			<li><a href="#" class="icon fa-heart">32</a></li>
		</ul>
	</div>
	<p><?php the_content(); ?></p>
	<?php edit_post_link( __( 'Редактировать страницу', 'striped' ), '<div class="edit-link">', '</div>' ); ?>
</article>