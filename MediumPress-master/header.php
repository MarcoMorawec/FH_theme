<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		<?php
		if (function_exists('is_tag') && is_tag()) {
			single_tag_title("Tag Archive for &quot;"); echo '&quot; - ';
		} elseif (is_archive()) {
			wp_title(''); echo ' Archive - ';
		} elseif (is_search()) {
			echo 'Search for &quot;'.wp_specialchars($s).'&quot; - ';
		} elseif (!(is_404()) && (is_single()) || (is_page())) {
			wp_title(''); echo ' - ';
		} elseif (is_404()) {
			echo 'Not Found - ';
		} if (is_home()) {
			bloginfo('name'); echo ' - '; bloginfo('description');
		} else {
			bloginfo('name');
		}
		if ($paged>1) {
			echo ' - page '. $paged;
		}
		?>
	</title>

	<meta name="description" content="<?php echo !empty($meta_description)?$meta_description:"" ?>" />
	<meta name="keywords" content="<?php echo !empty($meta_keywords)?$meta_keywords:"" ?>" />

	<link href='http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/icomoon/style.css">
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url') ?>/css/jquery.jscrollpane.css">
	<style type="text/css">
	.author-pic .avatar-50 {
		float: right;
		border-radius: 50%;
	}
	@media screen and (max-width: 960px) {
		.index-box {
			width: 100%;
			float: left;
		}
	}
	@media screen and (min-width: 961px) {
		<?php if(is_home() || is_archive() || is_search()): ?>
		.page-wrap {
			float: right;
		}
		<?php endif; ?>
		<?php if(is_single() || is_page()): ?>
		.page-wrap {
			width: 100%;
		}
		.post-content {
			margin-top: 25px;
			margin-bottom: 30px;
		}
		.index-box {
			width: 75%;
			float: right;
		}
		<?php endif; ?>
	}
	</style>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/script.js"></script>
<!--[if lte IE 7]><script src="<?php bloginfo('template_url'); ?>/icomoon/lte-ie7.js"></script><![endif]-->

<!-- Google Analytics Tracking -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49340848-1', 'blog.thefirehoseproject.com');
  ga('send', 'pageview');

</script>


</head>

<body <?php body_class(); ?>>
	<nav id="nav">
		<ul class="nav-list">
			<li><span class="icon-search search-icon"></span></li>
			<li id="nav-list-search"><form action="<?php bloginfo('siteurl'); ?>" class="searchform" method="get"><input type="text" id="s" name="s" value="" /></form></li>
			<li><a href="<?php echo home_url() ?>" ><span class="icon-home"></span>Home</a></li>
			<?php
			echo !empty($aboutme)?'<li><a href="'.get_permalink($aboutme).'" ><span class="icon-user"></span>About Me</a></li>':"" ;
			$defaults = array(
				'theme_location'  => 'sidebar-menu',
				'container'       => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'menu_class'		=> 'nav-list-item-btn',
				'link_before'     => '<span class="icon-file"></span>',
				'depth'           => 0,
				'walker'          => '',
				'items_wrap'		=> '%3$s');
			wp_nav_menu( $defaults );
			?>
		</ul>
	</nav>


	<div class="wrapper">
		<a href="#nav" id="nav-toggle" class="do-not-print"><img src="<?php echo !empty($navicon)?$navicon:bloginfo('stylesheet_directory')."/images/navicon.png" ?>" style="width:30px;height:30px;"></a>
		<?php if(is_home() || is_archive() || is_search()): ?>
		<aside id="cover">
			<div class="cover-body" style="background-image:url('<?php bloginfo('template_url')?>/images/cover.jpg');">
				<div class="cover-body-inner">
					<h1 class="cover-title"><?php bloginfo('name') ?></h1>
					<p class="cover-description"><?php bloginfo('description') ?></p>
					<div class="cover-bottom">
						<?php if(is_home() || is_tag() || is_category() || is_search()): ?>

							<div id="mainForm">
								<form accept-charset="UTF-8" action="http://www.thefirehoseproject.com/opt-ins" class="simple_form new_opt_in" id="opt-in-form" method="post" novalidate="novalidate">
							        <div class="errors" style="display:none"></div>
							        <h4 style="color:white;">Get on the list!</h4>
							        <h5 style="color:white;"></h5>
									<input class="string email required form-control" id="email" name="opt_in[email]" type="email" placeholder="CodeHero@gmail.com" style="border: 5px solid white;-webkit-box-shadow: inset 0 0 8px rgba(0,0,0,0.1), 0 0 16px rgba(0,0,0,0.1);-moz-box-shadow: inset 0 0 8px rgba(0,0,0,0.1), 0 0 16px rgba(0,0,0,0.1);box-shadow: inset 0 0 8px rgba(0,0,0,0.1), 0 0 16px rgba(0,0,0,0.1);padding: 15px;background: rgba(255,255,255,0.5);margin: 0 0 0px 0;width: 200px;font-size: 18px">

									<div class="input hidden opt_in_came_from"><input class="hidden form-control" id="came_from" name="opt_in[came_from]" type="hidden" value="blog-root"></div>

							        <br/>
							        <br/>

									<input class="btn btn-primary" name="commit" type="submit" value="Subscribe" style="background-color:#57ad68;color:#fff;">
								</form>
							</div>


							<div id="thanksForOptingIn" style="display:none; color: white;">
								Awesome!  You're on the list!
							</div>








						<?php endif; ?>

						<?php if(is_year()): ?>
							<?php $year = get_the_time('Y'); ?>
							<span class="archive-name"><a style="background:transparent;float:left;" href="<?php echo get_year_link($year-1) ?>"><i class="icon-chevron-left"></i></a><?php echo $year ?><a style="background:transparent;float:right;" href="<?php echo get_year_link($year+1) ?>"><i class="icon-chevron-right"></i></a></span>
						<?php endif; ?>

						<?php if(is_month() || is_day()): ?>
							<?php $month = get_the_time('m'); $back_month = $month-1; $next_month = $month+1; ?>
							<span class="archive-name"><a style="background:transparent;float:left;" href="<?php echo ($back_month == 00)?get_month_link($year-1,'12'):get_month_link($year,$back_month) ?>"><i class="icon-chevron-left"></i></a><?php echo $month ?><a style="background:transparent;float:right;" href="<?php echo ($next_month == 13)?get_month_link($year+1,'12'):get_month_link($year,$next_month) ?>"><i class="icon-chevron-right"></i></a></span>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</aside>
	<?php endif; ?>
	<?php if (!is_single() && !is_page()) {
		echo '<div class="page-wrap">';
		echo '	<div class="group">';
	} ?>
