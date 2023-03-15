

$(document).ready(function () {
    $(".submit").click(function () {
      $(this).addClass("active1");

      //Adiciona a Classe Sucess Depois de 3.7 segundos
      setTimeout(function () {
        $(".submit").addClass("sucess");
      }, 3700);
      //Remove a Classe Depois de 5 segundos
      setTimeout(function () {
        $(".submit").removeClass("active1");
        $(".submit").removeClass("sucess");
      }, 5000);
    });
  });





  