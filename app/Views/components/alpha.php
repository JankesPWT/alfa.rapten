<div class="alfabet">
    <?php 

    # przefiltrować to tutaj, jak już ogarniesz dobrze filtrowanie
    $type = $_GET['type'];

    if ($type == "video") { echo "Tytuł piosenki"; } ?>

        <a href="/<?=$type?>/index/let/[0-9]">#</a>
        <a href="/<?=$type?>/index/let/a">A</a>
        <a href="/<?=$type?>/index/let/b">B</a>
        <a href="/<?=$type?>/index/let/c">C</a>
        <a href="/<?=$type?>/index/let/d">D</a>
        <a href="/<?=$type?>/index/let/e">E</a>
        <a href="/<?=$type?>/index/let/f">F</a>
        <a href="/<?=$type?>/index/let/g">G</a>
        <a href="/<?=$type?>/index/let/h">H</a>
        <a href="/<?=$type?>/index/let/i">I</a>
        <a href="/<?=$type?>/index/let/j">J</a>
        <a href="/<?=$type?>/index/let/k">K</a>
        <a href="/<?=$type?>/index/let/l">L</a>
        <a href="/<?=$type?>/index/let/m">M</a>
        <a href="/<?=$type?>/index/let/n">N</a>
        <a href="/<?=$type?>/index/let/o">O</a>
        <a href="/<?=$type?>/index/let/p">P</a>
        <a href="/<?=$type?>/index/let/q">Q</a>
        <a href="/<?=$type?>/index/let/r">R</a>
        <a href="/<?=$type?>/index/let/s">S</a>
        <a href="/<?=$type?>/index/let/t">T</a>
        <a href="/<?=$type?>/index/let/u">U</a>
        <a href="/<?=$type?>/index/let/v">V</a>
        <a href="/<?=$type?>/index/let/w">W</a>
        <a href="/<?=$type?>/index/let/x">X</a>
        <a href="/<?=$type?>/index/let/y">Y</a>
        <a href="/<?=$type?>/index/let/z">Z</a>

<?php
if ($_GET['action'] === "index") {
    if ($type == "artist" || $type == "squad" || $type == "label" || $type == "album") {
        echo '<a href="/' . $type . '/add">[DODAJ]</a>';
    }
} 

if ($type != "video") {
    echo '</div>';
} else { ?>                

    <br>
    Wykonawca:
        <a href="/<?=$type?>/index/letart=[0-9]">0-9</a>
        <a href="/<?=$type?>/index/letart=a">A</a>
        <a href="/<?=$type?>/index/letart=b">B</a>
        <a href="/<?=$type?>/index/letart=c">C</a>
        <a href="/<?=$type?>/index/letart=d">D</a>
        <a href="/<?=$type?>/index/letart=e">E</a>
        <a href="/<?=$type?>/index/letart=f">F</a>
        <a href="/<?=$type?>/index/letart=g">G</a>
        <a href="/<?=$type?>/index/letart=h">H</a>
        <a href="/<?=$type?>/index/letart=i">I</a>
        <a href="/<?=$type?>/index/letart=j">J</a>
        <a href="/<?=$type?>/index/letart=k">K</a>
        <a href="/<?=$type?>/index/letart=l">L</a>
        <a href="/<?=$type?>/index/letart=m">M</a>
        <a href="/<?=$type?>/index/letart=n">N</a>
        <a href="/<?=$type?>/index/letart=o">O</a>
        <a href="/<?=$type?>/index/letart=p">P</a>
        <a href="/<?=$type?>/index/letart=q">Q</a>
        <a href="/<?=$type?>/index/letart=r">R</a>
        <a href="/<?=$type?>/index/letart=s">S</a>
        <a href="/<?=$type?>/index/letart=t">T</a>
        <a href="/<?=$type?>/index/letart=u">U</a>
        <a href="/<?=$type?>/index/letart=v">V</a>
        <a href="/<?=$type?>/index/letart=w">W</a>
        <a href="/<?=$type?>/index/letart=x">X</a>
        <a href="/<?=$type?>/index/letart=y">Y</a>
        <a href="/<?=$type?>/index/letart=z">Z</a>
    </div>
<?php } ?>