<?php
/**
 * Template Name: FAQ
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

<?php if (function_exists('kama_breadcrumbs')) {
    kama_breadcrumbs('');
} ?>


    <section class="faq">
        <header class="faq-header">
            <h1 class="title"><?php the_title(); ?></h1>
        </header>
        <div class="faq__content">

            <?php
            remove_all_filters('posts_orderby');
            $q = new WP_Query(array(
                'post_type' => 'faq',
                'orderby' => 'ID',
                'order' => 'ASC',
                'posts_per_page' => -1,
            ));
            ?>
            <?php if ($q->have_posts()) : ?>
                <?php while ($q->have_posts()) : $q->the_post(); ?>

                    <div class="faq-item">
                        <header class="faq-item__header"><?php the_title(); ?></header>
                        <div class="tab faq-item__content"><?php the_content(); ?>
                        </div>
                    </div>

                <?php endwhile;
                wp_reset_postdata();
                ?>
            <?php endif; ?>


        </div>

        <div class="faq-form">

            <?php echo do_shortcode('[contact-form-7 id="738" title="FAQ"]'); ?>

            <div class="faq-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/faq_img.svg" alt="faq"></div>
        </div>
    </section>


<?php
get_footer();
