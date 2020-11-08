<?php
// Its operation is simple, it stops the php script by indicating a predefined message, by default, the message is An unknown error occurred
function erreur($err='')
{
   $mess=($err!='')? $err:'An unknown error occurred';
   exit('<div id="error">'.$mess.'</div><div class="ui secondary segment"><p><i class="circular warning icon"></i> <a href="./index.php">Click here to return to the homepage.</a></p></div></div></div></body></html>');
}


// Avatar upload
function move_avatar($avatar)
{
    $extension_upload = strtolower(substr(  strrchr($avatar['name'], '.')  ,1));
    $name = time();
    $nomavatar = str_replace(' ','',$name).".".$extension_upload;
    $name = "./images/avatars/".str_replace(' ','',$name).".".$extension_upload;
    move_uploaded_file($avatar['tmp_name'],$name);
    return $nomavatar;
}


// Send an email to the member who just registered
$titre = "Successful forum registration!"; // Title
$message = "Welcome to ".$config['forum_titre']."! Your username is: ".$_POST['pseudo']." and your password is: ".$_POST['password'].""; // Message

mail($_POST['email'], $titre, $message);


// Checking the role (level)
function verif_auth($auth_necessaire)
{
    $level=(isset($_SESSION['level']))?$_SESSION['level']:1;
    return ($auth_necessaire <= intval($level));
}


// Function listing pages (pagination)
function get_list_page($page, $nb_page, $link, $nb = 2)
{
    $list_page = array();
    for ($i=1; $i <= $nb_page; $i++)
    {
        if (($i < $nb) OR ($i > $nb_page - $nb) OR (($i < $page + $nb) AND ($i > $page -$nb)))
            $list_page[] = ($i==$page)?'<a class="active item">'.$i.'</a>':'<a class="item" href="'.$link.'&amp;page='.$i.'">'.$i.'</a>'; 
        else {
            if ($i >= $nb AND $i <= $page - $nb)
                $i = $page - $nb;
            elseif ($i >= $page + $nb AND $i <= $nb_page - $nb)
                $i = $nb_page - $nb;
            $list_page[] = '<a class="disabled item">...</a>';
        }
    }
    $print= implode('', $list_page);
    return $print;
}

/* // Function to retrieve the full URL
function currentURL()
{
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'], 'https') === FALSE ? 'http' : 'https';
	$host     = $_SERVER['SERVER_NAME'];
	$port     = $_SERVER["SERVER_PORT"];
	$query    = $_SERVER['REQUEST_URI'];
	return $protocol.'://'.$host.($port != 80 ? ':'.$port : '').$query;
} */
