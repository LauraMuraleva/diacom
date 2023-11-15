<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ua0
 */
$tmp_dir = get_template_directory_uri() . '/images/';
?>

</div><!-- #content -->
<footer id="colophon" class="site-footer">
    <!---- a0007 ------------------->
    <section id="a0007">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="a0007-grd">
                        <div>
                            <a href="/"><img class="foo-logo" src="/wp-content/uploads/2023/02/лого_диарком_цветной_горизонтальный_бб.png"
                                             alt=""></a>
                        </div>

                        <div>
                            <h4>Контактный телефон:</h4>
                            <h2><a href="tel:+77272960242">+7 (727) 296-02-42</a></h2>
                            <h4>Наш адрес:</h4>
                            <h2>г. Алматы, ул. Полесская 20</h2>
                        </div>

                        <div>
                            <h4>Email:</h4>
                            <h2><a href="mailto:info@diarcom.kz">info@diarcom.kz</a></h2>
                            <div class="a0007-right">
                                <div><a href="https://www.facebook.com/people/%D0%9E%D0%A4-%D0%94%D0%B8%D0%B0%D0%B1%D0%B5%D1%82%D0%B8%D1%87%D0%B5%D1%81%D0%BA%D0%B8%D0%B9-%D1%80%D0%BE%D0%B4%D0%B8%D1%82%D0%B5%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9-%D0%BA%D0%BE%D0%BC%D0%B8%D1%82%D0%B5%D1%82/100090419380054/" target="_blank"><img src="/wp-content/themes/ua0/images/01.png"></a>
                                </div>
                                <div><a href="https://instagram.com/diarcom.kz?igshid=YmMyMTA2M2Y=" target="_blank"><img src="/wp-content/themes/ua0/images/02.png"></a>
                                </div>
                                <!--
								<div><a href="#" target="_blank"><img src="/wp-content/themes/ua0/images/03.png"></a>
                                </div>
								-->
                                <div><a href="https://t.me/joinchat/DjIo6z7JFQz5thdQ0SGIXA" target="_blank"><img src="/wp-content/themes/ua0/images/04.png"></a>
                                </div>
                                <!--
								<div><a href="#" target="_blank"><img src="/wp-content/themes/ua0/images/05.png"></a>
                                </div>
								-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="footer-construct">Copyright © <?php date("Y"); ?> diarcom.kz.  Все права защищены.</div>
                </div>
            </div>
        </div>
    </section>
    <!---- a0007  end ------------------->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
