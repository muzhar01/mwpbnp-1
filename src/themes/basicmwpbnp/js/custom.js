$(document).ready(function() {
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        $(this).addClass('dropped');
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        $(this).removeClass('dropped');
    });
    $('ul.nav li.dropdown-submenu').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
        $(this).addClass('dropped');
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
        $(this).removeClass('dropped');
    });

    
    if( $(".video-languages").length > 0)
    {       
        $(".video-languages").click(function(){

            if( !$(this).hasClass('active'))
            {                
                $(".video-languages").removeClass('active');
                $(this).addClass('active');
                var video_id = $(this).data('video');               
                $(".youtube-video").attr('src', 'https://www.youtube-nocookie.com/embed/' + video_id);                
            }
        });
    }
  
    $("#select-file").click(function(){        
            $("#ContactForm_attachment").trigger('click');         
    });

});
var effects = document.querySelectorAll('.effects')[0];
if (effects === undefined){

}else{ 
    effects.addEventListener('click', function(e) {
        if (e.target.className.indexOf('hvr') > -1) {
            e.preventDefault();
            e.target.blur();
        }
    });
}
! function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
        p = /^https:/.test(d.location) ? 'https' : 'https';
    if (!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = p + '://platform.twitter.com/widgets.js';
        fjs.parentNode.insertBefore(js, fjs);
    }
}(document, 'script', 'twitter-wjs');
(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-11991680-4', 'ianlunn.github.io');
ga('send', 'pageview');
$(document).ready(function() {
    $('.shopdetail-box').hover(function() {
        $(this).toggleClass(shop - caption);
    });
});