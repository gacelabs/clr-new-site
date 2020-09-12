<?php

namespace App\Forms;

use App\Helpers\FieldHelper;
use App\Model\NewsLetterSubscription;
use App\Model\EmailRecipient;

use SilverStripe\Core\Config\Config;
use SilverStripe\Core\Convert;
use SilverStripe\Control\Email\Email;
use SilverStripe\Control\Director;
use SilverStripe\Forms\Form;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\RequiredFields;
use SilverStripe\View\SSViewer;
use SilverStripe\SiteConfig\SiteConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\Dev\Debug;
use SilverStripe\Dev\Backtrace;
use App\Controllers\RecaptchaController;
use SilverStripe\Control\Controller;

class NewsLetter extends Form {

	private static $field_labels = [
		'Email' => 'Email Address'
	];

	private static $auto_response_template = 'AutoResponseEmail';
	private static $auto_response_email_from = '';
	private static $show_link_to_recipients = false;
	private static $config_is_ajax = false;

	private static $required_fields = [
		'Email'
	];

	public $is_ajax = false;
	public $active_page;
	public $success_redirect = false;

	public function FieldList() {
		$labels = Config::inst()->get(get_class($this), 'field_labels');

		$list = [
			FieldHelper::Input('email', 'Email', $labels['Email'])
				->setAttribute('placeholder', $labels['Email'])
				->setAttribute('class', 'form-control')
		];

		$fields = new FieldList($list);

		return $fields;
	}

	function __construct($controller, $name = NewsLetter::class, $is_ajax = null, $success_redirect = false) {

		$this->active_page = $controller;

		if($success_redirect) {
			$this->success_redirect = $success_redirect;
		}

		if (isset($is_ajax)) {
			$this->is_ajax = $is_ajax;
		} else {
			$this->is_ajax = Config::inst()->get(get_class($this), 'config_is_ajax');
		}

		$fields = $this->FieldList();
		$actions = new FieldList(FormAction::create('doSubmit'));
		$requiredFields = new RequiredFields(
			Config::inst()->get(get_class($this), 'required_fields')
		);

		if (SSViewer::hasTemplate([get_class($this)])) {
			$this->setTemplate(get_class($this));
		} elseif (SSViewer::hasTemplate(['Forms\NewsLetterForm'])) {
			$this->setTemplate('Forms\NewsLetterForm');
		}

		parent::__construct($controller, $name, $fields, $actions, $requiredFields);
	}

	function doSubmit(array $raw_data, Form $form) {

		$data = Convert::raw2sql($raw_data);
		$controller = $form->getController();

		$submission = NewsLetterSubscription::create();
		$form->saveInto($submission);
		$submission->write();
		// debug::endshow($submission);
		$recipients = EmailRecipient::get();

		if ($recipients->count()) {
			foreach($recipients as $recipient) {
				if ($recipient->SendEmails) {
					if ($recipient->Name) {
						$data['RecipientName'] = $recipient->Name;
					}
					$email = $this->prepareEmail($data, $submission, $controller);
					$email->setData($data);
					$email->setTo($recipient->Email);
					// debug::endshow($email);
					$email->send();
				}
			}
		}

		/*Send autoresponse...*/
		/*return true if autoresponder is enabled*/
		$clientMail = $this->prepareAutoResponse($controller, $submission);
		$clientMail->send();

		return $this->onSuccess($raw_data, $form, $controller);
	}

	public function prepareEmail(&$data, $submission, $controller) {

		$subject = $controller->RecipientEmailSubject ?: 'New Enquiry';
		$from    = $controller->RecipientEmailFrom ?: $submission->Email;

		$email = new Email($from, '', $subject);

		$data['Submission'] = $submission;
		if (Config::inst()->get(get_class($this), 'show_link_to_recipients')) {
			$data['FormLink'] = Director::absoluteBaseURL() . trim($controller->Link(), '/');
		}

		$email->setHTMLTemplate(Config::inst()->get(get_class($this), 'auto_response_template'));
		return $email;
	}

	public function prepareAutoResponse($controller, $submission) {

		$patterns = ['/\[Email]/'];
		$replacements = [$submission->Fullname, $submission->Email];

		$body = preg_replace($patterns, $replacements, $controller->AutoresponderEmailContent);

		$subject = $controller->AutoresponderEmailSubject;

		$subject = $subject ?: 'Thank you for subscribing.';
		$clientMail = new Email();

		// $clientMail->setFrom($controller->AutoresponderEmailAddress);
		$clientMail->setFrom(FROM_EMAIL);
		$clientMail->setTo($submission->Email);
		$clientMail->setSubject($subject);
		$clientMail->setBody($body ? $body : 'Thank you for subscribing.');

		return $clientMail;
	}

	public function onSuccess($raw_data = null, $form = null, $controller = null) {

		if ($this->is_ajax) {
			return json_encode( array('status' => 'success') );
		}
		return $controller->redirect('/thank-you');
	}

}