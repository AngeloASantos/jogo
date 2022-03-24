


$(document).ready(function(){
    
    window.onload = function() {
        var bgImage = getRandomInt(1,5);
        // alert ("FUNÇÂO ON LOAD FUNCIONANDO " + bgImage)
        $(".fundo").css("background-image", "url(imagens/fundos/bg" + bgImage +".png)");
        
      };
//SeleçãoPersonagem/ jogar
    $("#botJogar").on('click', function(){
        
        // window.location.href = "telaBatalha.php"; 
        window.location.href = "telaBatalha.php?id=" + $('#selecPersonagem option:selected').val();
       
    });
        // Tentativa de verificar o reload, achei mais facil dps colocar pra qnd iniciar 
        // a pagina php ele voltar os dados originais.
        // $numCont = 0;
        // var contador = $numCont + 1;
        // $(window).on("load",function(){
        //     window.location.reload(true);
        //     alert("PAGINA FOI RECARREGADA")
        //     $.ajax({
        //         url: 'verificaLoad.php',
        //         type: 'GET',
        //         data:{
        //             count: contador,
        //             id: $("#player").attr('alt'),
        //             idInimigo: $("#inimigo").attr('alt')
        //         },
        //         success: function (data) {
        //             alert("WORKOU");
        //             selecPersonagem(1);
        //             selecInimigo(1)
        //             },
        //         error: function (){
        //             alert("NÃOWORKOU")
        //         }
        //     });
        // });

//Atualização das barras de vida e escrita da vida dos personagens na tela
var selecPersonagem = function (tempo) {
    if($("#infoPlayer").text() == "DERROTA"){
        window.location.replace("telaDerrota.php");
    }if($("#infoInimigo").text() == "DERROTA"){
        window.location.replace("telaVitoria.php");
    }
    $.ajax({
        url: 'infoPersonagem.php',
        type: 'GET',
        data:{
            id: $("#player").attr('alt')
        },
        success: function (data) {
            $(".barra-vidaInimigo").css("width", $("#danoPlayer").text() + "%");
            $(".barra-vidaPlayer").css("width", $("#danoInimigo").text() + "%");
            $('#infoPlayer').html(data);
            setTimeout(function(){
                selecPersonagem(tempo);},
            tempo * 1000);
            },
        error: function (){
            $('#infoPlayer').html ('error');
            setTimeout(function(){
                selecPersonagem(tempo);},
            tempo * 1000);
        }
    });
   
};

var selecInimigo = function (tempo) {
    if($("#infoPlayer").text() == "DERROTA"){
        window.location.replace("telaDerrota.php");
    }if($("#infoInimigo").text() == "DERROTA"){
        window.location.replace("telaVitoria.php");
    }
    $.ajax({
        url: 'infoInimigo.php',
        type: 'GET',
        data:{
            idInimigo: $("#inimigo").attr('alt')
        },
        success: function (data) {
            $(".barra-vidaInimigo").css("width", $("#danoPlayer").text() + "%");
            $(".barra-vidaPlayer").css("width", $("#danoInimigo").text() + "%");
            $('#infoInimigo').html(data);
            setTimeout(function(){
                selecPersonagem(tempo);},
            tempo * 1000);
            },
        error: function (){
            $('#infoInimigo').html ('error');
            setTimeout(function(){
                selecPersonagem(tempo);},
            tempo * 1000);
        }
    });
   
};

selecPersonagem(1);
selecInimigo(1);
///---------///

// botAtaque
$("#botAtaque").on('click', function(){
        $.ajax({
            url: 'gerarAtaque.php',
            type: 'GET',
            data:{
                id: $("#player").attr('alt'),
                idInimigo: $("#inimigo").attr('alt'),
                habEsp: $("#verificaHabEsp").text()
            },
            success:function(data){
                // alert("Botão Funcional");
                $('#danoPlayer').html(data);
                selecPersonagem(1);
                selecInimigo(1)
            //Habilidade Ronberg Guarda Real
                var verificaHab = $("#verificaHabEsp").text();
                if(verificaHab == 2){
                $('#botDefesa').prop('disabled', false);
                }else{
                    $('#botDefesa').prop('disabled', true); 
                }
            //////////////////////////////////
                
                $('#botAtaque').prop('disabled', true);
                $('#botBolsa').prop('disabled', true);
                // $('#botDefesa').prop('disabled', true);
            }
        });
    });
//bot fim turno e ataque personagem inimigo
    $("#fimTurno").on('click', function(){
        $.ajax({
            url: 'ataqueInimigo.php',
            type: 'GET',
            data:{
                id: $("#player").attr('alt'),
                idInimigo: $("#inimigo").attr('alt'),
                verificaDef: $("#verificaDef").val(),
                habEsp: $("#verificaHabEsp").text()
            },
            success:function(data){
                // alert("Botão Funcional");
                $('#danoInimigo').html(data);
                selecPersonagem(1);
                selecInimigo(1)
                $('#botAtaque').prop('disabled', false);
                $('#botBolsa').prop('disabled', false);
                $('#botDefesa').prop('disabled', false);
                $('#potCura').prop('disabled', false);
                $("#verificaDef").val(0);
                //verificação se hab ainda esta ativada
                // for (var i = 0; i < 3; i++){
                //     alert(i);
                //     if(i == qntTurnos){
                //         verificaHab = $("#verificaHabEsp").text(0); 
                //     }
                // }
                // var  teste = 1++
                //verificação se hab ainda esta ativada FUNCIONAL ////////////
                var verificaHab = $("#verificaHabEsp").text()
                      
                    if(verificaHab == 1){
                        acrescentar();
                        if(count > qntTurnos){
                            $("#verificaHabEsp").text(0);
                            alert("Os Efeitos Passaram");
                    }
                }   
                    if(verificaHab == 2){
                        acrescentar();
                        if(count > qntTurnos){
                            $("#verificaHabEsp").text(0);
                            alert("Os Efeitos Passaram");
                    }
                }  
                    if(verificaHab == 3){
                        acrescentar();
                        if(count > qntTurnos){
                            $("#verificaHabEsp").text(0);
                            alert("Os Efeitos Passaram");
                    }
                } 
                    if(verificaHab == 4){
                        acrescentar();
                        if(count > qntTurnos){
                            $("#verificaHabEsp").text(0);
                            alert("Os Efeitos Passaram");
                    }
                }  
            // alert(qntTurnos);
            ///////////////verificação de hab//////////////
            }
        });
    });
    // Contagem De de turnos que foram usados a hab
    var count = 0;

    function acrescentar() { 
      count++;
    }  

//Atualiza Qnt Poção Cura
var atualizaPot = function (tempo) {
    $.ajax({
        url: 'potCura.php',
        type: 'GET',
        data:{
            id: $("#player").attr('alt')
        },
        success: function (data) {
            $('#recebePots').html(data);
            setTimeout(function(){
                atualizaPot(tempo);},
            tempo * 1000);
            },
        error: function (){
            $('#recebePots').html ('error');
            setTimeout(function(){
                atualizaPot(tempo);},
            tempo * 1000);
        }
    });
   
};
atualizaPot(1);
//Habilidade especial partes necessarias
var verificaHab = $("#verificaHabEsp").text();
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
  }
  var qntTurnos = getRandomInt(1,4);
  //////////////////////////////////////
//BOTÃO POÇÃO DE CURA
$("#potCura").on('click', function(){
    
    $.ajax({
        url: 'aplicaCura.php',
        type: 'GET',
        data:{
            id: $("#player").attr('alt'),
            habEsp: $("#verificaHabEsp").text()
        },
        success:function(data){
            $('#danoInimigo').html(data);
            // alert("Você Se Curou");
            atualizaPot(1);
            $('#botAtaque').prop('disabled', true);
            $('#potCura').prop('disabled', true);
        }
    });
});

//////////////////////
var contador = 0;

    function acrescentaContador() { 
        contador++;
    }  
//BOTÃO DEFESA
$("#botDefesa").on('click', function(){
    $("#verificaDef").val(1);
    $.ajax({
        url: 'ataqueInimigo.php',
        type: 'GET',
        data:{
            id: $("#player").attr('alt'),
            verificaDef: $("#verificaDef").val(),
            
        },
        success:function(data){
            // $('#danoInimigo').html(data);
            // alert($("#verificaDef").val());
            //Habilidade Ronberg Guarda Real
            var verificaHab = $("#verificaHabEsp").text();
            if(verificaHab == 2){
                contador = 0;
                verificaClick = acrescentaContador()
                if(contador == 1){
                    $('#botDefesa').prop('disabled', true);
                    // count = 0;
                }else{
                    $('#botAtaque').prop('disabled', false); 
                // vai ter que ser true pq se n o atk reseta a defesa e da pra atk infinitamente.
            }
            }else{
                $('#botAtaque').prop('disabled', true); 
            }
            //////////////////////////////////
            // $('#botAtaque').prop('disabled', true);
            $('#botDefesa').prop('disabled', true);
        }
    });
});
///////////
/////////Botão Habilidade Especial//////////
$("#botHabEsp").on('click', function(){
    
    $.ajax({
        url: 'habEspecial.php',
        type: 'GET',
        data:{
            id: $("#player").attr('alt'),
            
        },
        success:function(data){
            $('#verificaHabEsp').html(data);
            alert("A habilidade " + $("#botHabEsp").val() + " Foi Ativada");
            // $('#botAtaque').prop('disabled', true);
            // $('#botDefesa').prop('disabled', true);
            $('#botHabEsp').prop('disabled', true);
            $(".barra-espPlayer").css("width", "0%");
        }
    });
});
////////////envio Info
$("#botInfoUsuario").on('click', function(){
    $.ajax({
        url: 'SalvarInfoPlayer.php',
        type: 'POST',
        data:{
            nome: $("#nomeP").val(),
            cidade: $("#cidadeP").val(),
            idade: $("#idadeP").val(),
            verificacao: 1
        },
        success:function(data){
            alert("Dados Salvos");
            $('#botInfoUsuario').prop('disabled', true);
             modaldadosPlayer.style.display = "none";
            // modaldadosPlayer.style.display = "none";
            // $('#testeDeInfo').html(data);
        }
    });
});
//////////Envio do FeedBack
$("#enviarFeedback").on('click', function(){
    $.ajax({
        url: 'SalvarInfoPlayer.php',
        type: 'POST',
        data:{
            feedback: $("#FeedBack").val(),
            verificacao: 2
        },
        success:function(data){
            alert("Dados Enviados");
            $('#enviarFeedback').prop('disabled', true);
             modaldadosPlayer.style.display = "none";
            // modaldadosPlayer.style.display = "none";
            // $('#TesteFeedback').html(data);
            
        }
    });
});
////////////

//QUANDO TENTO CRIAR OUTRO MODAL ELES PARAM DE FUNCIONAR
// var botaoBolsa = document.getElementById("botBolsa");
// botaoBolsa.onclick = function(){
//     alert("TESTE");
//     return true;
// };

//modal Dados player
// var modaldadosPlayer = document.getElementById("modalForm");
// var botaoDadosPlayer = document.getElementById("opnModal");
// var span = document.getElementsByClassName("fechaForm")[0];

// botaoDadosPlayer.onclick = function(){
//     modaldadosPlayer.style.display = "block";
// };
// span.onclick = function(){
//     modaldadosPlayer.style.display = "none";
// };
// window.onclick = function(event){
//     if(event.target == $("#modalForm")){
//         $("#modalForm").css("display", "none");
//     };
// };

//modal funcional dos dados do jogador
$("#opnModal").on('click', function(){
    $("#modalForm").css("display", "block");
});
$(".fechaForm").on('click', function(){
    $("#modalForm").css("display", "none");
});
//modalBolsa
$("#botBolsa").on('click', function(){
    $("#modalBolsa").css("display", "block");
});
var fecharBolsa = function(onclick){
$(".fechaModalBolsa").on('click', function(){
    $("#modalBolsa").css("display", "none");
});
}
fecharBolsa(".fechaModalBolsa");
//Modal FeedBack
$("#opnModalFeedBack").on('click', function(){
    $("#modalFormFeedBack").css("display", "block");
});
var fecharBolsaFeedback = function(onclick){
$(".fechaFormfeedBack").on('click', function(){
    $("#modalFormFeedBack").css("display", "none");
});
}
fecharBolsaFeedback(".fechaFormfeedBack");

$("#jogarNovamente").on('click', function(){
    window.location.replace("index.php");
});





//Fecha document ready    
});

