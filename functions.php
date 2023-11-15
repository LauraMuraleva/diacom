<?php
/**
 * ua0 functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ua0
 */

if ( ! function_exists( 'ua0_setup' ) ) :
	function ua0_setup() {
		load_theme_textdomain( 'ua0', get_template_directory() . '/languages' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ua0' ),
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'ua0_setup' );

function ua0_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ua0' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ua0' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ua0_widgets_init' );


function ua0_scripts() {
	wp_enqueue_style( 'ua0-style', get_stylesheet_uri() );
	wp_enqueue_script( 'ua0-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'ua0-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style('fa', 'https://use.fontawesome.com/releases/v5.11.2/css/all.css');// UPDATE MDB - Font Awesome HERE ---------------------
	wp_enqueue_script('mdb-jquery', get_template_directory_uri() . '/js/jquery.min.js');  // UPDATE MDB HERE ---------------------
	wp_enqueue_style('mystyle', get_template_directory_uri() . '/css/my_styles.css?t='.time());

}
add_action( 'wp_enqueue_scripts', 'ua0_scripts' );



require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';


if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//---------------BL0 Start ---------------------------------------------------------------------------------//
// Post pagination
if ( ! function_exists( 'wpbeginner_numeric_posts_nav' ) ){
	function wpbeginner_numeric_posts_nav() {
		if( is_singular() )
			return;
		global $wp_query;
		/** Stop execution if there's only 1 page */
		if( $wp_query->max_num_pages <= 1 )
			return;
		$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
		$max   = intval( $wp_query->max_num_pages );
		/** Add current page to the array */
		if ( $paged >= 1 )
			$links[] = $paged;
		/** Add the pages around the current page to the array */
		if ( $paged >= 3 ) {
			$links[] = $paged - 1;
			$links[] = $paged - 2;
		}
		if ( ( $paged + 2 ) <= $max ) {
			$links[] = $paged + 2;
			$links[] = $paged + 1;
		}
		echo '<div class="navigation"><ul style="padding-left: 0; margin-left: 0;">' . "\n";
		/** Previous Post Link */
		if ( get_previous_posts_link() )
			printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
		/** Link to first page, plus ellipses if necessary */
		if ( ! in_array( 1, $links ) ) {
			$class = 1 == $paged ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
			if ( ! in_array( 2, $links ) )
				echo '<li>…</li>';
		}
		/** Link to current page, plus 2 pages in either direction if necessary */
		sort( $links );
		foreach ( (array) $links as $link ) {
			$class = $paged == $link ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
		}
		/** Link to last page, plus ellipses if necessary */
		if ( ! in_array( $max, $links ) ) {
			if ( ! in_array( $max - 1, $links ) )
				echo '<li>…</li>' . "\n";
			$class = $paged == $max ? ' class="active"' : '';
			printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
		}
		/** Next Post Link */
		if ( get_next_posts_link() )
			printf( '<li>%s</li>' . "\n", get_next_posts_link() );
		echo '</ul></div>' . "\n";
	}
}

function register_wa_tweeter() {
	register_sidebar(
		array(
		'id' => 'wa_tweeter',
		'name' => esc_html__( 'Tweeter', 'webaika.com' ),
		'description' => esc_html__( 'Tweeter feed', 'webaika.com' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s wa_twitter_widg">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title-holder"><h3 class="widget-title">',
		'after_title' => '</h3></div>'
		)
	);
}
add_action( 'widgets_init', 'register_wa_tweeter' );

//---------------BL0 END ---------------------------------------------------------------------------------//

add_action('admin_head', 'my_custom');

function my_custom() {
echo '<style>
.aioseo-meta-options .edit-description {
display: none;
}
</style>';
}

function codernote_request($query_string ) {
    if ( isset( $query_string['page'] ) ) {
        if ( ''!=$query_string['page'] ) {
            if ( isset( $query_string['name'] ) ) {
                unset( $query_string['name'] ); }
        }
    }
    return $query_string;
}
add_filter('request', 'codernote_request');

add_action('pre_get_posts', 'codernote_pre_get_posts');
function codernote_pre_get_posts( $query ) {
    if ( $query->is_main_query() && !$query->is_feed() && !is_admin() ) {
        $query->set( 'paged', str_replace( '/', '', get_query_var( 'page' ) ) );
    }
}

add_action('admin_head', 'my_custom');

function send_frame_options_header1() {
@header( 'X-Frame-Options: SAMEORIGIN' );
} 


add_action( 'send_headers', 'send_frame_options_header1', 10, 0 );

add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
  
//create a custom taxonomy name it subjects for your posts
  
function create_subjects_hierarchical_taxonomy() {
  
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
  
  $labels = array(
    'name' => _x( 'Subjects', 'taxonomy general name' ),
    'singular_name' => _x( 'Subject', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Subjects' ),
    'all_items' => __( 'All Subjects' ),
    'parent_item' => __( 'Parent Subject' ),
    'parent_item_colon' => __( 'Parent Subject:' ),
    'edit_item' => __( 'Edit Subject' ), 
    'update_item' => __( 'Update Subject' ),
    'add_new_item' => __( 'Add New Subject' ),
    'new_item_name' => __( 'New Subject Name' ),
    'menu_name' => __( 'Subjects' ),
  );    
  
// Now register the taxonomy
  register_taxonomy('subjects',array('books'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'subject' ),
  ));
  
}


function custom_post_type() {


// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Проекты', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Проект', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Проекты', 'twentythirteen' ),
        'parent_item_colon'   => __( 'родительский Проект', 'twentythirteen' ),
        'all_items'           => __( 'Все Проекты', 'twentythirteen' ),
        'view_item'           => __( 'Смотреть Проект', 'twentythirteen' ),
        'add_new_item'        => __( 'Добавить Проект', 'twentythirteen' ),
        'add_new'             => __( 'Добавить новый', 'twentythirteen' ),
        'edit_item'           => __( 'Изменить Проект', 'twentythirteen' ),
        'update_item'         => __( 'Update Community', 'twentythirteen' ),
        'search_items'        => __( 'Search Community', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );


// Set other options for Custom Post Type


    $args = array(
        'label'               => __( ' Проекты', 'twentythirteen' ),
        'description'         => __( 'Проекты', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => true,


        // This is where we add taxonomies to our CPT
        'taxonomies'          => array( 'subjects' ),
    );


    // Registering your Custom Post Type
    register_post_type( 'communities', $args );


}


/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/


add_action( 'init', 'custom_post_type', 0 );


add_action( 'wp_ajax_misha', 'truemisha_ajax' ); // wp_ajax_{ЗНАЧЕНИЕ ПАРАМЕТРА ACTION!!}
add_action( 'wp_ajax_nopriv_misha', 'truemisha_ajax' );  // wp_ajax_nopriv_{ЗНАЧЕНИЕ ACTION!!}
// первый хук для авторизованных, второй для не авторизованных пользователей

function truemisha_ajax(){

	 global $wpdb;
 
		$userExists = get_user_by('email', $_POST['email']);

        if (!$userExists) {
	
	$tablename = 'person';

        $wpdb->insert( $tablename, array(
            'fio' => $_POST['name'], 
            'email' => $_POST['email'],
            'phone' => $_POST['phone'], 
            'region' => $_POST['region'],
            'children' => $_POST['countchildren']
        ));
	$lastid=$wpdb->insert_id;
	$tablename2 = 'children';
	
	if(isset($_POST['vozrastchild1'])){
		$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild1'], 
            'age_ilnes' => $_POST['agechild1'],
            'stagh' => $_POST['stagh1'], 
            'invalid' => $_POST['invalid1'],
            'vid_insulin' => $_POST['vid1'],
			            'control' => $_POST['control1'], 
            'glukometr' => $_POST['glukometr1'],
            'insulin_krat' => $_POST['shortinsulin1'], 
            'insulin_prologon' => $_POST['prolonginsulin1'],
            'osloghnenie' => $_POST['osloghnenie1']

        ));
	}
	
	
			if(isset($_POST['vozrastchild2'])){
$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild2'], 
            'age_ilnes' => $_POST['agechild2'],
            'stagh' => $_POST['stagh2'], 
            'invalid' => $_POST['invalid2'],
            'vid_insulin' => $_POST['vid2'],
			            'control' => $_POST['control2'], 
            'glukometr' => $_POST['glukometr2'],
            'insulin_krat' => $_POST['shortinsulin2'], 
            'insulin_prologon' => $_POST['prolonginsulin2'],
            'osloghnenie' => $_POST['osloghnenie2'],
        ));
		}

		if(isset($_POST['vozrastchild3'])){
		$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild3'], 
            'age_ilnes' => $_POST['agechild3'],
            'stagh' => $_POST['stagh3'], 
            'invalid' => $_POST['invalid3'],
            'vid_insulin' => $_POST['vid3'],
			            'control' => $_POST['control3'], 
            'glukometr' => $_POST['glukometr3'],
            'insulin_krat' => $_POST['shortinsulin3'], 
            'insulin_prologon' => $_POST['prolonginsulin3'],
            'osloghnenie' => $_POST['osloghnenie3'],

        ));
	}

		if(isset($_POST['vozrastchild4'])){
		$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild4'], 
            'age_ilnes' => $_POST['agechild4'],
            'stagh' => $_POST['stagh4'], 
            'invalid' => $_POST['invalid4'],
            'vid_insulin' => $_POST['vid4'],
			'control' => $_POST['control4'], 
            'glukometr' => $_POST['glukometr4'],
            'insulin_krat' => $_POST['shortinsulin4'], 
            'insulin_prologon' => $_POST['prolonginsulin4'],
            'osloghnenie' => $_POST['osloghnenie4'],
        ));
	}

		if(isset($_POST['vozrastchild5'])){
		$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild5'], 
            'age_ilnes' => $_POST['agechild5'],
            'stagh' => $_POST['stagh5'], 
            'invalid' => $_POST['invalid5'],
            'vid_insulin' => $_POST['vid5'],
			'control' => $_POST['control5'], 
            'glukometr' => $_POST['glukometr5'],
            'insulin_krat' => $_POST['shortinsulin5'], 
            'insulin_prologon' => $_POST['prolonginsulin5'],
            'osloghnenie' => $_POST['osloghnenie5'],
        ));

	}

		if(isset($_POST['vozrastchild6'])){
		$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild6'], 
            'age_ilnes' => $_POST['agechild6'],
            'stagh' => $_POST['stagh6'], 
            'invalid' => $_POST['invalid6'],
            'vid_insulin' => $_POST['vid6'],
			'control' => $_POST['control6'], 
            'glukometr' => $_POST['glukometr6'],
            'insulin_krat' => $_POST['shortinsulin6'], 
            'insulin_prologon' => $_POST['prolonginsulin6'],
            'osloghnenie' => $_POST['osloghnenie6'],
        ));

	}

		if(isset($_POST['vozrastchild7'])){
		$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild7'], 
            'age_ilnes' => $_POST['agechild7'],
            'stagh' => $_POST['stagh7'], 
            'invalid' => $_POST['invalid7'],
            'vid_insulin' => $_POST['vid7'],
			'control' => $_POST['control7'], 
            'glukometr' => $_POST['glukometr7'],
            'insulin_krat' => $_POST['shortinsulin7'], 
            'insulin_prologon' => $_POST['prolonginsulin7'],
            'osloghnenie' => $_POST['osloghnenie7'],
        ));

	}

		if(isset($_POST['vozrastchild8'])){
		$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild8'], 
            'age_ilnes' => $_POST['agechild8'],
            'stagh' => $_POST['stagh8'], 
            'invalid' => $_POST['invalid8'],
            'vid_insulin' => $_POST['vid8'],
			'control' => $_POST['control8'], 
            'glukometr' => $_POST['glukometr8'],
            'insulin_krat' => $_POST['shortinsulin8'], 
            'insulin_prologon' => $_POST['prolonginsulin8'],
            'osloghnenie' => $_POST['osloghnenie8'],
        ));

	}

		if(isset($_POST['vozrastchild9'])){
		$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild9'], 
            'age_ilnes' => $_POST['agechild9'],
            'stagh' => $_POST['stagh9'], 
            'invalid' => $_POST['invalid9'],
            'vid_insulin' => $_POST['vid9'],
			'control' => $_POST['control9'], 
            'glukometr' => $_POST['glukometr9'],
            'insulin_krat' => $_POST['shortinsulin9'], 
            'insulin_prologon' => $_POST['prolonginsulin9'],
            'osloghnenie' => $_POST['osloghnenie9'],
        ));

	}

		if(isset($_POST['vozrastchild10'])){
				$wpdb->insert( $tablename2, array(
			'person_id' => $lastid,
            'age' => $_POST['vozrastchild10'], 
            'age_ilnes' => $_POST['agechild10'],
            'stagh' => $_POST['stagh10'], 
            'invalid' => $_POST['invalid10'],
            'vid_insulin' => $_POST['vid10'],
			'control' => $_POST['control10'], 
            'glukometr' => $_POST['glukometr10'],
            'insulin_krat' => $_POST['shortinsulin10'], 
            'insulin_prologon' => $_POST['prolonginsulin10'],
            'osloghnenie' => $_POST['osloghnenie10'],
        ));

	}




	$hash = bin2hex(random_bytes(10));
            $userdata = array(
                'user_login' => $_POST['email'],
                'user_url' => "",
                'user_pass' => $hash,
                'user_nicename' => $_POST['name'],
                'user_email' => $_POST['email']
            );

            $user_id = wp_insert_user($userdata);

            $user = new WP_User($user_id);
            $user->set_role('subscriber');
			
			
			$subject = "Access from Acount";
            $body = " Ваш логин " . $_POST['email'] . ". <br>Ваш пароль " . $hash;
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: diarcom.kz Site <info@diarcom.kz>');
        wp_mail($_POST['email'], $subject, $body, $headers);
			
		}
	// vozrastchild2
	
    header('Location: /');
     exit();

    die; // даём понять, что обработчик закончил выполнение
}



