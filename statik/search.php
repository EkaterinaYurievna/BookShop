<?php
$mysqli = false;

function connectDB() {
    global $mysqli;
    $mysqli = new mysqli("127.0.0.1", "root", "", "Shop");
    $mysqli->set_charset("utf8");
    
    // Check if the connection was successful
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }
}

// Обработка запроса поиска
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Запрос к базе данных
    $sql = "SELECT * FROM books WHERE title LIKE '%$searchTerm%'";
    $result = $conn->query($sql);

    // Вывод результатов
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row['id'] . " Название: " . $row['title'] . "<br>";
        }
    } else {
        echo "Книги не найдены.";
    }
}

// Закрытие соединения с базой данных
$conn->close();


?>