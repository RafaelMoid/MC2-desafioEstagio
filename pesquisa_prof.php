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

    $sql = "SELECT * FROM prof WHERE nome LIKE '%$pesquisa%' ";

  //Chamda de dados
    $dados = mysqli_query($conn, $sql);
    ?>
      <div class="container">
          <div class="row">
              <div class="col">
              <img src="./src/MC2.png" class="img-fluid" alt="Responsive image">
                <h2>Pesquisar</h2>
                <nav class="navbar navbar-light bg-light">
                    <form class="form-inline" action="pesquisa_prof.php" method="POST">
                        <p>Pesquise por professores aqui.</p>
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
      $cod_prof = $linha['cod_prof'];
      $nome = $linha['nome']; 
      $cpf = $linha['cpf']; 
      $dt_nascimento = $linha['dt_nascimento'];
      $dt_nascimento = mostra_data($dt_nascimento);
      
      //chamando dados do bd e exibindo em tela de acordo com pesquisa por nome
      //é necessario adicionar a função de editar e apagar cada aluno
      echo "<tr>
      <th scope ='row'>$cod_prof</th>  
      <td>$nome</td>
      <td>$cpf</td>
      <td>$dt_nascimento</td>
      <td width=150px>
        <a href='prof_edit.php?id=$cod_prof' class='btn btn-success btn-sm'>Editar</a>
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