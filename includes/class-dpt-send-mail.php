<?php

class DPT_Send_Mail {

    private $ProductID;
    private $Fullname;
    private $Message;
    private $Mobile;
    private $Email;

    public function SendEmail() {

        wp_mail($to, $subject, $message, $headers, $attachments);
    }

    public function EmailValidation($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return TRUE;
        }
        return FALSE;
    }

    public function MobileValidation($mobile) {
        if (preg_match('/^09[0-9]{9}$/', $mobile)):
            return TRUE;
        endif;
        return FALSE;
    }

    public function SetProductId($p_id) {
        $this->ProductID = $p_id;
    }

    public function GetProductId() {
        return $this->ProductID;
    }

    public function SetFullName($name) {
        $this->Fullname = $name;
    }

    public function GetFullName() {
        return $this->Fullname;
    }

    public function SetMessage($message) {
        $this->ProductID = $message;
    }

    public function GetMessage() {
        return $this->Message;
    }

    public function SetMobile($mobile) {
        $this->ProductID = $mobile;
    }

    public function GetMobile() {
        return $this->Mobile;
    }

    public function SetEmail($email) {
        $this->ProductID = $email;
    }

    public function GetEmail() {
        return $this->Email;
    }

}
