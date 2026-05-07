<div class="container mt-20">
    <div class="md:flex">
        <div class="md:flex-1">
            <h3 class="text-5xl font-bold mb-10">Questions</h3>
            <ul class="question-list">
                <?php
                include("./server/config.php");

                $query = "";
                if (isset($_GET['cat-id'])) {
                    $cat_id = $_GET['cat-id'];
                    $query = "select * from questions where category_id=$cat_id";
                } elseif (isset($_GET['my-question'])) {
                    if ($_SESSION['user']['username']) {
                        $user_id = $_SESSION['user']['user_id'];
                        $query = "select * from questions where user_id=$user_id";
                    } else {
                        echo "<h3 class='text-2xl md:text-3xl font-bold uppercase'>Please Login to get your questions</h3>";
                    }
                } elseif (isset($_GET['latest-question'])) {
                    $query = "select * from questions order by id desc";
                } elseif (isset($_GET['search'])) {
                    $search = $_GET['search'];
                    $query = "select * from questions where title like '%$search%'";
                } else {
                    $query = "select * from questions";
                }
                $questions = $conn->prepare($query);
                $questions->execute();
                $questions = $questions->fetchAll();

                foreach ($questions as $question) {
                    $title = $question['title'];
                    $id = $question['id'];
                    echo "<li class='flex justify-between'>" .
                    "<a href='?q-id=$id'>$title</a>";
                    echo $user_id? "<a href='./server/requests.php?delete=$id' class='px-6 py-2 rounded-sm bg-red-800 text-white' >Delete</a>":"";
                    "</li>";
                }
                ?>
            </ul>
        </div>

        <div class="md:w-4/12">
            <h3 class="text-5xl font-bold mb-10">Categories</h3>
            <ul class="question-list">
                <?php
                $categories = $conn->prepare("select * from category");
                $categories->execute();
                $categories = $categories->fetchAll();

                foreach ($categories as $category) {
                    $name = $category['name'];
                    $id = $category['id'];
                    echo "<li><a href='?cat-id=$id'>$name</a></li>";
                }

                ?>
            </ul>
        </div>
    </div>
</div>