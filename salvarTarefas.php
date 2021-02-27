<?php

include('bd.php');

if (isset($_POST['salvarTarefas'])) {
  $title = $_POST['titulo'];
  $description = $_POST['descricao'];
  $query = "INSERT INTO tarefas(titulo, descricao) VALUES ('$title', '$description')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Query Failed.");
  }

  $_SESSION['message'] = 'Tarefa salva com sucesso';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php'); 

}

?>