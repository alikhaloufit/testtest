$(document).ready(function() {
    $(document).scroll(function() {
        var $sidenav = $("#sldiernavmove");
        if ($(document).scrollTop() >= $(window).height() / 2) {
            $sidenav.addClass("black");
        } else {
            $sidenav.removeClass("black");
        }
    });

    $('.accordion-btn').click(function () {
        $(this).closest(".accordion-item").toggleClass("opened");
    })

    $(".to-element-scroll").click(function(ev) {
       ev.preventDefault();
       var $this = $(this),
           $elem = $($this.attr("href"));

        $([document.documentElement, document.body]).animate({
            scrollTop: $elem.offset().top-200
        }, 1000);
    });

    var rellax = new Rellax('.rellax');

    $(".scroll-down span").click(function () {
        $([document.documentElement, document.body]).animate({
            scrollTop: $(window).height()
        }, 1000);
    });
});