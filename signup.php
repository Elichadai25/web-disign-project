<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "user_system";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<?php
include 'db.php';

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    echo "Passwords do not match.";
    exit;
}

// Hash password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if username or email already exists
$sql_check = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = $conn->query($sql_check);

if ($result->num_rows > 0) {
    echo "Username or email already exists.";
} else {
    $sql = "INSERT INTO users (fullname, email, username, password) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $fullname, $email, $username, $hashed_password);
    if ($stmt->execute()) {
        header("Location: profile.php?username=$username");
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
<?php
include 'db.php';
$username = $_POST['username'];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header><h1><?php echo htmlspecialchars($user['fullname']); ?>'s Profile</h1></header>
  <main>
    <article>
      <img src="images/profile-banner.png" alt="Profile Banner" class="profile-img">
      <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
      <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
    </article>
    <section>
      <a href="update.php?username=<?php echo $username; ?>">Update Profile</a> |
      <a href="delete.php?username=<?php echo $username; ?>" onclick="return confirm('Are you sure?');">Delete Profile</a>
    </section>
  </main>
<!-- Code injected by live-server -->
<script>
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script>
</body>
</html>
<?php
include 'db.php';
$username = $_POST['username'];

$sql = "SELECT * FROM users WHERE username=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <header><h1><?php echo htmlspecialchars($user['fullname']); ?>'s Profile</h1></header>
  <main>
    <article>
      <img src="images/profile-banner.png" alt="Profile Banner" class="profile-img">
      <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
      <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
    </article>
    <section>
      <a href="update.php?username=<?php echo $username; ?>">Update Profile</a> |
      <a href="delete.php?username=<?php echo $username; ?>" onclick="return confirm('Are you sure?');">Delete Profile</a>
    </section>
  </main>
<!-- Code injected