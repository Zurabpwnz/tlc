<?php
/**
 * Template Name: Карта сайта
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

<?php
while (have_posts()) :
    the_post(); ?>


    <section class="project-single">
        <div class="project-single__content">

            <h1 class="title"><?php the_title(); ?></h1>

            <div class="project-item__text project-single__text">
                <?php the_content(); ?>
            </div>

        </div>
    </section>

<?php endwhile; // End of the loop.
?>

<?php
get_footer();
