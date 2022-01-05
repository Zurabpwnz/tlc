<?php if (have_rows('podrazdeleniya_kompanii', 'option')): ?>

    <section class="company">
        <h2 class="title title-pl company__title">ПОДРАЗДЕЛЕНИЯ КОМПАНИИ</h2>

        <?php while (have_rows('podrazdeleniya_kompanii', 'option')): the_row();

            // переменные
            $gorod = get_sub_field('gorod');
            $adres = get_sub_field('adres');
            $telefon = get_sub_field('telefon');
            $telefon_ssylka = get_sub_field('telefon_ssylka');
            $email = get_sub_field('email');
            $izobrazhenie = get_sub_field('izobrazhenie');
            $karta_yandeks = get_sub_field('karta_yandeks');

            ?>

            <div class="company-item">
                <div class="company-item__img">
                    <img src="<?php echo $izobrazhenie['url']; ?>" alt="<?php echo $izobrazhenie['alt'] ?>" /></div>
                <div class="company-item__info">
                    <p href="#" class="company-item__name"><?php echo $gorod; ?></p>
                    <p class="company-item__text">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/map.svg" alt="">
                        <span><?php echo $adres; ?></span></p>
                    <a href="tel:<?php echo $telefon_ssylka; ?>" class="company-item__text-b">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/call.svg" alt="">
                        <span><?php echo $telefon; ?></span>
                    </a>
                    <a href="mailto:<?php echo $email; ?>" class="company-item__text">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/em.svg" alt="">
                        <span><?php echo $email; ?></span>
                    </a>
                </div>
            </div>

        <?php endwhile; ?>

    </section>

<?php endif; ?>