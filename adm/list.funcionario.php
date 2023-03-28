<?php
    include_once('config.php');

    if(!empty($_GET['search'])){
        
        $data = $_GET['search'];
        $sql = "SELECT * FROM formulario.funcionario WHERE id LIKE'%$data%' or cpf LIKE '%$data%' or funcao LIKE '%$data%' or nome LIKE '%$data%'
        ORDER BY id DESC";
    }else{
        
        $sql = "SELECT * FROM formulario.funcionario ORDER BY id DESC";
    }
    
    $result = $conexao->query($sql);
    
?>

<!doctype html>
<html lang="pt">
    <div>
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" 
        rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </div>
    <head>
        <title>SGManager</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width = device-width, initial-sclae = 1.0"/>
        <link rel="stylesheet" href="list.funcionario.css">
    
        <script src="js/jquery-3.6.4.min.js"></script>
        <script src="js/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cnpj").mask("00.000.000/0000-00");
                $("#telefone").mask("(00)0-0000-0000");
                $("#cep").mask("00000-000");
            
            })
        </script>
    </head>
    <body>
        <section class="header" id="header">
         <img src="./img/usuario-do-circulo.png"/>
                <div class="navigation">
                    <a href="adm.php">Voltar</a>
                </div>
        </section>
        <br>
        <div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
            <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
            </button>

        </div>
        <div class="m-5">
            <table class="table text-white table-bg">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">CPF</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Função</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Endereço</th>
                        <th scope="col">Cep</th>
                        <th scope="col">Cód. Acesso</th>
                        <th scope="col">...</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>$user_data[id]</td>";
                            echo "<td>$user_data[cpf]</td>";
                            echo "<td>$user_data[nome]</td>";
                            echo "<td>$user_data[funcao]</td>";
                            echo "<td>$user_data[telefone]</td>";
                            echo "<td>$user_data[email]</td>";
                            echo "<td>$user_data[cidade]</td>";
                            echo "<td>$user_data[endereco]</td>";
                            echo "<td>$user_data[cep]</td>";
                            echo "<td>$user_data[codigo_acesso]</td>";
                            echo "<td>
                                <a class = 'btn btn-primary btn-sm' href='edit.funcionario.php?id=$user_data[id]'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='12' fill='currentColor' class='bi bi-pencil-fill' viewBox='0 0 16 16'>
                                        <path d='M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z'/>
                                    </svg>
                                </a>
                                
                            </td>";
                            
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
    <script>
        var search = document.getElementById('pesquisar');

        search.addEventListener("keydown", function(event){
            if(event.key==="Enter"){
                searchData();
            }
        });
        function searchData(){
            window.location = 'list.funcionario.php?search='+search.value;
        }
    </script>
</html>
</html>