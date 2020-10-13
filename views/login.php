<div class="container mt-2">
    <h3 class="text-center">Login</h3>

    <!-- Message for wrong input in the formulary-->
    <?php if (!empty($message)) { ?>
        <div class="alert alert-danger alert-dismissible fade show"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Attention! </strong>
            <?php  echo $message ?>
        </div>
    <?php } ?>

    <!-- for a center block -->
    <div class="row">
        <div class="offset-sm-5 col mr-0 pr-0">
            <!-- Formulary -->
            <form action="index.php?action=login" class="was-validated" method="post">

                <!-- Email row -->
                <div class="form-row">
                    <div class="form-group col-sm-5">
                        <label for="inputUsername">Pseudo</label>
                        <div class="input-group mb-2">
                            <input type="text"  class="form-control" id="inputUsername" placeholder="Ex : clabi" name="username" required>
                        </div>
                    </div>
                </div>

                <!-- Password row -->
                <div class="form-row">
                    <div class="form-group col-sm-5">
                        <label for="inputPassword">Mot de passe</label>
                        <input type="password" class="form-control" id="inputPassword" placeholder="Mot de passe" name="password" required>
                    </div>
                    <div class="col mt-4">
                        <label class="custom-checkbox mt-3">
                            <input type="checkbox" onclick="myFunction()" />
                            <i class='fas fa-eye unchecked'></i>
                            <i class='fas fa-eye-slash checked'></i>
                        </label>
                    </div>
                </div>

                <!-- Remember me row -->
                <div class="form-group form-check">

                    <input class="form-check-input" type="checkbox" name="remember"> Se souvenir de moi.
                </div>

                <!-- Submit button -->

                <button type="submit" class="btn btn-primary ml-2">Se connecter</button>

            </form>

            <a class="py-0 text-primary small ml-4" href="index.php?action=register">Pas encore inscrit ?</a>
        </div>
    </div>
</div>

<!-- Script for showing or not the password -->
<script>
    function myFunction() {
        var x = document.getElementById("inputPassword");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>