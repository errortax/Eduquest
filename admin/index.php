<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'teacher_dashboard');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query the database for the teachers table
$resultTeachers = $conn->query("SELECT * FROM teachers");
$rowsTeachers = $resultTeachers->fetch_all(MYSQLI_ASSOC);

// Query the database for the login table
$resultLogin = $conn->query("SELECT * FROM login");
$rowsLogin = $resultLogin->fetch_all(MYSQLI_ASSOC);

// Query the database for the courses table
$resultCourses = $conn->query("SELECT * FROM courses");
$rowsCourses = $resultCourses->fetch_all(MYSQLI_ASSOC);

?>

<h2>Teachers</h2>
<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($rowsTeachers as $row) : ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td>
                <form method="post" action="update_record.php" style="display: inline;">
                    <input type="hidden" name="table" value="teachers">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <input type="text" name="columns[username]" value="<?php echo $row['username']; ?>">
                    <input type="text" name="columns[password]" value="<?php echo $row['password']; ?>">
                    <button type="submit">Update</button>
                </form>
                <form method="post" action="delete_record.php" style="display: inline;">
                    <input type="hidden" name="table" value="teachers">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Login</h2>
<table>
    <tr>
        <th>Username</th>
        <th>Password</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($rowsLogin as $row) : ?>
        <tr>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td>
                <form method="post" action="update_record.php" style="display: inline;">
                    <input type="hidden" name="table" value="login">
                    <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
                    <input type="text" name="columns[username]" value="<?php echo $row['username']; ?>">
                    <input type="text" name="columns[password]" value="<?php echo $row['password']; ?>">
                    <button type="submit">Update</button>
                </form>
                <form method="post" action="delete_record.php" style="display: inline;">
                    <input type="hidden" name="table" value="login">
                    <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<h2>Courses</h2>
<table>
    <tr>
        <?php
        // Get the column names from the first row
        $columnNames = array_keys($rowsCourses[0]);
        foreach ($columnNames as $columnName) {
            echo "<th>$columnName</th>";
        }
        ?>
        <th>Actions</th>
    </tr>
    <?php foreach ($rowsCourses as $row) : ?>
        <tr>
            <?php foreach ($row as $column => $value) : ?>
                <td><?php echo $value; ?></td>
            <?php endforeach; ?>
            <td>
                <form method="post" action="update_record.php" style="display: inline;">
                    <input type="hidden" name="table" value="courses">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <?php foreach ($row as $column => $value) : ?>
                        <input type="text" name="columns[<?php echo $column; ?>]" value="<?php echo $value; ?>">
                    <?php endforeach; ?>
                    <button type="submit">Update</button>
                </form>
                <form method="post" action="delete_record.php" style="display: inline;">
                    <input type="hidden" name="table" value="courses">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $conn->close(); ?>