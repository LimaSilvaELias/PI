// ATIVAÇÃO DAS FUNÇÕES//
$(document).ready(function() {
    nav();
    formularios();
    boxs();
});
$(window).resize(function() {
    nav();
    formularios();
    boxs();
});


// FUNÇÕES 
function nav() {
    if (document.body.clientWidth < 952) {    
        $("iframe").addClass("tam");
        $('.cassoselInfo').addClass("hide");
        $('.botao').removeClass("hide");
    } else {    
        $("iframe").removeClass("tam");
        $('.cassoselInfo').removeClass("hide");
        $('.botao').addClass("hide");
    }
};

function formularios() {
    if (document.body.clientWidth < 1140) {   
        $(".ghostDiv").removeClass("verticalDiv");
        $(".ghostDiv").addClass("horizontalDiv m-3");
    } else {    
        $(".ghostDiv").addClass("verticalDiv");
        $(".ghostDiv").removeClass("horizontalDiv m-3");
    }
};


function boxs() {
    if (document.body.clientWidth < 952) {    
        $(".loginBox").addClass("loginBoxMob");
        $('.boxUniversal').addClass("boxUniversalMob");
        $('.grade').addClass("boxUniversalMob");
        $(".cons").addClass("gradeAgendarmob");
        $(".cons").removeClass("gradeAgendar");
    } else {    
        $(".loginBox").removeClass("loginBoxMob");
        $('.boxUniversal').removeClass("boxUniversalMob");
        $('.grade').removeClass("boxUniversalMob");
        $(".cons").addClass("gradeAgendar");
        $(".cons").removeClass("gradeAgendarmob");
    }
};





// window.onresize = function() {
//     nav();
//   };
  

// function nav() {
//     var iframes = Array.from(document.getElementsByClassName('iframe'));
//     var cassoselInfos = Array.from(document.getElementsByClassName('cassoselInfo'));
    
//     if (document.body.clientWidth < 800) {
//       iframes.forEach(function(elem) {
//         elem.classList.add('tam');
//       });
//       cassoselInfos.forEach(function(elem) {
//         elem.classList.add('hide');
//       });
//     } else {
//       iframes.forEach(function(elem) {
//         elem.classList.remove('tam');
//       });
//       cassoselInfos.forEach(function(elem) {
//         elem.classList.remove('hide');
//       });
//     }
//   }
  


