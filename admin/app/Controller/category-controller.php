<?php
include_once("DbController.php");

// for add user
if (isset($_POST['submit'])) {
    if (empty($_POST['categoryname'])) {
        header('Location: ./../../Resource/View/pages/addcategory.php?empMessage=Please input Category name!');
    } else {
        $crud = new CrudOperation();
        $categoryname = $_POST['categoryname'];
        $query = "select * from catagories";
        $results = $crud->getData($query);
        foreach ($results as $result) {
            $dbcategory[] = $result['category_title'];
        }
        // var_dump($dbcategory);
        if (in_array($categoryname, $dbcategory) == true) {
            header('Location: ./../../Resource/View/pages/addcategory.php?empMessage=Category already exist!');
        } else {
            $sql = "INSERT INTO catagories(parent_id, category_title) values(0, '$categoryname')";
            $crud->execute($sql);
            header('Location: ./../../Resource/View/pages/addcategory.php?successMessage=category added succesfully');
        }
        // var_dump($sql);
    }
}

class RemoveCategories{
    function returnCategory(){
        $crud = new CrudOperation();
        $query = "select category_title from category";
        $results = $crud->getData($query);
        return $results;
    }

    function removeCategory($id){
        $crud = new CrudOperation();
        $crud -> deleteCategory($id);
    }
}

?>