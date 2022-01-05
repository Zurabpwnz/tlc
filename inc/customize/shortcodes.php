<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

// About us
function partnersShortCode() {
	ob_start();
	?>
	<?php $partners = new WP_Query( array(
		'post_type'      => 'partners',
		'posts_per_page' => - 1,
	) ); ?>
	<?php if ( $partners->have_posts() ) : ?>

        <!--Наши партнёры-->
        <section class="our-partners" id="our-partners">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center section-title">Наши партнёры</h3>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-sm-12 col-md-10">
                        <div class="our-partners_slider">
							<?php while ( $partners->have_posts() ) : $partners->the_post(); ?>

                                <div>
                                    <div class="partner-wrap"><?php the_post_thumbnail(); ?></div>
                                </div>

							<?php endwhile;
							wp_reset_postdata();
							?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

	<?php endif; ?>
	<?PHP
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}
add_shortcode( 'partners', 'partnersShortCode' );


// Отзывы
function reviewsShortCode() {
	ob_start();
	?>
    <section id="reviews">
        <div class="container">
            <h2 class="title" data-title="Отзывы">
                Отзывы клиентов о нашей работе
            </h2>
            <!--            <div class="desc">Воспользовались нашими услугами? Напишите отзыв о нас и мы опубликуем его на сайте</div>-->
            <div class="row">
                <div class="col-sm-12">
					<?php $q = new WP_Query( array(
						'post_type'      => 'reviews',
						'posts_per_page' => 6,
						'tax_query'      => array(
							array(
								'tax_query' => array(
									'taxonomy' => 'reviews_type',
									'field'    => 'slug',
									'terms'    => 'default',
								)
							)
						)
					) ); ?>
					<?php if ( $q->have_posts() ) : ?>
                        <div id="reviews-carousel" class="owl-carousel">
							<?php while ( $q->have_posts() ) :
								$q->the_post(); ?>
                                <div>
                                    <div class="review-box">
                                        <div class="header-review-box">
											<?php
											$image   = get_field( 'review_author_avatar' );

											if ( ! empty( $image ) ):
												// переменные
												$url = $image['url'];
												$alt = $image['alt']; ?>

                                                <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>">
											<?php endif; ?>

                                            <span class="name"><?php the_field( 'review_author_name' ) ?></span>
                                            <span class="title-review"><?php echo $q->post->post_title; ?></span>
                                            <div class="text"><?php echo $q->post->post_content; ?></div>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile; ?>
                        </div>
					<?php else : ?>
                        <h3>Нету добавленных отзывов</h3>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </section> <?PHP
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}
add_shortcode( 'reviews', 'reviewsShortCode' );


// Сертификаты
function certificatesShortCode() {
	ob_start();
	?>
	<?php $q = new WP_Query( array(
		'post_type'      => 'certificates',
		'posts_per_page' => - 1,
	) ); ?>
	<?php if ( $q->have_posts() ) : ?>
        <!--Наши сертификаты-->
        <section class="certificates">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h2 class="text-center section-title">Наши сертификаты</h2>
                    </div>
                </div>

                <div class="row">
					<?php while ( $q->have_posts() ) : $q->the_post(); ?>
                        <div class="col-sm-6 col-md-4">
                            <div class="d-flex justify-content-center certificate">
                                <a data-fancybox="gallery" href="<?php the_post_thumbnail_url() ?>">
                                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/certificate.png"
                                         title="<?php echo the_title() ?>">
                                </a>
                            </div>
                        </div>
					<?php endwhile;
					    wp_reset_postdata();
					?>
                </div>
            </div>
        </section>
	<?php endif; ?>
    <?PHP
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}
add_shortcode( 'certificates', 'certificatesShortCode' );


// Как мы работаем
function howWorkShortCode() {
	ob_start();
	?>
    <!--Как мы работаем-->
	<?php if ( get_field( 'zagolovok_kak_my_rabotaem', 'option' ) ) { ?>
        <section class="how-work" id="how-work">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="text-center section-title">
							<?php the_field( 'zagolovok_kak_my_rabotaem', 'option' ); ?>
                        </h3>
                    </div>
                </div>

				<?php if ( get_field( 'shagi', 'option' ) ): ?>
                    <div class="row">
						<? $steps = get_field( 'shagi', 'option' ); ?>

						<?php foreach ( $steps as $key => $step ) {
							$key ++;
							?>
                            <div class="col-md-6 col-lg-3">
                                <div class="item">
                                    <div class="item_head">
										<?php
										$image = $step['ikonka_shaga'];
										if ( ! empty( $image ) ): ?>
                                            <img src="<?php echo $image['url']; ?>"
                                                 alt="<?php echo $image['alt']; ?>"/>
										<?php endif; ?>

                                        <img class="arrow arrow-<?php echo $key; ?>"
                                             src="<?php echo get_template_directory_uri(); ?>/assets/img/how-work/how-work-arrow.svg"
                                             alt="">
                                    </div>
                                    <div class="item_body">
                                        <span class="item_number"><?php echo $key; ?>.</span>
                                        <span class="item_title"><?php echo $step['nazvanie_shaga']; ?></span>
                                    </div>

									<?php if ( $step['tekst_dlya_knopki'] ) { ?>
                                        <div class="item_foot">
                                            <a class="btn " href="#!" data-toggle="modal" data-target="#howWeWorkModal"><?php echo $step['tekst_dlya_knopki']; ?></a>
                                        </div>
									<?php } ?>
                                </div>
                            </div>
						<?php }
						wp_reset_postdata();
						?>
                    </div>
				<?php endif; ?>

            </div>
        </section>
	<?php } ?>
	<?PHP
	$output_string = ob_get_contents();
	ob_end_clean();

	return $output_string;
}
add_shortcode( 'how-work', 'howWorkShortCode' );
