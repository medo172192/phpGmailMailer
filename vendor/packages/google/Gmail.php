<?php

namespace Vendor\Packages\Google;
/**
 * ___________________V1_______________________________
 *              Setup Gmail Files
 * ____________________________________________________
 */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';
require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
 

class Gmail{

    public static $_instance =NULL;
    public static $_main;
    public static $addEmailOptionsVar = Null;
    public static $TargetEmail;
    public static $line =[];
    public static $Styles =[];
    /**
     * ___________________V1_______________________________
     *              SETUP PHP MAILER
     * @return Self
     * @return PHPMailer\PHPMailer\PHPMailer
     * ____________________________________________________
     */

    public  static function mailer()
    {
       
        if (self::$_instance == NULL){
            self::$_instance = new Self;
        }
        self::$_main = new PHPMailer(true);
        self::$_main->isSMTP();
        self::$_main->Mailer = "smtp";
        self::$_main->SMTPDebug  = 1;  
        self::$_main->SMTPAuth   = TRUE;
        self::$_main->SMTPSecure = "tls";
        self::$_main->Port       = 587;
        self::$_main->Host       = "smtp.gmail.com";
        return self::$_instance;
    }


    /**
     * ___________________V1_______________________________
     *          SELECT USER INFORMATIONS
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public static function SetUser(string $username , string $password)
    {
        self::$TargetEmail = $username ;
        self::$_main->Username   = $username ;
        self::$_main->Password   = $password;
        self::$_main->IsHTML(true);
        if (!function_exists('addEmailOptions')){
            self::$_main->AddAddress(self::$TargetEmail, "PHP GMAIL");
            self::$_main->SetFrom(self::$TargetEmail, "PHP GMAIL");
            self::$_main->AddReplyTo(self::$TargetEmail, "PHP GMAIL");
            self::$_main->AddCC(self::$TargetEmail, "PHP GMAIL");
        }elseif(!function_exists('addUser')){
            self::$_main->AddAddress(self::$TargetEmail, "PHP GMAIL");
        }elseif(!function_exists('addReply')){
            self::$_main->AddReplyTo(self::$TargetEmail, "PHP GMAIL");
        }elseif(!function_exists('from')){
            self::$_main->SetFrom(self::$TargetEmail, "PHP GMAIL");
        }elseif(!function_exists('addCc')){
            self::$_main->AddCC(self::$TargetEmail, "PHP GMAIL");
        }
        return self::$_instance;
    }


    
    /**
     * ___________________V1_______________________________
     *              Add a recipient
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public static function addUser(string $email , string $name)
    {
        self::$_main->AddAddress($email, $name);
        return self::$_instance;
    }

     /**
     * ___________________V1_______________________________
     *             Set sender of the mail
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public function from(string $TargetEmail , string $name)
    {
        self::$_main->SetFrom($TargetEmail, $name);
        return self::$_instance;
    }

    /**
     * ___________________V1_______________________________
     *             Set sender Reply Content
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public function addReply(string $TargetEmail , string $name)
    {
        self::$_main->AddReplyTo($TargetEmail, $name);
        return self::$_instance;
    }


    /**
     * ___________________V1_______________________________
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public static function addCC(string $TargetEmail , string $name)
    {
        self::$_main->AddCC($TargetEmail, $name);
        return self::$_instance;
    }



    /**
     * ___________________V1_______________________________
     * You can Add Email Option For Example
     * Add Adrress | change Email Target 
     * Select Reply Email  
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public function setupOptions(
        array $addAddress,
        array $setFrom,
        array $addReplyTo,
        array $addCC
    )
    {
       
        if (count($addAddress) == 2){
            self::$_main->AddAddress($addAddress[0], $addAddress[1]);
        }else{
              throw new Exception("The Address is Array contains 2 params");
        }
        if (count($setFrom) == 2){
            self::$_main->SetFrom($setFrom[0], $setFrom[1]);
        }else{
              throw new Exception("The Set Form is Array contains 2 params");
        }
        if (count($addReplyTo) == 2){
            self::$_main->AddReplyTo($addReplyTo[0], "reply-to-name");
        }else{
              throw new Exception("The Add Replay To is Array contains 2 params");
        }
        if (count($addCC) == 2){
            self::$_main->AddCC("ppick177@gmail.com", "cc-recipient-name");
        }else{
              throw new Exception("The AddCC is Array contains 2 params");
        }
        return self::$_instance;
    }

    /**
     * ___________________V1_______________________________
     *           Send Subject Content
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */
    
