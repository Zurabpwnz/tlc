<?php
/**
 * Template Name: Морские перевозки
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
            <h1 class="banner__title"><?php the_field( 'morskie_-_banner_-_zagolovok' ); ?></h1>

            <div class="banner__content">

				<?php if ( have_rows( 'morskie_-_banner_-_kratkie_opisaniya' ) ): ?>
					<?php while ( have_rows( 'morskie_-_banner_-_kratkie_opisaniya' ) ): the_row();

						// переменные
						$content = get_sub_field( 'tekst' );

						?>

                        <div class="banner__item"><?php echo $content; ?></div>

					<?php endwhile; ?>
				<?php endif; ?>

            </div>

            <a class="btn btn-border-white banner__btn js-call">ОСТАВИТЬ ЗАЯВКУ</a>

            <div class="banner__img"><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></div>
        </div>
    </section>


<?php if ( have_rows( 'morskie_-_kontent' ) ): ?>

    <section class="project">

		<?php while ( have_rows( 'morskie_-_kontent' ) ):
			the_row();

			// переменные
			$izobrazhenie = get_sub_field( 'izobrazhenie' );
			$size         = 'full'; // (thumbnail, medium, large, full или ваш размер)

			$zagolovok  = get_sub_field( 'zagolovok' );
			$opisanie   = get_sub_field( 'opisanie' );
			$zagolovok2 = get_sub_field( 'zagolovok2' );
			$opisanie2  = get_sub_field( 'opisanie2' );

			?>
            <div class="project-item">
				<?php if ( get_sub_field( 'izobrazhenie' ) ) { ?>
                    <div class="project__img">
                        <img width="880" height="440" src="<?php echo $izobrazhenie['url']; ?>"
                             alt="<?php echo $izobrazhenie['alt'] ?>"/>
                    </div>
				<?php } ?>

				<?php if ( get_sub_field( 'izobrazhenie' ) ) { ?>
                    <div class="project__content project-item__content">
                        <h3 class="project-item__title"><?php echo $zagolovok; ?></h3>
                        <div class="project-item__text"><?php echo $opisanie; ?></div>
                    </div>
				<?php } else { ?>
                    <div class="project__content project-item__content column">
                        <h3 class="project-item__title"><?php echo $zagolovok; ?></h3>
                        <div class="project-item__text"><?php echo $opisanie; ?></div>
                    </div>
                    <div class="project__content project-item__content column">
                        <h3 class="project-item__title"><?php echo $zagolovok2; ?></h3>
                        <div class="project-item__text"><?php echo $opisanie2; ?></div>
                    </div>
				<?php } ?>
            </div>

		<?php endwhile; ?>

    </section>

<?php endif; ?>


<?php if ( have_rows( 'morskie_perevozki_-_poryadok_rabot' ) ): ?>

    <section class="order">
        <h2 class="title">ПОРЯДОК РАБОТЫ</h2>

		<?php $i = 0;
		while ( have_rows( 'morskie_perevozki_-_poryadok_rabot' ) ): the_row();
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


<?php if ( have_rows( 'morskie_perevozki_-_argumenty' ) ): ?>

    <section class="argument">
        <h2 class="title">АРГУМЕНТЫ «ЗА» ДОСТАВКУ</h2>

		<?php while ( have_rows( 'morskie_perevozki_-_argumenty' ) ): the_row();

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


<?php get_template_part( 'template-parts/sections/banner-compare' ); ?>


<?php

$post_objects = get_field( 'morskie_perevozki_-_faq' );

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


<?php if ( have_rows( 'morskie_perevozki_-_soputstvuyushhie_uslugi' ) ): ?>

    <section class="service-more">
        <h2 class="title">СОПУТСТВУЮЩИЕ УСЛУГИ</h2>

		<?php while ( have_rows( 'morskie_perevozki_-_soputstvuyushhie_uslugi' ) ): the_row();

			// переменные
			$izobrazhenie = get_sub_field( 'izobrazhenie' );
			$zagolovok    = get_sub_field( 'zagolovok' );
			$ssylka       = get_sub_field( 'ssylka' );

			?>

            <a href="<?php echo $ssylka; ?>" class="service-more__item">
                <h3 class="service-more__name"><?php echo $zagolovok; ?></h3>
                <div class="service-more__img">
                    <img src="<?php echo $izobrazhenie['url']; ?>" alt="<?php echo $izobrazhenie['alt'] ?>"/></div>
            </a>

		<?php endwhile; ?>

    </section>

<?php endif; ?>


    <section class="info-block info-block-left">
        <div class="info-block__img">
			<?php

			$image = get_field( 'morskie_perevozki_-_seo_-_izobrazhenie' );

			if ( ! empty( $image ) ): ?>

                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>"/>

			<?php endif; ?>
        </div>
        <div class="info-block__content">
            <h2 class="info-block__title"><?php the_field( 'morskie_perevozki_-_seo_-_zagolovok' ); ?></h2>
            <div class="info-block__text"><?php the_field( 'morskie_perevozki_-_seo_-_opisanie' ); ?></div>
        </div>
    </section>

<?php
get_footer( 'company' );
