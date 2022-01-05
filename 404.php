<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package TLC
 */

get_header();
?>

    <section class="page404">
        <div class="page404-text">
            <h2 class="page404-text__title">Oops!</h2>
            <h3 class="page404-text__subtitle"><?php the_field('error-desc', 'option'); ?></h3>
            <a href="/" class="btn btn-border-red page404-text__btn">ГЛАВНАЯ</a>
        </div>
        <div class="page404-img" style="background-image: url(<?php the_field('img-404', 'option'); ?>);">
            <div class="page404-img__img">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/warn.svg" alt="">
            </div>
            <h1 class="page404-img__title">404</h1>
            <h2 class="page404-img__subtitle">Ошибка!<br>Страница не найдена.</h2>
        </div>
    </section>

    <section class="catalog catalog-nomb">

        <?php if (have_rows('nashi_uslugi_-_spisok_ssylok_-_404', 'option')): ?>

            <h2 class="title title-pl catalog__title">НАШИ УСЛУГИ</h2>

            <div class="catalog-item catalog-item-big catalog-item__404">
                <div class="catalog-item__list">

                    <?php while (have_rows('nashi_uslugi_-_spisok_ssylok_-_404', 'option')): the_row();

                        $nazvanie_ssylki = get_sub_field('nazvanie_ssylki');
                        $ssylka = get_sub_field('ssylka');

                        ?>

                        <a href="<?php echo $ssylka; ?>" class="service-nav__link"><?php echo $nazvanie_ssylki; ?></a>

                    <?php endwhile; ?>

                </div>
            </div>

        <?php endif; ?>


        <?php if (have_rows('nashi_uslugi_-_bloki_-_404', 'option')): ?>

            <?php while (have_rows('nashi_uslugi_-_bloki_-_404', 'option')): the_row();

                // переменные
                $image = get_sub_field('izobrazhenie');
                $title = get_sub_field('nazvanie');
                $link = get_sub_field('ssylka');

                ?>

                <a href="<?php echo $link; ?>" class="catalog-item catalog-item-big">

                    <img width="930" height="440" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" />

                    <span class="catalog-item__content">
                        <span class="catalog-item__title">
                            <?php echo $title; ?>
                        </span>
                    </span>
                </a>


            <?php endwhile; ?>

        <?php endif; ?>


        <div class="catalog-item catalog-item-big catalog-item__404">
            <div class="catalog-item__form">
                <form action="post">
                    <h3>У ВАС ЕСТЬ ВОПРОСЫ?</h3>
                    <h4>ЗАДАЙТЕ ИХ НАМ</h4><input type="text" class="form-control form__input" placeholder="Ваше имя">
                    <input type="tel" class="form-control form__input" placeholder="Ваш телефон">
                    <button type="submit" class="btn" value="ЗАДАТЬ ВОПРОС">ЗАДАТЬ ВОПРОС</button>
                    <p>Нажимая на кнопку, вы соглашаетесь с политикой конфиденциальности</p>
                </form>
            </div>
        </div>
    </section>

<?php
get_footer();
