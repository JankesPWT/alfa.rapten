<!-- INFO -->
<script type="text/javascript">
    $(document).ready(function(){ 
        
        // more complex jRating call 
        $(".basic").jRating({
            isDisabled : true,            showRateInfo: false,
            step: true,
            type: 'big',
            bigStarsPath: '/images/jRating/stars.png',
            rateMax : 10, 
            length : 10, // nmb of stars
            phpPath : 'rapten/includes/other/jrating_transact.php',
            onSuccess : function(){
                jSuccess('Głos zapisany :)',{
                    HorizontalPosition:'center',
                    VerticalPosition:'center',
                    onCompleted : function(){ 
                        window.location.reload(); 
                    }
                });
            },
            onError : function(){
                jError('Błąd : spróbuj ponownie');
            }
        });
    }); 
</script>

<div id="show">
    <div class="show-foto">
        <a class="group2" href="http://pwtsoftware/beta.rapten/rapten/images/album/3646.jpg">
            <img src="http://pwtsoftware/beta.rapten/rapten/images/album/thumbs/3646.jpg" alt="H8M4">
        </a>
        <div class="show-propshejt">
            <a class="raplista_vote" href="http://pwtsoftware/beta.rapten/album/show/id/3646/option/raplista_vote/">
                <img src="/images/icons/vote.png" alt="głosuj" width="100" title="Kliknij aby zagłosować">
            </a>
        </div>
    </div>
    <div class="show-dane">
        <div class="show-ksywa">
            <h1>H8M4</h1>
            <h2><a href="/artist/show/id/716/">Białas</a></h2>
        </div>
        <table class="show-table">
            <tbody>
                <tr>
                    <td class="show-table-label">Data wydania:</td>
                    <td class="show-table-data">2016-08-26</td>
                </tr>
                <tr>
                    <td class="show-table-label">Wytwórnia:</td>
                    <td class="show-table-data">
                        <a href="/label/show/id/275/">SB Maffija</a>
                    </td>
                </tr>
                <tr>
                    <td class="show-table-label">Rodzaj:</td>
                    <td class="show-table-data">album</td>
                </tr>
                <tr>
                    <td class="show-table-label show-table-rate-label">
                        <span class="show-table-rate">0</span>
                    </td>
                    <td class="show-table-data show-table-rate-data">
                        <div class="basic" data-id="3646" data-average="0" user-id="" style="height: 20px; width: 230px; overflow: hidden; z-index: 1; position: relative;">
                            <div class="jRatingColor" style="width: 0px;"></div>
                            <div class="jRatingAverage" style="width: 0px; top: -20px;"></div>
                            <div class="jStar" style="width: 230px; height: 20px; top: -40px; background: url(&quot;/images/jRating/stars.png&quot;) repeat-x;"></div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="show-table-label">0 głosów</td>
                    <td class="show-table-data">Zaloguj się, aby zagłosować!</td>
                </tr>
                <tr>
                    <td class="show-table-label">Dodaj do kolekcji:</td>
                    <td class="show-table-data">
                        <a class="show-coll-cd" title="Mam w wersji CD" href="/album/show/id/3646/option/coladd_alb/type/ma_cd/"></a>
                        <a class="show-coll-mp3" title="Mam w wersji MP3" href="/album/show/id/3646/option/coladd_alb/type/ma_mp3/"></a>
                        <a class="show-coll-chce" title="Chcę to" href="/album/show/id/3646/option/coladd_alb/type/chce/"></a>
                    </td>
                </tr>
                <tr>
                    <td class="show-table-label">Już w kolekcji:</td>
                    <td class="show-table-data">
                        <strong> 0</strong> osób ma CD
                        <br>
                        <strong>0</strong> osób ma MP3
                        <br>
                        <strong>0</strong> osób chce
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="show-edit-link">
        <!-- Tu był skrypt od addthis, ale został wyjebany -->

        <a class="edytuj" href="/review/add/id/3646/">dodaj recenzję</a>
            <span class="edytuj">|</span>
        <a class="edytuj" href="/album/edit/id/3646/">edytuj</a>
    </div>
</div>
    
