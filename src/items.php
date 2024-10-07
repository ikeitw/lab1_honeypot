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
            <h1 class="cover-heading">View our items</h1>
            <form method="GET">
                <label for="search">Search:</label>
                <input type="text" id="search" name="search"/>
                <input type="submit" value="Search">
            </form>
            <?php
            $search = $_GET['search'];
            $itemsQuery = !isset($search) ? "SELECT *
                                     FROM items" :
                "SELECT *
                                     FROM items
                                     WHERE name LIKE '%" . $search . "%'";

            $db = new SQLite3('lab_securing.db');
            $items = $db->query($itemsQuery);
            echo 'Your filter is: ' . $search;

            ?>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Album Image</th>
                    <th>Album Name</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $items->fetchArray(SQLITE3_ASSOC)) {
                    echo '<tr>';
                    echo '<td><img src="assets/images/' . $row['image'] . '" alt="' . $row['name'] . '" width="100"></td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>$' . number_format($row['price'], 2) . '</td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
            <?php
            $db->close();
            ?>
        </div>
</body>
</html>