<!doctype html>
<html>
<head>
    <title>Manage Time Off Requests</title>
</head>
<body>
<h1>Manage Time Off Requests</h1>
<table>
    <tr><td>View</td><td>Name</td><td>Reason</td><td>Reviewed</td><td>Approved</td></tr>
<?php
foreach ($requests as $request) {
    echo "<tr>";
    echo "<td>
            <form action=''>
                <input type='hidden' name='uuid' value='$request->uuid' />
                <input type='submit' value='View' />
            </form>
            </td>";
    echo "<td>$request->name</td>";
    echo "<td>$request->reason</td>";
    echo "<td>$request->reviewed</td>";
    echo "<td>$request->approved</td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>