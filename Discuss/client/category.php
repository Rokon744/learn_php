<select name="category" id="category">

    <?php
    include("./server/config.php");

    $categories = $conn->prepare("select * from category");
    $categories->execute();
    $categories = $categories->fetchAll();
    print_r($categories[0]);
    foreach ($categories as $item) {
        $id = $item['id'];
        $name = ucfirst($item['name']);
        echo "<option value='$id'>$name</option>";
    }
    ?>

</select>