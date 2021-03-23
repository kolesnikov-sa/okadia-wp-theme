<?php
if (defined('calledFromHeaderScript')) {

  // 1. Формирование раздела head

?>

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">

    <?php // 1.1. Определение сайта и формирование данных сайта

    $GLOBALS['sitedata'] = [
      'ru' => [
        'welcome-email' => 'welcome@okadiagency.ru',
        'welcome-phone-no' => '+79106017799',
        'welcome-phone-text' => '+7 910 601-77-99',
        'welcome-telegram' => 'https://t.me/kolesnikov-sa',
        'ya-counter-no' => '69877027',
        'google-tag-no' => 'G-9BLP6R21Z8',
        'fb' => 'https://www.facebook.com/OKADIAgency-107469367870952',
        'about-us' => 'C 2017&nbsp;года мы&nbsp;разрабатываем веб-сайты, настраиваем и&nbsp;ведём контекстную рекламу, делаем дизайн и&nbsp;брендирование, помогаем создавать контент и&nbsp;управлять&nbsp;им.'
      ],
      'com' => [
        'welcome-email' => 'welcome@okadiagency.com',
        'welcome-phone-no' => '+79106017799',
        'welcome-phone-text' => '+7 910 601-77-99',
        'welcome-telegram' => 'https://t.me/kolesnikov-sa',
        'ya-counter-no' => '69885727',
        'google-tag-no' => 'G-FGHKZFPYP2',
        'fb' => 'https://www.facebook.com/OKADIAgency-107469367870952',
        'about-us' => 'Since 2017 we are developing websites, setting up context advertisement, creating design and branding, helping our clients create content and manage it.'
      ]
    ];
    switch ($_SERVER['HTTP_HOST']) {
      case 'okadiagency.ru':
        $GLOBALS['site-prefix'] = 'ru';
        break;
      case 'okadiagency.com':
        $GLOBALS['site-prefix'] = 'com';
        break;
    }

    // END 1.1

    // 1.2. Подключение шрифтов 
    ?>

    <link rel="preload" href="<?php echo get_template_directory_uri() ?>/assets/font/inter-roman.var.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri() ?>/assets/font/inter-italic.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="<?php echo get_template_directory_uri() ?>/assets/font/ptserif.woff2" as="font" type="font/woff2" crossorigin>

    <style>
      @font-face {
        font-family: "Inter var";
        font-weight: 100 900;
        font-display: swap;
        font-style: normal;
        font-named-instance: "Regular";
        src: url("<?php echo get_template_directory_uri() ?>/assets/font/inter-roman.var.woff2") format("woff2");
      }

      @font-face {
        font-family: "Inter var";
        font-weight: 400;
        font-display: swap;
        font-style: italic;
        font-named-instance: "Italic";
        src: url("<?php echo get_template_directory_uri() ?>/assets/font/inter-italic.woff2") format("woff2");
      }

      @font-face {
        font-family: "PT Serif";
        font-weight: 400;
        font-display: swap;
        font-style: normal;
        font-named-instance: "Regular";
        src: url("<?php echo get_template_directory_uri() ?>/assets/font/ptserif.var.woff2") format("woff2");
      }
    </style>

    <?php // END 1.2

    // 1.3. Установка иконок сайта 
    ?>

    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/assets/img/okadia-32.png" sizes="32x32" type="image/png" />
    <link rel="icon" href="<?php echo get_template_directory_uri() ?>/assets/img/okadia-192.png" sizes="192x192" type="image/png" />
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri() ?>okadia-180.png" type="image/png" />
    <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri() ?>/assets/img/okadia-270.png" type="image/png" />

    <?php // END 1.3

    // 1.4. Подключение счетчиков Yandex и Google

    // 1.4.1. Yandex.Metrika 
    ?>
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript">
      (function(m, e, t, r, i, k, a) {
        m[i] = m[i] || function() {
          (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
      })
      (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

      ym(<?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['ya-counter-no'] ?>, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
      });
    </script>
    <noscript>
      <div><img src="https://mc.yandex.ru/watch/<?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['ya-counter-no'] ?>" style="position:absolute; left:-9999px;" alt="" /></div>
    </noscript>
    <!-- /Yandex.Metrika counter -->

    <?php // END 1.4.1

    // 1.4.2. Google Site Tag 

    ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['google-tag-no'] ?>"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', '<?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['google-tag-no'] ?>');
    </script>
    <!-- END Global site tag (gtag.js) - Google Analytics -->

    <?php // END 1.4.2

    // END 1.4

    // 1.5. wp_head

    wp_head();

    // END 1.5

    ?>
  </head>
<?php
  // END 1
}
