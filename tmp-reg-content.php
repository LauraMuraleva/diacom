<?php /* Template Name: Hidden Page */ ?>
<?php
if ( is_user_logged_in() ) {
} else {
    header("Location: /login/");
    die();
}
get_header(); ?>
<?php $tmp_dir = get_template_directory_uri() . "/images/";
$idxc=get_the_ID();

$tax_terms =get_terms('materials');
?>

<style>
    .hid-grd {
        display: grid;
        flex-wrap: wrap;
        grid-gap: 20px 20px;
        justify-content: center;
    }

    .hid-item{
        width: 300px;
        align-items: center;
        justify-content: center;
        text-align: center;
        box-shadow: 0px 0px 9px 0px #000;
        padding: 10px;
        border-radius: 30px;
    }

    .hid-item a{
        font-weight: 700;
        font-family: "PT Sans Narrow";
        color: midnightblue !important;
        font-size: 20px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="hid-grd mt-4 mb-4">
            <?php
            foreach ($tax_terms as $term):
            ?>
                <div class="hid-item">
                    <a href="/material/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a>
                </div>
            <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>