<?php
    $title = 'Liste des produits';
    ob_start();
?>
    <h1 class="text-3xl font-bold underline d-block">Liste des produits</h1>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <?php foreach($products as $product): ?>
                <div class="lg:w-1/4 md:w-1/2 p-4 w-full">
                    <a class="block relative h-48 rounded overflow-hidden" href="/<?php echo $product->id; ?>">
                        <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="<?php echo $product->image; ?>">
                    </a>
                    <div class="mt-4">
                        <h3 class="text-gray-500 text-xs tracking-widest title-font mb-1"><?php echo $product->category; ?></h3>
                        <h2 class="text-gray-900 title-font text-lg font-medium"><a href="/<?php echo $product->id; ?>"><?php echo $product->title; ?></a></h2>
                        <p class="mt-1"><?php echo $product->price; ?>€</p>
                    </div>
                </div>  
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php
    $content = ob_get_clean();
    include '../src/view/layout.php';
?>
