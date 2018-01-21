<!-- extend master layout -->
@extends('layouts.master')

<!-- page title -->
@section('title')
Paper Costing
@endsection('title')

<!-- custome css -->
@section('style')

<style>

</style>

@endsection('style')


<!--Page Content -->
@section('content')


<div class="container">
    <div class="row" style='min-height:70px'>
        <h2 style='margin:0 auto'>Paper Costing</h2>
    </div>

    <div class="row" style='min-height:90px'>
        <div class="col-3">
            Paper Price/Kg (FIRST PLY)
            <input name='first_ply_price_per_kg' type="number" value='7.45' class="form-control" placeholder="7.45">
        </div>
        <div class="col-3">
            Paper Price/Kg (MIDDLE PLY)
            <input type="text" class="form-control" placeholder="9.4">
        </div>
        <div class="col-3">
            Paper Price/Kg (LAST PLY)
            <input type="text" class="form-control" placeholder="7.5">
        </div>
        <div class="col-3">
            Paper Weight(grm)
            <input type="text" class="form-control" placeholder="55">
        </div>
    </div>

    <div class="row">

        <table class="table table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Size(inch)</th>
                    <th>Qty(box)</th>
                    <th>Copy(ply)</th>
                    <th>Extra Cost</th>
                    <th>Margin</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="row">1</td>
                    <td><input name='size' type='number' style='width:70px' autocomplete="off"></td>
                    <td><input name='qty' type='number' style='width:70px' autocomplete="off"></td>
                    <td><input name='copy' type='number' style='width:70px' autocomplete="off"></td>
                    <td><input name='extra' type='number' style='width:70px' autocomplete="off"></td>
                    <td><input name='margin' type='number' style='width:70px' autocomplete="off"></td>
                </tr>
            </tbody>
        </table>

    </div>

    <button id='calculat' class='btn primary-btn'>Calculat</button>

    box price
    <input name='box_price' type='number' value='0' disabled autocomplete="off">
    
    Total Amount
    <input name='final_amount' type='number' value='0' disabled autocomplete="off">

</div>


@section('script')

<script>

$(document).ready(function(){


    // $("[name='copy']").bind("keyup change", function(e) {
    //     if($(this).val() == 1){

    //         var invoice_set = 1000;
    //         var size = $("[name='size']").val();
    //         var first_ply_price = (((first_ply_price_per_kg / 2952) * size) * 1000) * 2;

    //         $("[name='price']").val(first_ply_price);
    //     }
    // });

    var first_ply_price_per_kg = $("[name='first_ply_price_per_kg']").val();
    var first_ply_price = 0;

    $("#calculat").click(function() {

            var size = $("[name='size']").val();
            var qty = $("[name='qty']").val();
            var margin = $("[name='margin']").val();

            
            var extra = $("[name='extra']").val();



            var first_ply_price = (((first_ply_price_per_kg / 2952) * size) * 1000);
            var last_ply = (((first_ply_price_per_kg / 2952) * size) * 1000);

            var cartoon_price =  parseFloat(first_ply_price) +  parseFloat(last_ply) +  parseFloat(extra);

            var qty_price = parseFloat(cartoon_price) * parseFloat(qty);
            var qty_price_with_margin = ((parseFloat(qty_price) / 100) * parseFloat(margin)) + parseFloat(qty_price);

            var total_amount_with_vat = (parseFloat(qty_price_with_margin) * .05) + parseFloat(qty_price_with_margin);


            // var total_cost = ((first_ply_price * qty) + extra_cost) + ( ((first_ply_price + extra_cost) / 100) * margin );

            $("[name='final_amount']").val(total_amount_with_vat);

    });


});



</script>


@endsection('scaript')

@endsection('content')