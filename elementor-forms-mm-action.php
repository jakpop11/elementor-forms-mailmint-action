<?php
/**
 * Plugin Name: Elementor Forms MailMint Action
 * Description: Custom addon which adds new subscriber to MailMint after form submission.
 * Plugin URI:  https://github.com/jakpop11/elementor-forms-mailmint-action
 * Version:     1.2.0
 * Author:      Jackob
 * Author URI:  https://github.com/jakpop11
 * Text Domain: elementor-forms-mm-action
 *
 * Requires Plugins: elementor, mail-mint
 * Elementor tested up to: 3.21.0
 * Elementor Pro tested up to: 3.21.0
 * MailMint tested up to: 1.11.1
 */

 if( ! defined('ABSPATH')){
    exit; // Exit if accessed directly.
 }

 /**
 * Add new subscriber to MailMint.
 *
 * @since 1.0.0
 * @param ElementorPro\Modules\Forms\Registrars\Form_Actions_Registrar $form_actions_registrar
 * @return void
 */
function add_new_mm_form_action($form_actions_registrar){
    include_once(__DIR__ . '/form-actions/mailmint.php');
    $form_actions_registrar->register(new MailMint_Action_After_Submit());
}
add_action('elementor_pro/forms/actions/register', 'add_new_mm_form_action');
