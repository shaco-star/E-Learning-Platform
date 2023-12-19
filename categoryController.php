<?php

// require 'database.php';

class CategoryController extends Database
{


    public function getAllCategories()
    {
        $conn = $this->connect();
        $sql = 'SELECT * FROM categories';
        $result = $conn->query($sql);

        if (!$result) {
            http_response_code(500);
            echo json_encode(['error' => 'Error retrieving categories']);
            exit();
        }

        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }

        $conn->close();

        http_response_code(200);
        header('Content-Type: application/json');
        echo json_encode($categories);
    }

    public function addCategory($name, $img_link, $coursesNumbers, $description)
    {
        $conn = $this->connect();
        $sql = 'INSERT INTO categories (name, img_link, coursesNumbers, description) VALUES (?, ?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $name, $img_link, $coursesNumbers, $description);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
            exit();
        }

        echo "Category added successfully!";
        $stmt->close();
        $conn->close();
    }

    public function deleteCategory($categoryId)
    {
        $conn = $this->connect();
        $sql = 'DELETE FROM categories WHERE categoryId = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $categoryId);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
            exit();
        }

        echo "Category deleted successfully!";
        $stmt->close();
        $conn->close();
    }

    public function updateCategory($categoryId, $name = null, $img_link = null, $coursesNumbers = null, $description = null)
    {
        $conn = $this->connect();


        $sql = 'UPDATE categories SET name = ?, img_link = ?, coursesNumbers = ?, description = ? WHERE categoryId = ?';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisi", $name, $img_link, $coursesNumbers, $description, $categoryId);

        if (!$stmt->execute()) {
            echo "Error: " . $stmt->error;
            exit();
        }

        echo "Category updated successfully!";
        $stmt->close();
        $conn->close();
    }
}




$categoryController = new CategoryController();
$categoryController-> getAllCategories();

?>