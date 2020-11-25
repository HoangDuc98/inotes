<?php
require "controller/NoteController.php";
include_once "model/CC.php";
require "model/DB.php";
require "model/File.php";
require "model/INote.php";
require "model/Note.php";
require "model/NoteDB.php";
require "model/NoteFile.php";
$controller = new NoteController();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>

</head>
<body>
    <div class="container">
        <a href="./index.php"><h1>INOTES</h1></a>
        <?php
            $page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : null;
            switch ($page) {
                case "add":
                    $controller->add();
                    break;
                case "detail":
                    $controller->detail();
                    break;
                case "delete":
                    $controller->delete();
                    break;
                case "edit":
                    $controller->edit();
                    break;
                default:
                    $controller->index();
            }
        ?>
    </div>
    <h2>Create new note</h2>
    <form method="post">
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Type</label>
            <select class="form-control" name="type" id="exampleFormControlSelect1">
                <option value="personal">Personal</option>
                <option value="job">Job</option>
                <option value="family">Family</option>
                <option value="friend">Friend</option>
                <option value="society">Society</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
            <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div>
            <a href="view/delete.php"><button class="btn btn-outline-danger my-2 my-sm-0">Cancel</button></a>
            <input type="submit" class="btn btn-outline-success my-2 my-sm-0" value="Create">
        </div>
    </form>


</body>
</html>