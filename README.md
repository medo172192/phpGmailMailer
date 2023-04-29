
# Php Gmail Mailer


## Gmail Notification

 - You Can Send Notifications to Gmail 
 - Depening On Php Mailer Library
 

## Installation

Install Project With Php

```bash
  
download https://github.com/medo172192/phpGmailMailer.git
 
require "vendor/packages/google/Gmail.php";
use Vendor\Packages\Google\Gmail;
```
    
## Roadmap

- download .git files

- create php index file

- add installation require Path

- Write Gmail Mailer Syntax


## Usage/Example

```javascript
require "vendor/packages/google/Gmail.php";
use Vendor\Packages\Google\Gmail;

Gmail::mailer()
      ->setUser('example@gmail.com','password')
      ->subject("Text Gmail Libaray")
      ->line("")
      ->action("/home",'action')
      ->from("example@gmail.com",'username')
      ->line("Welcome Third Line",[ 
        "background:red", "color:white"
        ])
      ->addAttachEx("php gmail mailer",'file.db')
      ->addImage("path")
      ->addAddress("email","username")
      ->addCC("email","username")
      ->addReply("email","username")
      ->notify();




```



## Functions

```javascript
 
 mailer() 
 SetUser()
 addAddress()
 from()
 addReply()
 addCC()
 subject()
 addAttachEx()
 body()
 line()
 action()
 addImage()
 clearAddress()
 stmpClose()
 attach()
 html()
 htmlFileContent()
 notify()
 send()
 



```


## Running Tests

To run tests, run the following command

```bash
  cd directory 
  php -S localhost:9000
```


## Support

- For support, email ppick177@gmail.com 

