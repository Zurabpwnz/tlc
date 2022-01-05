<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TLC
 */

?>

<a href="<?php the_permalink(); ?>"  rel="nofollow" class="blog-item" id="post-<?php the_ID(); ?>">
    <div class="blog-item__img"><img width="415" height="300" src="<?php the_post_thumbnail_url('post-thumb');?>" alt=""></div>
    <div class="blog-item__name"><?php the_title(); ?></div>
    <div class="blog-item__text"><?php echo kama_excerpt(); ?></div>
    <div class="btn btn-border-red blog-item__btn">ПОДРОБНЕЕ</div>
</a>
