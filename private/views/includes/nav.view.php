<style >
  nav ul li a{
    width: 100px;
    text-align: center;
    border-left: solid thin #ddd;
    border-right: solid thin #eee;    
  }
  nav ul li a:hover{
    background-color: black;
    color: pink !important;
  }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-light p-2">
  <a class="navbar-brand" href="#">LearnEase</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=ROOT?>">Dashboard <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/users">Staff</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/students">Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/courses">Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=ROOT?>/tests">Tests</a>
      </li>
    </ul>

    <ul class="navbar-nav ms-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?=Auth::getFirstname()?>
        </a>
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="<?=ROOT?>/profile">Profile</a>
          <a class="dropdown-item" href="<?=ROOT?>">Dashboard</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?=ROOT?>/logout">Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
