<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TLC
 */

?>

</main>

<footer class="footer">
    <div class="footer__content">
        <div class="footer__top">
            <a href="/" class="logo">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/flogo.svg" alt="Логотип"></a>

            <a href="tel:<?php the_field('osnovnoj_telefon_ssylka', 'option'); ?>" class="footer__text">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/ftel.svg" alt="">
                <span><?php the_field('osnovnoj_telefon_tekst', 'option'); ?></span></a>

            <a href="mailto:<?php the_field('e-mail', 'option'); ?>" class="footer__text">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/fmail.svg" alt="">
                <span><?php the_field('e-mail', 'option'); ?></span></a>

            <a href="#" class="btn footer__btn js-query">ОСТАВИТЬ ЗАЯВКУ</a>

            <div class="footer-social">

                <?php while (have_rows('socz_seti_footer', 'option')): the_row();

                    // переменные
                    $image = get_sub_field('ikonka');
                    $link = get_sub_field('ssylka');

                    ?>

                    <?php if ($link): ?>

                        <a href="<?php echo $link; ?>" target="_blank" class="footer-social__link">
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>"/></a>

                    <?php endif; ?>

                <?php endwhile; ?>

            </div>

        </div>
        <div class="footer__center">
            <nav class="footer-menu">

                <h3 class="footer__title"><?php $name_menu_footer1 = wp_get_nav_menu_name('footer-1');
                    echo $name_menu_footer1; ?></h3>

                <?php
                if (has_nav_menu('footer-1')) {
                    wp_nav_menu([
                        'theme_location' => 'footer-1',
                        'container' => false,
                        'menu_class' => '',
                        'depth' => 1,
                    ]);
                }
                ?>

            </nav>
            <nav class="footer-menu">
                <h3 class="footer__title"><?php $name_menu_footer1 = wp_get_nav_menu_name('footer-2');
                    echo $name_menu_footer1; ?></h3>

                <?php
                if (has_nav_menu('footer-2')) {
                    wp_nav_menu([
                        'theme_location' => 'footer-2',
                        'container' => false,
                        'menu_class' => '',
                        'depth' => 1,
                    ]);
                }
                ?>

            </nav>
            <nav class="footer-menu">
                <h3 class="footer__title"><?php $name_menu_footer1 = wp_get_nav_menu_name('footer-3');
                    echo $name_menu_footer1; ?></h3>

                <?php
                if (has_nav_menu('footer-3')) {
                    wp_nav_menu([
                        'theme_location' => 'footer-3',
                        'container' => false,
                        'menu_class' => '',
                        'depth' => 1,
                    ]);
                }
                ?>

            </nav>
            <nav class="footer-menu">
                <h3 class="footer__title"><?php $name_menu_footer1 = wp_get_nav_menu_name('footer-4');
                    echo $name_menu_footer1; ?></h3>

                <?php
                if (has_nav_menu('footer-4')) {
                    wp_nav_menu([
                        'theme_location' => 'footer-4',
                        'container' => false,
                        'menu_class' => '',
                        'depth' => 1,
                    ]);
                }
                ?>

            </nav>
        </div>
    </div>
    <div class="footer__bottom">
        <p class="footer__copy">ТЛС ©2017-<?php echo date('Y'); ?> г. Все права защищены</p>

        <?php
        if (has_nav_menu('copyright-menu')) {
            wp_nav_menu([
                'theme_location' => 'copyright-menu',
                'container' => false,
                'menu_class' => 'footer-submenu',
                'depth' => 1,
            ]);
        }
        ?>

        <a href="https://oparinseo.ru/" target="_blank" class="footer__oparin">
            <svg width="135" height="18" viewBox="0 0 135 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M32.2312 11.4752H27.8373L26.9991 13.5002H24.7549L28.973 4.05018H31.1361L35.3677 13.5002H33.0694L32.2312 11.4752ZM31.5417 9.81468L30.041 6.19668L28.5403 9.81468H31.5417Z"
                      fill="white"/>
                <path d="M42.3792 13.5002L40.5541 10.8677H40.4459H38.5397V13.5002H36.3495V4.05018H40.4459C41.2842 4.05018 42.0097 4.18968 42.6226 4.46868C43.2445 4.74768 43.7222 5.14368 44.0556 5.65668C44.3891 6.16968 44.5559 6.77718 44.5559 7.47918C44.5559 8.18118 44.3846 8.78868 44.0421 9.30168C43.7086 9.80568 43.231 10.1927 42.6091 10.4627L44.7316 13.5002H42.3792ZM42.3387 7.47918C42.3387 6.94818 42.1674 6.54318 41.8249 6.26418C41.4824 5.97618 40.9822 5.83218 40.3243 5.83218H38.5397V9.12618H40.3243C40.9822 9.12618 41.4824 8.98218 41.8249 8.69418C42.1674 8.40618 42.3387 8.00118 42.3387 7.47918Z"
                      fill="white"/>
                <path d="M48.1194 5.83218H45.091V4.05018H53.3379V5.83218H50.3096V13.5002H48.1194V5.83218Z"
                      fill="white"/>
                <path d="M61.8439 11.7452V13.5002H54.5163V4.05018H61.6682V5.80518H56.693V7.85718H61.0868V9.55818H56.693V11.7452H61.8439Z"
                      fill="white"/>
                <path d="M72.1985 13.5002L72.185 7.83018L69.3999 12.5012H68.413L65.6415 7.95168V13.5002H63.5866V4.05018H65.3982L68.9403 9.92268L72.4283 4.05018H74.2264L74.2534 13.5002H72.1985Z"
                      fill="white"/>
                <path d="M84.9106 13.6622C83.9282 13.6622 83.0404 13.4507 82.2473 13.0277C81.4631 12.6047 80.8457 12.0242 80.3951 11.2862C79.9535 10.5392 79.7326 9.70218 79.7326 8.77518C79.7326 7.84818 79.9535 7.01568 80.3951 6.27768C80.8457 5.53068 81.4631 4.94568 82.2473 4.52268C83.0404 4.09968 83.9282 3.88818 84.9106 3.88818C85.893 3.88818 86.7763 4.09968 87.5604 4.52268C88.3446 4.94568 88.9619 5.53068 89.4126 6.27768C89.8633 7.01568 90.0886 7.84818 90.0886 8.77518C90.0886 9.70218 89.8633 10.5392 89.4126 11.2862C88.9619 12.0242 88.3446 12.6047 87.5604 13.0277C86.7763 13.4507 85.893 13.6622 84.9106 13.6622ZM84.9106 11.7992C85.4694 11.7992 85.9741 11.6732 86.4248 11.4212C86.8754 11.1602 87.2269 10.8002 87.4793 10.3412C87.7407 9.88218 87.8714 9.36018 87.8714 8.77518C87.8714 8.19018 87.7407 7.66818 87.4793 7.20918C87.2269 6.75018 86.8754 6.39468 86.4248 6.14268C85.9741 5.88168 85.4694 5.75118 84.9106 5.75118C84.3518 5.75118 83.8471 5.88168 83.3964 6.14268C82.9458 6.39468 82.5897 6.75018 82.3284 7.20918C82.076 7.66818 81.9498 8.19018 81.9498 8.77518C81.9498 9.36018 82.076 9.88218 82.3284 10.3412C82.5897 10.8002 82.9458 11.1602 83.3964 11.4212C83.8471 11.6732 84.3518 11.7992 84.9106 11.7992Z"
                      fill="white"/>
                <path d="M95.831 4.05018C96.6692 4.05018 97.3947 4.18968 98.0076 4.46868C98.6295 4.74768 99.1072 5.14368 99.4407 5.65668C99.7742 6.16968 99.9409 6.77718 99.9409 7.47918C99.9409 8.17218 99.7742 8.77968 99.4407 9.30168C99.1072 9.81468 98.6295 10.2107 98.0076 10.4897C97.3947 10.7597 96.6692 10.8947 95.831 10.8947H93.9247V13.5002H91.7346V4.05018H95.831ZM95.7093 9.11268C96.3672 9.11268 96.8675 8.97318 97.21 8.69418C97.5525 8.40618 97.7237 8.00118 97.7237 7.47918C97.7237 6.94818 97.5525 6.54318 97.21 6.26418C96.8675 5.97618 96.3672 5.83218 95.7093 5.83218H93.9247V9.11268H95.7093Z"
                      fill="white"/>
                <path d="M107.262 11.4752H102.868L102.03 13.5002H99.7854L104.004 4.05018H106.167L110.398 13.5002H108.1L107.262 11.4752ZM106.572 9.81468L105.072 6.19668L103.571 9.81468H106.572Z"
                      fill="white"/>
                <path d="M117.41 13.5002L115.585 10.8677H115.476H113.57V13.5002H111.38V4.05018H115.476C116.315 4.05018 117.04 4.18968 117.653 4.46868C118.275 4.74768 118.753 5.14368 119.086 5.65668C119.42 6.16968 119.586 6.77718 119.586 7.47918C119.586 8.18118 119.415 8.78868 119.073 9.30168C118.739 9.80568 118.261 10.1927 117.64 10.4627L119.762 13.5002H117.41ZM117.369 7.47918C117.369 6.94818 117.198 6.54318 116.855 6.26418C116.513 5.97618 116.013 5.83218 115.355 5.83218H113.57V9.12618H115.355C116.013 9.12618 116.513 8.98218 116.855 8.69418C117.198 8.40618 117.369 8.00118 117.369 7.47918Z"
                      fill="white"/>
                <path d="M121.322 4.05018H123.512V13.5002H121.322V4.05018Z" fill="white"/>
                <path d="M134.437 4.05018V13.5002H132.639L127.921 7.76268V13.5002H125.758V4.05018H127.569L132.274 9.78768V4.05018H134.437Z"
                      fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M9.01299 16.4483C13.1325 16.4483 16.472 13.1136 16.472 9C16.472 4.88643 13.1325 1.55172 9.01299 1.55172C4.89349 1.55172 1.55396 4.88643 1.55396 9C1.55396 13.1136 4.89349 16.4483 9.01299 16.4483ZM9.01299 18C13.9907 18 18.026 13.9706 18.026 9C18.026 4.02944 13.9907 0 9.01299 0C4.03525 0 0 4.02944 0 9C0 13.9706 4.03525 18 9.01299 18Z"
                      fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M9.01291 0.931201L4.70643 9.54327H13.3194L9.01291 0.931201ZM9.01291 4.40469L7.21929 7.99155H10.8065L9.01291 4.40469Z"
                      fill="white"/>
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M3.87075 11.9483H14.1549L15.3021 14.2392L13.9122 14.9332L13.1945 13.5H4.83115L4.11353 14.9332L2.72362 14.2392L3.87075 11.9483Z"
                      fill="white"/>
            </svg>
        </a>
    </div>
