
<html lang="">
<head>
    <meta charset="UTF-8">
    <title><?php print $data['tittle'] ?></title>
    <?php foreach ( $data['css'] as $path) : ?>
    <link rel="stylesheet" href="<?php print $path; ?>">
    <?php endforeach; ?>
</head>
<body class="index__body">
<header>
    <?php print $data['header'] ?>
</header>
<main>
    <?php print $data['content']; ?>
</main>
</body>
</html>
