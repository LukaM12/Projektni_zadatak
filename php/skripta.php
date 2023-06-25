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
        if (!empty($_FILES["slika"]["name"])) {
            $target_file = "../images/" . basename($_FILES["slika"]["name"]);
            $unosSlike = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
                $unosSlike = 0;
            } 
            if($unosSlike == 0){
                $poruka="Vaš unos nije unesen!<br>Podržani formati slike su: .jpg, .jpeg, .png i .gif<br>";
            }
            else {
                move_uploaded_file($_FILES["slika"]["tmp_name"], $target_file);
            }
        }
        if (isset($_POST['submit']) && $unosSlike==1){
            $datum=date("d.m.Y.", strtotime($_POST['datum']));
            $naslov = $_POST['naslov'];
            $sazetak = $_POST['sazetak'];
            $tekst = $_POST['tekst'];
            $slika = $_FILES["slika"]["name"];
            $kategorija = $_POST['kategorija'];
            if (isset($_POST['arhiva'])){
                $arhiva = 1;
            }
            else {
                $arhiva = 0;
            }
            $query = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?, ?);";
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, 'ssssssi', $datum, $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva);
                mysqli_stmt_execute($stmt);
            }
        }
        mysqli_close($dbc);
    ?>
    <section>
        <?php
            if($unosSlike == 0){
                echo '<div class="container text-center">
                    <div class="row">
                        <div class="col mb-1 mt-1 pt-3">
                            <p>' . $poruka . '</p>
                        </div>
                    </div>
                </div>';
            }
            else {
                echo '<div class="container">
                    <div class="row">
                        <div class="col fs-5 mb-1 mt-1">
                            <div class="nasl">
                                <h2 class="text-center">' . $naslov . '</h1>
                                <p class="text-center">' . $sazetak . '</p>
                            </div>
                            <img src="../images/' . $slika . '" alt="' . $slika . '">
                            <p class="mt-3">' . $tekst . '</p>
                        </div>
                    </div>
                </div>';
            }?>
    </section>
    <?php
        if($unosSlike == 0){
            include 'footer.php';
        } else{
            echo "<footer class='foot'>
                <div class='container text-left pt-4 pb-4'>
                    <div class='row'>
                        <div class='col'>
                            Luka Matoić lmatoic@tvz.hr " . date('Y') . "
                        </div>
                    </div>
                </div>
                </footer>";
        }
    ?>
</body>
</html>