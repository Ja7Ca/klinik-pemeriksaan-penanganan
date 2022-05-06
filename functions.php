<?php
$conn = mysqli_connect('localhost', 'root', '', 'klinik-ida');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function set_and_enum_values(&$conn, $table, $field)
{
    $query = "SHOW COLUMNS FROM `$table` LIKE '$field'";
    $result = mysqli_query($conn, $query) or die('Error getting Enum/Set field ' . mysqli_error());
    $row = mysqli_fetch_row($result);

    if (stripos($row[1], 'enum') !== false || stripos($row[1], 'set') !== false) {
        $values = str_ireplace(array('enum(', 'set('), '', trim($row[1], ')'));
        $values = explode(',', $values);
        $values = array_map(function ($str) {
            return trim($str, '\'"');
        }, $values);
    }

    return $values;
}
