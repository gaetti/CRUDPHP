  
<?php

include("bd.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM tarefas WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Tarefa Removida com Sucesso';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}

?>