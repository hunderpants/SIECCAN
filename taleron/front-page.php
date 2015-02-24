<?php
/* front-page.php */
?>
<?php get_header(); ?>
<?php if(have_posts() && is_page()) {
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
<?php get_sidebar();?>

	<section>		
		<article id="updates">
			<h1>Updates</h1>
			<?php $briefs = new WP_Query('category_name=issue-briefs&posts_per_page=5');
				$x = 0;
			if($briefs->have_posts()):?>
			<div class="itemheadblock clearfix">
					<div class="itemnull">&nbsp;</div>
					<div class="itemhead">Sexual Health Issue briefs Available</div>
			</div>
			
			<?php		while($briefs->have_posts()) : $briefs->the_post();
				$x+=1;
			?>
			<div class="itemblock clearfix">
				<div class="itemnum"><?php echo $x;?></div>
				<div class="item"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
				<div class="itemnull">&nbsp;</div>
				<div class="publishdate">
					Published <?php the_time('F Y')?> </div>
			</div>
			<?php endwhile; ?>
			<div class="itemendblock clearfix">
				<div class="itemnum">+</div>
				<div class="item"><a href="<?php echo get_category_link( get_category_by_slug('issue-briefs') )?>">view all</a></div>
			</div>

			<?php else: 
					if(is_user_logged_in()){
			?>
			<div class="itemblock">			
			Add post to category <b>Issue Briefs</b>
			</div>			
			<?php 
					}
				endif; ?>
			<?php wp_reset_postdata(); ?>
			<?php $resources = new WP_Query('category_name=resources,reports&posts_per_page=5');
				$x=0;
			if($resources->have_posts()):?>
			<div class="itemheadblock clearfix">
			<div class="itemnull">&nbsp;</div>
				<div class="itemhead">New Resources/Reports Available</div>
			</div>
			
					<?php while($resources->have_posts()) : $resources->the_post();
				$x+=1;
			?>
			<div class="itemblock clearfix">
				<div class="itemnum"><?php echo $x;?></div>
				<div class="item"><a href="<?php the_permalink();?>"><?php the_title();?></a></div>
				<div class="itemnull">&nbsp;</div>
				<div class="publishdate">
					Published <?php the_time('F Y')?> </div>
			</div>
			<?php endwhile; ?>
			<div class="itemendblock clearfix">
				<div class="itemnum">+</div>
				<div class="item"><a href="<?php echo get_category_link( get_category_by_slug('resources') )?>">view all</a></div>
				<div class="clearfix">
				</div>
			</div>
			<?php else: 
					if(is_user_logged_in()){
			?>
			<div class="itemblock">
			Add post to category <b>Resources or Reports</b>
			</div>
			<?php 
					}
			endif; ?>
			
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
	}
	else{
		if(is_user_logged_in() || !is_page()){
?>
			Add post to category <b>uncategorized</b>
<?php
		}
	}
?>
<?php get_footer(); ?>