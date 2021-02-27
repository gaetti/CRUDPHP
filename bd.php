<?php
session_start();

$conn = mysqli_connect( //Conexão com o banco de dados que eu criei
  'localhost',
  'root',
  '',
  'crud'
) or die(mysqli_erro($mysqli));

?>