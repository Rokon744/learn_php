<?php
session_start();
include("./config.php");

if (isset($_POST['signup'])) {
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("INSERT INTO users (id, name, email, password, address) VALUES(NULL, '$name', '$email', '$password', '$address')");
    $result = $user->execute();

    if ($result) {
        $_SESSION['user'] = ["username" => $name, "email" => $email, "user_id" => $conn->lastInsertId()];
        header("location: /Discuss");
    } else {
        echo "Error occurred";
    }
} elseif (isset($_POST['login'])) {
    echo $email = $_POST['useremail'];
    echo $password = $_POST['userpassword'];
    $result = $conn->prepare("select * from users where email='$email' and password='$password'");
    $result->execute();
    $user = $result->fetch();

    echo "<pre>";
    print_r($user['id']);
    echo "</pre>";
    if ($user) {
        $_SESSION['user'] = ['username' => $user['name'], 'email' => $email, "user_id" => $user['id']];
        header("location: /Discuss");
    } else {
        echo "user not found";
    }
} elseif (isset($_GET['logout'])) {
    session_unset();
    header("location: /Discuss");
} elseif (isset($_POST['ask'])) {
    print_r($_POST);
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $addQuestion = $conn->prepare("INSERT INTO questions(id, title, description, category_id, user_id)
    Values(NULL, '$title', '$desc', '$category_id', '$user_id')");
    $result = $addQuestion->execute();

    if ($result) {
        header("location: /Discuss");
    } else {
        echo "Question not added";
    }
} elseif (isset($_POST['addans'])) {
    print_r($_POST);
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    echo $user_id = $_SESSION['user']['user_id'];

    $ans = $conn->prepare("insert into answer(id, answer, question_id, user_id)
        VALUES(null, '$answer', '$question_id', '$user_id')
    ");
    $res = $ans->execute();
    if ($res) {
        header("location: /Discuss/?q-id=$question_id");
    } else {
        echo "Question not added";
    }
} elseif (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $res = $conn->prepare("delete from questions where id=$id");
    $result = $res->execute();
    if ($result) {
        header("location: /Discuss/?my-question=true");
    }
}
