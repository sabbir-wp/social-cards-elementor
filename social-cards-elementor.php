
<?php
/*
 * Plugin Name: Social Cards Elementor
 * Description: Adds a Social Cards widget to Elementor.
 * Version: 1.0
 * Author: Your Name
 */
// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Include the widget file
require_once plugin_dir_path(__FILE__) . 'widgets/social-cards-widget.php';

// Register the widget with Elementor
function register_social_cards_widget($widgets_manager) {
    $widgets_manager->register(new \Social_Cards_Widget());
}
add_action('elementor/widgets/register', 'register_social_cards_widget');