<?php
session_start();
require 'connect.php';
require 'Item.php';

//Save new Order
mysqli_query($con, 'insert into orders (name, datecreation, status, username) 
					values("New Order", "'.date('Y-m-d').'", 0, "acc2")');
$ordersid = mysqli_insert_id($con);
echo $ordersid;
					
//Save Order Details for new order
for($i=0; $i<count($cart); $i++){
	mysqli_query($con, 'insert into ordersdetail (productid, ordersid, price, quantity) 
					values('.$cart[$i]->id.','.$ordersid.', '.$cart[$i]->price.', '.$cart[$i]->quantity.')');	
}

//Clear all product in cart
unset($_SESSION['cart']);
?>
Thanks for buying. Click <a href="index.php">here</a> to continue buy product.