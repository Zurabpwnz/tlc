<section class="banner-delivery banner-delivery-nomb"
         style="background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/bgd.jpg')">
    <div class="banner-delivery__content">
        <div class="banner-delivery__left">
            <h2 class="banner-delivery__title">РАССЧИТАТЬ СТОИМОСТЬ</h2>
            <h3 class="banner-delivery__subtitle">СЕЙЧАС</h3>
        </div>
        <a href="#" class="btn banner-delivery__btn js-delivery">РАССЧИТАТЬ</a>
        <div class="banner-delivery__right">
            <p class="banner-delivery__text">Или свяжитесь с нашим менеджером по телефону</p>
            <a href="tel:<?php the_field('osnovnoj_telefon_ssylka', 'option'); ?>"
               class="banner-delivery__link"><?php the_field('osnovnoj_telefon_tekst', 'option'); ?></a>
        </div>
    </div>
</section>