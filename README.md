Php Gmail Mailer
you can Send Notification using PHP GMAIL MAIL LIBRARY

#___________________________________________________________________________________________ #___________________________________________________________________________________________

Setup
#___________________________________________________________________________________________ #___________________________________________________________________________________________





<?php
require "vendor/packages/google/Gmail.php";
use Vendor\Packages\Google\Gmail;




#___________________________________________________________________________________________ #___________________________________________________________________________________________

For Example
#___________________________________________________________________________________________ #___________________________________________________________________________________________


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