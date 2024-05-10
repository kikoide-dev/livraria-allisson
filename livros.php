<?php
    if(isset($_POST['submit']))
    {
        include_once('config.php');     

        $nome = $_POST['nome_livro'];
        $email = $_POST['Autor_livro'];
        $data = $_POST['dataLancamento'];

        $sql=  "$conexao,INSERT INTO locacoes(
            nome_livro, autor_livro, dataLancamento
            ) VALUES ($nome, $email, $data)";

     $result = $mysqli->query($sql);
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<title>Cadastro Livros</title>
</head>

<body>
    <h1>Cadastrar Livros</h1>

    <div class="card-body">

        <form id="bookingForm" action="livros.php" method="post" class="needs-validation" novalidate autocomplete="off">

            <div class="form-group">
                <label for="inputName">Nome do Livro</label>
                <input type="text" class="form-control" id="inputName" name="nome_livro" placeholder="Nome do Livro" required />
            </div>

            <div class="form-group">
                <label for="inputName">Autor do livro</label>
                <input type="text" class="form-control" id="inputName" name="Autor_livro" placeholder="Nome do autor" required />
            </div>
            <div>
                <label for="inputDate">Data Lancamento</label>
                <input type="date" class="form-control" id="inputDate" name="dataLancamento" required />
            </div>
            <hr />

            <button class="btn btn-primary btn-block col-lg-2" type="submit" name="submit">Submit</button>
        </form>


    </div>



</body>

</html>