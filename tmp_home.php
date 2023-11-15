<?php /* Template Name: Home Page */ ?>
<?php get_header(); ?>
<?php $tmp_dir = get_template_directory_uri() . "/images/";
$idxc=get_the_ID();
?>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' rel='stylesheet'
      integrity='sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC' crossorigin='anonymous'>
<link rel='stylesheet' id='fa-css' href='https://use.fontawesome.com/releases/v5.11.2/css/all.css?ver=5.6.4'
      type='text/css' media='all'/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
<script src='https://code.jquery.com/jquery-3.6.0.js' integrity='sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk='
        crossorigin='anonymous'></script>


<?php
                    $info=get_field('information', $idxc);
                    ?>

<section id="a0003">
	<a href="<?php echo $info["url"]; ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
				<h2>
					<?php echo $info["header"]; ?>
				</h2>
                <div class="a0003-grid">
                    <div class="a0003-part a0003-grd">
                        <div><img src="<?php echo $info["image1"]; ?>" alt=""></div>
                        <div>
							<h4><?php echo $info["subtext1"]; ?></h4>
							<h3><?php echo $info["text1"]; ?></h3>
						</div>
                    </div>
                    <div><img src="<?php echo $info["divider"]; ?>" alt=""></div>
                    <div class="a0003-part a0003-grd">
                        <div><img src="<?php echo $info["image2"]; ?>" alt=""></div>
                        <div>
							<h4><?php echo $info["subtext2"]; ?></h4>
							<h3><?php echo $info["text2"]; ?></h3>
						</div>
                    </div>
                    <div><img src="<?php echo $info["divider"]; ?>" alt=""></div>
                    <div class="a0003-part a0003-grd">
                        <div><img src="<?php echo $info["image3"]; ?>" alt=""></div>
                        <div>
							<h4><?php echo $info["subtext3"]; ?></h4>
							<h3><?php echo $info["text3"]; ?></h3>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
		</a>
</section>



<!---- blok3  ------------------->
<section id="blok3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="gtco-testimonials">
                    <div class="owl-carousel owl-carousel1 owl-theme">

                        <?php
                        $args = array(
                            'post_type'=>'communities',
                            'post_status'=>'publish',
                            'posts_per_page' => 3000,
                        );
                        $wp_query = new WP_Query( $args );
                        ?>

                        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                            <div class="child-card">
                                <div class="card text-center"><img class="card-img-top">
                                    <a href="<?php echo get_the_permalink(); ?> " >
                                        <div class="card-bg" style="    background-image: url(<?php echo wp_get_attachment_url( get_post_thumbnail_id(get_the_id()), 'thumbnail' ); ?>);">
                                        </div>
                                    </a>
                                </div>
                                <div class="box-name"><?php echo get_the_title(); ?></div>
                                <h4 class="top-price">Ориентировочная сумма</h4>
                                <h3 class="price-1"><?php if (get_field( "sum" )) echo get_field( "sum" ); else echo "0"; ?> </h3>
                                <h4 class="top-price">Осталось собрать</h4>
                                <h3 class="price-2">
									<?php if (get_field( "ost" )) echo get_field( "ost" ); else echo "0"; ?>
								</h3>
                                <a href="<?php echo get_the_permalink(); ?> " class="box-btn">ПОМОЧЬ</a>
                            </div>
                        <?php endwhile; ?>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!---- blok3  end ------------------->

<!---- a0006  start ------------------->
<section id="a0006">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Новости</h2>

                <div class="a0006-grd">
                    <?php
                    $news=get_field('news', $idxc);
                    ?>
                        <?php foreach ($news as $new):
                            ?>
                            <div class="a0006-grd-item">
                                <a href="<?php echo $new['url']; ?>">
                                    <img src="<?php echo $new['image']; ?>"></a>
                                <a href="<?php echo $new['url']; ?>" class="a0006-lin"><?php echo $new['header']; ?></a>
                            </div>
                        <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!---- a0006  end ------------------->

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script>
    (function () {
        "use strict";

        var carousels = function () {
            $(".owl-carousel1").owlCarousel({
                loop: true,
                center: true,
                margin: 0,
                responsiveClass: true,
                nav: true,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                    },
                    680: {
                        items: 3,
                        nav: false,
                    },
                    1000: {
                        items: 5,
                        nav: true
                    }
                }
            });
        };

        (function ($) {
            carousels();
        })(jQuery);
    })();


    $(document).ready(function () {

        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });

    });

