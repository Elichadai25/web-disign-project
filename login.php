
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
        }

        header,
        nav,
        footer {
            background-color: #004466;
            color: white;
            text-align: center;
            padding: 10px;
        }

        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
        }

        main {
            display: flex;
            flex-wrap: wrap;
            padding: 100px;
        }

        section {
            flex: 2;
        }

        aside {
            flex: 1;
            padding: 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input,
        button {
            width: 70%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .logo,
        .banner-img,
        .side-img,
        .profile-img {
            max-width: 100%;
            height: auto;
        }

        @media (max-width: 768px) {
            main {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1>Login Into Your Account</h1>
    </header>

    <nav>
        <a href="index.html">Home</a>
        <a href="signup.html">Sign Up</a>
        <a href="login.php">Login</a>
    </nav>

    <main class="signin-container">
        <section>
            <form action="" method="POST">

                <label>Username:</label>
                <input type="text" name="username" required>

                <label>Password:</label>
                <input type="password" name="password" required>

                <button type="submit" name="login">Login</button>
            </form>
        </section>
        <aside>
            <img src="images/login.jpg" alt="Form Illustration" class="side-img" width="340" height="300">
        </aside>
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