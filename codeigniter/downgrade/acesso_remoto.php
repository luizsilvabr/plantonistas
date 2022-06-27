<?php include 'header.php'; ?> 
        <?php include 'sidebar.php'; ?> 
		        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-6 col-8 align-self-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Acesso Remoto ONU</li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-block">
<!-- Inicio Conteudo -->
            <form id="ajax_form"   action="" method="POST">
               <div class="col-md-12">
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
					 <option value="10.235.71.1">OLT-01-IBA-HE</option>
                     <option value="10.231.11.1">OLT-01-IGA-HE</option>
					 <option value="10.233.61.1">OLT-01-ITG-HE</option>
					 <option value="10.233.11.1">OLT-01-ITU-HE</option>
					 <option value="10.110.80.1">OLT-01-JAU-HE-AREA-A</option>
					 <option value="10.110.100.1">OLT-01-JAU-HE-AREA-B</option>
                     <option value="10.110.50.1">OLT-01-MAC-CAPRI</option>
					 <option value="10.234.11.1">OLT-01-MNT-HE</option>
                     <option value="10.121.60.1">OLT-01-PDR-ESCRITORIO</option>
                     <option value="10.229.11.1">OLT-01-PTV-HEADEND</option>
                     <option value="10.130.60.1">OLT-01-SML-SKALA</option>
                     <option value="10.228.28.1">OLT-01-TBJ-HEADEND</option>
                  </select>
                  <br>
				  <br>
				  <div class="form-group col-md-12">
                  
                     <label for="remotoSlot"><b>Slot: </b></label>
                     <input type="text" name="slot" class="form-group form-control col-md-2" id="slot">
                  
                  
                     <label for="remotoLink"><b>&emsp;Link: </b></label>
                     <input type="text" name="link" class="form-group form-control col-md-2" id="link">
                  
                 
                     <label for="remotoOnu"><b>&emsp;Onu: </b></label>
                     <input type="text" name="onu" class="form-group form-control col-md-2" id="onu">
                  
				  </div>
                  <div class="form-group col-md-12">
  <label><input type="radio" name="acao" checked value="1" active> Habilitar Acesso Remoto</label>
</br>
                  
  <label><input type="radio" name="acao" value="0" active> Resetar ONU</label>
</div>
</div>
			<div class="form-group col-md-12">
                     <input type="submit" name="resetar" class="btn btn-danger col-md-3" value="Executar">
                  
                     <a href="acesso_remoto.php" class="btn btn-success col-md-3">
                     <span class="glyphicon glyphicon-refresh"></span> Recarregar
                     </a>
                  </div>
			
               </div>
            </form>
         </div>
         
		 

		 
		 
         </div>

		    <div class="card col-md-6" id="result_remoto">
			<br><br><div style="background-color:#3498DB;color:white;padding:1%;"><p>"Determinação, coragem e autoconfiança são fatores decisivos para o sucesso. Se estamos possuídos por uma inabalável determinação, conseguiremos superá-los. Independentemente das circunstâncias, devemos ser sempre humildes, recatados e despidos de orgulho."</p></br>Dalai Lama</div>
<div class="card">
      <div id="loading"><br>
<h4>Executando o comando selecionado. Aguarde!</h4><p>
<br>
<div align="center">
      <img   src="images/ajax-loader2.gif">
	  </div>
      </div>

</pre>
</div>
         </div>


      </div>
      <!-- Final Tab panes -->

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
   // Coleta resultado acesso_reset.php
      jQuery(document).ready(function(){
         jQuery('#ajax_form').submit(function(){
            var dados = jQuery( this ).serialize();
   
            jQuery.ajax({
               type: "get",
               url: "fibra/acesso_reset.php",
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
<!-- Fim Conteudo -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <?php include 'footer.php'; ?> 
