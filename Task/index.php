<?php

use App\Database\Models\Product;

$title = 'Mobile Shop';
include_once 'Layouts/header.php';
define('Active' , 1);
$product = new Product;
$products = $product->setStatus(Active)->read()->fetch_all(MYSQLI_ASSOC);

?>
<div class="container">
    <div class="row">

        <div class="col-12 ">
            <h2 class="mt-3 text-danger"><?= $title ?></h2>
        </div>

        <br>
        <div class="products">
            <?php
          foreach($products as $product){
       ?>
            <div class="col-3 product">
                <form action="index.php?page=<?=$product['id']?>" method="post">
                    <h4><?= $product['name'] ?></h4>
                    <img src="assets/Images/<?= $product['image'] ?>" alt="">

                    <div class="product_detail">
                        <h5> $<?= $product['price'] ?></h5>
                        <input type="number" name="quantity" id="" value="<?=$_POST['quantity']['id'] ?? 1?>">
                        <input name="addCart" class="btn btn-primary" type="submit" value="Add To Cart">
                    </div>

                </form>
            </div>
            <?php } ?>
        </div>

    </div>

    <?php

  if(isset($_GET['page'])){
    echo '<table border="1" cellspacing="0">
    <tr>
      <th width=250>Name</th>
      <th width=80>Amount</th>
      <th width=100>Unit price</th>
      <th width=100>Total price</th>
    </tr>';

    $id = $_GET['page']-1;
    $name       = $products[$id]['name'];
    $price      = $products[$id]['price'];
    $quantity   = $_POST['quantity'];
    $totalPrice = ($price) * ($quantity);
    echo ("<tr>");
		echo ("<td>$name</td>");
		echo ("<td class='text-center'>$quantity</td>");
		echo ("<td class='text-right'>$$price</td>");
		echo ("<td class='text-right'>$$totalPrice</td>");
		echo ("</tr>");
  }
  ?>
</div>
<?php
  include_once('Layouts/footer.php');

  ?>