add_action( 'init', 'create_subjects_hierarchical_taxonomy2', 0 );

//create a custom taxonomy name it subjects for your posts

function create_subjects_hierarchical_taxonomy2() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

    $labels = array(
        'name' => _x( 'Material', 'taxonomy general name' ),
        'singular_name' => _x( 'Material', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Materials' ),
        'all_items' => __( 'All Materials' ),
        'parent_item' => __( 'Parent Material' ),
        'parent_item_colon' => __( 'Parent Material:' ),
        'edit_item' => __( 'Edit Material' ),
        'update_item' => __( 'Update Material' ),
        'add_new_item' => __( 'Add New Material' ),
        'new_item_name' => __( 'New Material Name' ),
        'menu_name' => __( 'Materials' ),
    );

// Now register the taxonomy
    register_taxonomy('materials',array('books'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'material' ),
    ));

}


function custom_post_type2() {


// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Контент', 'Post Type General Name', 'twentythirteen' ),
        'singular_name'       => _x( 'Контент', 'Post Type Singular Name', 'twentythirteen' ),
        'menu_name'           => __( 'Контент', 'twentythirteen' ),
        'parent_item_colon'   => __( 'родительский Контент', 'twentythirteen' ),
        'all_items'           => __( 'Все Контент', 'twentythirteen' ),
        'view_item'           => __( 'Смотреть Контент', 'twentythirteen' ),
        'add_new_item'        => __( 'Добавить Контент', 'twentythirteen' ),
        'add_new'             => __( 'Добавить новый', 'twentythirteen' ),
        'edit_item'           => __( 'Изменить Контент', 'twentythirteen' ),
        'update_item'         => __( 'Update Контент', 'twentythirteen' ),
        'search_items'        => __( 'Search Контент', 'twentythirteen' ),
        'not_found'           => __( 'Not Found', 'twentythirteen' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'twentythirteen' ),
    );


// Set other options for Custom Post Type


    $args = array(
        'label'               => __( ' Контент', 'twentythirteen' ),
        'description'         => __( 'Контент', 'twentythirteen' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
        'show_in_rest'        => true,


        // This is where we add taxonomies to our CPT
        'taxonomies'          => array( 'materials' ),
    );


    // Registering your Custom Post Type
    register_post_type( 'contents', $args );


}


/* Hook into the 'init' action so that the function
* Containing our post type registration is not
* unnecessarily executed.
*/


add_action( 'init', 'custom_post_type2', 0 );