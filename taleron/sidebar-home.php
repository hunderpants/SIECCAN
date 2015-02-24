<?php
/*sidebar-home.php*/
?>
<aside>
		<?php $ads = new WP_Query('tag='. $post->post_name .'&posts_per_page=5'); ?>
        <?php if($ads->have_posts()):?>
		<?php			while($ads->have_posts()) : $ads->the_post();
		?>
		<article>
			
			
			<?php if (has_post_thumbnail()){?>
			<div class="resource-image-side">
			<?php the_post_thumbnail('small-thumbnail');?>
			</div>
			<?php }?>

			<h5><?php the_title();?></h5>
				<?php the_content();?>
				<?php 
					get_buttons();
				?>
        </article>
			<?php endwhile; ?>
	<?php else: 
		if(is_user_logged_in()){
	?>
			Tag post with <b><?php echo $post->post_name;?></b> to show here
	<?php 
		}
		endif; ?>

		<?php wp_reset_postdata(); ?>	
	</aside>