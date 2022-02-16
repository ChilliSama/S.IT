<?php include "header.php"; ?>

<?php    
    if(isset($_POST['submit'])){
        $email = $_POST['email'];
        $pswd = hash('sha256', $_POST['password']);
        $stay_connected = $_POST['stay_connected'];

        if ($check['email'] = $email && $check['pswd'] = $pswd){
            $query = "SELECT id_user FROM user WHERE email = '{$email}'";
            $id = mysqli_fetch_assoc(mysqli_query($connect, $query));

            if ($stay_connected = "true"){
                setcookie('user_id', '{$id}', time()+3600*24*15,  '/', '', true, true);
            } else {
                setcookie('user_id', '{$id}', time()+3600*24,  '/', '', true, true);
            }

            header("Location: /index.php");
            die();
        } else {
            echo '  </br>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="alert-danger px-4" style="border-radius: 10px;">
                            <strong>/!\ Email déjà utilisé /!\</strong>
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
            <div class="form-check" style="margin-left: -17.5%">
                <input class="form-check-input" type="checkbox" value="true" id="flexCheckDefault" name="stay_connected">
                <label class="form-check-label" for="flexCheckDefault">Rester connecté (15 jours)</label>
            </div>
        </div></br></br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit" name="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>