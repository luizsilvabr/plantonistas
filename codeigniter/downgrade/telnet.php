<?php 
   $olt = $_GET['olt'];
   $slot = $_GET['slot'];
   $pon = $_GET['pon'];
   $onu = $_GET['onu'];
   $linkid = $pon-1;
   
   //COMANDOS
	$conectaSlot = 'telnet slot '.$slot;
    $conectaOnua = 'telnetonu data ponno '.$pon.' onuno '.$onu; 
	$conectaOnub = 'telnetonu data '.$linkid.' '.$onu;
    $downgradeCommand = 'download ftp system 189.1.144.230 ftp lpnet g2601_02B7G_BRAZIL_20170808140038.bin';
	
	//Log
	$ip_remoto = $_SERVER['REMOTE_ADDR'];
	$data_hora = date('d/m/Y \à\s H:i:s');
	$file = fopen("log.txt","a");
	fwrite($file,$data_hora. "\n");
	fwrite($file,"IP: ".$ip_remoto. "\n");

	fwrite($file,"OLT: ".$olt." | SLOT: ".$slot." | PON: ".$pon. " | ONU: ".$onu."\n \n \n");
	fclose($file);
   
   //UPGRADE VIA OLT
   require_once "includes/PHPTelnet.php"; 
   $telnet = new PHPTelnet(); 
   $result = $telnet->Connect($olt,'GEPON','GEPON'); 
   $telnet->DoCommand('EN', $result); 
   $telnet->DoCommand('GEPON', $result);
   $telnet->DoCommand('cd service', $result);
   $telnet->DoCommand($conectaSlot, $result);
   $telnet->DoCommand('cd service', $result);
   $telnet->DoCommand($conectaOnua, $result);

   if (stripos($result, 'Unknown') !== FALSE) {
   $telnet->DoCommand($conectaOnub, $result);
   $telnet->DoCommand('gpon', $result);
   $telnet->DoCommand('gpon', $result);
   $telnet->DoCommand('en', $result);
   $telnet->DoCommand('gpon', $result);
   $telnet->DoCommand($downgradeCommand, $result);
   if (stripos($result, 'Trying') !== false) {
	   $telnet->DoCommand('reboot', $result); 
   echo '<h4>
			<p>Procedimento de Downgrade efetuado!
			<p>Aguarde a reconexão do cliente.</p></br></h4>';
   }else{
	echo '<h4>
			<p>Ocorreu um erro na tentativa de efetuar o downgrade:<br>
			<p><b>Slot:</b> '.$slot.'
			<p><b>Pon:</b> '.$pon.'
			<p><b>Onu:</b> '.$onu.'
			<p>Erro na conexão Telnet.
			</h4>';
   }
   
}else{
   $telnet->DoCommand('gpon', $result);
   $telnet->DoCommand('gpon', $result);
   $telnet->DoCommand('en', $result);
   $telnet->DoCommand('gpon', $result);  
   $telnet->DoCommand($downgradeCommand, $result); 
   if (stripos($result, 'Trying') !== false) {
	   $telnet->DoCommand('reboot', $result); 
   echo '<h4>
			<p>Procedimento de Downgrade efetuado!
			<p>Aguarde a reconexão do cliente.</p></br></h4>';
   }else{
	echo '<h4>
			<p>Ocorreu um erro na tentativa de efetuar o downgrade:<br>
			<p><b>Slot:</b> '.$slot.'
			<p><b>Pon:</b> '.$pon.'
			<p><b>Onu:</b> '.$onu.'
			<p>Erro na conexão Telnet.
			</h4>';
   }
   }

   $telnet->Disconnect();

   
?>
