<?php
namespace AlexScherer\WpthemeValerieknill\Components;

use AlexScherer\WpthemeValerieknill\Data\BaseDataSource;

class ContactFormComponent extends BaseViewComponent {

    protected const DATASOURCE_BASECLASS = 'AlexScherer\\WpthemeValerieknill\\Data\\BaseDataSource';
    
    protected BaseDataSource $dataSource;

    public function __construct($data = []) {
        parent::__construct('ContactForm', $data);
        $this->initialize();
    }

    protected function initializeFields() {
        $this->fields = [
        ];
    }

    protected function initialize() {
        if (!empty($_POST)) {
            //die(print_r($_POST, 1));
            if (!$this->formFieldsValid()) {
                return;
            }
            if (function_exists('anr_verify_captcha')) {
                if (anr_verify_captcha()) {
                    $success = $this->trySendContactMail();
                    if ($success) {
                        $this->trySendConfirmationMail();
                    }
                    $this->viewName = 'ContactFormSuccess';
                } else {
                    $this->data['error_message'] = _x('Captcha failed!', 'Captcha failed message', 'wptheme-valerieknill');
                }
            }
        }
    }

    protected function trySendContactMail() {
        $body = $this->getHtmlFromView('ContactMessage', $this->data);
        return $this->sendMail($this->data['recipient'], sprintf(__('New message from "%s"', 'wptheme-valerieknill'), $this->data['from_email']), $this->data['from_email'], $body);
    }

    protected function trySendConfirmationMail() {
        $body = $this->getHtmlFromView('ConfirmationMessage', $this->data);
        return $this->sendMail($this->data['from_email'], __('Thank you for your request', 'wptheme-valerieknill'), false, $body);
    }

    protected function getHtmlFromView($viewName, $arguments) {
        $viewPath = $this->getViewPath('Email/' . $viewName);
        ob_start();

        
        if (file_exists($viewPath)) {
            include $viewPath;
        } else {
            echo "View not found: " . $viewPath;
        }

        $mailContent = ob_get_contents();
        ob_end_clean();
        return $mailContent;
    }

    public function setMailContentType() {
        return 'text/html';
    }

    protected function sendMail($address, $from, $subject, $body) {

        add_filter( 'wp_mail_content_type', [$this, 'setMailContentType'] );
        return wp_mail($address, $subject, $body);

    }

    protected function formFieldsValid() {
        if (empty($_POST['from_name'])) {
            $this->data['error_message'] = _x('Please enter your name.', 'Contact form error name', 'wptheme-valerieknill');
            return false;
        } elseif (empty($_POST['from_email'])) {
            $this->data['error_message'] = _x('Please enter your E-Mail address.', 'Contact form error email', 'wptheme-valerieknill');
            return false;
        } elseif (empty($_POST['subject'])) {
            $this->data['error_message'] = _x('Please enter a subject.', 'Contact form error subject', 'wptheme-valerieknill');
            return false;
        } elseif (empty($_POST['message'])) {
            $this->data['error_message'] = _x('Please enter a message.', 'Contact form error message', 'wptheme-valerieknill');
            return false;
        }
        //$this->debug($_POST);

        $this->data['from_name'] = $_POST['from_name'];
        $this->data['from_email'] = $_POST['from_email'];
        $this->data['subject'] = $_POST['subject'];
        $this->data['message'] = $_POST['message'];
        return true;
    }
    
    public function isValid() {
        //if (empty($this->data['text'])) {
            //return false;
        //}
        return true;
    }

}
