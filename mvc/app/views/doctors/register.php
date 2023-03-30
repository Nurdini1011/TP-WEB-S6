<!-- ../views/doctors/register.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
</head>
<body>
    <h1>Registration Page</h1>
    <form action="" method="POST">
        <input type="text" name="name" placeholder="Name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" required>
        <?php if (!empty($data['name_error'])) { echo '<span>' . $data['name_error'] . '</span>'; } ?>
        <br>
        <input type="email" name="email" placeholder="Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
        <?php if (!empty($data['email_error'])) { echo '<span>' . $data['email_error'] . '</span>'; } ?>
        <br>
        <input type="password" name="password" placeholder="Password" required>
        <?php if (!empty($data['password_error'])) { echo '<span>' . $data['password_error'] . '</span>'; } ?>
        <br>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <?php if (!empty($data['confirm_error'])) { echo '<span>' . $data['confirm_error'] . '</span>'; } ?>
        <br>
        <select name="specialty" required>
            <option value="">-- Select Specialty --</option>
            <option value="Cardiology">Cardiology</option>
            <option value="Dermatology">Dermatology</option>
            <option value="Endocrinology">Endocrinology</option>
            <option value="Gastroenterology">Gastroenterology</option>
            <option value="Neurology">Neurology</option>
        </select>
        <br>
        <button type="submit" name="submit">Register</button>
    </form>
</body>
</html>
