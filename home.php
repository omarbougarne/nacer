<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
        }

        .navbar {
            background-color: #800080;
            padding: 15px;
            text-align: center;
            color: white;
        }

        #productList {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start; /* Change from space-around to flex-start */
    align-items: flex-start;
    margin-top: 50px;
    padding: 20px;
    margin-left: 220px; /* Adjust the margin to create space for the sidebar */
}

.product-item {
    text-align: center;
    margin: 10px;
    padding: 10px;
    border: 1px solid #ddd;
    width: 200px; 
}

.product-item img {
    max-width: 100%;
    height: auto;
    margin-bottom: 10px;
}

.sidebar {
    margin: 0;
    padding: 0;
    width: 200px;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    margin-top: 50px;
    left: 0; /* Set left to 0 to align with the left edge */
}

.sidebar a {
    display: block;
    color: black;
    padding: 16px;
    text-decoration: none;
}

.sidebar a.active {
    background-color: #800080;
    color: white;
}

    </style>
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <h1>Electro</h1>
    </div>
    <div class="sidebar">
    <a class="active" href="home.php?category=graphics_cards" onclick="executeQuery()">Graphics cards</a>
    <a href="home.php?category=arduino" onclick="executeQuery2()">Arduino</a>
    <a href="home.php?category=raspberry_pi" onclick="executeQuery3()">Raspberry Pi</a>
    <a href="home.php?category=out_of_stock">Out of stock </a>
</div>


    <div class="main-content" id="productList">
        <?php 
        session_start();
        include 'connect.php';

        $query="SELECT * FROM produit";
        $statement=$conn->prepare($query);
        $statement->execute();
        $result=$statement->fetchAll();
        if( $result){
            foreach($result as $row){
                ?>
                <div class="product-item">
                    <p><?= $row['ref_prod'] ?></p>
                    <img src="data:image/jpg;base64,<?= base64_encode($row['image']) ?>" alt="Product Image">
                    <p><?= $row['libelle'] ?></p>
                    <p><?= $row['pru'] ?></p>
                    <p><?= $row['qte_min'] ?></p>
                    <p><?= $row['qte_stock'] ?></p>
                </div>
                <?php
            }
        }
        else{
            ?>
            <p>no record found</p>
            <?php
        }
        ?>
    </div>

    <script>
      function executeQuery(){
        <?php $requette = "select * from produit where fk_idCat = 1 "?>
      }
      function executeQuery2(){
        <?php $requette = "select * from produit where fk_idCat = 2 "?>
      }
      function executeQuery3(){
        <?php $requette = "select * from produit where fk_idCat = 3 "?>
      }

    </script>

    <?php 
      $result= $conn-> prepare($requette);
      $result-> execute();

      while($rows = $result->fetch()){

    ?>
    <div class="product-item">
        <p><?= $rows['ref_prod'] ?></p>
        <img src="data:image/jpg;base64,<?= base64_encode($rows['image']) ?>" alt="Product Image">
        <p><?= $rows['libelle'] ?></p>
        <p><?= $rows['pru'] ?></p>
        <p><?= $rows['qte_min'] ?></p>
        <p><?= $rows['qte_stock'] ?></p>
    </div>

<?php
        
      }
?>
</body>
</html>
