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

    $sql = "SELECT * FROM disciplina WHERE nome LIKE '%$pesquisa%' ";

  //Chamda de dados
    $dados = mysqli_query($conn, $sql);
    ?>
    

      <div class="container">
          <div class="row">
              <div class="col">
              <img src="./src/MC2.png" class="img-fluid" alt="Responsive image">
                <h2>Pesquisar</h2>
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" action="pesquisa_mat.php" method="POST">
                        <p>Pesquise aqui por disciplinas.</p>
                     <input class="form-control mr-sm-2" type="search" placeholder="Pesquise aqui" aria-label="Search" name="busca" autofocus>
                     <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisar</button>

                     <table class="table table-hover">
  <thead>
    <tr>
    <th scope="col">Codigo</th>
      <th scope="col">Nome</th>
      <th scope="col">Professor</th>
      <th scope="col">Quantidade de alunos</th>
      <th scope="col">Funções</th>
      
    </tr>
  </thead>
  <tbody>

  <?php
    //teste de data recovery (Success!!) :)
     
    while ( $linha = mysqli_fetch_assoc($dados)) {
      $cod_disciplina = $linha['cod_disciplina'];
      $nome = $linha['nome']; 
      $prof = $linha['prof']; 
      $alunos = $linha['alunos'];
      
      //chamando dados do bd e exibindo em tela de acordo com pesquisa
      //é necessario colocar mais funções de pesquina no botão
      //Listagem de disciplinas.
      //Código e nome da disciplina.
      //Nome do professor.
      //Quantidade de estudantes que estão matriculados na disciplina.
      //Detalhamento da disciplina.
      //Código e nome da disciplina.
      //Nome do Professor.
      //Lista de Estudantes matriculados na disciplina
      echo "<tr>
      <th scope ='row'>$cod_disciplina</th>  
      <td>$nome</td>
      <td>$prof</td>
      <td>$alunos</td>
      <td width=150px>
        <a href='mat_edit.php?id=$cod_disciplina' class='btn btn-success btn-sm'>Editar</a>
        <a href='#' class='btn btn-danger btn-sm'>Excluir</a>
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