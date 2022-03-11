<!DOCTYPE html>
<html>
<head>
<title>Wagons Roll</title>
</head>
<body>

<br>
<!--  -->

<!-- action will be a .php file  -->
<form action="" method="get">
  <input type="text" id="" name="search" placeholder="Enter car name, model, brand" size="40"><br>
  <input type="submit" hidden>
</form> 

<!-- so far this button is just to be aware of, 
there should be onclick = "function()" parameter here 
but I don't add js as of now-->
<button>
Filter
</button>
<br>
<br>

<!-- there will be quite a few filters here but
considering we haven't yet decided the way we're gonna 
implement them, I didn't do more than the most usual-->
<div class="filter" style="border: 2px outset black; width:200px;">
<p>Filter</p>
<hr>

<div class="pricerange">
<p>Price Range</p>
<p>Enter the money amount</p>
<form action="" method="get">
  <label for="maxprice">max:</label>
  <input type="number" id="maxprice" name="maxprice"><br><br>
  <label for="minprice">min::</label>
  <input type="number" id="minprice" name="minprice"><br><br>
  <input type="submit" hidden>
</form>
<hr>
</div>

<div class="seatsnum">
<p>Seat Num</p>
<p>Enter the min number of seats needed</p>
<form action="" method="get">
  <label for="seatsnum">Volume (between 2 and 50):</label>
  <!-- rn without css you can't see the
  real chosen volume rather guess-->
  <input type="range" id="seatsnum" name="seatsnum" min="2" max="50">
  <input type="submit" hidden>
</form>
<hr>
</div>
<a href="google.com">More..</a>
</div>

<br>
<br>

<div class="carblock" style="border: 2px outset black; width:300px;">
<img src="https://media.autoexpress.co.uk/image/private/s--wqUB0fzD--/f_auto,t_content-image-full-mobile@1/v1645649253/autoexpress/2022/02/BMW-X1_xf13cc.jpg" style="width: 100%;">
<a>BMW X1 Aut.</a><br>
<a>Car</a><br>
<a>5 seats</a><br>
<a>183/day</a><br>
<a>Available since 12.02.2021</a><br>
<!-- missing onclick() as of now -->
<button>Add to Basket</button>

<!-- post button press -->
<hr>
<form action="" method="get">
  <label for="startdate">Enter Start Date:</label>
  <input type="date" id="startdate" name="startdate"><br>
  <label for="enddate">Enter End Date:</label>
  <input type="date" id="enddate" name="enddate"><br>
  <input type="submit" value="Book">
</form>
</div>




</body>
</html>

