<?php
include("connMysqlObj.php");
$sql_query = "SELECT* FROM students ORDER BY cID ASC";
//ORDER BY 子句可以與 SELECT語句結合使用，以檢視由特定欄位排序的表中的資料。該 ORDER BY 子句允許你定義要排序的欄位名稱以及升序或降序的排序方向。
$result = $db_link->query($sql_query);
$total_records = $result->num_rows;
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- https://www.wibibi.com/info.php?tid=416 -->
    <title>學生資料管理系統</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1 style="text-align:center">學生資料管理系統</h1>
    <p style="text-align:center">目前資料筆數：<?php echo $total_records; ?>,
        <a href="add.app">新增學生資料</a>。
    </p>
    <div class="tab_style">
        <table>
            <!-- 表格表頭 -->
            <tr>
                <th>座號</th>
                <th>姓名</th>
                <th>性別</th>
                <th>生日</th>
                <th>電子郵件</th>
                <th>電話</th>
                <th>住址</th>
                <th>功能</th>
            </tr>
            <!-- 資料內容 -->
            <?php
            while ($row_result = $result->fetch_assoc()) {
                // etch_assoc()：將讀出的資料Key值設定為該欄位的欄位名稱。
                echo "<tr>";
                echo "<td>" . $row_result["cID"] . "</td>";
                echo "<td>" . $row_result["cName"] . "</td>";
                echo "<td>" . $row_result["cSex"] . "</td>";
                echo "<td>" . $row_result["cBirthday"] . "</td>";
                echo "<td>" . $row_result["cEmail"] . "</td>";
                echo "<td>" . $row_result["cPhone"] . "</td>";
                echo "<td>" . $row_result["cAddr"] . "</td>";
                echo "<td><a href='update.php?id=" . $row_result["cID"] . "'>修改 </a>";
                echo "<a href='delete.php?id=" . $row_result["cID"] . "'>刪除</a></td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
</body>

</html>