<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Order</title>
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
		}
		td,th{
			border:1px solid;
		}
	</style>
</head>
<body>
    <table>
    	<tr>
    		<td>สินค้า</td>
    		<td>บ้านเลขที่</td>
    	</tr>
    	@foreach($Orders as $c)
         <tr>
         	<td>{{$c->order_id}}</td>
         	<td>{{$c->location}}</td>
         </tr>
    	@endforeach
    </table>
</body>
</html>