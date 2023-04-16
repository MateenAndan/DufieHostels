<!DOCTYPE html>
<html>
<head>
	<title>Hostel Management System - Book a Room</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			color: #333333;
		}

		form {
			width: 50%;
			margin: auto;
			background-color: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		label {
			font-weight: bold;
			display: block;
			margin-bottom: 5px;
		}

		input[type=text], select {
			width: 100%;
			padding: 12px 20px;
			margin: 8px 0;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
		}

		input[type=submit] {
			background-color: #4CAF50;
			color: white;
			padding: 14px 20px;
			margin: 8px 0;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}

		.error {
			color: red;
		}
    </style>
</head>
<body>
	<h1>Book a Room</h1>
	<form action="book.php" method="post">
		<label for="hostel_name">Hostel Name:</label><br>
		<select id="hostel_name" name="hostel_name">
			<option value="Dufie Prestige">Dufie Prestige</option>
			<option value="Male Block">Male Block</option>
			<option value="Female Block">Female Block</option>
			<option value="Dufie Gold">Dufie Gold</option>
			<option value="Dufie Annex">Dufie Annex</option>
		</select><br>
		<label for="room_type">Room Type:</label><br>
		<select id="room_type" name="room_type">
			<option value="Two in a room">Two in a room (2 beds)</option>
			<option value="Three in a room">Three in a room (3 beds)</option>
			<option value="Four in a room">Four in a room (4 beds)</option>
		</select><br>
        <label for="availability_status">Availability Status:</label><br>
        <select id="availability_status" name="availability_status">
            <option value="Available">Available</option>
            <option value="Occupied">Occupied</option>
        </select><br>
		<label for="price">Price:</label><br>≥
		<input type="text" id="price" name="price" readonly><br>
		<label for="check_in_date">Check-in Date:</label><br>
		<input type="date" id="check_in_date" name="check_in_date"><br>
		<label for="check_out_date">Check-out Date:</label><br>
		<input type="date" id="check_out_date" name="check_out_date"><br><br>
		<input type="submit" value="Book">
	</form>
	<script>
		// Update price based on room type
		document.getElementById("room_type").addEventListener("change", function() {
			var roomType = document.getElementById("room_type").value;
			if (roomType === "Two in a room") {
				document.getElementById("price").value = "4000";
			} else if (roomType === "Three in a room") {
				document.getElementById("price").value = "5000";
			} else if (roomType === "Four in a room") {
				document.getElementById("price").value = "6000";
			}
		});
	</script>
</body>
</html>