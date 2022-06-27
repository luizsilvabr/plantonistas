<!--**
   * @author Dimas Silva -   dimas001@gmail.com
   * @pagina desenvolvida usando framework bootstrap,
   * Lembre-se dos créditos ao desenvolvedor.
   *-->
<!DOCTYPE html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Ferramentas Locais</title>
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <!-- personalizado -->
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/jquery.mask.min.js"></script>
      <link rel="stylesheet" href="css/style.css">
   </head>
   <body>
      <div class="container theme-showcase" role="main">
      <div class="page-header">
         <h1><a href="#">Habilitar acesso remoto ONU</a></h1>
      </div>
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#remoto" aria-controls="home" role="tab" data-toggle="tab">Acesso remoto</a></li>
            <li role="presentation"><a href="#mail" aria-controls="mail" role="tab" data-toggle="tab">E-mail</a></li>
      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
      <!-- Tab Acesso Remoto-->
      <div role="tabpanel" class="tab-pane active" id="remoto">
         <div style="padding-top:20px;">
            <form id="ajax_form"   action="" method="POST">
               <div class="form-group col-md-6">
                  <label for="remotoOlt">OLT</label>
                  <select required class="form-control" id="remotoOlt" name="olt">
                     <option value=""><b>Selecione a OLT</b></option>
                     <option value="10.103.186.1">OLT-01-AGU-HE</option>
					<option value="10.180.120.1">OLT-01-AVE-HE</option>
					<option value="10.180.140.1">OLT-02-AVE-HE</option>
                     <option value="10.228.62.1">OLT-01-GAP-HEADEND</option>
                     <option value="10.130.96.1">OLT-01-ARL-HE-PAMONHA</option>
                     <option value="10.228.11.1">OLT-01-BCA-HEADEND</option>
                     <option value="10.228.45.1">OLT-01-BES-HEADEND</option>
                     <option value="10.230.79.1">OLT-01-BOR-HE</option>
                     <option value="10.227.11.1">OLT-01-DRO-HEADEND</option>
                     <option value="10.103.12.2">OLT-01-LEP-ESCRITORIO</option>
                     <option value="10.103.12.6">OLT-02-LEP-ESCRITORIO</option>
                     <option value="10.142.11.1">OLT-01-BBN-SONHONOSSO</option>
                     <option value="10.175.63.1">OLT-01-BTU-CHANCELER</option>
                     <option value="10.170.34.1">OLT-02-BTU-CHANCELER</option>
                     <option value="10.175.80.1">OLT-01-BTU-HE-AREA-C</option>
                     <option value="10.174.38.1">OLT-01-BTU-HE-CARMELO</option>
                     <option value="10.175.60.1">OLT-01-BTU-RUB</option>
                     <option value="10.231.11.1">OLT-01-IGA-HE</option>
					 <option value="10.233.11.1">OLT-01-ITU-HE</option>
					 <option value="10.110.80.1">OLT-01-JAU-HE-AREA-A</option>
                     <option value="10.110.50.1">OLT-01-MAC-CAPRI</option>
					 <option value="10.234.11.1">OLT-01-MNT-HE</option>
                     <option value="10.121.60.1">OLT-01-PDR-ESCRITORIO</option>
                     <option value="10.229.11.1">OLT-01-PTV-HEADEND</option>
                     <option value="10.130.60.1">OLT-01-SML-SKALA</option>
                     <option value="10.228.28.1">OLT-01-TBJ-HEADEND</option>
                  </select>
                  <br>
                  <div class="form-group col-md-4">
                     <label for="remotoSlot">SLOT:</label>
                     <input type="text" name="slot" class="form-control" id="slot">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="remotoLink">LINK:</label>
                     <input type="text" name="link" class="form-control" id="link">
                  </div>
                  <div class="form-group col-md-4">
                     <label for="remotoOnu">ONU:</label>
                     <input type="text" name="onu" class="form-control" id="onu">
                  </div>
                  <div class="form-group col-md-4">
                     <button type="submit" class="btn btn-primary form-control col-md-3" onclick="javascript:document.getElementById('blanket').style.display = 'block';document.getElementById('aguarde').style.display = 'block';">Habilitar</button>
                  </div>
                  <div class="form-group col-md-4">
                     <a href="index.php" class="btn btn-primary form-control col-md-3">
                     <span class="glyphicon glyphicon-refresh"></span> Refresh
                     </a>
                  </div>
               </div>
            </form>
         </div>
         <pre id="pre">
	<div class="form-group col-md-6" id="result_remoto">

		<div class="form-group col-md-6" id="loading">
<h4>Executando comando telnet...</h4><p>
<h4>Aguarde.</h4>
		<img  src="images/ajax-loader.gif">
		</div>

</pre>
         </div>
      <!-- Tab Reset ONU-->
      <div role="tabpanel" class="tab-pane" id="mail">
	<!-- Inicio php  
	  </br>
	  </br>
<div class="container">
            <div class="panel panel-primary" style="width:500px; Height: 438px; margin:0px auto">


              <div class="panel-heading">Gerenciamento de e-mail</div>
              <div class="panel-body">

<form class="form-inline" action="index.php" method="POST">

  <input type="text" class="form-control" placeholder="Digite o e-mail" aria-label="Recipient's username" aria-describedby="basic-addon2">

    <button class="btn btn-outline-secondary" type="submit">Verificar</button>


</form>

glyphicon glyphicon-search


Final PHP -->

              </div>
            </div>
        </div>


         <pre id="pre">
   <div class="form-group col-md-6" id="result_remoto">

      <div class="form-group col-md-6" id="loading">
<h4>Executando comando telnet...</h4><p>
<h4>Aguarde.</h4>
      <img  src="images/ajax-loader.gif">
      </div>

</pre>
         </div>


      </div>
      <!-- Final Tab panes -->
   </body>
</html>
<script>
   // Forçar preenchimento dos campos para acesso remoto com dois dígitos
   $("#slot").keyup(function() {
       this.value = ("00" + this.value).slice(-2)
   });
</script>   
<script>
   // Forçar preenchimento dos campos para acesso remoto com dois dígitos
   $("#link").keyup(function() {
       this.value = ("00" + this.value).slice(-2)
   });
</script>  
<script>
   // Forçar preenchimento dos campos para acesso remoto com dois dígitos
   $("#onu").keyup(function() {
       this.value = ("00" + this.value).slice(-2)
   });
</script> 
<script type="text/javascript">
   // Coleta resultado telnet.php
      jQuery(document).ready(function(){
         jQuery('#ajax_form').submit(function(){
            var dados = jQuery( this ).serialize();
   
            jQuery.ajax({
               type: "get",
               url: "telnet.php",
               data: dados,
               success: function( data )
               {
                  $('#result_remoto').html(data);
               }
            });            
            return false;
         });
      });
      
   $(document).ready(function () {
    $(document).ajaxStart(function () {
        $("#loading").show();
   $("#pre").show();
    }).ajaxStop(function () {
        $("#loading").hide();
    });
   });
   
</script>
<!-- Footer -->
</br>
</br>
</br>
</br>
</br>
<footer class="page-footer font-small blue col-md-12"">
   <!-- Copyright -->
   <div class="footer-copyright text-center py-3">© Desenvolvedor: 
      <a href="#"> Dimas Silva</a>
   </div>
   <!-- Copyright -->
</footer>
<!-- Footer -->
