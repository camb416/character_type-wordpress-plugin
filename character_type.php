<?php
/*
  Plugin Name: Character Post Type
  Plugin URI: http://cameronbrowning.com
  Decription: a plugin to hold character data
  Version: 0.1b
  Author: Cameron Browning
  Author URI: http://cameronbrowning.com
  License: GPL2
*/


function character_post() {
	$labels = array(
		'name'               => _x( 'Characters', 'post type general name' ),
		'singular_name'      => _x( 'Character', 'post type singular name' ),
		'add_new'            => _x( 'Add New', 'book' ),
		'add_new_item'       => __( 'Add New Character' ),
		'edit_item'          => __( 'Edit Character' ),
		'new_item'           => __( 'New Character' ),
		'all_items'          => __( 'All Characters' ),
		'view_item'          => __( 'View Character' ),
		'search_items'       => __( 'Search Characters' ),
		'not_found'          => __( 'No characters found' ),
		'not_found_in_trash' => __( 'No characters found in the Trash' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Characters'
	);
	$args = array(
		'labels'        => $labels,
		'description'   => 'Holds our characters and character specific data',
		'public'        => true,
		'menu_position' => 5,
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive'   => true,
	);
	register_post_type( 'Character', $args );
}
add_action( 'init', 'character_post' );

add_action( 'add_meta_boxes', 'character_char_box' );

function character_char_box() {
    add_meta_box(
        'character_char_box',
        __( 'Character', 'myplugin_textdomain' ),
        'character_char_content',
        'character',
        'side',
        'high'
    );
}

function character_char_box_content( $post ) {
	wp_nonce_field( plugin_basename( __FILE__ ), 'character_char_box_content_nonce' );
	echo '<label for="character_char"></label>';
	echo '<input type="text" id="character_char" name="character_char" placeholder="" />';
}
/*
* this is as far as I got...
* the meta post stuff doesn't work yet...
* keep going on this: http://wp.smashingmagazine.com/2012/11/08/complete-guide-custom-post-types/
* under "HANDLING SUBMITTED DATA"...
*/
