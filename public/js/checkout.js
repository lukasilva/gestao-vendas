jQuery( document ).on( "change" , ".cookie" , function(){
    
    nome = jQuery( this ).attr( "name" );
    val  = jQuery.trim( jQuery( this ).val() );
    
    if( val != "" ){
        
        jQuery.cookie( nome , val );
        
    }
    else{
        
        jQuery.removeCookie( nome );
        
    }
    
} );

jQuery( document ).on( "keyup" , "input[name='cep']" , function(){

    var cep = jQuery( this ).val().replace( /\D/g , "");

    //Verifica se campo cep possui valor informado.

    if( cep != "" ) {

        //Expressão regular para validar o CEP.
        var validacep = /^[0-9]{8}$/;
        //Valida o formato do CEP.
        if( validacep.test( cep ) ){

            var settings = {

                "url"    : "https://viacep.com.br/ws/" + cep + "/json/",
                "method" : "GET"

            };

            jQuery.ajax( settings ).done( function( response ){

                jQuery( "input[name='estado']"      ).val( response.uf         ).trigger( "change" );
                jQuery( "input[name='cidade']"      ).val( response.localidade ).trigger( "change" );
                jQuery( "input[name='bairro']"      ).val( response.bairro     ).trigger( "change" );
                jQuery( "input[name='logradouro']"  ).val( response.logradouro ).trigger( "change" );

            } );

        }

    }

} );

jQuery( document ).ready( function(){
    
    //$.cookie( 'produto_1'  , 2 );
    //$.cookie( 'produto_18' , 1 );
    //$.cookie( 'produto_22' , 4 );
    
    if( jQuery( "#ProdutosCheckout" ).length > 0 ){
        
        function CalculaCarrinho(){
            
            var Total = 0;
            var error = false;
            
            jQuery( ".ProdutoValor" ).each( function(){
                
                p = jQuery( this ).attr( "data-produto" );
                
                if( parseInt( jQuery( "#ProdutoQuantidade" + p ).val() ) > parseInt( jQuery( "#ProdutoQuantidade" + p ).attr( "max" ) ) ){
                    
                    jQuery( "#ProdutoQuantidade" + p ).val( parseInt( jQuery( "#ProdutoQuantidade" + p ).attr( "max" ) ) );
                    addProduto( p , jQuery( "#ProdutoQuantidade" + p ).attr( "max" ) );
                    error = true;
                    return false;
                    
                }
                
                SubTotal = parseFloat( jQuery( "#ProdutoValor" + p ).text() ) * parseInt( jQuery( "#ProdutoQuantidade" + p ).val() ); 
                
                Total += SubTotal;
                
            } );
            
            if( error ) return false;
            
            jQuery( "#TotalCarrinho" ).html( ( Math.round( Total * 100 ) / 100 ) );
            
        }
    
        function RecarregarCarrinho(){

            Produtos = jQuery.cookie();

            for ( var item in Produtos ) {

                produto = item.split( "_" );

                if( produto.length == 2 && produto[ 0 ] == "produto" ){

                    Quantidade = Produtos[ item ];

                    if( jQuery( "#ProdutoCarrinho" + produto[ 1 ] ).length > 0 ){
                        
                        CalculaCarrinho();
                        
                    }
                    else{
                        
                        jQuery.ajax( {
                            
                            url      : '/produto/' + produto[ 1 ],
                            dataType : "json"
                            
                        } ).done(function( data ){
                            
                            imagens = JSON.parse( data.imagem );
                            
                            jQuery( "#ProdutosCheckout" ).append(
                                "\
                                    <div class='row' id='ProdutoCarrinho" + data.id + "'>\
                                        <input type=\"hidden\" data-produto='" + data.id + "' id=\"ProdutoId" + data.id + "\" name='produto[]' value=\"" + data.id + "\">\
                                        <div class='col-md-2 col-xs-2'><img style='width:100px;' class='img-responsive' src='" + ( imagens.length > 0 ? ( "/storage/images/" + imagens ) : 'http://placehold.it/100x70' ) + "'>\
                                        </div>\
                                        <div class=\"col-md-4 col-xs-4\">\
                                            <h4 class=\"product-name\"><strong>" + data.nome + "</strong></h4>\
                                            <h4><small>" + data.descricao + "</small></h4>\
                                        </div>\
                                        <div class=\"col-md-6 col-xs-6\">\
                                            <div class=\"row\">\
                                                <div class=\"col-md-6 col-xs-6 text-right\">\
                                                    <h6><strong>R$ <span data-produto='" + data.id + "' class='ProdutoValor' id=\"ProdutoValor" + data.id + "\">" + ( Math.round( data.valor  * 100 ) / 100 ) + "</span> <span class=\"text-muted\">x</span></strong></h6>\
                                                </div>\
                                                <div class=\"col-md-4 col-xs-4\">\
                                                    <input type=\"number\" data-produto='" + data.id + "' max=\"" + data.quantidade + "\" id=\"ProdutoQuantidade" + data.id + "\" class=\"form-control form-control-sm input ProdutoQuantidade\" name='quantidade[]' value=\"" + jQuery.cookie( "produto_" + data.id ) + "\">\
                                                </div>\
                                                <div class=\"col-md-2 col-xs-2\">\
                                                    <button type=\"button\" class=\"btn btn-link btn-sm RemoveProduto\" data-produto='" + data.id + "'>\
                                                        <span class=\"fa fa-trash\"> </span>\
                                                    </button>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    <hr id='ProdutoHr" + data.id + "'>\
                                "
                            );
                    
                            CalculaCarrinho();
                            
                        } );
                        
                    }

                }
                else{
                    
                    if( jQuery.trim( Produtos[ item ] ) != "" && jQuery( "input[name='" + item + "']" ).length > 0 ){
                        
                        jQuery( "input[name='" + item + "']" ).val( jQuery.trim( Produtos[ item ] ) );
                        
                    }
                    else if( jQuery.trim( Produtos[ item ] ) != "" && jQuery( "select[name='" + item + "']" ).length > 0 ){
                        
                        jQuery( "select[name='" + item + "']" ).val( jQuery.trim( Produtos[ item ] ) );
                        
                    }
                    
                }

            }

        }

        RecarregarCarrinho();
        
        jQuery( document ).on( "click" , ".RemoveProduto" , function(){
            
            p = jQuery( this ).attr( "data-produto" );
            jQuery.removeCookie( "produto_" + p );
            jQuery( "#ProdutoCarrinho" + p ).detach();
            jQuery( "#ProdutoHr"       + p ).detach();
            
            CalculaCarrinho();
            
        } );

        function clearCookie(){

            Produtos = jQuery.cookie();

            for ( var item in Produtos ) {
                
                if( item != "XSRF-TOKEN" ){
                    
                    jQuery.removeCookie( item );
                    
                }

            }

        }
        
    }
    
    //Adicionar Produto no carrinho
    function addProduto( produto , quantidade ){
        
        jQuery.cookie( "produto_" + produto , quantidade );
        
        if( jQuery( "#ProdutosCheckout" ).length > 0 ){
            
            RecarregarCarrinho();
            
        }
        
    }
        
    jQuery( document ).on( "blur" , "#ProdutosCheckout .ProdutoQuantidade" , function(){

        p = jQuery( this ).attr( "data-produto" );
        addProduto( p , jQuery( this ).val() );

    } );
    
} );