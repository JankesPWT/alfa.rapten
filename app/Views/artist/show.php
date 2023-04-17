{% extends 'template/base.php' %}

{% block title %}Wykonawcy | Rapten.pl{% endblock %}

{% block main %}

{{ artist.artist_id }}
{{ artist.ksywa }}
{{ dump(artist) }}

<div id="show">
    <div class="show-foto">
        <img src="/images/icons/artist.png" alt="no cover">
        <div class="show-propshejt">
            <div class="show-props">
                <a class="show-props-link" href="/artist/{{ artist.artist_id }}/props/"></a>
                <div>4</div>
            </div>
            <div class="show-hejt">
                <a class="show-hejt-link" href="/artist/{{ artist.artist_id }}/hejt/"></a>
                <div>0</div>
            </div>
        </div>
    </div>
    <div class="show-dane">
        <div class="show-ksywa">
            <h1>{{ artist.ksywa }}</h1>
        </div>
        <table class="show-table">
            <tbody>
                <tr>
                    <td class="show-table-label">Imię i nazwisko:</td>
                    <td class="show-table-data"><strong>{{ artist.imie }}{{ artist.nazwisko }}</strong></td>
                </tr>
                <tr>
                    <td class="show-table-label">Data urodzenia:</td>
                    <td class="show-table-data">{{ artist.dob }} (35)</td>
                </tr>
                <tr>
                    <td class="show-table-label">Miasto:</td>
                    <td class="show-table-data">Gdańsk</td>
                </tr>
                <tr>
                    <td class="show-table-label">AKA:</td>
                    <td class="show-table-data"></td>
                </tr>
                <tr>
                    <td colspan="2" class="show-table-icons">
                        <a class="show-icons-www" target="_blank" href="http://jankes.com.pl"></a>
                        <a class="show-icons-fb" target="_blank" href="http://facebook.com/jankespwt"></a>
                        <a class="show-icons-yt" target="_blank" href="http://youtube.com/pwtrtv"></a>
                    </td>
                </tr>
                <tr>
                    <td class="show-table-label">Squady:</td>
                    <td class="show-table-data">
                        <a href="/squad/show/id/1/">PWT Banda</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="show-edit-link">
        <a href="/artist/edit/id/1/">edytuj</a>
    </div>
</div>

<div id="info">
    
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam varius pulvinar bibendum. Suspendisse metus metus, lacinia eget mi vel, rutrum lobortis orci. Suspendisse imperdiet id ante at euismod. Sed accumsan quis nisi quis rhoncus. Pellentesque lacinia, justo vitae sodales egestas, libero nisl iaculis purus, nec mollis felis elit sit amet metus. Nam ut augue eget mauris porttitor bibendum. Aliquam malesuada eget leo eu molestie. Curabitur sapien magna, facilisis vel faucibus a, aliquet non quam. Pellentesque in auctor tortor. Aliquam eget dolor semper, pretium tortor nec, tincidunt tellus. Aenean pellentesque ligula a purus molestie, et convallis dui viverra. Morbi lorem nisl, vestibulum ac leo eu, sodales interdum ante. Nulla sit amet tellus tortor. Donec rutrum finibus mi nec dignissim. Fusce vitae sem porttitor, pretium arcu eget, lobortis diam.

Donec sollicitudin viverra felis, id sagittis arcu sagittis sed. Aenean aliquet dui libero, vel ultricies ex consectetur id. Nunc tempus massa non nisl consectetur, vestibulum congue enim congue. Pellentesque porta nibh et ligula dignissim ullamcorper. Ut scelerisque odio ut faucibus varius. Quisque turpis odio, rutrum quis condimentum vitae, vestibulum quis orci. Duis vel justo pulvinar, ultrices erat ac, aliquam ipsum.

</div>    

