
<?php


header('Access-Control-Allow-Origin: *');
	/* get markes from file */
	
$dataPath = 'data/';
$markerDataFile = 'markers.json';

	
	$markerText = file_get_contents($markerDataFile);

/* create array list from markers */


	$markerList = json_decode($markerText,true);

/* check if new marker is posted */


	if( !empty($_POST['marker'])  ){

        /* get new marker data */
        

		$markerData =  $_POST['marker'];

        /* add additional marker information */
        
	
		$markerData['ip'] = $_SERVER['REMOTE_ADDR'];
        
	
		$markerData['created'] = time();	/*  create detail marker content file */
        
	
		$markerContent = "<h2>" . $markerData['creator'] . "</h2><br><p><b>Endereço:</b> " . $markerData['name'] . "</p><a href='https://api.whatsapp.com/send?phone=55" . $markerData['cel'] . "&text=Olá,%20estou%20interessado%20em%20alugar%20a%20sua%20vaga' target='_blank'><div class='btn-whatsapp'>Whatsapp</div></a><a href='mailto:" . $markerData['email'] . "?subject=Aluguel de vaga pelo SPOT&body=Olá gostaria de alugar sua vaga.'><div class='btn-email'>E-mail</div></a>";

        
		$markerContent .= "<p style='display: none;'><b>Cadastrado em:</b> " . date("D M j G:i:s Y") . "</p>";

        /* save marker file to server */

        
		$markerFile = $dataPath . $markerData['id'] . ".html";

        
		file_put_contents($markerFile  , $markerContent);

        /* add new marker to existing list */
        
	
		$markerList['markers'][] = $markerData;

        /* convert comments to string */
        
	
		$markerText = json_encode($markerList);

        /* save comment to file */
   
     	
		file_put_contents($markerDataFile, $markerText);

        /* return newly created marker */
        
		echo json_encode($markerData);

	}
	else{
        
		echo "Invalid request";

	}
?>
