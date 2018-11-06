$(document).ready(function() {
    function add() {if($(this).val() == ''){$(this).val($(this).attr('placeholder')).addClass('placeholder');}}
    function remove() {if($(this).val() == $(this).attr('placeholder')){$(this).val('').removeClass('placeholder');}}
    if (!('placeholder' in $('<input>')[0])) { // Create a dummy element for feature detection
        $('input[placeholder], textarea[placeholder]').blur(add).focus(remove).each(add); // Select the elements that have a placeholder attribute
        $('form').submit(function(){$(this).find('input[placeholder], textarea[placeholder]').each(remove);}); // Remove the placeholder text before the form is submitted
    }
});

$(document).ready(function(){
    $(".conteudoMenu").hide();
    $(".itemMenu").click(function(){
        $(".conteudoMenu").slideUp("slow");
        $(this).next(".conteudoMenu").slideDown("slow");
    });
});


/*Remover Espaços*/
function Trim(str){
        return str.replace(/^\s+|\s+$/g,"");
}

/*Mascaras*/
function formatar(src, mask){
    var i = src.value.length;
    var saida = mask.substring(0,1);
    var texto = mask.substring(i)
    if (texto.substring(0,1) != saida){
        src.value += texto.substring(0,1);
    }
}

/*Permite somente numeros*/
function Onlynumbers(e){
    var tecla=new Number();
    if(window.event) {
        tecla = e.keyCode;
    }else if(e.which) {
        tecla = e.which;
    }else {
        return true;
    }
    if((tecla >= "97") && (tecla <= "122")){
        return false;
    }
}

/*Permite somente letras*/
function Onlychars(e){
    var tecla=new Number();
    if(window.event) {
        tecla = e.keyCode;
    }else if(e.which) {
        tecla = e.which;}
    else{
        return true;
    }
    if((tecla >= "48") && (tecla <= "57")){
        return false;
    }
}


/*Função Pai de Mascaras*/
    function Mascara(o,f){
        v_obj=o
        v_fun=f
        setTimeout("execmascara()",1)
    }
    
    /*Função que Executa os objetos*/
    function execmascara(){
        v_obj.value=v_fun(v_obj.value)
    }
    
    /*Função que padroniza valor monétario*/
    function Valor(v){
        v=v.replace(/\D/g,"") //Remove tudo o que não é dígito
        v=v.replace(/^([0-9]{3}\.?){3}-[0-9]{2}$/,"$1,$2");
        //v=v.replace(/(\d{3})(\d)/g,"$1,$2")
        v=v.replace(/(\d)(\d{2})$/,"$1,$2") //Coloca ponto antes dos 2 últimos digitos
        return v
    }