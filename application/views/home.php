<script type="text/javascript">
	document.title="WBL - Wall";
</script>
<div id="wall-background"></div>
<div class="container">
<!-- COMMUNITy WALL -->
    <div class="row">
        <h3>Community Wall</h3>
    </div>

<!-- COMMUNITY WALL -->
    <div class="ui-full-width" ng-controller="ContentController" ng-include="'../application/views/contentItems.php'">
    </div>       
<!-- END COMMUNITY WALL -->

<!-- HUB -->
    <h3>THE HUB</h3>
    <div class="row block">
        <div class="eight columns">
            <h4>Featured Content</h4>
                <iframe id="vimeoFrame" src="//player.vimeo.com/hubnut/album/3892866?color=44bbff&amp;background=000000&amp;slideshow=1&amp;video_title=1&amp;video_byline=1" width="100%" height="400" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                <iframe width="100%" height="200" style="margin-top: 1.6em;" scrolling="no" background-color: "darkgrey" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/143741131&amp;color=ff5500&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false"></iframe>
        </div>
        <div class="four columns">
            <h4>Stay Connected</h4>
            <a class="twitter-mention-button" href="https://twitter.com/intent/tweet?screen_name=WordsBeatsLife">Tweet to @WordsBeatsLife</a>
            <div>
                <a class="twitter-timeline" href="https://twitter.com/WordsBeatsLife" data-widget-id="718852033067896832">Tweets by @WordsBeatsLife</a>
                <script type="text/javascript" async src="https://platform.twitter.com/widgets.js"></script>
                <script>
                    window.twttr = (function (d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0],
                          t = window.twttr || {};
                        if (d.getElementById(id)) return t;
                        js = d.createElement(s);
                        js.id = id;
                        js.src = "https://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);

                        t._e = [];
                        t.ready = function (f) {
                            t._e.push(f);
                        };

                        return t;
                    }(document, "script", "twitter-wjs"));
                </script>
            </div>
        </div>  
    </div>
<!-- END HUB -->
<!-- DONATIONS -->
    <div ng-show="x != 3">
        <h3>HELP US GROW</h3>
        <div class="row block">
            <div class="eight columns">
                <iframe src="https://player.vimeo.com/video/121376268" width="100%" height="500px" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
            </div>
            <div class="four columns">
                <h5>Support the Next Generation of Artists, But More Importantly...</h5> <h3>Support the Youth and Their Dreams! <u>Donate Below</u>!</h3>
                <div>
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
                        <input type="hidden" name="cmd" value="_donations">
                        <input type="hidden" name="business" value="top484.wordsbeatslifeproject@gmail.com">
                        <input type="hidden" name="lc" value="US">
                        <input type="hidden" name="item_name" value="Words Beats and Life, Inc">
                        <input type="hidden" name="item_number" value="WBL">
                        <input type="hidden" name="no_note" value="0">
                        <input type="hidden" name="currency_code" value="USD">
                        <input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>                
                </div>
            </div>
        </div>
    </div>
<!-- END DONATIONS -->
</div>
