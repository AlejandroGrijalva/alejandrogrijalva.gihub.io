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
                <a href="index.php" class="link checked">
                    <i class="fa-solid fa-house"></i>
                    <p>Home</p>
                </a>
                <a href="shoppinglist.php" class="link">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                    <p>Shopping</p>
                </a>
                <a href="budget.php" class="link">
                    <i class="fa fa-money-check-dollar" aria-hidden="true"></i>
                    <p>Budget</p>
                </a>
                <a class="link">
                    <i class="fa fa-history" aria-hidden="true"></i>
                    <p>Order History</p>
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
        <main class="content"></main>
    </div>
</body>

</html>