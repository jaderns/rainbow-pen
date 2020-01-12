<?php 

use App\Model\Client;
use App\SessionManager;

require_once __DIR__.'/../../src/SessionManager.php';

$error = [];
$admin = SessionManager::loggedClient();
$email=$_GET['edit'];
$client = require __DIR__.'/../../includes/client-par-email.php';
$new_email = $_POST['email'] ?? null;
$new_name = $_POST['name'] ?? null;
$new_address = $_POST['address'] ?? null;
$new_password = $_POST['password'] ?? null;
$new_cpassword = $_POST['cpassword'] ?? null;

if ($new_password !== $new_cpassword) {
    $error['password'] = "La confirmation du mot de passe ne correpond pas !\n";
} else {
    if('' == $new_password && '' == $new_cpassword)
    {
        $hashedPassword = $client->password();
    } else {
    $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
    }
}


if (count($error) === 0 && null !== $new_email) {
    $client = require __DIR__.'/../../includes/update-client.php';;
    if ($client instanceof Client) {
        if (1 == $admin->statut()) {
            header('location: ../admin/profile-pro.php');
            exit(); 
        } else {
            header('location: ../client/profile.php');
            exit();
        }
    } else {
        $error['enregistrement'] = 'Erreur pendant enregistrement !';
    }
    }


if (isset($_POST['submit']))
{
    

}

?>



<h3>Modifier compte</h3>
<?php if(!empty($arr_message['msg'])) { ?>
    <div class="alert <?php echo $arr_message['class']; ?>"><?php echo $arr_message['msg']; ?></div>
<?php } ?>
<form method="post">
    <div>
        <label for="exampleInputFullname">Name</label>
        <input type="text"  name="name" placeholder="Name" value="<?= $client->name(); ?>" required>
    </div>
    <div>
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" placeholder="Email" value="<?= $client->email(); ?>" readonly>
        <?php if (isset($error['email'])): ?>
            <p><?= $error['email'] ?></p>
        <?php endif; ?>
    </div>
    
<?php 
if (1 != $admin->statut()) {
?>
<div class="form-group">
                            <label for="exampleInputPassword1">Nouveau mot de passe</label>
                            <input type="password" name="password" placeholder="Password" >
                            <?php if (isset($error['password'])): ?>
                                <p><?= $error['password'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword2">Confirmation nouveau </label>
                            <input type="password"  name="cpassword" placeholder="Confirm Password" >
                        </div>

<?php
}

?>

    <div>
        <label for="exampleInputAddress">Address</label>
        <input type="text"  name="address" placeholder="address" value="<?= $client->address(); ?>" required>
    </div>

    <button type="submit" name="submit" >Submit</button>


</form>
