{% extends 'template/base.php' %}

{% block title %}Wykonawcy | Rapten.pl{% endblock %}

{% block main %}
<div class="index">
    <?php //include_once("../app/views/components/alpha.php"); ?>
    
    {% for artist in artists %}
    {{ STORAGE_PATH }}
        <div class="index-pos">
            <a href="/artist/{{artist.artist_id}}" name="{{artist.ksywa}}">
            {% if artist.image == 1 %}
                <img src="{{images}}/artist/thumbs/{{artist.artist_id}}.jpg" alt="{{artist.ksywa}}">
            {% else %}
                <img src="/images/icons/artist.png" alt="{{artist.ksywa}}" name="{{artist.ksywa}}">
            {% endif %}
                {{artist.ksywa}}
            </a>
        </div>
    {% endfor %}

    <div class="index-legend">Mamy 5756 artystów w bazie. 
        <a class="dodaj" href="/artist/create">Dodaj nowego...</a>
    </div>
</div>
{% endblock %}
