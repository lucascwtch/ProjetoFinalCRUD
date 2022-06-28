<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <title>Flowernet</title>

    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Cadastro</h2>
                    <form method="post" name="flowernet" action="crud.php?acao=inserir" onSubmit="return enviardados();">
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nome" name="nome_cliente" id="nome_cliente">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="CPF" name="cpf" id="cpf">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                <label for="nascimento">Nascimento:</label>
                                    <input type="date" placeholder="Data de Nascimento" name="data_nasc" id="data_nasc">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="sexo" id="sexo">
                                            <option disabled="disabled" selected="selected">Sexo</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Feminimo">Feminimo</option>
                                            <option value="Outro">Outro</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="opcao" id="opcao">
                                    <option disabled="disabled" selected="selected">Deseja:</option>
                                    <option>Presentear</option>
                                    <option>Decoração</option>
                                    <option>Revender</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="email" placeholder="E-mail" name="email" id="email">
                                </div>
                            </div>
                        </div>
                </div>
            </div>


            <br><br><br>



        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Endereço</h2>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Rua" name="rua" id="rua">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="CEP" name="cep" id="cep">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                <label for="entrega">Data de Entrega:</label>
                                    <input type="date" placeholder="Data de Entrega" name="data_entrega" id="data_entrega">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="flor" id="flor">
                                            <option disabled="disabled" selected="selected">Selecione o tipo de Flor:</option>
                                            <option value="Girassóis">Girassóis</option>
                                            <option value="Rosas">Rosas</option>
                                            <option value="Orquideas">Orquideas</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Nome do destinatário" name="destinatario" id="destinatario">
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Escreva uma pequena frase que irá acompanhar o pedido:" name="frase" id="frase">
                        </div>
                </div>
            </div>

        <br><br><br>

        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Pagamento</h2>

                    <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="forma" id="forma">
                                            <option disabled="disabled" selected="selected">Forma de pagamento:</option>
                                            <option value="Crédito">Crédito</option>
                                            <option value="Débito">Débito</option>
                                            <option value="Dinheiro">Dinheiro (no local)</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Nome do Titular" name="titular" id="titular">
                        </div>
                        <div class="input-group">
                            <input class="input--style-2" type="text" placeholder="Número do Cartão" name="numero_cartao" id="numero_cartao">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="CVV" name="cvv" id="cvv">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-2" type="text" placeholder="Quantidade" name="quantidade" id="quantidade">
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="parcelas" id="parcelas">
                                            <option disabled="disabled" selected="selected">Parcelas:</option>
                                            <option value="1x">1x á vista</option>
                                            <option value="2x">2x sem juros</option>
                                            <option value="3x">3x com juros</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Próximo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <script src="js/global.js"></script>

</body>

</html>
