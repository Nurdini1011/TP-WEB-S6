<?php
function redirect($page)
{
    header('Location:index.php?url=' . $page);
}
?>