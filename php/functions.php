<?php
function get_positions($limit, $offset)
{
    global $link;
    $sql = "SELECT * FROM `книга` LIMIT $limit OFFSET $offset";
    $result = mysqli_query($link, $sql);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    return $posts;
}

function numberOfPages($limit)
{
    global $link;
    $result = mysqli_query($link,'SELECT COUNT(*) AS total FROM `книга`');
    $countPositions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $numberOfPages = 1 + intdiv($countPositions[0]['total'], $limit);
    return array($numberOfPages, $countPositions[0]['total']);
}