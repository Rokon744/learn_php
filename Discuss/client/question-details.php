<div class="container mt-20">
    <div class="md:flex gap-5">
        <div class="md:flex-1">
            <h3 class="text-5xl font-bold mb-10">Question</h3>
            <?php
            include("./server/config.php");
            $id = $_GET['q-id'];
            $ques = $conn->prepare("select * from questions where id=$id");
            $ques->execute();
            $ques = $ques->fetch();

            $cat_id = $ques['category_id'];

            echo "<h3 class='text-3xl font-medium my-3 text-blue-700'>$ques[title]</h3>
            <p class='mb-3'>$ques[description]</p>
            ";
            ?>

            <?php
            include("answer.php")
            ?>

            <form action="./server/requests.php" method="post">
                <input type="hidden" name="question_id" value="<?php echo $_GET['q-id'] ?>">
                <textarea class="p-3 my-2 w-full" name="answer" id="" placeholder="Write your answer" required></textarea><br>
                <button class="px-6 py-2 rounded-sm bg-blue-800 text-white" name="addans">Submit Your Answer</button>
            </form>
        </div>
        <div class="md:w-4/12">
            <ul class="question-list">
                <?php
                if (isset($_GET['q-id'])) {

                    $cat_name = $conn->prepare("select name from category where id=$cat_id");
                    $cat_name->execute();
                    $cat_name = $cat_name->fetch();
                    $cat_name = $cat_name['name'];
                    echo "<h3 class='text-2xl md:text-4xl font-bold uppercase'>$cat_name</h3>";

                    $ques = $conn->prepare("select * from questions where category_id=$cat_id and id!=$id");
                    $ques->execute();
                    $questions = $ques->fetchAll();

                    foreach ($questions as $question) {
                        $title = $question['title'];
                        $id = $question['id'];
                        echo "<li><a href='?q-id=$id'>$title</a></li>";
                    }
                }
                ?>
            </ul>
        </div>
    </div>

</div>