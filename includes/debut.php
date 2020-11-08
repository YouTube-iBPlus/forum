<?php
if (file_exists("./install.php")) {
	header("Location: ./install.php");
}
// Retrieving configuration variables
$query = $db->query('SELECT * FROM forum_config');
$config = array();
while($data=$query->fetch())
{
    $config[$data['config_nom']] = $data['config_valeur']; 
}
$query->CloseCursor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
    // If the title is indicated, it is displayed between the <title>
    echo (!empty($titre))?'<title>'.$titre.' - '.$config['forum_titre'].'</title>':'<title>Forum - Osiris</title>';
?>
    <!-- We retrieves informations -->
    <!-- CSS -->
    <link rel="icon" type="image/png" href="./images/logo.png">
    <link rel="stylesheet" type="text/css" href="./css/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="./css/icon.min.css">
    <link rel="stylesheet" type="text/css" href="./css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="./css/custom.css">
    <link rel="stylesheet" type="text/css" href="./css/wbbtheme.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>  
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="./js/semantic.min.js"></script>
    <script src="./js/iframe.js"></script>
    <script src="./js/iframe-content.js"></script>
    <script src="./js/randomquotes.js"></script>
    <script src="./js/jquery.wysibb.min.js"></script>
    <script>
        $(function() {
            var wbbOpt = {
                buttons: "bold,italic,underline,|,img,video,link,|,bullist,|,fontcolor,|,justifycenter,|,code,quote"
            }
            $("#editor").wysibb(wbbOpt);
        })
    </script>
    <script>
        $(".ui.dropdown")
            .dropdown()
        ;
    </script>
    
    <!-- Styles perso -->
    <style type="text/css">
        body {
            background-color: #edeff0;
        }
        
        .ui.menu .item img.logo {
            margin-right: 1.3em;
        }
        
        .main.container {
            margin-top: 7em;
        }
        
        .wireframe {
            margin-top: 2em;
        }
        
        .ui.footer.segment {
            margin: 5em 0em 0em;
            padding: 5em 0em;
        }
    </style>
</head>
<?php
    // Assigning session variables
    $lvl=(isset($_SESSION['level']))?(int) $_SESSION['level']:1;
    $id=(isset($_SESSION['id']))?(int) $_SESSION['id']:0;
    $pseudo=(isset($_SESSION['pseudo']))?$_SESSION['pseudo']:'';

    // Includes the remaining 2 pages
    include("functions.php");
    include("constants.php");
    require_once("JBBCode/Parser.php");

    // Creating variables
    $ip = ip2long($_SERVER['REMOTE_ADDR']);

    //Requête
    $query=$db->prepare('INSERT INTO forum_whosonline VALUES(:id, :time,:ip) ON DUPLICATE KEY UPDATE online_time = :time , online_id = :id');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->bindValue(':time',time(), PDO::PARAM_INT);
    $query->bindValue(':ip', $ip, PDO::PARAM_INT);
    $query->execute();
    $query->CloseCursor();
    $time_max = time() - (60 * 5);
    $query=$db->prepare('DELETE FROM forum_whosonline WHERE online_time < :timemax');
    $query->bindValue(':timemax',$time_max, PDO::PARAM_INT);
    $query->execute();
    $query->CloseCursor();
