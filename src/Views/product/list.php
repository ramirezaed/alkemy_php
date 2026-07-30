<?php

/** @var \User $user */
/** @var \Cart $cart */
/** @var \Product[] $products */

//vista product/list
//solo se muestra lo que viene del controlador
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Tienda PHP - Listado de productos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 2rem;
            background: #f5f5f5;
        }

        h1 {
            color: #222;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        th,
        td {
            padding: 0.6rem 1rem;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #333;
            color: #fff;
        }

        .sin-stock {
            color: #b00020;
            font-weight: bold;
        }

        .resumen {
            margin-top: 2rem;
            background: #fff;
            padding: 1rem 1.5rem;
            border-radius: 6px;
        }
    </style>
</head>

<body>
    <h1>Catálogo de productos</h1>
    <p>Usuario actual: <strong><?= htmlspecialchars($user->getName()) ?></strong> (<?= htmlspecialchars($user->getRole()) ?>)</p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Precio</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product->getId() ?></td>
                    <td><?= htmlspecialchars($product->getName()) ?></td>
                    <td><?= htmlspecialchars($product->getCategory()->getName()) ?></td>
                    <td>$<?= number_format($product->getPrice(), 2) ?></td>
                    <td>
                        <?php if ($product->getStock() > 0): ?>
                            <?= $product->getStock() ?>
                        <?php else: ?>
                            <span class="sin-stock">Sin stock</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="resumen">
        <h2>Carrito de ejemplo</h2>
        <ul>
            <?php foreach ($cart->getItems() as $item): ?>
                <li>
                    <?= htmlspecialchars($item['product']->getName()) ?>
                    x <?= $item['amount'] ?>
                    = $<?= number_format($item['product']->calculateSubtotal($item['amount']), 2) ?>
                </li>
            <?php endforeach; ?>
        </ul>
        <p><strong>Subtotal: $<?= number_format($cart->calculateSubtotal(), 2) ?></strong></p>
    </div>
</body>

</html>