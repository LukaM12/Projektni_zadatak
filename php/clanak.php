<!DOCTYPE html>
<html lang="en">
<head>
    <?php include '../html/head.html'?>
</head>
<body>
    <?php 
        include '../html/header.html';
        include '../html/navigation.html';
        include 'connect.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM vijesti WHERE id = ?;";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $query)) {
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $row = mysqli_fetch_assoc($result);
        }
    ?>
    <section class="sec">
        <div class="container">
            <div class="row">
                <div class="col mt-4">
                    <div class="nasl">
                        <h2 class="text-center"><?php echo "${row['naslov']}"?></h2>
                        <p class="text-center"><?php echo "${row['sazetak']}"?></p>
                    </div>
                    <?php echo "<img src='../images/${row['slika']}' alt='${row['slika']}'>"?>
                    <p class="mt-3">
                        <?php echo "${row['tekst']}"?>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <footer class="foot">
        <div class="container text-left pt-4 pb-4">
            <div class="row">
                <div class="col">
                    <?php echo "Luka Matoić lmatoic@tvz.hr " . date('Y')?>
                </div>
            </div>
        </div>
    </footer>
    <?php
        mysqli_close($dbc);
    ?>
</body>
</html>