
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
    if (document.body.clientWidth < 600) {    
        $(".bodydiv").addClass("mobilesz");
        
    } else {    
        $(".bodydiv").removeClass("mobilesz");
        
    }
};

function navmobile() {
    if (document.body.clientWidth < 600) {    
        $(".dsk").addClass("menumobile");
        
    } else {    
        $(".dsk").removeClass("menumobile");
       
    }
};











