<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

use Elementor\Controls_Manager;

class Elementor_custom_call_to_action extends \Elementor\Widget_Base {

	public function get_name() {
		return 'custom_call_to_action';
	}

	public function get_title() {
		return esc_html__( 'Custom Call To Action', 'elementor-addon' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'basic' ];
	}

	protected function register_controls() {

		$this->start_controls_section(
			'item',
			array(
				'label' => esc_html__( 'ITEM', 'leganic-core' ),
			)
		);

		$this->add_control(
			'image',
			[
				'label' => esc_html__( 'Choose Image', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'thumbnail', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `thumbnail_size` and `thumbnail_custom_dimension`.
				'exclude' => [ 'custom' ],
				'include' => [],
				'default' => 'large',
			]
		);

		$this->add_control(
			'image_link',
			[
				'label' => esc_html__( 'Image Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'widget_title',
			[
				'label' => esc_html__( 'Title', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Default title', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your title here', 'textdomain' ),
			]
		);
		$this->add_control(
			'title_link',
			[
				'label' => esc_html__( 'Title Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->add_control(
			'item_description',
			[
				'label' => esc_html__( 'Description', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => esc_html__( 'Default description', 'textdomain' ),
				'placeholder' => esc_html__( 'Type your description here', 'textdomain' ),
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-arrow-right',
					'library' => 'fa-solid',
				],
				'recommended' => [
					'fa-solid' => [
						'circle',
						'dot-circle',
						'square-full',
					],
					'fa-regular' => [
						'circle',
						'dot-circle',
						'square-full',
					],
				],
			]
		);
		$this->add_control(
			'icon_link',
			[
				'label' => esc_html__( 'Icon Link', 'textdomain' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'textdomain' ),
				'options' => [ 'url', 'is_external', 'nofollow' ],
				'default' => [
					'url' => '',
					'is_external' => true,
					'nofollow' => true,
					// 'custom_attributes' => '',
				],
				'label_block' => true,
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'image_style_section',
			array(
				'label' => __( 'Image', 'laundry-helper' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'opacity_hover',
			[
				'label' => esc_html__( 'Opacity', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 1,
						'min' => 0.10,
						'step' => 0.01,
					],
				],
				'selectors' => [
					'{{WRAPPER}}:hover .ccta-thumb img' => 'opacity: {{SIZE}};',
				],
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Css_Filter::get_type(),
			[
				'name' => 'css_filters_hover',
				'selector' => '{{WRAPPER}}:hover .ccta-thumb img',
			]
		);
		$this->add_control(
			'background_hover_transition',
			[
				'label' => esc_html__( 'Transition Duration', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'max' => 3,
						'step' => 0.1,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ccta-thumb img' => 'transition-duration: {{SIZE}}s',
				],
			]
		);
		$this->add_control(
			'hover_animation',
			[
				'label' => esc_html__( 'Hover Animation', 'elementor' ),
				'type' => Controls_Manager::HOVER_ANIMATION,
			]
		);
		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'types' => [ 'classic', 'gradient' ],
				'selector' => '{{WRAPPER}} .ccta-thumb a::before',
			]
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'title_style_section',
			array(
				'label' => __( 'Title', 'laundry-helper' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'title_color',
			array(
				'label'     => __( 'Title Color', 'laundry-helper' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ccta-content-flex .ccta-content-title' => 'color: {{VALUE}}!important',

				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'title_typography',
				'label'    => __( 'Typography', 'laundry-core' ),
				//'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ccta-content-flex .ccta-content-title',
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'description_style_section',
			array(
				'label' => __( 'Description Style', 'laundry-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_control(
			'description_color',
			array(
				'label'     => __( 'Description Color', 'laundry-helper' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ccta-content-flex .ccta-description' => 'color: {{VALUE}}!important',

				),
			)
		);
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			array(
				'name'     => 'description_typography',
				'label'    => __( 'Description Typography', 'laundry-core' ),
				//'scheme'   => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_2,
				'selector' => '{{WRAPPER}} .ccta-content-flex .ccta-description',
			)
		);
		$this->end_controls_section();
		$this->start_controls_section(
			'icon_style_section',
			array(
				'label' => __( 'Icon Style', 'laundry-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			)
		);
		$this->add_responsive_control(
			'size',
			[
				'label' => esc_html__( 'Size', 'elementor' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem' ],
				'range' => [
					'px' => [
						'min' => 6,
						'max' => 300,
					],
				],
				'selectors' => [
					'{{WRAPPER}} .ccta-content-right i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .ccta-content-right svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
				'separator' => 'before',
			]
		);
		$this->add_control(
			'icon_color',
			array(
				'label'     => __( 'Icon Color', 'laundry-helper' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ccta-content-right i' => 'color: {{VALUE}}!important',
					'{{WRAPPER}} .ccta-content-right svg' => 'fill: {{VALUE}}!important',

				),
			)
		);
		$this->add_control(
			'ion_bg_color',
			array(
				'label'     => __( 'Icon Background Color', 'laundry-helper' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'selectors' => array(
					'{{WRAPPER}} .ccta-content-right' => 'background-color: {{VALUE}}!important',

				),
			)
		);
		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( ! empty( $settings['image_link']['url'] ) ) {
			$this->add_link_attributes( 'image_link', $settings['image_link'] );
		}
		if ( ! empty( $settings['title_link']['url'] ) ) {
			$this->add_link_attributes( 'title_link', $settings['title_link'] );
		}
		if ( ! empty( $settings['icon_link']['url'] ) ) {
			$this->add_link_attributes( 'icon_link', $settings['icon_link'] );
		}

		$element_class = 'container';
		if ( ! empty( $settings['hover_animation'] ) ) {
			$element_class .= ' elementor-animation-' . $settings['hover_animation'];
		}
		$this->add_render_attribute( 'wrapper', 'class', $element_class );

		// render_icon() imprime el icono: aquí solo se comprueba que haya uno elegido.
		$has_icon = ! empty( $settings['icon']['value'] );
		?>
		<div class="ccta-wrap">
		<div class="ccta-thumb" <?php $this->print_render_attribute_string( 'wrapper' ); ?>>
		<?php if ( ! empty( $settings['image']['url'] ) ) { ?>
		<a <?php $this->print_render_attribute_string( 'image_link' ); ?>>
		<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings, 'thumbnail', 'image' ); // phpcs:ignore WordPress.Security.EscapeOutput ?> </a><?php } ?>
		</div>
		<div class="ccta-content">
		<div class="ccta-content-flex">
		<?php if ( ! empty( $settings['widget_title'] ) ) { ?>
		<a <?php $this->print_render_attribute_string( 'title_link' ); ?>>
		<h4 class="ccta-content-title"><?php echo wp_kses_post( $settings['widget_title'] ); ?></h4></a><?php } ?>
		<?php if ( ! empty( $settings['item_description'] ) ) { ?>
		<div class="ccta-description"><?php echo wp_kses_post( $settings['item_description'] ); ?></div><?php } ?> </div>
		<?php if ( $has_icon ) { ?>
		<div class="ccta-content-right">
		<a <?php $this->print_render_attribute_string( 'icon_link' ); ?>><?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?></a>
		</div><?php } ?>
		</div>
		</div>
		<?php
	}
}
