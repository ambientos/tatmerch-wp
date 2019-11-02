<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="X-UA-Compatible" content="ie=edge" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<div class="mobile_menu">
		<div class="container">
			<nav>
				<?php wp_nav_menu( array(
					'theme_location'  => 'main_menu',
					'item_spacing'    => 'discard',
					'container_class' => false,
				) ); ?>

				<div class="invite dib"><a href="<?php echo site_url('/invite/') ?>">Пригласить в тендер</a></div>
				<div class="lk dib lk--new">
					<a href="http://185.137.233.201:8080">Личный кабинет</a>
					<span class="badge">new</span>
				</div>
			</nav>
		</div>
	</div>

	<header class="siteHeader">
		<div class="container">
			<div class="top">
				<div class="logo">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img class="header-logo-thumb" src="<?php bloginfo( 'template_directory' ); ?>/i/logo.svg" width="123" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"></a>
				</div>

				<div class="rightBlock">
					<div class="email">
						<?php echo tatm_the_mail_link( get_option( 'tatm_mail' ) ) ?>
					</div>

					<div class="phone">
						<?php echo get_option( 'tatm_tel' ) ?>
					</div>

					<div class="invite">
						<a href="<?php echo site_url('/invite/') ?>">Пригласить в тендер</a>
					</div>

					<div class="lk lk--new">
						<a href="http://185.137.233.201:8080">Личный кабинет</a>
						<span class="badge">new</span>
					</div>
				</div>

				<div class="hamburgerMenu" id="nav-icon3"><span></span><span></span><span></span><span></span></div>
			</div>

			<nav class="topMenu">
				<?php wp_nav_menu( array(
					'theme_location'  => 'main_menu',
					'item_spacing'    => 'discard',
					'container_class' => false,
				) ); ?>
			</nav>
		</div>
	</header>

	<main class="siteMain">