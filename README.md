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
![login](https://github.com/RodrigoChantel/kristta-client/assets/87919246/e24b1b31-ee6c-42e2-9566-5aa53cd20b50)


Prints index:
![index](https://github.com/RodrigoChantel/kristta-client/assets/87919246/73a06d9b-2135-4a1b-a229-bc8e07d23fdb)


Prints Criar solicitação:
![create request](https://github.com/RodrigoChantel/kristta-client/assets/87919246/97216252-e444-47db-b750-361a1fdb04bf)


Prints Faturas:
![invoices](https://github.com/RodrigoChantel/kristta-client/assets/87919246/76d10aca-728b-47d5-ba02-ad7f05cb42c8)


Prints Editar perfil:
![edit-profile](https://github.com/RodrigoChantel/kristta-client/assets/87919246/68e92f86-4f46-4cbb-8a24-84977d1429c2)


IMPORTANTE: AS IMAGENS DE MARCAS PRESENTES NO PROJETO NÃO SÃO PARA USO COMERCIAL, POIS TRATAM-SE DE CLIENTES REAIS.
