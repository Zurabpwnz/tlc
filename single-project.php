<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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

            <div class="project-single__img">
                <?php the_post_thumbnail('project-thumb'); ?>
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
