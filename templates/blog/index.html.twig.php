{% extends 'base.html.twig' %}

{% block title %}Blog{% endblock %}

{% block body %}
<h1>Mes articles de blog</h1>

<div>
    <main>

    </main>

    <aside>
        {% include './includes/sidebar.html.twig' %}
    </aside>
</div>
{% endblock %}
