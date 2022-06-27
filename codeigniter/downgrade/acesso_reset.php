<?php 
   $olt = $_GET['olt'];
   $slot = $_GET['slot'];
   $link = $_GET['link'];
   $onu = $_GET['onu'];
   $acao = $_GET['acao'];
   
   $frase = '';
   
   //IF FIBERHOME
   if(($olt == '10.142.11.1' or $olt == '10.103.12.6' or $olt == '10.103.12.2' or $olt == '10.121.60.1') ){
   
   
	require_once "PHPTelnet.php"; 
	$telnet = new PHPTelnet(); 

   if($acao == 1){      
   $result = $telnet->Connect($olt,'GEPON','GEPON'); 
   $telnet->DoCommand('EN', $result); 
   $telnet->DoCommand('GEPON', $result);
   $telnet->DoCommand('cd onu', $result); 
   sleep(1);
   
   $telnet->DoCommand('set onu_local_manage_config slot '.$slot.' pon '.$link.' onu '.$onu.' config_enable_switch disable console_switch enable telnet_switch enable web_switch enable web_port 8183 web_ani_switch enable tel_ani_switch enable', $result);
   
   
   sleep(1);
   $telnet->DoCommand('show wan_info slot '.$slot.' pon '.$link.' onu '.$onu, $result);


   if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $result, $ip_match)==true){ 
   
      $connection = @fsockopen($ip_match[0], 80);

    if (is_resource($connection))
    {
        echo '</BR><div class="alert alert-info" role="alert"><center><h4>Acesso remoto habilitado para: <a href="http://'.$ip_match[0].':80" target=_blank><b>'.$ip_match[0].'</b></a></h4></div>'.$frase;

        fclose($connection);
    }else{  

   echo '</BR><div class="alert alert-info" role="alert"><center><h4>Acesso remoto habilitado para: <a href="http://'.$ip_match[0].':8183" target=_blank><b>'.$ip_match[0].'</b></a></h4></div>'.$frase;
   }
   
   
   }else{

                     
   echo '<div class="alert alert-danger" role="alert"><center><font size="3" color="red"></br><b>Erro: </b></br>Verifique se os dados informados estão corretos.<br>Se estiverem corretos, DMZ pode estar ativa no cliente.</font></div>'.$frase;
   }
           }else{
   $result = $telnet->Connect($olt,'GEPON','GEPON'); 
   $telnet->DoCommand('EN', $result); 
   $telnet->DoCommand('GEPON', $result);
   $telnet->DoCommand('cd onu', $result); 
   sleep(1);
   
   $telnet->DoCommand('reset default_cfg slot '.$slot.' link '.$link.' onu '.$onu. ' default_cfg 1', $result);

   
   var_dump($result);
echo '</BR>Obs: Após reset senha padrão é User:Admin Senha: Admin.'.$frase;
		}
      $telnet->Disconnect();
	  
	  echo '<BR>';
	  
	  echo '<form action="fibra/downgrade2_remoto.php" method="GET"><labe><input type="submit" name="ip" class="btn btn-danger col-md-3" value="'.$ip_match[0].'">Downgrade apenas para WKE2.134.321B7G</label></form>';

   }else{
//ELSE NAO FIBERHOME	  
	  require_once "PHPTelnet.php"; 
	$telnet = new PHPTelnet(); 

   if($acao == 1){      
   $result = $telnet->Connect($olt,'GEPON','GEPON'); 
   $telnet->DoCommand('EN', $result); 
   $telnet->DoCommand('GEPON', $result);
   $telnet->DoCommand('cd gpononu', $result); 
   sleep(1);
   $telnet->DoCommand('set onu_local_manage_config slot '.$slot.' link '.$link.' onu '.$onu.' config_enable_switch enable console_switch enable telnet_switch enable web_switch enable web_port 8183 web_ani_switch enable tel_ani_switch enable', $result); 
   sleep(1);
   $telnet->DoCommand('show wifi_info slot '.$slot.' link '.$link.' onu '.$onu, $result);


   if (preg_match('/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}/', $result, $ip_match)==true){ 
   
      $connection = @fsockopen($ip_match[0], 80);

    if (is_resource($connection))
    {
        echo '</BR><div class="alert alert-info" role="alert"><center><h4>Acesso remoto habilitado para: <a href="http://'.$ip_match[0].':80" target=_blank><b>'.$ip_match[0].'</b></a></h4></div>'.$frase;

        fclose($connection);
    }else{  

   echo '</BR><div class="alert alert-info" role="alert"><center><h4>Acesso remoto habilitado para: <a href="http://'.$ip_match[0].':8183" target=_blank><b>'.$ip_match[0].'</b></a></h4></div>'.$frase;
   }
   
   
   }else{

                     
   echo '<div class="alert alert-danger" role="alert"><center><font size="3" color="red"></br><b>Erro: </b></br>Verifique se os dados informados estão corretos.<br>Se estiverem corretos, DMZ pode estar ativa no cliente.</font></div>'.$frase;
   }
           }else{
   $result = $telnet->Connect($olt,'GEPON','GEPON'); 
   $telnet->DoCommand('EN', $result); 
   $telnet->DoCommand('GEPON', $result);
   $telnet->DoCommand('cd gpononu', $result); 
   sleep(1);
   
   $telnet->DoCommand('reset default_cfg slot '.$slot.' link '.$link.' onu '.$onu. ' default_cfg 1', $result);

   
   var_dump($result);
echo '</BR>Obs: Após reset senha padrão é User:Admin Senha: Admin.'.$frase;
		}
      $telnet->Disconnect();
	  
	  echo '<BR>';
	  
	  echo '<form action="fibra/downgrade2_remoto.php" method="GET"><labe><input type="submit" name="ip" class="btn btn-danger col-md-3" value="'.$ip_match[0].'"></label></form>';
   
   }
?>
