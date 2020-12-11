<h1 class="tittle"><?php print $data['tittle'] ?></h1>

<section class="grid-container">

    <?php foreach ($data['products'] as $product) : ?>

        <div class="grid-item">
            <img class="item-img" src="<?php print $product['image']; ?>" alt="">
            <h4 class="item_text" ><?php print $product['name']; ?></h4>
            <p  class="item_text"><?php print $product['price']; ?> Eur</p>
            <?php print $product['order']; ?>
            <?php print $product['link']; ?>
            <?php print $product['delete']; ?>
        </div>

    <?php endforeach; ?>

</section>

<?php print $data['redirect']; ?>