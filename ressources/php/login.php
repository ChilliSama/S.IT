<?php include "header.php"; ?>

<?php    
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pswd = hash('sha256', $_POST['password']);
        $stay_connected = isset($_POST['stay_connected']) ? $_POST['stay_connected'] : false;

        $query = "SELECT email, pswd FROM user WHERE email='{$email}' AND pswd='{$pswd}'";
        $check = mysqli_fetch_assoc(mysqli_query($connect, $query));

        if (isset($check['email']) && ($check['email'] = $email && $check['pswd'] = $pswd)){
            $query = "SELECT prenom, nom FROM user WHERE email = '{$email}'";
            $id = mysqli_fetch_assoc(mysqli_query($connect, $query));
            $user_name = $id['prenom']. ".". $id['nom'];

            set_auth_cookie($stay_connected);

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
            <button type="submit" name="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>