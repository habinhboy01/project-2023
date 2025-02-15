<?php

/* Disable WordPress Admin Bar for all users */
add_filter( 'show_admin_bar', '__return_false' );

// Thêm ảnh đại diện
add_theme_support('post-thumbnails');


function my_custom_wc_theme_support()
{

    add_theme_support('woocommerce');

    add_theme_support('wc-product-gallery-lightbox');

    add_theme_support('wc-product-gallery-slider');
    // add_theme_support('wc-product-gallery-zoom');
}
add_action('after_setup_theme', 'my_custom_wc_theme_support');


function m_register_menu()
{
	register_nav_menus(
		array(
			'menu-1' => __('Menu Contact'),
			'menu-2' => __('Menu PC'),
			'menu-3' => __('Menu Category'),
			'menu-4' => __('Menu Tags'),
			'menu-5' => __('Menu mobile'),
		)
	);
}
add_action('init', 'm_register_menu');

function prefix_nav_description( $item_output, $item, $depth, $args ) {
    if ( !empty( $item->description ) ) {
        $item_output = str_replace( $args->link_after . '</a>', '<span class="text-technology2">' . $item->description . '</span>' . $args->link_after . '</a>', $item_output );
    }
 
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'prefix_nav_description', 10, 4 );


// add theme option menu bar admin 
if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}



//  logo

function m_logo_web($wp_customize)
{
	$wp_customize->add_section(
		'logo',
		array(
			'title' => 'Logo',
			'description' => 'logo',
		)
	);

	$wp_customize->add_setting('Logo', array('default' => ''));
	$wp_customize->add_control(
		new WP_Customize_Image_Control($wp_customize, 'Logo', array(
			'label' => 'Logo',
			'section' => 'logo',
			'settings' => 'Logo'
		))
	);
}
add_action('customize_register', 'm_logo_web');


// thanh tìm kiếm ở sidebar

function search_form( $form ) {
	$form = '<form class="widget-search" role="search" method="get" action="' . home_url( '/' ) . '" > <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search...." /><button class="btn-search" type="submit" href="javascript:void(0);"><i class="fa fa-search"></i></button></form>';
	return $form;
	}
	add_shortcode( 'wp_search_form', 'search_form' );


// thanh tiem kiếm công việc

add_shortcode( 'csw_search_form', 'csw_search_form_fc' );
function csw_search_form_fc(){
    ?>
    <form method="get" class="form-career" action="<?php echo get_home_url() ?>">
    <input type="search" class="input-career" placeholder="Search" value="" name="s">

    <!-- nghề nghiệp -->

	<select class="input-career2" name="career">
		<option value="">Career</option>

		<?php
		   $args = array(			   		
			    'type' => 'recruitment',
			    'taxonomy' => 'career',
			    'parent' => 0,
			    'hide_empty' => false,
		    );

		   $cates = get_categories($args);

		   foreach($cates as $cate) {
		?>
		    <option value="<?php echo $cate->slug; ?>">
		        <?php echo $cate->name; ?>
		     </option>
		<?php
		   }
		?>
	</select>

	<!-- nơi làm việc -->

	<select class="input-career2" name="location">
		<option value="">Areas</option>

		<?php
		   $args = array(			   		
			    'type' => 'recruitment',
			    'taxonomy' => 'location',
			    'parent' => 0,
			    'hide_empty' => false,
		    );

		   $cates = get_categories($args);

		   foreach($cates as $cate) {
		?>
		    <option value="<?php echo $cate->slug; ?>">
		        <?php echo $cate->name; ?>
		     </option>
		<?php
		   }
		?>
	</select>
    <button type="submit" class="csw-search-submit">
        <i class="fas fa-search"></i>
    </button><br>
    </form>
    <?php
}



// filter post type Datatyk

function hk_posts_taxonomy_filter() {
	global $typenow;
	if ($typenow == 'recruitment') { // post type slug
		$taxonomy_names = array('location', 'career'); // taxonomy slug
		foreach ($taxonomy_names as $single_taxonomy) {
			$current_taxonomy = isset( $_GET[$single_taxonomy] ) ? $_GET[$single_taxonomy] : '';
			$taxonomy_object = get_taxonomy( $single_taxonomy );
			$taxonomy_name = strtolower( $taxonomy_object->labels->name );
			$taxonomy_terms = get_terms( $single_taxonomy );
			if (count($taxonomy_terms) > 0) {
				echo "<select name='$single_taxonomy' id='$single_taxonomy' class='postform'>";
				echo "<option value=''>All $taxonomy_name</option>";
				foreach ($taxonomy_terms as $single_term) {
					echo '<option value='. $single_term->slug, $current_taxonomy == $single_term->slug ? ' selected="selected"' : '','>' . $single_term->name .' (' . $single_term->count .')</option>'; 
				}
				echo "</select>";
			}
		}
	}
}
add_action( 'restrict_manage_posts', 'hk_posts_taxonomy_filter' );