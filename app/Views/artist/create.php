{% extends 'template/base.php' %}

{% block title %}Wykonawcy | Rapten.pl{% endblock %}

{% block main %}
<div class="index">
    {{ form.create_form('Name, Email, Comments|textarea') }}
</div>
{% endblock %}


