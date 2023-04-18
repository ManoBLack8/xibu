<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      width: 100vw;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .app-container {
      width: 100%;
      height: 100%;
      /* display: flex;
      align-items: center;
      justify-content: space-around;
      flex-direction: column; */
    }

    .telas {
      width: 100%;
      display: grid;
      grid-template-columns: repeat(2, 1fr);
    }

    .tela {
      width: 100%;
      object-fit: contain;
    }

    .noticias {
      width: 100%;
      padding: 16px;
      background-color: #646464;
    }

    #noticia {
      font-size: 24px;
      color: white;
    }
  </style>
</head>

<body>
  <!-- <img id="logo" src="logo.svg" alt="" style="z-index: 999; display:flex"> -->
  <div class="app-container">
    <!-- DIV das telas -->
    <div class="telas">
      <img class="tela" src="" id="imagem" alt="">
      <img class="tela" src="" id="imagem2" alt="">
    </div>
    <!-- DIV das noticias -->
    <div class="noticias">
      <marquee behavior="" direction="">
        <p id="noticia"></p>
      </marquee>
    </div>
  </div>
  <script>
    i = 0;
    i2 = 0;
    atualizarPosts()
    setInterval(atualizarPosts, 10000)

    fetch('http://localhost:8081/noticias.php')
      .then(response => response.json())
      .then(data => {
        document.getElementById("noticia").innerText = data;
      })

    function atualizarPosts() {
      fetch('http://localhost:8081/posts.php')
        .then(response => response.json())
        .then(data => {
          // fazer algo com os dados JSON recebidos
          var img = document.getElementById("imagem");
          qtd = data.length
          if (i >= (qtd - 1)) {
            i = 0
          } else {
            i++
          }
          img.src = "http://localhost:8081/" + data[i];
          //console.log(data);
        })
        .catch(error => {
          console.error('Erro ao obter dados JSON:', error);
        });

      fetch('http://localhost:8081/github.php')
        .then(response => response.json())
        .then(data => {
          // fazer algo com os dados JSON recebidos

          var img2 = document.getElementById("imagem2");
          qtd = data.length
          if (i2 >= (qtd - 1)) {
            i2 = 0
          } else {
            i2++
          }



          img2.src = "http://localhost:8081/" + data[i2];
          console.log(img2.src)

        })
        .catch(error => {
          console.error('Erro ao obter dados JSON:', error);
        });
    }

  </script>
</body>

</html>