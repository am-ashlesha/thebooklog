<?php  

# Search books function
function search_books($con, $key){
   
   $key = "%{$key}%";

   $sql  = "SELECT * FROM books 
            WHERE title LIKE ?";
   $stmt = $con->prepare($sql);
   $stmt->execute([$key]);

   if ($stmt->rowCount() > 0) {
        $books = $stmt->fetchAll();
   }else {
      $books = 0;
   }

   return $books;
}

?>