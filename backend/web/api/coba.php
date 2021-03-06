<button id="pay-button">Pay!</button>
<!-- TODO: Remove ".sandbox" from script src URL for production environment. Also input your client key in "data-client-key" -->
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-FZ8YZv8L8LQ81lqg"></script>
<script type="text/javascript">
  document.getElementById('pay-button').onclick = function(){
// This is minimal request body as example.
// Please refer to docs for all available options:
// https://snap-docs.midtrans.com/#json-parameter-request-body
// TODO: you should change this gross_amount and order_id to your desire.
var requestBody =
{
  transaction_details: {
    gross_amount: 123000,
    // as example we use timestamp as order ID
    order_id: 'T-'+Math.round((new Date()).getTime() / 1000)
  },
  credit_card: {
    secure: true
  }
}

getSnapToken(requestBody, function(response){
  var response = JSON.parse(response);
  snap.pay(response.token);
})
  };
  /**
  * Send AJAX POST request to checkout.php, then call callback with the API response
  * @param {object} requestBody: request body to be sent to SNAP API
  * @param {function} callback: callback function to pass the response
  */
  function getSnapToken(requestBody, callback) {
var xmlHttp = new XMLHttpRequest();
xmlHttp.onreadystatechange = function() {
  if(xmlHttp.readyState == 4 && xmlHttp.status == 200) {
    callback(xmlHttp.responseText);
  }
}
xmlHttp.open("post", "[YOUR_CHECKOUT.PHP_URL]");
xmlHttp.send(JSON.stringify(requestBody));
  }
</script>
