<?php
    include_once('config.php');
 
    $sql = "SELECT * FROM formulario.cliente ORDER BY id DESC";
    $result = $conexao->query($sql);
    
?>
<!DOCTYPE HTML>
<html lang="pt">

<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=Bootstree, initial-scale-1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SG manager</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>
    <header class="site-header sticky-top py-1">
        <nav class="container d-flex flex-column flex-md-row justify-content-between">
          <a class="py-2" href="#" aria-label="Product">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg>
          </a>
          <a class="btn btn-secondary"href="view.listaC.php">Clientes</a>
          <a class="btn btn-secondary" href="view.listaF.php">Fornecedores</a>
          <a class="btn btn-secondary" href="#">Dashboard</a>
          <a class="btn btn-secondary" href="#">Ordens de Serviço</a>
          <a class="btn btn-secondary" href="#">Relatórios</a>
          <a class="btn btn-secondary" href="#">Perfil</a>
          <a class="btn btn-secondary" href="view.diretor.php">Voltar</a>
        </nav>
      </header>

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ID.Cliente</th>
            <th scope="col">CNPJ</th>
            <th scope="col">Razão Social</th>
            <th scope="col">Telefone</th>
            <th scope="col">E-mail</th>
            <th scope="col">Observação</th>
          </tr>
        </thead>
        <tbody>
        <?php
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>$user_data[id]</td>";
                    echo "<td>$user_data[id_cliente]</td>";
                    echo "<td>$user_data[cnpj]</td>";
                    echo "<td>$user_data[razao_social]</td>";
                    echo "<td>$user_data[telefone]</td>";
                    echo "<td>$user_data[email]</td>";
                    echo "<td>$user_data[obs]</td>";
                            
                }
              ?>
        </tbody>
      </table>
      </div>

      
  </body>
</html>