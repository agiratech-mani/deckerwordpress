<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WC_Email_Web_Token_Report' ) ) :
require_once ABSPATH . 'wp-includes/PHPExcel/Classes/PHPExcel.php';
/**
 * Cancelled Order Email.
 *
 * An email sent to the admin when an order is cancelled.
 *
 * @class       WC_Email_Cancelled_Order
 * @version     2.2.7
 * @package     WooCommerce/Classes/Emails
 * @author      WooThemes
 * @extends     WC_Email
 */
class WC_Email_Web_Token_Report extends WC_Email {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id               = 'web_token_report';
		$this->customer_email = true;
		$this->title            = __( 'Your generated licenses are attached', 'woocommerce' );
		$this->description      = __( 'Your generated licenses are attached.', 'woocommerce' );
		$this->heading          = __( 'Your generated licenses are attached', 'woocommerce' );
		$this->subject          = __( '[{site_title}] Your generated licenses are attached', 'woocommerce' );
		$this->template_html    = 'emails/customer-web-tokens-report.php';
		$this->template_plain   = 'emails/plain/customer-web-tokens-report.php';

		// Triggers for this email
		add_action( 'woocommerce_web_token_report_notification', array( $this, 'trigger' ) );

		// Call parent constructor
		parent::__construct();

		// Other settings
		$this->recipient = $this->get_option( 'recipient', get_option( 'admin_email' ) );
	}

	/**
	 * Trigger.
	 *
	 * @param int $order_id
	 */
	public function trigger( $imported_id ) {

		if ( $imported_id ) {
			$tokens = wootokens_get_tokens_import($imported_id);
			//print_r($tokens);
			$ea = new PHPExcel();
			$ea->getProperties()
			   ->setCreator('Taylor Ren')
			   ->setTitle('PHPExcel Demo')
			   ->setLastModifiedBy('Taylor Ren')
			   ->setDescription('A demo to show how to use PHPExcel to manipulate an Excel file')
			   ->setSubject('PHP Excel manipulation')
			   ->setKeywords('excel php office phpexcel lakers')
			   ->setCategory('programming');

			$ews = $ea->getSheet(0);
			$ews->setTitle('Data');
			$ews->setCellValue('A1', 'S.No'); // Sets cell 'a1' to value 'ID 
    		$ews->setCellValue('B1', 'Token');
    		$ews->setCellValue('C1', 'first_name');
    		$ews->setCellValue('D1', 'last_name');
    		$ews->setCellValue('E1', 'email');
    		$ews->setCellValue('F1', 'short_url');
    		$ews->setCellValue('G1', 'long_url');
    		$ews->setCellValue('H1', 'created_date');
    		$ews->setCellValue('I1', 'expiry_date');
    		$ews->setCellValue('J1', 'company');
    		$ews->fromArray($tokens, ' ', 'A2');
    		$header = 'A1:J1';
			$style = array(
			    'font' => array('bold' => true,),
			    'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_CENTER,),
			    );
			$ews->getStyle($header)->applyFromArray($style);

			$writer = PHPExcel_IOFactory::createWriter($ea, 'Excel2007');
			            
			$writer->setIncludeCharts(true);
			$target_dir = get_home_path()."wp-content/uploads/importdownloads/";
			if(!is_dir($target_dir))
			{
				mkdir($target_dir,0777,true);
			}
			$filename = $target_dir."Imported_Data_".(new DateTime())->format('dmY')."_".$imported_id.".xlsx";
			$writer->save($filename);
			$your_pdf_path = $filename;
			$attachments[] = $your_pdf_path;

			$this->object = wootokens_get_import($imported_id);
			$recipient = $this->object->report_to_email;
			$this->recipient = $recipient;
		}
		if ( ! $this->is_enabled() || ! $this->get_recipient() ) {
			return;
		}
		$this->send( $this->get_recipient(), $this->get_subject(), $this->get_content(), $this->get_headers(), $attachments );
	}
	public function get_attachments() {
		//return apply_filters( 'woocommerce_email_attachments', array(), $this->id, $this->object );

		$your_pdf_path = get_home_path()."wp-content/uploads/imports/output.xlsx";
		$attachments[] = $your_pdf_path;
		return $attachments;
	}
	/**
	 * Get content html.
	 *
	 * @access public
	 * @return string
	 */
	public function get_content_html() {
		return wc_get_template_html( $this->template_html, array(
			'token'         => $this->object,
			'email_heading' => $this->get_heading(),
			'sent_to_admin' => true,
			'plain_text'    => false,
			'email'			=> $this
		) );
	}

	/**
	 * Get content plain.
	 *
	 * @return string
	 */
	public function get_content_plain() {
		return wc_get_template_html( $this->template_plain, array(
			'order'         => $this->object,
			'email_heading' => $this->get_heading(),
			'sent_to_admin' => true,
			'plain_text'    => true,
			'email'			=> $this
		) );
	}

	/**
	 * Initialise settings form fields.
	 */
	public function init_form_fields() {
		$this->form_fields = array(
			'enabled' => array(
				'title'         => __( 'Enable/Disable', 'woocommerce' ),
				'type'          => 'checkbox',
				'label'         => __( 'Enable this email notification', 'woocommerce' ),
				'default'       => 'yes'
			),
			'recipient' => array(
				'title'         => __( 'Recipient(s)', 'woocommerce' ),
				'type'          => 'text',
				'description'   => sprintf( __( 'Enter recipients (comma separated) for this email. Defaults to <code>%s</code>.', 'woocommerce' ), esc_attr( get_option('admin_email') ) ),
				'placeholder'   => '',
				'default'       => '',
				'desc_tip'      => true
			),
			'subject' => array(
				'title'         => __( 'Subject', 'woocommerce' ),
				'type'          => 'text',
				'description'   => sprintf( __( 'This controls the email subject line. Leave blank to use the default subject: <code>%s</code>.', 'woocommerce' ), $this->subject ),
				'placeholder'   => '',
				'default'       => '',
				'desc_tip'      => true
			),
			'heading' => array(
				'title'         => __( 'Email Heading', 'woocommerce' ),
				'type'          => 'text',
				'description'   => sprintf( __( 'This controls the main heading contained within the email notification. Leave blank to use the default heading: <code>%s</code>.', 'woocommerce' ), $this->heading ),
				'placeholder'   => '',
				'default'       => '',
				'desc_tip'      => true
			),
			'email_type' => array(
				'title'         => __( 'Email type', 'woocommerce' ),
				'type'          => 'select',
				'description'   => __( 'Choose which format of email to send.', 'woocommerce' ),
				'default'       => 'html',
				'class'         => 'email_type wc-enhanced-select',
				'options'       => $this->get_email_type_options(),
				'desc_tip'      => true
			)
		);
	}
}

endif;

return new WC_Email_Web_Token_Report();
