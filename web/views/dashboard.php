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
                <img src="logo.png" id="icon" alt="Logo" />
            </div>
  
      <!-- Form -->
            <div id="base">Welcome here, <?=$userdata["felhasznalonev"]?>!</div>
            <div>
                <img src="muffin.png" id="icon" alt="Muffin" />
            </div>
            <?php
                if(User::isAdmin(Session::get('userid'))){
                    $users = User::getAllUser();
            ?>
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Felhasználónév</th>
                                <th>Email cím</th>
                                <th>Jogosultság</th>
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