<?php
/**
 * Template Name: Проекты
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
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'posts_per_page' => 6,
    'order' => 'DESC',
    'post_type' => 'project',
    'paged' => $paged
);
$projects = new WP_Query($args);
?>

<?php if ($projects->have_posts()) : ?>

    <section class="project">
        <h1 class="title title-pl"><?php the_title(); ?></h1>

        <?php while ($projects->have_posts()) :
        $projects->the_post(); ?>
        <div class="project-item">
            <?php if (get_the_post_thumbnail()) { ?>
                <div class="project__img">
                    <?php the_post_thumbnail('project-thumb'); ?>
                </div>
            <?php } ?>

            <?php if (get_the_post_thumbnail()) { ?>
            <div class="project__content project-item__content">
                <?php } else { ?>
                <div class="project__content project-item__content column">
                    <?php } ?>

                    <h3 class="project-item__title"><?php the_title(); ?></h3>
                    <div class="project-item__text"><?php echo kama_excerpt(); ?></div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-border-red project-item__btn">Подробнее</a>
                </div>
            </div>

            <?php endwhile;

            $GLOBALS['wp_query']->max_num_pages = $projects->max_num_pages;
            the_posts_pagination(array(
                'type' => 'inline',
                'screen_reader_text' => __(''),
                'end_size' => 1,
                'mid_size' => 1,
                'prev_next' => True,
                'prev_text' => __(''),
                'next_text' => __(''),
                'add_args' => False
            ));
            wp_reset_postdata(); ?>
            <!-- End Pagination -->

    </section>

<?php else :

    get_template_part('template-parts/content', 'none');

endif;
?>

<?php
get_footer('company');
