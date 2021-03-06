<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>MC2 Teste - Rafael Varela</title>
  </head>
  <body>
     <!-- Tratamento de dados para requisição no BD -->
  <?php
    $pesquisa = $_POST['busca'] ?? '';

    include "conexao.php";

    $sql = "SELECT * FROM alunos WHERE nome LIKE '%$pesquisa%' ";

  //Chamda de dados
    $dados = mysqli_query($conn, $sql);
    ?>
      <div class="container">
          <div class="row">
              <div class="col">
              <img src="./src/MC2.png" class="img-fluid" alt="Responsive image">
                <h2>Pesquisar</h2>
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" action="pesquisa_aluno.php" method="POST">
                        <p>Pesquise estudantes por aqui.</p>
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquise aqui" aria-label="Search" name="busca" autofocus>
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar por nome</button>

                     <table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">Codigo</th>
      <th scope="col">Nome</th>
      <th scope="col">CPF</th>
      <th scope="col">Data de nascimento</th>
      <th scope="col">Funções</th>
      
    </tr>
  </thead>
  <tbody>
  <?php
    //teste de data recovery (Success!!) :)
     
    while ( $linha = mysqli_fetch_assoc($dados)) {
      $cod_aluno = $linha['cod_aluno'];
      $nome = $linha['nome']; 
      $cpf = $linha['cpf']; 
      $dt_nascimento = $linha['dt_nascimento'];
      $dt_nascimento = mostra_data($dt_nascimento);

      //Foi aqui que parei, o bootstrap ta me trolando e não tá chamando o modal
      //Preciso fazer o modal funcionar para passar a função para exclusão

      echo "<tr>
      <th scope ='row'>$cod_aluno</th>  
      <td>$nome</td>
      <td>$cpf</td>
      <td>$dt_nascimento</td>
      <td width=150px>
        <a href='aluno_edit.php?id=$cod_aluno' class='btn btn-success btn-sm'>Editar</a>
        <a href='#' class='btn btn-danger btn-sm' data-toggle='modal' data-target='#exampleModal'>Excluir</a>
      </td>
      </tr>";

    }

  ?>
  </tbody>
</table>

</br>
                <a href="index.php" class="btn btn-primary">Voltar ao início</a>
                    </form>
</nav>
              </div>
          </div>
      </div>
    




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Deseja excluir o cadastro deste estudante?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        <button type="button" class="btn btn-danger">Excluir</button>
      </div>
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