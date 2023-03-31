<?php

require $_SERVER['DOCUMENT_ROOT'] . '/My Blog/admin/config/database.php';

if (isset($_POST["submit"])) {
    $id = filter_var($_POST["id"], FILTER_SANITIZE_NUMBER_INT);
    $previousThumbnailName = filter_var($_POST["previous-thumbnail-name"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST["title"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST["body"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $categoryId = filter_var($_POST["category"], FILTER_SANITIZE_NUMBER_INT);
    $isFeatured = filter_var($_POST["is-featured"], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES["thumbnail"];

    //set is_featured to 0 if unchecked
    $isFeatured = $isFeatured == 1 ?: 0;

    //set wasfeatured to 1 if the post was featured
    $wasFeaturedQuery = "SELECT is_featured from posts WHERE id = $id";
    $wasFeaturedResult = mysqli_query($connection, $wasFeaturedQuery);
    $wasFeatured = mysqli_fetch_assoc($wasFeaturedResult);


    //validate form data
    if (!$title) {
        $_SESSION["edit-post"] = "Enter Post Title";
    } elseif (!$body) {
        $_SESSION["edit-post"] = "Enter Post Body";
    } elseif (!$categoryId) {
        $_SESSION["edit-post"] = "Select Post Category";
    } else {


        if ($thumbnail["name"]) {
            $previousThumbnailPath = "../../img/" . $previousThumbnailName;
            if ($previousThumbnailPath) {
                unlink($previousThumbnailPath);
            }


            //work on thumbnail
            //rename the image
            $time = time(); // make each image name unique
            $thumbnailName = $time . $thumbnail["name"];
            $thumbnailTmpName = $thumbnail["tmp_name"];
            $thumbnailDestinationPath = "../../img/" . $thumbnailName;

            //make sure file is an image 
            $allowedFiles = ["png", "jpg", "jpeg"];
            $extension = explode(".", $thumbnailName);
            $extension = end($extension);
            if (in_array($extension, $allowedFiles)) {
                //make sure image is not too big (2MB)
                if ($thumbnail["size"] < 2_000_000) {
                    //upload thumbnail
                    move_uploaded_file($thumbnailTmpName, $thumbnailDestinationPath);
                } else {
                    $_SESSION["edit-post"] = "File Size Too Big. Should Be Least Than 2MB ";
                }
            } else {
                $_SESSION["edit-post"] = "File Should Be PNG, JPG or JPEG";
            }
        }
    }

    //redirect back (with form data) to edit-post page if there is any problem
    if (isset($_SESSION['edit-post'])) {
        $_SESSION["edit-post-data"] = $_POST;
        header("location: " . ROOT_URL . "admin/pages/edit-post.php");
        die();
    } else {
        if ($isFeatured == 1) {
            //Add the ID of the post to the featured posts list if this post is not there
            //Remove the oldest Featured Post
            addFeaturedPost($id);
            /*if (array_search($id, $featuredPosts) == false) {
                array_unshift($featuredPosts, $id);
                if (sizeof($featuredPosts) > 3) {
                    $oldFeatured = array_pop($featuredPosts);
                    // set is_featured of the last featured posts to 0 if isFeatured for this post is 1
                    $zeroIsFeaturedQuery = "UPDATE posts SET is_featured=0 WHERE id = $oldFeatured";
                    $zeroIsFeaturedResult = mysqli_query($connection, $zeroIsFeaturedQuery);
                    //use um array para armazenas os 3 posts em destaque, quando um novo post em destaque for adicionado, remova o mais velho com o array.pop e adicione o novo ao array com o array.unshift
                    //use o comando "SELECT title FROM posts WHERE is_featured=1 ORDER BY date_time DESC LIMIT 3") para pegar todos os posts em destaque;
                    //se um post que era destaque e estava no array for definido como não destaque use o array_search para busca-lo e unset para remove-lo do array
                    //crie uma lógica que adapta a sessão dos posts em destaque para ser compativel com menos de 3 posts                
                    //O ID do post em destaque só pode ser adicionado uma vez
                }
                
            }
            */
        }
        if ($wasFeatured["is_featured"] == 1 && $isFeatured == 0) {
            //Remove the ID of the post to the featured posts list if this post is there
            removeFeaturedPost($id);

            /*
            if (($key = array_search($id, $featuredPosts)) !== false) {
                unset($featuredPosts[$key]);
            }
            */
        }

        //set thumbnail name if a new one was uploaded, else keep old thumbnail name
        $thumbnailToInsert = $thumbnailName ?? $previousThumbnailName;

        //insert post into database
        $query = "UPDATE posts SET title= '$title', body = '$body', thumbnail = '$thumbnailToInsert', category_id='$categoryId', is_featured='$isFeatured' WHERE id='$id' LIMIT 1";
        $result = mysqli_query($connection, $query);
        if (!mysqli_errno($connection)) {
            header("location: " . ROOT_URL . "admin/pages/manage-posts.php");
            die();
        }
    }
}
header("location: " . ROOT_URL . "admin/pages/edit-post.php");
die();
