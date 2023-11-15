<?php /* Template Name: Blog Page */ ?>
<?php get_header(); ?>
<?php $tmp_dir = get_template_directory_uri() . "/images/"; ?>
<!-- BL0 Start -------------------------------->
<section id="wa_bl0">
	<div class="wa_brcr">
		<div class="container">
			Blog
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-12 mt-4">
				<h1>Blog</h1>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
		</div>
		<div class="row">
	<?php
$categories = get_categories();
foreach($categories as $category) {
	echo '<div class="col-12 col-md-6 col-lg-4 mt-4">';
	$image = get_field('bl0_cat_image', $category->taxonomy . '_' . $category->term_id );
	echo '<a href="' . get_category_link($category->term_id) . '"><div class="wa_bl0_categ" style="background-image: url('.$image.')">';
	echo '<div class="wa_bl0_name">' . $category->name . '</div>';
	echo '</div></a></div>';
}
?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
 