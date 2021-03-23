<?php

// functions.php

/* Содержание

// 1. Служебный раздел WordPress
// 2. Функции темы

*/

// 1. Служебный раздел WordPress

// 1.1. Включение функционала темы

if (!function_exists('oka_theme_setup')) :
  function oka_theme_setup()
  {
    // 1.1. Включение поддержки меню
    add_theme_support('menus');
    // 1.2. Миниатюры записей
    add_theme_support('post-thumbnails');
    // 1.3. Вывод заголовка через хук wp_head
    add_theme_support('title-tag');
    // 1.4. Отключение Панели инструментов на фронтенде
    show_admin_bar(false);
    // 1.5. Поддержка логотипа
    add_theme_support('custom-logo', array(
      'height' => 250,
      'width' => 250,
      'unlink-homepage-logo' => 'true'
    ));
  }
endif;
add_action('after_setup_theme', 'oka_theme_setup');

// END 1.1

// 1.2. Отключение лишних размеров изображений — остаются только оригинальные размеры и размер medium для карточек постов

add_filter('intermediate_image_sizes', 'oka_turn_off_default_sizes');

function oka_turn_off_default_sizes($default_image_sizes)
{

  unset($default_image_sizes['thumbnail']);
  unset($default_image_sizes['large']);

  return $default_image_sizes;
}

// END 1.2

// 1.3. Подключение стилей и скриптов

if (!function_exists('oka_enqueue_scripts')) :
  function oka_enqueue_scripts()
  {
    wp_enqueue_style('normalize-style', get_template_directory_uri() . '/assets/css/normalize.css');
    wp_enqueue_style('main-style', get_stylesheet_directory_uri() . '/assets/css/main.css');
    wp_enqueue_script('main-script', get_template_directory_uri() . '/assets/script/script.js');
  }
endif;
add_action('wp_enqueue_scripts', 'oka_enqueue_scripts');

// END 1.3

// 1.4. Асинхронная загрузка скриптов

function oka_add_async_attribute($tag, $handle)
{
  // Список скриптов для загрузки асинхронно
  $scripts_to_async = array('main-script');

  foreach ($scripts_to_async as $async_script) {
    if ($async_script === $handle) {
      return str_replace(' src', ' async src', $tag);
    }
  }
  return $tag;
}
add_filter('script_loader_tag', 'oka_add_async_attribute', 10, 2);

// END 1.4

// 1.5. Очистка лишней информации в разделе head

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);

function disable_emojis()
{
  remove_action('wp_head', 'print_emoji_detection_script', 7);
  remove_action('admin_print_scripts', 'print_emoji_detection_script');
  remove_action('wp_print_styles', 'print_emoji_styles');
  remove_action('admin_print_styles', 'print_emoji_styles');
  remove_filter('the_content_feed', 'wp_staticize_emoji');
  remove_filter('comment_text_rss', 'wp_staticize_emoji');
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
  add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
  if ('dns-prefetch' == $relation_type) {

    // Strip out any URLs referencing the WordPress.org emoji location
    $emoji_svg_url_bit = 'https://s.w.org/images/core/emoji/';
    foreach ($urls as $key => $url) {
      if (strpos($url, $emoji_svg_url_bit) !== false) {
        unset($urls[$key]);
      }
    }
  }
  return $urls;
}

// END 1.5

// 2. Функции темы

// 2.1. Получение даты с русским текстом

function oka_russian_date($mode = 1, $date = '')
{
  // mode = 1 (default) - день недели текстом, число месяца, название месяца, год числом, слово "года", время чч:мм
  // mode = 2 — то же, что и 1, но без времени
  // mode = 3 - то же, что и 2, но без дня недели текстом
  // mode = 4 - то же самое, что и 3, но без года числом
  // mode = 5 - только название дня недели
  // mode = 6 - только название месяца
  // mode = 7 — то же самое, что и 3, но год выводится только в том случае, если текущий год оличается
  if ($date !== '' && strtotime($date)) {
    $day_of_week_num = date('N', strtotime($date));
  } else {
    $day_of_week_num = date('N');
  }
  switch ($day_of_week_num) {
    case 1:
      $day_of_week_text = 'понедельник';
      break;
    case 2:
      $day_of_week_text = 'вторник';
      break;
    case 3:
      $day_of_week_text = 'среда';
      break;
    case 4:
      $day_of_week_text = 'четверг';
      break;
    case 5:
      $day_of_week_text = 'пятница';
      break;
    case 6:
      $day_of_week_text = 'суббота';
      break;
    case 7:
      $day_of_week_text = 'воскресенье';
      break;
  }
  if ($date !== '' && strtotime($date)) {
    $day_of_month_num = date('j', strtotime($date));
  } else {
    $day_of_month_num = date('j');;
  }
  if ($date !== '' && strtotime($date)) {
    $month_num = date('m', strtotime($date));
  } else {
    $month_num = date('m');
  }
  switch ($month_num) {
    case 1:
      $month_text_ip = 'январь';
      $month_text_rp = 'января';
      break;
    case 2:
      $month_text_ip = 'февраль';
      $month_text_rp = 'февраля';
      break;
    case 3:
      $month_text_ip = 'март';
      $month_text_rp = 'марта';
      break;
    case 4:
      $month_text_ip = 'апрель';
      $month_text_rp = 'апреля';
      break;
    case 5:
      $month_text_ip = 'май';
      $month_text_rp = 'мая';
      break;
    case 6:
      $month_text_ip = 'июнь';
      $month_text_rp = 'июня';
      break;
    case 7:
      $month_text_ip = 'июль';
      $month_text_rp = 'июля';
      break;
    case 8:
      $month_text_ip = 'август';
      $month_text_rp = 'августа';
      break;
    case 9:
      $month_text_ip = 'сентябрь';
      $month_text_rp = 'сентября';
      break;
    case 10:
      $month_text_ip = 'октябрь';
      $month_text_rp = 'октября';
      break;
    case 11:
      $month_text_ip = 'ноябрь';
      $month_text_rp = 'ноября';
      break;
    case 12:
      $month_text_ip = 'декабрь';
      $month_text_rp = 'декабря';
      break;
  }
  if ($date !== '' && strtotime($date)) {
    $year_num = date('Y', strtotime($date));
    $time_num = date('H:i', strtotime($date));
  } else {
    $year_num = date('Y');
    $time_num = date('H:i');
  }
  switch ($mode) {
    case 1:
      $result = $day_of_week_text . ', ' . $day_of_month_num . '&nbsp;' . $month_text_rp . ' ' . $year_num . '&nbsp;года' . ', ' . $time_num;
      break;
    case 2:
      $result = $day_of_week_text . ', ' . $day_of_month_num . '&nbsp;' . $month_text_rp . ' ' . $year_num . '&nbsp;года';
      break;
    case 3:
      $result = $day_of_month_num . '&nbsp;' . $month_text_rp . ' ' . $year_num . '&nbsp;года';
      break;
    case 4:
      $result = $day_of_month_num . '&nbsp;' . $month_text_rp;
      break;
    case 5:
      $result = $day_of_week_text;
      break;
    case 6:
      $result = $month_text_ip;
      break;
    case 7:
      $result = $day_of_month_num . '&nbsp;' . $month_text_rp;
      if ($year_num != date('Y')) {
        $result .= ' ' . $year_num . '&nbsp;года';
      };
      break;
  }
  return $result;
}

// END 2.1

// END 2