<?php
/*
Plugin Name: Post View Counter
Description: Tracks how many times a post has been viewed.
Version: 1.0
Author: Danish Khutel
*/

function pvc_increment_post_views() {
    if (is_single()) {
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'pvc_post_views', true);
        $views = $views ? $views + 1 : 1;
        update_post_meta($post_id, 'pvc_post_views', $views);
    }
}
add_action('wp_head', 'pvc_increment_post_views');

function pvc_display_post_views($content) {
    if (is_single()) {
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'pvc_post_views', true);
        $views = $views ? $views : 0;
        $content .= "<p><strong>Views:</strong> $views</p>";
    }
    return $content;
}
add_filter('the_content', 'pvc_display_post_views');
