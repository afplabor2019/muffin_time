<?php if(!defined("APP_MODE")) { exit; } ?>
<?php
include_once 'partials/_header.php';
include_once 'partials/_navbar.php';

if(!logged_in()){
    redirect('home');
}

if($userdata["role"] != "admin"){
    redirect("home");
}

$users = get_all_users();
?>

<div class="table-responsive">
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="border-0 bg-light">
                <div class="p-2 px-3 text-uppercase">UserID</div>
            </th>
            <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Felhasználónév</div>
            </th>
            <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Email</div>
            </th>
            <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Jogosultsági szint</div>
            </th>
            <th scope="col" class="border-0 bg-light">
                <div class="py-2 text-uppercase">Műveletek</div>
            </th>
        </tr>
        </thead>
        <tbody>
            <?php if($users->num_rows <= 0): ?>
                <h1 class="text-center">Nincsen felhasználó az adatbázisban!</h1>
            <?php endif; ?>
            <?php foreach($users as $user): ?>
                <tr>
                  <td class="border-0 align-middle"><strong><?=$user["user_id"]?></strong></td>
                  <td class="border-0 align-middle"><?=$user["username"]?></td>
                  <td class="border-0 align-middle"><strong><?=$user["email"]?></strong></td>
                  <td class="border-0 align-middle"><strong><?=$user["role"]?></strong></td>
                  <td class="border-0 align-middle"><a href="<?php echo url('admin_manage_users', ["action" => "edit_user", "user_id" => $user["user_id"]]); ?>"><i class="fas fa-pencil-alt"></i></a> &nbsp; <a href="<?php echo url('admin_manage_users', ["action" => "delete_user", "user_id" => $user['user_id']]); ?>"><i class="fa fa-trash"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php
include_once 'partials/_footer.php';
?>