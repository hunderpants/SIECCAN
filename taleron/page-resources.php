<?php
/*
page-resources.php
*/
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

<?php $resources = new WP_Query('category_name=resources&posts_per_page=5'); ?>
	<?php if($resources->have_posts()):?>
	<section class=>
	<h2>Resource Documents</h2>
	<?php			while($resources->have_posts()) : $resources->the_post();
	?>
	<div class="resource-documents clearfix">
		<?php if (has_post_thumbnail()){?>
		<div class="resource-image">
			<?php the_post_thumbnail('small-thumbnail');?>
		</div>
			<?php }?>
		<div class="resource-info">
			<h5>
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</h5>
			<?php the_content(); ?>
			<?php
				 get_buttons();
			?>
		</div>
	</div>
	<?php endwhile; ?>
	</section>
	<?php else: 
			if(is_user_logged_in() || !is_page()){
	?>
			Add post to category <b>Resources or Reports</b>
	<?php 
			}
		endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>