<?php
/**
 * Template Name: О компании
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLC
 */

get_header();
?>

    <section class="breadcrumbs">
        <?php if (function_exists('kama_breadcrumbs')) {
            kama_breadcrumbs('');
        } ?>
    </section>

    <section class="banner banner-post banner-nobef">
        <div class="banner-slide" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>')">
            <h1 class="banner__title"><?php the_field('o_nas_-_zagolovok_h1'); ?></h1>
            <a class="btn btn-border-white banner__btn js-call">ОСТАВИТЬ ЗАЯВКУ</a>
        </div>
    </section>

    <section class="description">
        <h2 class="title"><?php the_field('o_nas_-_zagolovok'); ?></h2>

        <div class="description__content">
            <div class="description__text"><?php the_content(); ?></div>

            <?php if (have_rows('o_nas_-_spisok_uslug')): ?>

                <div class="description__list">

                    <?php while (have_rows('o_nas_-_spisok_uslug')): the_row();

                        // переменные
                        $nazvanie_uslugi = get_sub_field('nazvanie_uslugi');
                        $ssylka = get_sub_field('ssylka');

                        ?>

                        <a href="<?php echo $ssylka; ?>" class="service-nav__link"><?php echo $nazvanie_uslugi; ?></a>

                    <?php endwhile; ?>

                </div>

            <?php endif; ?>

        </div>
    </section>


<?php if (get_field('ssylka_na_youtubecom')) { ?>
    <section class="video-block">
        <div class="board-video">
            <div class="board-video__content">
                <div class="video"><a class="video__link"
                                      href="https://youtu.be/<?php the_field('ssylka_na_youtubecom'); ?>">
                        <picture>
                            <source srcset="https://i.ytimg.com/vi_webp/<?php the_field('ssylka_na_youtubecom'); ?>/hqdefault.webp"
                                    type="image/webp">
                            <img class="video__media"
                                 src="https://i.ytimg.com/vi/<?php the_field('ssylka_na_youtubecom'); ?>/hqdefault.jpg"
                                 alt="Исупб">
                        </picture>
                    </a>
                    <button class="video__button" aria-label="Запустить видео">
                        <svg width="68" height="48" viewBox="0 0 68 48">
                            <path class="video__button-shape"
                                  d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
                            <path class="video__button-icon" d="M 45,24 27,14 27,34"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>
<?php } ?>


<?php get_template_part('template-parts/sections/banner-faq'); ?>


<?php

$post_objects = get_field('o_nas_-_klienty');

if ($post_objects): ?>

    <section class="client">
        <header class="client-header">
            <h2 class="title client__title">НАШИ КЛИЕНТЫ</h2>
            <nav class="client-nav">
                <div class="client-pagination"></div>
            </nav>
        </header>
        <div class="client-slider">
            <div class="swiper-client">
                <div class="swiper-wrapper">

                    <?php foreach ($post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>

                        <div class="swiper-slide">
                            <a href="<?php the_permalink(); ?>" class="client__img"><?php the_post_thumbnail(); ?></a>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <a class="client-prev">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arr.svg" alt="arr icon"></a>
            <a class="client-next">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arr.svg" alt="arr icon"></a>
        </div>
    </section>

    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>


<?php

$post_objects = get_field('o_nas_-_blagodarstvenye_pisma');

if ($post_objects): ?>

    <section class="project">
        <header class="project-header">
            <h2 class="title">БЛАГОДАРСТВЕНЫЕ ПИСЬМА</h2>
            <nav class="project-nav">
                <div class="letter-pagination"></div>
                <!--                <a href="#" class="btn btn-border-red project__btn">ВСЕ ОТЗЫВЫ</a>-->
            </nav>
        </header>
        <div class="project-slider">
            <div class="swiper-letter">
                <div class="swiper-wrapper">

                    <?php foreach ($post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>

                        <div class="swiper-slide">
                            <div class="project-slide">
                                <div class="letter__content">
                                    <h3 class="project__title"><?php the_title(); ?></h3>
                                    <p class="project__text"><?php the_content(); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="project__link">Подробнее</a>
                                </div>
                                <div class="letter__img"><?php the_post_thumbnail(); ?></div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
            <a class="letter-prev">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arr.svg" alt="arr icon"></a>
            <a class="letter-next">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arr.svg" alt="arr icon"></a>
        </div>
    </section>

    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>

<?php
get_footer('company');
