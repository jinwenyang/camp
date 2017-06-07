$(function() {
    
    $('.jcarousel').jcarousel({
        // Core configuration goes here
    });

    $('.jcarousel-prev').jcarouselControl({
        target: '-=1'
    });

    $('.jcarousel-next').jcarouselControl({
        target: '+=1'
    });
    $('.jcarousel').jcarouselAutoscroll({
        interval: 3500,
        target: '+=1',
        autostart: true
    });



    $('.lightbox').each(function() {
                var el = $(this), href = el.attr('href');

                if (href.length > 97) {
                    href = href.substr(0, 97) + '...';
                }

                el.text(href);
            })




});