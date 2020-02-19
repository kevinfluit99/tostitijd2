<?php
 require_once 'include/include.php';

 $facturen = showProduct($_SESSION['uid'],$_GET['order_id']);
  echo"
  <table class='table table-bordered font'>
   <thead>
     <tr>
       <th scope='col'>#</th>
       <th scope='col'>Product</th>
       <th scope='col'>Aantal</th>
       <th scope='col'>Prijs</th>
     </tr>
   </thead>
   <tbody>";
   foreach ($facturen as $factuur) {
     $aantal = $factuur['quantity'];
     $prijs = $factuur['price'];
     $total = ($prijs * $aantal);
     echo"
     <tr>
       <th scope='row'>1</th>
       <td> ".htmlentities($factuur['name'])."</td>
       <td> ".htmlentities($factuur['quantity'])."</td>
       <td>€ ".htmlentities(number_format((float)$total, 2, '.', ''))."</td>
     </tr>";
   }
   foreach ($facturen as $factuur) {
   echo"
   <tr>
      <th scope='row'>3</th>
      <td colspan='2'>Totaal prijs:</td>
      <td>€ ".htmlentities($factuur['grand_total'])."</td>
    </tr>";
    break;
  }
    echo"
   </tbody>
 </table>";
