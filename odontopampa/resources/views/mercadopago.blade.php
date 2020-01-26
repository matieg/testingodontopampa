@extends('layouts.main')
@section('contenido')


		<form action="/mercadopago/tipopago" method="post" id="pay" name="pay" >
		 @csrf()
    <fieldset>
        <ul>
            <li>
                <label for="email">Email</label>
                <input id="email" name="email" value="test_user_19653727@testuser.com" type="email" placeholder="your email"/>
            </li>
            <li>
                <label for="cardNumber">Credit card number:</label>
                <input type="text" id="cardNumber" data-checkout="cardNumber" value="4509 9535 6623 3704" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
            </li>
            <li>
                <label for="securityCode">Security code:</label>
                <input type="text" id="securityCode" data-checkout="securityCode" value="123" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
            </li>
            <li>
                <label for="cardExpirationMonth">Expiration month:</label>
                <input type="text" id="cardExpirationMonth" data-checkout="cardExpirationMonth" value="12" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
            </li>
            <li>
                <label for="cardExpirationYear">Expiration year:</label>
                <input type="text" id="cardExpirationYear" data-checkout="cardExpirationYear" value="2020" onselectstart="return false" onpaste="return false" onCopy="return false" onCut="return false" onDrag="return false" onDrop="return false" autocomplete=off />
            </li>
            <li>
                <label for="cardholderName">Card holder name:</label>
                <input type="text" id="cardholderName" data-checkout="cardholderName" value="APRO" />
            </li>
            <li>
                <label for="docType">Document type:</label>
                <select id="docType" data-checkout="docType"></select>
            </li>
            <li>
                <label for="docNumber">Document number:</label>
                <input type="text" id="docNumber" data-checkout="docNumber" placeholder="12345678" />
            </li>
        </ul>
        <input type="hidden" name="amount" id="amount"/>
        <input type="hidden" name="description"/>
        <input type="hidden" name="paymentMethodId" />
        <input type="submit" value="Pay!" />
    </fieldset>
</form>
<script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>

	<script type="text/javascript">
		window.Mercadopago.setPublishableKey("TEST-e3cd51ff-b03d-482b-81d8-1572b493a9cf");
		window.Mercadopago.getIdentificationTypes();



        function addEvent(to, type, fn){
            if(document.addEventListener){
                to.addEventListener(type, fn, false);
            } else if(document.attachEvent){
                to.attachEvent('on'+type, fn);
            } else {
                to['on'+type] = fn;
            }
        };

        addEvent(document.querySelector('#cardNumber'), 'keyup', guessingPaymentMethod);
        addEvent(document.querySelector('#cardNumber'), 'change', guessingPaymentMethod);

        function getBin() {
        const cardnumber = document.getElementById("cardNumber");
        return cardnumber.value.substring(0,6);
        };

        function guessingPaymentMethod(event) {
            var bin = getBin();

            if (event.type == "keyup") {
                if (bin.length >= 6) {
                    window.Mercadopago.getPaymentMethod({
                        "bin": bin
                    }, setPaymentMethodInfo);
                }
            } else {
                setTimeout(function() {
                    if (bin.length >= 6) {
                        window.Mercadopago.getPaymentMethod({
                            "bin": bin
                        }, setPaymentMethodInfo);
                    }
                }, 100);
            }
        };

        function setPaymentMethodInfo(status, response) {
            if (status == 200) {
                const paymentMethodElement = document.querySelector('input[name=paymentMethodId]');

                if (paymentMethodElement) {
                    paymentMethodElement.value = response[0].id;
                } else {
                    const input = document.createElement('input');
                    input.setAttribute('name', 'paymentMethodId');
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('value', response[0].id);

                    form.appendChild(input);
                }

            } else {
                alert(`payment method info error: ${response}`);
            }
        };
		doSubmit = false;
        addEvent(document.querySelector('#pay'), 'submit', doPay);
        function doPay(event){
            event.preventDefault();
            if(!doSubmit){
                var $form = document.querySelector('#pay');

                window.Mercadopago.createToken($form, sdkResponseHandler); // The function "sdkResponseHandler" is defined below

                return false;
            }
        };

        function sdkResponseHandler(status, response) {
            console.log(status)
            console.log(JSON.stringify(response))
            if (status != 200 && status != 201) {
                alert("verify filled data");
            }else{
                var form = document.querySelector('#pay');
                var card = document.createElement('input');
                card.setAttribute('name', 'token');
                card.setAttribute('type', 'hidden');
                card.setAttribute('value', response.id);
                form.appendChild(card);
                doSubmit=true;
                form.submit();
            }
        };
	</script>


@endsection
