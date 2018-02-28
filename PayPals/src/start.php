<?php
	
    use PayPal\Rest\ApiContext;
    use PayPal\Auth\OAuthTokenCredential;

    session_start();

//    $user = $_SESSION['id'];

    $db = new PDO('mysql:host = localhost; dbname=ktb2','root','');

    // $user = $db->prepare("
    //     SELECT * FROM restaurants WHERE restaurant_id = :restaurant_id 
    //     ");

    // $user->execute(['restaurant_id' => $_SESSION['id']]);

    // $user = $user->fetchObject();
	//include '../../Controller/dbconn.php';

    //islogged3();
        
     require __DIR__ .'/../vendor/autoload.php';
  //    //API
     $api=new ApiContext(
            new OAuthTokenCredential(
                'AZ3vmzgJpfd94PjrTng9-IbqSh0BugUBQa0tY_UpLFEA7TYOQkO-Ro7P5BRpi_e3tmpJRSx3JYajLIbH',
                'EJpLUAjRGDKUpbskqTJGwgY-X4NE6bFNm4vnU8NLRz9aqMzm-HJoKUJAovOLeryt5FBCyzfnIvwkiLhn'
            )
     );

     $api->setConfig([
            'mode' => 'sandbox',
            'http.ConnectionTimeOut' => 30,
            'log.LogEnabled' => false,
            'log.FileName' => '',
            'log,LogLevel' => 'FINE',
            'validation.level' => 'log'
     ]);
                                  
  
?>