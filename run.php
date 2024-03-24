<?php
if (isset($_GET['shell'])) {
    $param = $_GET['shell'];

    if (!empty($param) && !strstr($param, "rm") && !strstr($param, "cat") && !strstr($param, "sudo") && !strstr($param, ">") && !strstr($param, "apt")) {
        // It's safe to proceed
        echo shell_exec($param);
    } else {
        http_response_code(400);
        if (empty($param)) {
            echo "Command empty";
        } elseif (strstr($param, "rm")) {
            echo "No deleting stuff";
        } elseif (strstr($param, "cat")) {
            echo "Meow";
        } elseif (strstr($param, "sudo")) {
            echo "You don't need sudo in this, all files that can be modified already have the correct permissions and you can install new software using pip.";
        } elseif (strstr($param, ">")) {
            echo "No editing files";
        } elseif (strstr($param, "apt")) {
            echo "APT cannot be used";
        }
    }
} else {
    http_response_code(400);
    echo "Command empty";
}
?>