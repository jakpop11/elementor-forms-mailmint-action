<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * MailMint references
 * 
 * @since 1.2.0
 */
use MRM\Common\MrmCommon;
use Mint\MRM\DataStores\ContactData;

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

		$widget->add_control(
			'mm_form_id',
			[
                'label' => esc_html__( 'Form ID', 'elementor-forms-mm-action' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'placeholder' => 'e.g.: 1',
				'description' => esc_html__( 'Enter the ID of the MailMint form you want connect as a trigger.', 'elementor-forms-mm-action' ),
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
		// Fields IDs
		$email_field = 'email';
		$fname_field = 'first_name';
		$lname_field = 'last_name';
		$phone_field = 'phone';
		$country_field = 'country';

        $settings = $record->get('form_settings');

        // Get submitted form data.
		$raw_fields = $record->get( 'fields' );

        // Normalize form data.
		$fields = [];
		foreach ( $raw_fields as $id => $field ) {
			$fields[ $id ] = $field['value'];
		}

        // Make sure the user entered an email.
		if ( empty( $fields[$email_field] ) ) {
			return;
		}

		// Get list and tag ids as an array or empty array
		$lists = empty($settings['mm_list_id']) ? [] : [ $settings['mm_list_id'] ];
		$tags = empty($settings['mm_tag_id']) ? [] : [ $settings['mm_tag_id'] ];
		// Get form id value or null
		$forms = empty($settings['mm_form_id']) ? null : $settings['mm_form_id'];

		// Create / Update single contact based on MailMint Api: https://developers.getwpfunnels.com/hooks/create_contact_api.html#create-update-single-contact
        $contact = [
            'email'      => $fields[$email_field],	// required
			'first_name' => $fields[$fname_field],	
			'last_name'  => $fields[$lname_field],
            'status'     => MRMCommon::is_double_optin_enable() ? 'pending' : 'subscribed',         // subscribed/pending/unsubscribed
            'lists'      => $lists,       // list ids as an array
            'tags'       => $tags,          // tag ids as an array
			'meta_fields' => [
				'country' => $fields[$country_field],	// use select field with countries list
				'phone_number' => $fields[$phone_field]	// use Tel field
			]
        ];		
		
		// Creates single contact
        $contact_id = mailmint_create_single_contact( $contact );

		// Trigger MailMint form submittion if MailMint form id was set based on other use in MaiMint code
		if (!is_null($forms)) {
			do_action('mailmint_after_form_submit', $forms, $contact_id, new ContactData($contact['email'], null) );
		}
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
			$element['mm_form_id'],
		);

		return $element;

	}

}