    public static function subject(string $subject)
    {
        self::$_main->Subject = $subject;
        return self::$_instance;
    }

    /**
     * ___________________V1_______________________________
     *      Attach File With Select File Extension 
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public function addAttachEx( $content,string $filenameAndExtension)
    {
        self::$_main->addStringAttachment($content, $filenameAndExtension); 
        return self::$_instance;
    }

    /**
     * ___________________V1_______________________________
     *           Send Body HTML Content
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */
     
    public static function body($body)
    {
        self::$_main->Body = $body; 
        return self::$_instance;
    }


     /**
     * ___________________V1_______________________________
     *       Add New Line To Body HTML Content
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */
    public static function line($line)
    {
        array_push(self::$line, $line);
        $Lines  =implode('<br>',self::$line);
        self::$_main->Body = $Lines  ;
        return self::$_instance;
    }

    public function action(string $url , $name='action' , $Styles=[])
    {
        foreach ($Styles as $key => $value) {
            array_push(self::$Styles, $value);
        }
        $Final_Styles  =implode(';',self::$Styles);
        self::line("<a href='".$url."'><button class='action' style='$Final_Styles'>action</button></a>");
        return self::$_instance;
    }
    


    /**
     * ___________________V1_______________________________
     *           Send attach file image
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public static function addImage(string $image )
    {
        self::$_main->addEmbeddedImage($image, 'image_cid');
        return self::$_instance;
    }


    /**
     * ___________________V1_______________________________
     *              Clear Address 
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public static function clearAddress()
    {
        if (self::$_instance == NULL){
            self::$_instance = new Self;
        }
        self::$_main->clearAddresses();
        return self::$_instance;
    }

     /**
     * ___________________V1_______________________________
     *              Clear Stmp Mailer 
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */
    public function stmpClose()
    {
        if (self::$_instance == NULL){
            self::$_instance = new Self;
        }
        self::$_main->smtpClose();
        return self::$_instance;
    }
     /**
     * ___________________V1_______________________________
     *              You Can Attach File
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */

    public static function attach(string $path , string $filename)
    {
        self::$_main->addAttachment($path,$filename);
        return self::$_instance;
    }

      /**
     * ___________________V1_______________________________
     *              Send Html Content
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */
    public function html($content)
    {
        self::$_main->MsgHTML($content); 
        return self::$_instance;
    }


  /**
     * ___________________V1_______________________________
     *              Send Html File Content
     * @return Self_Instance
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */
    public function htmlFileContent($content,$path=__DIR__)
    {
        self::$_main->MsgHTML(file_get_contents($content), $path); 
        return self::$_instance;
    }



    /**
     * ___________________V1_______________________________
     *           Save & Send All Details
     * @return Self
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */
    public static function notify($message=true)
    {
        if(!self::$_main->Send()) {
            echo "Error while sending Email.";
            var_dump(self::$_main);
          } else {
            if ($message == true){
                echo "Email sent successfully";
            }
        }
        self::$_main->smtpClose();
    }

      /**
     * ___________________V1_______________________________
     *           Save & Send All Details
     * @return Self
     * @return PHPMailer\PHPMailer\PHPMailer
     * @return PHPMailer\PHPMailer\Exception
     * ____________________________________________________
     */
    public static function send($message=true)
    {
        if(!self::$_main->Send()) {
            echo "Error while sending Email.";
            var_dump(self::$_main);
          } else {
            if ($message == true){
                echo "Email sent successfully";
            }
        }
    }




}



 
 



 
