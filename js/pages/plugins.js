var idleTime = 0;

$(document).ready(function(){
   // getPerguntas();
   $('img').on('dragstart', function(event) { event.preventDefault(); });
   $("body").on("contextmenu", "img", function(e) {
     return false;
   });
   
   inatividade();
    //alert($(window).height());
/*
    var total = parseInt($(window).height());
    var topo30 = (total*30)/100;
    var content70 = (total*23)/100;

    $('.ct_emojis').css('height',total);
    $('.topo70').css('height',topo30);
    $('.acl').css('height',content70);
    $('.res-circle').each(function(){
        $(this).css('height','100%');
        $(this).css('width',$(this).css('height'));
        //alert($(this).css('height'));
    });*/


    /*$('.finalBtn').unbind().click(function(){


 
        try{          

        
            $.ajax({  
                type: 'POST', //Esta propriedade diz que tipo de interação faremos entre os dados, neste caso por POST
                url: '../controller/ajax/Dash.ajax.php',  //Qual página o ajax ira buscar 
                data:{
                    "func":"salvaFb"
                },
                beforeSend: function(){//Chama a função para mostrar a imagem gif de loading antes do carregamento
                    showLoader(); 
                },
                success: function(response) {
                    
                    var mJson = jQuery.parseJSON(response);
    
                    if(mJson.response){
                        $('#modalAlertaFb').modal({backdrop: 'static', keyboard: false});
                        setTimeout( function() {
                            $('#modalAlertaFb').fadeOut( "slow", function() {
                                $('#modalAlertaFb').modal('hide');
                                location.reload();
                              });
                          }, 2000 );
    
                    }
                    
                },
                complete: function(){
                    hideLoader();
                }
            });
    
        }catch(erro){
            hideLoader();
        }


    });*/
     
});
function inatividade(){
    
    maxWindow();
    
    

    //INATIVIDADE
    var idleInterval = setInterval(function(){
        idleTime = idleTime + 1;
        if (idleTime > 10) { // 20 minutes
            window.location.reload();
            //getPerguntas();
        }else{
            console.log(idleTime);
        }
    }, 1000);
    //Zero the idle timer on mouse movement.
    $(this).mousemove(function (e) {
        idleTime = 0;
    });
    $(this).keypress(function (e) {
        idleTime = 0;
    });
    $(this).click(function (e) {
        idleTime = 0;
    });

    $('.fbim').unbind().click(function(){
        var it = $(this);
        try{          

            var pcolors = ['#fc7703','#045dd9','#32a852'];
            $('.slideform-group').css('background-color',pcolors[Math.floor(Math.random() * pcolors.length)]);
            $('body').css('color','#ffffff');

            $.ajax({  
                type: 'POST', //Esta propriedade diz que tipo de interação faremos entre os dados, neste caso por POST
                url: 'controller/ajax/Dash.ajax.php',  //Qual página o ajax ira buscar 
                data:{
                    "func":"salvaFb",
                    "pergunta":$(it).attr('data-id'),
                    "resposta":$(it).attr('data-fb')
                },
                success: function(response) {


                    //console.log($(it).attr('data-id')+'-'+$(it).attr('data-fb')+'FB = '+response);
            
                    var mJson = jQuery.parseJSON(response);
    
                    if(mJson.response){
                        if($(it).hasClass('finalBtn')){
                            $('#modalAlertaFb').modal({backdrop: 'static', keyboard: false});
                            setTimeout( function() {
                                $('#modalAlertaFb').fadeOut( "slow", function() {
                                    $('#modalAlertaFb').modal('hide');
                                    location.reload();
                                  });
                              }, 2000 );
                        }

    
                    }
                    
                },
                complete: function(){
                    //hideLoader();
                }
            });
    
        }catch(erro){
            //hideLoader();
        }


    });
}

function getPerguntas(){

    var mod = '.fmpesq';

    $(mod).empty();

    try{          

        
        $.ajax({  
            type: 'POST', //Esta propriedade diz que tipo de interação faremos entre os dados, neste caso por GET
            url: '../controller/ajax/Dash.ajax.php',  //Qual página o ajax ira buscar 
            data:{
                "func":"getPerguntas"
            },
            beforeSend: function(){//Chama a função para mostrar a imagem gif de loading antes do carregamento
                showLoader(); 
            },
            success: function(response) {
                console.log('PERGUNTAS =' + response);
                var mJson = jQuery.parseJSON(response);

                if(mJson.response){
                    $(mod).html(mJson.data);
                /*    
( function ($) {
    jQuery.validator.addMethod("equals", function(value, element, param) {
      return this.optional(element) || value === param;
    });

    $(document).ready( function () {

        var $form = $('form');

        $form.slideform({
            validate: {
                rules: {
                    group7: {
                        required: true,
                        equals: "valid"
                    }
                },
                messages: {
                    group7: {
                        required: 'Please select an option',
                        equals: 'You must select valid!'
                    }
                }
            },
            submit: function (event, form) {
                $form.trigger('goForward');
            }
        });
    });
}(jQuery))
inatividade();*/
                    //alert(1);
                    
                    /*jQuery.each(mJson.data,function(ind,el){});*/

                }else{
                    showAlert("FEEDBACK", mJson.data,2,"<button type=\"button\" class=\"btn btn-danger radius_md\" data-dismiss=\"modal\">Fechar</button>");
                }
                
            },
            complete: function(){
                hideLoader();
            }
        });

    }catch(erro){
        hideLoader();
        showAlert("FEEDBACK", "Ocorreu uma falha ao buscar os dados!",2,"<button type=\"button\" class=\"btn btn-danger radius_md\" data-dismiss=\"modal\">Fechar</button>");
    }
    
}

function maxWindow() {
    window.moveTo(0, 0);

    if (document.all) {
        top.window.resizeTo(screen.availWidth, screen.availHeight);
    }

}