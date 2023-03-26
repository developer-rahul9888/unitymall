<form name="razorpay-form" id="razorpay-form" action="{{ url('callback/'.$order->id) }}" method="POST">
  <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id" />
</form>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{ env('RAZORPAY_KEY') }}", // Enter the Key ID generated from the Dashboard
    "amount": "{{ $razorpayOrder->amount }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "name": "Unitymall",
    "description": "Rozerpay",
    "currency": "{{ $razorpayOrder->currency }}",
    "order_id": "{{ $razorpayOrder->id }}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "confirm_close":true,
    "animation":true,
    "prefill": {
        "name": "{{ auth()->user()->f_name }}",
        "email": "{{ auth()->user()->email }}",
        "contact": "{{ auth()->user()->phone }}"
    },
    handler: function (transaction) {
        document.getElementById('razorpay_payment_id').value = transaction.razorpay_payment_id;
        document.getElementById('razorpay-form').submit();
    },
    "retry": {
        "enabled": true
    },
    "theme": {
        "color": "#3399cc"
    },
    
};
var rzp1 = new Razorpay(options);
rzp1.open();
rzp1.on('payment.failed', function (response){
//     alert(response.error.code);
//     alert(response.error.description);
//     alert(response.error.source);
//     alert(response.error.step);
//     alert(response.error.reason);
//     alert(response.error.metadata.order_id);
//     alert(response.error.metadata.payment_id);
});
// document.getElementById('rzp-button1').onclick = function(e){
//     rzp1.open();
//     e.preventDefault();
// }

// $('#rzp-button1').hide();
// $("#rzp-button1" ).trigger( "click" );

</script>


<!-- <form action="{{ url('callback/'.$order->id) }}" method="POST">
    @csrf
    <script
        src="https://checkout.razorpay.com/v1/checkout.js"
        data-key="{{ env('RAZORPAY_KEY') }}"
        data-amount="{{ $razorpayOrder->amount }}"
        data-currency="{{ $razorpayOrder->currency }}"
        data-order_id="{{ $razorpayOrder->id }}"
    ></script>
    <input type="hidden" name="razorpay_order_id" value="{{ $razorpayOrder->id }}">
    <button type="submit">Pay Now</button>
</form> -->