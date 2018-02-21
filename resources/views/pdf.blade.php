<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>บิลสินค้า</title>

	<style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
        }
		table{
			border-collapse: collapse;
            table-layout:fixed;
            empty-cells:show; 
            border-collapse:collapse; 
            width:100%;
            
            .
            border:1px solid #666666 

		}
		td,th{
			border:1px solid;  
		}
       panel-title{margin-top:0;margin-bottom:0;font-size:16px;
        color:inherit;
       }

	</style>

</head>
<body >
<h1>ใบสั่งสินค้า</h1>
    <address>
    <strong>สถานที่จัดส่ง:</strong><br>  
     <?php echo (DB::table('customers')->where('customers_id',$customer)->value('name'));
     ?> <br>
     <?php echo (DB::table('customers')->where('customers_id',$customer)->value('address'));
     ?> <br>
    </address>

<h3><strong>รายการสั่งซื้อ</strong></h3>        
</div>
  <table >
    <thead>
        <tr>
            <td><strong>ชื่อสินค้า</strong></td>
            <td class="text-center"><strong>ราคา</strong></td>
            <td class="text-center"><strong>จำนวน</strong></td>
            <td class="text-right"><strong>ราคารวม</strong></td>
        </tr>
    </thead>
    <tbody>

    @foreach($order_products as $d)
            <tr>
                <td>
                 <?php echo (DB::table('products')->where('products_id',$d->products_id)->value('name'));
                 ?> 
                </td>
                <td class="text-center">
                 <?php echo (DB::table('products')->where('products_id',$d->products_id)->value('price'));
                 ?> 
                </td>
                <td class="text-center">
                    {{$d->amount_d}}
                </td>
                @php $total = 0; @endphp
                @php $total = $d->amount_d*$d->price_d;
                                @endphp
                       
                <td class="text-right">{{$total}}</td>    
            </tr>
            @endforeach
                              
                                
                                <tr> 
                <td class="thick-line"></td>
                <td class="thick-line"></td>
                <td class="thick-line text-center"><strong>ราคารวม</strong></td>
                <td class="thick-line text-right">
                   <?php echo (DB::table('orders')->where('customers_id',$customer)->value('price_total'));
                 ?> 
                </td> 
                         
            </tr>  
                              
                                <!-- <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Shipping</strong></td>
                                    <td class="no-line text-right">$15</td>
                                </tr> -->
                                <!-- <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Total</strong></td>
                                    <td class="no-line text-right">$685.99</td>
                                </tr> -->
                            </tbody>
                        </table>
</body>
</html>