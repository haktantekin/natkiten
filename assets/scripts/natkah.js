WebFont.load({
    google: {
        families: ['Crimson+Pro:wght@300;400;500;600;700;800;900&display=swap&subset=latin-ext']
    }
});

// Analytics 

// Analytics
$(document).ready(function () {
    (function ($) {
        $.fn.visible = function (partial) {
            var $t = $(this),
                $w = $(window),
                viewTop = $w.scrollTop(),
                viewBottom = viewTop + $w.height(),
                _top = $t.offset().top,
                _bottom = _top + $t.height(),
                compareTop = partial === true ? _bottom : _top,
                compareBottom = partial === true ? _top : _bottom;
            return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
        };
    })(jQuery);

    var win = $(window);
    var allMods = $(".content-item");
    allMods.each(function (i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass("already-visible");
        }
    });
    win.scroll(function (event) {
        allMods.each(function (i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("come-in");
            }
        });

    });

    $(".side-panel").slideReveal({
        trigger: $(".mobile-menu-icon"),
        position: "right",
        overlay: true,
        display: "block"
    });

    $(".side-panel-close").click(function () {
        $(".mobile-menu-icon").click();
    });

    $(".menu-icon").click(function () {
        $(this).toggleClass("open");
        if ($(this).hasClass("open")) {
            $("body").css("overflow", "hidden");
            $(".nav ul").show();
            $(".nav ul").animate({ left: "0" }, 600)
        }
        else {
            $(".nav ul").animate({ left: -$(window).width() }, 600, function () {
                $("body").css("overflow-y", "auto");
                $(".nav ul").hide()
            })
        }
    });

    $('.content-item').each(function () {
        $(this).append('<div class="post-featured"><div class="copy-text"><i class="far fa-copy"></i> Copy</div><div class="facebook-share"><i class="fab fa-facebook-f"></i></div><div class="twitter-share"><i class="fab fa-twitter"></i></div><div class="create-img"><i class="fas fa-highlighter"></i></div><div class="pinterest-share"><i class="fab fa-pinterest"></i></div>  </div>');
        $('.copy-text').click(function (e) {
            var _text = $(this).closest('.content-item').children('.content-text').find('.content-quotes').text();
            e.preventDefault();
            var element = document.createElement("input");
            element.type = 'text';
            element.value = _text;
            element.style.position = "fixed";
            document.body.append(element);
            element.select();
            document.execCommand("copy");
            document.body.removeChild(element);
            $(this).text('Copied!');
        });
    });
    $('.content-item .facebook-share').on('click', function () {
        var _url = $(this).closest('.content-item').children('.content-text').find('> a').attr('href');
        var _text = $(this).closest('.content-item').children('.content-text').find('.content-quotes').text().trim();
        window.open(' https://www.facebook.com/sharer.php?u=' + _url + '&t=' + _text + '', '_blank');
    });
    $('.content-item .twitter-share').on('click', function () {
        var _url = $(this).closest('.content-item').children('.content-text').find('> a').attr('href');
        var _text = $(this).closest('.content-item').children('.content-text').find('.content-quotes').text().trim();
        window.open(' https://twitter.com/intent/tweet?url=' + _url + '&text=' + _text + '', '_blank');
    });
    $('.content-item .create-img').on('click', function () {
        localStorage.clear();
        localStorage.setItem("quote", $(this).closest('.content-item').children('.content-text').find('.content-quotes').text().trim());
        localStorage.setItem("author", $(this).closest('.content-item').children('.content-text').find('.quators').text().trim());
        window.open('/wp-content/themes/natkit/pincreator/', '_blank');
    });
    $('.content-item .pinterest-share').on('click', function () {
        var url = $(this).closest('.content-item').children('.content-text').find('> a').attr('href');
        var media = $(this).closest('.content-item').children('.content-text').find('.content-img img').attr('src');
        var desc = $(this).closest('.content-item').children('.content-text').find('.content-quotes').text().trim();
        window.open("//www.pinterest.com/pin/create/button/"+
        "?url="+url+
        "&media="+media+
        "&description="+desc,"_blank","top=0,right=0,width=990,height=1500");
        return false; 
    })

});