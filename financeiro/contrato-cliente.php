<?php
     
    if(!empty($_GET['id'])){

        include_once('config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM formulario.cliente  WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){

            while($user_data = mysqli_fetch_assoc($result)){
                $cnpj = $user_data['cnpj'];
                $razao_social = $user_data['razao_social'];
                $telefone = $user_data['telefone'];
                $email = $user_data['email'];
                $rua = $user_data['rua'];
                $bairro = $user_data['bairro'];
                $cidade = $user_data['cidade'];
                $cep = $user_data['cep'];
            }
            
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
    <title>SGManager</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width = device-width, initial-sclae = 1.0"/>
        <link rel="stylesheet" href="contrato.css">
        <script src="js/jquery-3.6.4.min.js"></script>
        <script src="js/jquery.mask.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#cpf").mask("000.000.000-00"); 
                $("#cnpj1").mask("00.000.000/0000-00");          
            })
        </script>
    </head>
    <body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js" integrity="sha384-NaWTHo/8YCBYJ59830LTz/P4aQZK1sS0SneOgAvhsIl3zBu8r9RevNg5lHCHAuQ/" crossorigin="anonymous"></script>
        
        <section class="header" id="header">
            <img src="./img/usuario-do-circulo.png"/>
                <div class="navigation">
                    <a href="contrato.php">Voltar</a>
                </div>
        </section>
        <br>
        <div class="dados-cliente">
            <fieldset>
                <legend>Cliente</legend>
                <br>
                <input type="text" id="contratante" value="<?php echo $razao_social?>">
                <br><br>
                <input type="text" id="rua" value="<?php echo $rua?>">
                <br><br>
                <input type="text" id="bairro" value="<?php echo $bairro?>">
                <br><br>
                <input type="text" id="cidade" value="<?php echo $cidade?>">
                <br><br>
                <input type="text" id="cnpj" value="<?php echo $cnpj?>">
                <br><br>
                <input type="text" id="cep" value="<?php echo $cep?>">
                <br><br>
            </fieldset>
        </div>
        
        <div class="dados-representante">
            <fieldset>
                <legend>Representante</legend>
                <input type="text" id="representante" placeholder="Nome" required>
                <br><br>
                <input type="text" id="cpf" autocomplete="off" placeholder="CPF" required>
                <br><br>
                <input type="text" id="cidade1" placeholder="Cidade" required>
                <br><br>
            </fieldset>
        </div>
        <div class="dados-empresa">
            <fieldset>
                <legend>Empresa</legend>
                <input type="text" id="empresa" placeholder="Empresa" required>
                <br><br>
                <input type="text" id="rua1" placeholder="Rua" required>
                <br><br>
                <input type="text" id="bairro1" placeholder="Bairro" required>
                <br><br>
                <input type="text" id="cidade2" placeholder="Cidade" required>
                <br><br>
                <input type="text" id="cnpj1" placeholder="CNPJ" required>
                <br><br>
            </fieldset>    
        </div>
        <div class="btn">
            <button id="button" onclick="gerar()"><B>Inserir dados no contrato</B></button>
            <br>
            <button id="gerar" onclick="gerarPdf()"><B>Gerar PDF</B></button>
            
        </div>
        <div id="doc-contrato" class="box">
            <span class="stabilisation"></span><p style="text-align: center;"><strong>CONTRATO DE PRESTAÇÃO DE SERVIÇO</strong></p>
                    <p><br /><br /> </p>
                    <p style="padding-left: 4px;"><br />a pessoa jurídica <strong><span  id="nome-contratante" >__________</span></strong>,  CNPJ n. <strong><span id="cnpj-contratante"  >________</span></strong>, com sede em <strong><span id="rua-contratante" >________</span></strong>,</p>
                    <p style="padding-left: 4px;"><strong><span id="bairro-contratante" >________</span></strong>, cidade:<strong> <span id="cidade-contratante" >________</span></strong> neste ato representada, conforme poderes especialmente conferidos,</p>
                    <p style="padding-left: 4px;">por:<strong><span id="nome-representante"  >________</span></strong>, CPF n. <strong><span id="cpf-representante"  >________</span></strong>,residente e domiciliado em:<strong> <span id="cidade-representante"  >_______</span></strong> doravante denominada
                    <p><strong>CONTRATANTE</strong>, e a empresa <strong><span  id="nome-empresa" >__________</span></strong> estabelecida na <strong><span  id="rua-empresa" >__________</span></strong>, bairro:<strong><spam id="bairro-empresa">_____</spam></strong>, cidade: <span id="cidade-empresa">_____</span>, CNPJ n.<strong><span  id="cnpj-empresa" >__________</span></strong>
                    firmam o presente <strong>contrato de prestação de serviço</strong>, conforme as seguintes cláusulas.</p>
                    <p><strong><br><br />CLÁUSULA 1ª - DO OBJETO</strong></p>
                    <p>O objeto do presente termo de contrato é a prestação de serviço de desenvolvimento, manutenção, suporte, atualização tecnológica e documentação de sistemas de informação voltados para as necessidades da empresa.</p>
                    <p><strong><br />CLÁUSULA 2ª - LEGISLAÇÃO</strong></p>
                    <p>As cláusulas e condições deste contrato observam às disposições da regulamentada pela Lei Federal n° 8.666/93, às quais a <strong>CONTRATANTE</strong> e <strong>CONTRATADA</strong> estão sujeitas.</p>
        
                    <p><strong><br />CLÁUSULA 3ª - DA ENTREGA DO OBJETO</strong></p>
                    <p>A contratada deverá fornecer o serviço em até 15(quinze) dias, conforme o recebimento da nota de empenho.</p>
            
                    <p><strong><br />CLÁUSULA 4ª - DAS OBRIGAÇÕES DO CONTRATADO</strong></p>
                    <p>São obrigações do <strong>CONTRATADO</strong>:</p>
                    <p style="padding-left: 30px;">I. prestar, com a devida dedicação e seriedade e da forma e do modo ajustados, os serviços descritos neste contrato;</p>
                    <p style="padding-left: 30px;">II. respeitar as normas, as especificações técnicas e as condições de segurança aplicáveis à espécie de serviços prestados;</p>
                    <p style="padding-left: 30px;">III. fornecer as notas fiscais referentes aos pagamentos efetuados pelo <strong>CONTRATANTE</strong>;</p>
                    <p style="padding-left: 30px;">IV. responsabilizar-se pelos atos e omissões praticados por seus subordinados, bem como por quaisquer danos que os mesmos venham a sofrer ou causar para o <strong>CONTRATANTE</strong> ou terceiros;</p>
                    <p style="padding-left: 30px;">V. arcar devidamente, nos termos da legislação trabalhista, com a remuneração e demais verbas laborais devidas a seus subordinados, inclusive encargos fiscais e previdenciários referentes às relações de trabalho;</p>
                    <p style="padding-left: 30px;">VI. arcar com as despesas e obrigações de natureza tributária que sejam de sua responsabilidade, nos termos da legislação vigente, relacionadas aos serviços especificados neste contrato;</p>
                    <p style="padding-left: 30px;">VII. cumprir todas as determinações impostas pelas autoridades públicas competentes, referentes a estes serviços;</p>
                    <p style="padding-left: 30px;">VIII. manter sigilosas, mesmo após findo este contrato, as informações privilegiadas de qualquer natureza às quais tenha acesso em virtude da execução destes serviços;</p>
                    <p style="padding-left: 30px;">IX. providenciar todos os meios e os equipamentos necessários à correta execução do serviço.</p>
                    <p><strong><br />CLÁUSULA 5ª - DAS OBRIGAÇÕES DO</strong> <strong>CONTRATANTE</strong></p>
                    <p>São obrigações do <strong>CONTRATANTE</strong>:</p>
                    <p style="padding-left: 30px;">I. fornecer todas as informações necessárias à realização dos serviços, inclusive especificando os detalhes e a forma de como eles devem ser entregues;</p>
                    <p style="padding-left: 30px;">II. efetuar o pagamento, nas datas e nos termos definidos neste contrato;</p>
                    <p style="padding-left: 30px;">III. comunicar imediatamente o <strong>CONTRATADO</strong> sobre eventuais reclamações feitas contra seus subordinados, assim como sobre danos por eles causados;</p>
                    <p style="padding-left: 30px;">IV. arcar com as eventuais despesas e obrigações de natureza tributária que sejam de sua responsabilidade, nos termos da legislação vigente, relacionadas aos serviços especificados neste contrato.</p>
                    <p><strong><br />CLÁUSULA 6ª - DA RESCISÃO</strong></p>
                    <p>A qualquer momento, poderão as partes rescindir este contrato, desde que avisem previamente à outra parte, de acordo com os prazos seguintes:</p>
                    <p style="padding-left: 30px;">I. se a retribuição pela prestação dos serviços for fixada por mês ou mais, com antecedência de 8 (oito) dias;</p>
                    <p style="padding-left: 30px;">II. se a retribuição pela prestação dos serviços for fixada por semana ou quinzena, com antecedência de 4 (quatro) dias;</p>
                    <p style="padding-left: 30px;">III. se o prazo do contrato for menor que 7 (sete) dias, na véspera.</p>
                    <p>§ 1°. A rescisão sem justa causa por parte do <strong>CONTRATADO</strong> não retira dele o direito ao recebimento de retribuição vencida, porém sujeita-o ao pagamento de perdas e danos ao <strong>CONTRATANTE</strong>.</p>

                    <p>§ 2°. Não serão aplicáveis os prazos fixados nesta cláusula às rescisões por justa causa.</p>
                    <p>§ 3°. A rescisão com justa causa, realizada por qualquer uma das partes, não exime o <strong>CONTRATANTE</strong> do pagamento das retribuições já vencidas.</p>
                    <p>§ 4°. A rescisão com justa causa por parte do <strong>CONTRATANTE</strong> obriga a devolução, pelo <strong>CONTRATADO</strong>, dos eventuais valores já pagos referentes a serviços não desenvolvidos.</p>
                    <p><strong><br />CLÁUSULA 7ª - DA</strong> <strong>EXTINÇÃO DO CONTRATO</strong></p>
                    <p>O presente contrato de prestação de serviço extingue-se mediante a ocorrência de uma das seguintes hipóteses:</p>
                    <p style="padding-left: 30px;">I. morte, se pessoa física, ou extinção, se pessoa jurídica, de qualquer das partes;</p>
                    <p style="padding-left: 30px;">II. conclusão do serviço;</p>
                    <p style="padding-left: 30px;">III. rescisão do contrato mediante aviso prévio, por inadimplemento de qualquer das partes ou pela impossibilidade da continuação do contrato, motivada por força maior.</p>
                    <p>Parágrafo único. Ainda que a extinção do contrato tenha sido realizada pelo <strong>CONTRATADO</strong> sem justo motivo, ele terá direito a exigir da <strong>CONTRATANTE</strong> a declaração de que o contrato está findo.</p>
                    <p><strong><br />CLÁUSULA 8ª - DO DESCUMPRIMENTO</strong></p>
                    <p>O descumprimento de quaisquer das obrigações e das cláusulas fixadas neste contrato, seja pelo <strong>CONTRATANTE</strong> ou pelo <strong>CONTRATADO</strong>, ensejará sua imediata rescisão, por justa causa, e sujeitará o infrator ao pagamento de <strong>multa correspondente a</strong> <strong><span id="span_id_multa_descumprimento"  ><span class="variable_vide">________</span></span>% (________ por cento)</strong> da retribuição total, sem prejuízo de indenização ou reparação por eventuais perdas e danos.</p>
                    <p style="text-align: center;"><br /><br /></p>
                    <p style="text-align: center;">.........................................<span style="color: #ffffff;">.</span>,<span style="color: #ffffff;">.</span>.........<span style="color: #ffffff;">.</span>de<span style="color: #ffffff;">.</span>................................<span style="color: #ffffff;">.</span>de<span style="color: #ffffff;">.</span>.............</p>
                    <p style="text-align: center;">(Local e data de assinatura)</p>
                    <p style="text-align: left;"><strong><br /><br /><br />CONTRATANTE:</strong></p>
                    <p style="text-align: center;"><br />_________________________________________</p>
                    <p style="text-align: center;"><strong><span id="span_id_socio_unico_contratante1pj"  >joao paiva</span></strong></p>
                    <p style="text-align: center;"><em>neste ato representando a pessoa jurídica</em> <strong><span id="span_id_nome_contratante1pj"  >rj pinheiro</span></strong></p>
                    <p style="text-align: left;"><strong><br /><br /><br /></strong><strong>:</strong></p>
                    <p style="text-align: center;"><br />_________________________________________</p>
                    <p style="text-align: center;"><strong><span id="span_id_nome_contratado1_ei"  >pedro costa</span></strong></p>
                    <p style="text-align: left;"><strong><br /><br /><br /></strong></p>
                    <p><strong>TESTEMUNHAS:</strong></p>
                    <p style="text-align: center;"><br /><br /><br />_________________________________________</p>
                    <p style="text-align: center;"><em>(assinatura)</em></p>
                    <
                    <p style="text-align: center;"><br /><br /><br />_________________________________________</p>
                    <p style="text-align: center;"><em>(assinatura)</em></p>
                   					
                </div>
				</section>
			</div>
		</div>

	</div>
    </body>
    <script>
        function gerarPdf(){
            var doc = new jsPDF();
            const conteudo = document.getElementById('doc-contrato').innerHTML
            doc.text(conteudo)
            doc.save('contrato.pdf');
        }
        function gerar(){
            document.getElementById('nome-contratante').innerHTML = document.getElementById('contratante').value;
            document.getElementById('cnpj-contratante').innerHTML = document.getElementById('cnpj').value;
            document.getElementById('rua-contratante').innerHTML = document.getElementById('rua').value;
            document.getElementById('bairro-contratante').innerHTML = document.getElementById('bairro').value;
            document.getElementById('cidade-contratante').innerHTML = document.getElementById('cidade').value;
            document.getElementById('nome-representante').innerHTML = document.getElementById('representante').value;
            document.getElementById('cpf-representante').innerHTML = document.getElementById('cpf').value;
            document.getElementById('cidade-representante').innerHTML = document.getElementById('cidade1').value;
            document.getElementById('nome-empresa').innerHTML = document.getElementById('empresa').value;
            document.getElementById('rua-empresa').innerHTML = document.getElementById('rua1').value;
            document.getElementById('bairro-empresa').innerHTML = document.getElementById('bairro1').value;
            document.getElementById('cidade-empresa').innerHTML = document.getElementById('cidade2').value;
            document.getElementById('cnpj-empresa').innerHTML = document.getElementById('cnpj1').value;
            document.getElementById('nome-contratante').innerHTML = document.getElementById('contratante').value;
            
        }
    </script>

</html>