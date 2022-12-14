
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excel</title>

    <link rel="stylesheet" href="Css/styleExcel.css">
     <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
            
            <a href="#" class="selected">
                <div class="option">
                    <i class="fas fa-file-excel" title="Excel"></i>
                    <h4>Excel</h4>
                </div>
            </a>

            <a href="pgsPowe.php">
                <div class="option">
                    <i class="fas fa-file-powerpoint" title="Power Point"></i>
                    <h4>PowerPoint</h4>
                </div>
            </a>

           <a onclick="Swal.fire({
                    title: 'Tu codigo de examen es: <b>bRxyn$W57P<b>',
                    showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                     },
                    hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                     }
                })">
                <div class="option">
                    <i class="fa-solid fa-barcode" title="Generar c??digo de examen"></i>
                    <h4>Generar c??digo de examen <b>EXCEL<b></h4>
                </div>
            </a>

        </div>

    </div>


    <main>
         
            <img class="lgo_1" src="imagenes/excel.png">
                    <img class="banE" src="imagenes/bannerE.jpg">
        
<br><br><br>

    <div class="container_videos">
            <!-- <video src="videos/CURSO DE EXCEL 2019.mp4"></video> -->
            <iframe src="videos/CURSO DE EXCEL 2019.mp4"></iframe>
    </div>    


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </main>

    <script src="javaScript/menu.js"></script>
</body>
</html>