<!DOCTYPE html>
<html lang="pt-br" style="
    width: 100%;
    HEIGHT: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    align-content: center;
    width: 100%;
">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head> 
<body>
  <!-- <img id="logo" src="logo.svg" alt="" style="z-index: 999; display:flex"> -->
  <div id="body" style="max-width:100%;height: 100%;align-items: center;justify-content: space-around;flex-direction: column;align-content: stretch;">
  <!-- DIV das telas -->
    <div class="telas" style="width: 100%;height: 95%;display: flex;flex-direction: row;">
      <img src="" style="object-fit: contain;width:50%;height: 95%;" id="imagem" alt="">
      <img src="" style="object-fit: contain;width:50%;height: 95%;" id="imagem2" alt="">  
    </div>
  <!-- DIV das noticias -->
    <div style="background-color:#646464;display: flex;align-items: flex-end;">
      <marquee> 
        <h5 style="font-size: 24px; color:#ffff; margin:0px;" id="noticia"></h5>
      </marquee>
    </div>
  </div>
</body>
</html>
<script>
  atualizarPosts()
  setInterval(function(){ atualizarPosts() }, 10000)

  
  
  fetch('http://localhost:8081/noticias.php')
  .then(response => response.json())
  .then(data => {
    consoe.log(data);
    document.getElementById("noticia").innerText = response;
  })



function atualizarPosts(){
  fetch('http://localhost:8081/posts.php')
  .then(response => response.json())
  .then(data => {
    // fazer algo com os dados JSON recebidos
var img = document.getElementById("imagem");
    qtd = data.length
    i = Math.floor(Math.random() * qtd);
    img.src = data[i];
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
  
    i2 = Math.floor(Math.random() * qtd);
    img2.src = data[i2];
    console.log(data);
  })
  .catch(error => {
    console.error('Erro ao obter dados JSON:', error);
  });

  
}

</script>