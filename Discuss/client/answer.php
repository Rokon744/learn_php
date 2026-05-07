<div class="pl-16">
    <h3 class="text-3xl font-bold">Answer:</h3>
    <?php 
        $question_id = $_GET['q-id'];
        $ans = $conn->prepare("select * from answer where question_id=$question_id");
        $ans->execute();
        $ans = $ans->fetchAll();

        foreach($ans as $an){
            $an = $an['answer'];
            echo 
            "<div>
                <p class='text-blue-500 ml-4'>$an</p>
            </div>";
        }
    ?>
</div>