# Php Gmail Mailer
# you can Send Notification using PHP GMAIL MAIL LIBRARY

#___________________________________________________________________________________________ #___________________________________________________________________________________________
# Setup
#___________________________________________________________________________________________ #___________________________________________________________________________________________
<br /><br /><br />




require "vendor/packages/google/Gmail.php";<br />
use Vendor\Packages\Google\Gmail;



<br /><br /><br />

#___________________________________________________________________________________________ #___________________________________________________________________________________________
#                                 For Example
#___________________________________________________________________________________________ #___________________________________________________________________________________________
<br /><br /><br />

Gmail::mailer()
<br />->setUser('example@gmail.com','password')
<br />->subject("Text Gmail Libaray")
<br />->line("")
<br />->action("/home",'action')
<br />->from("example@gmail.com",'username')
<br />->line("Welcome Third Line",[ "background:red", "color:white", ])
<br />->addAttachEx("php gmail mailer",'file.db')
<br />->addImage("path")
<br />->addAddress("email","username")
<br />->addCC("email","username")
<br />->addReply("email","username")
<br />->notify();

<br /><br /><br />
