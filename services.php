<?php
/**
 * Template Name: Услуги
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

    <section class="service">
        <h1 class="title"><?php the_title(); ?></h1>
        <div class="service__wrapper">

            <?php if (have_rows('osnovnaya_kategoriya')): ?>

                <nav class="service-nav js-service-nav">

                    <?php while (have_rows('osnovnaya_kategoriya')): the_row();

                        // переменные
                        $post_object = get_sub_field('osnovnaya');

                        if ($post_object):

                            // перезаписать $post
                            $post = $post_object;
                            setup_postdata($post);

                            ?>

                            <a class="service-nav__link js-service-nav__link"><?php the_title(); ?></a>

                            <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде
                            ?>
                        <?php endif; ?>


                    <?php endwhile; ?>

                </nav>

            <?php endif; ?>


            <?php if (have_rows('osnovnaya_kategoriya')): ?>
                <?php while (have_rows('osnovnaya_kategoriya')): the_row(); ?>

                    <div class="tab service__content js-service-nav__tab">

                        <?php

                        $post_objects = get_sub_field('dochernie');

                        if ($post_objects): ?>

                            <?php foreach ($post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                                <?php setup_postdata($post); ?>

                                <div class="service-item">
                                    <div class="service-item__content">
                                        <h2 class="service-item__title"><?php the_title(); ?></h2>
                                        <div class="service-item__text"><?php the_excerpt(); ?></div>
                                        <a href="<?php the_permalink(); ?>"
                                           class="btn btn-border-red service-item__btn">ПОДРОБНЕЕ</a>
                                    </div>
                                    <div class="service-item__img"><?php the_post_thumbnail('service-thumb'); ?></div>
                                </div>

                            <?php endforeach; ?>

                            <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
                        <?php endif;

                        ?>

                    </div>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>
    </section>


<?php
get_footer();
