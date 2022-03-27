<?php require_once "../dao/vehicleDAO.php";
	  require_once "../model/vehicle.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cart</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://use.fontawesome.com/47474f8808.js"></script>
	<script type="text/javascript" src="../client/js/home/cartActions.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="../client/style/general.css">
	<link rel="stylesheet" href="../client/style/cart.css">
	<link rel="stylesheet" href="../client/style/header.css"/>
</head>
<body>
	<?php require_once "block/header.php" ?>
	<ul class="nav nav-tabs nav-fill">
		<li class="nav-item">
			<a class="nav-link" href="home_controller.php">Homepage</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="userDayTrips_controller.php">Daytrips</a>
		</li>
		<li class="nav-item">
			<a class="nav-link active" href="cart_controller.php">Basket</a>
		</li>
	</ul>
	<div class="container-fluid">
		<div class="col-lg-15 car-table-wrapper">
			<table class="table table-bordered my-5 car-table">
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
									class = "car-img"
									alt = "image of <?= $value['brandName'] ?> <?= $value['modelName'] ?>"
									title = "<?= $value['brandName'] ?> <?= $value['modelName'] ?>"
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
							<td colspan="1"></td>
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
		<button onclick="window.location.href='../controller/contactForm_controller.php'" class="btn btn-secondary order-bttn">Make an order</button> <br><br><br>
	</div>


</body>
</html>