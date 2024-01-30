# kristta-Back-end-v1.0-rea-do-Cliente-PHP
kristta Back-end v1.0 Área do Cliente feita em PHP

**REQUISITOS**

PHP VERSION - 7.4.33+
(Também é funcional em versões anteriores por conta da baixa complexidade)

Importe a database kristta_old.sql para o mysql e edite o arquivo mode/connection.php nas linhas 15, 16, 17 e 18 conforme a sua configuração:

```if($connectWeb == 0){```
```
    $host = "SEU IP";
    $user = "SEU USUÁRIO DO BANCO DE DADOS";
    $password = "SENHA DO BANCO DE DADOS";
    $db = "NOME DA DATABASE";

    $connect = mysqli_connect ($host, $user, $password, $db) or die ('Falha na conexão com o Banco de Dados. <br> Contate o Administrador.');
    return $connect;
    
}else{
    return $connectWeb;
}

```
Na tabela 'users' inclua ao menos um usuário (A senha utiliza criptografia hash)

Prints login:
![login](https://github.com/RodrigoChantel/kristta-Back-end-v1.0-rea-do-Cliente-PHP/assets/87919246/82e65b1a-103a-4fc8-b9e4-25af96a7e68d)

Prints index:
![index](https://github.com/RodrigoChantel/kristta-Back-end-v1.0-rea-do-Cliente-PHP/assets/87919246/9a305645-9162-41c6-8d56-451cb6062ce4)

Prints Criar solicitação:
![create request](https://github.com/RodrigoChantel/kristta-Back-end-v1.0-rea-do-Cliente-PHP/assets/87919246/ce3b2726-0f8e-4147-88d3-c014c41ef614)

Prints Faturas:
![invoices](https://github.com/RodrigoChantel/kristta-Back-end-v1.0-rea-do-Cliente-PHP/assets/87919246/8b17f267-4dce-4c2a-89e1-ceb80b52b964)

Prints login:
![edit-profile](https://github.com/RodrigoChantel/kristta-Back-end-v1.0-rea-do-Cliente-PHP/assets/87919246/b835ae3f-4441-4c84-9910-30edc5d76862)

IMPORTANTE: AS IMAGENS DE MARCAS PRESENTES NO PROJETO NÃO SÃO PARA USO COMERCIAL, POIS TRATAM-SE DE CLIENTES REAIS.
