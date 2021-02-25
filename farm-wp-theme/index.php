<?php get_header(); ?>

    <section class="top">
        <div class="top__inner section__inner">

        <?php
            $posts = get_posts( array(
                'numberposts' => -1,
                'category_name'    => 'slider',
                'orderby'     => 'date',
                'order'       => 'ASC',
                'post_type'   => 'post',
                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
            ) );
            
            foreach( $posts as $post ){
                setup_postdata($post);
                ?>
                    <div class="top__item">
                        <div class="top__item-img" style="background-image: url('<?php the_field('slider-img'); ?>');"></div>
                        <div class="top__item-text">
                            <h2 class="top__item-title">
                                <?php the_title(); ?>
                            </h2>
                            <h4 class="top__item-subtitle">
                                <?php the_field('slider-subtitle'); ?>
                            </h4>
                            <div class="top__item-btn">
                                <a class="btn" href="#">
                                        ПОСМОТРЕТЬ ПРОДУКТЫ
                                    </a>
                            </div>
                        </div>
                    </div>
                <?php
            }
            
            wp_reset_postdata(); // сброс
        ?>
        </div>
    </section>

    <section class="info section">
        <div class="container">
            <div class="info__inner section__inner">
                <h3 class="info__title section__title">
                    ДОБРО ПОЖАЛОВАТЬ НА САЙТ НАШЕЙ СЕМЕЙНОЙ ФЕРМЫ!
                </h3>
                <div class="info__title-decoration section__title-decoration">
                    <img class="info__title-icon section__title-icon" src="<?php bloginfo( 'template_url');?>/assets/images/harvest-yellow.svg" alt="section title icon">
                </div>
                <p class="info__text section__text">
                    <?php the_field('info__text'); ?>
                </p>
            </div>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <div class="products__inner section__inner">
                <h3 class="products__title section__title">
                    ПРОДУКТЫ В НАЛИЧИИ
                </h3>
                <div class="products__title-decoration section__title-decoration">
                    <img class="products__title-icon section__title-icon" src="<?php bloginfo( 'template_url');?>/assets/images/harvest-green.svg" alt="section title icon">
                </div>

                <div class="products__cards">
                    <?php
                        $posts = get_posts( array(
                            'numberposts' => -1,
                            'category_name'    => 'products',
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'post_type'   => 'post',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );
                        
                        foreach( $posts as $post ){
                            setup_postdata($post);
                            ?>
                            <div class="products__card">
                                <div class="products__card-img">
                                    <img src="<?php the_field('product-img') ?>" alt="product image">
                                </div>
                                <div class="products__card-info">
                                    <h3 class="products__card-name"><?php the_title(); ?></h3>
                                    <p class="products__card-text">Цена за <?php the_field('product-unit') ?>:
                                        <span class="products__card-price"><?php the_field('product-price') ?></span> грн.
                                    </p>
                                    <p class="products__card-description"></p>
                                    <p class="products__card-text">
                                        Введите нужное количество:
                                    </p>
                                    <form class="products__card-form">
                                        <input type="number" class="products__card-input input" placeholder="0">
                                        <button class="products__card-btn"></button>
                                    </form>
                                </div>
                            </div>
                            <?php
                        }
                        
                        wp_reset_postdata(); // сброс
                    ?>

                </div>
            </div>
        </div>
    </section>


    <section class="order order--active">
        <div class="container">
            <div class="order__inner section__inner">
                <h3 class="container__title section__title">
                    Ваш заказ
                </h3>
                <div class="order__title-decoration section__title-decoration">
                    <img class="order__title-icon section__title-icon" src="<?php bloginfo( 'template_url');?>/assets/images/harvest-yellow.svg" alt="section title icon">
                </div>

                <div class="order__box">
                <div class="order__cards">
                    </div>
                    <p class="order__total">
                        Ориентировочная сумма к оплате <span class="order__total-num">0</span> грн.
                        <a class="order__price-info" href="#price-faq">
                            Подробнее о подсчете суммы заказа.
                    </a>
                    </p>
                    <?php the_field('order-form') ?>
                    <!-- <form class="order__form">
                        <p class="order__form-title">
                            Для подтверждения заказа заполните форму ниже:
                        </p>
                        <input class="order__input input" type="text" placeholder="Имя" required>
                        <input class="order__input input" type="text" placeholder="Телефон" required>
                        <input class="order__input input" type="text" placeholder="Адрес" required>
                        <textarea class="order__input input" rows="5" placeholder="Комментарий"></textarea>
                        <button class="order__btn btn">
                            Подтвердить заказ
                        </button>
                    </form> -->
                </div>

            </div>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="about__inner section__inner">
                <h3 class="about__title section__title">
                    ПАРА СЛОВ О НАС
                </h3>
                <div class="about__title-decoration section__title-decoration">
                    <img class="about__title-icon section__title-icon" src="<?php bloginfo( 'template_url');?>/assets/images/harvest-green.svg" alt="section title icon">
                </div>
                <p class="about__text section__text">
                    <?php the_field('family-text'); ?>
                </p>
                
                <h3 class="info__subtitle section__subtitle">
                    Сейчас наша семья состоит из:
                </h3>

                <div class="about__family-box">
                    <?php
                        $count = 0;
                        $posts = get_posts( array(
                            'numberposts' => -1,
                            'category_name'    => 'family',
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'post_type'   => 'post',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );
                        
                        foreach( $posts as $post ){
                            setup_postdata($post);
                            ?>
                            
                            <div 
                            <?php if($count == 0) : ?>
                                class="about__family-member active"
                                <?php else: ?>
                                    class="about__family-member"
                            <?php endif; ?>
                            style="background-image: url('<?php the_field('family-img') ?>');">
                                <p class="about__family-text">
                                    <span><?php the_field('family-name') ?></span><?php the_field('family-description') ?>
                                </p>
                            </div>
                            <?php $count = $count + 1;?>
                        <?php
                        }
                        
                        wp_reset_postdata(); // сброс
                    ?>
                </div>

                <h3 class="info__subtitle section__subtitle">
                    А так выглядит наша ферма:
                </h3>
                <div class="about__family-farm">
                <?php
                
                        $posts = get_posts( array(
                            'numberposts' => -1,
                            'category_name'    => 'farm-images',
                            'orderby'     => 'date',
                            'order'       => 'ASC',
                            'post_type'   => 'post',
                            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                        ) );
                        
                        foreach( $posts as $post ){
                            setup_postdata($post);
                            ?>
                             <a class="about__family-farm-img" href="<?php the_field('farm-img') ?>" style="background-image: url('<?php the_field('farm-img') ?>');"></a>
                        <?php
                        }
                        
                        wp_reset_postdata(); // сброс
                    ?>
                    
                </div>
            </div>
        </div>
    </section>

    <section class="faq">
        <div class="container">
            <div class="faq__inner section__inner">
                <h3 class="container__title section__title">
                    ОТВЕТЫ НА ЧАСТО ЗАДАВАЕМЫЕ ВОПРОСЫ
                </h3>
                <div class="order__title-decoration section__title-decoration">
                    <img class="order__title-icon section__title-icon" src="<?php bloginfo( 'template_url');?>/assets/images/harvest-yellow.svg" alt="section title icon">
                </div>
                <div class="faq__box">
                    <ul class="faq__list">

                        <?php
                
                            $posts = get_posts( array(
                                'numberposts' => -1,
                                'category_name'    => 'faq',
                                'orderby'     => 'date',
                                'order'       => 'ASC',
                                'post_type'   => 'post',
                                'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
                            ) );
                            
                            foreach( $posts as $post ){
                                setup_postdata($post);
                                ?>
                                <li class="faq__list-drop">
                                    <h3 class="faq__list-title">
                                        <?php the_field('faq-question') ?>
                                    </h3>
                                    <p class="faq__list-text">
                                        <?php the_field('faq-answers') ?>
                                    </p>
                                </li>
                            <?php
                            }
                            
                            wp_reset_postdata(); // сброс
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <?php get_footer(); ?>