<div id="print-area">
    <br>
    <br>
    <br>

    <br>
    <br>
    <br>

    <br>
    <br>
    <br>
    <h2 style="  text-align: center;
" > فاتورة</h2>
    
    <table class="table table-hover table-bordered"
 >
            <h3>اسم العميل: <span>{{ $order->client->name }}</span></h3>
            <h3> تاريخ الطلب: <span>{{ $order->created_at->toFormattedDateString() }}</span></h3>


        <thead>
        <tr>
            <th>@lang('site.name')</th>
            <th>@lang('site.quantity')</th>
            <th>سعر الكليو</th>

            <th>@lang('site.price')</th>
        </tr>
        </thead>

        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ number_format($product->pivot->quantity * $product->price, 2) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <h3>@lang('site.total') <span>{{ number_format($order->total_price, 2) }}</span></h3>
    <h3>الخصم: <span>{{ $order->des}}</span></h3>
            <h3> المدفوع: <span>{{ number_format($order->finprice, 2) }}</span></h3>

</div>

<button class="btn btn-block btn-primary print-btn"><i class="fa fa-print"></i> @lang('site.print')</button>
