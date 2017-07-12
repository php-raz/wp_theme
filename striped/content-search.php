<!-- Post -->
<article class="box post post-excerpt">
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>							
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
	<a href="<?php the_permalink(); ?>" class="image featured">
		<?php the_post_thumbnail( array( 853, 359 ), 'class=fl' ); ?>
	</a>
	<p><?php the_excerpt(); ?></p>
	<p class="spec"><a href="<?php the_permalink(); ?>" class="rm"> Читать далее...</a></p>
	<p><?php the_tags(); ?>
	</p>
</article>