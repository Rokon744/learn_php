<div class="container mt-20">
    <h1 class="text-5xl font-bold mb-10">Ask A Question</h1>
    <form action="./server/requests.php" method="post">
        <div class="flex flex-col mb-4">
            <label for="title">Title</label>
            <input type="text" placeholder="Enter Question" name="title">
        </div>
        <div class="flex flex-col mb-4">
            <label for="description">Description</label>
            <textarea type="password" placeholder="description" name="description"></textarea>
        </div>
        <div class="flex flex-col mb-4">
            <label for="category">Category</label>
            <?php include("./client/category.php") ?>
        </div>
        <div class="mb-4">
            <button type="submit" name="ask" class="px-6 py-2 rounded-sm bg-blue-800 text-white">Ask Question</button>
        </div>
    </form>
</div>