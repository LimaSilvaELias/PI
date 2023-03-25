
// ATIVAÇÃO DAS FUNÇÕES
$(document).ready(function() {
    nav();
    formularios();
    navmobile();

});
$(window).resize(function() {
    nav();
    formularios();
    navmobile();

});


// FUNÇÕES 
function nav() {
    if (document.body.clientWidth < 600) {    
        $("iframe").addClass("tam");
        $('.cassoselInfo').addClass("hide");
        
    } else {    
        $("iframe").removeClass("tam");
        $('.cassoselInfo').removeClass("hide");
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

function navmobile() {
    if (document.body.clientWidth < 600) {    
        $(".dsk").addClass("menumobile");
        
    } else {    
        $(".dsk").removeClass("menumobile");
       
    }
};











