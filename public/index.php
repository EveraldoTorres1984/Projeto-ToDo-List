<?php
require 'config.php';
require 'models/Auth.php';

$auth = new Auth($conn);
$userInfo = $auth->checkToken();

require 'partials/header.php';
?>


<body class="bg-light">
    <div class="container">         
 
    <form action="table_action.php" method="POST">
        <div class="container">
            <div class="row justify-content-center m-auto shadow bg-transparent mt-3 py-3 col-md-6 mt-5">                              
                <div class="col-8">
                    <input type="text" name="tarefa" class="form-control" id="inserirTarefa" placeholder="Insira aqui a tarefa">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary">Adicionar</button>
                </div>
            </div>
        </div>
    </form>
        <div class="row">            
            <div class="col-md-12">                
                <table class="table table-striped mt-5">
                    <thead id="center-thead"">
                        <tr>
                        <th scope=" col" class="table-primary fs-4">ID</th>
                        <th scope="col" class="table-primary fs-4">Tarefa</th>
                        <th scope="col" class="table-primary fs-4">Criada em</th>
                        <th scope="col" class="table-primary fs-4">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td class="col-md-4">
                                <div id="btn-acao">
                                    <button class=" btn btn-warning">Editar</button>
                                    <button class=" btn btn-danger">Apagar</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>