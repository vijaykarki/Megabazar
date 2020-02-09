<?php
    require_once("DbController.php");
    
    class SubCategoryController{
        function returnCategory(){
            $crud = new CrudOperation();
            $query = "select category_title,category_id from catagories where parent_id=0";
            $results = $crud->getData($query);
            return $results;
        }

        function insertSubCategory($subCategoryName, $parent_id)
    {
        $crud = new CrudOperation();
        // $query = "select * from catagories";
        // $results = $crud->getData($query);
        // foreach ($results as $result) {
        //     $dbSubCategory[] = $result['category_id'];
        // }
        // if (in_array($subCategoryName, $dbSubCategory) == true) {
        //     header('Location: ./../Resource/View/pages/add-sub-category.php?empMessage=Sub Category already exist!');
        // } else {
            $sql = "INSERT INTO catagories(parent_id,category_title) values('$parent_id','$subCategoryName')";
            $crud->execute($sql);
            // header('Location: ./../../Resource/View/pages/add-sub-category.php?successMessage=category added succesfully');
        
    }
    }
    
?>
