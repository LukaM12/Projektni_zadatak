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
    <main>
        <div class="container text-center">
            <div class="row">
                <div class="col d-flex justify-content-center m-4">
                    <form enctype="multipart/form-data" action="./skripta.php" method="post">
                        <div class="form-item">
                            <label for="naslov">Naslov vijesti:</label>
                            <div class="form-field">
                                <input type="text" name="naslov" id="naslov" class="form-field-textual">
                                <span id="porukaNaslov"></span>
                            </div>
                        </div><br>
                        <div class="form-item">
                            <label for="datum">Datum objave:</label>
                            <div class="form-field">
                                <input type="date" name="datum" id="datum">
                                <span id="porukaDatum"></span>
                            </div>
                        </div><br>
                        <div class="form-item">
                            <label for="sazetak">Kratki sadržaj vijesti (do 50 znakova):</label>
                            <div class="form-field">
                                <textarea name="sazetak" id="sazetak" cols="30" rows="10"></textarea>
                                <span id="porukaSazetak"></span>
                            </div>
                        </div><br>
                        <div class="form-item">
                            <label for="tekst">Sadržaj vijesti:</label>
                            <div class="form-field">
                                <textarea name="tekst" id="tekst" cols="30" rows="10" class="form-field-textual"></textarea>
                                <span id="porukaTekst"></span>
                            </div>
                        </div><br>
                        <div class="form-item">
                            <label for="slika">Slika:</label>
                            <div class="form-field">
                                <input type="file" name="slika" id="slika" class="slika">
                                <span id="porukaSlika"></span>
                            </div>
                        </div><br>
                        <div class="form-item">
                            <label for="kategorija">Kategorija vijesti:</label>
                            <div class="form-field">
                                <select name="kategorija" id="kategorija" class="form-field-textual">
                                    <option value="" disabled selected>Odabir kategorije</option>
                                    <option value="Novosti">Novosti</option>
                                    <option value="Sport">Sport</option>
                                </select>
                                <span id="porukaKategorija"></span>
                            </div>
                        </div><br>
                        <div class="form-item">
                            <label for="arhiva">Spremiti u arhivu:</label>
                            <div class="form-field">
                                <input type="checkbox" name="arhiva">
                            </div>
                        </div><br>
                        <div class="form-item">
                            <button type="reset" value="Poništi">Poništi</button>
                            <button type="submit" name="submit" id="submit" value="Pošalji">Pošalji</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script type="text/javascript">
        document.getElementById("submit").onclick = function(event) {
            var slanje_forme = true;
            var poljeNaslov = document.getElementById("naslov");
            var naslov = document.getElementById("naslov").value;
            var poljeDatum = document.getElementById("datum");
            var datum = document.getElementById("datum").value;
            var poljeSazetak = document.getElementById("sazetak");
            var sazetak = document.getElementById("sazetak").value;
            var poljeTekst = document.getElementById("tekst");
            var tekst = document.getElementById("tekst").value;
            var poljeSlika = document.getElementById("slika");
            var slika = document.getElementById("slika").value;
            var poljeKategorija = document.getElementById("kategorija");
            var kategorija = document.getElementById("kategorija").value;
            if (naslov.length < 5 || naslov.length > 30) {
                slanje_forme = false;
                poljeNaslov.style.border = "1px dashed red";
                document.getElementById("porukaNaslov").style.color = "red";
                document.getElementById("porukaNaslov").innerHTML = "<br>Naslov mora imati više od 5 i manje od 30 znakova!";
            }
            else {
                poljeNaslov.style.border = "1px solid green";
                document.getElementById("porukaNaslov").innerHTML = "";
            }
            if(datum.length == 0){
                slanje_forme = false;
                poljeDatum.style.border = "1px dashed red";
                document.getElementById("porukaDatum").style.color = "red";
                document.getElementById("porukaDatum").innerHTML = "<br>Datum ne smije biti prazan!";
            }
            else{
                poljeDatum.style.border = "1px solid green";
                document.getElementById("porukaDatum").innerHTML = "";
            }
            if (sazetak.length < 10 || sazetak.length > 100) {
                slanje_forme = false;
                poljeSazetak.style.border = "1px dashed red";
                document.getElementById("porukaSazetak").style.color = "red";
                document.getElementById("porukaSazetak").innerHTML = "<br>Kratki sadržaj vijesti mora imati više od 10 i manje od 100 znakova!";
            }
            else {
                poljeSazetak.style.border = "1px solid green";
                document.getElementById("porukaSazetak").innerHTML = "";
            }
            if (tekst.length == 0) {
                slanje_forme = false;
                poljeTekst.style.border = "1px dashed red";
                document.getElementById("porukaTekst").style.color = "red";
                document.getElementById("porukaTekst").innerHTML = "<br>Tekst vijesti ne smije biti prazan!";
            }
            else {
                poljeTekst.style.border = "1px solid green";
                document.getElementById("porukaTekst").innerHTML = "";
            }
            if (slika) {
                poljeSlika.style.border = "1px solid green";
                document.getElementById("porukaSlika").innerHTML = "";
            }
            else {
                slanje_forme = false;
                poljeSlika.style.border = "1px dashed red";
                document.getElementById("porukaSlika").style.color = "red";
                document.getElementById("porukaSlika").innerHTML = "<br>Slika mora biti odabrana!";
            }
            if (kategorija) {
                poljeKategorija.style.border = "1px solid green";
                document.getElementById("porukaKategorija").innerHTML = "";
            }
            else {
                slanje_forme = false;
                poljeKategorija.style.border = "1px dashed red";
                document.getElementById("porukaKategorija").style.color = "red";
                document.getElementById("porukaKategorija").innerHTML = "<br>Kategorija mora biti odabrana!";
            }
            if (slanje_forme != true) {
                event.preventDefault();
            }
        }
    </script>
    <?php include 'footer.php'?>
</body>
</html>