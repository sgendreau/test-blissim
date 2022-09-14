<?php
    $title = $product->title . " | Commentaire";

    $commentId = $comment->id ?? null;
    $actionForm = '/'.$product->id.'/';
    $disabledUsername = '';
    if($commentId) {
        $actionForm .= 'edit/'.$commentId;
        $disabledUsername = 'disabled="disabled"';
    } else {
        $actionForm .= 'add';
    }
    ob_start();
?>
<section class="text-gray-600 body-font relative mx-auto">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-12">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"><?php echo $product->title ?></h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Vous pouvez ajouter un commentaire pour le produit <?php echo $product->title ?></p>
        </div>
        <div class="lg:w-1/2 md:w-2/3 mx-auto">
            <form id="formAddComment" method="POST" action="<?php echo $actionForm; ?>" class="flex flex-wrap -m-2">
                <div class="p-2 w-1/2">
                    <div class="relative">
                        <label for="name" class="leading-7 text-sm text-gray-600">Votre nom</label>
                        <input type="text" name="username" id="username" required <?php echo $disabledUsername; ?> value="<?php echo $comment->username ?? ''; ?>" class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
                    </div>
                </div>
                <div class="p-2 w-full">
                    <div class="relative">
                        <label for="message" class="leading-7 text-sm text-gray-600">Commentaire</label>
                        <textarea name="content" id="content" required class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"><?php echo $comment->content ?? ''; ?></textarea>
                    </div>
                </div>
                <div class="p-2 w-1/2">
                    <a href="/<?php echo $product->id; ?>" class="inline-flex items-center mx-auto text-white bg-gray-300 border-0 py-2 px-8 focus:outline-none hover:bg-gray-500 rounded text-lg">Annuler</a>
                </div>
                <div class="p-2 w-1/2">
                    <button type="submit" class="flex mx-auto text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Valider</button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
include '../src/view/layout.php';
?>
