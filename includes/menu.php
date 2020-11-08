<body>
<?php
$query=$db->prepare('SELECT * FROM forum_membres WHERE membre_id=:id');
$query->bindValue(':id',$id, PDO::PARAM_INT);
$query->execute();
$data=$query->fetch();
?>
<div class="ui fixed stackable menu">
        <div class="ui container">
            <div class="header item">
                <img class="logo" src="./images/logo.png">
                <?php echo $config['forum_titre']; ?>
                <!-- <h4><?php echo $config['forum_titre']; ?></h4> -->
            </div>
            <?php if(isset($_SESSION['pseudo'])) { ?>
            <a href="./index.php" class="item"><i class="home icon"></i>Home</a>
            <?php if (verif_auth(ADMIN) OR verif_auth(MODO)) { ?>
            <a href="./admin.php" class="item"><i class="dashboard icon"></i>Dashboard</a>
            <?php } ?>
            <div class="right menu">
                <div class="ui simple dropdown item">
                    <img class="ui avatar image" src="./images/avatars/<?php echo $data['membre_avatar']; ?>"> <span><?php echo $pseudo; ?></span><i class="dropdown icon"></i>
                    <div class="menu">
                        <a href="./voirprofil.php?m=<?php echo $data['membre_id']; ?>&action=consulter" class="item"><i class="user outline icon"></i>My profile</a>
                        <a href="./amis.php" class="item"><i class="address book outline icon"></i>My friends</a>
                        <a href="./messagesprives.php" class="item"><i class="mail outline icon"></i>My mails</a>
                        <div class="divider"></div>
                        <a href="./deconnexion.php" class="item"><i class="power red icon"></i>Sign out</a>
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <a href="./index.php" class="item"><i class="home icon"></i>Home</a>
            <div class="right menu">
                <div class="item">
                    <a href="./register.php" class="ui primary button">Register</a>
                </div>
                <div class="item">
                    <a href="./connexion.php" class="ui button">Login</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>