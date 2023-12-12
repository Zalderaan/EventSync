<?php
  // start session
  session_start();
  // Check if delete_indexID is set in the query parameters
  if (isset($_GET['delete_indexID'])) {
    $delete_indexID = $_GET['delete_indexID'];
  }

  // include db class here
  /* 
  NOTE TO SELF: db file is included here to avoid multiple inclusions of the db class
                from our include file na explicitly included here
                (ctrl + f: include - to see what I'm talkin abt).
                in these files, please turn the include statements there into comments
  */
  include "backend/classes/dbConnection-classes.php";

  if(!isset($_SESSION["userID"])){
    header("location: login-index.php?msg=login_first");
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EventSync</title>
    <link rel="icon" type="image/x-icon" href="/login-page/pics/calendar-icon-blue.png ">

    <!-- Bootstrap shts -->
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.css"> 
    <script src="bootstrap-5.3.2-dist/js/bootstrap.js"></script>

    <!-- Other stylesheets -->
    <link rel="stylesheet" href="stylesheets/main-style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

    <!-- Include jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    
</head>
<body>

    <nav class="navbar navbar-custom">
      <div class="container-fluid" style="display: flex; justify-content: space-around;">
        <div class="branding navbar-brand mb-0 h1">
          <img src="../src/pics/calendar-icon-blue.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
          <b style="color: white;">EventSync</b>
        </div>

        <div class="nav-item today-btn">
          <button class="btn btn-primary disabled my-1">BETA</button>
        </div>

        <div class="user_place">
          <?php echo $_SESSION["username"]; ?>
        </div>
        
        <div>
          <a id="logout-btn" name="logout-btn" href="backend/includes/userLogout-inc.php">Logout</a>
        </div>
      </div>
    </nav>
    
    
    <div class="container mt-5">
      <div class="row">
        <div class="cards col-3">
          <div class="left-card card">

            <div class="card-header left-content">
              <div class="card-title">
                <b style="font-size: 2rem; position: relative; top: 0.45rem;">Tasks</b>
              </div>
            </div>
            
            <div class="card-body scrollable">                            
              <div class="card-text">
                <ul class="task-list" style="list-style-type: none;">
                  <?php include "backend/includes/taskDisplay-inc.php"; ?>
                </ul>               
              </div>
            </div>

            <div class="modal-container container">
              <!-- addTask trigger modal -->
              <div class="button-custom">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTask">
                  <i class="material-icons">add</i>
                </button>
              </div>
                      
              <!-- addTask Modal -->
              <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="addTaskLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="addTaskLabel">Add Task</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="backend/includes/taskAdd-inc.php" method="post">
                      <div class="create-event modal-body">
                        <div class="row justify-content-center">
                          <div class="col-12">
                            <label for="create_taskName">Task Name</label>
                            <input type="text" class="form-control" id="create_taskName" name="create_taskName"><br>
                          </div>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="add_task" name="add_task" class="btn btn-primary">Add Task</button>
                      </div>                    
                    </form>
    
                  </div>
                </div>
              </div>

              <!-- editTask trigger button -->
              <div class="button-custom">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editTask">
                  <i class="material-icons" style="font-size: 22px;">edit</i>
                </button>
              </div>

              <!-- editTask Modal -->
              <div class="modal fade" id="editTask" tabindex="-1" aria-labelledby="editTaskLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="editTaskLabel">Edit Task</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="backend/includes/taskEdit-inc.php" method="post">
                      <div class="create-event modal-body">
                        <div class="row justify-content-center">
                          <div class="col-12">

                            <label for="inputEdit_taskID">Task ID</label>
                            <input type="number" class="form-control" id="inputEdit_taskID" name="inputEdit_taskID" min="1" required><br>

                            <label for="edit_taskName">Task Name</label>
                            <input type="text" class="form-control" id="edit_taskName" name="edit_taskName" value="" required><br>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="edit_task" name="edit_task">Save changes</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div>

              <!-- deleteTask trigger button -->
              <div class="button-custom">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteTask">
                  <i class="material-icons" style="font-size: 22px;">delete</i>
                </button>
              </div>

              <!-- deleteTask Modal -->
              <div class="modal fade" id="deleteTask" tabindex="-1" aria-labelledby="deleteTaskLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="backend/includes/taskDelete-inc.php" method="post">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="deleteTaskLabel">Delete task?</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <div class="modal-body">
                        <label for="inputDel_taskID">Task ID</label>
                        <input type="number" class="form-control" id="inputDel_taskID" name="inputDel_taskID" required>
                      </div>

                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" id="delete_task" name="delete_task" class="btn btn-danger">Delete Tasks</button>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
                            
            </div>
          </div>
        </div>
 
        <div class="col-6">
          <div class="center-card card">

            <div class="card-header">
              <div class="card-title" style="font-size: 2rem;">
                <div class="container center-header">
                  <b style="position: relative; top: 0.4rem;">Your Schedule</b>
                  <p style="font-size: 18px; position: relative; top: 1rem;" >
                    <?php 
                      
                      // set time zone default to you
                      date_default_timezone_set('Asia/Manila');

                      // Set a default value or handle the absence of a selected date
                      if (!isset($_POST["selected_date"])) {
                        // Set a default value, such as the current date
                        $_POST["selected_date"] = date('Y-m-d');
                        echo $_POST["selected_date"];

                      } else {
                        echo $_POST["selected_date"];

                      }
                    ?>
                  </p>
                </div>
              </div>
            </div>

            <div class="card-body center-content scrollable">

              <br>
              <div>
                <ul class="events" id="events-container" style="list-style-type: none;">
                  <?php
                    $selectedDate = isset($_POST['selected_date']) ? $_POST['selected_date'] : date('Y-m-d');

                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['selected_date'])) {
                      // Retrieve the selected date from the date picker form
                      $selectedDate = $_POST['selected_date'];
                    } else {
                      // Set a default value or handle the absence of a selected date
                      $selectedDate = date('Y-m-d');
                    }

                    // include file with listing logic
                    include "backend/includes/eventDisplay-inc.php";                
                  ?>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="col-3">
          <div class="right-card card">
            <div class="card-body">
              <div class="dateform-div" style="flex: display; justify-content-center">
                <form id = "dateForm" action="main-index.php" method="post">
                  <div class="row">
                    <div class="col-12 justify-content">
                      <input type="date" id="selected_date" name="selected_date" onchange="submitForm()">
                    </div>
                  </div>
                </form>

                <!-- script for changing date after changing date picker value-->      
                <script>
                  function submitForm() {
                      // Trigger the form submission when the date input changes
                      document.getElementById('dateForm').submit();
                  }
                </script>
              </div>


              <div class="container btn-container">  

                <!-- create trigger modal -->
                <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#createEventModal">
                  Create Event
                </button>

                <!-- create modal form -->
                <div class="modal fade" id="createEventModal" tabindex="-1" aria-labelledby="createEventLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="createEventLabel">Create Event</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <form action="backend/includes/eventAdd-inc.php" method="post">

                        <div class="create-event modal-body">
                          <div class="row justify-content-center">
                            <div class="col-12">

                                <label for="eventName">Event Name</label>
                                <input type="text" class="form-control" id="eventName" name="eventName" required><br>
                                    
                                <label for="eventDesc">Event Description</label>
                                <textarea id="eventDesc" class="form-control" name="eventDesc" required></textarea><br>

                                <label for="eventDate">Date</label>
                                <input type="date" class="form-control" id="eventDate" name="eventDate" required><br>
          
                                <label for="timeStart">Start Time</label>
                                <input type="time" class="form-control" id="timeStart" name="timeStart" required><br>
          
                                <label for="timeStop">Stop Time</label>
                                <input type="time" class="form-control" id="timeStop" name="timeStop" required>

                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" name="create_event" class="btn btn-primary">Add event</button>
                        </div>

                      </form>

                    </div>
                  </div>
                </div>

                <!-- Edit trigger modal -->
                <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#editEventModal">
                  Edit Event
                </button>

                <!-- edit modal form -->
                <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <form action="backend/includes/eventEdit-inc.php" method="post">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="editEventLabel">Edit Event</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="create-event modal-body">
                          <div class="row justify-content-center">
                            <div class="col-12">
                              
                              <label for="input_eventID">Event ID</label>
                              <input type="number" class="form-control" id="input_eventID" name="input_eventID"><br>

                              <label for="eventName">Event Name</label>
                              <input type="text" class="form-control" id="edit_eventName" name="edit_eventName"><br>
                                  
                              <label for="eventDesc">Event Description</label>
                              <textarea id="eventDesc" class="form-control" id="edit_eventDesc" name="edit_eventDesc"></textarea><br>

                              <label for="date">Date</label>
                              <input type="date" class="form-control" id="edit_eventDate" name="edit_eventDate"><br>
          
                              <label for="timeStart">Start Time</label>
                              <input type="time" class="form-control" id="edit_eventTimeStart" name="edit_eventTimeStart"><br>
          
                              <label for="timeStop">Stop Time</label>
                              <input type="time" class="form-control" id="edit_eventTimeStop" name="edit_eventTimeStop">

                            </div>
                          </div>
                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary" id="edit_event" name="edit_event">Save changes</button>
                        </div>
                      </form>

                    </div>
                  </div>
                </div>              

                <!-- delete trigger modal -->
                <button type="button" class="btn btn-primary my-1" data-bs-toggle="modal" data-bs-target="#deleteEventModal">
                  Delete Event
                </button>

                <!-- delete form moodal -->
                <div class="modal fade" id="deleteEventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <form action="backend/includes/eventDelete-inc.php" method="post">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Delete the ff events?</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <label for="inputDel_eventID">Event ID</label>
                          <input type="number" class="form-control" id="inputDel_eventID" name="inputDel_eventID">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Go back</button>
                          <button type="submit" class="btn btn-danger" id="delete_event" name="delete_event">Delete events</button>
                        </div>
                      </form>

                    </div>
                  </div>
                 </div>
               </div>
             </div>
           </div>
         </div>
        </div>
      </div>  
    </div>
    
    <!--

    <script>
      // Add a click event listener to each delete button
      var deleteButtons = document.querySelectorAll('.button-custom button[data-bs-target="#deleteTask"]');
      deleteButtons.forEach(function(button, index) {
          button.addEventListener('click', function() {
              // Traverse the DOM to find the index of the parent list item
              var listItem = button.closest('li');
              var index = Array.prototype.indexOf.call(listItem.parentNode.children, listItem);

              // Use AJAX to send the index to your deletion logic file
              $.ajax({
                url: 'backend/includes/taskDelete-inc.php',
                type: 'POST',
                data: { index: delete_indexID },
                dataType: 'json', // Specify that the expected response is JSON
                success: function(response) {
                    // Handle the response from the server
                    if (response.success) {
                        // Successful deletion
                        console.log(response.message);
                        // Optionally, you can perform additional actions here
                    } else {
                        // Error during deletion
                        console.error(response.message);
                        // Optionally, you can display an error message to the user
                    }
                },
                error: function(error) {
                    // Handle AJAX errors
                    console.error(error);
                }

              // Display the index (you can replace this with your desired logic)
              alert('Index of clicked list item: ' + delete_indexID);
              });
          });
      });
    </script>

    -->
    
</body>
</html>