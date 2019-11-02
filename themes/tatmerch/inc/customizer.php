<?php
/**
 * tatm Theme Customizer
 *
 * @package tatm
 */

add_action('customize_register', function($wp_customize){

	/**
	 * Updating Settings type
	 * @var string
	 */

	$transport = 'refresh';


	/**
	 * Init customize data
	 */

	$customize_data = array(
		'transport' => $transport,
		'sections' => array(
			'tatm_settings' => array(
				'panel' => '',
				'title' => __( 'Extra Site Settings', 'tatm' ),
				'priority' => 50,
				'settings' => array(
					// Mail General
					'tatm_mail' => array(
						'label' => __( 'E-mail', 'tatm' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Phone
					'tatm_tel' => array(
						'label' => __( 'Phone', 'tatm' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Copyrights
					'tatm_cr' => array(
						'label' => __( 'Copyrights', 'tatm' ),
						'setting_type' => 'option',
						'control_type' => 'text',
					),

					// Checkbox ad
					'tatm_ad_show' => array(
						'label' => __( 'Enable Advertisement and Analytics Code?', 'tatm' ),
						'setting_type' => 'option',
						'control_type' => 'checkbox',
					),

					// Analytics
					'tatm_ac' => array(
						'label' => __( 'Analytics Code', 'tatm' ),
						'default_content' => '',
						'setting_type' => 'option',
						'control_type' => 'textarea',
					),
				),
			),
		),
	);


	/**
	 * Create customize options
	 */

	foreach ($customize_data['sections'] as $section_name => $section) {

		/**
		 * Add settings and controls
		 */

		foreach ($section['settings'] as $setting_name => $setting) {
			$wp_customize->add_setting(
				$setting_name,
				array(
					'type'      => $setting['setting_type'],
					'default'   => $setting['default_content'],
					'transport' => $customize_data['transport'],
				)
			);

			$wp_customize->add_control(
				$setting_name,
				array(
					'section' => $section_name,
					'label' => $setting['label'],
					'type' => $setting['control_type'],
				)
			);
		}

		/**
		 * Add sections
		 */

		$wp_customize->add_section(
			$section_name,
			array(
				'panel' => $section['panel'],
				'title' => $section['title'],
				'priority' => $section['priority'],
			)
		);
	}
});
