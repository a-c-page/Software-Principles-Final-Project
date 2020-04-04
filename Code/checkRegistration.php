<?php

session_start();

require "configure.php";

$connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME);

if ( !$connection )
{
  $_SESSION["message"] = "Connection failed!";
  header("location: login.php");
}

else
{
  if ( !isset($_POST['submit']) )
  {
    $_SESSION["message"] = "No data found!";
    header("location: login.php");
  }

  else
  {
    $first = mysqli_real_escape_string($connection, $_POST['first']);
    $last = mysqli_real_escape_string($connection, $_POST['last']);
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $sql = "SELECT * FROM users WHERE username = '$username'";

    $query = mysqli_query($connection, $sql);

    $rows_returned = mysqli_num_rows($query);

    if ($rows_returned == 1)
    {
      $_SESSION["message"] = "Username taken!";
      header("location: login.php");
    }

    else
    {
      $sql = "SELECT * FROM users WHERE email = '$email'";

      $query = mysqli_query($connection, $sql);

      $rows_returned = mysqli_num_rows($query);

      if ($rows_returned == 1)
      {
        $_SESSION["message"] = "Email taken!";
        header("location: login.php");
      }

      else
      {
        $sql = "INSERT INTO users (firstname, lastname, username, email, password) VALUES ('$first', '$last', '$username', '$email', '$password')";
        mysqli_query($connection, $sql);
        $_SESSION["message"] = "User registered!";
        header("location: login.php");
      }
    }
  }
}

?>
