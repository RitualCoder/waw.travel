<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta title=<?= $data['seo']['title'] ?>>
    <meta name="description" content=<?= $data['seo']['description'] ?>>
    <link rel="icon" href="images/favicon.svg" type="image/svg+xml">
    <link href="outputStyles.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kodchasan:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title><?= $data['seo']['title'] ?> - Waw.travel</title>
    
</head>

<body class="relative text-black bg-white z-[0] min-h-screen flex flex-col pb-36 lg:pb-40 h-fit">
    <?php require __DIR__ . '/_header.php'; ?>

    <main class="h-fit">
        <?php require $templatePath; ?>
    </main>

    <?php require __DIR__ . '/_footer.php'; ?>
</body>

</html>