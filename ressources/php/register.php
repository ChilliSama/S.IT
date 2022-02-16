<?php include "header.php"; ?>

<?php    
    if(isset($_POST['submit'])){
        $firstname = $_POST['firstname'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pswd = hash('sha256', $_POST['password']);
        $organisation = $_POST['organisation'];

        $query = "SELECT email FROM user WHERE email = '{$email}'";
        $check = mysqli_fetch_assoc(mysqli_query($connect, $query));

        if ($check['email']){
            echo '  </br>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="alert-danger px-4" style="border-radius: 10px;">
                            <strong>/!\ Email déjà utilisé /!\</strong>
                        </div>
                    </div>';
        } else {
            $query = "INSERT INTO user(id_user, nom, prenom, position, email, pswd, organisation) ";
            $query .= "VALUE (0, '{$name}', '{$firstname}', 0, '{$email}', '{$pswd}', '{$organisation}')";

            $query_add = mysqli_query($connect, $query);

            if ($query_add = 1){
                header("Location: /index.php");
                die();
            } else {
                echo '  </br>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="alert-warning px-4" style="border-radius: 10px;">
                            <strong>/!\ Erreur de liaison avec la base de donnée, veuillez rechargé la page ou contacter un administrateur /!\</strong>
                        </div>
                    </div>';
            }
        }
    }
?>

<div class="container-fluid">
    <form action="" method="post"></br></br></br>
        <div class="d-flex justify-content-around align-items-center">
            <div></div><div></div><div></div>
            <div class="form-group col-md-3">
                <label for="firstname">Prénom</label>
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom" required>
            </div>
            <div class="form-group col-md-3">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Nom" required>
            </div>
            <div></div><div></div><div></div>
        </div></br>
        <div class="d-flex justify-content-around align-items-center">
            <div></div><div></div><div></div>
            <div class="form-group col-md-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            </div>
            <div class="form-group col-md-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <div></div><div></div><div></div>
        </div></br>
        <div class="d-flex justify-content-center align-items-center">
            <div class="form-group col-md-4">
                <label for="organisation">Organisation</label>
                <select id="organisation" name="organisation" class="form-control">
                    <option selected value="NULL">Choose...</option>
                    <option value="Monaco Digital">Monaco Digital</option>
                </select>
            </div>
        </div></br>
        <div class="d-flex justify-content-center align-items-center">
            <button type="submit" name="submit" class="btn btn-primary">S'inscrire</button>
        </div>
    </form>
</div>

<?php include "footer.php"; ?>