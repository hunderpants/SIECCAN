<?php
/*header.php*/
?>
<!DOCTYPE html>
<html <?php language_attributes();?>>
	<head>
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700|Oswald:300' rel='stylesheet' type='text/css'>
		<meta charset="<?php bloginfo('charset');?>">
 <title><?php bloginfo('name');?> <?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
		<?php wp_head();?>	
	</head>
<body <?php body_class();?>>
	
		<header>
			<div id="head-info">
				<h1><a href="<?php echo esc_url(home_url('/'));?>"><?php bloginfo('name');?></a></h1>
				<h5><?php bloginfo('description');?></h5>
			</div>
			<nav>
			<?php 
			$args = array(
				'theme_location'=>'primary'
			);
			wp_nav_menu($args);
			
			?>				
			</nav>
		</header>
        <div id="wrapper">
	