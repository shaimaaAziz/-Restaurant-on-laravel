var stripe = Stripe('pk_test_TYooMQauvdEDq54NiTphI7jx');
Stripe.setPublishableKey('pk_test_TYooMQauvdEDq54NiTphI7jx');
var $form=$('#checkout-form')
// $form.submit(function (event) {
//     Stripe.card.createToken(
//         number : $('#card-number').val(),
// cvc:
//     )
// })
$form.submit(function (event) {
    $('charge-error').addClass('hidden');
    $form.find('button').prop('disable',true);
stripe.createToken({
    number: $('#card-number').val(),
    cvc: $('#card-cvc').val(),
    expiry_year: $('#card-expiry-year').val(),
    expiry_month: $('#card-expiry-month').val(),
   name: $('#card-name').val(),
    // account_holder_type:$('#card-number').val(),
},stripeResponseHandler);
return false;
});

function stripeResponseHandler(status,response) {
    if(response.error){
        $('charge-error').removeClass('hidden');
        $('charge-error').text(response.error.message);
        $form.find('button').prop('disable',false);
    }else {
        var token=response.id;
        $form.append($('<input type="hidden" name="stripeToken" />').val(token));
        $form.get(0).submit();
    }
}