<?php
namespace EllipsisSlider;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Repeater;
use Elementor\Utils;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Ellipsis_Slider_Widget extends Widget_Base {

    public function get_name() {
        return 'ellipsis_slider';
    }

    public function get_title() {
        return __( 'Ellipsis Interactive Slider', 'ellipsis-slider' );
    }

    public function get_icon() {
        return 'eicon-slides';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    public function get_style_depends() {
        return [ 'ellipsis-slider-style' ];
    }

    public function get_script_depends() {
        return [ 'ellipsis-slider-script' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_slider_settings',
            [
                'label' => __( 'Slider Settings', 'ellipsis-slider' ),
            ]
        );

        $this->add_control(
            'banner_height',
            [
                'label' => __( 'Banner Height (px)', 'ellipsis-slider' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 600,
                'min' => 320,
                'max' => 1200,
                'step' => 10,
            ]
        );

        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay', 'ellipsis-slider' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'On', 'ellipsis-slider' ),
                'label_off' => __( 'Off', 'ellipsis-slider' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'autoplay_speed',
            [
                'label' => __( 'Autoplay Speed (ms)', 'ellipsis-slider' ),
                'type' => Controls_Manager::NUMBER,
                'default' => 7000,
                'min' => 1000,
                'step' => 500,
                'condition' => [ 'autoplay' => 'yes' ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_slides',
            [
                'label' => __( 'Slides', 'ellipsis-slider' ),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'badge_text',
            [
                'label' => __( 'Badge', 'ellipsis-slider' ),
                'type' => Controls_Manager::TEXT,
                'placeholder' => __( 'Subheading badge', 'ellipsis-slider' ),
                'default' => __( 'Hour of AI', 'ellipsis-slider' ),
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'ellipsis-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Interactive Learning', 'ellipsis-slider' ),
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'subtitle',
            [
                'label' => __( 'Subtitle', 'ellipsis-slider' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Engage students with hands-on AI activities.', 'ellipsis-slider' ),
            ]
        );

        $repeater->add_control(
            'content',
            [
                'label' => __( 'Content', 'ellipsis-slider' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __( 'Explain the activity, feature or benefit for this slide.', 'ellipsis-slider' ),
            ]
        );

        $repeater->add_control(
            'list_items',
            [
                'label' => __( 'Bullet Items (one per line)', 'ellipsis-slider' ),
                'type' => Controls_Manager::TEXTAREA,
                'placeholder' => __( "• Item one\n• Item two\n• Item three", 'ellipsis-slider' ),
            ]
        );

        $repeater->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'ellipsis-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Learn More', 'ellipsis-slider' ),
            ]
        );

        $repeater->add_control(
            'button_url',
            [
                'label' => __( 'Button Link', 'ellipsis-slider' ),
                'type' => Controls_Manager::URL,
                'placeholder' => __( 'https://example.com', 'ellipsis-slider' ),
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => __( 'Image', 'ellipsis-slider' ),
                'type' => Controls_Manager::MEDIA,
                'default' => [ 'url' => Utils::get_placeholder_image_src() ],
            ]
        );

        $repeater->add_control(
            'image_alt',
            [
                'label' => __( 'Image Alt Text', 'ellipsis-slider' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Slide image', 'ellipsis-slider' ),
            ]
        );

        $repeater->add_control(
            'background_color',
            [
                'label' => __( 'Background Color', 'ellipsis-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#0f172a',
            ]
        );

        $this->add_control(
            'slides',
            [
                'label' => __( 'Slide Items', 'ellipsis-slider' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'badge_text' => __( 'Hour of AI', 'ellipsis-slider' ),
                        'title' => __( 'The Hour of AI is here', 'ellipsis-slider' ),
                        'subtitle' => __( 'Launch an interactive, student-ready experience with no prep.', 'ellipsis-slider' ),
                        'content' => __( 'This dynamic widget lets you tell your AI story with flexible slides, visuals, and calls to action.', 'ellipsis-slider' ),
                        'list_items' => __( "Guided stories\nInteractive visuals\nClassroom-ready CTA", 'ellipsis-slider' ),
                        'button_text' => __( 'Explore the activity', 'ellipsis-slider' ),
                        'button_url' => [ 'url' => '#', 'is_external' => true ],
                        'background_color' => '#0f172a',
                    ],
                    [
                        'badge_text' => __( 'Students learn', 'ellipsis-slider' ),
                        'title' => __( 'Build simple neurons', 'ellipsis-slider' ),
                        'subtitle' => __( 'Students connect inputs and outputs in minutes.', 'ellipsis-slider' ),
                        'content' => __( 'Show how inputs are weighted and processed before producing an output.', 'ellipsis-slider' ),
                        'list_items' => __( "Hands-on editing\nImmediate visual feedback\nShareable outcomes", 'ellipsis-slider' ),
                        'button_text' => __( 'See how it works', 'ellipsis-slider' ),
                        'button_url' => [ 'url' => '#', 'is_external' => true ],
                        'background_color' => '#111827',
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );

        $this->end_controls_section();

        // Style Controls
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => __( 'Content Styles', 'ellipsis-slider' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'badge_color',
            [
                'label' => __( 'Badge Text Color', 'ellipsis-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#a855f7',
                'selectors' => [
                    '{{WRAPPER}} .ellipsis-slide__badge' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'heading_color',
            [
                'label' => __( 'Heading Color', 'ellipsis-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .ellipsis-slide__title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'Subtitle Color', 'ellipsis-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#cbd5e1',
                'selectors' => [
                    '{{WRAPPER}} .ellipsis-slide__subtitle' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'text_color',
            [
                'label' => __( 'Body Color', 'ellipsis-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#e2e8f0',
                'selectors' => [
                    '{{WRAPPER}} .ellipsis-slide__content' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .ellipsis-slide__list li' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'accent_color',
            [
                'label' => __( 'Accent Color', 'ellipsis-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#38bdf8',
                'selectors' => [
                    '{{WRAPPER}} .ellipsis-dot.active' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .ellipsis-slide__button' => 'background-color: {{VALUE}}; border-color: {{VALUE}};',
                    '{{WRAPPER}} .ellipsis-slide__button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => __( 'Button Text Color', 'ellipsis-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .ellipsis-slide__button' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'nav_color',
            [
                'label' => __( 'Navigation Dot Color', 'ellipsis-slider' ),
                'type' => Controls_Manager::COLOR,
                'default' => 'rgba(255,255,255,0.4)',
                'selectors' => [
                    '{{WRAPPER}} .ellipsis-dot' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $slides = $settings['slides'];

        if ( empty( $slides ) ) {
            return;
        }

        $height = isset( $settings['banner_height'] ) ? intval( $settings['banner_height'] ) : 600;
        $autoplay = $settings['autoplay'] === 'yes' ? 'true' : 'false';
        $autoplay_speed = isset( $settings['autoplay_speed'] ) ? intval( $settings['autoplay_speed'] ) : 7000;

        wp_enqueue_style( 'ellipsis-slider-style' );
        wp_enqueue_script( 'ellipsis-slider-script' );

        $wrapper_id = 'ellipsis-slider-' . $this->get_id();
        ?>
        <div id="<?php echo esc_attr( $wrapper_id ); ?>" class="ellipsis-slider" data-autoplay="<?php echo esc_attr( $autoplay ); ?>" data-speed="<?php echo esc_attr( $autoplay_speed ); ?>" style="--ellipsis-height: <?php echo esc_attr( $height ); ?>px;">
            <div class="ellipsis-slides">
                <?php foreach ( $slides as $index => $slide ) :
                    $image_url = isset( $slide['image']['url'] ) ? $slide['image']['url'] : Utils::get_placeholder_image_src();
                    $button_url = isset( $slide['button_url']['url'] ) ? $slide['button_url']['url'] : '#';
                    $is_external = ! empty( $slide['button_url']['is_external'] );
                    $nofollow = ! empty( $slide['button_url']['nofollow'] );
                    $target = $is_external ? ' target="_blank"' : '';
                    $rel = $nofollow ? ' rel="nofollow"' : '';
                    $list_items = array_filter( array_map( 'trim', explode( "\n", $slide['list_items'] ?? '' ) ) );
                ?>
                    <div class="ellipsis-slide" data-index="<?php echo esc_attr( $index ); ?>" style="background-color: <?php echo esc_attr( $slide['background_color'] ?: '#0f172a' ); ?>">
                        <div class="ellipsis-slide__inner">
                            <div class="ellipsis-slide__content-wrapper">
                                <?php if ( ! empty( $slide['badge_text'] ) ) : ?>
                                    <span class="ellipsis-slide__badge"><?php echo esc_html( $slide['badge_text'] ); ?></span>
                                <?php endif; ?>

                                <?php if ( ! empty( $slide['title'] ) ) : ?>
                                    <h2 class="ellipsis-slide__title"><?php echo esc_html( $slide['title'] ); ?></h2>
                                <?php endif; ?>

                                <?php if ( ! empty( $slide['subtitle'] ) ) : ?>
                                    <p class="ellipsis-slide__subtitle"><?php echo esc_html( $slide['subtitle'] ); ?></p>
                                <?php endif; ?>

                                <?php if ( ! empty( $slide['content'] ) ) : ?>
                                    <p class="ellipsis-slide__content"><?php echo esc_html( $slide['content'] ); ?></p>
                                <?php endif; ?>

                                <?php if ( ! empty( $list_items ) ) : ?>
                                    <ul class="ellipsis-slide__list">
                                        <?php foreach ( $list_items as $item ) : ?>
                                            <li><?php echo esc_html( $item ); ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                                <?php if ( ! empty( $slide['button_text'] ) && ! empty( $button_url ) ) : ?>
                                    <a class="ellipsis-slide__button" href="<?php echo esc_url( $button_url ); ?>"<?php echo $target; ?><?php echo $rel; ?>>
                                        <?php echo esc_html( $slide['button_text'] ); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="ellipsis-slide__image-wrapper">
                                <div class="ellipsis-slide__image-inner">
                                    <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $slide['image_alt'] ?? '' ); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="ellipsis-dots" role="tablist" aria-label="Slider navigation">
                <?php foreach ( $slides as $index => $slide ) : ?>
                    <button class="ellipsis-dot" data-index="<?php echo esc_attr( $index ); ?>" aria-label="Go to slide <?php echo esc_attr( $index + 1 ); ?>"></button>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
    }
}
