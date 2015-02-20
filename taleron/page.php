<?php
/*page.php*/
?>
<?php get_header(); ?>

<?php if(have_posts()) {
		while(have_posts()) : the_post(); 
?>
	<section>
    	<nav id="child-links">
  			<span>
            	<a href="<?php echo get_the_permalink(get_tpa());?>">
					<?php echo get_the_title(get_tpa());?>
                </a>
            </span>
			<?php if(has_children() OR $post->post_parent > 0) {?>
			&nbsp;|&nbsp;
  			<ul>
			<?php
              $args = array(
                  'child_of' => get_tpa(),
                  'title_li' => ''
              );
              
              wp_list_pages($args);
          	?>
        	</ul>
			<?php }?>
      </nav>
		<article id="page">
			<h1><?php the_title();?></h1>
			<?php the_content();?>
		</article>
	</section>
<?php endwhile;
	}
?>
<?php get_sidebar();?>
<?php get_footer(); ?>