<?php
add_action('wp_enqueue_scripts', 'parallaxis_enqueue_style' , 20);

function parallaxis_enqueue_style() 
{

$parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style('pink', get_stylesheet_directory_uri() . '/pink.css');
}
?>