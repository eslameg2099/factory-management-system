
$(document).ready(function () {
    window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'&&e.target.type=='text'){e.preventDefault();return false;}}},true);

   
      
    
    //add product btn
    $('.add-product-btn').on('click', function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        var price = $.number($(this).data('price'), 2);

        $(this).removeClass('btn-success').addClass('btn-default disabled');

        var html =
            `<tr>
                <td>${name}</td>
                <td><input type="number" name="products[${id}][quantity]" data-price="${price}" class="form-control input-sm product-quantity" min="1" value="1"></td>
                <td class="product-price">${price}</td>               
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;

        $('.order-list').append(html);

        //to calculate total price
        calculateTotal();
    });

    $('.add-matrail-btn').on('click', function (e) {

        e.preventDefault();
        var name = $(this).data('name');
        var id = $(this).data('id');
        

        $(this).removeClass('btn-success').addClass('btn-default disabled');

        var html =
            `<tr>
                <td>${name}</td>
                <td><input type="number" name="materials[${id}][quantity]"  class="form-control input-sm product-quantity" min="1" value="1"></td>
                <td><button class="btn btn-danger btn-sm remove-product-btn" data-id="${id}"><span class="fa fa-trash"></span></button></td>
            </tr>`;

        $('.order-lis').append(html);
        $('#add-order-form-btn').removeClass('disabled')


        //to calculate total price
    });

    //disabled btn
    $('body').on('click', '.disabled', function(e) {

        e.preventDefault();

    });//end of disabled

    //remove product btn
    $('body').on('click', '.remove-product-btn', function(e) {

        e.preventDefault();
        var id = $(this).data('id');

        $(this).closest('tr').remove();
        $('#product-' + id).removeClass('btn-default disabled').addClass('btn-success');

        //to calculate total price
        calculateTotal();

    });//end of remove product btn

    //change product quantity
    $('body').on('keyup change', '.product-quantity', function() {

        var quantity = Number($(this).val()); //2
        var unitPrice = parseFloat($(this).data('price').replace(/,/g, '')); //150
        console.log(unitPrice);
        $(this).closest('tr').find('.product-price').html($.number(quantity * unitPrice, 2));
        calculateTotal();

    });//end of product quantity change

//tass

    $('.now').on('keyup', function(e) {



        if (event.keyCode === 13) {
            e.preventDefault();


        let pay = Number(document.querySelector("#pay").value);
        let now = Number(document.querySelector("#now").value);
        let tol = Number(document.querySelector("#tol").value);
        let res = Number(document.querySelector("#res").value);


        let ch = pay + now;
        if(ch > tol)
        {
            alert(" غير ممكن لان الرقم المسدد اكبر من قيمة العمليى نفسها");
            location.reload();

            document.getElementById("now").value =0;

        }
        else if(ch < tol || ch == tol)
        {
        console.log(ch);

        document.getElementById("pay").value = ch;
        let zn = tol - ch ;
        document.getElementById("res").value = zn;
        document.getElementById("ok").disabled = false;


        }
    }


           

    });//end 
    //list all order products
    $('.order-products').on('click', function(e) {

        e.preventDefault();

        $('#loading').css('display', 'flex');
        
        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
            url: url,
            method: method,
            success: function(data) {

                $('#loading').css('display', 'none');
                $('#order-product-list').empty();
                $('#order-product-list').append(data);

            }
        })

    });//end of order products click

    //list all shafts
    $('.order-shafts').on('click', function(e) {

        e.preventDefault();

        $('#load').css('display', 'flex');
        
        var url = $(this).data('url');
        var method = $(this).data('method');
        $.ajax({
            url: url,
            method: method,
            success: function(data) {

                $('#load').css('display', 'none');
                $('#order-shaft-list').empty();
                $('#order-shaft-list').append(data);

            }
        })

    });//end 

    //print order
    $(document).on('click', '.print-btn', function() {

        $('#print-area').printThis();

    });//end of click function


    $('.total-pric').on('input', function() {

       
       // let st = parseFloat(document.querySelector("#stt").value);
        let st =   parseFloat($("#stt").html().replace(/,/g, ''));
        let tx = parseFloat(document.querySelector("#tx").value);
        let fin = st - tx;
        console.log(st);
        console.log(tx);

        
        console.log(fin);
        $('.total-p').html($.number(fin, 2));
        



    });//end o


//tass
    $('.sreach-btn').on('click',  function(e) {

        e.preventDefault();


        var pricee = 0;
        var pay =0;
        var ret =0;

        $('.order-lis .amount').each(function(index) {
            
            pricee += parseFloat($(this).html().replace(/,/g, ''));
            console.log(pricee);
            $('.total-pric').html($.number(pricee, 2));

    
        });

        $('.order-lis .payment').each(function(index) {
            
            pay += parseFloat($(this).html().replace(/,/g, ''));
            console.log(pay);
            $('.total-pri').html($.number(pay, 2));

    
        });

        $('.order-lis .rest').each(function(index) {
            
            ret += parseFloat($(this).html().replace(/,/g, ''));
            console.log(ret);
            $('.total-pr').html($.number(ret, 2));

    
        });
       
       

    });//end of

});//end of document ready

//calculate the total
function calculateTotal() {

    var price = 0;


    $('.order-list .product-price').each(function(index) {
        
        price += parseFloat($(this).html().replace(/,/g, ''));


    });//end of product price

    $('.total-price').html($.number(price, 2));



    $('.total-p').html($.number(price, 2));


    //check if price > 0
    if (price > 0) {

        $('#add-order-form-btn').removeClass('disabled')

    } else {

        $('#add-order-form-btn').addClass('disabled')

    }//end of else

}//end of calculate total


