<?php

    if(!empty($_GET['id'])){
        include_once('config.php');
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM formulario.fornecedor WHERE id = $id";
        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
                $fornecedor = $user_data['fornecedor'];
                $id_fornecedor = $user_data['id_fornecedor'];
                $cnpj = $user_data['cnpj'];
                $telefone = $user_data['telefone'];
                $email = $user_data['email'];
                $cidade = $user_data['cidade'];
                $endereco = $user_data['endereco'];
                $bairro = $user_data['bairro'];
                $cep = $user_data['cep'];
                $obs = $user_data['obs'];
            }

        }else{
            header('Location: view.listaF.adm.php');
        }
    }
?>

<!doctype html>
<html lang="pt">

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
                $("#id_fornecedor").mask("0000-0");
            
            })
        </script>
</head>
<body>

    <div class="container">
        <div class="py-5 text-center">
            <h2>Formulário de Cadastro</h2>
        </div>
        <form action="saveEdit.fornecedor.php" method="POST">
            <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-muted">Observações</span>
              <span class="badge badge-secondary badge-pill">?</span>
            </h4>
           
              <div class="input-group">
                <input type="text" id="obs" autocomplete = "off" name="obs" class="form-control" placeholder="Tipo de Serviço Prestado" value="<?php echo $obs?>">
              </div>
          </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Fornecedor</h4>
          
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="fornecedor">Razão Social</label>
                <input type="text" class="form-control" name="fornecedor" autocomplete = "off" id="fornecedor" placeholder="" value="<?php echo $fornecedor?>" required="">
                <div class="invalid-feedback">
                  Valid razaoSocial is required.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cnpj">CNPJ</label>
                <input type="text" class="form-control" name="cnpj" autocomplete = "off" id="cnpj" placeholder="00.000.000/0000-00" value="<?php echo $cnpj?>" required="">
                <div class="invalid-feedback">
                  Valid CNPJ is required.
                </div>
              </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="id_fornecedor">Nº ID</label>
                    <input type="text" class="form-control" name="id_fornecedor" autocomplete = "off" id="id_fornecedor" placeholder="0000-0" value="<?php echo $id_fornecedor?>" required="">
                    <div class="invalid-feedback">
                      Valid nID is required.
                    </div>
                  </div>
                <div class="col-md-6 mb-3">
                  <label for="telefone">Telefone</label>
                  <input type="tel" class="form-control" name="telefone" autocomplete = "off" id="telefone" placeholder="(99) 9999-9999" value="<?php echo $telefone?>" required="">
                  <div class="invalid-feedback">
                    Valid tel is required.
                  </div>
                </div>
              </div>
              <div class="mb-3">
              <label for="email">email <span class="text-muted"></span></label>
              <input type="email" class="form-control" name="email" autocomplete = "off" id="email" placeholder="seunome@exemplo.com" value="<?php echo $email?>">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="mb-3">
              <label for="endereco">Endereço</label>
              <input type="text" class="form-control" name="endereco" id="endereco" autocomplete = "off" placeholder="Rua" required="" value="<?php echo $endereco?>">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
              <div class="mb-3">
                <label for="bairro">Bairro</label>
                <input type="text" class="form-control" name="bairro" id="bairro" autocomplete="off" placeholder="" required="" value="<?php echo $bairro?>">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
                <div class="mb-3">
                <label for="cidade">Cidade</label>
                <input type="text" class="form-control" name="cidade" id="cidade" autocomplete="off" placeholder="" required="" value="<?php echo $cidade?>">
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              <div class="mb-3">
                <label for="address2">Complemento <span class="text-muted">(Opicional)</span></label>
                <input type="text" class="form-control" autocomplete = "off" id="address2">
              </div>           
          
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
                <input type="text" class="form-control" name="cep" autocomplete = "off" id="cep" placeholder="00000-000" required="" value="<?php echo $cep?>">
                <div class="invalid-feedback">
                    CEP code required.
                </div>
              </div>
            </div>
                <input type="hidden" name="id" value="<?php echo $id?>">
                <button class="btn btn-primary my-2" id="update" name="update" type="submit">Atualizar Cadastro</button>
                <a href="view.listaF.adm.php" id="limpar" onclick="limpar()" class="btn btn-info my-2">Voltar</a>
              
        </div>
      </div>

        <footer class="my-5 pt-5 text-muted text-center text-small">
            <p class="mb-1">© 2023 SG manager</p>
            <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Sobre</a></li>
            </ul>
        </footer>
            </form>
    </div>
</body>

</html>


