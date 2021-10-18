<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Editar cadastro de disciplina</title>
  </head>
  <body>

  <?php
    include "conexao.php";

    $id = $_GET['id'] ?? '';
    $sql = "SELECT * FROM disciplina WHERE cod_disciplina = $id";

    $dados = mysqli_query($conn, $sql);
    $linha = mysqli_fetch_assoc($dados);
  ?>

      <div class="container">
          <div class="row">
              <div class="col">
                <h2>Editar cadastro de disciplina</h2>
                <form action="cadastro_mat.php" method="POST">
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" value="<?php echo $linha['nome']; ?>" >
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Codigo do professor</label>
                    <input type="number" class="form-control" name="prof" value="<?php echo $linha['prof']; ?>">
                  </div>
                  <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">alunos</label>
                    <input type="text" class="form-control" name="alunos" value="<?php echo $linha['alunos']; ?>">
                  </div>
                  <div>
                    <input type="submit" class="btn btn-success" value="Salvar alterações">
                  </div>
                </form>
                </br>
                <a href="index.php" class="btn btn-primary">Voltar ao início</a>
              </div>
          </div>
      </div>
    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>