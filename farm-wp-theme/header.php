<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo( 'description ');?></title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
    <style>
        .faq__list-title::before {
            background-image: url(<?php bloginfo( 'template_url');?>/assets/images/arrow-down.svg);
            }
        .products__card-btn, .order__card-delete{
            background-image: url('<?php bloginfo( 'template_url');?>/assets/images/plus.svg');
        }
        .products__card-btn--active{
            background-image: url('<?php bloginfo( 'template_url');?>/assets/images/check.svg');
        }
        
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="header__inner section__inner">
                <a class="header__logo" href="#"><img src="<?php bloginfo( 'template_url');?>/assets/images/logo.png" alt="logo"></a>

                <nav class="header__menu">
                    <div class="header__menu-btn">
                        <div class="header__menu-row"></div>
                        <div class="header__menu-row"></div>
                        <div class="header__menu-row"></div>
                    </div>
                    <ul class="header__menu-list">
                        <li class="header__menu-item">
                            <a href="#" class="header__menu-link">ГЛАВНАЯ</a>
                        </li>
                        <li class="header__menu-item">
                            <a href="#" class="header__menu-link">ГРАФИК ДОСТАВКИ</a>
                        </li>
                        <li class="header__menu-item">
                            <a href="#" class="header__menu-link">ПРОДУКТЫ В НАЛИЧИИ</a>
                        </li>
                        <li class="header__menu-item">
                            <a href="#" class="header__menu-link">О НАС</a>
                        </li>
                        <li class="header__menu-item">
                            <a href="#" class="header__menu-link">КОНТАКТЫ</a>
                        </li>
                        <li class="header__menu-item">
                            <a href="#" class="header__menu-link">ЧАВО</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>