<?php
include_once 'config/init.php';
include_once '_header.php';
?>
<?php
if(Session::isset('userid')){
    $userdata = User::fetchData(Session::get('userid'));
?>

<div id="formContent2">
  
      <!-- Icon -->
            <div>
                <img src="img/logo.png" id="icon" alt="Logo" />
            </div>
  
      <!-- Form -->
            <div id="base">Welcome here, <?=$userdata["felhasznalonev"]?>!</div>
            <div>
                <img src="img/muffin.png" id="icon" alt="Muffin" />
            </div>
            <?php
                if(User::isAdmin(Session::get('userid'))){
                    $users = User::getAllUser();
            ?>
                <div>
                    <table class="table centered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email address</th>
                                <th>Role</th>
                                <th>Last login</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                foreach($users as $user){
                                    echo "<tr>";
                                        echo "<td>{$user['id']}</td>";
                                        echo "<td>{$user['felhasznalonev']}</td>";
                                        echo "<td>{$user['email']}</td>";
                                        echo "<td>{$user['jogosultsag']}</td>";
                                        echo "<td>{$user['last_login']}</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
                }
            ?>
  
      <!-- Logout -->
            <div id="formFooter">
                <a class="underlineHover" href="?p=logout">Log out</a>
            </div>
  
            </div>
<?php
}
?>
<?php
include_once '_footer.php';
?>