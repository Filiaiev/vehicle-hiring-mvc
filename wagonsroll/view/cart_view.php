<?php require_once "../dao/vehicleDAO.php";
	  require_once "../model/vehicle.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<button onclick="window.location.href='../controller/home_controller.php'">HOMEPAGE BABY IM HERE BABY CLICK ON ME</button> <br>

	<div class="container">
		<div class="col-lg-15" style="overflow-x:auto;">
			<table class="table table-bordered my-5" style="width:1000px;max-width: none;margin-bottom:0!important;">
				<tr>
					<th>ID</th>
					<th>IMAGE</th>
					<th>INFO</th>
					<th>DATES</th>
					<th>PRICE</th>
					<th>ACTION</th>
				</tr>

				<?php if (!empty($_SESSION['cart'])) :?>
					<?php foreach ($_SESSION['cart'] as $key => $value): ?>
						<tr>
							<td><?= $value['regNum'] ?></td>
							 <td>
								<img
									src=<?= $value['imageUrl'] ?>               
									style="width: 100%; height:200px; object-fit:cover;"
								>
							</td>
							<td>
								<a><?= $value['brandName'] ?> <?= $value['modelName'] ?></a> <br>
								<a><?= $value['typeName'] ?></a> <br>
								<a><?= $value['maxPassengerNumber'] ?></a> seats<br>
								<a>Daily rate: £<?= $value['dailyRate'] ?></a> <br>
							</td>
							<td>
								<a>Booking Start Date: <br><?= $value['startDate'] ?></a> <br>
								<a>Booking End Date: <br><?= $value['endDate'] ?></a> <br>
							</td>
							<td>
								<a>£<?=$value['price']?></a>
							</td>
                             <td>
                             	<button class="btn btn-danger remove" id="<?=$value['regNum'];?>" >Remove</button>
                             </td>
					</tr>
						  <?php endforeach; ?>
					
				
				<?php else: ?> 
                       <tr>
                       	  <td class="text-center" colspan="5">NO ITEM SELECTED</td>
                       </tr>
				<?php endif ?>
						 <tr>
							<td colspan="3"></td>
							<td>Total Price</td>
							<td>£<?= number_format($total_price,2); ?></td>
							<td>
                             	<button class="btn btn-warning clearall">Clear All</button>
                             </td>
						</tr>
			</table>
		</div>
	</div>

<button onclick="window.location.href='../controller/contactForm_controller.php'" style="margin: auto" >Make an orderrr</button> <br><br><br>

<?php require_once "../client/js/home/cartActions.js";?>
</body>
</html>