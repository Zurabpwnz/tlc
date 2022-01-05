<?php
/**
 * Template Name: Контакты
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


<?php if (have_rows('podrazdeleniya_kompanii', 'option')): ?>

    <section class="contacts">
        <h1 class="title"><?php the_title(); ?></h1>

        <?php while (have_rows('podrazdeleniya_kompanii', 'option')): the_row();

            // переменные
            $gorod = get_sub_field('gorod');
            $adres = get_sub_field('adres');
            $telefon = get_sub_field('telefon');
            $telefon_ssylka = get_sub_field('telefon_ssylka');
            $email = get_sub_field('email');
            $izobrazhenie = get_sub_field('izobrazhenie');
            $karta_yandeks = get_sub_field('karta_yandeks');

            ?>

            <div class="contacts-item">
                <div class="company-item__info contacts-item__info">
                    <a href="#" class="company-item__name"><?php echo $gorod; ?></a>
                    <p class="company-item__text">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/map.svg" alt="map">
                        <span><?php echo $adres; ?></span>
                    </p>
                    <a href="tel:<?php echo $telefon_ssylka; ?>" class="company-item__text-b">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/call.svg" alt="call">
                        <span><?php echo $telefon; ?></span>
                    </a>
                    <a href="mailto:<?php echo $email; ?>" class="company-item__text">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/em.svg" alt="em">
                        <span><?php echo $email; ?></span>
                    </a>
                </div>
                <div class="company-item__img contacts-item__img">
                    <img src="<?php echo $izobrazhenie['url']; ?>" alt="<?php echo $izobrazhenie['alt'] ?>" />
                </div>
                <div class="contacts-item__map">
                    <?php echo $karta_yandeks; ?>
                </div>
            </div>

        <?php endwhile; ?>

    </section>

<?php endif; ?>

<?php
get_footer();
