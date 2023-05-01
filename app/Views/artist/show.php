{% extends 'template/base.php' %}

{% block title %}Wykonawcy | Rapten.pl{% endblock %}

{% block main %}


{# {{ dump(artist.squads) }} #}
{# {{ dump(albums) }} #}

<!-- INFO -->
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
            <h1>{{ artist.ksywa|e }}</h1>
        </div>
        <table class="show-table">
            <tbody>
                <tr>
                    <td class="show-table-label">Imię i nazwisko:</td>
                    <td class="show-table-data"><strong>{{ artist.imie|e }} {{ artist.nazwisko|e }}</strong></td>
                </tr>
                <tr>
                    <td class="show-table-label">Data urodzenia:</td>
                    <td class="show-table-data">{{ artist.dob }} ({{ artist.age }})</td>
                </tr>
                <tr>
                    <td class="show-table-label">Miasto:</td>
                    <td class="show-table-data">{{ artist.miasto|e }}</td>
                </tr>
                <tr>
                    <td class="show-table-label">AKA:</td>
                    <td class="show-table-data">{{ artist.aka|e }}</td>
                </tr>
                <tr>
                    <td colspan="2" class="show-table-icons">
                        <a class="show-icons-www" target="_blank" href="http://jankes.com.pl"></a>
                        <a class="show-icons-fb" target="_blank" href="http://facebook.com/jankespwt"></a>
                        <a class="show-icons-yt" target="_blank" href="http://youtube.com/pwtrtv"></a>
                    </td>
                </tr>
                
                <!-- składy -->
                {% if artist.squads is not empty %}

                    {% for squads in artist.squads %}
                        <tr>
                            {% if loop.first %}
                                <td class="show-table-label">Squady:</td>
                            {% else %}
                                <td class="show-table-label"></td>
                            {% endif %}
                            <td class="show-table-data">
                                <a href="/squad/{{ squads.squad_id }}">{{ squads.nazwa|e }}</a>
                            </td>
                        </tr>
                    {% endfor %}
                    
                {% endif %}
                <!-- składy -->

            </tbody>
        </table>
    </div>
    <div class="show-edit-link">
        <a href="/artist/edit/{{ artist.artist_id }}">edytuj</a>
    </div>
</div>

<div id="info">
{% if artist.bio is empty %}
    <div class="noinfo">
        Nie dodano biografii. <a class="dodaj" href="/artist/edit/{{ artist.artist_id }}">Dodaj.</a>
    </div>
{% else %}
    {{ artist.bio|nl2br }}
{% endif %}
</div>    

<!-- DISCOGRAPHY -->
<div id="discography">
    
    <!-- solo -->
    {% if albums is not empty %}
        <div class="type solo">Albumy
            <a class="toggle_solo">+/-</a>
        </div>

        <div class="togglediv_solo">
            {% for album in albums %}
                <div class="show-discography">
                    <div class="show-discography-img">
                        <a href="/album/{{ album.album_id }}">
                            <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/5_128.jpg" width="75" alt="{{ album.tytul }}">
                        </a>
                    </div>
                    <div class="show-discography-text">
                        <a href="/album/{{ album.album_id }}"> {{ album.tytul }} </a>
                        <span class="show-discography-data">{{ album.rel_date }}</span>
                        {# {% if album.label is not empty %} #}
                            <a class="show-discography-data" href="/label/{{ album.label.label_id }}">{{ album.label.nazwa }}</a>
                        {# {% endif %} #}
                        <br>
                        <span class="show-discography-typ">[{{ album.typ }}]</span>
                    </div>
                </div>
            {% endfor %}
        </div>
    {% endif %}
    

    <!-- withSquads -->
    {% if withSquads is not empty %}
        <div class="type squad">Albumy ze składami
            <a class="toggle_solo">+/-</a>
        </div>

        <div class="togglediv_squad">
            {% for album in withSquads %}
                <div class="show-discography">
                    <div class="show-discography-img">
                        <a href="/album/{{ album.album_id }}">
                            <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/2_128.jpg" width="75" alt="{{ album.tytul }}">
                        </a>
                    </div>
                    <div class="show-discography-text">
                        <a href="/squad/{{ album.squad_id }}">{{ album.squad }}</a> - 
                        <a href="/album/{{ album.album_id }}">{{ album.tytul }}</a>
                        <span class="show-discography-data">{{ album.rel_date }}</span>
                        <a class="show-discography-data" href="/label/{{ album.label_id }}">{{ album.label }}</a>
                        <br>
                        <span class="show-discography-typ">{{ album.typ }}</span>
                    </div>
                </div>
            {% endfor %}
        </div>
    {% endif %}

    {% if feats is not empty %}
        <div class="type feat">Featuringi
            <a class="toggle_feat">+/-</a>
        </div>

        <div class="togglediv_feat">
        {% for feat in feats %}

            <div class="show-discography">
                <div class="show-discography-img">
                    <a href="/album/{{ feat.album_id }}">
                        <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/320_128.jpg" width="75" alt="{{ feat.albumtytul }}">
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

            {% endfor %}
        </div>
    {% endif %}
    
</div>

<script>
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
    });
</script>

{% endblock %}