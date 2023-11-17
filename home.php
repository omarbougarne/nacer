<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="navbar">
        <h1>Electro</h1>
    </div>
    <div class="sidebar">
  <a class="active" href="#home">Graphics cards</a>
  <a href="#news">Ardiuno</a>
  <a href="#contact">Rasberrypy</a>
  <a href="#contact">Out of stock</a>
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
                            <p><?= $row['ref_prod'] ?></p>
                            <img src="data:image/jpg;base64,<?= base64_encode($row['image']) ?>" alt="Product Image">
                            <p><?= $row['libelle'] ?></p>
                            <p><?= $row['pru'] ?></p>
                            <p><?= $row['qte_min'] ?></p>
                            <p><?= $row['qte_stock'] ?></p>
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


    </div>
</div>
</body>
</html>