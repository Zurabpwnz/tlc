<?php
/**
 * The template for displaying front page
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


<?php if ( have_rows( 'glavnaya_-_slajder' ) ): ?>
    <section class="banner">
        <div class="banner-slider">
            <div class="swiper-banner">
                <div class="swiper-wrapper">

					<?php while ( have_rows( 'glavnaya_-_slajder' ) ): the_row();

						// переменные
						$izobrazhenie = get_sub_field( 'izobrazhenie' );
						$zagolovok    = get_sub_field( 'zagolovok' );
						$link         = get_sub_field( 'link' );
						$video        = get_sub_field( 'video' )

						?>

                        <div class="swiper-slide">
                            <div class="banner-slide">
                                <h2 class="banner__title"><?php echo $zagolovok; ?></h2>
                                <div class="banner__content">
									<?php if ( have_rows( 'podzagolovki' ) ): ?>
										<?php while ( have_rows( 'podzagolovki' ) ): the_row();
											// переменные
											$tekst = get_sub_field( 'tekst' );
											?>
                                            <div class="banner__item"><?php echo $tekst; ?></div>
										<?php endwhile; ?>
									<?php endif; ?>
                                </div>
                                <a href="#" class="btn btn-border-white banner__btn js-call">ОСТАВИТЬ ЗАЯВКУ</a>
                                <div class="banner__img">
									<?php if ( $video ): ?>
                                        <video preload="auto" autoplay="autoplay" loop="loop" muted="muted">
                                            <source src="<?php echo $video; ?>" type="video/mp4">
                                        </video>
									<?php endif; ?>
                                </div>
                            </div>
                        </div>

					<?php endwhile; ?>

                </div>
            </div>
            <nav class="banner-pagination"></nav>
        </div>
    </section>
<?php endif; ?>


<?php if ( get_field( 'glavnaya_-_nashi_uslugi_-_bolshie' ) && get_field( 'glavnaya_-_nashi_uslugi_-_malenkie' ) ) { ?>

    <section class="catalog">
        <h2 class="title title-pl catalog__title">НАШИ УСЛУГИ</h2>

		<?php if ( have_rows( 'glavnaya_-_nashi_uslugi_-_bolshie' ) ): ?>
			<?php while ( have_rows( 'glavnaya_-_nashi_uslugi_-_bolshie' ) ): the_row();

				// переменные
				$izobrazhenie       = get_sub_field( 'izobrazhenie' );
				$nazvanie           = get_sub_field( 'nazvanie' );
				$nazvanie_2ya_chast = get_sub_field( 'nazvanie_2ya_chast' );
				$ssylka             = get_sub_field( 'ssylka' )

				?>

                <a href="<?php echo $ssylka; ?>" class="catalog-item catalog-item-big">
                    <img src="<?php echo $izobrazhenie['url']; ?>" alt="<?php echo $izobrazhenie['alt'] ?>"/>
                    <span class="catalog-item__content">
                      <span class="catalog-item__title">
                        <b><?php echo $nazvanie; ?></b><br><?php echo $nazvanie_2ya_chast; ?></span>
                    </span>
                </a>

			<?php endwhile; ?>
		<?php endif; ?>


		<?php if ( have_rows( 'glavnaya_-_nashi_uslugi_-_malenkie' ) ): ?>
			<?php while ( have_rows( 'glavnaya_-_nashi_uslugi_-_malenkie' ) ): the_row();

				// переменные
				$izobrazhenie = get_sub_field( 'izobrazhenie' );
				$nazvanie     = get_sub_field( 'nazvanie' );
				$ssylka       = get_sub_field( 'ssylka' ); ?>

                <a href="<?php echo $ssylka; ?>" class="catalog-item catalog-item-small">
                    <img src="<?php echo $izobrazhenie['url']; ?>" alt="<?php echo $izobrazhenie['alt'] ?>"/>
                    <span class="catalog-item__text-s"><?php echo $nazvanie; ?></span>
                </a>

			<?php endwhile; ?>
		<?php endif; ?>

    </section>

<?php } ?>


<?php

$post_objects = get_field( 'glavnaya_-_nashi_proekty' );

if ( $post_objects ): ?>
    <section class="project">
        <header class="project-header">
            <h2 class="title">НАШИ ПРОЕКТЫ</h2>
            <nav class="project-nav">
                <div class="project-pagination"></div>
                <a href="/nashi-proekty/" class="btn btn-border-red project__btn">ВСЕ ПРОЕКТЫ</a>
            </nav>
        </header>

        <div class="project-slider">
            <div class="swiper-project">
                <div class="swiper-wrapper">
					<?php foreach ( $post_objects as $post ): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
						<?php setup_postdata( $post ); ?>

                        <div class="swiper-slide">
                            <div class="project-slide">
                                <div class="project__content">
                                    <h3 class="project__title"><?php the_title(); ?> </h3>

                                    <div class="project__text"><?php $text = strip_tags( get_the_content() );
										echo mb_substr( $text, 0, 300 ) . '...'; ?></div>

                                    <a href="<?php the_permalink(); ?>" class="project__link">Подробнее</a>
                                </div>
                                <div class="project__img">
									<?php the_post_thumbnail( array( 465, 400, 1 ) ); ?>
                                </div>
                            </div>
                        </div>

					<?php endforeach; ?>
                </div>
            </div>
            <a href="#" class="project-prev">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arr.svg" alt="">
            </a>
            <a href="#" class="project-next">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arr.svg" alt="">
            </a>
        </div>
    </section>
	<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>


<?php

$post_objects = get_field( 'glavnaya_-_nashi_klienty' );

if ( $post_objects ): ?>
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
					<?php foreach ( $post_objects as $post ): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
						<?php setup_postdata( $post ); ?>

                        <div class="swiper-slide">
                            <p class="client__img"><?php the_post_thumbnail(); ?></p>
                        </div>

					<?php endforeach; ?>
                </div>
            </div>
            <a href="#" class="client-prev">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arr.svg" alt="">
            </a>
            <a href="#" class="client-next">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arr.svg" alt="">
            </a>
        </div>
    </section>
	<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>


<?php

$post_objects = get_field( 'glavnaya_-_blagodarstvennye_pisma' );

if ( $post_objects ): ?>
    <section class="project">
        <header class="project-header">
            <h2 class="title">БЛАГОДАРСТВЕНЫЕ ПИСЬМА</h2>
            <nav class="project-nav">

                <div class="letter-pagination"></div>
                <!--                <a href="#" class="btn btn-border-red project__btn">ВСЕ ОТЗЫВЫ</a>-->
            </nav>
        </header>

        <div class="project-slider">
            <div class="swiper-letter">

                <div class="swiper-wrapper">
					<?php foreach ( $post_objects as $post ): // Переменная должна быть названа обязательно $post (IMPORTANT) ?>
						<?php setup_postdata( $post ); ?>

                        <div class="swiper-slide">
                            <div class="project-slide">
                                <div class="letter__content">
                                    <h3 class="project__title"><?php the_title(); ?></h3>

                                    <div class="project__text"><?php the_content(); ?></div>

                                    <a href="<?php the_permalink(); ?>" class="project__link">Подробнее</a>
                                </div>
                                <div class="letter__img"><?php the_post_thumbnail(); ?></div>
                            </div>
                        </div>

					<?php endforeach; ?>
                </div>
            </div>
            <a href="#" class="letter-prev">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arr.svg" alt="">
            </a>
            <a href="#" class="letter-next">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/arr.svg" alt="">
            </a>
        </div>
    </section>

	<?php wp_reset_postdata(); // ВАЖНО - сбросьте значение $post object чтобы избежать ошибок в дальнейшем коде ?>
<?php endif;

?>


<?php get_template_part( 'template-parts/sections/banner-delivery' ); ?>


<?php if ( have_rows( 'glavnaya_-_preimushhestva' ) ): ?>

    <section class="catalog">
        <h2 class="title title-pl catalog__title">ПОЧЕМУ НАМ ДОВЕРЯЮТ</h2>

		<?php while ( have_rows( 'glavnaya_-_preimushhestva' ) ): the_row();

			// переменные
			$nazvanie     = get_sub_field( 'nazvanie' );
			$opisanie     = get_sub_field( 'opisanie' );
			$izobrazhenie = get_sub_field( 'izobrazhenie' );

			?>

            <div class="catalog-item catalog-item-big">
                <img src="<?php echo $izobrazhenie['url']; ?>" alt="<?php echo $izobrazhenie['alt'] ?>"/>
                <div class="catalog-item__content">
                    <div class="catalog-item__title" style="font-weight: bold;"><?php echo $nazvanie; ?></div>
                    <p class="catalog-item__text"><?php echo $opisanie; ?></p>
                </div>
            </div>

		<?php endwhile; ?>

    </section>

<?php endif; ?>


<?php

$post_objects = get_field( 'glavnaya_-_faq' );

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
