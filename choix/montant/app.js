console.log("Authority is not given to you to deny the return of the King., Steward.")
const input = document.querySelectorAll('#free-choice')[0];

function inputSuggestedAmount(suggestion, input) {
    input.value = suggestion;
    setTimeout(updateAmountDisplays(input), 30);
}

function updateAmountDisplays(input) {
    const totalAmount = input.value;
    const amountDisplays = document.getElementsByClassName('amount-display');

    const stripeFee = '';
    const actualDonation = '';
    const taxEvasion = '';

    if (totalAmount >= 10) {
        const stripeFee = 0.25 + totalAmount * 0.015;
        const actualDonation = Math.floor((totalAmount - stripeFee) * 100) / 100;
        const taxEvasion = Math.floor(taxEvasionPercentage * actualDonation) / 100;
        
        amountDisplays[0].innerHTML = totalAmount;
        if (isAnonymous == 'false'){
            amountDisplays[1].innerHTML = taxEvasion;
        } else {
            amountDisplays[1].innerHTML = '0';
        }
        amountDisplays[2].innerHTML = actualDonation;
        amountDisplays[3].innerHTML = Math.floor(stripeFee * 100) / 100;
    } else {
        if (totalAmount > 0) {
            const stripeFee = 0.25 + totalAmount * 0.015;
            const actualDonation = Math.floor((totalAmount - stripeFee) * 100) / 100;

            amountDisplays[0].innerHTML = totalAmount;
            amountDisplays[1].innerHTML = '0';
            amountDisplays[2].innerHTML = actualDonation;
            amountDisplays[3].innerHTML = Math.floor(stripeFee * 100) / 100;
        } else {
            amountDisplays[0].innerHTML = totalAmount;
            amountDisplays[1].innerHTML = '#';
            amountDisplays[2].innerHTML = '#';
            amountDisplays[3].innerHTML = '#';
        }
    }

    if (totalAmount == '') {
        amountDisplays[0].innerHTML = '#';
    }

}

function correctNumberDisplay(number) {
    // will transform payment display as follows: 29.4€ => 29,40€
    return 0;
}

input.addEventListener('input', updateAmountDisplays.bind(null, input));