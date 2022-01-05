<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLC
 */

get_header();

$pageId = get_queried_object()->ID;
$categoryUrl = get_queried_object();

?>


    <section class="breadcrumbs">
        <?php if (function_exists('kama_breadcrumbs')) {
            kama_breadcrumbs('');
        } ?>
    </section>

    <section class="blog">
        <h1 class="title"><?php single_cat_title(); ?></h1>

        <?php
        if (have_posts()) :

            /* Start the Loop */
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', get_post_type());

            endwhile;

            the_posts_pagination(array(
                'end_size' => 2,
                'prev_text' => __(''),
                'next_text' => __(''),
            ));

        else :

            get_template_part('template-parts/content', 'none');

        endif;
        ?>

    </section>

<?php
get_footer('company');
