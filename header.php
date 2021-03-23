<!DOCTYPE html>
<html lang="ru">
<?php
define('calledFromHeaderScript', true);
// 1. Подключение head
include_once('head.php');
// END 1
// 2. Подключение header 
?>

<body>
  <header>
    <div id="header-container">
      <div id="header-content">
        <div id="header-logo-title">
          <?php if ($_SERVER['REQUEST_URI'] === '/') { ?>
            <div id="header-logo"><img src="<?php echo get_template_directory_uri() . '/assets/img/okadia-title-200.png'; ?>" alt="OKADIAgency"></div>
          <?php } else { ?>
            <a href="/" id="header-logo"><img src="<?php echo get_template_directory_uri() . '/assets/img/okadia-title-200.png'; ?>" alt="OKADIAgency"></a>
          <?php } ?>
        </div>
        <div id="header-menu-order">
          <div id="header-menu" class="header-menu_midsize">
            <div class="header-menu__block">
              <div class="header-menu__block-title<?php if (strpos($_SERVER['REQUEST_URI'], '/service') === 0) {
                                                    echo " current";
                                                  } ?>">
                <a class="min-480" href="/service">Услуги</a>
                <div class="max-480">
                  <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor" d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
                  </svg>
                </div>
              </div>
            </div>
          </div>
          <div id="header-menu" class="header-menu_fullsize">
            <div class="header-menu__block">
              <div class="header-menu__block-title<?php if (strpos($_SERVER['REQUEST_URI'], '/website') === 0) {
                                                    echo " current";
                                                  } ?>">
                <a href="/website">Веб-сайты</a>
              </div>
              <?php wp_nav_menu([
                'menu' => 'website',
                'container' => false,
                'menu_class' => 'header-menu__block-content',
              ]); ?>
            </div>
            <div class="header-menu__block">
              <div class="header-menu__block-title<?php if (strpos($_SERVER['REQUEST_URI'], '/ads') === 0) {
                                                    echo " current";
                                                  } ?>">
                <a href="/ads">Реклама</a>
              </div>
              <?php wp_nav_menu([
                'menu' => 'ads',
                'container' => false,
                'menu_class' => 'header-menu__block-content',
              ]); ?>
            </div>
            <div class="header-menu__block">
              <div class="header-menu__block-title<?php if (strpos($_SERVER['REQUEST_URI'], '/design') === 0) {
                                                    echo " current";
                                                  } ?>">
                <a href="/design">Дизайн</a>
              </div>
              <?php wp_nav_menu([
                'menu' => 'design',
                'container' => false,
                'menu_class' => 'header-menu__block-content',
              ]); ?>
            </div>
            <div class="header-menu__block">
              <div class="header-menu__block-title<?php if (strpos($_SERVER['REQUEST_URI'], '/content') === 0) {
                                                    echo " current";
                                                  } ?>">
                <a href="/content">Контент</a>
              </div>
              <?php wp_nav_menu([
                'menu' => 'content',
                'container' => false,
                'menu_class' => 'header-menu__block-content',
              ]); ?>
            </div>
            <div class="header-menu__block">
              <div class="header-menu__block-title<?php if (strpos($_SERVER['REQUEST_URI'], '/outsource') === 0) {
                                                    echo " current";
                                                  } ?>">
                <a href="/outsource">Аутсорс</a>
              </div>
              <?php wp_nav_menu([
                'menu' => 'outsource',
                'container' => false,
                'menu_class' => 'header-menu__block-content',
              ]); ?>
            </div>
          </div>
          <div id="header-order"><a href="/start">Заказать<span class="min-480"> работу</span></a></div>
        </div>
      </div>
    </div>
  </header>

  <?php // END 2 
  ?>
  <main>