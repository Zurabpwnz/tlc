<?php
/**
 * Template Name: Консалтинг
 * Template Post Type: uslugi
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package TLC
 */

get_header();
?>

    <section class="breadcrumbs breadcrumbs-gray">
		<?php if ( function_exists( 'kama_breadcrumbs' ) ) {
			kama_breadcrumbs( '' );
		} ?>
    </section>

    <section class="banner banner-post">
        <div class="banner-slide">
            <h1 class="banner__title"><?php the_field( 'konsalting_-_banner_-_zagolovok' ); ?></h1>
            <div class="banner__content">

				<?php if ( have_rows( 'konsalting_-_banner_-_kratkie_opisaniya' ) ): ?>
					<?php while ( have_rows( 'konsalting_-_banner_-_kratkie_opisaniya' ) ): the_row();

						// переменные
						$lejbl     = get_sub_field( 'lejbl' );
						$znachenie = get_sub_field( 'znachenie' );

						?>

                        <div class="banner__item-auto">
                            <p><?php echo $lejbl; ?></p> <span><?php echo $znachenie; ?></span>
                        </div>

					<?php endwhile; ?>
				<?php endif; ?>

            </div>
            <a class="btn btn-border-white banner__btn js-call">ОСТАВИТЬ ЗАЯВКУ</a>

            <div class="banner__img"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></div>
        </div>
    </section>


    <section class="description">
        <h2 class="title"><?php the_field( 'konsalting_-_zagolovok' ); ?></h2>
        <div class="description__content">
            <div class="description__text"><?php the_field( 'konsalting_-_kontent' ); ?></div>

			<?php if ( have_rows( 'konsalting_-_kontent_ssylki' ) ): ?>

                <div class="description__list">

					<?php while ( have_rows( 'konsalting_-_kontent_ssylki' ) ): the_row();

						// переменные
						$tekst  = get_sub_field( 'tekst' );
						$ssylka = get_sub_field( 'ssylka' );

						?>

                        <a href="<?php echo $ssylka; ?>" class="service-nav__link"><?php echo $tekst; ?></a>

					<?php endwhile; ?>

                </div>

			<?php endif; ?>

        </div>
    </section>


<?php get_template_part( 'template-parts/sections/banner-delivery' ); ?>


<?php

$images = get_field( 'konsalting_-_otgruzka_tovara' );

if ( $images ): ?>
    <section class="process">
        <h2 class="title">ПРОЦЕСС КОНТРОЛЯ ОТГРУЗКИ ТОВАРА</h2>
        <div class="process-slider">
            <div class="swiper-process">
                <div class="swiper-wrapper">
					<?php foreach ( $images as $image ): ?>

                        <div class="swiper-slide">
                            <div class="process__img">
                                <img src="<?php echo $image['sizes']['konsalting-slider-thumb']; ?>"
                                     alt="<?php echo $image['alt']; ?>"/>
                            </div>
                        </div>

					<?php endforeach; ?>
                </div>
            </div>
            <a href="#" class="process-prev">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arr.svg" alt="arr"></a>
            <a href="#" class="process-next">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arr.svg" alt="arr"></a>
        </div>
    </section>
<?php endif; ?>


<?php if ( have_rows( 'konsalting_-_argumenty' ) ): ?>

    <section class="argument">
        <h2 class="title">АРГУМЕНТЫ «ЗА» КОНТРОЛЬ ОТГРУЗКИ ТОВАРА</h2>

		<?php while ( have_rows( 'konsalting_-_argumenty' ) ): the_row();

			// переменные
			$zagolovok = get_sub_field( 'zagolovok' );
			$opisanie  = get_sub_field( 'opisanie' );

			?>

            <div class="argument-item">
                <h3 class="argument-item__title"><?php echo $zagolovok; ?></h3>
                <p class="argument-item__text"><?php echo $opisanie ?></p>
            </div>

		<?php endwhile; ?>

    </section>

<?php endif; ?>