<!-- TRACKLISTA -->
<div id="tracklist">
    <div class="type normal">Tracklista:</div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42336/'">
        <div class="tracklist-track-nr">1</div>
        <div class="tracklist-track-subs">
            <div class="tracklist-track-title ">
                <a href="/song/show/id/42336/">Witam Cię 2K16</a>
            </div>Feat. <a href="/artist/show/id/875/">Zelo</a>
            <br>Prod. <a href="/artist/show/id/5792/">Got Barss</a>
        </div>
        <div class="tracklist-track-icons">
            <a href="/song/show/id/42336/">
                <img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a>
        </div>
    </div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42337/'"><div class="tracklist-track-nr">2</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42337/">Patrzcie Idzie Frajer</a></div>Feat. <a href="/artist/show/id/5789/">Bedoes</a><br>Prod. <a href="/artist/show/id/5792/">Got Barss</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42337/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42338/'"><div class="tracklist-track-nr">3</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42338/">Mamo, Sięgam Gwiazd</a></div>Prod. <a href="/artist/show/id/282/">Bob Air</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42338/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42339/'"><div class="tracklist-track-nr">4</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42339/">Jedna Wiara, Jeden Skład</a></div>Prod. <a href="/artist/show/id/5792/">Got Barss</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42339/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42340/'"><div class="tracklist-track-nr">5</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42340/">Mali Ludzie, Wielkie Nieba</a></div>Feat. <a href="/artist/show/id/5790/">Zui</a><br>Prod. <a href="/artist/show/id/5792/">Got Barss</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42340/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42341/'"><div class="tracklist-track-nr">6</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42341/">Jeden Żyć</a></div>Prod. <a href="/artist/show/id/5793/">Lanek</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42341/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42342/'"><div class="tracklist-track-nr">7</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42342/">Chamer</a></div>Prod. <a href="/artist/show/id/5793/">Lanek</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42342/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42343/'"><div class="tracklist-track-nr">8</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42343/">Mam Dość (Love Yourz - Remix)</a></div>Feat. <a href="/artist/show/id/92/">Bonson</a><br>Prod. <a href="/artist/show/id/5793/">Lanek</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42343/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42344/'"><div class="tracklist-track-nr">9</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42344/">Blakablakablaka</a></div>Prod. <a href="/artist/show/id/5792/">Got Barss</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42344/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42345/'"><div class="tracklist-track-nr">10</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42345/">Nie Śpię Bo Trzymam Gardę</a></div>Prod. <a href="/artist/show/id/5792/">Got Barss</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42345/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42346/'"><div class="tracklist-track-nr">11</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42346/">I Poszedł</a></div>Prod. <a href="/artist/show/id/5792/">Got Barss</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42346/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
    <div class="tracklist-track" onclick="location.href='/song/show/id/42347/'"><div class="tracklist-track-nr">12</div><div class="tracklist-track-subs"><div class="tracklist-track-title "><a href="/song/show/id/42347/">Tracimy Kontrolę</a></div>Feat. <a href="/artist/show/id/715/">Solar</a><span class="track_przecinek">, </span><a href="/artist/show/id/5791/">Beteo</a><br>Prod. <a href="/artist/show/id/5792/">Got Barss</a></div><div class="tracklist-track-icons"><a href="/song/show/id/42347/"><img src="/images/icons/video.png" alt="video" name="Mamy odsłuch!"></a></div></div>
</div>

<div id="info">
    <div class="noinfo">Nie dodano biografii. 
        <a class="dodaj" href="/artist/edit/id/3646/">Dodaj.</a>
    </div>
</div>

<div id="show-album-lists">
    <div class="type">
        <div class="show-album-lists-box">Oficjalna Lista Sprzedaży</div>
        <div class="show-album-lists-box">RapLista</div>
    </div>
    <div class="show-album-lists-box"></div>
    <div class="show-album-lists-box">
        <div><a href="/raplista/show/id/52/">October'16</a><span class="show-album-lists-miejsce"> 0,25%</span></div>
        <div><a href="/raplista/show/id/53/">November'16</a><span class="show-album-lists-miejsce"> 0,29%</span></div>
        <div><a href="/raplista/show/id/54/">December'16</a><span class="show-album-lists-miejsce"> 0,33%</span></div>
        <div><a href="/raplista/show/id/55/">January'17</a><span class="show-album-lists-miejsce"> 0,51%</span></div>
        <div><a href="/raplista/show/id/56/">February'17</a><span class="show-album-lists-miejsce"> 0,70%</span></div>
        <div><a href="/raplista/show/id/57/">March'17</a><span class="show-album-lists-miejsce"> 0,59%</span></div>
        <div><a href="/raplista/show/id/58/">April'17</a><span class="show-album-lists-miejsce"> 0,42%</span></div>
        <div><a href="/raplista/show/id/59/">May'17</a><span class="show-album-lists-miejsce"> 0,63%</span></div>
        <div><a href="/raplista/show/id/61/">July'17</a><span class="show-album-lists-miejsce"> 0,41%</span></div>
    </div>
</div>
