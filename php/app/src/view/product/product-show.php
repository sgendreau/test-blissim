<?php
    $title = $product->title;
    ob_start();
?>
<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="lg:w-4/5 mx-auto flex flex-wrap">
            <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
                <h2 class="text-sm title-font text-gray-500 tracking-widest"><?php echo $product->category ?></h2>
                <h1 class="text-gray-900 text-3xl title-font font-medium mb-4"><?php echo $product->title; ?></h1>
                <p class="leading-relaxed mb-4"><?php echo $product->description; ?></p>
                <div class="flex">
                    <span class="title-font font-medium text-2xl text-gray-900"><?php echo $product->price; ?>€</span>
                    <a class="flex ml-auto text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded" href="/<?php echo $product->id .'/add'; ?>">Ajouter un commentaire</a>
                </div>
            </div>
            <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="<?php echo $product->image; ?>">
        </div>
        <h2 class="text-sm title-font text-gray-500 tracking-widest">Commentaires</h2>
        <?php include '../src/view/comment/comment-list.php' ?>
    </div>
</section>
<?php
    $content = ob_get_clean();
    include '../src/view/layout.php';
?>
