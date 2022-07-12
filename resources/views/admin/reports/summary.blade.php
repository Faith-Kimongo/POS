<!DOCTYPE html>
<!-- saved from url=(0028)https://corona-stats.online/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ZDMS Statistics</title>
    <style>
      *, ::after, ::before {
        box-sizing: border-box;
      }
      body {
        background-color: #0d0208;
        color: #00ff41;
        font-size: 1rem;
        font-weight: 400;
        line-height: normal;
        margin: 0;
        text-align: left;
      }
      .container {
        margin-right: auto;
        margin-left: auto;
        padding-right: 10px;
        padding-left: 10px;
        width: 100%;
      }
      pre {
        display: block;
        font-family: SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        overflow: auto;
        white-space: pre;
      }
      table {
        /* border-collapse: collapse; */
        border: 1px solid green;
        }
        th,td {
        /* border-collapse: collapse; */
        border: 1px solid green;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <pre>
<table>
    
    <tr><th style="color: red;text-align:center">No</th> <th style="color: red;text-align:center">Item</th> <th style="color: red;text-align:center">Number Issued</th><th style="color: red;text-align:center">Redeemed</th></tr>
    @foreach ($users as $day => $users_list)
<tr><td></td> <td>Vouchers On <strong><font color="red">{{$day}}</font></strong></td> <td style="text-align:center">{{ $users_list->count() }} </td><td> {{ $users_list->where('redeemed_on','<>',NULL)->count() }} </td></tr>
    @endforeach
    <tr><th style="color: red;text-align:center">No</th> <th style="color: red;text-align:center">TOTAL</th> <th style="color: red;text-align:center">{{$vouchers->count()}}</th><th style="color: red;text-align:center">{{$redeemed->count()}}</th></tr>

</table>

<table>
    
  <tr><th style="color: red;text-align:center">No</th> <th style="color: red;text-align:center">User</th> <th style="color: red;text-align:center">Number Issued</th><th style="color: red;text-align:center">Redeemed</th></tr>
  @foreach ($managers as $manager)
<tr><td></td> <td>{{$manager->name}} <strong><font color="red"></font></strong></td> <td style="text-align:center">{{ $manager->manbeneficiaries->count() }} </td><td> {{ $manager->manbeneficiaries->where('redeemed_on','<>',NULL)->count() }} </td></tr>
  @endforeach
  <tr><th style="color: red;text-align:center">No</th> <th style="color: red;text-align:center">TOTAL</th> <th style="color: red;text-align:center">{{$vouchers->count()}}</th><th style="color: red;text-align:center">{{$redeemed->count()}}</th></tr>

</table>

<div style="width:100%; text-align:center">Cool Stuff &lt/&gt</div>
</pre>
    </div>
  
  <script>
      var table = document.getElementsByTagName('table')[0],
    rows = table.getElementsByTagName('tr'),
    text = 'textContent' in document ? 'textContent' : 'innerText';

for (var i = 1, len = rows.length-1; i < len; i++){
    rows[i].children[0][text] = i + '. ' + rows[i].children[0][text];
}
 </script>
</body></html>