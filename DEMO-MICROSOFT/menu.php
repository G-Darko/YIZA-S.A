<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MENU</title>
    <link rel="stylesheet" href="Css/styleMenu.css">
    <script src="https://kit.fontawesome.com/41bcea2ae3.js" crossorigin="anonymous"></script>
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

            <a href="#" class="selected">
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

            <a href="pgsPowe.php">
                <div class="option">
                    <i class="fas fa-file-powerpoint" title="Power Point"></i>
                    <h4>PowerPoint</h4>
                </div>
            </a>

            <a onclick="Swal.fire({
                title: '¿Quieres salie de la sesión?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, salir de la sesión'
                }).then((result) => {
                  if (result.isConfirmed) {
                    Swal.fire(
                      'Saliendo...',
                      'Nos vemos pronto',
                      'warning'
                    )
                    setTimeout( function() { window.location.href = 'index.php'; }, 800 );
                  }
                })">
                <div class="option">
                    <i class="fa-solid fa-arrow-right-from-bracket" title="Cerrar Sesión"></i>
                    <h4>Cerrar Sesión</h4>
                </div>
            </a>

        </div>

    </div>

    <main>
        
        <div class="lgo">
            <img src="imagenes/logo.png">
        </div>
       <p id="p1">Curso<br> 
               Microsoft</p> 
       <div class="container_text">
           <span>L</span>a certificación Tecnología Microsoft para la Productividad es una credencial nacional que valida competencias y habilidades en las herramientas Microsoft Office, las cuales son ampliamente utilizadas por universidades, corporativos y gobiernos en todo el mundo.
           Aplicaciones Microsoft para la Productividad:
           <ul>
               <li>Microsoft Word</li>
               <li>Microsoft Excel</li>
               <li>Microsoft Power Point</li>
           </ul>
           Esta certificación Tecnología Microsoft para la Productividad valida conocimientos, competencias y habilidades con escenarios prácticos del mundo real. Los candidatos al obtener esta importante certificación podrán desarrollar y poner en práctica su creatividad e innovación, a través de documentos, hojas de cálculo y presentaciones de alta calidad con Microsoft Office.
           La certificación Tecnología Microsoft para la Productividad permite a los candidatos sobresalir entre otros candidatos. Esta valiosa certificación permite que estudiantes incrementen sus posibilidades en el mercado laboral, así como profesionales aumenten su desarrollo profesional para posibles promociones laborales.
       </div>


           <div class="container__cards">

        <div class="card">
            <div class="cover">
                <img id="img_WH" src="imagenes/excel.png" alt="">
                <div class="img__back"></div>
            </div>
            <div class="description">
                <h2>Examen Excel</h2>
                <p>Haz terminado el curso de excel? Entonces estaras preparado para realizar una prueba simulacro para ver que tanto aprendiste... Suerte!<br>
                <article>tfasghdigyhbslk</article></p>
                <a href="https://forms.gle/j9t8rDcXDyyegAD87" target="_blank"><input type="button" value="Entrar ahora"></a>
            </div>
        </div>

        <div class="card">
            <div class="cover">
                <img id="img_WH" src="imagenes/word.png" alt="">
                <div class="img__back"></div>
            </div>
            <div class="description">
                <h2>Examen Word</h2>
                <p>Haz terminado el curso de Word? Entonces estaras preparado para realizar una prueba simulacro para ver que tanto aprendiste... Suerte!<br>
                 <article>tfasghdigyhbslk</article></p>
                <a href="https://forms.gle/XpY8gCARMuW2n5SZA" target="_blank"><input type="button" value="Entrar ahora"></a>
            </div>
        </div>

        <div class="card">
            <div class="cover">
                <img id="img_WH" src="imagenes/power.png" alt="">
                <div class="img__back"></div>
            </div>
            <div class="description">
                <h2>Examen Power Point</h2>
                <p>Haz terminado el curso de PowerPoint? Entonces estaras preparado para realizar una prueba simulacro para ver que tanto aprendiste... Suerte! <article><article></p>
                <a href="https://forms.gle/BFnr2ycX2WowS6ae7" target="_blank"><input type="button" value="Entrar ahora"></a>
            </div>
        </div>

    </div>



    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </main>
    <script src="javaScript/menu.js"></script>
</body>
</html>