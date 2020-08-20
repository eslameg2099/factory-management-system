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
" > تقرير وردية</h2>
    
    <table class="table table-hover table-bordered"
 >
            <h3>التاريخ: <span>{{ $order->created_at->toFormattedDateString() }}</span></h3>
            <h3>اسم المشرف: <span>{{ $order->employe->name }}</span></h3>



        <thead>
        <tr>
            <th>اسم الصنف</th>
            <th>@lang('site.quantity')</th>
           
        </tr>
        </thead>
        <h3>الاصناف المستهلكه</h3>

        <tbody>
        @foreach ($materials as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                
            </tr>
        @endforeach
      
        </tbody>
    </table>
   
    <h3>الانتاج المتوقع: <span>{{ number_format($order->expect, 2) }}</span></h3>
    <h3>الانتاج الفعلي: <span>{{ $order->genter}}</span></h3>
    <h3>المفقود: <span>{{ $order->lost}}</span></h3>

            <h3> ملاحظات: <span>{{ $order->description }}</span></h3>

</div>

<button class="btn btn-block btn-primary print-btn"><i class="fa fa-print"></i> @lang('site.print')</button>
