<?php
    include_once('config.php');

    if(!empty($_GET['search'])){
        
        $data = $_GET['search'];
        $sql = "SELECT * FROM formulario.ordem_de_servico WHERE Nº_OS LIKE'%$data%' or responsavel LIKE '%$data%'
        ORDER BY Nº_OS DESC";
    }else{
        
        $sql = "SELECT * FROM formulario.ordem_de_servico ORDER BY Nº_OS DESC";
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

        <script src="js/jquery-3.6.4.min.js"></script>
        <script src="js/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cnpj").mask("00.000.000/0000-00");
                $("#telefone").mask("(00)0-0000-0000");
                $("#cep").mask("00000-000");
            
            })
        </script>
<style>
            body{
 
 font-family: 'Poppins', sans-serif;
 height: 50%;
 margin: 0;
 padding: 0;
 background: #ecf8ff;
 text-align: center;

}
.btn{
 padding: 4px 8px;
}
.header{
 display: flex;
 align-items: center;
 background:rgb(50, 54, 58);
 height: 80px;
 box-shadow: 1px 1px 4px rgb(6, 5, 7);
 justify-content: space-between;
 padding: 0 10%;
 
}

.m-5{
 color: white;
 margin: 20px;
 font-size: 12px;
}
.table-bg{
 align-items: center;

 background:#454f58;
 border-radius: 15px 15px 0 0;
 box-shadow: 20px 20px 50px -30px #b39af7;
}

a{

 background-color: white;
 border: none;
 border-radius: 15px;
 width: 55%;/*comprimento*/
 text-decoration: none;
 padding: 7px;/*espaçamento entre elemento e borda*/
 font-size: 15px;
 color:rgb(50, 54, 58);
 cursor: pointer;
 align-items: center;


}
a:hover{
 box-shadow: 3px 3px 3px rgb(15, 14, 17);
}
.box-search{
 display: flex;
 justify-content: center;
 top: 20%;
 gap: .1%;
}
        </style>
    </head>
    <body>

        <br>
        <div class="box-search">
            <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar" autocomplete="off">
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
                        <th scope="col">Nº OS</th>
                        <th scope="col">Id.Cliente</th>
                        <th scope="col">Serviço</th>
                        <th scope="col">Responsável</th>
                        <th scope="col">Valor R$</th>
                        <th scope="col">Data de Emissão</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($user_data = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>$user_data[Nº_OS]</td>";
                            echo "<td>$user_data[id_cliente]</td>";
                            echo "<td>$user_data[servico]</td>";
                            echo "<td>$user_data[responsavel]</td>";
                            echo "<td>$user_data[valor]</td>";
                            echo "<td>$user_data[data_emissao]</td>";
                            echo "<td>
                            <a class = 'btn btn-primary btn-sm' href='dadosOS.php?id=$user_data[id]'>
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye-fill' viewBox='0 0 16 16'>
                                    <path d='M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z'/>
                                    <path d='M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z'/>
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
            window.location = 'ver-os.php?search='+search.value;
        }
    </script>
</html>
</html>