<!doctype html>
<html lang="pl-PL">
    <head>

        <title>
            {% if title is empty %}
                Rapten.pl
            {% else %}
                {{ title }}
            {% endif %}
        </title>
            
        <!-- meta tagi !-->
        <meta charset="UTF-8" />
        <meta name="description" content="Strona Jankes" />
        <meta name="keywords" content="programowanie, HTML 5" />
        <meta name="author" content="Jankes" />
        <meta name="copyright" content="Jankes" />
        <meta name="language" content="Polish" />
            
        <meta name="robots" content="noindex, nofollow" /> <!-- "follow, index" -->
        
        <!-- RWD !-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- link tagi !-->
        <link rel="stylesheet" href="/css/style.css">
        <link rel="icon" href="/favicon.ico">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> -->

        <!-- skrypty !-->
        <script src="/js/skrypt.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        
        <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script> -->
    </head>
    <body>