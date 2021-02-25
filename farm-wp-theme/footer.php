<footer class="footer">
        <div class="container">
            <div class="footer__inner">
                <ul class="footer__info-list">
                    <li class="footer__info-item">Телефон:
                        <a class="footer__info-phone" href="tel:<?php the_field('phone') ?>">
                            <?php the_field('phone') ?>
                        </a>
                    </li>
                    <li class="footer__info-item">
                        <a class="footer__info-address" href="<?php the_field('coordinates') ?>" target="_blank">
                            <?php the_field('address') ?>
                        </a>
                    </li>
                </ul>
                <ul class="footer__socials">
                    <a class="footer__socials-link" href="<?php the_field('viber') ?>">
                        <img class="footer__socials-img" src="<?php bloginfo( 'template_url');?>/assets/images/viber.svg" alt="viber image">
                    </a>
                    <a class="footer__socials-link" href="<?php the_field('telegram') ?>">
                        <img class="footer__socials-img" src="<?php bloginfo( 'template_url');?>/assets/images/telegram.svg" alt="telegram image">
                    </a>
                    <a class="footer__socials-link" href="<?php the_field('facebook') ?>">
                        <img class="footer__socials-img" src="<?php bloginfo( 'template_url');?>/assets/images/facebook.svg" alt="facebook image">
                    </a>
                </ul>
                <img class="footer__logo" src="<?php bloginfo( 'template_url');?>/assets/images/logo.png" alt="logo">
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js "></script>
    <script src="js/libs.min.js "></script>
    <script src="js/main.js "></script> -->
</body>

</html>