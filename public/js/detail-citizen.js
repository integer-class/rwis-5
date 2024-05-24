$(document).ready(function() {
    $('.nav-link').click(function(e) {
        e.preventDefault();

        $('.nav-link').removeClass('active');

        $(this).addClass('active');

        var target = $(this).data('target');

        $('.card:not(#lihat-juga)').hide();

        $(target).show();

        if (target === '#data-personal') {
            $('#data-personal, #alamat, #kontak, #keluarga').show();
        } else if (target === '#keluarga') {
            $('#keluarga-1, #keluarga-2').show();
        } else if (target === '#kesehatan') {
            $('#kesehatan').show();
        } else if (target === '#pekerjaan') {
            $('#pekerjaan').show();
        }

        // Move #keluarga before #data-personal when #keluarga is shown
        if (target === '#keluarga') {
            $('#keluarga-1').insertBefore('#data-personal');
            $('#keluarga-2').insertBefore('#alamat');
        }
        // Move #data-personal before #keluarga when #data-personal is shown
        else if (target === '#data-personal' && ($('#keluarga-1').is(':visible') || $('#keluarga-2').is(':visible'))) {
            $(target).insertBefore('#keluarga-1');
        }
        // Move #kesehatan before #data-personal when #kesehatan is shown
        else if (target === '#kesehatan' && $('#kesehatan').is(':visible')) {
            $(target).insertBefore('#data-personal');
        }
        // Move #pekerjaan before #data-personal when #pekerjaan is shown
        else if (target === '#pekerjaan' && $('#pekerjaan').is(':visible')) {
            $(target).insertBefore('#data-personal');
        }
    });
});