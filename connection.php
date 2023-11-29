<?php
    $name = $_POST['name'];
    $age = $_POST['age'];
    $address = $_POST['address'];
    $earning = $_POST['earning'];

    //databse connection details
    $host = "localhost";
    $username = "root";
    $password = "";
    $db_name = "agu";

    //the database connection 
    $conn = new mysqli('localhost', 'root', '', 'agu');
    if($conn->connect_error){
        die("Connection Failed : " .$conn->connect_error);
    }
    else
    {
        $stmt = $conn->prepare("insert into customer(name, age, address, earning) values (?, ?, ?, ?)");
        $stmt->bind_param("sisi", $name, $age, $address, $earning);
        $stmt->execute();
        echo "Congrats $name, your Registration was Successful!...";
        $stmt->close();
        $conn->close();
    }
    if(empty($name) && empty($age) && empty($address) && empty($earning)) {
        echo "<script>
        window.location.href = 'agu.html';
        alert('Input fields are empty!');
        </script>";
    
    }if(empty($name) || empty($age) || empty($address) || empty($earning)) {
        echo "<script>
        window.location.href = 'agu.html';
        alert('Please input blank fields!');
        </script>";

    }else{
        echo "<script>
        window.location.href = 'agu.html';
        alert('Congrats $name, your Registration was Successful!...');
        </script>";
    }
?>