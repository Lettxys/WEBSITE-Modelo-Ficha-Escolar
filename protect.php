<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    
    include("header.php");
    
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EEEP Manoel Mano | Login</title>
        <!-- Favicon EEEP Manoel Mano -->
        <link rel="icon" type="image/png" sizes="32x32" href="assets/iconmm.png">
        <!-- Estilização de Login -->
        <link rel="stylesheet" href="styles/login.css">
        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                display: flex;
                flex-direction: column;
                min-height: 100vh;
                margin: 0;
            }
            
            .container {
                flex: 1;
                display: flex;
                flex-direction: column;
            }
            
            .area-formulario {
                flex: 1;
                display: flex;
                align-items: center;
                justify-content: center;
            }
        </style>
    </head>
    <body>
    
        <div class="container align-items-center mt-5"> 
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 mt-5">
                    <p>Você não pode acessar esta página porque não está logado</p>
                    <div class="submit">
                        <button class="btn btn-success">
                            <a href="login.php" class="link-underline link-underline-opacity-0 text-light">Login</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
    ';
    
    include("footer.php");
    
    echo '
        <!-- Bootstrap JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>';
    
    die("");
}

?>
