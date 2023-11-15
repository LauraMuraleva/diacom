<?php /* Template Name: History */ ?>
<?php
get_header();
?>
    <div class="container  mb-3">
        <div class="row">
            <div class="col-12">

                <div id="primary" class="content-area">
                    <main id="main" class="site-main">

                        <?php
                        while ( have_posts() ) :
                            the_post();

                            get_template_part( 'template-parts/content', 'page' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;

                        endwhile; // End of the loop.
                        ?>

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div>

            <!-- A0187 Start -------------------------------->
            <?php if (have_rows('a0187')) : ?>
                <link
                    rel="stylesheet"
                    href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
                />
                <section id="a0187">
                            <?php while (have_rows('a0187')) : the_row(); ?>
                                    <h2><?php echo get_sub_field('galery_name'); ?></h2>
                                    <?php $gelery=get_sub_field('galery_id'); ?>
                                    <div class="a0187-grd">
                                        <?php while (have_rows('items')) : the_row(); ?>
                                        <div>
                                            <a data-fancybox="<?php echo $gelery; ?>" href="<?php echo get_sub_field('big_image'); ?>">
                                            <div class="a0187-img" style="background-image: url('<?php echo get_sub_field('big_image'); ?>')">
                                            </div>
                                            </a>
                                        </div>
                                        <?php endwhile; ?>
                                    </div>
                            <?php endwhile; ?>
                </section>
                <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
            <?php endif; ?>
            <!-- A0187 End ---------------------------------->

        </div>
    </div>
<?php
get_footer();


