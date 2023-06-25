<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../html/head.html'?>
</head>
<body>
    <?php 
        include '../html/header.html';
        include '../html/navigation.html';
    ?>
    <article>
        <div class="container mt-1">
            <div class="row">
                <div class="col mb-1 mt-1 kategorija">
                    <?php
                        echo strtoupper($_GET['kategorija']);
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row text-left">
                <?php
                    include 'connect.php';
                    $kategorija = $_GET['kategorija'];
                    $arhiva = 0;
                    $query = "SELECT * FROM vijesti WHERE kategorija = ? AND arhiva = ? ORDER BY id DESC;";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $query)) {
                        mysqli_stmt_bind_param($stmt, "si", $kategorija, $arhiva);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                                <div class='col-xxl-3 col-xl-3 col-lg-3 col-md-6 col-sm-12 clanak2'>
                                    <a href='./clanak.php?id=${row['id']}'>
                                        <img src='../images/${row['slika']}' alt='${row['slika']}'>
                                        <h4>${row['naslov']}</h4>
                                    </a>
                                </div>
                            ";
                        }
                    }
                    mysqli_close($dbc);
                ?>
            </div>
        </div>
    </article>
    <?php include 'footer.php'?>
</body>
</html>