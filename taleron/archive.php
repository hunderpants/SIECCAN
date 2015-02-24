<?php
/*archive.php*/
?>
<?php get_header(); ?>


<?php if(have_posts()) {
		while(have_posts()) : the_post(); 
?>
	<section>
    	<h1>Archives : $archivetext</h1>
		<article class="post">
			<?php the_post_thumbnail('banner-image');?>
			<h1><?php the_title();?></h1>
			<?php the_content();?>
		</article>
        
	</section>
<?php endwhile;
	}
?>
<?php get_sidebar();?>
	
<?php get_footer(); ?>