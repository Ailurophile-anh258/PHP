<?php
CREATE TABLE IF NOT EXISTS 'infomation' (
`id` int(11) NOT NULL AUTO_INCREMENT,
  `full_names` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `contact_no` varchar(75) NOT NULL,
  `email` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)

) ENGINE = InnoDB  DEFAULT CHARSET = latin1 AUTO_INCREMENT = 5 ;

INSERT INTO 'information' (
    `id`,
    `full_names`,
    `gender`,
    `contact_no`,
    `email`,
    `city`,
    `country`)

VALUES
(1, 'Zeus', 'Male', '111', 'zeus@olympus.mt.co', 'Agos', 'Greece'),
(2, 'Anthena', 'Female', '123', 'anthena@olympus.mt.co', 'Athens', 'Greece'),
(3, 'Jupiter', 'Male', '783', 'jupiter@planet.pt.co', 'Rome', 'Italy'),
(4, 'Venus', 'Female', '987', 'venu @planet.pt.co', 'Mars', 'Italy')

<?php

$dbh = mysqli_connect('localhost', 'root', '', 'melodyj');
// Kết nối tới MySQL server

if (!$dbh)
    die("Unable to connect to MySQL: " . mysqli_connect_error());
// Nếu kết nối thất bại thì đưa ra thông báo lỗi

$sql_stmt = "SELECT * FROM my_contacts";
// Câu lệnh select

$result = mysqli_query($dbh, $sql_stmt);
// Thực thi câu lệnh SQL

if (!$result)
    die("Database access failed: " . mysqli_connect_error());
// Thông báo lỗi nếu thực thi thất bại

$rows = mysqli_num_rows($result);
// Lấy số hàng trả về

if ($rows) {
    while ($row = mysqli_fetch_array($result)) {
        echo 'ID: ' . $row['id'] . '<br>';
        echo 'Full Names: ' . $row['full_names'] . '<br>';
        echo 'Gender: ' . $row['gender'] . '<br>';
        echo 'Contact No: ' . $row['contact_no'] . '<br>';
        echo 'Email: ' . $row['email'] . '<br>';
        echo 'City: ' . $row['city'] . '<br>';
        echo 'Country: ' . $row['country'] . '<br><br>';
    }
}

mysqli_close($dbh); // Đóng kết nối CSDL

$dbh = mysqli_connect('localhost', 'root', 'melody'); 
    // Kết nối với MySQL Server

    if (!$dbh)     
    die("Unable to connect to MySQL: " . mysqli_error()); 
    // Thông báo lỗi nếu kết nối thất bại 
    
    if (!mysqli_select_db($dbh, 'my_personal_contacts'))     
    die("Unable to select database: " . mysql_error()); 
    // Thông báo lỗi nếu chọn CSDL thất bại
    
    $sql_stmt = "INSERT INTO `my_contacts` (`full_names`,`gender`,`contact_no`,`email`,`city`,`country`)"; 
    $sql_stmt .= "VALUES('Poseidon','Mail','541',' poseidon@sea.oc ','Troy','Ithaca')"; 
    
    $result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
    
    if (!$result) {
        die("Adding record failed: " . mysqli_error()); 
        // Thông báo lỗi nếu thực thi câu lệnh thất bại
    } else {
        echo "Poseidon has been successfully added to your contacts list";
    }

    mysqli_close($dbh); // Đóng kết nối CSDL 

    $dbh = mysqli_connect('localhost', 'root', 'melody'); 
    // Kết nối tới MySQL Server
    
    if (!$dbh)    
    die("Unable to connect to MySQL: " . mysqli_error()); 
    // Thông báo lỗi nếu kết nối thất bại 
    
    if (!mysqli_select_db($dbh,'my_personal_contacts'))     
    die("Unable to select database: " . mysql_error()); 
    // Thông báo lỗi nếu chọn CSDL thất bại
    
    $sql_stmt = "UPDATE `my_contacts` SET `contact_no` = '785',`email` = 'poseidon@ocean.oc'";
    $sql_stmt .= "WHERE `id` = 5";
    
    $result = mysqli_query($dbh,$sql_stmt);
    // Thực thi câu lệnh SQL

    if (!$result) {
        die("Deleting record failed: " . mysqli_error());
        // Thông báo lỗi nếu thực thi thất bại
    } else {
        echo "ID number 5 has been successfully updated";
    }
    
    mysqli_close($dbh); //close the database connection

    $dbh = mysqli_connect('localhost', 'root', 'melody'); 
    // Kết nối với MySQL Server
    
    if (!$dbh)     
    die("Unable to connect to MySQL: " . mysqli_error()); 
    // Thông báo lỗi nếu kết nối thất bại
    
    if (!mysqli_select_db($dbh,'my_personal_contacts'))     
    die("Unable to select database: " . mysqli_error()); 
    // Thông báo lỗi nếu chọn CSDL thất bại
    
    $id = 4; 
    // ID của Venus trong CSQL
    
    $sql_stmt = "DELETE FROM `my_contacts` WHERE `id` = $id"; 
    // Câu lệnh SQL Delete
    
    $result = mysqli_query($dbh,$sql_stmt); 
    // Thực thi câu lệnh SQL
    
    if (!$result) {
        die("Deleting record failed: " . mysqli_error());
        // Thông báo lỗi nếu thực thi thất bại 
    } else {
        echo "ID number $id has been successfully deleted";
    }
    
    mysqli_close($dbh); // Đóng kết nối CSDL
 //PDO
 <?php

$dbh = mysqli_connect('localhost', 'root', '', 'melodyj');
// Kết nối tới MySQL server

if (!$dbh)
    die("Unable to connect to MySQL: " . mysqli_connect_error());
// Nếu kết nối thất bại thì đưa ra thông báo lỗi
// Thêm dữ liệu
$sql = "INSERT INTO your_table (column1, column2) VALUES (:value1, :value2)";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':value1', $value1);
$stmt->bindParam(':value2', $value2);

$value1 = "John Doe";
$value2 = "johndoe@example.com";

$stmt->execute();
echo "Thêm dữ liệu thành công";

//Cập nhật dữ liệu
$sql = "UPDATE your_table SET column1 = :new_value WHERE id = :id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':new_value', $new_value);
$stmt->bindParam(':id', $id);

$new_value = "New Value";
$id = 1;

$stmt->execute();
echo "Cập nhật dữ liệu thành công";

// Xóa dữ liệu
$sql = "DELETE FROM your_table WHERE id = :id";
$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $id);

$id = 1;

$stmt->execute();
echo "Xóa dữ liệu thành công";

// Hiển thị dữ liệu 
$sql = "SELECT * FROM your_table";
$stmt = $conn->prepare($sql);
$stmt->execute();

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>"
