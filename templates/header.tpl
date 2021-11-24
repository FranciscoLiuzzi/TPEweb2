<!DOCTYPE html>
    <html lang="es">

    <head>
        <base href=""/>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>lucho's music reviews</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/1450442834.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{BASE_URL}home">ConoceTuMusica.com</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{BASE_URL}home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}albums">Albums</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{BASE_URL}artist">Artistas</a>
                        </li>
                        {if $admin}
                            <li class="nav-item">
                                <a class="nav-link" href="{BASE_URL}admin">Admin</a>
                            </li>
                        {/if}
                    </ul>
                        {if (!$logged)}
                            <li class="nav-item">
                                <a class="nav-link" href="{BASE_URL}login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{BASE_URL}register">Register</a>
                            </li>
                        {else if $logged}  
                            <li class="nav-item">
                                <a class="nav-link" href="{BASE_URL}logout">Logout</a>
                            </li> 
                        {/if}
                    </ul>
                </div>
            </div>
        </nav>
    
