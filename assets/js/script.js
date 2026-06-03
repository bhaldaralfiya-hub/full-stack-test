$(document).ready(function(){

    $('.tab-item').click(function(){

        var id = $(this).data('id');

        $('.tab-item').removeClass('active');
        $(this).addClass('active');

        $('.content-slide').hide();
        $('#content-' + id).fadeIn();

        $('.image-slide').hide();
        $('#image-' + id).fadeIn();

    });

});

$('.mobile-header').click(function(){

    var content = $(this).next('.mobile-content');

    if(content.is(':visible')){

        content.slideUp();

        $(this)
            .find('.mobile-toggle')
            .attr('src','files/images/plus-01.svg');

    } else {

        $('.mobile-content').slideUp();

        $('.mobile-toggle')
            .attr('src','files/images/plus-01.svg');

        content.slideDown();

        $(this)
            .find('.mobile-toggle')
            .attr('src','files/images/minus-01.svg');
    }

});