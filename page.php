<?php
/**
 * The template for displaying all pages
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

    <section class="project-single">
        <div class="project-single__content">

            <h1 class="title"><?php the_title(); ?></h1>

            <!--            <h2 class="project-title project-item__title">Проверка и доставка оборудования для производства сетки-рабицы</h2>-->

            <div class="project-single__img">
                <?php the_post_thumbnail(); ?>
            </div>

            <div class="project-item__text project-single__text">
                <?php the_content(); ?>
            </div>

        </div>

        <nav class="project-single__nav" data-da=".project-single__content,991,1">

            <?php echo do_shortcode('[lwptoc]'); ?>
            
        </nav>
    </section>

<?php
get_footer('company');
