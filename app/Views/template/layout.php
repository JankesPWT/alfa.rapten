<!doctype html>
<html lang="pl-PL">
<head>

    <title>Alfa.rapten</title>
        
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

    <!-- skrypty !-->
    <script src="/js/skrypt.js"></script>
</head>
<body>
    <!-- HEADER -->       
    <header>
        <a href="/">
            <img src="/images/logo/logo.png" alt="logo strony" />
        </a>
    </header>

    <!-- NAWIGACJA -->
    <nav>
        <label class="navigation-toggle" for="input-toggle">
            <span></span>
            <span></span>
            <span></span>
        </label>
        <input type="checkbox" id="input-toggle">     

        <ul>
            <li><a href="/news">Newsy</a></li>
            <li><a href="/artist/index">Wykonawcy</a></li>
            <li><a href="/album/index">Albumy</a></li>
            <li><a href="/squad/index">Składy</a>/li>
            <li><a href="/label/index">Wytwórnie</a></li>
            <li><a href="/raplista">RapLista</a></li>
            <li><a href="/olis">OLIS</a></li>
            <li><a href="/video">Video</a></li>
            <li><a href="/calendar">Kalendarz</a></li>
            <li><a href="/rank">Rankingi</a></li>
        </ul>
    </nav>
    
    <!-- MAIN -->
    <div id="container">
        
        <main>
            {{content}}
        </main>

        <!-- BOCZNE MENU !-->
        <aside>
            <div class="aside-login">
                <form action="/login" method="post">
                    <ul id="login">
                        <li>
                            <input type="text" name="username" placeholder="username" style="width: 90%;">
                        </li>
                        <li>
                            <input type="password" name="password" placeholder="password" style="width: 90%;">
                        </li>
                        <li>
                            <input class="submit submit-margin" type="submit" value="Zaloguj">
                        </li>
                        <li>
                            <a href="/register">Rejestracja</a>
                        </li>
                        <li>
                            Forgotten your <a href="/recover/username">username</a> or <a href="/recover/password">password</a>?
                        </li>
                    </ul>
                </form>
            </div>
            <div class="reklama-boczna">
                <h2>Reklama</h2>
            </div>
        </aside>
    </div>

    <!-- FOOTER !-->
    <footer>
        &copy; Rapten.pl 2012-2022
    </footer>

    <div class="bitcoin">
        <a href="http://bitcoin.org">bitcoin:</a> 
        <strong><a href="bitcoin:17EdcqTj5ZLS8LBZb8DYMRZuGwT9bqPkYd">17EdcqTj5ZLS8LBZb8DYMRZuGwT9bqPkYd</a></strong>
    </div>
    
</body>
</html>




