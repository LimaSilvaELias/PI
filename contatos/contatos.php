<?php
session_start();
include_once('../login/conexao.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JavaMIX - Contato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/divisoes.css">
    <link rel="stylesheet" href="../css/animacoes.css">
    <script src="jquery-3.6.3.min.js"></script>

</head>
<body class="bg">
    
    <div class="d-flex"> 
        <iframe src="../navegador.html" class="navegador" ></iframe>
    </div>
    <div class="boxUniversal">

    <div class="verticalDiv"></div>
      <div>
         <div class="horizontalDiv"></div>
            <div class="bodydiv">
        <div class="horizontalDiv"></div>
            <div class="card-group container-fluid  text-dark">
              <div class="card animecards">
                <img src="https://th.bing.com/th/id/R.f8eebffa38b9df2f4f0a244758c62f6b?rik=H8N9%2bD3%2f%2bWiPRA&riu=http%3a%2f%2fst2.depositphotos.com%2f1026266%2f11927%2fi%2f450%2fdepositphotos_119279600-stock-photo-business-person-in-doubt-and.jpg&ehk=CZ84yBHtlLYrQ5fjzwlYle8PAmd%2fQag7REdK0m46xW8%3d&risl=&pid=ImgRaw&r=0" class="card-img-top img16_9" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Dúvidas</h5>
                  <p class="card-text">Caso tenha alguma duvida, entre em contato enviando sua mensagem abaixo!</p>
                </div>
              </div>
              <div class="card animecards">
                <img src="https://blog.estacio.br/wp-content/uploads/2020/02/medicina.jpg" class="card-img-top img16_9" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Equipe</h5>
                  <p class="card-text">Nossa equipe está a sua disposição para solucionar qualquer duvida a respeito da sua consulta, exames etc.</p>
                </div>
              </div>
              <div class="card animecards">
                <img src="https://irp-cdn.multiscreensite.com/9903fca1/dms3rep/multi/Windmill-Windows-Oakley-Buckinghamshire-091.jpg" class="card-img-top img16_9" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Como Contactar?</h5>
                  <p class="card-text">Preencha os campos abaixo com seu Nome e Email, selecione um tópico do contato e digite a sua duvida na caixa de mensagem.</p>
                </div>
              </div>
            </div> 
        <div class="horizontalDiv"></div>
           </div> 
            
            <br><br><br>
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                <h5 class="card-title">Agendar</h5>
                <p class="card-text">Clique no botão abaixo!</p>
                <a href="../agendar/agendar.php" class="btn btn-primary">Agendar</a>
                </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Exames</h5>
                    <p class="card-text">Clique no botão abaixo!</p>
                    <a href="../exames/exame.html" class="btn btn-primary">Exames</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="horizontalDiv"></div>
            <div class="bodydiv">
              <div class="text-center divstyle">
                <img src="../Img/logopreto.png" width="100px" >
                <h2>Envie Sua Mensagem</h2>
              </div>
            <div class="horizontalDiv"></div>
            <div class="justify-content-center d-flex divstyle">
            
            <form name="contato" method="post" action="cont_pro.php"> 
                <br>
                <div class="">
                  <input type="text" name="nome" maxlength="30" placeholder="Nome:" required>
                  <input type="mail" name="email" maxlength="40" placeholder="E-mail:" required>
                </div>
                <br>
                <div>
                  <select name="tipo_mensagem" id="tipo_mensagem" required>
                    <option selected>Selecione</option>
                    <option value="reclamacao">Reclamação</option>
                    <option value="duvidas">Dúvidas</option>
                    <option value="outros">Outros</option>
                  </select>
                </div>
                <br>
                
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Digite Aqui</label>
                <textarea name="mensagem" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
              <div class="">
                <input class="submit" type="submit" name="enviar" value="Enviar" >
                <!-- <input class="reset" type="reset" name="cancelar" value="Cancelar" onclick=""> -->
              </div>
              <?php
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
            <br>
            <br>
            </form>

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="../scripts/animacoes.js"></script>

            </div>  
        </div>
        </div> 
        
        <div class="verticalDiv"></div>
    </div>
    <div class="horizontalDiv"></div><div class="horizontalDiv"></div>
    <iframe src="../footer.html" class="rodape" ></iframe>


    <script src="../scripts/responsividade.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    


</body>
</html>