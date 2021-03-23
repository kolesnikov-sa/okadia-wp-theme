<?php define('calledFromFooterScript', true); ?>
</main>
<footer>
  <div id="footer-container">
    <div id="footer-content">
      <div id="footer-top">
        <div id="footer-top-container">
          <div id="footer-title-pitch">
            <div id="footer-title" class="text-m">OKADIAgency</div>
            <div id="footer-pitch"><?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['about-us']; ?></div>
          </div>
          <div id="footer-agency">
            <div id="footer-agency-title" class="text-m">Агентство</div>
            <div id="footer-agency-content">
              <div class="footer-agency-item"><a href="/created">Портфолио</a></div>
              <div class="footer-agency-item"><a href="/vacancy">Вакансии</a></div>
              <div class="footer-agency-item"><a href="/blog">Блог</a></div>
            </div>
          </div>
          <div id="footer-contact">
            <div id="footer-social">
              <div id="footer-social-title" class="text-m">Контакты</div>
              <div id="footer-social-list">
                <div class="footer-social-list__item">
                  <a class="social-icon" href="<?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['fb']; ?>" target="_blank" rel="noopener" rel="noreferrer"><svg width="1792" height="1792" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1376 128q119 0 203.5 84.5t84.5 203.5v960q0 119-84.5 203.5t-203.5 84.5h-188v-595h199l30-232h-229v-148q0-56 23.5-84t91.5-28l122-1v-207q-63-9-178-9-136 0-217.5 80t-81.5 226v171h-200v232h200v595h-532q-119 0-203.5-84.5t-84.5-203.5v-960q0-119 84.5-203.5t203.5-84.5h960z" />
                    </svg>
                  </a>
                </div>
                <div class="footer-social-list__item">
                  <a class="social-icon" href="<?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['welcome-telegram']; ?>" target="_blank" rel="noopener" rel="noreferrer"><svg width="1792" height="1792" viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg">
                      <path d="M1189 1307l147-693q9-44-10.5-63t-51.5-7l-864 333q-29 11-39.5 25t-2.5 26.5 32 19.5l221 69 513-323q21-14 32-6 7 5-4 15l-415 375-16 228q23 0 45-22l108-104 224 165q64 36 81-38zm603-411q0 182-71 348t-191 286-286 191-348 71-348-71-286-191-191-286-71-348 71-348 191-286 286-191 348-71 348 71 286 191 191 286 71 348z" />
                    </svg>
                  </a>
                </div>
              </div>
            </div>
            <div id="footer-email"><a href="mailto:<?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['welcome-email']; ?>"><?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['welcome-email']; ?></a></div>
            <div id="footer-phone"><a href="tel:<?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['welcome-phone-no']; ?>"><?php echo $GLOBALS['sitedata'][$GLOBALS['site-prefix']]['welcome-phone-text']; ?></a></div>
          </div>
        </div>
      </div>
      <div id="footer-bottom">
        <div id="footer-bottom-container">
          <div id="footer-copyright-legal">
            <div id="footer-copyright">&copy; 2017&ndash;<?php echo date('Y'); ?> ИП&nbsp;Колесников Сергей&nbsp;Александрович</div>
            <div id="footer-legal" class="min-768">ИНН&nbsp;711604623527, ОГРНИП&nbsp;317402700013523</div>
          </div>
          <div id="footer-kaluga">
            Сделано в Калуге
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</footer>
</body>

</html>