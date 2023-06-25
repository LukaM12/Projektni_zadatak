-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: Jun 25, 2023 at 11:18 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekt`
--
CREATE DATABASE IF NOT EXISTS `projekt` DEFAULT CHARACTER SET latin2 COLLATE latin2_croatian_ci;
USE `projekt`;

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisnicko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Ana', 'Horvat', 'ahorvat', '$2y$10$GJqtP1zCHQiuYk6AJw9PS.bCCEhUFsrii44pyArGIPiixEsNxCu/a', 0),
(2, 'Petar', 'Knežević', 'pknezevic', '$2y$10$asW4ohOOuKFmdgbNtSOCo.k1KGCjv4B26kCLobGgmh4oe65tgclCS', 1),
(3, 'Marko', 'Čupić', 'mcupic', '$2y$10$J2ArSkPRCQAnrnLuGZLPEewl.FmgxdqWp7pSFJq3QeJUiPFf9fZp.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `naslov` varchar(64) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(1, '24.06.2023.', 'Stiže promjena vremena', 'Nakon dužeg sunčanog razdoblje stiže promjena vremena', 'U Slavoniji i Baranji veći će dio dana biti sunčano, vruće i sparno. Temperatura će porasti barem do 35, a moguće i do 37 stupnjeva. Pljuskovi i grmljavina na istok stižu krajem dana te je moguće nevrijeme s tučom. Na sjevernom Jadranu i u gorskoj Hrvatskoj bit će većinom biti sunčano, vruće i sparno. U drugom dijelu dana u gorju te u unutrašnjosti Istre, uz lokalno jači razvoj oblaka, može biti pljuskova i grmljavine, a na obali i otocima uglavnom tek navečer i u noći na subotu. Tad će zapuhati jaka bura, podno Velebita s olujnim udarima. Najviša dnevna temperatura većinom će iznositi između 30 i 35 stupnjeva. U Dalmaciji će cijeli dan biti sunčano, a poslijepodne i vruće i sparno. Puhat će slabo do umjereno jugo i jugozapadnjak, a u noći na subotu na dijelu srednjeg Jadrana jaka bura. Temperatura i se može popeti i do 35 stupnjeva, osobito u zaleđu.', 'nevrijeme.jpg', 'Novosti', 1),
(2, '24.06.2023.', 'Titan je implodirao', 'Katastrofa na dnu mora koja je pogodila svijet', 'Što je katastrofalna implozija? Suprotno od eksplozije, implozija je kada se objekt iznenada i nasilno uruši sam u sebe. Na tim dubinama postoji ogroman tlak koji djeluje na podmornicu i čak i najmanji strukturni defekt može biti katastrofalan, rekli su stručnjaci. Tlak je tamo bio oko 350 puta veći od onog na površini Zemlje. Svako malo curenje moglo bi uzrokovati trenutnu imploziju, koja bi uništila plovilo, rekao je Tom Maddox, izvršni direktor tvrtke Podvodni forenzičari, koja je sudjelovala u ekspediciji do Titanika 2005.', 'titan.jpg', 'Novosti', 1),
(3, '24.06.2023.', 'Propao ustanak naroda', 'Prosjed kojeg su mnogi iščekivali je propao', 'Okupljenima, kojih se do 12.30 sati okupilo dvjestotinjak, obratio se Zlatko Klarić,  jedan od organizatora prosvjeda, koji je izrazio žaljenje da se nije okupilo više ljudi jer bi tada Vlada morala otići. Optužio je Vladu za sustavno pljačkanje i varanje umirovljenika, a Hrvatsku stranku umirovljenika (HSU) da su se prodali za jogurt i frtalj kruha. Nešto prije 13 sati prosvjed je završio, a Dean Golubić, jedan od inicijatora prosvjeda, pozvao je građane da se na istom mjestu nađu u nedjelju 1. svibnja, odakle će on u, kako je kazao, nedostatku sindikata, povesti prvosvibanjsku povorku prema Maksimiru.', 'prosvjed.jpg', 'Novosti', 1),
(4, '24.06.2023.', 'Novo poskupljenje plina', 'Hrvatski građani se nadaju da će se stanje s poskupljenje stabilizirati', 'Kraj zime Vlada već godinama koristi za najavu promjene cijena raznih energenata, počevši od 1. travnja. Ponovno je najavljeno poskupljenje plina, no ministar Filipović tvrdi da građani neće plaćati novu, punu cijenu plina. Poskupljenje plina za sad je najavljeno kao moguće, a ministar tvrdi da neće sve ići preko leđa građana. ? Prema sadašnjoj metodologiji HERA-e, plin bi trebao od 1. travnja porasti s 41 na 106 eura. HERA je neovisno regulatorno tijelo i prema tome mi ne možemo utjecati na rad HERA-e. Međutim, s pozicije Vlade mogu vam reći da ćemo zaštititi naše građane i da ćemo naći načina da ne dođe do poskupljenja plina. Naši građani neće plaćati takvu cijenu, kazao je ministar Filipović.', 'racuni.jpg', 'Novosti', 1),
(5, '24.06.2023.', 'Novi Centar za istraživanje', 'Nakon skupljene potrebne dokumentacije napokon se može krenuti na posao', 'Projekt je pokrenut kao brownfield, a tim se nazivom označuju napuštena, zapuštena, neiskorištena ili onečišćena zemljišta (brownfield lokacije), napušteni, zapušteni ili neiskorišteni industrijski i trgovački objekti ili infrastruktura, odnosno zemljišta, objekti, infrastruktura koji zahtijevaju intervenciju kako bi se ponovno vratili u uporabu, prenosi online časopis Građevinar. Projekt je pokrenut još 2017. godine dok je realizacija započela krajem lipnja 2020. nakon što je potpisan ugovor s Ministarstvom znanosti i obrazovanja. Profesor Stjepan Lukšić na Završnoj konferenciji projekta u rujnu 2022. godine istakao je kako je projekt imao nekoliko kritičnih faza. Ipak, vjeruje u skoru izvedbu jer su ishodovali građevinsku dozvolu u 2021. godini.', 'kampus.jpg', 'Novosti', 1),
(6, '24.06.2023.', 'Bellingham uzeo Zidaneov dres', 'Real Madrid je ovim pojačanjem osigura budućnost u veznom redu', 'Real Madrid pomlađuje momčad a novopridošlom Bellinghamu, proglašenom najboljim igračem Budeslige protekle sezone, dao je bijeli dres s brojem 5. Taj broj je nekoć nosio ondje Zinedine Zidane. Bellingham, koji je već razgovarao s trenerom Carlom Ancelottijem, na sredini terena će konkurirati iskusnim veznim igračima Modriću, Kroosu i Daniju Ceballosu te mladima Federicu Valverdeu, Eduardu Camavingi i Aurelienu Tchouameniju.', 'bellingham.jpg', 'Sport', 1),
(7, '24.06.2023.', 'Đoković do nove pobjede', 'Đoković ponovno u sjajnoj formi', 'Nakon Rogera Federera i Novak Đoković osigurao je plasman u polufinale teniskog Mastersa u Londonu. Srbinu je to pošlo za rukom već nakon prvog seta u jučerašnjem dvoboju s Tomašem Berdychom u kojem je bio bolji sa 6:2. No, dobio je i drugi, istina puno teže, sa 7:6 (8). A treći se set činio kao gotova stvar, jer je Čeh u tie-breaku poveo s 5:1. Tako je Đoković s tri pobjede uvjerljivo osvojio prvo mjesto u skupini A i u polufinalu će se sučeliti s drugim iz skupine B. Đokoviću je to ujedno bila 73. ovogodišnja pobjeda, po čemu se izjednačio s Davidom Ferrerom.', 'djokovic.jpg', 'Sport', 1),
(8, '24.06.2023.', 'Luka Dončić vodio Dallas', 'Imali su Lakersi i na kraju četvrte četvrtine i na kraju prvog produžetka šut za pobjedu', 'U derbiju večeri u američkoj profesionalnoj košarkaškoj NBA ligi vodeći sastav Istočne konferencije i čitave lige Boston Celtics kao gost je svladao svog prvog pratitelja na Istoku Brooklyn Netse sa 109-98. Bio je to prvi susret Netsa, koji su u posljednjih mjesec i pol dana bili u sjajnoj formi, bez Kevina Duranta koji će morati pauzirati oko mjesec dana zbog ozljede koljena.', 'doncic.jpg', 'Sport', 1),
(9, '24.06.2023.', 'Messi efekt već se vidi', 'Potvrda transfera Lea Messija u Miami dovela je do nevjerojatne pojave na društvenim mrežama kluba', 'Upravo je Instagram tema ovog teksta, odnosno službena stranica Inter Miamija na toj društvenoj mreži. Još prekjučer, nju je pratilo 1.1 milijun korisnika, a onda je transfer Messija doveo do prave eksplozije. Niti puna dva dana kasnije, Instagram profil Inter Miamija prati 4.5 milijuna ljudi, a Messi još uvijek nije ni službeno otkriven kao novi igrač kluba Davida Beckhama. Dok neki od vas budu čitali ovaj tekst, ta će brojka biti još veća. Već se zna kako se za Messija sprema spektakularno predstavljanje, kojem bi trebalo prisustovati nekoliko desetaka tisuća ljudi, no još uvijek nije poznato kad i gdje točno će se održati. Pretpostavljamo na stadionu, prije neke od idućih Interovih utakmica.', 'messi.jpg', 'Sport', 1),
(10, '24.06.2023.', 'Optimistično u novu sezonu', 'Počinje nova turistička sezona', 'Turistička predsezona na Jadranu započinje sa Uskrsom, koji obično pada sredinom travnja. Ove se godine taj vikend očekuje preko pola milijuna noćenja, što je, po najavama, uvod u još jednu izvrsnu turističku godinu. Hrvatska je prema podacima središnje banke u 2022. godini od stranih gostiju u turizmu ostvarila rekordnih 13,1 milijardu eura, što je u odnosu na do nedavno vodeću 2019. godinu dvije i po milijarde eura više. Ako se tome doda i očekivani prihod od domaćeg turizma, u Ministarstvu turizma vjeruju da će ukupni prihod od turizma u prošloj godini doseći 15 milijardi eura. Od Dubrovnika na jugu do Istre na sjeveru, hrvatski turistički radnici s optimizmom očekuju sezonu.', 'turisti.jpg', 'Novosti', 0),
(11, '24.06.2023.', 'Posvajanje mačaka', 'Posvajanje životinja je u velikom porastu', 'Individualno su prilagođeni dobi, karakteru, navikama i zdravstvenom stanju mačke koja traži dom. Zajedničko svima je da se mačke udomljavaju u kućne uvjete, a to znači da se ne udomljavaju kao vanjske mačke, dvorištarke, garažarke i slično, već kao kućni ljubimci i članovi obitelji. Također je svima zajedničko da se udomitelji obvezuju nekastrirane mačke kastrirati kada dosegnu spolnu zrelost, prije ikakvog parenja. Držati ih u sigurnim uvjetima, adekvatno ih hraniti i voditi veterinaru po potrebi. Neke mačke udomljavaju se isključivo u stan/kuću bez mogućnosti izlaska van, neke se udomljavaju u kuće s dvorištem i kontroliranim izlascima no u tom slučaju ne udomljavaju se u kuće koje su u blizini većih prometnica.', 'macka.jpg', 'Novosti', 0),
(12, '24.06.2023.', 'Dupini u Jadranskom moru', 'Dupini su sve češće viđeni u Jadranskom moru', 'Dobri dupin je stalni stanovnik našeg mora. To je najpoznatiji i najrasprostranjeniji morski sisavac na svijetu. Možeš ga prepoznati po tamno sivim leđima, svjetlo sivim bokovima i bijelom trbuhu. Kada je more jako toplo, njegov trbuščić može postati ružičast. Dugački su od 2 do 4 metra i mogu imati od 100 do 500 kilograma.\r\nPod vodom mogu biti do nekih 7 minuta, a onda jure na površinu po zrak. Nosni otvor im je na gornjoj strani glave, a ima i mali poklopčić, koji se prilikom zarona zatvara. Hrane se ribom i lignjama, stoga se ribari znaju naljutiti na njih. Jako su znatiželjni, pa se znaju zaplesti u mreže i uginuti.', 'dupin.jpg', 'Novosti', 0),
(13, '24.06.2023.', 'Fokus na domaći uzgoj', 'Uvozimo dobar dio cvijeća, a i sami imamo podneblje za rast', 'Uoči Svih svetih, kada građani tradicionalno ukrašavaju grobove svojih najmilijih cvjetnim aranžmanima, primjetan je rast cijena cvijeća - 20 do 30 posto u odnosu na prošlu godinu, a stručnjaci objašnjavaju da su porasli svi ulazni troškovi, poput goriva, sjemena ili transporta. I uzgoj krizanteme, tradicionalnog cvijeta u spomen mrtvih, postao je višestruko skuplji. Vlasnica OPG-a i cvjećarsko-aranžerskog obrta Marija Volarić kaže da je, primjerice, velika multiflora lani na Zelenoj tržnici stajala 20 kuna, a ove godine je 25 kuna. No, cvijeće poput anthuriuma skuplje je i do 40 posto. Prvu klasu rezane krizanteme lani je prodavala po 10 kuna, ove godine po 12, ali je druga klasa i dalje ostala na 9 do 10 kuna. Irena Kovačević ističe da cvjećarima najveći problem stvaraju slabo opremljene zelene tržnice, pa ih dosta koristi web shopove za narudžbu cvijeća iz Nizozemske.', 'cvijece.jpg', 'Novosti', 0),
(14, '24.06.2023.', 'Benzema ima novi klub', 'Novi veliki transfer u Saudijskoj Arabiji', 'Francuski nogometaš Karim Benzema potpisao je trogodišnji ugovor s Al Ittihadom, klubom iz Saudijske Arabije. Danima je bilo poznato da će Benzema u tom klubu nastaviti karijeru, nakon što je ispisao povijesne stranice noseći dres madridskog Reala, od kojeg se oprostio za vikend, pa je i u posljednjoj utakmici za Real postigao pogodak protiv Athletica. Al Ittihad će biti tek treći klub u karijeri 35-godišnjeg francuskog napadača, koji je počeo kao igrač francuskog Lyona, a u Realu je bio od 2009. godine, prenosi Hina, pozivajući se na AFP. Ukupno je za Real postigao 354 pogotka te je drugi strijelac u povijesti madridskog kluba. Benzema je aktualni osvajač Zlatne lopte, a s Realom je osvojio pet puta Ligu prvaka, kao i Svjetsko klupsko prvenstvo. Osvojio je i četiri naslova prvaka Španjolske.', 'benzema.jpg', 'Sport', 0),
(15, '24.06.2023.', 'Jokići ponovno briljiraju', 'Braća Jokić u glavnim ulogama', 'Košarkaši Denver Nuggetsa u finalu Zapadne konferencije slavili su protiv Los Angeles Lakersa 113-111 i tako s ukupnih 4-0 prošli u finale NBA lige. Nikola Jokić ponovno je briljirao i dokazao svoju kvalitetu. U četvrtoj utakmici ubacio je 30 poena, 13 puta je asistirao i uhvatio je 14 skokova. Ostvario je tako osmi triple-double u doigravanju i tako srušio rekord Wilta Chamberlaina iz 1967. Osim Nikole, u centru pažnje našla su se i njegova dva brata. Nemanja i Strahinja Jokić prvo su se pridružili Nikoli u slavlju, a zatim su potrčali do trenera Michaela Malonea. Braća Jokić uzeli su trenera u naručje i počeli ga bacati u zrak. Nikola i Strahinja svaku utakmicu svog brata prate jako euforično, a već su nekoliko puta pokazali kako znaju ukrasti pažnju cijele dvorane. U trećoj utakmici namjerili su se na legendarnog glumca Jacka Nicholsona (86) koji je veliki navijač LA Lakersa.', 'jokic.jpg', 'Sport', 0),
(16, '24.06.2023.', 'Vatreni zaradili veliki novac', 'Vatreni srebrom donijeli ogroman novac', 'Hrvatska nije uspjela svladati Španjolsku u finalu trećeg izdanja Lige nacija, no gorak okus dijelom će isprati sjajna zarada za veliki uspjeh. Budući da su Vatreni članovi elitne skupine Lige nacija, samo za natjecanje u grupnoj fazi Hrvatski nogometni savez zaradio je 1,5 milijuna eura. Sjajnim igrama u skupini s Francuskom, Danskom i Austrijom Vatreni su osvojili prvo mjesto i osigurali plasman na Final Four. To je HNS-u donijelo dodatnih 750 tisuća, ali tek s plasmanom na Final Four dolazi prava zarada. Na putu do finala Hrvatska je svladala Nizozemsku i osigurala finale, u kojem je, nažalost, bolja bila Španjolska. No za osvajanje drugog mjesta Vatreni su osigurali dodatnih devet milijuna eura zarade. Ukupno gledano, HNS je za sjajno izdanje Vatrenih u Ligi nacija zaradio gotovo 11,5 milijuna eura. Točnije - 11 milijuna i 250 tisuća eura. Ako tome pak pridodamo zaradu od Svjetskog prvenstva u Katru, na kojem je Hrvatska osvojila treće mjesto, cifra ide u nebo! Naime, HNS je od Svjetskog prvenstva zaradio čak 27 milijuna dolara, odnosno gotovo 25 milijuna eura.', 'vatreni.jpg', 'Sport', 0),
(17, '24.06.2023.', 'Novi dres Barcelone', 'Novi domaći dres katalonskog giganta', 'Na poznatoj stranici Footy Headlines, koja često otkriva nove dresove puno prije njihove službene premijere, objavljeno je kako će izgledati dres Barcelone za sezonu 2023./2024. Gavi, Pedri, Lewandowski i društvo na Camp Nouu će nositi dizajn domaćeg dresa za koji navijači kažu kako jako podsjeća na rane sedamdesete prošlog stoljeća. Pruge imaju uzorak u obliku romba uz rubove, a logo u sebi ima jedan skriveni romb, koji podsjeća na dijamant i odaje počast njihovoj ženskoj ekipi, a inspirirani su starim logom Barcine ženske ekipe, koji je bio tog oblika. Za razliku od gostujućeg dresa, domaći će imati istaknut klupski logo, ali postoji trik ? pod svjetlom se pojavljuje suptilni dijamant, koji je spomenuti omaž djevojkama. Novi Nikeov domaći Barcin dres dizajnom se vratio najklasičnijem razdoblju klupske majice, koji je prvi put predstavljen 1912. godine i koristio se do 90-ih. Novi dres imat će dvije široke crvene linije na naličju i rukavi će biti crveni.', 'barcelona.jpg', 'Sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
