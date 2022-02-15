    jQuery(function($) {
      $('#cc_number').payment('formatCardNumber');
      $('#cvv2_number').payment('formatCardCVC');
      $('#cc_numbers').payment('formatCardNumber');
      $('#cvv2_numbers').payment('formatCardCVC');
      $('#expired').payment('formatCardExpiry');
      $('#expireds').payment('formatCardExpiry');
      $('#savebil').attr('disabled', true);
      $('#savebil').addClass('disabled');
      $('#savemob').attr('disabled', true);
      $('#savemob').addClass('disabled');

      $.fn.toggleInputError1 = function(erred) {
        this.parent('.field').toggleClass('has-error', erred);
        return this;
      };

      $.fn.toggleInputError = function(erred) {
        this.parent('.field1').toggleClass('has-error1', erred);
        return this;
      };

      $(this).keyup(function(e) {
      
        e.preventDefault();

        var cardType = $.payment.cardType($('#cc_number').val());
        var cardType1 = $.payment.cardType($('#cc_numbers').val());
        $('#cc_number').toggleInputError1(!$.payment.validateCardNumber($('#cc_number').val()));
        $('#cvv2_number').toggleInputError1(!$.payment.validateCardCVC($('#cvv2_number').val(), cardType));
       // $('#expired').toggleInputError1(!$.payment.validateCardExpiry($('#expired').payment('cardExpiryVal')));
        
        $('#cc_numbers').toggleInputError(!$.payment.validateCardNumber($('#cc_numbers').val()));
        $('#cvv2_numbers').toggleInputError(!$.payment.validateCardCVC($('#cvv2_numbers').val(), cardType1));
        //$('#expireds').toggleInputError(!$.payment.validateCardExpiry($('#expireds').payment('cardExpiryVal')));

        $('#cc_number').addClass($(cardType).length ? '' : 'required valid');
        if ( cardType === 'amex' ){
          $('#gambarvbv').attr('src', '../assets/img/amex.png');
          $('#cvv2_number').attr('maxlength', '4');
        } else {
          $('#gambarvbv').attr('src', '../assets/img/' + cardType + '.png');
          $('#cvv2_number').attr('maxlength', '3');
        }

        $('#cc_numbers').addClass($(cardType1).length ? '' : 'required valid');
        if ( cardType1 === 'amex' ){
          $('#gambarvbv2').attr('src', '../assets/img/amex.png');
          $('#cvv2_numbers').attr('maxlength', '4');
        } else {
          $('#gambarvbv2').attr('src', '../assets/img/' + cardType1 + '.png');
          $('#cvv2_numbers').attr('maxlength', '3');
        }

        if ( $('.has-error').length == 0 ){
          $('#savebil').attr('disabled', false);
          $('#savebil').removeClass('disabled');
        } else {
          $('#savebil').attr('disabled', true);
          $('#savebil').addClass('disabled');
        }

        if ( $('.has-error1').length == 0 ){
          $('#savemob').attr('disabled', false);
          $('#savemob').removeClass('disabled');
        } else {
          $('#savemob').attr('disabled', true);
          $('#savemob').addClass('disabled');
        }
     
      });

    });