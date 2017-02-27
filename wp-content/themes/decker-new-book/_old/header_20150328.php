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

	<?php
		if(is_page(11353)) {
			$bg_home = "background-image: url('/wp-content/themes/decker-new-book/images/bg_home.jpg');";
			$bg_home .= "box-shadow: 0 0 0 1000px rgba(0, 0, 0, 0.25) inset;";
			$bg_home .= "min-height: 790px;";
			$bg_page = "";
		} else {
			$bg_home = "";
			$bg_page = "background: #0090d6;";
			$bg_page .= "background: -moz-linear-gradient(top,  #0090d6 0%, #0071a9 100%);";
			$bg_page .= "background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#0090d6), color-stop(100%,#0071a9));";
			$bg_page .= "background: -webkit-linear-gradient(top,  #0090d6 0%,#0071a9 100%);";
			$bg_page .= "background: -o-linear-gradient(top,  #0090d6 0%,#0071a9 100%);";
			$bg_page .= "background: -ms-linear-gradient(top,  #0090d6 0%,#0071a9 100%);";
			$bg_page .= "background: linear-gradient(to bottom,  #0090d6 0%,#0071a9 100%);";
			$bg_page .= "filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#0090d6', endColorstr='#0071a9',GradientType=0 );";
		}
	?>

	<header id="masthead" class="site-header" role="banner" style="<?php echo $bg_home; ?>">
		<div id="dheader" style="<?php echo $bg_page; ?>">
			<div class="container">
				<div class="row">
				<div class="col-sm-3">
					<div class="site-branding">
						<h1 class="site-title">
							<a href="<?php echo esc_url(home_url('/')); ?>book-communicate-to-influence" rel="home">
								<img src="/wp-content/themes/decker-new-book/images/logo.png" alt="Communicate To Influence"/>
							</a>
						</h1>
						<!--h2 class="site-description"><?php bloginfo( 'description' ); ?></h2-->
					</div><!-- .site-branding -->
				</div>
				<div class="col-sm-9">
					<nav id="site-navigation" class="main-navigation" role="navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php _e( 'Primary Menu', 'decker-new-book' ); ?></button>
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu' => 'New Book Menu' ) ); ?>
					</nav><!-- #site-navigation -->
				</div>
				</div>
			</div>	
		</div> <!-- dheader -->
		
		<?php if(is_page(11353)) { ?>
			<div class="container">
				<div id="djumbotron" class="row mary80">
					<div class="col-sm-4 center-block">
						<img src="/wp-content/themes/decker-new-book/images/jtron_book.png" alt="Communicate To Influence Book"/>
					</div>
					<div class="col-sm-8">
						<center>
							<div id="video-cti" class="center-block">
								<iframe id="play-cti" width="100%" height="339px" src="https://www.youtube.com/embed/L9cG3bHu9eo?theme=light&hd=1&rel=1&modestbranding=1&showinfo=0" frameborder="0" allowfullscreen></iframe>
								<div class="video-overlay"></div>
							</div>
							<h2 class="white dshadow">Purchase Your Copy Today</h2>
							<ul id="book_btns">
								<li><a href="http://www.amazon.com/Communicate-Influence-Inspire-Audience-Action/dp/0071839836" target="_blank"><img src="/wp-content/themes/decker-new-book/images/jtron_btn1.png" alt="amazon button"/></a></li>
								<li><a href="http://www.barnesandnoble.com/w/communicate-to-influence-ben-decker/1120691337?ean=9780071839839" target="_blank"><img src="/wp-content/themes/decker-new-book/images/jtron_btn2.png" alt="barnes and noble button"/></a></li>
								<li><a href="#" target="_blank"><img src="/wp-content/themes/decker-new-book/images/jtron_btn3.png" alt="ibookstore button"/></a></li>
							</ul>
						</center>
					</div>
				</div>
			</div> <!--container--> 
		<?php } else { ?>
		<style type="text/css">
			#wprmenu_bar {
				background: transparent none repeat scroll 0 0 !important;
				display: none;
				height: 42px;
				left: 0;
				padding: 20px 16px 0;
				top: 0;
				width: 100%;
				z-index: 98;
				position: absolute;
			}

		</style>		
		<?php }  ?>
		
	</header><!-- #masthead -->
