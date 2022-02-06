<!DOCTYPE html>
<html>
<head>
    <title>Student Records</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Import materialize.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="studentrecord.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import jQuerys-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--Import materialize.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</head>

<body>
<h1 class="center-align">Student Record Database</h1>

    <div class="center-align container">
        <!--Form--> 
        <form action="" method="POST">
            <!--Create Table--> 
            <button class="btn waves-effect waves-light test" type="submit" name="create">Create Table
            </button>
			
            <!--Delete All--> 
            <button class="btn waves-effect waves-light " type="submit" name="deleteall">Delete Table
            </button>	
			
            <!--Insert--> 
            <button class="btn waves-effect waves-light " type="submit" name="insert">Insert
            </button>
			
            <!--Delete--> 
            <button class="btn waves-effect waves-light " type="submit" name="delete">Clear Record #1
            </button>

			<!--Print--> 
            <button class="btn waves-effect waves-light " type="submit" name="print"> Print Info
            </button>
        </form>
    </div>

</body>
</html>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "testnew";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['create'])){
		try {
				// sql to create table
				$sql = "CREATE TABLE StRec (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				firstname VARCHAR(30) NOT NULL,
				middlename VARCHAR(30) NOT NULL,
				lastname VARCHAR(30) NOT NULL,
				email VARCHAR(50) NOT NULL,
				program VARCHAR(50) NOT NULL,
				reg_date TIMESTAMP
				)";

				if ($conn->query($sql) === TRUE) {
					echo "<p>Table Student Records created successfully</p>";
				} else {
					echo "<p>Error creating table: " . $conn->error ."</p>";
				}
		}
		catch(Throwable $e)
		{
			echo  $e->getMessage();
		}
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_POST['insert'])){
		try {
			$sql = "INSERT INTO StRec (firstname, middlename, lastname, email, program)
			VALUES 
			('Thomas', 'Ganyu', 'Train', 'thomas@example.com', 'Computer Science'),
			('John', 'Reynold', 'Smith', 'john@example.com', 'Business'),
			('Adam', 'Bjergsen', 'Jensen', 'deus@example.com', 'Underwater Basket Weaving'),
			('Deku', 'Faker', 'Todoroki', 'yaoi@example.com', 'Fashion'),
			('Bob', 'Hu', 'Builder', 'bobbuilder@example.com', 'Computer Science'),
			('Mario', 'Gura', 'Bro', 'mario@example.com', 'Fast Food'),
			('Lugionald', 'Gawr', 'Brotherino', 'luigi@example.com', 'History')
			";

			if ($conn->query($sql) === TRUE) {
				echo "<p>New record created successfully</p>";
			} else {
				echo "<p>Error: " . $sql . "<br>" . $conn->error ."</p>";
			}
		}
		catch(Throwable $e)
		{
			echo  "<p>Table does not exist</p>";
		}
	}
}

try {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['delete'])){
			// sql to delete a record
			$sql = "DELETE FROM StRec WHERE id=1";

			if ($conn->query($sql) === TRUE) {
				echo "<p>Record deleted successfully</p>";
			} else {
				echo "<p>Error deleting record: " . $conn->error ."</p>";
			}
		}
	}


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['deleteall'])){
			try {
				// sql to delete all record
				$sql = "DROP TABLE StRec";
				if ($conn->query($sql) === TRUE) {
					echo "<p>Record deleted successfully</p>";
				} else {
					echo "<p>Error deleting record: " . $conn->error . "</p>";
				}
			}
			catch(Throwable $e)
			{
				echo  "<p>Table does not exist</p>";
			}
		}
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['print'])){
			$sql = "SELECT id, firstname, middlename, lastname FROM StRec";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo "<table><tr><th>ID</th><th>Name</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row["id"]."</td><td>".$row["firstname"]." ".$row["middlename"]." ".$row["lastname"]."</td></tr>";
				}
				echo "</table><br>";
			} else {
				echo "<p>0 results<br></p>";
			}

			$sql2 = "SELECT id, email, program FROM StRec";
			$result2 = $conn->query($sql2);

			if ($result2->num_rows > 0) {
				echo "<table><tr><th>ID</th><th>Email</th><th>Program</th></tr>";
				// output data of each row
				while($row = $result2->fetch_assoc()) {
					echo "<tr><td>".$row["id"]."</td><td>".$row["email"]."</td><td>".$row["program"]."</td></tr>";
				}
				echo "</table><br>";
			}

			$sql3 = "SELECT firstname, middlename, lastname, program FROM StRec";
			$result3 = $conn->query($sql3);

			if ($result3->num_rows > 0) {
				echo "<table><tr><th>Computer Science Students</th></tr>";
				// output data of each row
				while($row = $result3->fetch_assoc()) {
					if ($row["program"] == "Computer Science") {
						echo "<tr><td>".$row["firstname"]." ".$row["middlename"]." ".$row["lastname"]."</td></tr>";
					}
				}
				echo "</table><br>";
			} 
		}
	}
}
catch(Throwable $e)
{
	echo  "<p>Table does not exist</p>";
}

$conn->close();
?> 



 