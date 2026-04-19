<?php include('../db/connect.php'); session_start(); ?>
<form method="POST">
    <input type="text" name="username" placeholder="Admin Username" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="submit" name="login" value="Login">
</form>
<?php
if (isset($_POST['login'])) {
    $u = $_POST['username'];
    $p = sha1($_POST['password']);
    $q = $conn->query("SELECT * FROM admin WHERE username='$u' AND password='$p'");
    if ($q->num_rows == 1) {
        $_SESSION['admin'] = $u;
        header("Location: dashboard.php");
    } else {
        echo "<p>Wrong credentials.</p>";
    }
}
?>
