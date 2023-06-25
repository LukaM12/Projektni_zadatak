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
        <div class="container text-center">
            <div class="row">
                <div class="col d-flex justify-content-center m-4">
                    <form method="post">
                        <label for="ime">Ime:</label><br>
                        <input type="text" name="ime" id="ime"><br>
                        <span id="porukaIme"></span><br>
                        <label for="prezime">Prezime:</label><br>
                        <input type="text" name="prezime" id="prezime"><br>
                        <span id="porukaPrezime"></span><br>
                        <label for="korisnicko_ime">Korisničko ime:</label><br>
                        <input type="text" name="korisnicko_ime" id="korisnicko_ime"><br>
                        <span id="porukaKorisnicko_ime"></span><br>
                        <label for="lozinka">Lozinka:</label><br>
                        <input type="password" name="lozinka" id="lozinka"><br>
                        <span id="porukaLozinka"></span><br>
                        <label for="lozinka2">Ponovljena lozinka:</label><br>
                        <input type="password" name="lozinka2" id="lozinka2"><br>
                        <span id="porukaLozinka2"></span><br>
                        <button type="reset" name="reset" value="Poništi">Poništi</button>
                        <button type="submit" name="submit" id="submit" value="Potvrdi">Potvrdi</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
            include 'connect.php';
            if (isset($_POST['submit'])){
                $ime = $_POST['ime'];
                $prezime = $_POST['prezime'];
                $korisnicko_ime = $_POST['korisnicko_ime'];
                $lozinka = $_POST['lozinka'];
                $lozinka2 = $_POST['lozinka2'];
                $razina = 0;
                $query="SELECT korisnicko_ime FROM korisnik WHERE korisnicko_ime=?";
                $stmt = mysqli_stmt_init($dbc);
                if (mysqli_stmt_prepare($stmt, $query)) {
                    mysqli_stmt_bind_param($stmt, 's', $korisnicko_ime);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                }
                if(mysqli_stmt_num_rows($stmt) > 0){
                    echo '<div class="container text-center bg-white">
                            <div class="row">
                                <div class="col">
                                    <p>Korisničko ime već postoji u bazi! Molimo unesite drugo.</p>
                                </div>
                            </div>
                        </div>';
                } else if ($lozinka == $lozinka2) {
                    $hash = password_hash($lozinka, CRYPT_BLOWFISH);
                    $query="INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) values (?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($dbc);
                    if (mysqli_stmt_prepare($stmt, $query)) {
                        mysqli_stmt_bind_param($stmt, 'ssssi', $ime, $prezime, $korisnicko_ime, $hash, $razina);
                        mysqli_stmt_execute($stmt);
                    }
                }
            }
            mysqli_close($dbc);
        ?>
    </article>
    <script type="text/javascript">
        document.getElementById("submit").onclick = function(event) {
            var slanje_forme = true;
            var poljeIme = document.getElementById("ime");
            var ime = document.getElementById("ime").value;
            var poljePrezime = document.getElementById("prezime");
            var prezime = document.getElementById("prezime").value;
            var poljeKorisnicko_ime = document.getElementById("korisnicko_ime");
            var korisnicko_ime = document.getElementById("korisnicko_ime").value;
            var poljeLozinka = document.getElementById("lozinka");
            var lozinka = document.getElementById("lozinka").value;
            var poljeLozinka2 = document.getElementById("lozinka2");
            var lozinka2 = document.getElementById("lozinka2").value;
            if(ime.length == 0){
                slanje_forme = false;
                poljeIme.style.border = "1px dashed red";
                document.getElementById("porukaIme").style.color = "red";
                document.getElementById("porukaIme").innerHTML = "Ime ne smije biti prazno!<br>";
            } else{
                poljeIme.style.border = "1px solid green";
                document.getElementById("porukaIme").innerHTML = "";
            }
            if(prezime.length == 0){
                slanje_forme = false;
                poljePrezime.style.border = "1px dashed red";
                document.getElementById("porukaPrezime").style.color = "red";
                document.getElementById("porukaPrezime").innerHTML = "Prezime ne smije biti prazno!<br>";
            } else{
                poljePrezime.style.border = "1px solid green";
                document.getElementById("porukaPrezime").innerHTML = "";
            }
            if(korisnicko_ime.length == 0){
                slanje_forme = false;
                poljeKorisnicko_ime.style.border = "1px dashed red";
                document.getElementById("porukaKorisnicko_ime").style.color = "red";
                document.getElementById("porukaKorisnicko_ime").innerHTML = "Korisničko ime ne smije biti prazno!<br>";
            } else{
                poljeKorisnicko_ime.style.border = "1px solid green";
                document.getElementById("porukaKorisnicko_ime").innerHTML = "";
            }
            if(lozinka.length == 0){
                slanje_forme = false;
                poljeLozinka.style.border = "1px dashed red";
                document.getElementById("porukaLozinka").style.color = "red";
                document.getElementById("porukaLozinka").innerHTML = "Lozinka ne smije biti prazna!<br>";
            } else{
                poljeLozinka.style.border = "1px solid green";
                document.getElementById("porukaLozinka").innerHTML = "";
            }
            if(lozinka2.length == 0){
                slanje_forme = false;
                poljeLozinka2.style.border = "1px dashed red";
                document.getElementById("porukaLozinka2").style.color = "red";
                document.getElementById("porukaLozinka2").innerHTML = "Ponovljena lozinka ne smije biti prazna!<br>";
            }
            else if (lozinka2 != lozinka){
                slanje_forme = false;
                poljeLozinka2.style.border = "1px dashed red";
                document.getElementById("porukaLozinka2").style.color = "red";
                document.getElementById("porukaLozinka2").innerHTML = "Lozinka i ponovljena lozinka moraju biti iste!<br>";
            }
            else {
                poljeLozinka2.style.border = "1px solid green";
                document.getElementById("porukaLozinka2").innerHTML = "";
            }
            if (slanje_forme != true) {
                event.preventDefault();
            }
        }
    </script>
    <?php include 'footer.php'?>
</body>
</html>