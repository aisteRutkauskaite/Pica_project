
<h1 class="tittle"><?php print $data['tittle'] ?></h1>
<section class="product__section">
    <?php foreach ($data['products'] as $product) : ?>
        <div class="grid-item">
            <h2 class="item-name"><?php print $product['name']; ?></h2>
            <img class="item-img" src="<?php print $product['image']; ?>" alt="">
            <h2><?php print $product['price'] ?> eur</h2>

        </div>
    <?php endforeach; ?>
</section>

