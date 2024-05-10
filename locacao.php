<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "livraria_allisson";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $erro) {
    echo "Conexão falhou: " . $erro->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous" />

        <title>Locação de Livros</title>
    </head>

    <body class="container bg-light">
        <?php
        if (isset($_POST['submit'])) {
            $livro_nome = $_POST['nome_livro'];
            $cliente_nome = $_POST['nome_cliente'];
            $cliente_email = $_POST['email'];
            $data_locacao = $_POST['dateLocacao'];
            $data_prevista = $_POST['data_lancamento'];

            $query = 'INSERT INTO locaoes(
            cliente_nome,  cliente_email, data_locacao,data_prevista,data_devolucao
            ) VALUES (:cliente_nome,:cliente_email,:data_locacao,:data_prevista)';
            $conexao = $conn->prepare($query);
            $conexao->bindValue(":nome_livro",  $livro_nome );
            $conexao->bindValue(":nome_cliente",$cliente_nome);
            $conexao->bindValue(":email", $cliente_email);
            $conexao->bindValue(":data_locacao", $data_locacao);
        

            $conexao->execute();
            echo '<script>alert("Produto cadastrado com sucesso")</script>';
        }
        ?>

        <!-- Start Header form -->
        <div class="text-center pt-5">
            <h2><strong>Locacao de livros</strong> </h2>
            <p>
                Entre com os dados
            </p>
        </div>

        <div class="card">

            <div class="card-body">

                <form id="bookingForm" action="#" method="post" class="needs-validation" novalidate autocomplete="off">

                    <div class="form-group">
                        <label for="inputName">Nome do Livro</label>
                        <input type="text" class="form-control" id="inputName" name="nome_livro" placeholder="Nome do Livro" required />
                    </div>

                    <div class="form-group">
                        <label for="inputName">Nome do cliente</label>
                        <input type="text" class="form-control" id="inputName" name="nome_cliente" placeholder="Nome do cliente" required />
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email do cliente</label>
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Enter email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required />
                    </div>

                     <div class="form-group col-md-4">
                        <label for="inputDate">Data Locacao</label>
                        <input type="date" class="form-control" id="inputDate" name="dateLocacao" required />
                        <small class="form-text text-muted">Data da Locacao</small>
            </div>
            <div class="form-group col-md-4">
                        <label for="inputDate">Data Devolucao</label>
                        <input type="date" class="form-control" id="inputDate" name="date devolucao" required />
                        <small class="form-text text-muted">Data devolucao</small>
            </div>

            <hr />

            <button class="btn btn-primary btn-block col-lg-2" type="submit" name="submit">Submit</button>
            </form>
        </div>

        </div>
    </body>
</body>

</html>