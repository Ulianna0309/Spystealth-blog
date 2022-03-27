<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title><?php bloginfo('name'); echo " | "; bloginfo('description'); ?></title>
    <meta name="theme-color" content="#c9e0e04d">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo bloginfo('template_url'); ?>/assets/img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo bloginfo('template_url'); ?>/assets/img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo bloginfo('template_url'); ?>/assets/img/favicons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo bloginfo('template_url'); ?>/assets/img/favicons/site.webmanifest">
    <link rel="mask-icon" href="<?php echo bloginfo('template_url'); ?>/assets/img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <?php 
        wp_head();
    ?>
</head>
<body class="light-theme">
  <header class="header" data-main-menu-block>
    <div class="header-top container" data-main-menu>
      <div class="header-top__menu" data-header-menu>
        <nav class="header-top__nav">
          <?php 
              wp_nav_menu( [
                  'menu'            => 'Menu-top', 
                  'container'       => false, 
                  'menu_class'      => 'header-top__list', 
                  'echo'            => true,
                  'fallback_cb'     => 'wp_page_menu',
                  'items_wrap'      => '<ul class="header-top__list">%3$s</ul>',
                  'depth'           => 1
              ] );
          ?>

          <div class="header-top__buttons">
            <a href="#" class="button__search">
              <svg class="button__search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
            </a>
            <button type="button" class="button__subscribe" data-subscribe>
              Subscribe
            </button>
          </div>
        </nav>
      </div>
    </div>
    

    <div class="header-main container">
      
      <div class="header-main__logo">
        <?php the_custom_logo(); ?>
        <div class="header-main__logo-title">
          <span class="header-main__logo-title--spy"><b>Spy</b>Stealth</span>
          <p class="header-main__logo-title--text">Phone Tracking Software</p>
        </div>
      </div>

      <nav class="header-top__nav header-main__nav-desktop">
      <?php 
            wp_nav_menu( [
                'menu'            => 'Main-menu', 
                'container'       => false, 
                'menu_class'      => 'header-top__list', 
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'items_wrap'      => '<ul class="header-top__list">%3$s</ul>',
                'depth'           => 1
            ] );
        ?>
      </nav>
      
      
      <div class="header-main__buttons ">
        <a href="#" class="button__search">
          <svg class="button__search-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M500.3 443.7l-119.7-119.7c27.22-40.41 40.65-90.9 33.46-144.7C401.8 87.79 326.8 13.32 235.2 1.723C99.01-15.51-15.51 99.01 1.724 235.2c11.6 91.64 86.08 166.7 177.6 178.9c53.8 7.189 104.3-6.236 144.7-33.46l119.7 119.7c15.62 15.62 40.95 15.62 56.57 0C515.9 484.7 515.9 459.3 500.3 443.7zM79.1 208c0-70.58 57.42-128 128-128s128 57.42 128 128c0 70.58-57.42 128-128 128S79.1 278.6 79.1 208z"/></svg>
        </a>
        <button type="button" class="button__subscribe" data-subscribe>
          Subscribe
        </button>
      </div>

      <label class="switcher-dark-theme" for="checkbox-theme">
        <input class="switcher-dark-theme__input" type="checkbox" name="checkbox-theme" id="checkbox-theme" data-toggle-dark-theme/>
        <span class="switcher-dark-theme__toggle"></span>
      </label>
      
      <div class="header-navigation__btn-wrapper">
        <div class="header-navigation__btn" data-hamburger>
          <span class="header-navigation__btn-row"></span>
          <span class="header-navigation__btn-row"></span>
          <span class="header-navigation__btn-row"></span>
          <span class="header-navigation__btn-row"></span>
          <span class="header-navigation__btn-row"></span>
          <span class="header-navigation__btn-row"></span>
        </div>
      </div>
      
    </div>
    
    <div class="scrolled-progress-bar" data-scrolled-progress-bar></div>
  </header>




  



        