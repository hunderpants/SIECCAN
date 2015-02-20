<?php
/* front-page.php */
?>
<?php get_header(); ?>
<?php if(have_posts()) {
		while(have_posts()) : the_post(); 
?>
	<section>
    	
		<article class="post">
			<?php if (has_post_thumbnail()){?>
			<?php the_post_thumbnail('banner-image');?>
			<?php }?>
			<h1><?php the_title();?></h1>
			<?php the_content();?>
		</article>
        
	</section>
<?php endwhile;
	}
?>
<?php get_sidebar('home');?>

	<section>		
		<article id="updates">
			<h1>Updates</h1>
			<?php $briefs = new WP_Query('category_name=issue-briefs&posts_per_page=5');
				$x = 0;
			?>
			<div class="itemheadblock">
					<div class="itemnum">&nbsp;</div>
					<div class="itemhead">Sexual Health Issue briefs Available</div>
			</div>
			<?php if($briefs->have_posts()):
					while($briefs->have_posts()) : $briefs->the_post();
				$x+=1;
			?>
			<div class="itemblock">
				<div class="itemnum"><?php echo $x;?></div>
				<div class="item"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
				<div class="publishdate clearfix">
					Published <?php the_time('F Y')?> </div>
			</div>
			<?php endwhile; ?>
			<?php else: ?>
			Add post to category <b>Issue Briefs</b>
			<?php endif; ?>
			<div class="itemendblock">
				<div class="itemnum">+</div>
				<div class="item"><a href="<?php echo get_category_link( get_category_by_slug('issue-briefs') )?>">view all</a></div>
			</div>
			<?php wp_reset_postdata(); ?>
			<?php $resources = new WP_Query('category_name=resources,reports&posts_per_page=5');
				$x=0;
			?>
			<div class="itemheadblock clearfix">
			<div class="itemnum">&nbsp;</div>
				<div class="itemhead">New Resources/Reports Available</div>
			</div>
			<?php if($resources->have_posts()):
					while($resources->have_posts()) : $resources->the_post();
				$x+=1;
			?>
			<div class="itemblock">
				<div class="itemnum"><?php echo $x;?></div>
				<div class="item"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
				<div class="publishdate clearfix">
					Published <?php the_time('F Y')?> </div>
			</div>
			<?php endwhile; ?>
			<?php else: ?>
			Add post to category <b>Resources or Reports</b>
			<?php endif; ?>
			<div class="itemendblock">
				<div class="itemnum">+</div>
				<div class="item"><a href="<?php echo get_category_link( get_category_by_slug('resources') )?>">view all</a></div>
				<div class="clearfix">
				</div>
			</div>
			<?php wp_reset_postdata(); ?>
		</article>
	</section>
	<?php $others = new WP_Query('category_name=uncategorized&posts_per_page=5');?>
	<?php if($others->have_posts()) {
		while($others->have_posts()) : $others->the_post(); 
?>
	<section>
    	
		<article class="post">
			<?php if (has_post_thumbnail()){?>
			<?php the_post_thumbnail('banner-image');?>
			<?php }?>
			<h1><a href="<?php the_permalink();?>"><?php the_title();?></a></h1>
			<?php the_excerpt();?>
		</article>
        
	</section>
<?php endwhile;
	}else{
		echo 'Add post to category <b>uncategorized</b>';
	}
?>
<?php get_footer(); ?>