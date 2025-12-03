<?php
session_start();
$usado = 0;
if (isset($_SESSION['budget'])) {
    foreach ($_SESSION['budget'] as $item) {
        $usado += $item['price'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <link rel="stylesheet" href="css/styles.css" />
    <link rel="stylesheet" href="css/mediaquerys.css" />
    <title>Document</title>
</head>

<body>
    <div class="container">
        <button class="toggleSidebar">
            <i class="fa-solid fa-bars"></i>
        </button>
        <aside class="sidebar">
            <!-- Top sidebar -->
            <div class="topSidebar">
                <div class="userClient">
                    <i class="fa-solid fa-user userSidebar"></i>
                    <div class="account">
                        <h3 class="nameClient">Joel</h3>
                        <p class="tipeAccount">Premium</p>
                    </div>
                    <!--End account-->
                </div>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <!-- End top sidebar -->
            <!-- Menu sidebar -->
            <div class="mainSidebar">
                <a href="index.php" class="link">
                    <i class="fa-solid fa-house"></i>
                    <p>Home</p>
                </a>
                <a href="shoppinglist.php" class="link">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <p>List Shopping</p>
                </a>

                <a href="budget.php" class="link checked">
                    <i class="fa fa-money-check-dollar" aria-hidden="true"></i>
                    <p>Budget</p>
                </a>
                <a class="link">
                    <i class="fa fa-history" aria-hidden="true"></i>
                    <p>Shopping History</p>
                </a>
            </div>
            <!-- End menu sidebar -->
            <!-- Bottom sidebar -->
            <div class="bottomSidebar">
                <div class="link">
                    <i class="fa-solid fa-gear"></i>
                    <p>Settings</p>
                </div>
                <div class="link">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    <p>Log Out</p>
                </div>
            </div>
            <!-- End bottom sidebar -->
        </aside>
        <!-- End sidebar -->

        <main class="content">
            <div class="centralBar">
                <div class="block">
                    <h3>Budget:</h3>
                    <input id="usado" type="number" style="color:black">
                </div>
                <div class="block">
                    <h3>Used:</h3>
                    <p>$<?= $usado ?></p>
                </div>
                <div class="block">
                    <h3>Available:</h3>
                    <p id="available"></p>
                </div>
            </div>
            <div class="itemsShop">
                <?php foreach ($_SESSION['budget'] as $item): ?>
                <div class="item">
                    <div class="left">
                        <p class="typeItem">
                            <?= $item["category_name"] ?> <span class="nameItem">/ <?= $item["name"] ?></span>
                        </p>
                        <div>
                            <p class="quantityItem">Quantity: 1</p>
                            <p class="priceItem">$<?= $item["price"] ?></p>
                            <a href="remove_from_budget.php?id=<?= $item['id'] ?>"><i
                                    class="fa-solid fa-trash delete"></i></a>

                        </div>
                    </div>
                    <div class="rigth">
                        <img src="<?= $item["image_url"] ?>" alt="" />
                    </div>
                </div>
                <?php endforeach; ?>

        </main>
    </div>
</body>
<script src="js/scripts.js"></script>

<script>
const totalOriginal = <?= $usado ?>;

document.getElementById("usado").addEventListener("input", function() {
    let discount = parseFloat(this.value) || 0;

    let final = discount - totalOriginal;
    if (final < 0) final = 0;

    document.getElementById("available").innerText = final.toFixed(2);
});
</script>

</html>