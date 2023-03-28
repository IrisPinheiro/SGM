<?php

    if(!empty($_GET['id'])){

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM formulario.cliente  WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result)){
                $cnpj = $user_data['cnpj'];
                $id_cliente = $user_data['id_cliente'];
                $razao_social = $user_data['razao_social'];
                $telefone = $user_data['telefone'];
                $email = $user_data['email'];
                $rua = $user_data['rua'];
                $bairro = $user_data['bairro'];
                $cidade = $user_data['cidade'];
                $cep = $user_data['cep'];
                $obs = $user_data['obs'];
                
            }
            
        }
        else{
            header('Location: view.listaC.adm.php');
        }

    }
?>
<!DOCTYPE html> 
<html lang="pt-br">
<head>
    <meta charset="UTF=8">
    <meta name="viewport" content="width=Bootstree, initial-scale-1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SG manager</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="js/jquery-3.6.4.min.js"></script>
        <script src="js/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cnpj").mask("00.000.000/0000-00");
                $("#telefone").mask("(00)0-0000-0000");
                $("#cep").mask("00000-000");
                $("#id").mask("0000-0");
            
            })
        </script>
</head>

<body class="bg-light">

    <div class="container">
      <div class="py-5 text-center">
        <h2>Formulário de Cadastro</h2>
      </div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Observações</span>
              <span class="badge badge-secondary badge-pill">?</span>
            </h4>
            <form class="card p-2">
              <div class="input-group">
                <input type="text" id="obs" autocomplete = "off" name="obs" class="form-control" placeholder="Tipo de Serviço Prestado" value= "<?php echo $obs?> ">
              </div>
            </form>
          </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Cliente</h4>
          <form class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="razaoSocial">Razão Social</label>
                <input type="text" class="form-control" autocomplete = "off" id="razaoSocial" placeholder="" value= "<?php echo $razao_social?> " required="">
                <div class="invalid-feedback">
                  Valid razaoSocial is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" autocomplete = "off" id="cnpj" placeholder="00.000.000/0000-00" value= "<?php echo $cnpj?> " required="">
                <div class="invalid-feedback">
                  Valid CNPJ is required.
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id">Nº ID</label>
                    <input type="text" class="form-control" autocomplete = "off" id="id" placeholder="0000-0" value= "<?php echo $id_cliente?>" required="">
                    <div class="invalid-feedback">
                      Valid nID is required.
                    </div>
                  </div>
                <div class="col-md-6 mb-3">
                  <label for="telefone">Telefone</label>
                  <input type="tel" class="form-control" autocomplete = "off" id="telefone" placeholder="(99) 9999-9999" value= "<?php echo $telefone?> " required="">
                  <div class="invalid-feedback">
                    Valid tel is required.
                  </div>
                </div>
              </div>
              <div class="mb-3">
              <label for="email">email <span class="text-muted"></span></label>
              <input type="email" class="form-control" autocomplete = "off" id="email" placeholder="seunome@exemplo.com" value= "<?php echo $email?> ">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="rua">Endereço</label>
              <input type="text" class="form-control" id="rua" autocomplete = "off" placeholder="Rua" required="" value= "<?php echo $rua?> ">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
              <div class="mb-3">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" id="bairro" autocomplete="off" placeholder="" required="" value= "<?php echo $bairro?> ">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
                <div class="mb-3">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" id="cidade" autocomplete="off" placeholder="" required="" value= "<?php echo $cidade?> ">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              <div class="mb-3">
                <label for="address2">Complemento <span class="text-muted">(Opicional)</span></label>
                <input type="text" class="form-control" autocomplete = "off" id="address2">
              </div>           
          </form>
            </div>
            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">País</label>
                <select class="custom-select d-block w-100" id="country" required="">
                  <option value="">Selecionar</option>
                  <option>Brasil</option>
                </select>
                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="Estado">Estado</label>
                <select class="custom-select d-block w-100" id="Estado" required="">
                  <option value="">Selecionar</option>
                  <option>Pará</option>
                </select>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cep">CEP</label>
                <input type="text" class="form-control" autocomplete = "off" id="cep" placeholder="00000-000" required="" value= "<?php echo $cep?> ">
                <div class="invalid-feedback">
                    CEP code required.
                </div>
              </div>
            </div>
            
                <button class="btn btn-primary my-2" id="atualizar" name="atualizar" type="submit">Atualizar</button>
                <a href="#" onclick="limpar()" class="btn btn-secondary my-2">Limpar Tudo</a>
                <a href="view.listaC.adm.php" class="btn btn-info my-2">Voltar</a>
              
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2023 SG manager</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Sobre</a></li>
        </ul>
      </footer>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script> -->

    
        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
        <script src="../../assets/js/vendor/popper.min.js"></script>
        <script src="../../dist/js/bootstrap.min.js"></script>
        <script src="../../assets/js/vendor/holder.min.js"></script>
      
    
    <svg xmlns="http://www.w3.org/2000/svg" width="208" height="225" viewBox="0 0 208 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="11" style="font-weight:bold;font-size:11pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>
    

    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

</body>
<script>
  function limpar(){
    if($('limpar')){
        $("#razaoSocial").val("");
        $("#cnpj").val("");
        $("#id").val("");
        $("#telefone").val("");
        $("#email").val("");
        $("#cidade").val("");
        $("#rua").val("");
        $("#cep").val("");
        $("#obs").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#country").val("");
        $("#Estado").val("");
        

    }
  }
$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");

    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");


                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});

</script>
</html>


