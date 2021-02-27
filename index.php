<?php include("bd.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?> <!--com essa linha de codigo eu faco com que a sessao seja atualiza e a mensagem saia quando quiser fazer uma nova tarefa!-->

      <!-- Adicionar Formulario das Tarefas -->
      <div class="card card-body">
        <form action="salvarTarefas.php" method="POST">
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="titulo da tarefa" required autofocus>
          </div>
          <div class="form-group">
            <textarea name="descricao" rows="2" class="form-control" placeholder="descrição da tarefa" required></textarea>
          </div>
          <input type="submit" name="salvarTarefas" class="btn btn-success btn-block" value="Salvar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Titulo</th>
            <th>descrição</th>
            <th>Criado em</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tarefas";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['titulo']; ?></td>
            <td><?php echo $row['descricao']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="editarTarefas.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i><!--nessa linha quando o usuario clicar no btn Edit ele ira ser redirecionado exclusivamente p/ aquela id-->
              </a>
              <a href="delete_task.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>