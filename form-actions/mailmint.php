<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor form MailMint action.
 *
 * Custom Elementor form action which adds new subscriber to MailMint after form submission.
 *
 * @since 1.0.0
 */
class MailMint_Action_After_Submit extends \ElementorPro\Modules\Forms\Classes\Action_Base {
    /**
	 * Get action name.
	 *
	 * Retrieve MailMint action name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string
	 */
	public function get_name() {
		return 'mailmint';
	}

    /**
	 * Get action label.
	 *
	 * Retrieve MailMint action label.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string
	 */
	public function get_label() {
		return esc_html__( 'MailMint', 'elementor-forms-mm-action' );
	}

    /**
	 * Register action controls.
	 *
	 * Add input fields to allow the user to customize the action settings.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param \Elementor\Widget_Base $widget
	 */
    public function register_settings_section($widget){
        $widget->start_controls_section(
            'section_mm',
            [
                'label' => esc_html__('MailMint', 'elementor-forms-mm-action'),
                'condition' => [
                    'submit_actions' => $this->get_name(),
                ],
            ]
        );

        $widget->add_control(
            'mm_list_id',
            [
                'label' => esc_html__( 'List ID', 'elementor-forms-mm-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'e.g.: 1',
				'description' => esc_html__( 'Enter the ID of the list you want to add contacts to.', 'elementor-forms-mm-action' ),
            ]
        );

        $widget->add_control(
            'mm_tag_id',
            [
                'label' => esc_html__( 'Tag ID', 'elementor-forms-mm-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'e.g.: 1',
				'description' => esc_html__( 'Enter the ID of the tag you want assign to contacts.', 'elementor-forms-mm-action' ),
            ]
        );

        $widget->end_controls_section();
    }

	/**
	 * Run action.
	 *
	 * Runs the MailMint action after form submission.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param \ElementorPro\Modules\Forms\Classes\Form_Record  $record
	 * @param \ElementorPro\Modules\Forms\Classes\Ajax_Handler $ajax_handler
	 */
    public function run($record, $ajax_handler){
        $settings = $record->get('form_settings');

        // Get submitted form data.
		$raw_fields = $record->get( 'fields' );

        // Normalize form data.
		$fields = [];
		foreach ( $raw_fields as $id => $field ) {
			$fields[ $id ] = $field['value'];
		}

        // Make sure the user entered an email.
		if ( empty( $fields['email'] ) ) {
			return;
		}

		// Get list and tag ids as an array or empty array
		$lists = empty($settings['mm_list_id']) ? [] : [ $settings['mm_list_id'] ];
		$tags = empty($settings['mm_tag_id']) ? [] : [ $settings['mm_tag_id'] ];

		// Create / Update single contact based on MailMint Api: https://developers.getwpfunnels.com/hooks/create_contact_api.html#create-update-single-contact
        $contact = [
            'email'      => $fields['email'],	// required
            'status'     => 'pending',         // subscribed/pending/unsubscribed
            'lists'      => $lists,       // list ids as an array
            'tags'       => $tags,          // tag ids as an array
        ];		
		
		// Creates single contact
        $contact_id = mailmint_create_single_contact( $contact );

    }

    /**
	 * On export.
	 *
	 * Clears MailMint form settings/fields when exporting.
	 *
	 * @since 1.0.0
	 * @access public
	 * @param array $element
	 */
    public function on_export( $element ) {

		unset(
			$element['mm_list_id'],
            $element['mm_tag_id'],
		);

		return $element;

	}

}