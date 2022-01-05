<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLC
 */

?>

<div class="project-item">
    <div class="project__img">
        <?php the_post_thumbnail(); ?>
    </div>
    <div class="project__content project-item__content">
        <h3 class="project-item__title"><?php the_title(); ?></h3>
        <p class="project-item__text"><?php echo kama_excerpt(); ?></p>
        <a href="<?php the_permalink(); ?>" class="btn btn-border-red project-item__btn">Подробнее</a>
    </div>
</div>