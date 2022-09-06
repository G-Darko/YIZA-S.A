<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PowerPoint</title>

    <link rel="stylesheet" href="Css/stylePower.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<body id="body">
    
    <header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fab fa-windows"></i>
            <h4>Emprendimiento Microsoft</h4>
        </div>

        <div class="options__menu"> 

            <a href="menu.php" >
                <div class="option">
                    <i class="fas fa-home" title="Inicio"></i>
                    <h4>Inicio</h4>
                </div>
            </a>

            <a href="pgsWord.php">
                <div class="option">
                    <i class="fas fa-file-word" title="Word"></i>
                    <h4>Word</h4>
                </div>
            </a>
            
            <a href="pgsExcel.php">
                <div class="option">
                    <i class="fas fa-file-excel" title="Excel"></i>
                    <h4>Excel</h4>
                </div>
            </a>

            <a href="pgsPowe.php" class="selected">
                <div class="option">
                    <i class="fas fa-file-powerpoint" title="Power Point"></i>
                    <h4>PowerPoint</h4>
                </div>
            </a>

           <a onclick="Swal.fire({
                    title: 'Tu codigo de examen es: <b>!Jya@CHpBC<b>',
                    showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                     },
                    hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                     }
                })">
                <div class="option">
                    <i class="fa-solid fa-barcode" title="Generar código de examen"></i>
                    <h4>Generar código de examen POWER POINT</h4>
                </div>
            </a>

        </div>

    </div>


    <main>
         
            <img class="lgo_1" src="imagenes/power.png">
                <img class="banP" src="imagenes/bannerP.jpg">

        <br><br><br>

        <div class="container_videos">
            <!-- <video src="videos/CURSO DE POWERPOINT 2019.mp4"></video> -->
            <iframe src="videos/CURSO DE POWERPOINT 2019.mp4"></iframe>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>  
    </main>

        <script src="javaScript/menu.js"></script>
</body>
</html>