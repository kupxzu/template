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

<link rel="stylesheet" href="/path/to/upconstruction.css">
<style>
  .upconstruction-card {
    position: relative;
    border: none;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 8px 16px rgba(54, 77, 89, 0.15);
    overflow: hidden;
    margin-bottom: 30px;
  }
  .upconstruction-card::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    height: 8px;
    width: 100%;
    background: var(--color-primary); 
  }
  .upconstruction-card .card-header {
    background-color: #fff;
    border-bottom: none;
    padding: 20px 25px;
  }
  .upconstruction-card .card-title {
    margin: 0;
    font-size: 24px;
    font-family: var(--font-primary);
    color: var(--color-secondary);
  }
  .upconstruction-card .card-body {
    padding: 25px;
    font-family: var(--font-default);
    color: var(--color-default);
  }
  .upconstruction-card p {
    margin-bottom: 15px;
    font-size: 16px;
  }
  .breadcrumb {
    background: transparent;
  }
  .breadcrumb a {
    color: var(--color-primary);
    text-decoration: none;
  }
  .breadcrumb a:hover {
    text-decoration: underline;
  }
</style>

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
          <!-- Breadcrumb -->
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
      <div class="card upconstruction-card">
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
