<?
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
include __DIR__."/vendor/autoload.php";
include __DIR__."/MyMessages.php";
?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <title>Messages</title>
</head>
<body>
  <?
  use Monolog\Logger;
  use Monolog\Handler\StreamHandler;
  
  // create a Monolog object
  $logger = new Logger("Messages");
  $logger->pushHandler(new StreamHandler("Messages.log"));

  ?>
  <div class="container">
    <form action="/" method="post">
      <div class="form-group">
        <label for="exampleFormControlSelect1">Level</label>
        <select name="level" class="form-control" id="exampleFormControlSelect1">
          <option>Emergency</option>
          <option>Alert</option>
          <option>Critical</option>
          <option>Error</option>
          <option>Warning</option>
          <option>Notice</option>
          <option>Info</option>
          <option>Debug</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Message</label>
        <textarea name="message" class="form-control" id="message" rows="3"></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <?
  // create the mailer and send an email
  
  if(strlen($_POST['message']) > 0)
  {
    $mailer = new MyMessages($logger);
    $mailer->AddMessage($_POST['level'], $_POST['message']);
  }
  ?>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>