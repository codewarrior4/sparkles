$(document).ready(function(){

    // make button inactive if item not selected

    
    // on select item
    
    $('select[name="item"]').on('change', function(){
        var item = $(this).val();
        if(item == ''){
            $('#addToCartBtn').attr('disabled', true);
        }else{
            $('#addToCartBtn').attr('disabled', false);
        }
        // update price set value data-price 
        var wash_price = $(this).find(':selected').data('wash_price');
        var washiron_price = $(this).find(':selected').data('washiron_price');
        var starchiron_price = $(this).find(':selected').data('starchiron_price');
        var complete_price = $(this).find(':selected').data('complete_price');
        console.log(wash_price,washiron_price,starchiron_price,complete_price)

        // add item to select optionn
        var laundryType = $('#laundryType');
        let text = ''
        if(wash_price > 0){
            text += `<option data-price="${wash_price}" value="wash">Wash</option>`;
        }
        if(washiron_price > 0){
            text += `<option data-price="${washiron_price}" value="washiron">Wash & Iron</option>`;
        }
        if(starchiron_price > 0){
            text += `<option data-price="${starchiron_price}" value="starchiron">Starch & Iron</option>`;
        }
        if(complete_price > 0){
            text += `<option data-price="${complete_price}" value="complete">Complete</option>`;
        }
        laundryType.html(text);
        // get first selected item in select option
        var laundryitemprice =  $("#laundryType").find(":selected").data('price');
        parseFloat(laundryitemprice)
        
        $('#quantity').val(1);
        $('#price').html(laundryitemprice);
        $('#total').val(laundryitemprice * 1);
     
    });

    // on select of laundryItem
    $('#laundryType').on('change', function(){
        var price =$(this).find(':selected').data('price')
        
        $('#quantity').val(1);
        $('#price').html(price);
        $('#total').val(price * 1);
    })


    // update total value onchange of quantity
    $('#quantity').on('change', function(){
        var quantity = $(this).val();
        var price = $('#price').html();
        var total = quantity * price;
        $('#total').val(total);
    });

    // add item to cart
    $('#addToCart').on('submit', function(e){
        e.preventDefault();
        $('#addToCartBtn').attr('disabled', true);

        $('#btn-loader').show();
        var item = $('select[name="item"]').val();
        var name = $(this).find(':selected').data('name');
        var quantity = $('#quantity').val();
        var price = $('#price').html();
        var total = $('#total').val();
        var token = $('input[name="_token"]').val();
        var laundrytype = $('#laundryType').find(':selected').text()
        
        var data = {
            item: parseInt(item),
            quantity: parseInt(quantity),
            price: parseFloat(price),
            total: parseFloat(total),
            name:name,
            laundrytype:laundrytype,
            _token: token
        };

        console.log(data)
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/customer/laundry/store",
            type: 'POST',
            data: data,
            dataType:'json',
            success: function(response){
                console.log(response);
                $('#btn-loader').hide();
                $('#addToCartBtn').attr('disabled', false);
                // loop through response to to create new table
                var tr = '';
                $.each(response.laundry, function(key, value){
                    tr += `<tr >
                                <td>${key+1} </td>
                                <td>${value.laundry_item_name}</td>
                                <td>${value.laundry_type}</td>
                                <td><input class="form-control cart-quantity" type="number" value="${value.quantity}" data-total="${value.total}" data-id="${value.id}" data-price="${value.price}" min="1" id="cart-item-quantity" style="width: 100%"></td>
                                <td>${value.price}</td>
                                <td>${value.total}</td>
                                <td><a href="/customer/laundry/delete/${value.id}" class="btn btn-danger">Delete</a></td>
                            </tr>`;
                    total += value.total;
                }
                );
                $('#cartTable').html(tr);
                $('#cart-total').html(response.total.toFixed(2).toLocaleString());

                

            }
        });
    });


    // on cart quantity change update the row
    $(document).on('change', '.cart-quantity', function(){
        // console.log(this)
        var quantity = $(this).val();
        var id = $(this).data('id');
        var price = $(this).data('price');
        var total = quantity * price;
        var token = $('input[name="_token"]').val();
        var data = {
            id: id,
            quantity: quantity,
            _token: token,
            price:price,
            total:total

        };
        // check if quantity is empty
        if(quantity != ''){
        
            console.log(data)
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/customer/laundry/update",
                type: 'POST',
                data: data,
                dataType:'json',
                success: function(response){
                    console.log(response);
                    // loop through response to to create new table
                    var tr = '';
                    $.each(response.laundry, function(key, value){
                        tr += `<tr >
                                    <td>${key+1} </td>
                                    <td>${value.laundry_item_name}</td>
                                    <td>${value.laundry_type}</td>
                                    <td><input class="form-control cart-quantity" type="number" value="${value.quantity}" data-total="${value.total}" data-id="${value.id}" data-price="${value.price}" min="1" id="cart-item-quantity" style="width: 100%"></td>
                                    <td>${value.price}</td>
                                    <td>${value.total}</td>
                                    <td><a href="/customer/laundry/delete/${value.id}" class="btn btn-danger">Delete</a></td>
                                </tr>`;
                        total += value.total;
                    }
                    );
                    $('#cartTable').html(tr);
                    $('#cart-total').html(response.total.toFixed(2).toLocaleString());

                }
            });
        }
    });

    $('#btn-proceed').on('click',()=>{
        $('#pickupinfo').show()
    })
});