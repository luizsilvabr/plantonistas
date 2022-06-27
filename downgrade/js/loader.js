            $(function () {
                //Comportamento do botao de disparo
              //  $('#btn-getResponse').click(function () {
                //    getResponse();
               // });
           // });
            /**
             * Dispara o modal e espera a resposta do script 'testing.resp.php'
             * @returns {void}
             */
            function getResponse() {
                //Preenche e mostra o modal
               // $('#loadingModal_content').html('Carregando...');
               // $('#loadingModal').modal('show');
                //Envia a requisicao e espera a resposta
                $.post("terminate.php")
                    .done(function () {
                        //Se nao houver falha na resposta, preenche o modal
                        $('#loader').removeClass('loader');
                        $('#loader').addClass('glyphicon');
                        $('#loadingModal_label').html('Aguarde!');
                        $('#loadingModal_content').html('<img src="imagens/ajax-loader.gif"><br>Os dados estão sendo coletados!');
                        resetModal();
                    })
                    .fail(function () {
                        //Se houver falha na resposta, mostra o alert
                        $('#loader').removeClass('loader');
                        $('#loader').addClass('glyphicon');
                        $('#loadingModal_label').html('Aguarde!');
                        $('#loadingModal_content').html('<img src="images/processing-gif-5.gif"><br>Os dados estão sendo coletados!');
                        resetModal();
                    });
            }
            function resetModal(){
                //Aguarda 2 segundos ata restaurar e fechar o modal
                setTimeout(function() {
                    $('#loader').removeClass();
                    $('#loader').addClass('loader');
                    $('#loadingModal_label').html('<span class="glyphicon glyphicon-refresh"></span>Aguarde...');
                    $('#loadingModal').modal('hide');
                }, 60000);
            }
