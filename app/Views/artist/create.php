{% extends 'template/base.php' %}

{% block title %}Wykonawcy | Rapten.pl{% endblock %}

{% block main %}
<div class="index">
    {# {{ dump(fields.ksywaFields) }} #}
    
    {{ form.form_open }}
    
    {{ form.text(fields.ksywaFields) }}

    {{ form.text(fields.imieFields) }}
    {{ form.text(fields.nazwiskoFields) }}
    
    {{ form.submit_button("Dodaj wykonawcę") }}
    {{ form.close }}

</div>
{% endblock %}