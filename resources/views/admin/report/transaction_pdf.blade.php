<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta content="telephone=no" name="format-detection" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <title>::</title>
      <!--<link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,400,700,800" rel="stylesheet">-->
   </head>
   <body marginwidth="0" marginheight="0" offset="0" topmargin="0" leftmargin="0" bgcolor="#fff">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700|Open+Sans:300,400,700,800" rel="stylesheet">
      </link>
      <table width="550" border="0" align="center" cellspacing="0" cellpadding="10" bgcolor="#ffffff" style="text-align: center; font-family: 'Open Sans', sans-serif; padding:30px 0px; background: #ffffff">
         <tr bgcolor="#fff">
            <td align="center">
               <img src="{{public_path('site/assets/images/MelloBridge.svg')}}" alt="BTS" width="76px">
            </td>
         </tr>
         <tr>
            <th>Reciepient</th>
            <th>Email</th>
            <th>Transaction Id</th>
            <th>Transaction Date</th>
            <th>Transaction Amount</th>
         </tr>
         @if(!empty($transactions))
         @foreach($transactions as $tran)
         <tr>
            <td>{{$tran->name}}</td>
            <td>{{$tran->email}}</td>
            <td>{{$tran->transaction_id}}</td>
            <td>{{date('d-m-Y',strtotime($tran->transaction_date))}}</td>
            <td>{{$tran->amount}}</td>
         </tr>
         @endforeach
         @else
         <tr>
            <td>no data found</td>
         </tr>   
         @endif
  
      </table>
   </body>
</html>