<h1 class="tittle"><?php print $data['tittle'] ?></h1>

<?php if (App\App::$session->getUser()): ?>
    <?php if (App\App::$session->getUser()['role'] === 'admin') : ?>
        <section class="product__section">
            <?php foreach ($data['products'] as $product): ?>

                <div class="grid-item">
                    <h2 class="item-name"><?php print $product['name']; ?></h2>
                    <img class="item-img" src="<?php print $product['image']; ?>" alt="">
                    <h2><?php print $product['price'] ?> eur</h2>
                    <form method="POST">
                        <input type="hidden" name="id" value="edit">
                        <button class="btn" name="edit" type="submit">Edit</button>
                    </form>
                    <form method="POST">
                        <input type="hidden" name="id" value="delete">
                        <button class="btn" name="edit" type="submit">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </section>
        <div>
            <form method="POST">
                <input type="hidden" name="id">
                <button class="btn" type="submit">Create</button>
            </form>
        </div>

    <?php else: ?>

        <section class="product__section">
            <?php foreach ($data['products'] as $product): ?>

                <div class="grid-item">
                    <h2 class="item-name"><?php print $product['name']; ?></h2>
                    <img class="item-img" src="<?php print $product['image']; ?>" alt="">
                    <h2><?php print $product['price'] ?> eur</h2>
                    <form method="POST">
                        <input type="hidden" name="id" value="ORDER">
                        <input type="hidden" name="name" value="<?php print $product['name']; ?>">
                        <button type="submit">Order</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </section>

    <?php endif; ?>

<?php else: ?>

    <section class="product__section">

        <?php foreach ($data['products'] as $product): ?>
            <div class="grid-item">
                <h2 class="item-name"><?php print $product['name']; ?></h2>
                <img class="item-img" src="<?php print $product['image']; ?>" alt="">
                <h2><?php print $product['price'] ?> eur</h2>
            </div>
        <?php endforeach; ?>

    </section>
    <form method="POST">
        <input type="hidden" name="id" value="login">
        <button class="btn" name="login" type="submit">Login</button>
    </form>

<?php endif; ?>