<?php if ( have_rows( 'konsalting_-_poryadok_raboty' ) ): ?>

    <section class="order">
        <h2 class="title">ПОРЯДОК РАБОТЫ</h2>

		<?php $i = 0;
		while ( have_rows( 'konsalting_-_poryadok_raboty' ) ): the_row();
			$i ++;

			// переменные
			$opisanie = get_sub_field( 'opisanie' );

			?>

            <div class="order-item">
                <div class="order-item__num js-order-num"><?php echo $i; ?></div>
                <div class="order-item__text"><?php echo $opisanie; ?></div>
            </div>

		<?php endwhile; ?>

    </section>

<?php endif; ?>


<?php if ( get_field( 'konsalting_-_video' ) ) { ?>

    <section class="video-block">
        <div class="board-video">
            <div class="board-video__content">
                <div class="video">
                    <a class="video__link" href="https://youtu.be/<?php the_field( 'konsalting_-_video' ); ?>">
                        <picture>
                            <source srcset="https://i.ytimg.com/vi_webp/<?php the_field( 'konsalting_-_video' ); ?>/hqdefault.webp"
                                    type="image/webp">
                            <img class="video__media"
                                 src="https://i.ytimg.com/vi/<?php the_field( 'konsalting_-_video' ); ?>/hqdefault.jpg"
                                 alt=""></picture>
                    </a>
                    <button class="video__button" aria-label="Запустить видео">
                        <svg width="68" height="48" viewBox="0 0 68 48">
                            <path class="video__button-shape"
                                  d="M66.52,7.74c-0.78-2.93-2.49-5.41-5.42-6.19C55.79,.13,34,0,34,0S12.21,.13,6.9,1.55 C3.97,2.33,2.27,4.81,1.48,7.74C0.06,13.05,0,24,0,24s0.06,10.95,1.48,16.26c0.78,2.93,2.49,5.41,5.42,6.19 C12.21,47.87,34,48,34,48s21.79-0.13,27.1-1.55c2.93-0.78,4.64-3.26,5.42-6.19C67.94,34.95,68,24,68,24S67.94,13.05,66.52,7.74z"></path>
                            <path class="video__button-icon" d="M 45,24 27,14 27,34"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </section>

<?php } ?>


<?php get_template_part( 'template-parts/sections/banner-faq' ); ?>


<?php if ( have_rows( 'konsalting_-_opisanie_uslugi' ) ): ?>

    <section class="adv">

		<?php while ( have_rows( 'konsalting_-_opisanie_uslugi' ) ):
			the_row();

			// переменные
			$izobrazhenie = get_sub_field( 'izobrazhenie' );
			$zagolovok    = get_sub_field( 'zagolovok' );
			$opisanie     = get_sub_field( 'opisanie' );
			$ssylka       = get_sub_field( 'ssylka' );

			$zagolovok2 = get_sub_field( 'zagolovok2' );
			$opisanie2  = get_sub_field( 'opisanie2' );
			$ssylka2    = get_sub_field( 'ssylka2' );

			?>

            <div class="adv-item">
				<?php if ( $izobrazhenie ) { ?>
                    <div class="adv-item__img">
                        <img width="880" height="440" src="<?php echo $izobrazhenie['url']; ?>" alt="<?php echo $izobrazhenie['alt'] ?>"/></div>
				<?php } ?>


                <div class="adv-item__content">
                    <h2 class="adv-item__title"><?php echo $zagolovok; ?></h2>
                    <p class="adv-item__text"><?php echo $opisanie; ?></p>
                    <a href="<?php echo $ssylka; ?>" class="adv-item__link">Подробнее</a>
                </div>


            </div>

		<?php endwhile; ?>

    </section>

<?php endif; ?>


<?php

$post_objects = get_field( 'konsalting_-_faq' );

if ( $post_objects ): ?>

    <section class="faq">
        <header class="faq-header">
            <h2 class="title">ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ</h2>
            <a href="/faq/" class="btn btn-border-red faq__btn">ВСЕ ВОПРОСЫ</a>
        </header>
        <div class="faq__content">

			<?php foreach ( $post_objects as $post ): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
				<?php setup_postdata( $post ); ?>

                <div class="faq-item">
                    <header class="faq-item__header"><?php the_title(); ?></header>
                    <div class="tab faq-item__content"><?php the_content(); ?></div>
                </div>

			<?php endforeach; ?>

        </div>
        <div class="faq-img">
            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/faq_img.svg" alt="faq">
        </div>
    </section>

	<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>


<?php
get_footer( 'company' );
