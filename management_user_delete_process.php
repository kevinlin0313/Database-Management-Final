<?php
session_start();
include("mysql_connect.inc.php");

$userid = $_GET['userid'];

if ($userid) {
    // 开启事务
    mysqli_begin_transaction($conn);

    try {
        // 删除用户表中的记录
        $sql_user = "DELETE FROM users WHERE user_id='$userid'";
        mysqli_query($conn, $sql_user);

        // 删除公司地址记录
        $sql_com_address = "DELETE FROM com_address WHERE user_id='$userid'";
        mysqli_query($conn, $sql_com_address);

        // 删除发票地址记录
        $sql_inv_address = "DELETE FROM invoice_address WHERE user_id='$userid'";
        mysqli_query($conn, $sql_inv_address);

        // 删除紧急联系人记录
        $sql_emergency = "DELETE FROM emergency WHERE user_id='$userid'";
        mysqli_query($conn, $sql_emergency);

        // 提交事务
        mysqli_commit($conn);

        echo '刪除成功!';
    } catch (Exception $e) {
        // 如果任何一个删除操作失败，则回滚事务并报错
        mysqli_rollback($conn);
        echo '刪除失敗! 錯誤信息: ' . $e->getMessage();
    }
} else {
    echo '無效的 User ID';
}
echo '<meta http-equiv=REFRESH CONTENT=2;url=management_customer.php>';
?>
