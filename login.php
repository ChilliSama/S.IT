<?php include "ressources/php/header.php"; ?>

<?php    
// debug
// if (isset($_POST)) {
//     var_dump($_POST);
// }
    function set_auth_cookie($rem, $id, $connect){
        $selector = base64_encode(random_bytes(9));
        $authenticator = random_bytes(33);
        
        if ($rem) {
            $timer = time() + 3600*24*15;
        } else {
            $timer = time() + 3600;
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
        
        $authenticator = hash("sha256", $authenticator);
        $query = "INSERT INTO auth_tokens(id, selector, token, userid, expires) ";
        $query .= "VALUE (0, '{$selector}', '{$authenticator}', '2', '{$timer}')";
        var_dump($query);
         die();
        $query_add = mysqli_query($connect, $query);
    }



    if(isset($_POST['submit'])){
        $email = htmlentities($_POST['email']);
        $pswd = hash('sha256', htmlentities($_POST['password']));
        $stay_connected = isset($_POST['stay_connected']) ? $_POST['stay_connected'] : false;

        $query = "SELECT email, pswd FROM user WHERE email='{$email}' AND pswd='{$pswd}'";

        $check = mysqli_fetch_assoc(mysqli_query($connect, $query));
      

        if (isset($check['email']) && ($check['email'] = $email && $check['pswd'] = $pswd)){
            $query = "SELECT prenom, nom, id_user FROM user WHERE email = '{$email}'";
            $id = mysqli_fetch_assoc(mysqli_query($connect, $query));
            $user_name = $id['prenom']. ".". $id['nom'];

            $test = intval($id);
            $t2 = 2;
            
            // var_dump($query, $id, $test,$id["id_user"],$t2, $user_name);
            // die();

            set_auth_cookie($stay_connected, $id["id_user"], $connect);

            // echo '<script type="text/javascript">','login_user();','</script>';

            //header("Location: /index.php");
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
            <button type="submit" name="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>

<?php include "ressources/php/footer.php"; ?>