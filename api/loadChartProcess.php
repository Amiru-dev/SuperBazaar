<?php

require_once __DIR__ . "/../includes/adminAuth.php";

include_once __DIR__ . "/../includes/connection.php";

$report = isset($_POST["report"]) ? intval($_POST["report"]) : 1;

$queries = [
    1 => [
        "sql" => "SELECT `product`.`id`, `product`.`name`, SUM(`order_item`.oi_qty) AS `val`
                  FROM `order_item`
                  INNER JOIN `stock` ON `order_item`.stock_stock_id = `stock`.stock_id
                  INNER JOIN `product` ON `stock`.product_id = `product`.id
                  GROUP BY `product`.id, `product`.`name` ORDER BY `val` DESC LIMIT 6",
        "labelCol" => "name",
        "datasetLabel" => "Units Sold",
    ],
    2 => [
        "sql" => "SELECT `user`.fname, SUM(`order_history`.amount) AS `val`
                  FROM `order_history`
                  INNER JOIN `order_item` ON `order_item`.order_history_ohid = `order_history`.ohid
                  INNER JOIN `stock` ON `order_item`.stock_stock_id = `stock`.stock_id
                  INNER JOIN `product` ON `stock`.product_id = `product`.id
                  INNER JOIN `user` ON `order_history`.user_id = `user`.id
                  GROUP BY `user`.fname ORDER BY `val` DESC LIMIT 5",
        "labelCol" => "fname",
        "datasetLabel" => "Total Spent (LKR)",
    ],
    3 => [
        "sql" => "SELECT `product`.`name`, `stock`.qty AS `val`
                  FROM `stock`
                  INNER JOIN `product` ON `stock`.product_id = `product`.id
                  ORDER BY `qty` ASC LIMIT 6",
        "labelCol" => "name",
        "datasetLabel" => "Stock Quantity",
    ],
    4 => [
        "sql" => "SELECT `product`.`name`, `stock`.qty AS `val`
                  FROM `stock`
                  INNER JOIN `product` ON `stock`.product_id = `product`.id
                  ORDER BY `qty` DESC LIMIT 6",
        "labelCol" => "name",
        "datasetLabel" => "Stock Quantity",
    ],
];

if (!isset($queries[$report])) {
    $report = 1;
}

$cfg = $queries[$report];
$rs = Database::search($cfg["sql"]);
$num = $rs->num_rows;

$labels = array();
$data = array();

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();
    $labels[] = $d[$cfg["labelCol"]];
    $data[] = $d["val"];
}

echo json_encode([
    "labels" => $labels,
    "data" => $data,
    "datasetLabel" => $cfg["datasetLabel"],
]);
?>
