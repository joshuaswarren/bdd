<!doctype html>
<html>
<head>
    <title>Pending Time Off Request Detailsk</title>
</head>
<body>
<h1>Pending Time Off Request Details</h1>
<table>
    <tr><td>Approve</td><td>Deny</td><td>Name</td><td>Reason</td><td>Reviewed</td><td>Approved</td></tr>
    <?php
    foreach($request as $r) {
        echo "<tr>";
        echo "<td>
            <form action=''>
                <input type='hidden' name='uuid' value='$r->uuid' />
                <input type='hidden' name='process' value='approve' />
                <input type='submit' value='Approve' />
            </form>
            </td>";
        echo "<td>
            <form action=''>
                <input type='hidden' name='uuid' value='$r->uuid' />
                <input type='hidden' name='process' value='deny' />
                <input type='submit' value='Deny' />
            </form>
</td>";
        echo "<td>$r->name</td>";
        echo "<td>$r->reason</td>";
        echo "<td>$r->reviewed</td>";
        echo "<td>$r->approved</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>