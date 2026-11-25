<?php

require_once __DIR__ . "/../includes/adminAuth.php";

include_once __DIR__ . "/../includes/connection.php";

$rs = Database::search("SELECT * FROM `user` WHERE `user_type_id` = '2'");
$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();
    ?>

    <tr>
        <th scope="row"><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo e($d["id"]) ?></th>
        <td><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo e($d["fname"]) ?></td>
        <td><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo e($d["lname"]) ?></td>
        <td><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo e($d["email"]) ?></td>
        <td><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo e($d["mobile"]) ?></td>
        <td><?php

require_once __DIR__ . "/../includes/adminAuth.php";
        if ($d["status"] == 1) {
            echo ("Active");
        } else {
            echo ("Inactive");
        }

        ?></td>
    </tr>

    <?php

require_once __DIR__ . "/../includes/adminAuth.php";

}

?>