<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Decker New Book
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<link href="//cloud.webtype.com/css/361810e1-9a59-4e16-9a5a-41680a091b0a.css" rel="stylesheet" type="text/css" />		
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'decker-new-book' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div id="dheader">
			<div class="container">
				<div class="row">
				<div class="col-sm-4">
					<div class="site-branding">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
									<img src="/wp-content/themes/decker-new-book/images/logo.png" alt="Communicate To Influence"/>
							</a>
						</h1>
						<!--h2 class="site-description"><?php bloginfo( 'description' ); ?></h2-->
					</div><!-- .site-branding -->
				</div>
				<div class="col-sm-8">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Primary Menu', 'decker-new-book' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'New Book Menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
				</div>
			</div>	
		</div> <!-- dheader -->
			
		<div class="container">
			<div id="djumbotron" class="row mary80">
				<div class="col-sm-4">
					<img src="/wp-content/themes/decker-new-book/images/jtron_book.png" alt="Communicate To Influence Book"/>
				</div>
				<div class="col-sm-8">
					<center>
						<img src="/wp-content/themes/decker-new-book/images/jtron_video.png" alt="Communicate To Influence Book"/>

						<h2 class="white dshadow mary40">Purchase Your Copy Today</h2>

						<ul id="book_btns">
							<li><img src="/wp-content/themes/decker-new-book/images/jtron_btn1.png" alt="amazon button"/></li>
							<li><img src="/wp-content/themes/decker-new-book/images/jtron_btn2.png" alt="barnes and noble button"/></li>
							<li><img src="/wp-content/themes/decker-new-book/images/jtron_btn3.png" alt="ibookstore button"/></li>
						</ul>
						
					</center>
				</div>
			</div>
		</div> <!--container--> 
		
	</header><!-- #masthead -->
