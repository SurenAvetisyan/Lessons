var prod = [];
var obj = {};
$(document).ready(function ($) {
    function validatePrice(pr) {
        return /^(\d){1,3}$/.test(pr);
    }
    function validateName(na) {
        return /^[a-z]+$/is.test(na);
    }
    function validatePrice(pr) {
        return /^(\d){1,3}$/.test(pr);
    }
    // var email = document.getElementById('email');
    price.onkeyup = function () {
        if(!validatePrice(this.value)){
            price.style="border:2px solid red";
            its.innerText="wrong price ";
            its.style.color="red";
            its.style.fontSize = "12px";
            return false;

        }
        else if(validatePrice(this.value) ){
            price.style="border:2px solid green";
            its.innerText=" ";
        }
    }

    $('#but').click(function (event) {
        obj.name = $('#_name').val();
        obj.price = $('#price').val();
        obj.data = $('#data').val();
        obj.dop = $('#dop').val();
        prod.push(obj);
        var html = '<tr>' +
            '<td>' +
            obj.name +
            '</td>' +
            '<td>' +
            obj.price +
            '</td>' +
            '<td>' +
            obj.data +
            '</td>' +
            '<td>' +
            obj.dop +
            '</td>' +
            '</tr>';

        $('table').append(html);



    })
});
// function button() {
//     var _name = document.getElementById('_name');
//     var price = document.getElementById('price');
//     var data = document.getElementById('data');
//     var dop = document.getElementById('dop');
//     obj.name = _name.value;
//     obj.email = email.value;
//     obj.data = data.value;
//     obj.dop = dop.value;
//     prod.push(obj);
//     $(document).ready(function ($) {
//         var b = $('#_name').val();
//         var a = $('table').append('<tr></tr>');
//
//
//     })
//
// }
