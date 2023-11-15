<?php
/**
 * A Simple Category Template
 */
if ( is_user_logged_in() ) {
} else {
    header("Location: /login/");
    die();
}
get_header(); ?>

    <!-- BL0 Start -------------------------------->


    <section id="wa_bl0">
        <div class="container">
            <div class="row">
                <div class="col-12 mt-4">
                    <h1><?php $cat = get_queried_object(); echo $cat->name;  ?></h1>
                </div>
            </div>
            <?php
            // the query
            $term = get_queried_object();
            $slug = $term->slug;
            $args = array(
                'post_type'=>'contents',
            //     'category_name' => $slug,
                'post_status'=>'publish',
                'posts_per_page' => 3,
                'paged' =>  $GLOBALS['wp_query']->query['paged']
            );
            $wp_query = new WP_Query( $args );
            ?>
            <div class="row">
                <div class="col-12 mt-4">
                    <?php if ( $wp_query->have_posts() ) : ?>
                        <!-- the loop -->
                        <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
                            <div class="row">
                                <div class="col-12">
                                    <div class="post-grd">
                                        <div>
                                            <?php
                                            $title = get_the_title();
                                            $link_type = get_field('link_type');
                                            if($link_type != 'none'){
                                                if($link_type == 'internal'){
                                                    $link_url = get_field('internal_page_content');
                                                }elseif($link_type == 'newpost'){
                                                    $link_url = get_the_permalink();
                                                }elseif($link_type == 'external'){
                                                    $link_url = get_field('external_link');
                                                    $target = 'target="_blank"';
                                                }

                                                $link_url = get_the_permalink();

                                                $link = '<a href="'. $link_url.'" '.$target.'>';
                                                $link_after = '</a>';
                                                $read_more = '<a href="'. $link_url.'" '.$target.'><div class="read_more">Learn More</div></a>';
                                            }
                                            $link_url = get_the_permalink();
                                            $url = wp_get_attachment_url( get_post_thumbnail_id(get_the_id()), 'thumbnail' );
                                            $image = $url;
                                            if( !empty($image) ): ?>
                                                <?php echo $link; ?>
                                                <div class="post-grid-img" style="background-image: url('<?php echo $image; ?>')">
                                                </div>
                                                <?php echo $link_after; ?>
                                            <?php else: ?>
                                                <?php echo $link; ?><img style="width: 300px; border-radius: 20px;" src="/wp-content/uploads/2023/06/istockphoto-1128826884-170667a-1.jpg" alt="Web Aika Default Logo Icon" class="art_img" /><?php echo $link_after; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div >
                                            <?php echo '<h3>'.$link.$title.$link_after.'</h3>'; ?>
                                            <?php
                                            the_excerpt();
                                            echo $read_more;
                                            unset($read_more);
                                            unset($link);
                                            unset($link_after);
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12"><hr class="post_hr"></div>
                            </div>
                        <?php endwhile; ?>

                        <div class="wa_bl0_blog">
                            <?php wpbeginner_numeric_posts_nav(); ?>
                        </div>
                        <!-- end of the loop -->
                        <?php wp_reset_postdata(); ?>
                    <?php else : ?>
                        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- BL0 END ------------->
<?php get_footer(); ?>