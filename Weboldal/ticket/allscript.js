/* Stage- Bootstrap one page Event ticket booking theme 
Created by pixpalette.com - online design magazine */

$(window).load(function() {
	// Animate loader off screen
	$(".loader").fadeOut("slow");;
});

//Ticket count and price minus and plus
$('.btn-number').click(function(e){
    e.preventDefault();
    /* ticket count */
    fieldName = $(this).attr('data-field');
    type      = $(this).attr('data-type');
    var input = $("input[name='"+fieldName+"']");
	/* ticket price */
	var ticketPrice = $(this).parents('.ticketBox').attr('data-ticket-price');
	/* ticket type */
	var ticketType = $(this).parents('.ticketBox').find('.ticket-name').html();
	var total;
	
    var currentVal = parseInt(input.val());
    if (!isNaN(currentVal)) {
        if(type == 'minus') {
            if(currentVal > input.attr('min')) {
                input.val(currentVal - 1).change();
				
				console.log(input.val());
				total = ticketPrice * input.val();
				console.log(ticketPrice);
				activeTicket(this, input.val(), ticketPrice, total, ticketType);
            } 
            if(parseInt(input.val()) == input.attr('min')) {
                $(this).attr('disabled', true);
            }

        } else if(type == 'plus') {

            if(currentVal < input.attr('max')) {
                input.val(currentVal + 1).change();
				
				console.log(input.val());
				total = ticketPrice * input.val();
				console.log(ticketPrice);
				activeTicket(this, input.val(), ticketPrice, total, ticketType);
            }
            if(parseInt(input.val()) == input.attr('max')) {
                $(this).attr('disabled', true);
            }

        }
    } else {
        input.val(0);
    }
});
$('.input-number').focusin(function(){
   $(this).data('oldValue', $(this).val());
});
$('.input-number').change(function() {
    minValue =  parseInt($(this).attr('min'));
    maxValue =  parseInt($(this).attr('max'));
    valueCurrent = parseInt($(this).val());
    name = $(this).attr('name');
    if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the minimum value was reached');
        $(this).val($(this).data('oldValue'));
    }
    if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
    } else {
        alert('Sorry, the maximum value was reached');
        $(this).val($(this).data('oldValue'));
    }
});

function activeTicket(target, inputValue, ticketPrice, total, ticketId) {
    if (inputValue > 0) {
        $('#buyTicket .ticketBox').addClass('inActiveTicket');
        $(target).parents('.ticketBox').removeClass('inActiveTicket').addClass('activeTicket');
        $('.cart .btn').removeClass('disabled');
        $('.ticket-type').html(ticketId);
        $('.ticket-count').html(inputValue);
        $('.ticket-amount').html(ticketPrice);
        $('.total-amount').html(total);

        // AJAX hívás az adatbázis frissítéséhez
        $.ajax({
            type: 'POST',
            url: 'update_ticket.php', // A fájl, amelyben az adatbázis frissítése történik
            data: {
                ticketId: ticketId, // Jegy ID-je
                ticketCount: inputValue // Jegyek száma
            },
            success: function(response) {
                console.log('Adatbázis frissítve: ' + response);
            },
            error: function(xhr, status, error) {
                console.error('Hiba az adatbázis frissítésekor: ' + error);
            }
        });
    } else {
        $('#buyTicket .ticketBox').removeClass('inActiveTicket');
        $(target).parents('.ticketBox').removeClass('activeTicket inActiveTicket');
        $('.cart .btn').addClass('disabled');
        $('.ticket-type').html('');
        $('.ticket-count').html(inputValue);
        $('.ticket-amount').html(ticketPrice);
        $('.total-amount').html(total);
    }
}
$(document).ready(function() {
    // Az "Adja meg az elérhetőségi adatokat" gombra kattintás eseménykezelője
    $('.btn').click(function(e) {
        e.preventDefault();

        // Jegy adatainak összegyűjtése
        var ticketId = $(this).parents('.modal-content').find('.ticket-type').attr('data-ticket-id');
        var inputValue = $(this).parents('.modal-content').find('.ticket-count').html();

        // AJAX kérés küldése a jegyek frissítéséhez
        $.ajax({
            type: 'POST',
            url: 'update_ticket.php', // A PHP fájl helye
            data: {
                ticketId: ticketId, // Jegy ID-je
                ticketCount: inputValue // Jegyek száma
            },
            success: function(response) {
                console.log('Adatbázis frissítve: ' + response);
                // Itt lehet további műveleteket végezni, például egy üzenet megjelenítése stb.
            },
            error: function(xhr, status, error) {
                console.error('Hiba az adatbázis frissítésekor: ' + error);
            }
        });
    });
});
