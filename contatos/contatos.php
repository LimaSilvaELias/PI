<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../divisoes.css">
    <script src="jquery-3.6.3.min.js"></script>
    <?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
}
?>
</head>
<body>
    
    <div class="d-flex"> 
        <iframe src="../navegador.html" class="navegador" ></iframe>
    </div>
    <div class="boxUniversal">

    <div class="verticalDiv"></div>
      <div>
         <div class="horizontalDiv"></div>
            <div class="card-group container-fluid bodydiv">
              <div class="card">
                <img src="https://img.cancaonova.com/cnimages/canais/uploads/sites/6/2015/10/formacao_a_medicina_e-_a-_profissao_com_-o_-dom_-de_-salvar_-vidas.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img src="https://www.pucrs.br/medicina/wp-content/uploads/sites/22/2022/04/2d25285d-489c-4fa8-83c2-bcf78b7186ba.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
              <div class="card">
                <img src="https://blog.estacio.br/wp-content/uploads/2020/02/medicina.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Card title</h5>
                  <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer">
                  <small class="text-muted">Last updated 3 mins ago</small>
                </div>
              </div>
            </div>    
            <br><br><br>
            <div class="row">
              <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
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
            
            <form name="agendamento" method="post" action="cont_pro.php"> 
                <br>
                <div class="">
                  <input type="text" name="nome" maxlength="30" placeholder="Nome:">
                  <input type="mail" name="email" maxlength="40" placeholder="E-mail:">
                </div>
                <br>
                <div>
                  <select name="selecao" id="selecao">
                    <option selected>Selecione</option>
                    <option value="reclamacao">Reclamação</option>
                    <option value="duvidas">Dúvidas</option>
                    <option value="outros">Outros</option>
                  </select>
                </div>
                <br>
                
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Digite Aqui</label>
                <textarea class="form-control" name="mensagem" id="exampleFormControlTextarea1"
                 rows="3"></textarea>
            </div>
              <div class="">
                <input type="button" name="enviar" value="Enviar" onclick="valida()">
                <input type="reset" name="cancelar" value="Cancelar">
              </div>
            
            <br>
            </form>
            </div>  
        </div>
        </div> 
        
        <div class="verticalDiv"></div>
    </div>
    <div class="horizontalDiv"></div><div class="horizontalDiv"></div>
    <iframe src="../footer.html" class="rodape" ></iframe>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    


</body>
</html>