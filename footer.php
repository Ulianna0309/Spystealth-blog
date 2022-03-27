    <footer class="footer container">
        <div class="footer__links v-row">
            <div class="footer__block v-col-lg-3 v-col-md-6 v-col">
                <h3 class="footer__block-title">WE ARE BEST AT</h3>
                <?php 
                    wp_nav_menu( [
                        'menu'            => 'We-are-best-at', 
                        'container'       => false, 
                        'menu_class'      => 'footer__block-list', 
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul class="footer__block-list">%3$s</ul>',
                        'depth'           => 1
                    ] );
                ?>
            </div>
            <div class="footer__block v-col-lg-3 v-col-md-6 v-col">
                <h3 class="footer__block-title">SITE MAP</h3>
                <?php 
                    wp_nav_menu( [
                        'menu'            => 'Site-map', 
                        'container'       => false, 
                        'menu_class'      => 'footer__block-list', 
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul class="footer__block-list">%3$s</ul>',
                        'depth'           => 1
                    ] );
                ?>
            </div>
            <div class="footer__block v-col-lg-3 v-col-md-6 v-col">
                  <h3 class="footer__block-title">PRIVACY</h3>
                  <?php 
                        wp_nav_menu( [
                            'menu'            => 'Privacy', 
                            'container'       => false, 
                            'menu_class'      => 'footer__block-list', 
                            'echo'            => true,
                            'fallback_cb'     => 'wp_page_menu',
                            'items_wrap'      => '<ul class="footer__block-list">%3$s</ul>',
                            'depth'           => 1
                        ] );
                    ?>
            </div>
            <div class="footer__block v-col-lg-3 v-col-md-6 v-col">
               <h3 class="footer__block-title">WORK WITH US</h3>
               <?php 
                    wp_nav_menu( [
                        'menu'            => 'Work-with-us', 
                        'container'       => false, 
                        'menu_class'      => 'footer__block-list', 
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul class="footer__block-list">%3$s</ul>',
                        'depth'           => 1
                    ] );
                ?>
            </div>
        </div>
        <div class="footer__card">
            <div class="footer__card-block container">
                <div>
                    <img class="footer__card-block--img" src="<?php echo bloginfo('template_url'); ?>/assets/img/card/c_visa.png" loading="lazy" alt="visa">
                    <img class="footer__card-block--img" src="<?php echo bloginfo('template_url'); ?>/assets/img/card/c_mc.png" loading="lazy" alt="master card">
                    <img class="footer__card-block--img" src="<?php echo bloginfo('template_url'); ?>/assets/img/card/c_amex.png" loading="lazy" alt="master card">
                    <img class="footer__card-block--img" src="<?php echo bloginfo('template_url'); ?>/assets/img/card/c_paypal.png" loading="lazy" alt="paypal">
                </div>
                <div>
                    <img class="footer__card-block--img" src="<?php echo bloginfo('template_url'); ?>/assets/img/card/c_discover.png" loading="lazy" alt="discover">
                    <img class="footer__card-block--img" src="<?php echo bloginfo('template_url'); ?>/assets/img/card/c_jsb.png" loading="lazy" alt="jsb">
                    <img class="footer__card-block--img" src="<?php echo bloginfo('template_url'); ?>/assets/img/card/c_debit.png" loading="lazy" alt="debit">
                    <img class="footer__card-block--img" src="<?php echo bloginfo('template_url'); ?>/assets/img/card/c_wire.png" loading="lazy" alt="wire">
                </div>
            </div>
        </div>
        <div class="footer__copyright">
            <div class="footer__copyright-block container">
                <div class="footer__copyright-logo">
                   <?php the_custom_logo(); ?>
                </div>
                <p class="footer__copyright-text">ERSTEN GROUP LTD 63-66 HATTON GARDEN, 5TH FLOOR, SUITE 23, UNITED KINGDOM, LONDON, EC1N 8LE</p>
                <p class="footer__copyright-text">&copy; 2022 SpyStealth.com is the property of BROOKDORF WORLDWIDE L.P. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <button class="button__scroll-to-top" type="button" data-scroll-to-top-button="">
        <svg class="button__scroll-to-top--icon"
                width="10"
                height="6"
                viewBox="0 0 10 6"
                fill="none"
                xmlns="http://www.w3.org/2000/svg">
            <path d="M5 0.292969L0.646484 4.64844L0.291016 5L1 5.70703L1.35352 5.35352L5 1.70898L8.64648 5.35352L9 5.70703L9.70898 5L9.35352 4.64844L5 0.292969Z"></path>
        </svg>
    </button>

    <section class="modal" data-modal-wrap>
        <div class="modal__container container" data-modal="success-send">
            <div class="modal__content">
                <div class="modal__close" data-close-modal></div>
                <img src="<?php echo bloginfo('template_url'); ?>/assets/img/anytime.png" alt="anytime" loading="lazy">
                <p class="modal__content-title post__title">Join our newsletter</p>
                <?php echo do_shortcode('[contact-form-7 id="156" title="Subscibe form"]'); ?>
                <div class="form-label black">By clicking “Subscribe” you agree to Spystealth
                    <a class="white__link" target="_blank" href="#">Privacy Policy</a>
                    and consent to Spystealth using your contact data for newsletter purposes
                </div>
            </div>
        </div>
    </section>

        <?php 
            wp_footer();
        ?>
    </body>
</html>