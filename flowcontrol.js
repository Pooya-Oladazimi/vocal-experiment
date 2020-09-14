let $percent = 0;

$(document).ready(function () {
    let inputCount = parseInt($('#Input-count').attr('value'));

    $('#start').click(function () {
        $('#userInfo').hide();
        $('#explain-text').show();
        $('#part1').show();
        $('.pBar').show();

    });

    $('.next-bt').click(function () {
        $id = $(this).attr('id').split('next')[1];
        $('#part' + $id).hide();
        $id = parseInt($id) + 1
        $('#part' + $id).show();
        $('.check-sign').css('visibility','hidden');
        $percent += 100 / inputCount;
        $('.pBar div').css('width', String($percent) + "%");
        $('.pBar div').text(parseInt($percent) + "%");
        if((parseInt($id) - 1) === inputCount){
            $('#explain-text').hide();
            $('#last-part').show();
            $('#finish-btn').show();

        }

    });

    $('#finish-btn').click(function () {
        $('#last-part').hide();
        $('.check-sign').hide();
        $('.pBar').hide();
        $('#done').show();
        $('#submit-btn').click();

    });


});


