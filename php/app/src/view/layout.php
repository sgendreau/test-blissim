<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <header class="text-gray-600 body-font">
            <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
                <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0" href="/">
                    <span class="ml-3 text-xl">Test Blissim Sébastien GENDREAU-COLAVOLPE</span>
                </a>
            </div>
        </header>
        <div class="container mx-auto flex flex-wrap py-2 px-5 flex-col md:flex-row items-center">
            <?php echo $content; ?>
        </div>
    </body>
</html>
