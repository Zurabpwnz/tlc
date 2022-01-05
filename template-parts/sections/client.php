<?php

$post_objects = get_field('glavnaya_-_nashi_klienty');

if ($post_objects): ?>
    <section class="client">
        <header class="client-header">
            <h2 class="title client__title">
                НАШИ КЛИЕНТЫ
            </h2>
            <nav class="client-nav">
                <div class="client-pagination"></div>
            </nav>
        </header>
        <div class="client-slider">
            <div class="swiper-client">
                <div class="swiper-wrapper">
                    <?php foreach ($post_objects as $post): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
                        <?php setup_postdata($post); ?>

                        <div class="swiper-slide">
                            <p class="client__img"><?php the_post_thumbnail(); ?></p>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
            <a href="#" class="client-prev">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arr.svg" alt="">
            </a>
            <a href="#" class="client-next">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/arr.svg" alt="">
            </a>
        </div>
    </section>
    <?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>