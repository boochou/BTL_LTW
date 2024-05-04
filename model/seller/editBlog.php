<?php
function editBlog($mysqli, $blogID, $title, $content){
    $query = "UPDATE blog SET header = '$title', content = '$content'
              WHERE id = '$blogID' ";

    $result = mysqli_query($mysqli, $query);

    return $result;
}
?>
