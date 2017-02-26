Home index page
<script>
    Omise.setPublicKey("pkey_test_54v9vcuv6p4bfwmk21l");
</script>
<br>
<input type="text" name="name" id="name" placeholder="Name">
<br>
<input type="number" name="number" id="number" placeholder="Number">
<br>
<input type="number" name="month" id="month" placeholder="Month" maxlength="2">
<input type="number" name="year" id="year" placeholder="Year" maxlength="4">
<br>
<input type="text" name="security_code" id="security_code" placeholder="Security Code" maxlength="3">
<br>
<input type="number" name="amount" id="amount" placeholder="Amount">
<button onclick="$.authCard();">Create Card</button>
<?php
//$customer = OmiseCustomer::retrieve();
//echo '<pre>';
//print_r($customer);
//echo '</pre>';
?>
<div id="result"></div>

<script>
    $(function(){
        $.authCard = function(){
            var name = $('#name').val();
            var number = $('#number').val();
            var month = $('#month').val();
            var year = $('#year').val();
            var sec_code = $('#sec_code').val();
            var amount = $('#amount').val();

            // Serialize the form fields into a valid card object.
            var card = {
                "name": name,
                "number": number,
                "expiration_month": month,
                "expiration_year": year,
                // "security_code": sec_code
            };
            console.log(card)

            // Send a request to create a token then trigger the callback function once
            // a response is received from Omise.
            //
            // Note that the response could be an error and this needs to be handled within
            // the callback.
            Omise.createToken("card", card, function (statusCode, response) {
                if (response.object == "error") {
                    // Display an error message.
                    console.log(response.message);
                } else {
                    console.log(response.id);
                    $.post( '<?php echo site_url(); ?>home/createCard', { token_id:response.id, amount:amount }, function(rs){
                        $('#result').html(rs);
                    })
                };
            });
        }
    })
</script>