</footer>

<!-- MODAL -->
<aside class="js-sidebars">
    <section class="modal adaptive-menu"><a href="#" class="modal__exit-2"><img
                    src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                    class="adaptive-menu__exit"></a></section>

    <section class="modal modal-region">
        <div class="modal__wrapper modal-region__wrapper">
            <h2 class="modal__title modal-region__title">Выбрать район</h2>
            <div class="modal-region__row">
                <p class="modal-region__city">Ваш город: <span
                            class="js-select-city"><?php the_field('glavnyj_gorod', 'option'); ?></span>?</p>
                <a href="#" class="btn modal-region__btn js-region-close">да</a>
            </div>

            <?php if (get_field('spisok_gorodov', 'option')): ?>
                <ul class="modal-region__list">

                    <?php while (has_sub_field('spisok_gorodov', 'option')): ?>
                        <li><a href="#" class="modal-region__link"><?php the_sub_field('nazvanie_goroda'); ?></a></li>
                    <?php endwhile; ?>

                </ul>
            <?php endif; ?>

            <a href="#" class="modal__exit">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt="Закрыть"
                     class="modal-region__exit"></a>
        </div>
    </section>


    <section class="modal modal-call">
            <div class="modal__wrapper modal-call__wrapper">
                <h3 class="modal__title modal-call__title">Заказать звонок</h3>
                <h4 class="modal__subtitle">Заполните форму и мы Вам перезвоним</h4>
                <div class="modal-form">

                    <?php echo do_shortcode('[contact-form-7 id="9" title="Заказать звонок"]'); ?>

                </div>
                <a class="modal__exit"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg"
                                            alt="Close icon" class="modal-call__exit"></a>
            </div>
        </section>




    <section class="modal modal-subscribe">
        <div class="modal__wrapper modal-subscribe__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                        class="modal-subscribe__exit"></a>
            <h3 class="modal__title modal-subscribe__title">Подпишись на свежие<br>статьи и новости</h3>
            <div class="modal-form">

                <?php echo do_shortcode('[contact-form-7 id="578" title="Подпишись на свежие статьи и новости"]'); ?>

            </div>
        </div>
    </section>
    <section class="modal modal-delivery">
        <div class="modal__wrapper modal-delivery__wrapper"><a href="#" class="modal__exit"><img
                        src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/mex.svg" alt=""
                        class="modal-delivery__exit"></a>
            <h3 class="modal__title">Расчёт доставки<br>из Китая в Россию</h3>
            <div class="modal-form">

                <?php echo do_shortcode('[contact-form-7 id="584" title="Расчёт доставки из Китая в Россию"]'); ?>

            </div>
        </div>
    </section>
</aside>
<!-- !MODAL -->

<?php wp_footer(); ?>

</body>
</html>
