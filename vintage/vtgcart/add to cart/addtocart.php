<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="addtocart.css">
    <script src="https://kit.fontawesome.com/92d70a2fd8.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="header">
    <p class="logo">LOGO</p>
    <div class="cart"><i class="fa-solid fa-cart-shopping"></i><p id="count">0</p></div>
</div>
<div class="container">
    <div id="root">
        <?php
        // Database connection
        $servername = "localhost";
        $username = "your_username";
        $password = "your_password";
        $dbname = "vintage";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $conn->prepare("SELECT * FROM products");
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($products as $product) {
                $image = $product['image'];
                $title = $product['name'];
                $price = $product['price'];
                echo "<div class='box'>
                    <div class='img-box'>
                        <img class='images' src='$image'></img>
                    </div>
                    <div class='bottom'>
                        <p>$title</p>
                        <h2>$ $price.00</h2>
                        <button onclick='addtocart($product[id])'>Add to cart</button>
                    </div>
                </div>";
            }
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>
    </div>
    <div class="sidebar">
        <div class="head"><p>My Cart</p></div>
        <div id="cartItem">Your cart is empty</div>
        <div class="foot">
            <h3>Total</h3>
            <h2 id="total">$ 0.00</h2>
        </div>
    </div>
</div>
<script src="addtocart.js"></script>
<script>
    const product = <?php echo json_encode($products); ?>;
    let cart = [];
    let i = 0;

    function addtocart(id) {
        const selectedProduct = product.find(item => item.id === id);
        cart.push(selectedProduct);
        displaycart();
    }

    function delElement(index) {
        cart.splice(index, 1);
        displaycart();
    }

    function displaycart() {
        let total = 0;
        document.getElementById("count").innerHTML = cart.length;
        if (cart.length === 0) {
            document.getElementById('cartItem').innerHTML = "Your cart is empty";
            document.getElementById("total").innerHTML = "$ " + total.toFixed(2);
        } else {
            document.getElementById("cartItem").innerHTML = cart.map((item, index) => {
                const {image, name, price} = item;
                total += parseFloat(price);
                document.getElementById("total").innerHTML = "$ " + total.toFixed(2);
                return (
                    `<div class='cart-item'>
                        <div class='row-img'>
                            <img class='rowimg' src='${image}'>
                        </div>
                        <p style='font-size:12px;'>${name}</p>
                        <h2 style='font-size: 15px;'>$ ${price}.00</h2>
                        <i class='fa-solid fa-trash' onclick='delElement(${index})'></i>
                    </div>`
                );
            }).join('');
        }
    }
</script>
</body>
</html>
