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
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$username' && password = '$password'";

    $query = mysqli_query($connection, $sql);

    $rows_returned = mysqli_num_rows($query);

    if ($rows_returned == 1)
    {
      $sql = "SELECT * FROM users WHERE username = '$username'";
      $query = mysqli_query($connection, $sql);
      $data_array = $query->fetch_assoc();

      $_SESSION["username"] = $data_array['username'];
      $_SESSION["name"] = $data_array['firstname'];

      header("location: home.php");
    }
    else
    {
      $_SESSION["message"] = "Not a valid login!";
      header("location: login.php");
    }
  }
}

?>
