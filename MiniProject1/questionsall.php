<?php
session_start();
include_once("dbconnect.php");
if(isset($_REQUEST['message'])) {
$msg=$_REQUEST['message'];
unset($_REQUEST['message']);
$result=$conn->query("select max(msgid) from questions");
$row=$result->fetch_assoc();
$msgid=$row['max(msgid)'];
$msgid+=1;
$mail=$_SESSION['usermail'];
$result=$conn->query("select name from studentinfo where mail='$mail'");
$row=$result->fetch_assoc();
$sender=$row['name'];

$result=$conn->query("insert into questions values($msgid,'$sender','$msg')");

if(!$result) {
  echo "<h1>Some error occured with database</h1>";
}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Welcome</title>
  </head>
  <body>
  <form method="post" action="questionsall.php">
        <div class="input-group">
            <textarea id="input-box" name="message" class="form-control" rows="1" placeholder="Enter your message..."></textarea>
            <span class="input-group-btn">
                <button class="btn btn-secondary" type="submit" >send</button>
            </span>
       </div>
        </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>