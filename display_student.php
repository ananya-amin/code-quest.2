<!-- display_student.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            <h2>SHRI MADHWA VADIRAJA INSTITUTE OF TECHNOLOGY AND MANAGEMENT</h2>
        </header>

    </body>
</html>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "student";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $user_check_query = "SELECT * FROM users WHERE ";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $student_id = $_POST["student_id"];
        $password = $_POST["password"];

        $sql = "SELECT * FROM proctor WHERE student_id = '$student_id' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                
                echo"<div class='student-dashboard'>";
                echo "<div class='student-details'>";
                echo "<p>USN: {$row["USN"]}</p>";
                echo "<p>Name: {$row["student_name"]}</p>";
                echo "<p>Hobbies: {$row["hobbies"]}</p>";
             

               
                echo "<img src='ashika.jpeg' alt='Student Image'>";

              
                echo "</div>";
                echo "<p>Marks in 2nd PU: {$row["marks_2nd_pu"]}</p>";
                
                echo "<p>Marksheet: <a href='{$row["marksheet_url"]}' target='_blank'>View Marksheet</a></p>";

               
                 echo "<button type='submit'>Logout</button>";

                echo "</div>";

            }
        } else {
            echo "<div class='notification'>Invalid Student ID or Password. Please try again.</div>";
        }
    }


    $conn->close();
    ?>
  

</body>

</html>
