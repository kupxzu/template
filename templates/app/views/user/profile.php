<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

$user = $_SESSION['user'];
$pageTitle = "Profile";
?>
<?php include __DIR__ . '/../../views/user/layouts/header.php'; ?>

  <!-- CONTENT WRAPPER -->
  <div class="content-wrapper">
    <!-- CONTENT HEADER -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Profile</h1>
          </div>
          <div class="col-sm-6">
            <!-- (Optional) Breadcrumb -->
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="profile.php">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- MAIN CONTENT -->
    <section class="content">
      <div class="container-fluid">
        <!-- Card Example -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">Welcome, <?= htmlspecialchars($user['firstname']); ?>!</h3>
          </div>
          <div class="card-body">
            <p><strong>Username:</strong> <?= htmlspecialchars($user['username']); ?></p>
            <p><strong>First Name:</strong> <?= htmlspecialchars($user['firstname']); ?></p>
            <p><strong>Last Name:</strong> <?= htmlspecialchars($user['lastname']); ?></p>
            <p><strong>Email:</strong> <?= htmlspecialchars($user['email']); ?></p>
            <p><strong>Status:</strong> <?= htmlspecialchars($user['status']); ?></p>
          </div>
        </div>
      </div>
    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include __DIR__ . '/../../views/user/layouts/footer.php'; ?>