<?php include "ressources/php/header.php"; ?>

<?php
// $t=time();
// echo($t. " - second since January 1 1970 00:00:00 GMT" . "<br>");
// echo(date('l jS \of F Y h:i:s A',$t). " - today (cast in string)". "<br>");
// echo(strtotime(date('h:i:s A',$t)). " second after recast time->date->strtotime". "<br>");

// debug
// if (isset($_POST)) {
//     var_dump($_POST);
// }
    function set_auth_cookie($rem, $userid, $db){
        $selector = base64_encode(random_bytes(9));
        $authenticator = random_bytes(33);
        
        if ($rem) {
            $timer = time() + 36000 + 3600*24*15; //GTM+1 + 15 days
        } else {
            $timer = time() + 3600*2;
        }
        setcookie(
            'remember',
             $selector.':'.base64_encode($authenticator),
             $timer,
             $_SERVER['HTTP_HOST'],
             '',
             false, // TLS-only
             false  // http-only
        );
        
        $timer = date("Y-m-d h:i:s", $timer);
        $authenticator = hash("sha256", $authenticator);
        $query = "INSERT INTO auth_tokens(id, selector, token, userid, expires) ";
        $query .= "VALUE (:id, :selector, :authenticator, :userid, :timer)";
        $query_add = $db->prepare($query);
        $query_add->execute([
            'id' => 0,
            'selector' => $selector,
            'authenticator' => $authenticator,
            'userid' => $userid,
            'timer' => $timer,
        ]);
    }



    if(isset($_POST['submit'])){
        $email = htmlentities($_POST['email']);
        $pswd = hash('sha256', htmlentities($_POST['password']));
        $stay_connected = isset($_POST['stay_connected']) ? $_POST['stay_connected'] : false;

        $query = "SELECT email, pswd FROM user WHERE email= :email AND pswd= :pswd";
        $checkStatement = $db->prepare($query);
        $checkStatement->execute([
            'email' => $email,
            'pswd' => $pswd,
        ]);
        $check = $checkStatement->fetch(PDO::FETCH_ASSOC);
        // var_dump($check);
        // die();

        if (isset($check['email']) && ($check['email'] = $email && $check['pswd'] = $pswd)){
            $query = "SELECT prenom, nom, id_user FROM user WHERE email = :email";
            $idStatement = $db->prepare($query);
            $idStatement->execute([
                'email' => $email,
            ]);
            $id = $idStatement->fetch(PDO::FETCH_ASSOC);

            $user_name = $id['prenom']. ".". $id['nom'];
            
            // var_dump($query, $id, $test,$id["id_user"],$t2, $user_name);
            // die();

            set_auth_cookie($stay_connected, $id["id_user"], $db);

            echo '<script type="text/javascript">','login_user();','</script>';

            header("Location: /index.php");
            die();
        } else {
            echo '  </br>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="alert-danger px-4" style="border-radius: 10px;">
                            <strong>/!\ Email ou mot de passe incorrect /!\</strong>
                        </div>
                    </div>';
        }
    }
?>



<div class="container-fluid">
    <form action="" method="post" ></br></br></br>
        <div class="d-flex justify-content-center align-items-center">
            <div></div><div></div><div></div>
            <div class="form-group col-md-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
        </div></br>
        <div class="d-flex justify-content-center align-items-center">
            <div class="form-group col-md-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div></div><div></div><div></div>
        </div></br>
        <div class="d-flex justify-content-around align-items-center">
            <div></div><div></div><div></div>
            <div class="form-check" >
                <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="stay_connected">
                <label class="form-check-label" for="flexCheckDefault">Rester connecté (15 jours)</label>
            </div>
            <div></div><div></div><div></div>
        </div></br></br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit" name="submit" class="btn btn-primary">Se Connecter</button>
        </div>
    </form>
</div>

<?php include "ressources/php/footer.php"; ?>