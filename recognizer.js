var SpeechRecognition = SpeechRecognition || webkitSpeechRecognition;
var recognition = new SpeechRecognition();
recognition.interimResults = true;
recognition.lang = "en-US";
recognition.continuous = false;

$(document).ready(function () {
    $(".record").click(function () {
        $(".record").css('background-color', 'red');
        $('.check-sign').css('visibility','hidden');
        This = $(this);
        recognition.start()
        recognition.onresult = function(event) {
            for (var i = event.resultIndex; i < event.results.length; ++i) {
                if (event.results[i].isFinal) {
                    $text = event.results[i][0].transcript;
                    This.siblings("input").val($text);
                    $('.check-sign').css('visibility','visible');
                    $(".record").css('background-color', 'chartreuse');

                }
            }
        };

    });
});



