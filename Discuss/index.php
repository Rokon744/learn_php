<!doctype html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include("./client/commonFiles.php") ?>
  <title>This is My First Project</title>
</head>

<body>
  <?php
  session_start();

  include("./client/header.php");
  if (isset($_GET['signup']) && !$_SESSION['user']['username']) {
    include("./client/signup.php");
  } else if ($_GET['login'] && !$_SESSION['user']['username']) {
    include("./client/login.php");
  } elseif (isset($_GET['askquestion'])) {
    include("./client/askquestion.php");
  } elseif (isset($_GET['q-id'])) {
    include("./client/question-details.php");
  }
  else {
    include("./client/questions.php");
  }

  ?>

</body>

</html>