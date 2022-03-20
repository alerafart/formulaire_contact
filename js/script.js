$(function() {
    $('#contact-form').submit(function(e){
        e.preventDefault();
        $('.comments').empty();
        var postdata = $('#contact-form').serialize();
        $.ajax({
            type: 'POST',
            url:'php/contact.php',
            data:postdata,
            dataType:'json',
            succes: function(result){

                if(result.isSuccess)
                {
                    $('#contact-form').append("<p class ='thank-you'>Votre message a bien été envoyé. Merci de m'avoir contactée :)</p>");
                    $('#contact-form')[0].reset();
                }
                else
                {
                    $('#firstName + .comments').html(result.firstNameError);
                    $('#name + .comments').html(result.nameError);
                    $('#email + .comments').html(resultemailError);
                    $('#phone + .comments').html(result.phoneError);
                    $('#message + .comments').html(result.messageError);
                }

            }
        });


    });


})