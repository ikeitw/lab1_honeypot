<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Labs Web Pentesting</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link href="assets/screen.css" rel="stylesheet" type="text/css"/>
</head>
<body id="top">
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <div class="masthead clearfix">
                <div class="inner">
                </div>
            </div>
            <br>
        </div>
        <div class="inner cover">
            <p class="mb-5"><a href="/">Go home</a></p>
            <h1 class="cover-heading">Search for users</h1>
            <form method="GET">
                <label for="search">Search:</label>
                <input type="text" id="search" name="search"/>
                <input type="submit" value="Search">
            </form>
            <?php
            $search = $_GET['search'];

            if (isset($search) && $search != "") {
                $usersQuery = "SELECT username
                               FROM users
                               WHERE username LIKE '%" . $search . "%'";

                $db = new SQLite3('lab_securing.db');
                $usernames = $db->query($usersQuery);

                if ($usernames) {
                    echo "<p>Found user with name:</p>";
                    while ($username = $usernames->fetchArray(SQLITE3_ASSOC)) {
                        echo "<p>" . $username['username'] . "</p>";
                    }
                } else {
                    echo "No users were found with that name";
                }
            } else {
                echo "You didn't search for a user";
            }
            ?>

        </div>
</body>
</html>
