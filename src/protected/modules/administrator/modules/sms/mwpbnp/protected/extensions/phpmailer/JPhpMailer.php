<?php

/**
 * JPhpMailer class file.
 *
 * @version alpha 2 (2010-6-3 16:42)
 * @author jerry2801 <jerry2801@gmail.com>
 * @required PHPMailer v5.1
 *
 * A typical usage of JPhpMailer is as follows:
 * <pre>
 * Yii::import('ext.phpmailer.JPhpMailer');
 * $mail=new JPhpMailer;
 * $mail->IsSMTP();
 * $mail->Host='smpt.163.com';
 * $mail->SMTPAuth=true;
 * $mail->Username='yourname@yourdomain';
 * $mail->Password='yourpassword';
 * $mail->SetFrom('name@yourdomain.com','First Last');
 * $mail->Subject='PHPMailer Test Subject via smtp, basic with authentication';
 * $mail->AltBody='To view the message, please use an HTML compatible email viewer!';
 * $mail->MsgHTML('<h1>JUST A TEST!</h1>');
 * $mail->AddAddress('whoto@otherdomain.com','John Doe');
 * $mail->Send();
 * </pre>
 */
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'class.phpmailer.php';

class JPhpMailer extends PHPMailer {

    public function sendEmail($to, $subject, $message, $cc = '', $action = '') {
        //$this->IsSMTP();
        $this->IsHTML();

        $this->Host = 'smtpout.secureserver.net';
        //$this->SMTPAuth = true;
        $this->Port = '80';
        //$this->SMTPSecure = 'ssl';
        $this->Username = 'info@mwpbnp.com';
        $this->Password = 'Zee123789*';
        $email_from_name = 'zeeshan@mwpbnp.com';
  
        /*         * ************************************************** */
        $this->AddAddress($to);
        $this->SetFrom($email_from_name, 'MWPBNP');
        $this->Subject = $subject;
        $this->MsgHTML($message);
       if ($this->Send())
            return true;
    }

}
