
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">

<?php
include_once "conexaobd.php";

$acao = $_GET['acao'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
}


switch ($acao){
    case 'inserir':
        $nome_cliente = $_POST['nome_cliente'];
        $cpf = $_POST['cpf'];
        $data_nasc =  (date('Y-m-d', strtotime($_POST["data_nasc"])));
        $sexo = $_POST['sexo'];
        $opcao = $_POST['opcao'];
        $email = $_POST['email'];

        $rua = $_POST['rua'];
        $cep = $_POST['cep'];
        $data_entrega =  (date('Y-m-d', strtotime($_POST["data_entrega"])));
        $flor = $_POST['flor'];
        $destinatario = $_POST['destinatario'];
        $frase = $_POST['frase'];

        $forma = $_POST['forma'];
        $numero_cartao = $_POST['numero_cartao'];
        $titular = $_POST['titular'];
        $cvv = $_POST['cvv'];
        $quantidade = $_POST['quantidade'];
        $parcelas = $_POST['parcelas'];

        $sqlInsert = "INSERT INTO cliente (nome_cliente, cpf, data_nasc, sexo, opcao, email) VALUES ('$nome_cliente', '$cpf', '$data_nasc', '$sexo', '$opcao', '$email')"; 

        $sqlInsert2 = "INSERT INTO entrega (rua, cep, data_entrega, flor, destinatario, frase) VALUES ('$rua', '$cep', '$data_entrega', '$flor', '$destinatario', '$frase')";

        $sqlInsert3 = "INSERT INTO pagamento (forma, numero_cartao, titular, cvv, quantidade, parcelas) VALUES ('$forma', '$numero_cartao', '$titular', '$cvv', '$quantidade', '$parcelas')";

        if(!mysqli_query($conexaobd,$sqlInsert))
        {
            die("Ocorreu um erro ao cadastrar." . mysqli_error($conexaobd));
         }
         else if(!mysqli_query($conexaobd,$sqlInsert2))
        {
            die("Ocorreu um erro ao cadastrar." . mysqli_error($conexaobd));
          
         }
         else if(!mysqli_query($conexaobd,$sqlInsert3))
         {
            die("Ocorreu um erro ao cadastrar." . mysqli_error($conexaobd));
           
          }
        else
        {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados Cadastrados!');window.location ='inicio.php'</script>
            ";
        }
        break;


        case 'montar':
            $id = $_GET['id'];

            // $sql = "SELECT c.id as id_cliente, c.nome_cliente, c.cpf, c.data_nasc, c.sexo, c.opcao, c.email, ec.id as id_entrega, ec.rua, ec.cep, ec.data_entrega, ec.flor, ec.destinatario, ec.frase, p.id as id_pagamento, p.forma, p.numero_cartao, p.titular, p.cvv, p.quantidade, p.parcelas
            // FROM cliente as c
            // INNER JOIN entrega as ec
            // ON c.id = ec.id 
            // INNER JOIN pagamento as p
            // ON c.id = p.id
            // WHERE c.id = '". $id. "'";
            
            $sql = "SELECT c.id as id_cliente, c.nome_cliente, c.cpf, c.data_nasc, c.sexo, c.opcao, c.email, ec.id as id_entrega, ec.rua, ec.cep, ec.data_entrega, ec.flor, ec.destinatario, ec.frase, p.id as id_pagamento, p.forma, p.numero_cartao, p.titular, p.cvv, p.quantidade, p.parcelas
            FROM cliente as c
            LEFT JOIN entrega as ec
            ON c.id = ec.id
            LEFT JOIN pagamento as p
            ON c.id = p.id
            WHERE c.id = '". $id. "'";

            $resultado = mysqli_query($conexaobd,$sql) or die('Erro ao retornar dados');
            echo "<form method='post' name='flowernet' action='crud.php?acao=atualizar' onSubmit='return enviardados();'>";
            echo "<table width='1000' height='1000' border='0' align='center'>";

            while ($registro = mysqli_fetch_array($resultado)){

          echo"  <div class='page-wrapper bg-red p-t-180 p-b-100 font-robo'>
          <div class='wrapper wrapper--w960'>
              <div class='card card-2'>
                  <div class='card-heading'></div>
                  <div class='card-body'>
                      <h2 class='title'>Editar Cadastro</h2>
                      <div class='input-group'>
                      <label>ID:</label>
                          <input class='input--style-2' type='text' placeholder='ID' name='id' id='id' value='" . $id . "'>
                      </div>
                          <div class='input-group'>
                          <label>Nome:</label>
                              <input class='input--style-2' type='text' placeholder='Nome' name='nome_cliente' id='nome_cliente' value='" . ($registro['nome_cliente']) . "'>
                          </div>
                          <div class='input-group'>
                          <label>CPF:</label>
                              <input class='input--style-2' type='text' placeholder='CPF' name='cpf' id='cpf' value='" . ($registro['cpf']) . "'>
                          </div>
                          <div class='row row-space'>
                              <div class='col-2'>
                                  <div class='input-group'>
                                  <label for='nascimento'>Nascimento:</label>
                                      <input type='date' placeholder='Data de Nascimento' name='data_nasc' id='data_nasc' value='" . ($registro['data_nasc']) . "'>
                                  </div>
                              </div>
                              <div class='col-2'>
                              <div class='input-group'>
                              <label>Sexo:</label>
                                  <input class='input--style-2' type='text' placeholder='Sexo' name='sexo' id='sexo' value='" . ($registro['sexo']) . "'>
                              </div>
                              </div>
                          </div>
                          <div class='col-2'>
                              <div class='input-group'>
                              <label>Opção:</label>
                                  <input class='input--style-2' type='text' placeholder='Deseja:' name='opcao' id='opcao' value='" . ($registro['opcao']) . "'>
                              </div>
                              </div>
                          <div class='row row-space'>
                              <div class='col-2'>
                                  <div class='input-group'>
                                  <label>E-mail:</label>
                                      <input class='input--style-2' type='email' placeholder='E-mail' name='email' id='email' value='" . ($registro['email']) . "'>
                                  </div>
                              </div>
                          </div>
                  </div>
              </div>
  
  
              <br><br><br>
  
  
  
          <div class='wrapper wrapper--w960'>
              <div class='card card-2'>
                  <div class='card-heading'></div>
                  <div class='card-body'>
                      <h2 class='title'>Editar Endereço</h2>
                          <div class='input-group'>
                          <label>Rua:</label>
                              <input class='input--style-2' type='text' placeholder='Rua' name='rua' id='rua' value='" . ($registro['rua']) . "'>
                          </div>
                          <div class='input-group'>
                          <label>CEP:</label>
                              <input class='input--style-2' type='text' placeholder='CEP' name='cep' id='cep' value='" . ($registro['cep']) . "'>
                          </div>
                          <div class='row row-space'>
                              <div class='col-2'>
                                  <div class='input-group'>
                                  <label for='entrega'>Data de Entrega:</label>
                                      <input type='date' placeholder='Data de Entrega' name='data_entrega' id='data_entrega' value='" . ($registro['data_entrega']) . "'>
                                  </div>
                              </div>
                              <div class='input-group'>
                              <label>Flor:</label>
                                  <input type='text' placeholder='Flor' name='flor' id='flor' value='" . ($registro['flor']) . "'>
                              </div>
                          </div>
                          <div class='row row-space'>
                              <div class='col-2'>
                                  <div class='input-group'>
                                  <label>Destinatário:</label>
                                      <input class='input--style-2' type='text' placeholder='Nome do destinatário' name='destinatario' id='destinatario' value='" . ($registro['destinatario']) . "'>
                                  </div>
                              </div>
                          </div>
                          <div class='input-group'>
                          <label>Frase:</label>
                              <input class='input--style-2' type='text' placeholder='Frase:' name='frase' id='frase' value='" . ($registro['frase']) . "'>
                          </div>
                  </div>
              </div>
  
          <br><br><br>
  
          <div class='wrapper wrapper--w960'>
              <div class='card card-2'>
                  <div class='card-heading'></div>
                  <div class='card-body'>
                      <h2 class='title'>Editar Pagamento</h2>
  
                      <div class='col-2'>
                      <div class='input-group'>
                      <label>Titular:</label>
                          <input class='input--style-2' type='text' placeholder='Forma de pagamento:' name='forma' id='forma' value='" . ($registro['forma']) . "'>
                      </div>
                              </div>
                          <div class='input-group'>
                          <label>Titular:</label>
                              <input class='input--style-2' type='text' placeholder='Nome do Titular' name='titular' id='titular' value='" . ($registro['titular']) . "'>
                          </div>
                          <div class='input-group'>
                          <label>Número do Cartão:</label>
                              <input class='input--style-2' type='text' placeholder='Número do Cartão' name='numero_cartao' id='numero_cartao' value='" . ($registro['numero_cartao']) . "'>
                          </div>
                          <div class='row row-space'>
                              <div class='col-2'>
                                  <div class='input-group'>
                                  <label>CVV:</label>
                                      <input class='input--style-2' type='text' placeholder='CVV' name='cvv' id='cvv' value='" . ($registro['cvv']) . "'>
                                  </div>
                              </div>
                          </div>
                          <div class='row row-space'>
                              <div class='col-2'>
                                  <div class='input-group'>
                                  <label>Quantidade:</label>
                                      <input class='input--style-2' type='text' placeholder='Quantidade' name='quantidade' id='quantidade' value='" . ($registro['quantidade']) . "'>
                                  </div>
                              </div>
                          </div>
                          <div class='col-2'>
                          <div class='input-group'>
                          <label>Parcelas:</label>
                              <input class='input--style-2' type='text' placeholder='Parcelas' name='parcelas' id='parcelas' value='" . ($registro['parcelas']) . "'>
                          </div>
                      </div>
                              
                          <div class='p-t-30'>
                              <button class='btn btn--radius btn--green' type='submit'>Atualizar</button>
                          </div>";
  

            }
        mysqli_close($conexaobd);
        break;

    case'atualizar':
            //Cliente
            $id = $_POST['id'];
            $nome_cliente = $_POST['nome_cliente'];
            $cpf = $_POST['cpf'];
            $data_nasc =  (date('Y-m-d', strtotime($_POST["data_nasc"])));
            $sexo = $_POST['sexo'];
            $opcao = $_POST['opcao'];
            $email = $_POST['email'];

            //Entrega
            $rua = $_POST['rua'];
            $cep = $_POST['cep'];
            $data_entrega =  (date('Y-m-d', strtotime($_POST["data_entrega"])));
            $flor = $_POST['flor'];
            $destinatario = $_POST['destinatario'];
            $frase = $_POST['frase'];

            //Pagamento
            $forma = $_POST['forma'];
            $numero_cartao = $_POST['numero_cartao'];
            $titular = $_POST['titular'];
            $cvv = $_POST['cvv'];
            $quantidade = $_POST['quantidade'];
            $parcelas = $_POST['parcelas'];

            $sql = "UPDATE cliente as c
            INNER JOIN entrega as ec ON c.id = ec.id
            INNER JOIN pagamento as p ON c.id = p.id
            SET c.nome_cliente = '$nome_cliente', c.cpf = '$cpf', c.data_nasc ='$data_nasc', c.sexo = '$sexo', c.opcao = '$opcao', c.email = '$email', 
            ec.rua = '$rua', ec.cep = '$cep', ec.data_entrega = '$data_entrega', ec.flor = '$flor', ec.destinatario = '$destinatario', ec.frase = '$frase',
            p.forma = '$forma', p.numero_cartao = '$numero_cartao', p.titular = '$titular', p.cvv = '$cvv', p.quantidade = '$quantidade', p.parcelas = '$parcelas'  
            WHERE c.id = '$id'";


        if (!mysqli_query($conexaobd,$sql)){
            die('</br> Erro no comando SQL UPDATE: '. mysqli_error($conexaobd));
            echo "<script language='javascript' type='text/javascript'>
            alert('ERRO!!')
            window.location.href='crud.php?acao=selecionar'</script>";
        }else{
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados atualizados com sucesso!')
            window.location.href='crud.php?acao=selecionar'</script>";
        }
        mysqli_close($conexaobd);
        break;

        case 'deletar':

            $id = $_GET['id'];
            $sql = "DELETE c, ec, p FROM cliente as c INNER JOIN entrega as ec ON c.id = ec.id INNER JOIN pagamento p on c.id = p.id WHERE c.id = '". $id. "'";
    
            if(!mysqli_query($conexaobd,$sql))
        {
            die("erro ao inserir informações" . mysqli_error($conexaobd));
        }
            else
        {
            echo "<script language='javascript' type='text/javascript'>
            alert('Dados Deletados!')
            window.location.href='crud.php?acao=selecionar'</script>";
        }
        mysqli_close($conexaobd);
        header("Location:crud.php?acao=selecionar");
    
    
            break;

    case 'selecionar':
        date_default_timezone_set('America/Sao_Paulo');

        echo "<meta charset=utf-8>";
        echo "<center><table border=1>";
        echo "<a class='btn btn-primary' href='inicio.php' role='button'>Início</a>";

        echo "<tr>";

        echo "<th>ID</th>";
        echo "<th>NOME</th>";
        echo "<th>CPF</th>";
        echo "<th>NASCIMENTO</th>";
        echo "<th>SEXO</th>";
        echo "<th>OPÇÃO</th>";
        echo "<th>EMAIL</th>";
        echo "<th>RUA</th>";
        echo "<th>CEP</th>";
        echo "<th>ENTREGA</th>";
        echo "<th>FLOR</th>";
        echo "<th>DESTINATÁRIO</th>";
        echo "<th>FRASE</th>";
        echo "<th>PAGAMENTO</th>";
        echo "<th>NUMERO</th>";
        echo "<th>TITULAR</th>";
        echo "<th>CVV</th>";
        echo "<th>QUANTIDADE</th>";
        echo "<th>PARCELAS</th>";


        echo "</tr>";
        
        $sql = "SELECT c.id as id_cliente, c.nome_cliente, c.cpf, c.data_nasc, c.sexo, c.opcao, c.email, ec.id as id_entrega, ec.rua, ec.cep, ec.data_entrega, ec.flor, ec.destinatario, ec.frase, p.id as id_pagamento, p.forma, p.numero_cartao, p.titular, p.cvv, p.quantidade, p.parcelas
        FROM cliente as c
        LEFT JOIN entrega as ec
        ON c.id = ec.id 
        LEFT JOIN pagamento as p
        ON c.id = p.id";
        
        $resultado = mysqli_query($conexaobd, $sql) or die("Erro ao retornar dados");


        echo "<CENTER><h1>REGISTROS ATUAIS NO BANCO DE DADOS!</h1><br/></CENTER>";
        echo "<br>";

        while($registro = mysqli_fetch_array($resultado)){
            //Cliente
            $id = $registro['id_cliente'];
            $nome_cliente = $registro['nome_cliente'];
            $cpf = $registro['cpf'];
            $data_nasc =  (date('d-m-Y', strtotime($registro["data_nasc"])));
            $sexo = $registro['sexo'];
            $opcao = $registro['opcao'];
            $email = $registro['email'];
    
            //Entrega
            $rua = $registro['rua'];
            $cep = $registro['cep'];
            $data_entrega =  (date('d-m-Y', strtotime($registro["data_entrega"])));
            $flor = $registro['flor'];
            $destinatario = $registro['destinatario'];
            $frase = $registro['frase'];
    
            //Pagamento
            $forma = $registro['forma'];
            $numero_cartao = $registro['numero_cartao'];
            $titular = $registro['titular'];
            $cvv = $registro['cvv'];
            $quantidade = $registro['quantidade'];
            $parcelas = $registro['parcelas'];


            //Mostrar
            echo"<ul>";
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" . $nome_cliente . "</td>";
            echo "<td>" . $cpf . "</td>";
            echo "<td>" . $data_nasc . "</td>";
            echo "<td>" . $sexo . "</td>";
            echo "<td>" . $opcao . "</td>";
            echo "<td>" . $email . "</td>";
            echo"</ul>";

            echo"<ul>";
            echo "<td>" . $rua . "</td>";
            echo "<td>" . $cep . "</td>";
            echo "<td>" . $data_entrega . "</td>";
            echo "<td>" . $flor . "</td>";
            echo "<td>" . $destinatario . "</td>";
            echo "<td>" . $frase . "</td>";
            echo"</ul>";

            echo"<ul>";
            echo "<td>" . $forma . "</td>";
            echo "<td>" . $numero_cartao . "</td>";
            echo "<td>" . $titular . "</td>";
            echo "<td>" . $cvv . "</td>";
            echo "<td>" . $quantidade . "</td>";
            echo "<td>" . $parcelas . "</td>";
            echo"</ul>";



            echo "<td><a href='crud.php?acao=deletar&id=$id'><img src='./images/delete.png' alt='Deletar' title='Deletar registro'></a>
            <a href='crud.php?acao=montar&id=$id'><img src='./images/update.png' alt='Atualizar' title='Atualizar registros'>
            </a>
            <a href='index.php'><img src='./images/insert.png' alt='Inserir' title='Inserir registro'></a></td>";
            echo "</tr>";

        }

        mysqli_close($conexaobd);
        break;

    default:
        header("Location:crud.php?acao=selecionar");
        break;
}
?>