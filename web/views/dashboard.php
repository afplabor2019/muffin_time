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
            <h1>Listing all users</h1>
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
                    if(isset($_POST["newuser_submit"])){
                        $username = trim($_POST["username"]);
                        $password1 = trim($_POST["password1"]);
                        $password2 = trim($_POST["password2"]);
                        $email = trim($_POST["email"]);
                        $role = ($_POST["role"] == "") ? "felhasznalo" : $_POST["role"];
                    
                        User::create($username,$password1,$password2,$email,$role);
                    }
                ?>
                <h1>Create New User</h1>
                <form method="post">
                    <input type="text" id="username" name="username" placeholder="username" required>
                    <input type="password" id="password1" name="password1" placeholder="password" required>
                    <input type="password" id="password2" name="password2" placeholder="confirm password" required>
                    <input type="email" id="email" name="email" placeholder="email address" required>
                    <select name="role" id="role" required>
                        <option value="" disabled selected>-- choose role--</option>
                        <option value="felhasznalo">user</option>
                        <option value="admin">admin</option>
                    </select>
                    <input type="submit" value="Submit" name="newuser_submit">
                </form>
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