<!DOCTYPE html>
<html>
<head>
	<title>Hostel Management System - Room Availability</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}

		h1 {
			text-align: center;
			color: #333333;
		}

		table {
			margin: auto;
			background-color: #ffffff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
		}

		th {
			font-weight: bold;
			text-align: left;
		}

		td, th {
			padding: 10px;
			border: 1px solid #ccc;
		}

		button {
			background-color: #4CAF50;
			color: white;
			padding: 10px;
			border: none;
			border-radius: 4px;
			cursor: pointer;
		}

		button:hover {
			background-color: #45a049;
		}

		.error {
			color: red;
		}
    </style>
</head>
<body>
	<h1>Room Availability</h1>
	<table>
		<thead>
			<tr>
				<th>Hostel Name</th>
				<th>Room Type</th>
				<th>Availability</th>
                <th>Number of Rooms</th>
                <th>Booking</th>
			</tr>
		</thead>
		<tbody>
                <tr>
                <td>Dufie Prestige</td>
                <td>Two in a room (2 beds)</td>
                <td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>10</td>
                <td><?php if (rand(0,1)) { ?><a href="booking_view.php"><button>Book Now</button></a><?php } ?></td>
            </tr>
            <tr>
                <td>Dufie Prestige</td>
                <td>Three in a room (3 beds)</td>
                <td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>4</td>
                <td><?php if (rand(0,1)) { ?><a href="booking_view.php"><button>Book Now</button></a><?php } ?></td>
            </tr>
            <tr>
                <td>Dufie Prestige</td>
                <td>Four in a room (4 beds)</td>
                <td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>5</td>
                <td><?php if (rand(0,1)) { ?><a href="booking_view.php"><button>Book Now</button></a><?php } ?></td>
            </tr>
            <tr>
                <td>Male Block</td>
                <td>Two in a room (2 beds)</td>
                <td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>4</td>
                <td><?php if (rand(0,1)) { ?><a href="booking_view.php"><button>Book Now</button></a><?php } ?></td>
            </tr>
            <tr>
                <td>Male Block</td>
                <td>Three in a room (3 beds)</td>
                <td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>6</td>
                <td><?php if (rand(0,1)) { ?><a href="booking_view.php"><button>Book Now</button></a><?php } ?></td>
            </tr>
            <tr>
                <td>Male Block</td>
                <td>Four in a room (4 beds)</td>
                <td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>2</td>
                <td><?php if (rand(0,1)) { ?><a href="booking_view.php"><button>Book Now</button></a><?php } ?></td>
            </tr>
            <tr>
                <td>Female Block</td>
                <td>Two in a room (2 beds)</td>
                <td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>8</td>
                <td><?php if (rand(0,1)) { ?><a href="booking_view.php"><button>Book Now</button></a><?php } ?></td>
            </tr>
            <tr>
                <td>Female Block</td>
                <td>Three in a room (3 beds)</td>
		        <td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>8</td>
                <td><?php if (rand(0,1)) { ?><a href="booking_view.php"><button>Book Now</button></a><?php } ?></td>
			</tr>
			<tr>
				<td>Female Block</td>
				<td>Four in a room (4 beds)</td>
				<td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>10</td>
                <td><a href="booking_view.php"><button>Book Now</button></a></td>
			</tr>
			<tr>
				<td>Dufie Gold</td>
				<td>Two in a room (2 beds)</td>
				<td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>4</td>
                <td><a href="booking_view.php"><button>Book Now</button></a></td>
			</tr>
			<tr>
				<td>Dufie Gold</td>
				<td>Three in a room (3 beds)</td>
				<td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>13</td>
                <td><a href="booking_view.php"><button>Book Now</button></a></td>
			</tr>
			<tr>
				<td>Dufie Gold</td>
				<td>Four in a room (4 beds)</td>
				<td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>9</td>
                <td><a href="booking_view.php"><button>Book Now</button></a></td>
            </tr>
            <tr>
				<td>Dufie Annex</td>
				<td>Two in a room (2 beds)</td>
				<td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>11</td>
                <td><a href="booking_view.php"><button>Book Now</button></a></td>
            </tr>
            <tr>
				<td>Dufie Annex</td>
				<td>Three in a room (3 beds)</td>
				<td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>8</td>
                <td><a href="booking_view.php"><button>Book Now</button></a></td>
            </tr>
            <tr>
				<td>Dufie Annex</td>
				<td>Four in a room (4 beds)</td>
				<td><?php echo rand(0,1) ? 'Available' : 'Not Available'; ?></td>
                <td>5</td>
                <td><a href="booking_view.php"><button>Book Now</button></a></td>
            </tr>
        </tbody>
    </table>
</body>