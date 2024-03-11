<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrossel de Fotos</title>

    <!-- Adicione os estilos do Slick Carousel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <!-- Adicione o jQuery e o Slick Carousel JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <style>
        .carousel-container {
            max-width: 40%;
            margin: 0 auto;
        }

        .item {
            width: 100px;
            height: 200px;
            border: 2px solid #000;
            border-radius: 20px;
            margin: 20px;
        }

        .carousel {
            width: 100%; /* Alterado para 100% para ocupar a largura do contêiner */
        }

        .catalog-item {
            text-align: center;
            margin: 20px;
            border: 2px solid #000;
            border-radius: 20px;
            width: 1000px;
        }

        .catalog-item img {
            width: 100px;
            height: 100px;
            margin-top: 20px;

        }

        .input{
            width: 60%;
            text-align: center;
            outline: none;
        }

        .search-bar{
            text-align: center;
        }
        .busca{
            display: flex; 
            justify-content: space-around;
        }
    </style>
</head>
<body>
    <div style="text-align: center;">
        <h1>Tabacaria do Jota</h1>
    </div>
    
    <div class="carousel-container">
        <div class="carousel">
            <img src="imgs/narguile.webp" alt="Imagem 1" class="item"/>
            <img src="imgs/pods.jfif" alt="Imagem 2" class="item">
            <img src="imgs/zomo.jpg" alt="Imagem 3" class="item">
        </div>
    </div>
    <div class="search-bar">
        <input type="text" placeholder="Digite o produto que deseja" class="input">
    </div>

    <!---fazer a busca aqui--->
         <?php
            require_once './class/Produto.php';

            $p = new produto();

            // Verifica se a chave 'filtro' está definida em $_GET
                $filtro = isset($_GET['filtro']) ? $_GET['filtro'] : '';

            // Corrigido de 'filtrar' para 'listar'
             $lista = $p->listar($filtro);

             foreach ($listar as $produto) {
              echo "
               <tr>
                  <td>$produto->id</td>
                  <td>$produto->nome</td> 
               </tr>";
             }
           ?>
            
    <!---fazer a busca aqui--->

    <div class='busca'>
        <div class="catalog-item">
            <img src="imgs/narguile.webp" alt="Narguile"/>
            <p>Narguile</p>
            <p>Preço: R$120</p>
        </div>
        <div class="catalog-item">
            <img src="imgs/pods.jfif" alt="Pods"/>
            <p>Pods</p>
            <p>Preço: R$50</p>
        </div>
        <div class="catalog-item">
            <img src="imgs/zomo.jpg" alt="Zomo"/>
            <p>Zomo</p>
            <p>Preço: R$25</p>
        </div>
    </div>

    <script>
        // Inicialize o Slick Carousel
        $(document).ready(function(){
            $('.carousel').slick({
                dots: true, // Adiciona pontos de navegação
                autoplay: true, // Ativa a reprodução automática
                autoplaySpeed: 2000 // Define a velocidade da reprodução automática em milissegundos
            });
        });
    </script>

</body>
</html>