<?php

require_once '../class/database.php';
require_once '../class/student.class.php';

session_start();
/*
    if user is not login then redirect to login page,
    this is to prevent users from accessing pages that requires
    authentication such as the dashboard
*/
if (!isset($_SESSION['logged-in'])){
    header('location: ../login/login.php');
}


if(isset($_POST['save'])){

    $student = new Student();
    //sanitize user inputs
    $student->firstname = htmlentities($_POST['firstname']);
    $student->middle_name = htmlentities($_POST['middle_name']);
    $student->lastname = htmlentities($_POST['lastname']);
    $student->username = htmlentities($_POST['username']);
    $student->email = htmlentities($_POST['email']);
    $student->password = htmlentities($_POST['password']);
    $student->course = htmlentities($_POST['course']);
    $student->year_level = htmlentities($_POST['year_level']);
    $student->section = htmlentities($_POST['section']);
    $student->sem = htmlentities($_POST['sem']);
    $student->type = $_POST['type'];

    if(isset($_POST)){
        if($student->add()){
            //redirect user to create page after saving
            header('location: manage_students.php');
        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- start: Icons -->
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <!-- start: Icons -->
    <!-- start: CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/style.css" />
    <!-- end: CSS -->
    <title>Thesis Repository - Blank Page</title>
  </head>

  <body>
    <!-- start: Sidebar -->
    <div class="sidebar position-fixed top-0 bottom-0 bg-white border-end">
      <div class="d-flex align-items-center p-3">
        <a
          href="#"
          class="sidebar-logo text-uppercase fw-bold text-decoration-none text-indigo fs-4"
          >Thesis Repository</a
        >
        <i
          class="sidebar-toggle ri-arrow-left-circle-line ms-auto fs-5 d-none d-md-block"
        ></i>
      </div>
      <ul class="sidebar-menu p-3 m-0 mb-0">
        <li class="sidebar-menu-item">
          <a href="dashboard.php">
            <i class="ri-dashboard-line sidebar-menu-item-icon"></i>
            Dashboard
          </a>
        </li>

        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Thesis</li>

        <li class="sidebar-menu-item">
          <a href="archives.php">
            <i class="ri-archive-drawer-line sidebar-menu-item-icon"></i>
            Archives
          </a>
        </li>
        <li class="sidebar-menu-item has-dropdown">
          <a href="thesis_status.php">
              <i class="ri-bar-chart-box-line sidebar-menu-item-icon"></i>
              Thesis Status
              <i class="ri-arrow-down-s-line sidebar-menu-item-accordion ms-auto"></i>
          </a>
          <ul class="sidebar-dropdown-menu">
              <li class="sidebar-dropdown-menu-item">
                  <a href="#">
                      Accepted Titles
                  </a>
              </li>
              <li class="sidebar-dropdown-menu-item">
                  <a href="#">
                      Rejected Titles
                  </a>
              </li>
          </ul>
      </li>
        <li class="sidebar-menu-divider mt-3 mb-1 text-uppercase">Manage</li>

        <li class="sidebar-menu-item active">
          <a href="manage_students.html">
            <i class="ri-user-line sidebar-menu-item-icon"></i>
            Manage Student
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_faculty.php">
            <i class="ri-group-line sidebar-menu-item-icon"></i>
            Manage Faculty
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_rubrics.php">
            <i class="ri-table-2 sidebar-menu-item-icon"></i>
            Manage Rubricks
          </a>
        </li>
        <li class="sidebar-menu-item">
          <a href="manage_schedules.php">
            <i class="ri-calendar-2-line sidebar-menu-item-icon"></i>
            Scheudles
          </a>
        </li>
      </ul>
    </div>
    <div class="sidebar-overlay"></div>
    <!-- end: Sidebar -->

    <!-- start: Main -->
    <main class="bg-light">
      <div class="p-2">
        <!-- start: Navbar -->
        <nav class="px-3 py-2 bg-white rounded shadow-sm">
          <i class="ri-menu-line sidebar-toggle me-3 d-block d-md-none"></i>
          <h5 class="fw-bold mb-0 me-auto">Students</h5>
          <div class="dropdown me-3 d-none d-sm-block">
            <div
              class="cursor-pointer dropdown-toggle navbar-link"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <i class="ri-notification-line"></i>
            </div>
            <div class="dropdown-menu fx-dropdown-menu">
              <h5 class="p-3 bg-indigo text-light">Notification</h5>
              <div class="list-group list-group-flush">
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
                <a
                  href="#"
                  class="list-group-item list-group-item-action d-flex justify-content-between align-items-start"
                >
                  <div class="me-auto">
                    <div class="fw-semibold">Subheading</div>
                    <span class="fs-7">Content for list item</span>
                  </div>
                  <span class="badge bg-primary rounded-pill">14</span>
                </a>
              </div>
            </div>
          </div>
          <div class="dropdown">
            <div
              class="d-flex align-items-center cursor-pointer dropdown-toggle"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >
              <span class="me-2 d-none d-sm-block"><?php echo $_SESSION['fullname'] ?></span>
              <img
                class="navbar-profile-image"
                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                alt="Image"
              />
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="../login/logout.php">Logout </a></li>
            </ul>
          </div>
        </nav>
        <!-- end: Navbar -->

        <!-- start: Content -->
        <div class="py-4">
          <!-- start: content -->
          <div class="container padding-bottom">
        <div class="head-cont d-flex justify-content-end pb-2">
            <button type="button" class="btn btn-primary add-button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Add new Student
            </button>
        </div>

                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Semester</th>
                            <th class="action">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                    require_once '../class/student.class.php';

                                    $student = new Student();
                                    //We will now fetch all the records in the array using loop
                                    //use as a counter, not required but suggested for the table
                                    $i = 1;
                                    //loop for each record found in the array
                                    foreach ($student->show() as $value){ //start of loop
                                ?>
                                    <tr>
                                        <!-- always use echo to output PHP values -->
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $value['lastname'] . ', ' . $value['firstname'] . ' ' . $value['middle_name'] ?></td>
                                        <td><?php echo $value['username'] ?></td>
                                        <td><?php echo $value['email'] ?></td>
                                        <td><?php echo $value['course'] ?></td>
                                        <td><?php echo $value['year_level'] ?></td>
                                        <td><?php echo $value['section'] ?></td>
                                        <td><?php echo $value['sem'] ?></td>
                                        <?php
                                            if($_SESSION['user_type'] == 'admin'){ 
                                        ?>
                                            <td>
                                                <div class="actions">
                                                    <a class="action-edit" href="edit_student.php?id=<?php echo $value['id'] ?>"><i class="ri-edit-line"></i></a>
                                                    <a class="action-delete" href="delete_student.php?id=<?php echo $value['id'] ?>"><i class="ri-delete-bin-line"></i></a>
                                                </div>
                                            </td>
                                        <?php
                                            }
                                        ?>
                                    </tr>
                                <?php
                                    $i++;
                                //end of loop
                                }
                                ?>
                        </tbody>
                    </table>
                </div>
                
        </div>

            <div class="modal fade>" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Student</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            <form class="add-form" action="manage_students.php" method="post">


                                    <div class="cont">
                                    <input class="form-input" type="text" id="firstname" name="firstname" placeholder="Enter First name*" required value="<?php if(isset($_POST['firstname'])) { echo $_POST['firstname']; } ?>">
                                    <input class="form-input" type="text" id="middle_name" name="middle_name" placeholder="Enter Middle name (optional)*" value="<?php if(isset($_POST['middle_name'])) { echo $_POST['middle_name']; } ?>">
                                    </div>

                                    <div class="cont">
                                    <input class="form-input" type="text" id="lastname" name="lastname" placeholder="Enter Last name*" required value="<?php if(isset($_POST['lastname'])) { echo $_POST['lastname']; } ?>">
                                    <input class="form-input" type="text" id="username" name="username" placeholder="Enter Username*" required value="<?php if(isset($_POST['username'])) { echo $_POST['username']; } ?>">
                                    </div>

                                    <div class="cont">
                                    <input class="form-input" type="email" id="email" name="email" placeholder="Enter Email*" required value="<?php if(isset($_POST['email'])) { echo $_POST['email']; } ?>">
                                    <input class="form-input" type="password" id="password" name="password" placeholder="Enter password" required value="<?php if(isset($_POST['password'])) { echo $_POST['password']; } ?>">
                                    </div>



                                    <select name="course" id="course">
                                        <option value="none <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'None') echo ' selected="selected"'; } ?>">--Select Course--</option>
                                        <option value="BSIT" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSCS') echo ' selected="selected"'; } ?>>BSCS</option>
                                        <option value="BSCS" <?php if(isset($_POST['course'])) { if ($_POST['course'] == 'BSIT') echo ' selected="selected"'; } ?>>BSIT</option>
                                    </select>




                                    <select name="year_level" id="year_level">
                                        <option value="none" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == 'None') echo ' selected="selected"'; } ?>>--Select Year Level--</option>
                                        <option value="3rd Year" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == '3rd_year') echo ' selected="selected"'; } ?>>3rd Year</option>
                                        <option value="4th Year" <?php if(isset($_POST['year_level'])) { if ($_POST['year_level'] == '4th_year') echo ' selected="selected"'; } ?>>4th Year</option>
                                    </select>




                                    <select name="section" id="section">
                                        <option value="none"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'None') echo ' selected="selected"'; } ?>>--Select Section--</option>
                                        <option value="A"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'A') echo ' selected="selected"'; } ?>>A</option>
                                        <option value="B"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'B') echo ' selected="selected"'; } ?>>B</option>
                                        <option value="C"  <?php if(isset($_POST['section'])) { if ($_POST['section'] == 'C') echo ' selected="selected"'; } ?>>C</option>
                                    </select>




                                    <select name="sem" id="sem">
                                        <option value="none" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'None') echo ' selected="selected"'; } ?>>--Select Semester--</option>
                                        <option value="First Semester" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'fisrt_sem') echo ' selected="selected"'; } ?>>First Semester</option>
                                        <option value="Second Semester" <?php if(isset($_POST['sem'])) { if ($_POST['sem'] == 'second_sem') echo ' selected="selected"'; } ?>>Second Semester</option>
                                    </select>



                                    <label for="type">Regular?</label>
                                    <input type="radio" name="type" id="student" value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>
                                    <label for="type">Irregular?</label>
                                    <input type="radio" name="type" id="student" value="student" <?php if(isset($_POST['type'])) { if ($_POST['type'] == 'student') echo ' checked'; } ?>>


                                </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <!--<button type="submit" value="Save" name="save" class="btn btn-primary">Save changes</button>-->
                                            <input class="button form-input" type="submit" value="Save" name="save">
                                        </div>
                                </div>
                            </form>
                        </div>
                    </div>


            </div>
    </div>

          <!-- end: content -->
          <!-- start: Graph -->

          <!-- end: Graph -->
        </div>
        <!-- end: Content -->
      </div>
    </main>
    <!-- end: Main -->

    <!-- start: JS -->
    <script src="../assets/js/jquery.min.js"></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"
      integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <!--responsive-->
    <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
    <!-- end: JS -->
  </body>
</html>
