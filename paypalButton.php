<div id="paypal-button-container"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
    paypal.Button.render({
    <?php if(PRO_PayPal) { ?>
    env: 'production', 
    <?php } else {?> 
    env: 'sandbox',
    <?php } ?>

    // PayPal Client IDs - replace with your own
    // Create a PayPal app: https://developer.paypal.com/developer/applications/create
    client: {
        sandbox:    '<?php echo PayPal_CLIENT_ID; ?>',
        production: '<?php echo PayPal_CLIENT_ID; ?>'
    },

    // Show the buyer a 'Pay Now' button in the checkout flow
    commit: true,

    // payment() is called when the button is clicked
    payment: function(data, actions) {
        
        // Make a call to the REST api to create the payment
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        amount: { total: '<?php echo $_SESSION['somme'] ?>', currency: 'EUR' }
                    }
                ]
            }
        });
    },

    // onAuthorize() is called when the buyer approves the payment
    onAuthorize: function(data, actions) {

        // Make a call to the REST api to execute the payment
        return actions.payment.execute().then(function() {
            console.log('Payment Complete!');
            tel = $('#dest_tel').val();
            nom = $('#nomd').val();
            prenom = $('#prenomd').val();
            dest_name = nom+' '+prenom;
            window.location = "process.php?paymentID="+data.paymentID+"&payerID="+data.payerID+"&token="+data.paymentToken+"&pid=<?php echo $product->pid  ?>&tel="+tel+"&dest_name="+dest_name;

        });
    }
}, '#paypal-button-container');

</script>