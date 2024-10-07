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
            <h1 class="cover-heading">Secure this web environment</h1>
            <label for="userId">Select user</label>
            <select id="userId">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </Select>
            <ul class="list-group list-unstyled">
                <li class="list-group-item bg-transparent border-0">
                    <a href="orders.php">Order details</a>
                </li>
                <li class="list-group-item bg-transparent border-0">
                    <a href="items.php">Item search</a>
                </li>
                <li class="list-group-item bg-transparent border-0">
                    <a href="users.php">User search</a>
                </li>
            </ul>
        </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", init);

    function init() {
        document.cookie = "userId = 1";
        document.getElementById("userId").addEventListener("change", changeUser);
    }

    function changeUser() {
        const userId = document.getElementById("userId").value;
        document.cookie = `userId = ${userId}`;
    }
</script>
</html>