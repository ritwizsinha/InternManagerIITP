<?php include('includes/header.php') ?>
<?php include('includes/nav.php') ?>
<?php 
if (!logged_in()) {
	set_message("<p class='bg-danger'>Please login again to view that page<p>");
	redirect("login.php");
}
$email = $_SESSION['email'];
$projects = getParticularProfProjects($email);
?>
<div class="container">
    <h1>Projects</h1>
    <?php foreach($projects as $project) { 
        $id = $project['id'];
        $students = getRegisteredStudents($id);
        ?>
        <h3><?php echo $project['title'] ?></h3>
        <ul class="list-group">
            <?php foreach($students as $student): ?>
                <button type="button" class="list-group-item list-group-item-action"><?php echo $student[1];?></button>
            <?php endforeach; ?>
        </ul>
            <?php } ?>
</div>