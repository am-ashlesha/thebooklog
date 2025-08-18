<?php  


function get_all_query($con){
   $sql  = "SELECT * FROM query";
   $stmt = $con->prepare($sql);
   $stmt->execute();

   if ($stmt->rowCount() > 0) {
   	  $queries = $stmt->fetchAll();
   }else {
      $queries = 0;
   }

   return $queries;
}



function get_query($con, $id){
   $sql  = "SELECT * FROM query WHERE id=?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$id]);

   if ($stmt->rowCount() > 0) {
   	  $query = $stmt->fetch();
   }else {
      $query = 0;
   }

   return $query;
}