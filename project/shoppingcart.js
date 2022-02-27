let id = 0;
let cartCount = 0;
const cart = [];

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems);
});

$(document).ready(function() {
    $('select').formSelect();

    $("#order").change(function() {
        var shipping = "0";
        var total = 0;
        var totalcost = 0;
        if ($('#date').val() == "1") {
            shipping = "6.99";
        } else if ($('#date').val() == "2") {
            shipping = "5.99";
        } else if ($('#date').val() == "7") {
            shipping = "0";
        }
        totalcost = document.getElementById("subtotal").textContent;
        total = Number(totalcost.slice(11)) * 1.13 + Number(shipping);
        roundedtotal = Math.round((total + Number.EPSILON) * 100) / 100;
    
        $('#shipping').text("Shipping & Handling: $" + shipping);
        $('#total').text("TOTAL: $" + roundedtotal);
        document.getElementById("FinalValue").value = roundedtotal;
    });
});

