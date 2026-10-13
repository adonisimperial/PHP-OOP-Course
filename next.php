
<?php
abstract class CheckoutCalculator
{
    abstract public function calculateTotal();
}

class Checkout extends CheckoutCalculator
{
    private $customer_name;
    private $product_name;
    private $price;
    private $quantity;

    public function __construct($customer_name, $product_name, $price, $quantity)
    {
        $this->customer_name = $customer_name;
        $this->product_name = $product_name;
        $this->price = $price;
        $this->quantity = $quantity;
    }

    public function getCustomerName()
    {
        return $this->customer_name;
    }

    public function getProductName()
    {
        return $this->product_name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function calculateTotal()
    {
        return $this->price * $this->quantity;
    }
}

class MemberCheckout extends Checkout
{
    public function calculateTotal()
    {
        return parent::calculateTotal() * 0.80;
    }
}

$error = '';
$checkout = null;
$member_checkout = null;
$member_discount = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_name = trim($_POST['customer_name'] ?? '');
    $product_name = trim($_POST['product_name'] ?? '');
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
    $member_discount = isset($_POST['member_discount']);

    if (
        $customer_name === '' ||
        $product_name === '' ||
        $price === false || $price === null || $price <= 0 ||
        $quantity === false || $quantity === null || $quantity < 1
    ) {
        $error = 'Please enter a valid customer name, product name, price, and quantity.';
    } else {
        $checkout = new Checkout(
            $customer_name,
            $product_name,
            $price,
            $quantity
        );

        if ($member_discount) {
            $member_checkout = new MemberCheckout(
                $customer_name,
                $product_name,
                $price,
                $quantity
            );
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body style="margin: 50px;">
    <h1>ShopSmart – E-Commerce Checkout System</h1>

    <h2>Checkout Form</h2>

    <form action="index.php" method="POST">
        <label for="customer_name">Customer Name:</label>
        <input type="text" id="customer_name" name="customer_name"
            value="<?= htmlspecialchars($_POST['customer_name'] ?? '') ?>" required>
        <br><br>

        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name"
            value="<?= htmlspecialchars($_POST['product_name'] ?? '') ?>" required>
        <br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0.01" step="0.01"
            value="<?= htmlspecialchars($_POST['price'] ?? '') ?>" required>
        <br><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1" step="1"
            value="<?= htmlspecialchars($_POST['quantity'] ?? '') ?>" required>
        <br><br>

        <input type="checkbox" id="member_discount" name="member_discount"
            <?= $member_discount ? 'checked' : '' ?>>
        <label for="member_discount">Apply 20% Member Discount</label>
        <br><br>

        <button type="submit">Place Order</button>
    </form>

    <?php if ($error !== ''): ?>
        <p style="color: red;">
            <?= htmlspecialchars($error) ?>
        </p>
    <?php endif; ?>

    <?php if ($checkout !== null): ?>
        <hr>

        <h2>Customer Shopping Receipt</h2>

        <p>
            <strong>Customer Name:</strong>
            <?= htmlspecialchars($checkout->getCustomerName()) ?>
        </p>

        <p>
            <strong>Product Name:</strong>
            <?= htmlspecialchars($checkout->getProductName()) ?>
        </p>

        <p>
            <strong>Price:</strong>
            ₱<?= number_format($checkout->getPrice(), 2) ?>
        </p>

        <p>
            <strong>Quantity:</strong>
            <?= $checkout->getQuantity() ?>
        </p>

        <hr>

        <h3>Order Summary</h3>

        <ul>
            <li>
                Original Subtotal:
                ₱<?= number_format($checkout->calculateTotal(), 2) ?>
            </li>

            <?php if ($member_checkout !== null): ?>
                <li>Member Discount: 20%</li>
                <li>
                    Discount Amount:
                    ₱<?= number_format(
                        $checkout->calculateTotal() -
                        $member_checkout->calculateTotal(),
                        2
                    ) ?>
                </li>
                <li>
                    <strong>
                        Grand Total:
                        ₱<?= number_format($member_checkout->calculateTotal(), 2) ?>
                    </strong>
                </li>
            <?php else: ?>
                <li>Member Discount: None</li>
                <li>
                    <strong>
                        Grand Total:
                        ₱<?= number_format($checkout->calculateTotal(), 2) ?>
                    </strong>
                </li>
            <?php endif; ?>
        </ul>

        <hr>
        <p>Thank you for shopping with ShopSmart!</p>
    <?php endif; ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <!-- OR 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
    -->
</body>
</html>
