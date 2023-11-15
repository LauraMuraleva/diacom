<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ua0
 */
$tmp_dir = get_template_directory_uri() . '/images/';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'ua0'); ?></a>
    <header id="masthead" class="site-header">
        <!-- A0001 ----------------->
        <section id="a0001">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="a0001-grid">
                            <div class="a0001-logo"><a href="/"> <img style="max-width: 300px;"
                                        src="/wp-content/uploads/2023/02/лого-диарком-цветной.png"></a></div>
                            <div>
                                <div class="a0001-tel">Телефон: <a href="tel:+77272960242"><span class="a0001-number">+7 (727) 296-02-42</span></a>
                                </div>
                                <div class="a0001-tel">Email: <a href="mailto:info@diarcom.kz"><span
                                                class="a0001-mail"> info@diarcom.kz </span></a></div>
                            </div>
                            <div>

                                <div class="a0001-grd">
                                    <div><a href="https://instagram.com/diarcom.kz?igshid=YmMyMTA2M2Y=" target="_blank"><img src="<?php echo $tmp_dir; ?>ins.svg"></a>
                                    </div>
									<!--
                                    <div><a href="#" target="_blank"><img src="<?php echo $tmp_dir; ?>twit.svg"></a>
                                    </div>
                                    <div><a href="#" target="_blank"><img src="<?php echo $tmp_dir; ?>you.svg"></a>
                                    </div>
									-->
                                    <div><a href="https://www.facebook.com/people/%D0%9E%D0%A4-%D0%94%D0%B8%D0%B0%D0%B1%D0%B5%D1%82%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B9-%D1%80%D0%BE%D0%B4%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9-%D0%BA%D0%BE%D0%BC%D0%B8%D1%82%D0%B5%D1%82/100090419380054/" target="_blank"><img src="<?php echo $tmp_dir; ?>fb.svg"></a></div>
                                    <div><a href="https://t.me/joinchat/DjIo6z7JFQz5thdQ0SGIXA" target="_blank"><img
                                                    src="<?php echo $tmp_dir; ?>tm-social-btn.svg"></a></div>
                                </div>
                                <div style="position: relative; padding-bottom: 25px;">
                                    <div class="a0001-lung">
                                        <?php echo do_shortcode('[gtranslate]'); ?>
                                        <!--                                <a href="#">Қазақ</a> | <a href="#">Русский</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- A0001 end ----------------->
        <!-- A0015 ----------------->
        <section id="wa_a0015">
            <?php wp_nav_menu(array('theme_location' => 'menu-1')); ?>
        </section>
        <!-- A0015 ----------------->
    </header><!-- #masthead -->
    <div id="content" class="site-content">
