<section class="text-gray-600 body-font overflow-hidden">
    <div class="container px-5 py-24 mx-auto">
        <div class="-my-8 divide-y-2 divide-gray-100">
            <?php foreach($comments as $comment): ?>
            <div class="py-8 flex flex-wrap md:flex-nowrap">
                <div class="md:w-64 md:mb-0 mb-6 flex-shrink-0 flex flex-col">
                    <span class="font-semibold title-font text-gray-700"><?php echo $comment['username']; ?></span>
                    <a class="text-indigo-500 inline-flex items-center mt-4" href="/<?php echo $product->id .'/edit/'.$comment['id']; ?>">Editer</a>
                    <a class="text-indigo-500 inline-flex items-center mt-4" href="/<?php echo $product->id .'/delete/'.$comment['id']; ?>">Supprimer</a>
                </div>
                <div class="md:flex-grow">
                    <p class="leading-relaxed"><?php echo $comment['content']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
