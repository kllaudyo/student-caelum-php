/**
 * Created by claudio on 17/06/17.
 */
$(document).ready(function(evt){

    //USANDO JQUERY DIRETO
    // $("#tipoProduto")
    //     .on("change", function(evt){
    //         var tipo = $(this).val();
    //         if(tipo==="livro"){
    //             $(".isbn").show();
    //         }else{
    //             $(".isbn").hide();
    //         }
    //     })
    //     .change();

    //USANDO DATA-ATRIBUTE
    if(!$("form").data("livro")){
        $(".isbn").hide();
    };

     $("#tipoProduto").on("change", function(evt){
         var tipo = $(this).val();
         if(tipo==="livro"){
             $(".isbn").show();
         }else{
             $(".isbn").hide();
         }
     });
});
