<html>
  <head>
    <title>your_domain website</title>
  </head>
  <body>
    <h1>Hello World!</h1>

    <p>This is the landing page of <strong>your_domain</strong>.</p>
  </body>
</html>

<?php
$user = "comisario";
$password = "F813BD3EED";
$database = "comisaria";
$table = "payments";

try {
  $db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);
  echo "<h2>TODO</h2><ol>";
  foreach($db->query("SELECT * FROM $table") as $row) {
	  echo "<li>" ."$" .$row['ammount'] ."-". $row['year'] .$row .  "</li>";
	  print_r($row);
  }
  echo "</ol>";
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
