<?php
if($_SERVER['SCRIPT_URL']=='/shop/'){//shop
    header("Location: https://decker.com/continuous-learning/self-directed-learning-resources/");
    exit;
} elseif(is_single() && in_category(1531)){//press post
    header("Location: https://decker.com/about-us/press/");
    exit;
} elseif(isset($_GET['s']) && !$_GET['s']){
    // don't allow empty search
    header("Location: /");
    exit;
}
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<link href="http://cloud.webtype.com/css/361810e1-9a59-4e16-9a5a-41680a091b0a.css" rel="stylesheet" type="text/css" />
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width">
<title><?php wp_title();?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/twentyeleven-child/style-ie8.css" />
 <![endif]-->
<!--[if lte IE 7]>
<link rel="stylesheet" type="text/css" media="all" href="/wp-content/themes/twentyeleven-child/style-ie7.css" />
 <![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script src="http://code.jquery.com/jquery-latest.js"></script>

<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<!BEGIN MTM CODE // DO NOT REMOVE >
<script src="//nexus.ensighten.com/mogointeractive/1025/Bootstrap.js"></script>
<!END MTM CODE // DO NOT REMOVE >
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed">
	<header id="branding" role="banner">
			<div id="hgroup">
				<div id="header-left">
				    <a href="/"><img src="/wp-content/themes/twentyeleven-child/images/logo.png" width="462" height="51" alt="Consulting, Executive Coaching and Training - Decker Communications" title="Consulting, Executive Coaching and Training - Decker Communications" /></a>
				</div>
				<div id="header-right">
                    <p class="top-menu-icons">
                        <a href="/feed/" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-rss-17.png" width="17" height="17" alt="Decker Communications Blog RSS" title="Decker Communications Blog RSS" /></a>
                        <a href="http://twitter.com/deckercomm" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-twitter.png" width="18" height="17" alt="Decker Communications on Twitter" title="Decker Communications on Twitter" /></a>
                        <a href="http://www.facebook.com/pages/San-Francisco-CA/Decker-Communications-Inc/132432471240" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-fb.png" width="17" height="17" alt="Decker Communications on Facebook" title="Decker Communications on Facebook" /></a>
                        <a href="https://plus.google.com/+Decker/posts"?rel="author"  target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-google-plus.png" width="17" height="17" alt="Decker Communications on Google Plus" title="Decker Communications on Google Plus" /></a>
                        <a href="http://www.linkedin.com/companies/37380" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-linkedin.png" width="18" height="17" alt="Decker Communications on LinkedIn" title="Decker Communications on LinkedIn" /></a>
                        <a href="http://www.youtube.com/user/DeckerComm" target="_blank"><img src="/wp-content/themes/twentyeleven-child/images/icon-youtube.png" width="47" height="20" id="youtube" alt="Decker Communications on YouTube" title="Decker Communications on YouTube" /></a>
                    </p>
                    <?php wp_nav_menu( array( 'menu' => 3, 'after' => '<span class="sep">|</span>') ); ?>

                    <p class="top-text">
                        Get in touch with us at <a href="mailto:info@decker.com">info@decker.com</a> or 877.485.0700
                    </p>
    			</div>
			</div>

			<nav id="access" role="navigation">
				<h3 class="menu-toggle"><?php _e( 'Menu', 'twentyeleven' ); ?> &#9776;</h3>
				<?php /* Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff. */ ?>
				<div class="skip-link"><a class="assistive-text" href="#content" title="<?php esc_attr_e( 'Skip to primary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to primary content', 'twentyeleven' ); ?></a></div>
				<div class="skip-link"><a class="assistive-text" href="#secondary" title="<?php esc_attr_e( 'Skip to secondary content', 'twentyeleven' ); ?>"><?php _e( 'Skip to secondary content', 'twentyeleven' ); ?></a></div>
				<?php /* Our navigation menu. If one isn't filled out, wp_nav_menu falls back to wp_page_menu. The menu assigned to the primary location is the one used. If one isn't assigned, the menu with the lowest ID is used. */ ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->
	</header><!-- #branding -->


	<div id="main">

<?php
if(!is_front_page() && !is_page_template( 'page-landing-page.php' ) && (wpmd_is_notphone() && $_REQUEST['phone']!=1)){
    include_once "left-sidebar.php";
}
?>