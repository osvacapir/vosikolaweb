/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


window.setTimeout(function () {
    $(".alert_temp").fadeTo(500, 0).slideUp(500, function () {
        $(this).remove();
    });
}, 5000);
$(document).ready(function () {
    $('input:checkbox').prop('checked', this.checked);
    $("#checkMestre").click(function () {

        $('input:checkbox').not(this).prop('checked', this.checked);
    });
//Função para marcar o checkbox ao clicar na linha:
    $("#tabCheck tr").on("click", function () {
        $(this).children().children()[0].click();
    });
    $("#tabCheck1 tr").on("click", function () {
        $(this).children().children()[0].click();
    });
//Impeço a propagação para não dar conflito com o click na tr.
    $("input:checkbox").on("click", function (e) {
        e.stopPropagation();
    });
});

//PROGRESSBAR


$(document).ready(function () {

    $('#ano_ins').on('submit', function (event) {
        event.preventDefault();
        $.ajax({
            url: "anolectivo.php",
            method: "POST",
            data: $(this).serialize(),
            beforeSend: function ()
            {
                $('#btGravar').attr('disabled', 'disabled');
                $('#process').css('display', 'block');
            },
            success: function (data)
            {
                var percentage = 0;
                var timer = setInterval(function () {
                    percentage = percentage + 20;
                    progress_bar_process(percentage, timer);
                }, 1000);
            }
        })


    });
});
function progress_bar_process(percentage, timer)
{
    $('.progress-bar').css('width', percentage + '%');
    if (percentage > 100)
    {
        clearInterval(timer);
        $('#ano_ins')[0].reset();
        $('#process').css('display', 'none');
        $('.progress-bar').css('width', '0%');
        $('#btGravar').attr('disabled', false);
        $('#success_message').html("<div class='alert alert-success'>Data Saved</div>");
        setTimeout(function () {
            $('#success_message').html('');
        }, 5000);
    }
}

