/**
 * Created by claudio on 17/06/17.
 */
$(document).ready(function(evt){

    var showProduto = function(){
        $(".isbn").hide();
        $(".watermark").hide();
        $(".taxa").hide();
    };

    var showEbook = function(){
        $(".isbn").show();
        $(".watermark").show();
        $(".taxa").hide();
    };

    var showLivroFisico = function(){
        $(".isbn").show();
        $(".watermark").hide();
        $(".taxa").show();
    };

    $("#tipoProduto")
        .on("change", function(evt){
            switch($(this).val()){
                case "Produto":
                    showProduto();
                    break;
                case "Ebook":
                    showEbook();
                    break;
                case "LivroFisico":
                    showLivroFisico();
                    break;
            }
        })
        .change();

});


