    <!-- footer -->
    <div class="footer">
        Desenvolvido por: &nbsp;<a href="https://intranet.lpnet.com.br/social/perfil/827" target="blank">Luíz
            Felipe</a>&nbsp; - &nbsp;<a target="blank" href="https://intranet.lpnet.com.br/social/perfil/439/sobre">Rodrigo
            Felix</a>
    </div>
    <!-- end footer -->
    <!-- scripts -->
    <script src="<?php echo base_url('public/js/jquery-3.3.1.slim.min.js') ?>"></script>
    <script src="<?php echo base_url('public/js/popper.min.js') ?>"></script>
    <script src="<?php echo base_url('public/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('public/js/iziToast.min.js') ?>"></script>
    <script src="<?php echo base_url('public/js/jquery.maskedinput.min.js') ?>"></script>
    <script>
        jQuery("input.telefone")
            .mask("(99) 9999-9999?9")
            .focusout(function(event) {
                var target, phone, element;
                target = (event.currentTarget) ? event.currentTarget : event.srcElement;
                phone = target.value.replace(/\D/g, '');
                element = $(target);
                element.unmask();
                if (phone.length > 10) {
                    element.mask("(99) 99999-999?9");
                } else {
                    element.mask("(99) 9999-9999?9");
                }
            });
    </script>
    <script>
        <?php if ($msg) { ?>
            var description = '<?php print $msg ?>'
            if (description == '') {
                pass
            } else {
                if (description.includes('sucesso')) {
                    iziToast.success({
                        id: 'success',
                        title: description,
                        position: 'bottomRight',
                        timeout: 9000
                    });
                } else {
                    iziToast.error({
                        id: 'error',
                        title: description,
                        position: 'bottomRight',
                        timeout: 9000
                    });
                }
            }
        <?php } ?>


        <?php if (isset($msgLogin)) { ?>
            var description = '<?php print $msgLogin ?>'
            if (description == '') {
                pass
            } else {
                if (description.includes('sucesso')) {
                    iziToast.success({
                        id: 'success',
                        title: description,
                        position: 'bottomRight',
                        timeout: 2000
                    });
                }
            }
        <?php } else {
        } ?>
    </script>
    <!-- end scripts -->
    </body>

    </html>