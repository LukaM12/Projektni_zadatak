<?php
    session_start();
    include 'connect.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <?php include '../html/head.html'?>
</head>
<body>
    <?php 
        include '../html/header.html';
        include '../html/navigation.html';
    ?>
    <section>
        <div class="container text-center">
            <div class="row">
                <div class="col d-flex justify-content-center m-4">
                    <?php
                        echo "<form method='post'>
                                <label for='korisnicko_ime'>Korisničko ime:</label><br>
                                <input type='text' name='korisnicko_ime' id='korisnicko_ime' required><br>
                                <label for='lozinka'>Lozinka:</label><br>
                                <input type='password' name='lozinka' id='lozinka' required><br><br>
                                <button type='submit' name='submit' value='Prijava'>Prijava</button>
                            </form>";
                    ?>
                </div>
            </div>
        </div>
        <?php
            $sesija = TRUE;
            $ispravnaLozinka=TRUE;
            if (isset($_POST['submit'])) {
                $korisnicko_ime = $_POST['korisnicko_ime'];
                $lozinka = $_POST['lozinka'];
            } else {
                if (isset($_SESSION['$username'], $_SESSION['$lozinka'], $_SESSION['$level'])) {
                    $korisnicko_ime = $_SESSION['$username'];
                    $lozinka = $_SESSION['$lozinka'];
                    $level = $_SESSION['$level'];
                    $uspjesnaPrijava = TRUE;
                    if ($level == 0){
                        $admin = FALSE;
                    }
                    else {
                        $admin = TRUE;
                    }
                } else {
                    $sesija = FALSE;
                }
            }
            if ($sesija) {
                $query = "SELECT * FROM korisnik WHERE korisnicko_ime = ?;";
                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, "s", $korisnicko_ime);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    $row = mysqli_fetch_assoc($result);
                    if (isset($row['lozinka'])) {
                        if (password_verify($lozinka, $row['lozinka'])) {
                            if ($row['razina'] === 1) {
                                $uspjesnaPrijava = TRUE;
                                $admin = TRUE;
                                $_SESSION['$username'] = $row['korisnicko_ime'];
                                $_SESSION['$lozinka'] = $lozinka;
                                $_SESSION['$level'] = $row['razina'];
                            } elseif ($row['razina'] === 0) {
                                $uspjesnaPrijava = TRUE;
                                $admin = FALSE;
                                $_SESSION['$username'] = $row['korisnicko_ime'];
                                $_SESSION['$level'] = $row['razina'];
                                $_SESSION['$lozinka'] = $lozinka;
                            }
                        } else {
                            $uspjesnaPrijava = FALSE;
                            $ispravnaLozinka = FALSE;
                        }
                    } else {
                        $uspjesnaPrijava = FALSE;
                        $admin = FALSE;
                        if (isset($_POST['korisnicko_ime'], $_POST['lozinka'])) {
                            $_SESSION['$username'] = $_POST['korisnicko_ime'];
                            $_SESSION['$lozinka'] = $_POST['lozinka'];
                            $_SESSION['$level'] = 2;
                        }
                    }
                }
                if ($uspjesnaPrijava == TRUE && $admin == TRUE) {
                    echo "<div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center'>
                                    <p>Dobrodošli, vaše korisničko ime je  " . $_SESSION['$username'] . " i vi ste administrator.</p>
                                </div>
                            </div>
                        </div>";
                    echo "<div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center'>
                                    <form method='post'>
                                        <label for='id'>Unesite id članka koji želite izbrisati:</label><br>
                                        <input type='number' name='id' id='id' required><br><br>
                                        <button type='submit' name='brisanje' value='Brisanje'>Brisanje</button>
                                    </form><br>
                                    <form enctype='multipart/form-data' method='post'>
                                        <div class='form-item'>
                                            <label for='id'>Unesite id članka koji želite izmijeniti:</label><br>
                                            <input type='number' name='id' id='id' required>
                                        </div><br>
                                        <div class='form-item'>
                                            <label for='naslov'>Naslov vijesti:</label>
                                            <div class='form-field'>
                                                <input type='text' name='naslov' class='form-field-textual' required>
                                            </div>
                                        </div><br>
                                        <div class='form-item'>
                                            <label for='datum'>Datum objave:</label>
                                            <div class='form-field'>
                                                <input type='date' name='datum' id='datum' required>
                                            </div>
                                        </div><br>
                                        <div class='form-item'>
                                            <label for='sazetak'>Kratki sadržaj vijesti (do 50 znakova):</label>
                                            <div class='form-field'>
                                                <textarea name='sazetak' cols='30' rows='10' required></textarea>
                                            </div>
                                        </div><br>
                                        <div class='form-item'>
                                            <label for='tekst'>Sadržaj vijesti:</label>
                                            <div class='form-field'>
                                                <textarea name='tekst' cols='30' rows='10' class='form-field-textual' required></textarea>
                                            </div>
                                        </div><br>
                                        <div class='form-item'>
                                            <label for='slika'>Slika:</label>
                                            <div class='form-field slika'>
                                                <input type='file' name='slika' required>
                                            </div>
                                        </div><br>
                                        <div class='form-item'>
                                            <label for='kategorija'>Kategorija vijesti:</label>
                                            <div class='form-field'>
                                                <select name='kategorija' class='form-field-textual' required>
                                                    <option value='' disabled selected>Odabir kategorije</option>
                                                    <option value='Novosti'>Novosti</option>
                                                    <option value='Sport'>Sport</option>
                                                </select>
                                            </div>
                                        </div><br>
                                        <div class='form-item'>
                                            <label for='arhiva'>Spremiti u arhivu:</label>
                                            <div class='form-field'>
                                                <input type='checkbox' name='arhiva'>
                                            </div>
                                        </div><br>
                                        <div class='form-item'>
                                            <button type='reset' name='ponisti' value='Poništi'>Poništi</button>
                                            <button type='submit' name='izmjena' value='Izmjena'>Izmjena</button>
                                        </div>
                                        <br>
                                    </form>
                                </div>
                            </div>
                        </div>";
                } elseif (($uspjesnaPrijava == TRUE && $admin == FALSE)) {
                    echo "<div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center'>
                                    <p>Dobrodošli, vaše korisničko ime je " . $_SESSION['$username'] . " i niste administrator.</p>
                                </div>
                            </div>
                        </div>";
                } elseif($uspjesnaPrijava == FALSE && $ispravnaLozinka == FALSE){
                    echo "<div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center'>
                                    <p>Pogrešna lozinka! Pokušajte ponovno.</p>
                                </div>
                            </div>
                        </div>";
                } elseif (($uspjesnaPrijava == FALSE)) {
                    echo "<div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex flex-column justify-content-center'>
                                    <p>Uneseni korisnik ne postoji u bazi podataka.<br>Za registraciju odaberite gumb.</p>
                                </div>
                            </div>
                        </div>";
                    echo "<div class='container text-center'>
                            <div class='row'>
                                <div class='col d-flex justify-content-center'>
                                    <form method='post'>
                                        <button type='submit'><a href='./registracija.php'>Registrirajte se</a></button><br><br>
                                    </form>
                                </div>
                            </div>
                        </div>";
                }
            }
            mysqli_close($dbc);
        ?>
    </section>
    <section>
    <?php
        include 'connect.php';
        if (isset($_POST['brisanje'])) {
            $id = $_POST['id'];
            $query = 'DELETE FROM vijesti WHERE id = ?;';
            $stmt = mysqli_stmt_init($dbc);
            if (mysqli_stmt_prepare($stmt, $query)) {
                mysqli_stmt_bind_param($stmt, "i", $id);
                mysqli_stmt_execute($stmt);
            }
        } elseif (isset($_POST['izmjena'])) {
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
            if($unosSlike == 1){
                $id = $_POST['id'];
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
                $query = 'UPDATE vijesti SET datum = ?, naslov = ?, sazetak = ?, tekst = ?, slika = ?, kategorija = ?, arhiva = ? WHERE id = ?';
                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, 'ssssssii', $datum, $naslov, $sazetak, $tekst, $slika, $kategorija, $arhiva, $id);
                    mysqli_stmt_execute($stmt);
                }
            } else {
                echo '<div class="container text-center">
                    <div class="row">
                        <div class="col mb-1">
                            <p>' . $poruka . '</p>
                        </div>
                    </div>
                </div>';
            }
        }
        mysqli_close($dbc);
    ?>
    </section>
    <?php include 'footer.php'?>
</body>
</html>