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
  <img id="logo" src="logo.svg" alt="" style="z-index: 999; display:flex">
  <div id="body" style="display: none;max-width:100%;height: 100%;align-items: center;justify-content: space-around;flex-direction: column;align-content: stretch;">
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
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script>
  setInterval(function(){ atualizarPosts() }, 10000)

  
  
  $.ajax({
  type: "GET",
  url: "noticias.php",
  dataType: "json",
  success: function(response) {
    console.log(response);
    document.getElementById("noticia").innerText = response;
  },
  error: function(xhr, status, error) {
    console.error("Error: " + error);
  }
});

setInterval($.ajax({
  type: "GET",
  url: "pip.php",
  dataType: "text",
  success: function(response) {
    console.log(response);
  },
  error: function(xhr, status, error) {
    console.error("Error: " + error);
  }
})
, 1)


function atualizarPosts(){
  $.ajax({
  type: "GET",
  url: "posts.php",
  dataType: "json",
  success: function(response) {
      var body = document.getElementById("body")
    body.style.display= "flex";
    var logo = document.getElementById("logo")
    logo.style.display= "none";  
    
    var img = image = document.getElementById("imagem");
        qtd = response.length
        console.log(qtd)
      
        i = Math.floor(Math.random() * qtd);
        img.src = response[i];
     


    var img2 = document.getElementById("imagem2");
        i2 = Math.floor(Math.random() * qtd);
        if (i2 == i) {
          i2 = Math.floor(Math.random() * qtd);
        }
        img2.src = response[i2];
        console.log(response);
  
  },
  //MENSSAGEM DE ERRO DA REQUISIÇÃO
  error: function(xhr, status, error) {
    console.error("Error: " + error);
  }
})

  
}

</script>