<!-- ALBUMY -->
<div id="discography">
    
    <div class="type solo">Solówki
        <a class="toggle_solo">+/-</a>
    </div>
    <div class="togglediv_solo">
        <div class="show-discography">
            <div class="show-discography-img">
                <a href="/album/show/id/5/">
                    <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/5_128.jpg" width="75" alt="Stereo-(I)-Typ">
                </a>
            </div>
            <div class="show-discography-text">
                <a href="/album/show/id/5/">Stereo-(I)-Typ</a>
                <span class="show-discography-data">2008-05-16</span>
                <a class="show-discography-data" href="/label/show/id/6/">Prosto-W-Twarz Records</a>
                <br>
                <span class="show-discography-typ">[album]</span>
            </div>
        </div>
        <div class="show-discography">
            <div class="show-discography-img">
                <a href="/album/show/id/11/">
                    <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/11_128.jpg" width="75" alt="BrawaD(L)a Jankesa">
                </a>
            </div>
            <div class="show-discography-text">
                <a href="/album/show/id/11/">BrawaD(L)a Jankesa</a>
                <span class="show-discography-data">2007-05-19</span>
                <a class="show-discography-data" href="/label/show/id/6/">Prosto-W-Twarz Records</a>
                <br>
                <span class="show-discography-typ">[album]</span>
            </div>
        </div>
        <div class="show-discography">
            <div class="show-discography-img">
                <a href="/album/show/id/9/">
                    <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/9_128.jpg" width="75" alt="DEMO-r(E)alizacja">
                </a>
            </div>
            <div class="show-discography-text">
                <a href="/album/show/id/9/">DEMO-r(E)alizacja</a>
                <span class="show-discography-data">2006-05-16</span>
                <a class="show-discography-data" href="/label/show/id/6/">Prosto-W-Twarz Records</a>
                <br>
                <span class="show-discography-typ">[album]</span>
            </div>
        </div>
    </div>
    <div class="type squad">
        Albumy ze składami
        <a class="toggle_solo">+/-</a>
    </div>
    <div class="togglediv_squad">
        <div class="show-discography">
            <div class="show-discography-img">
                <a href="/album/show/id/2/">
                    <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/2_128.jpg" width="75" alt="PodPierdolone Hity">
                </a>
            </div>
            <div class="show-discography-text">
                <a href="/squad//show/id/1/">PWT Banda</a> - 
                <a href="/album/show/id/2/">PodPierdolone Hity</a>
                <span class="show-discography-data">2012-02-16</span>
                <a class="show-discography-data" href="/label/show/id/6/">Prosto-W-Twarz Records</a>
                <br>
                <span class="show-discography-typ">[mixtape]</span>
            </div>
        </div>
    </div>
    <div class="type feat">Featuringi
        <a class="toggle_feat">+/-</a>
    </div>
    <div class="togglediv_feat">
        <div class="show-discography">
            <div class="show-discography-img">
                <a href="/album/show/id/320/">
                    <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/320_128.jpg" width="75" alt="Rymy Spod Kapelusza">
                </a>
            </div>
            <div class="show-discography-text">
                <a href="/squad//show/id/108/">Piździ Basem</a> - 
                <a href="/album/show/id/320/">Rymy Spod Kapelusza</a>
                <br>
                <a class="show-discography-tytul" href="/song/show/id/1679/">4 - Przekaz Pojebanych Myśli</a> (Ft. <a href="/artist/show/id/1/">Jankes</a>)
                <br>
                <a class="show-discography-tytul" href="/song/show/id/1683/">8 - Rozkminkowe Pierdolnięcie</a> (Ft. <a href="/artist/show/id/1/">Jankes</a>)
                <br>
                <a class="show-discography-tytul" href="/song/show/id/1686/">11 - Z Przedmieścia Syndkob</a> (Ft. <a href="/artist/show/id/1/">Jankes</a>)
            </div>
        </div>
    </div>
</div>

<script>/*
    $(".solo").click(function () {
        $(".togglediv_solo").toggle("slow");
    });
    $(".squad").click(function () {
        $(".togglediv_squad").toggle("slow");
    });
    $(".feat").click(function () {
        $(".togglediv_feat").toggle("slow");
    });
    $(".skladanka").click(function () {
        $(".togglediv_skladanka").toggle("slow");
    });
    $(".prod").click(function () {
        $(".togglediv_prod").toggle("slow");
    });
    $(".label").click(function () {
        $(".togglediv_label").toggle("slow");
    });*/
</script>

{% endblock %}