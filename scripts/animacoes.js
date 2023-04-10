

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



  // jQUERY
  $(document).ready(function () {
    $(".submit").click(function () {
      $(this).addClass("active");

      //Adiciona a Classe Sucess Depois de 3.7 segundos
      setTimeout(function () {
        $(".submit").addClass("sucess");
      }, 3700);
      //Remove a Classe Depois de 5 segundos
      setTimeout(function () {
        $(".submit").removeClass("active");
        $(".submit").removeClass("sucess");
      }, 5000);
    });
  });

  $(document).ready(function () {
    $(".reset").click(function () {
      $(this).addClass("active2");

      //Adiciona a Classe Sucess Depois de 3.7 segundos
      setTimeout(function () {
        $(".reset").addClass("sucess2");
      }, 3700);
      //Remove a Classe Depois de 5 segundos
      setTimeout(function () {
        $(".reset").removeClass("active2");
        $(".reset").removeClass("sucess2");
      }, 5000);
    });
  });

  