</script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM'
        crossorigin='anonymous'></script>

<!---- a0149 ------------------->
<?php if (have_rows('a0149')) : ?>
    <?php while (have_rows('a0149')) : the_row(); ?>
        <section id="a0149" style="display: none">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Помочь так просто</h2>
                        <div class="a0149-grid">
                            <?php while (have_rows('boxes')) : the_row(); ?>
                                <div class="a0149-item ">
                                    <div class="a0149-whbox">
                                        <a class="a0149-lnk-head" href="<?php echo get_sub_field('url'); ?>"><img
                                                    src="<?php echo get_sub_field('image'); ?>" alt=""
                                                    class="a0149-art_img"></a>
                                        <div class="a0149-pad">
                                            <a class="a0149-lnk-head"
                                               href="<?php echo get_sub_field('url'); ?>">
                                                <div><?php echo get_sub_field('images_title'); ?></div>
                                            </a>
                                            <?php echo get_sub_field('images_text'); ?>
                                        </div>
                                    </div>
                                    <a href="<?php echo get_sub_field('button_url'); ?>"
                                       class="a0149-btn"><?php echo get_sub_field('button_text'); ?></a>
                                </div>

                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
<?php endif; ?>
<!---- a0149  end ------------------->

<!---- a0005  start
<section id="a0005">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Акции</h2>
                <div class="a0005-grid">
                    <div class="a0005-box">
                        <img src="/wp-content/themes/ua0/images/5e314500d8903393336186.jpg" alt="">
                        <h3>Один пакет - одно доброе дело!</h3>
                        <h4>Один пакет - одно доброе дело!</h4>
                        <a href="#">ПОМОЧЬ</a>
                    </div>
                    <div class="a0005-box">
                        <img src="/wp-content/themes/ua0/images/5e314500d8903393336186.jpg" alt="">
                        <h3>Один пакет - одно доброе дело!</h3>
                        <h4>Один пакет - одно доброе дело!</h4>
                        <a href="#">ПОМОЧЬ</a>
                    </div>
                    <div class="a0005-box">
                        <img src="/wp-content/themes/ua0/images/5e314500d8903393336186.jpg" alt="">
                        <h3>Один пакет - одно доброе дело!</h3>
                        <h4>Один пакет - одно доброе дело!</h4>
                        <a href="#">ПОМОЧЬ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
a0005  end ------------------->



<!---- blok4  
<section id="blok4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Наши партнеры</h2>
				<?php
				$field=get_field( "logo", $idxc );
				?>
                <div class="gtco-testimonials">
                    <div class="owl-carousel owl-carl1 owl-thme">
						<?php
						foreach($field as $im ):
						?>
                        <a href="<?php echo $im['url']; ?>" target="_blank"><img src="<?php echo $im["image"]; ?>" ></a>
						<?php
						endforeach;
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
 blok4  end ------------------->

<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>


<script>
    (function () {
        "use strict";

        var carousels = function () {
            $(".owl-carl1").owlCarousel({
                loop: true,
                center: true,
                margin: 0,
                responsiveClass: true,
                nav: false,
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: false,
                    },
                    680: {
                        items: 2,
                        nav: false,
                    },
                    1000: {
                        items: 5,
                        nav: false
                    }
                }
            });
        };

        (function ($) {
            carousels();
        })(jQuery);
    })();


    $(document).ready(function () {

        $("#owl-demo").owlCarousel({

            autoPlay: 3000, //Set AutoPlay to 3 seconds

            items: 4,
            itemsDesktop: [1199, 3],
            itemsDesktopSmall: [979, 3]

        });

    });

</script>

<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'
        integrity='sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM'
        crossorigin='anonymous'></script>
<?php get_footer(); ?>
