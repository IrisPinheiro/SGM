<?php

    if(isset($_POST['salvar'])){

        for($i=0; $i<5; $i=$i+1){
            $codigo_acesso = random_int(200000,10000000);
    
        }

        include_once('config.php');

        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $funcao = $_POST['funcao'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];
        $endereco = $_POST['endereco'];
        $cep = $_POST['cep'];

        $result = mysqli_query($conexao, "INSERT INTO funcionario(cpf, nome, funcao, telefone, email,  cidade, endereco, cep,codigo_acesso)
        VALUES('$cpf', '$nome', '$funcao', '$telefone', '$email',  '$cidade', '$endereco', '$cep', '$codigo_acesso' )" );
        
    }
?>

<!doctype html>
<html lang="pt">

<head>
        <title>SGManager</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width = device-width, initial-sclae = 1.0"/>
        <link rel="stylesheet" href="form-funcionario.css">
        <script src="js/jquery-3.6.4.min.js"></script>
        <script src="js/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cpf").mask("000.000.000-00");
                $("#telefone").mask("(00)0-0000-0000");
                $("#cep").mask("00000-000");
            
            })
        </script>
        
        
</head>
<body>
        <section class="header" id="header">
            <img src="./img/perfil.png"/>
                
                <div class="navigation">
                    <a href="adm.php">Voltar</a>
                </div>
            </section>
        </div>
        <div class="box">
            <div>
                <form action="new-function.php" method="POST">
                    <fieldset>
                        <legend><b>Cadastro de Funcionario</b></legend>
                        <br>
                        <div class="inputBox">
                            <input type="text" autocomplete="off" maxlength="12" name="cpf" id="cpf" class="inputUser" required>
                            <label for="cpf" class="labelInput">CPF</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="text" autocomplete= "off" name="nome" id="nome" class="inputUser" required>
                            <label for="nome" class="labelInput">Nome</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="tel" autocomplete = "off" maxlength="11" name="telefone" id="telefone"  class="inputUser" required>
                            <label for="telefone" class="labelInput">Telefone</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="email" autocomplete = "off" name="email" id="email" class="inputUser" required>
                            <label for="email" class="labelInput">E-mail</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="text" autocomplete = "off" name="endereco" id="endereco" class="inputUser" required>
                            <label for="endereco" class="labelInput">Endereço</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="text" autocomplete = "off" name="cidade" id="cidade" class="inputUser" required>
                            <label for="cidade" class="labelInput">Cidade</label>
                        </div>
                        <br>
                        <div class="inputBox">
                            <input type="text" autocomplete = "off" name="cep" id="cep" class="inputUser" required>
                            <label for="cep" class="labelInput">CEP</label>
                        </div>
                        <p>Função:</p>
                        <input type="radio" id="financeiro" name="funcao" value="financeiro" required>
                        <label for="financeiro">Financeiro</label>
                        <br>
                        <input type="radio" id="gpp" name="funcao" value="gerente_P_Projetos" required>
                        <label for="gpp">G. Portfólio de Projetos</label>
                        <br>
                        <input type="radio" id="gp" name="funcao" value="gerente_projeto" required>
                        <label for="gp">Gerente de Projetos</label>
                        <br>
                        <input type="radio" id="diretor" name="funcao" value="diretor" required>
                        <label for="diretor">Diretor</label>
                        <br><br>
                            <div>
                                <button id="salvar" name="salvar" onclick="openPopup()">salvar</button>
                            </div>
                            <!-- <div class="popup" id="popup">
                                <h1></h1>
                                    <img src="./img/verificado.png" alt="">
                                    <h2>Cadastro Realizado!</h2>
                                    <p>Seu cadastro foi efetuado com sucesso!</p>
                                    <button type="button"onclick="closePopup()">OK</button>
                                </div> -->
                            
                    </fieldset>
                </form>
            </div>
        </div>
    <!-- <script>
        let popup = document.getElementById("popup");
            
            cpf.value = 'cpf';
            nome.value = 'nome';
            funcao.value = 'funcao';
            tel.value = 'telefone';
            email.value = 'email';
            cidade.value = 'cidade';
            endereco.value = 'endereco';
            cep.value= 'cep';

        function openPopup(){
            if(cpf.value!= ''||nome.value!=''|| funcao.value !=''||tel.value!=''||email.value!=''||cidade.value!=''||endereco.value!=''||cep.value!='' ){
                
                popup.classList.add("open-popup");
            }
            
        }


        function closePopup(){
            popup.classList.remove("open-popup");
        }
    </script> -->
</body>

</html>


