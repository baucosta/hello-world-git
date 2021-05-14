<?php 

include('classes/Student.class.php');
// use classes\Student;

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">


    <title>Hello, world!</title>
  </head>
  <body>

    <?
        if(isset($_GET['id'])) {
            $studentObj = new Student();
            $studentObj->setId($_GET['id']);
            $studentObj->delete();
        }

    ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">CPF</th>
                <td>Excluir</td>
            </tr>
        </thead>
        <tbody>
            <?php

                $student = new Student();
                $stmt = $student->read();

                if ($stmt->rowCount() == 0) {?>
                    <tr class="text-center">
                        <td colspan="5">Nenhum registro encontrado</td>
                    </tr>
            <?  } 
                else {
                    while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                    // while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
                        <tr>
                            <th scope="row"><?=$row->id?></th>
                            <td><?=$row->name?></td>
                            <td><?=$row->email?></td>
                            <td><?=$row->phone?></td>
                            <td><?=$row->cpf?></td>
                            <td>
                                <a href="javascript:void(0)" onclick="excluir_registro('<?=$row->id?>')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                <?  } 
                }
            ?>
            
        </tbody>
    </table>
    
    <a href="pages/new_register.php" class="btn btn-primary">Novo</a>
    
    
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <script>
        function excluir_registro(id) {
            if (confirm('Quer excluir mesmo?')) {
                window.location.href='index.php?id=' + id;
            }
        }
    </script>
  </body>
</html>