<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ua0
 */
if ( is_user_logged_in() ) {
} else {
    header("Location: /login/");
    die();
}
?>
<?php get_header(); ?>
<?php
$url = urlencode(get_permalink());
$title_url  = urlencode(get_the_title());
$image = get_field('image');
$img_url = $image['url'];
?>

<?php
$join = get_field("post_image", get_the_ID());
if (isset($join)) :
    ?>
    <div class="post-img" style="background-image: url('<?php echo $join["image"]; ?>')"></div>
<?php
endif;

?>
<div class="hdr_title">
    <div class="container blog">
        <div class="row">
            <div class="col-12">
                <?php
                while ( have_posts() ) :
                    the_post();
                    //get_the_ID()
                    $catsproj=wp_get_post_terms(get_the_ID(), 'materials', array('fields' => 'all'));
                    $args = array(
                        'taxonomy' => 'materials',
                        'orderby' => 'name',
                        'order'   => 'ASC'
                    );

                    ?>

                    <div class="braicrumns-page">
                        <a href="/" class="link-to-main">Главная</a> <span class="arrow"> > </span> <?php
                        $cnt=count($catsproj);
                        $x=0;
                        foreach($catsproj as $ct){
                            $x++;
                            echo "<a href='/material/".$ct->slug."'>".$ct->name."</a>";
                            if($x!=$cnt){
                                echo '<span class="arrow"> | </span>';
                            }
                        }
                        ?>
                        <span class="arrow"> > </span>
                        <?php echo get_the_title(); ?>
                    </div>
                    <?php
                    get_template_part( 'template-parts/content', 'page' );

                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
