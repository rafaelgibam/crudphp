<?php require_once "autoload.php"; ?>
<?php
$user = new \Models\Usuario();

if(isset($_POST['cadastrar'])){
    $login = (isset($_POST['login'])) ? $_POST['login'] : null;
    $senha = (isset($_POST['senha'])) ? $_POST['senha'] : null;

    if(isset($login) && isset($senha) && !empty($login) && !empty($senha)) {

        $user->setLogin($login);
        $user->setSenha($senha);
        $user->insert();

    }
}

if(isset($_GET['a']) && $_GET['a'] == "d"){
    $user->delete($_GET['id']);
}


if(isset($_POST['editar'])){
    if(isset($_GET['a']) && $_GET['a'] == "e"){

        $login = (isset($_POST['login'])) ? $_POST['login'] : null;
        $senha = (isset($_POST['senha'])) ? $_POST['senha'] : null;

        $user->setLogin($login);
        $user->setSenha($senha);

        $user->update($_GET['id']);

        header("Location: index.php");

    }
}



?>


<!doctype html>
<html lang="pt-br">
<head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Usuário CRUD</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 mt-5">

            <?php if(isset($_GET['a']) && $_GET['a'] == "e") :
                $id = (int) $_GET['id'];
                $resultado = $user->find($id);
            ?>
                <form method="post">
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInput">Login</label>
                            <input type="text" name="login" class="form-control mb-2" id="inlineFormInput" value="<?= $resultado->login ?>" placeholder="Digite seu Login">
                        </div>
                        <div class="col-auto">
                            <label class="sr-only" for="inlineFormInputGroup">Senha</label>
                            <div class="input-group mb-2">
                                <input type="text" name="senha" class="form-control" id="inlineFormInputGroup" value="<?= $resultado->senha ?>" placeholder="Digite sua Senha">
                            </div>
                        </div>
                        <div class="col-auto">
                            <button type="submit" name="editar" class="btn btn-primary mb-2">Editar</button>
                        </div>
                    </div>
                </form>
            <?php else : ?>

            <form method="post">
                <div class="form-row align-items-center">
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInput">Login</label>
                        <input type="text" name="login" class="form-control mb-2" id="inlineFormInput" placeholder="Digite seu Login">
                    </div>
                    <div class="col-auto">
                        <label class="sr-only" for="inlineFormInputGroup">Senha</label>
                        <div class="input-group mb-2">
                            <input type="text" name="senha" class="form-control" id="inlineFormInputGroup" placeholder="Digite sua Senha">
                        </div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" name="cadastrar" class="btn btn-primary mb-2">Cadastrar</button>
                    </div>
                </div>
            </form>
            <?php endif; ?>
        </div>
        <div class="col-2"></div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8 mt-5">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">LOGIN</th>
                        <th scope="col">SENHA</th>
                        <th scope="col">CRIADO EM</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($user->findAll() as $key => $value): ?>
                    <tr>
                        <th scope="row"><?= $value->id ?></th>
                        <td><?= $value->login ?></td>
                        <td><?= $value->senha ?></td>
                        <td><?= $value->criado_em ?></td>
                        <td><a href="?a=e&id=<?= $value->id ?>">Editar / </a><a href="?a=d&id=<?= $value->id ?>">/ Deletar</a></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
        <div class="col-2"></div>
    </div>
</div>

<!-- JavaScript (Opcional) -->
<!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>