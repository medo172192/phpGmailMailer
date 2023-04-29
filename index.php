<?php
require "vendor/packages/google/Gmail.php";
use Vendor\Packages\Google\Gmail;
 
 
Gmail::mailer()
->setUser('example@gmail.com','password')
->subject("Text Gmail Libaray")
->line("")
->action("/home",'action')
->from("example@gmail.com",'username')
->line("Welcome Third Line",[ "background:red", "color:white", ])
->addAttachEx("php gmail mailer",'file.db')
->addImage("path")
->addAddress("email","username")
->addCC("email","username")
->addReply("email","username")
->notify();
