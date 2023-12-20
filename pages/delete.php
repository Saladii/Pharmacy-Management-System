<?php
include "connect.php";

if (isset($_GET["id"])) {
   $id = $_GET["id"];
   $sql = "DELETE FROM `crud` WHERE `id` = $id";
   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: medicine_list.php?msg=Record deleted successfully");
   } else {
      echo "Failed: " . mysqli_error($conn);
   }
}
?>

