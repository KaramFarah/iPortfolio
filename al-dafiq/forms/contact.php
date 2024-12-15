<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'info@alwaqartourism.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
      $body = 'You received new message from your website contact form' . "\n";
        $body .= '=======================================================' . "\n";
        $body .= '- Sender: ' . trim($_POST['name']) . "\n";
                    $body .= '- Sender Email: ' . trim($_POST['email']) . "\n";
                    $body .= '- Message: ' . "\n" . strip_tags(trim($_POST['message']), '<a><p><br>') . "\n";
                    
                    
      if (mail($receiving_email_address, $_POST['subject'], $body)){
          
          echo 'Sent!';
      }
      else{
          die( 'Unable to load the "PHP Email Form" Library!');
      }
    // die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  /*
  $contact->smtp = array(
    'host' => 'example.com',
    'username' => 'example',
    'password' => 'pass',
    'port' => '587'
  );
  */

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
