<?php

require_once __DIR__ . "/../includes/adminAuth.php";

include_once __DIR__ . "/../includes/connection.php";

$uname = $_POST["u"];

$rs = Database::search("SELECT * FROM `user` WHERE `fname` LIKE '%" . $uname . "%' OR `lname` LIKE '%" . $uname . "%'");
$num = $rs->num_rows;

if ($num > 0) {

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        ?>

        <tr>
            <th scope="row"><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo $d["id"] ?></th>
            <td><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo $d["fname"] ?></td>
            <td><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo $d["lname"] ?></td>
            <td><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo $d["email"] ?></td>
            <td><?php

require_once __DIR__ . "/../includes/adminAuth.php"; echo $d["mobile"] ?></td>
            <td><?php

require_once __DIR__ . "/../includes/adminAuth.php";
            if ($d["status"] == "1") {
                echo ("Active");
            } else {
                echo ("Inactive");
            }
            ?></td>
        </tr>

        <?php

require_once __DIR__ . "/../includes/adminAuth.php";
    }

} else {
    echo ("notfound");
}
?>