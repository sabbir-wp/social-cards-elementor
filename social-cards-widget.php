<?php
if (!defined('ABSPATH')) {
    exit;
}

// Elementor widget class
class Social_Cards_Widget extends \Elementor\Widget_Base {

    // Widget name
    public function get_name() {
        return 'social-cards';
    }

    // Widget title
    public function get_title() {
        return __('Social Cards', 'social-cards-elementor');
    }

    // Widget icon
    public function get_icon() {
        return 'eicon-social-icons';
    }

    // Widget categories
    public function get_categories() {
        return ['general'];
    }

    // Register controls
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'social-cards-elementor'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Twitter Link
        $this->add_control(
            'twitter_link',
            [
                'label' => __('Twitter Link', 'social-cards-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => 'https://twitter.com',
                ],
                'placeholder' => 'https://twitter.com',
            ]
        );

        // Instagram Link
        $this->add_control(
            'instagram_link',
            [
                'label' => __('Instagram Link', 'social-cards-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => 'https://instagram.com',
                ],
                'placeholder' => 'https://instagram.com',
            ]
        );

        // Discord Link
        $this->add_control(
            'discord_link',
            [
                'label' => __('Discord Link', 'social-cards-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => 'https://discord.com',
                ],
                'placeholder' => 'https://discord.com',
            ]
        );

        // YouTube Link
        $this->add_control(
            'youtube_link',
            [
                'label' => __('YouTube Link', 'social-cards-elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => 'https://youtube.com',
                ],
                'placeholder' => 'https://youtube.com',
            ]
        );

        // Icon Image (Media Control)
        $this->add_control(
            'icon_image',
            [
                'label' => __('Icon Image', 'social-cards-elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => get_theme_file_uri('image/Group 39017.png'),
                ],
            ]
        );

        $this->end_controls_section();
    }

    // Render the widget output
    protected function render() {
        $settings = $this->get_settings_for_display();

        ob_start();
        ?>
        <div class="social-container">
            <div class="social-card twitter">
                <a href="<?php echo esc_url($settings['twitter_link']['url']); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="Twitter">
                    Twitter
                </a>
            </div>
            <div class="social-card instagram">
                <a href="<?php echo esc_url($settings['instagram_link']['url']); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="Instagram">
                    Instagram
                </a>
            </div>
            <div class="social-card discord">
                <a href="<?php echo esc_url($settings['discord_link']['url']); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="Discord">
                    Discord
                </a>
            </div>
            <div class="social-card youtube">
                <a href="<?php echo esc_url($settings['youtube_link']['url']); ?>" target="_blank" rel="noopener noreferrer">
                    <img src="<?php echo esc_url($settings['icon_image']['url']); ?>" alt="YouTube">
                    YouTube
                </a>
            </div>
        </div>
        <?php
        echo ob_get_clean();
    }
}

// Register the widget (already handled in main plugin file, but included here for completeness)
if (!function_exists('register_social_cards_widget')) {
    function register_social_cards_widget($widgets_manager) {
        $widgets_manager->register(new \Social_Cards_Widget());
    }
    add_action('elementor/widgets/register', 'register_social_cards_widget');
}