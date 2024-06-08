<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="adminlogin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#dashboard-link").click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'fetch_teachers.php',
                    type: 'GET',
                    success: function(data) {
                        // Display the data
                        $('#dashboard').html(data);
                        // Toggle the visibility of the dashboard
                        $('#dashboard').slideToggle();
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#settings-link").click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'index.php',
                    type: 'GET',
                    success: function(data) {
                        // Display the data
                        $('#settings').html(data);
                        // Toggle the visibility of the dashboard
                        $('#settings').slideToggle();
                    }
                });
            });
        });

        $(document).ready(function() {
            $("#profile-link").click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'profile.php',
                    type: 'GET',
                    success: function(data) {
                        // Display the data
                        $('#profile').html(data);
                        // Toggle the visibility of the dashboard
                        $('#profile').slideToggle();
                    }
                });
            });
        });
    </script>

</head>

<body>
    <div class="dashboard">
        <div style="color: #F9F9F9;" class="sidebar">
            <h2>Menu</h2>
            <p><a id="dashboard-link" href="fetch_teachers.php">Dashboard</a></p>

            <p><a id="settings-link" href="index.php" >Settings</a></p>
            <p><a id="profile-link" href="profile.php">Profile</a></p>
            <p><a href="logout.php" onclick="return confirm('Are you sure you want to log out?');">Logout</a></p>
        </div>
        <div class="main">
            <h2 class="accessible-blue">Welcome to Admin Dashboard</h2>
            <p class="accessible-red">Here you can manage your website.</p>
        </div>
    </div>

    <section>
        <div id="dashboard"></div>
    </section>

    <section>
        <div id="settings"></div>
    </section>
    
    <section>
        <div id="profile"></div>
    </section>



</body>

</html>