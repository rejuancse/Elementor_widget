<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; # Exit if accessed directly

function canvas_hire_contact_form(){
	$contact_forms = array();
    $contact_forms = get_all_posts('wpcf7_contact_form');
    $contact_forms['Select'] = 'Select'; 
    return $contact_forms;
}

class Widget_Themeum_Hire_Button extends Widget_Base {

	public function get_name() {
		return 'themeum-hire-button';
	}

	public function get_title() {
		return __( 'Themeum Hire Button', 'elementor' );
	}

	public function get_icon() {
		return 'eicon-button';
	}

	public static function get_button_sizes() {
		return [
			'xs' => __( 'Extra Small', 'elementor' ),
			'sm' => __( 'Small', 'elementor' ),
			'md' => __( 'Medium', 'elementor' ),
			'lg' => __( 'Large', 'elementor' ),
			'xl' => __( 'Extra Large', 'elementor' ),
		];
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_hire_button',
			[
				'label' => __( 'Hire Button', 'elementor' ),
			]
		);

		$this->add_control(
			'contact_button',
			[
				'label' 		=> __( 'Contact Form', 'elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> '',
				'options'		=> canvas_hire_contact_form(),
				'prefix_class' 	=> 'elementor-button-',
			]
		);

		$this->add_control(
			'hire_button_name',
			[
				'label' 		=> __( 'Button Name', 'elementor' ),
				'type' 			=> Controls_Manager::TEXT,
				'default' 		=> __( 'Hire me', 'elementor' ),
				'placeholder' 	=> __( 'Hire Me', 'elementor' ),
				'dynamic' 		=> [],
			]
		);

		$this->add_responsive_control(
			'button_align',
			[
				'label' 		=> __( 'Alignment', 'elementor' ),
				'type' 			=> Controls_Manager::CHOOSE,
				'options' 		=> [
					'left'    		=> [
						'title' 	=> __( 'Left', 'elementor' ),
						'icon' 		=> 'fa fa-align-left',
					],
					'center' 		=> [
						'title' 	=> __( 'Center', 'elementor' ),
						'icon' 		=> 'fa fa-align-center',
					],
					'right' 		=> [
						'title' 	=> __( 'Right', 'elementor' ),
						'icon' 		=> 'fa fa-align-right',
					],
					'justify' 		=> [
						'title' 	=> __( 'Justified', 'elementor' ),
						'icon' 		=> 'fa fa-align-justify',
					],
				],
				'prefix_class' 		=> 'elementor%s-align-',
				'default' 			=> '',
			]
		);

		$this->add_control(
			'size',
			[
				'label' 		=> __( 'Size', 'elementor' ),
				'type' 			=> Controls_Manager::SELECT,
				'default' 		=> 'sm',
				'options' 		=> self::get_button_sizes(),
			]
		);

		$this->add_control(
			'view',
			[
				'label' 		=> __( 'View', 'elementor' ),
				'type' 			=> Controls_Manager::HIDDEN,
				'default' 		=> 'traditional',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' 	=> __( 'Button', 'elementor' ),
				'tab' 		=> Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' 		=> 'typography',
				'label' 	=> __( 'Typography', 'elementor' ),
				'scheme' 	=> Scheme_Typography::TYPOGRAPHY_4,
				'selector' 	=> '{{WRAPPER}} .contactform_hire_button .hire-btn, {{WRAPPER}} .elementor-button',
			]
		);

		$this->start_controls_tabs( 'tabs_button_style' );

		$this->start_controls_tab(
			'tab_button_normal',
			[
				'label' 	=> __( 'Normal', 'elementor' ),
			]
		);

		$this->add_control(
			'button_text_color',
			[
				'label' 			=> __( 'Text Color', 'elementor' ),
				'type' 				=> Controls_Manager::COLOR,
				'default' 			=> '',
				'selectors' 		=> [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color',
			[
				'label' 			=> __( 'Background Color', 'elementor' ),
				'type' 				=> Controls_Manager::COLOR,
				'scheme' 			=> [
										'type' 		=> Scheme_Color::get_type(),
										'value' 	=> Scheme_Color::COLOR_4,
									],
				'selectors' 		=> [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .contactform_hire_button .hire-btn' => 'background-color: {{VALUE}};',
				],
			]
		);

		$this->add_control(
			'background_color_b',
			[
				'label' 			=> __( 'Background Color', 'elementor' ),
				'type' 				=> Controls_Manager::COLOR,
				'scheme' 			=> [
										'type' 		=> Scheme_Color::get_type(),
										'value' 	=> Scheme_Color::COLOR_4,
									],
				'selectors' 		=> [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'background-image:linear-gradient(180deg, {{background_color.VALUE}} 0%, {{VALUE}} 100%);',
				],
				'condition' 		=> [
										'button_color_type' => [ 'gradient' ],
									],
			]
		);

		$this->end_controls_tab();

		$this->start_controls_tab(
			'tab_button_hover',
			[
				'label' 		=> __( 'Hover', 'elementor' ),
			]
		);

		$this->add_control(
			'hover_color',
			[
				'label' 		=> __( 'Text Color', 'elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
									'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'color: {{VALUE}};',
								],
			]
		);

		$this->add_control(
			'button_background_hover_color',
			[
				'label' 		=> __( 'Background Color', 'elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'selectors' 	=> [
									'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'background-color: {{VALUE}};',
								],
			]
		);

		$this->add_control(
			'button_hover_border_color',
			[
				'label' 		=> __( 'Border Color', 'elementor' ),
				'type' 			=> Controls_Manager::COLOR,
				'condition' 	=> [
									'border_border!' => '',
								],
				'selectors' 	=> [
									'{{WRAPPER}} a.elementor-button:hover, {{WRAPPER}} .elementor-button:hover' => 'border-color: {{VALUE}};',
								],
			]
		);

		$this->add_control(
			'hover_animation',
			[
				'label' 		=> __( 'Animation', 'elementor' ),
				'type' 			=> Controls_Manager::HOVER_ANIMATION,
			]
		);

		$this->end_controls_tab();

		$this->end_controls_tabs();

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' 			=> 'border',
				'label' 		=> __( 'Border', 'elementor' ),
				'placeholder' 	=> '1px',
				'default' 		=> '1px',
				'selector' 		=> '{{WRAPPER}} .elementor-button',
				'separator' 	=> 'before',
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label' 			=> __( 'Border Radius', 'elementor' ),
				'type' 				=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> [ 'px', '%' ],
				'selectors' 		=> [
										'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
									],
			]
		);

		$this->add_group_control(
			Group_Control_Box_Shadow::get_type(),
			[
				'name' 			=> 'button_box_shadow',
				'selector' 		=> '{{WRAPPER}} .elementor-button',
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label' 			=> __( 'Text Padding', 'elementor' ),
				'type' 				=> Controls_Manager::DIMENSIONS,
				'size_units' 		=> [ 'px', 'em', '%' ],
				'selectors' 		=> [
					'{{WRAPPER}} a.elementor-button, {{WRAPPER}} .elementor-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
				'separator' 		=> 'before',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings();
		$contact_buttons = $settings['contact_button'];
		$btn_name = $settings['hire_button_name'];

		if ( ! empty( $settings['size'] ) ) {
			$this->add_render_attribute( 'button', 'class', 'elementor-size-' . $settings['size'] );
		}

		$this->add_render_attribute( 'button', 'class', 'elementor-button' ); ?>
		
		<div class="contactform_hire_button">	
			<a class="hire-btn btn-contact elementor-button elementor-size-<?php echo $settings['size']; ?>" data-toggle="modal" data-target="#myModal" href="#"><?php echo $btn_name; ?></a>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		        <div class="modal-dialog" role="document">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                    <h4 class="modal-title"><?php _e( 'Hire for your next project','canvas' ); ?></h4>
		                    <?php if ($contact_buttons) { echo do_shortcode( '[contact-form-7 id="'.$contact_buttons.'"]' ); } ?>
		                </div> <!-- modal-header -->
		            </div> <!-- modal-content -->
		        </div> <!-- modal-dialog -->
		    </div> <!-- modal -->
		</div> <!-- contactform_hire_button -->

	<?php }

	protected function _content_template() { ?>
		<#
			var button_name = settings.hire_button_name;	
			button_name = '<a class="hire-btn btn-contact elementor-button elementor-size-' + settings.size + '" data-toggle="modal" data-target="#myModal" href="#">' + button_name + '</a>';	
			var button_html = '<div class="contactform_hire_button">' + button_name + '</div>';
			print( button_html );
		#>
	<?php
	}
	
}

Plugin::instance()->widgets_manager->register_widget_type( new Widget_Themeum_Hire_Button() );
