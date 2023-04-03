<!-- HEAD -->
{% include 'template/head.php' with {'title': block('title')} %}

<!-- NAWIGACJA -->
{% include('template/nav.php') %}
    
    <!-- MAIN -->
    <div id="container">
        
        <main>
            {% block main %}

            {% endblock main %}
        </main>

        <!-- BOCZNE MENU !-->
        {% include('template/aside.php') %}
    </div>

<!-- FOOTER !-->
{% include 'template/footer.php' %}
    {# with 
    {
        stopki: block('foot'), 
        link: 'to jest link',
        nazwaZmiennej: 'Wartość zmiennej',
        dane: dane 
    }  #}
