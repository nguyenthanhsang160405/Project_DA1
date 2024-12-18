<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
    
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

    class MaillerUser{
        public $email;
        public function __construct(){
            $this->email = new PHPMailer(true);
        }
        public function GetIfm($content){
            try {
                //Server settings
                $this->email->SMTPDebug = 0;// Enable verbose debug output
                $this->email->isSMTP();// gửi mail SMTP
                $this->email->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                $this->email->SMTPAuth = true;// Enable SMTP authentication
                $this->email->Username = 'sangntps40437@gmail.com';// SMTP username
                $this->email->Password = 'mjktoznllgdybugp'; // SMTP password
                $this->email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $this->email->Port = 587; // TCP port to connect to
             
                //Recipients
                $this->email->setFrom('sangntps40437@gmail.com', 'Nguyễn Thanh Sang');
                $this->email->addAddress('admin@nguyenthanhsang.store', 'Admin'); // Add a recipient
                // $this->email->addAddress('admin@nguyenthanhsang.store'); // Name is optional
                // $this->email->addReplyTo('sangntps40437@gmail.com', 'Sang');
                // $this->email->addCC(''); gửi cho nhiều người , và người khác sẽ thấy email những người cũng được gửi
                // $this->email->addBCC(''); gửi cho nhiều người , và người khác sẽ không thấy email những người cũng được gửi
             
                // Attachments
                // for($i = 0 ; $i < count($arr_order_detail) ; $i++){
                //     $this->email->addEmbeddedImage('../public/img/'.$arr_order_detail[$i]['anh_sanpham'],$arr_order_detail[$i]['anh_sanpham']); // Add attachments file thêm
                // }
                // $this->email->addAttachment('target_file'); // Add attachments file thêm
                // $this->email->addAttachment('target_file', 'new_name_file'); // Optional name file thêm và đổi tên file
             
                // Content
                $this->email->isHTML(true);   // Set email format to HTML
                $this->email->CharSet = 'UTF-8';
                $this->email->Subject = 'Phản hồi từ người dùng';
                $this->email->Body = $content;
                $this->email->AltBody = 'Chân thành cảm ơn!';
                $this->email->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$this->email->ErrorInfo}";
            }
        }
        public function Replace($email,$name,$content){
            try {
                //Server settings
                $this->email->SMTPDebug = 0;// Enable verbose debug output
                $this->email->isSMTP();// gửi mail SMTP
                $this->email->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                $this->email->SMTPAuth = true;// Enable SMTP authentication
                $this->email->Username = 'sangntps40437@gmail.com';// SMTP username
                $this->email->Password = 'mjktoznllgdybugp'; // SMTP password
                $this->email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $this->email->Port = 587; // TCP port to connect to
             
                //Recipients
                $this->email->setFrom('sangntps40437@gmail.com', 'Nguyễn Thanh Sang');
                $this->email->addAddress($email, $name); // Add a recipient
                // $this->email->addAddress($email); // Name is optional
                $this->email->addReplyTo('sangntps40437@gmail.com', 'Sang');
                // $this->email->addCC(''); gửi cho nhiều người , và người khác sẽ thấy email những người cũng được gửi
                // $this->email->addBCC(''); gửi cho nhiều người , và người khác sẽ không thấy email những người cũng được gửi
             
                // Attachments
                // for($i = 0 ; $i < count($arr_order_detail) ; $i++){
                //     $this->email->addEmbeddedImage('../public/img/'.$arr_order_detail[$i]['anh_sanpham'],$arr_order_detail[$i]['anh_sanpham']); // Add attachments file thêm
                // }
                // $this->email->addAttachment('target_file'); // Add attachments file thêm
                // $this->email->addAttachment('target_file', 'new_name_file'); // Optional name file thêm và đổi tên file
             
                // Content
                $this->email->isHTML(true);   // Set email format to HTML
                $this->email->CharSet = 'UTF-8';
                $this->email->Subject = "Phản hồi";
                $this->email->Body = 'Chúng tôi đã nhận được phải hồi về '.$content.' của bạn <br> Cảm ơn đã đã góp ý <br> Chúng tôi sẽ trả lời sớm nhất! <br> Trân trọng';
                $this->email->AltBody = 'Đơn hàng sẽ giao đến bạn trong thời gian sớm nhất. Chân thành cảm ơn!';
                $this->email->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$this->email->ErrorInfo}";
            }
        }
        public function SendOTPUser($email,$content){
            try {
                //Server settings
                $this->email->SMTPDebug = 0;// Enable verbose debug output
                $this->email->isSMTP();// gửi mail SMTP
                $this->email->Host = 'smtp.gmail.com';// Set the SMTP server to send through
                $this->email->SMTPAuth = true;// Enable SMTP authentication
                $this->email->Username = 'sangntps40437@gmail.com';// SMTP username
                $this->email->Password = 'mjktoznllgdybugp'; // SMTP password
                $this->email->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $this->email->Port = 587; // TCP port to connect to
             
                //Recipients
                $this->email->setFrom('sangntps40437@gmail.com', 'Nguyễn Thanh Sang');
                $this->email->addAddress($email); // Add a recipient
                // $this->email->addAddress($email); // Name is optional
                $this->email->addReplyTo('sangntps40437@gmail.com', 'Sang');
                // $this->email->addCC(''); gửi cho nhiều người , và người khác sẽ thấy email những người cũng được gửi
                // $this->email->addBCC(''); gửi cho nhiều người , và người khác sẽ không thấy email những người cũng được gửi
             
                // Attachments
                // for($i = 0 ; $i < count($arr_order_detail) ; $i++){
                //     $this->email->addEmbeddedImage('../public/img/'.$arr_order_detail[$i]['anh_sanpham'],$arr_order_detail[$i]['anh_sanpham']); // Add attachments file thêm
                // }
                // $this->email->addAttachment('target_file'); // Add attachments file thêm
                // $this->email->addAttachment('target_file', 'new_name_file'); // Optional name file thêm và đổi tên file
             
                // Content
                $this->email->isHTML(true);   // Set email format to HTML
                $this->email->CharSet = 'UTF-8';
                $this->email->Subject = "Mã khôi phục";
                $this->email->Body = '<h3>Mã khôi phục của bạn là: </h3><p>'.$content.'</p>';
                // $this->email->AltBody = 'Đơn hàng sẽ giao đến bạn trong thời gian sớm nhất. Chân thành cảm ơn!';
                $this->email->send();
                // echo 'Message has been sent';
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$this->email->ErrorInfo}";
            }
        }
    }
?>