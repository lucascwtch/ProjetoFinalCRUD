CREATE TABLE cliente(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_cliente VARCHAR(150),
    cpf VARCHAR(150),
    data_nasc date,
    sexo VARCHAR(100),
    opcao VARCHAR(100),
    email VARCHAR(150)
    );
CREATE TABLE entrega(
    id INT AUTO_INCREMENT PRIMARY KEY, 
    rua VARCHAR(200),
    cep VARCHAR(100),
    frase VARCHAR(300),
    flor VARCHAR(100),
    destinatario VARCHAR(200),
    data_entrega date,
    id_user INT
    );
CREATE TABLE pagamento(
    id INT AUTO_INCREMENT PRIMARY KEY,
    forma VARCHAR(200),
    numero_cartao VARCHAR(100),
    titular VARCHAR(200),
    cvv VARCHAR(20),
    quantidade VARCHAR(100),
    parcelas VARCHAR(200),
    id_pag int
    );

ALTER TABLE entrega ADD FOREIGN key(id_user) REFERENCES cliente(id);

ALTER TABLE pagamento ADD FOREIGN key(id_pag) REFERENCES cliente(id);
