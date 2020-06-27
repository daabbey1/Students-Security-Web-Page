HE<?php
include 'include/FIR_confi.php';
//session_start();
if (!isset($_SESSION["LoginId"])) {
    header("Location:login.php");
} else {
?>
    <!DOCTYPE html>
    <html>

    <head>
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="css/font.css" rel="stylesheet" type="text/css">

        <link href="css/style.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="FontAwesome/css/all.css">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="stylesheet.css" rel="stylesheet" type="text/css">
        <title>FIR | KNUST SECURITY SERVICE </title>
    </head>

    <body data-spy="scroll" data-target="#myScrollspy" data-offset="1">

        <!-- Home Page Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top mb-0">
            <a class="navbar-brand" href="index.php">
                <img class="mx-3" src="images/images (1).jfif" style="width: 5%;" alt="knust_logo"> KNUST SECURITY SERVICE
            </a>
            <!-- User Profile -->
            <span class="navbar-text ml-auto text-primary">
                <div class="dropdown show">
                    <?= $_SESSION["Usernmae"] ?>
                    <i class="fas fa-user-alt text-info rounded-circle mx-3"></i>
                    <a class="dropdown-toggle my-5" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="logout.php">
                            <i class="fas fa-sign-out-alt text-info mx-2"></i>
                            Log out
                        </a>
                    </div>
                </div>
            </span>
        </nav>

        <!-- Header -->
        <div class="container mt-5 pt-5">
            <div class="row">
                <div class="col">
                    <h3 class="text-info float-left news-header mt-3">First Information Report (FIR)</h3>
                </div>
            </div>
        </div>

        <div class="container">
            <hr>
        </div>

        <span id='pass' data-check="<?php echo $_SESSION['Password'] ?>"></span>

        <!-- First Information Report -->
        <div class="tab-pane fade show active" id="FIR" role="tabpanel" aria-labelledby="nav-FIR-tab">

            <form action="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST" enctype="multipart/form-data">
                <!-- Complainant Information -->
                <div class="container">
                    <div class="mt-4 compl-form">
                        <h3 class="text-muted compl-info">Complainant Information</h3>

                        <div>
                            <!-- First name | Last name | Last name -->
                            <div class="form-row mt-4">

                                <div class="form-group col-md-4">
                                    <label for="Fname">First name <span class="text-danger">*</span></label>
                                    <input type="text" name="Fname" class="form-control" id="Fname" value="<?= $Fname ?>" autofocus>
                                    <span class="error text-danger"><?= $Fname_error ?> </span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Mname">Middle name</label>
                                    <input type="text" name="Mname" class="form-control" id="Mname" value="<?= $Mname ?>">
                                    <span class="error text-danger"> <?= $Mname_error ?> </span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Lname">Last name <span class="text-danger">*</span></label>
                                    <input type="text" name="Lname" class="form-control" id="Lname" value="<?= $Lname ?>">
                                    <span class="error text-danger"> <?= $Lname_error ?> </span>
                                </div>
                            </div>

                            <!-- Program of study | Year -->
                            <div class="form-row mt-2">
                                <div class="form-group col-md-8">
                                    <label for="Program"> Program of study <span class="text-danger">*</span></label>
                                    <input type="text" name="Program" class="form-control" id="Program" value="<?= $Program ?>">
                                    <span class="error text-danger"> <?= $Program_error ?> </span>
                                </div>


                                <div class="form-group col-md-4">
                                    <label for="Year">Year <span class="text-danger">*</span></label>
                                    <select id="Year" name="Year" class="form-control">
                                        <option selected><?= $Year ?></option>
                                        <option value="Year_1">Degree year 1</option>
                                        <option value="Year_2">Degree year 2</option>
                                        <option value="Year_3">Degree year 3</option>
                                        <option value="Year_4">Degree year 4</option>
                                        <option value="Year_4">Degree year 5</option>
                                        <option value="Year_4">Degree year 6</option>
                                        <option value="Masters_1">Masters year 1</option>
                                        <option value="Masters_2">Masters year 2</option>
                                        <option value="PHD">PHD student</option>
                                        <option>Others</option>
                                        <option>...</option>
                                    </select>
                                    <span class="error text-danger"> <?= $Year_error ?> </span>
                                </div>
                            </div>

                            <!-- Hall/Hostel    |   Room no  |   Others -->
                            <div class="form-row mt-2">
                                <div class="form-group col-md-8">
                                    <label for="Hostel"> Hall / Hostel / Homestel <span class="text-danger">*</span></label>
                                    <input type="text" name="Hostel" class="form-control" id="Hostel" value="<?= $Hostel ?>">
                                    <span class="error text-danger"> <?= $Hostel_error ?> </span>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="Room_No">Room No.</label>
                                    <input type="number" name="Room_No" class="form-control" id="Room_No" min="1" max="1000" value="<?= $Room_No ?>">
                                    <span class="error text-danger"> <?= $Room_No_error ?> </span>
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="Others">Others</label>
                                    <input type="text" name="Others" class="form-control" id="Others" value="<?= $Others ?>">
                                    <span class="error text-danger"> <?= $Others_error ?> </span>
                                </div>
                            </div>

                            <!-- Email  |   Contact -->
                            <div class="form-row mt-2">
                                <div class="form-group col-md-8">
                                    <label for="Email"> Email <span class="text-danger">*</span></label>
                                    <input type="email" name="Email" class="form-control" id="Email" value="<?= $Email ?>">
                                    <span class="error text-danger"> <?= $Email_error ?> </span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="Contact">Contact <span class="text-danger">*</span></label>
                                    <input type="tel" name="Contact" class="form-control" id="Contact" value="<?= $Contact ?>">
                                    <span class="error text-danger"> <?= $Contact_error ?> </span>
                                </div>
                            </div>

                            <!--        |   Relationship -->
                            <div class="form-row mt-2">
                                <div class="form-group col-md-8">
                                    <label for="Relationship_Details"> Relation with Culprit (Optional)</label>
                                    <input type="text" name="Relationship_Details" class="form-control" id="Relationship_Details" value="<?= $Relationship_Details ?>">
                                    <span class="error  text-danger"> <?= $Relationship_Details_error ?> </span>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="Relationship">Relationship <span class="text-danger">*</span></label>
                                    <select id="Relationship" name="Relationship" class="form-control">
                                        <option selected><?= $Relationship ?></option>
                                        <option value="No relationship with culprit">No relationship with culprit</option>
                                        <option value="Room_Mate">Room mate</option>
                                        <option value="In_The_Same_Hostel">In the same hostel</option>
                                        <option value="Course_Mate">Course mate</option>
                                        <option value="Snr_Course_Mate">Senior course mate</option>
                                        <option value="Jnr_Course_Mate">Junior course mate</option>
                                        <option>...</option>
                                    </select>
                                    <span class="error text-danger"> <?= $Relationship_error ?> </span>
                                </div>
                            </div>
                            <!--  -->
                        </div>

                    </div>
                </div>

                <!-- Type Of Report -->
                <div class="container mt-5">
                    <h3 class="text-muted report-type">What case do you wish to report? <span class="text-danger">*</span></h3>

                    <div class="form-row mt-2">

                        <div class="form-group col-md-6 missing_item">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Report_type" id="gridRadios1" value="Missing_case" <?php if ($Report_type == "Missing_case") echo 'checked'; ?>>
                                <label class="form-check-label" for="Report_type1">
                                    Report missing item
                                </label>
                            </div>
                        </div>

                        <div class="form-group col-md-6 special_item">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="Report_type" id="Report_type" value="Special_case" <?php if ($Report_type == "Special_case") {
                                                                                                                                            echo 'checked';
                                                                                                                                        } ?>>
                                <label class="form-check-label" for="Report_type2">
                                    Report a special case
                                </label>
                            </div>
                        </div>
                    </div>

                    <hr>
                </div>

                <!-- Missing Case -->
                <div class="container mt-4 case">
                    <!-- Missing Case -->
                    <div class="missing_case">
                        <h3 class="text-muted missing-item">Report Missing Item</h3>
                        <hr>
                        <h5 class="text-muted officers-details">Officer's details</h5>

                        <div>
                            <!-- First name | Last name | Last name -->
                            <div class="form-row mt-4">
                                <div class="form-group col-md-4">
                                    <label for="Off_Fname">First name <span class="text-danger">*</span></label>
                                    <input type="text" name="Off_Fname" class="form-control" id="Off_Fname">
                                    <span class="error text-danger"><?= $Off_Fname_error ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Middle name</label>
                                    <input type="text" name="Off_Mname" class="form-control" id="inputEmail4">
                                    <span class="error text-danger"><?= $Off_Fname_error ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Off_Lname">Last name <span class="text-danger">*</span></label>
                                    <input type="text" name="Off_Lname" class="form-control" id="Off_Lname">
                                    <span class="error text-danger"><?= $Off_Lname_error ?></span>
                                </div>
                            </div>
                            <!-- Type of Item | Officers Station | Date | Time -->
                            <div class="form-row mt-2">
                                <div class="form-group col-md-4">
                                    <label for="ItemName">Type of item <span class="text-danger">*</span> </label>
                                    <input type="text" name="ItemName" class="form-control" id="ItemName" placeholder="Eg, phone">'
                                    <span class="error text-danger"><?= $ItemName_error ?></span>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Off_station">officer's station <span class="text-danger">*</span></label>
                                    <input type="text" name="Off_station" class="form-control" id="Off_station">
                                    <span class="error text-danger"><?= $Off_station_error ?></span>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Date">Date <span class="text-danger">*</span></label>
                                    <input type="date" name="Date" class="form-control" id="Date">
                                    <span class="error text-danger"><?= $Date_error ?></span>
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="Time">Time <span class="text-danger">*</span></label>
                                    <input type="time" name="Time" class="form-control">
                                    <span class="error text-danger"><?= $Time_error ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Special Case -->
                <div class="special_case">

                    <!-- Criminal / Culprit Information -->
                    <div class="container">

                        <div class="mt-5">
                            <!-- How well do you know the culprit -->
                            <div class="how_well_do_you_know_the_culprit">
                                <h3 class="text-muted culprit-info">Criminal / Culprit Information</h3>
                                <hr>
                                <h5 class="text-muted mt-4 culprit-info-sub">How well do you know the culprit? <span class="text-danger">*</span></h5>

                                <div class="form-row mt-2">

                                    <div class="form-group col-md-4 enough">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Culprit_Info" value="Enough_and_Valid_Info" id="Culprit_Info" <?php if ($Culprit_Info == "Enough_and_Valid_Info") echo 'checked' ?>>
                                            <label class="form-check-label" for="Culprit_Info">
                                                Enough and valid information
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 little_valid">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Culprit_Info" value="Just_little_and_valid" id="Culprit_Info" <?php if ($Culprit_Info == "Just_little_and_valid") echo 'checked' ?>>
                                            <label class="form-check-label" for="Culprit_Info">
                                                Just little but valid information
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 little_not_sure">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Culprit_Info" value="Just_little_and_not_sure" id="Culprit_Info" <?php if ($Culprit_Info == "Just_little_and_not_sure") echo 'checked' ?>>
                                            <label class="form-check-label" for="Culprit_Info">
                                                Just little and not too sure of information
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>

                            <!-- Enough and Valid Information -->
                            <div class="just_enough">
                                <div>
                                    <!-- First name | Last name | Last name -->
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-4">
                                            <label for="Culprit_Fname">First name <span class="text-danger">*</span> </label>
                                            <input type="text" name="Culprit_Fname" class="form-control" id="Culprit_Fname" value="<?= $Culprit_Fname ?>">
                                            <span class="error text-danger"> <?= $Culprit_Fname_error ?> </span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Culprit_Mname">Middle name</label>
                                            <input type="text" name="Culprit_Mname" class="form-control" id="Culprit_Mname" value="<?= $Culprit_Mname ?>">
                                            <span class="error text-danger"> <?= $Culprit_Mname_error ?> </span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Culprit_Lname">Last name <span class="text-danger">*</span></label>
                                            <input type="text" name="Culprit_Lname" class="form-control" id="Culprit_Lname" value="<?= $Culprit_Lname ?>">
                                            <span class="error text-danger"> <?= $Culprit_Lname_error ?> </span>
                                        </div>
                                    </div>

                                    <!-- Program of study | Year -->
                                    <div class="form-row mt-2">
                                        <div class="form-group col-md-8">
                                            <label for="Culprit_Program"> Program of study <span class="text-danger">*</span> </label>
                                            <input type="text" name="Culprit_Program" class="form-control" id="Culprit_Program" value="<?= $Culprit_Program ?>">
                                            <span class="error text-danger"> <?= $Culprit_Program_error ?> </span>
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="inputState">Year <span class="text-danger">*</span> </label>
                                            <select id="inputState" name="Culprit_Year" class="form-control">
                                                <option> <?= $Culprit_Year ?> </option>
                                                <option value="Year_1">Degree year 1</option>
                                                <option value="Year_2">Degree year 2</option>
                                                <option value="Year_3">Degree year 3</option>
                                                <option value="Year_4">Degree year 4</option>
                                                <option value="Year_4">Degree year 5</option>
                                                <option value="Year_4">Degree year 6</option>
                                                <option value="Masters_1">Masters year 1</option>
                                                <option value="Masters_2">Masters year 2</option>
                                                <option value="PHD">PHD student</option>
                                                <option>Others</option>
                                                <option>...</option>
                                            </select>
                                        </div>
                                        <span class="error text-danger"> <?= $Culprit_Year_error ?> </span>
                                    </div>

                                    <!-- Hall/Hostel    |   Room no. |   Others -->
                                    <div class="form-row mt-2">
                                        <div class="form-group col-md-8">
                                            <label for="inputEmail4"> Hall / Hostel <span class="text-danger">*</span> </label>
                                            <input type="text" name="Culprit_Hostel" class="form-control" id="inputEmail4" value="<?= $Culprit_Hostel ?>">
                                            <span class="error text-danger"> <?= $Culprit_Hostel_error ?> </span>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="Culprit_RoomNumb">Room No.</label>
                                            <input type="number" name="Culprit_RoomNumb" class="form-control" id="Culprit_RoomNumb" min="1" max="1000" value="<?= $Culprit_RoomNumb ?>">
                                            <span class="error text-danger"> <?= $Culprit_RoomNumb_error ?> </span>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="Culprit_OtherInfo">Others</label>
                                            <input type="text" name="Culprit_OtherInfo" class="form-control" id="Culprit_OtherInfo" value="<?= $Culprate_Addition_Info ?>">
                                            <span class="error text-danger"> <?= $Culprit_OtherInfo_error ?> </span>
                                        </div>
                                    </div>

                                    <!-- Nature of offence  |   Location where incident occured     |       Date and Time -->
                                    <div class="form-row mt-2">

                                        <div class="form-group col-md-4">
                                            <label for="inputState">Type of offence <span class="text-danger">*</span></label>
                                            <select id="inputState" name="Enough_Offence_Type" class="form-control">
                                                <option selected> <?= $Enough_Offence_Type ?> </option>
                                                <option value="Stolen_of_student_property">Stolen of student property</option>
                                                <option value="Damage_of_school_property">Damage of school property</option>
                                                <option value="Lost_of_property">Lost of property</option>
                                                <option>...</option>
                                            </select>
                                            <span class="error text-danger"> <?= $Enough_Offence_Type_error ?> </span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="Incident_Location">Place where incident occured <span class="text-danger">*</span></label>
                                            <input type="text" name="Enough_Incident_Location" class="form-control" id="Incident_Location" value="<?= $Enough_Incident_Location ?>">
                                            <span class="error text-danger"> <?= $Incident_Location_error ?> </span>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="Incident_Date">Date <span class="text-danger">*</span> </label>
                                            <input type="date" name="Enough_Incident_Date" class="form-control" id="Incident_Date" value="<?= $Enough_Incident_Date ?>">
                                            <span class="error text-danger"> <?= $Incident_Date_error ?> </span>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="Incident_Time">Time <span class="text-danger">*</span> </label>
                                            <input type="time" name="Enough_Incident_Time" class="form-control" id="inputPassword4" value="<?= $Enough_Incident_Time ?>">
                                            <span class="error text-danger"> <?= $Incident_Time_error ?> </span>
                                        </div>
                                    </div>

                                    <!-- Voice note  |   Contact -->
                                    <div class="form-row mt-2">

                                        <div class="form-group col-md-8">
                                            <label for="Voice_Note">Voice note</label>
                                            <input type="file" name="Voice_Note_Dir1" class="form-control">
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="Culprit_Contact">Contact <span class="text-danger">*</span> </label>
                                            <input type="text" name="Culprit_Contact" class="form-control" id="Culprit_Contact" value="<?= $Culprit_Contact ?>">
                                            <span class="error text-danger"> <?= $Culprit_Contact_error ?> </span>
                                        </div>
                                    </div>

                                    <!-- Any other information -->
                                    <div class="form-row mt-2">
                                        <div class="form-group col-md-12">
                                            <label for="Culprate_Addition_Info">Type any information not mentioned</label>
                                            <textarea name="Culprate_Addition_Info" id="" class="form-control" placeholder="<?= $Culprate_Addition_Info ?>"></textarea>
                                            <span class="error text-danger"> <?= $Culprate_Addition_Info_error ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Just little but valid -->
                    <div class="container just_little">

                        <div class="mt-4">
                            <div>
                                <!-- Nature of offence  |   Location where incident occured     |       Date and Time -->
                                <div class="form-row mt-2">

                                    <div class="form-group col-md-4">
                                        <label for="Offence_Type">Type of offence <span class="text-danger">*</span></label>
                                        <select id="Offence_Type" name="Little_Offence_Type" class="form-control">
                                            <option selected> <?= $Little_Offence_Type ?> </option>
                                            <option value="Stolen of student property">Stolen of student property</option>
                                            <option value="Damage of school property">Damage of school property</option>
                                            <option value="Rape">Rape</option>
                                            <option value="Bullying">Bullying</option>
                                            <option>...</option>
                                        </select>
                                        <span class="error text-danger"><?= $Little_Offence_Type_error ?></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Place where incident occured <span class="text-danger">*</span> </label>
                                        <input type="text" name="Little_Incident_Location" class="form-control" id="Incident_Location" value="<?= $Little_Incident_Location ?>">
                                        <span class="error text-danger"><?= $Little_Incident_Location_error ?></span>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="Incident_Date">Date <span class="text-danger">*</span> </label>
                                        <input type="date" name="Little_Incident_Date" class="form-control" id="Incident_Date" value="<?= $Little_Incident_Date ?>">
                                        <span class="error text-danger"><?= $Little_Incident_Date_error ?></span>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="Incident_Time">Time <span class="text-danger">*</span> </label>
                                        <input type="time" name="Little_Incident_Time" class="form-control" id="Incident_Time" value="<?= $Little_Incident_Time ?>">
                                        <span class="error text-danger"><?= $Little_Incident_Time_error ?></span>
                                    </div>
                                </div>

                                <!-- Voice note  |   Contact -->
                                <div class="form-row mt-2">

                                    <div class="form-group col-md-8">
                                        <label for="Voice_Note_Dir">Voice note</label>
                                        <input type="file" name="Voice_Note_Dir2" class="form-control" value="<?= $Voice_Note_Dir2 ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Little_Contact">Contact</label>
                                        <input type="text" name="Little_Contact" class="form-control" id="Just_Little_Contact" value="<?= $Little_Contact ?>">
                                        <span class="error text-danger"><?= $Little_Just_Little_Contact_error ?></span>
                                    </div>
                                </div>

                                <!-- Any other information -->
                                <div class="form-row mt-2">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Narate exactly what happened</label>
                                        <textarea name="Little_OtherInfo" class="form-control" id="" placeholder="<?= $Little_OtherInfo ?>"></textarea>
                                        <span class="error text-danger"><?= $Little_Just_Little_OtherInfo_error ?></span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Not too valid -->
                    <div class="container little">

                        <div class="mt-4">
                            <div>
                                <!-- Nature of offence  |   Location where incident occured     |       Date and Time -->
                                <div class="form-row mt-2">

                                    <div class="form-group col-md-4">
                                        <label for="Just_Little_Offence_type">Type of offence <span class="text-danger">*</span></label>
                                        <select id="Just_Little_Offence_type" name="NotSure_Offence_Type" class="form-control">
                                            <option selected> <?= $NotSure_Offence_Type ?> </option>
                                            <option value="Stolen of student property">Stolen of student property</option>
                                            <option value="Damage of school property">Damage of school property</option>
                                            <option value="Rape">Rape</option>
                                            <option value="Bullying">Bullying</option>
                                            <option>...</option>
                                        </select>
                                        <span class="error text-danger"><?= $NotSure_Offence_Type_error ?></span>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputEmail4">Place where incident occured <span class="text-danger">*</span> </label>
                                        <input type="text" name="NotSure_Location" class="form-control" id="Incident_Location" value="<?= $NotSure_Location ?>">
                                        <span class="error text-danger"><?= $NotSure_Incident_Location_error ?></span>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="Incident_Date">Date <span class="text-danger">*</span> </label>
                                        <input type="date" name="NotSure_Date" class="form-control" id="Incident_Date" value="<?= $NotSure_Date ?>">
                                        <span class="error text-danger"><?= $NotSure_Incident_Date_error ?></span>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="Incident_Time">Time <span class="text-danger">*</span> </label>
                                        <input type="time" name="NotSure_Time" class="form-control" id="Incident_Time" value="<?= $NotSure_Time ?>">
                                        <span class="error text-danger"><?= $NotSure_Incident_Time_error ?></span>
                                    </div>
                                </div>

                                <!-- Voice note  |   Contact -->
                                <div class="form-row mt-2">

                                    <div class="form-group col-md-8">
                                        <label for="Voice_Note_Dir">Voice note</label>
                                        <input type="file" name="Voice_Note_Dir3" class="form-control" value="<?= $Voice_Note_Dir3 ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label for="Just_Little_Contact">Contact</label>
                                        <input type="text" name="NotSure_Contact" class="form-control" id="Just_Little_Contact" value="<?= $NotSure_Contact ?>">
                                        <span class="error text-danger"><?= $NotSure_Contact_error ?></span>
                                    </div>
                                </div>

                                <!-- Any other information -->
                                <div class="form-row mt-2">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail4">Narate exactly what happened</label>
                                        <textarea name="NotSure_OtherInfo" class="form-control" id="" placeholder="<?= $NotSure_OtherInfo ?>"></textarea>
                                        <span class="error text-danger"><?= $NotSure_OtherInfo_error ?></span>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Evidence -->
                    <div class="container">

                        <div class="mt-5">

                            <!-- Do you have any evidence information -->
                            <div class="do_you_have_evidence">
                                <h3 class="text-muted evidence-info">Do you have any Evidence Information ? <span class="text-danger">*</span></h3>
                                <p>To hasten our investigation please select Yes to add Evidence.</p>
                                <hr>

                                <div class="form-row mt-0">

                                    <div class="form-group col-md-6 yes">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Evidence_Option" id="gridRadios1" value="Yes" <?php if ($Evidence_Option == "Yes") {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?>>
                                            <label class="form-check-label">
                                                Yes
                                            </label>
                                        </div>
                                        <span class="error text-danger"><?= $Evidence_Option_error_Yes ?></span>
                                    </div>

                                    <div class="form-group col-md-6 no">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="Evidence_Option" id="gridRadios2" value="No" <?php if ($Evidence_Option == "No") {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?>>
                                            <label class="form-check-label">
                                                No
                                            </label>
                                        </div>
                                        <span class="error text-danger"><?= $Evidence_Option_error_No ?></span>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <!-- Please select Evidence format -->
                            <div class="mt-1 evidence_format">
                                <h3 class="text-muted evidence-format">Please select Evidence format <span class="text-danger">*</span></h3>
                                <hr>

                                <div class="form-row mt-2">

                                    <div class="form-group col-md-4 ">
                                        <div class="form-check">
                                            <input class="form-check-input picture" type="checkbox" name="Evidence_Format_Picture" value="Evidence_Format_Picture" id="PictureFormat" <?php if ($Evidence_Format_Picture == "Evidence_Format_Picture") {
                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                        } ?>>
                                            <label class="form-check-label picture" for="gridRadios1">
                                                Picture
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 ">
                                        <div class="form-check">
                                            <input class="form-check-input video" type="checkbox" name="Evidence_Format_Video" value="Evidence_Format_Video" id="Evidence_Format_Video" <?php if ($Evidence_Format_Video == "Evidence_Format_Video") {
                                                                                                                                                                                            echo 'checked';
                                                                                                                                                                                        } ?>>
                                            <label class="form-check-label" for="gridRadios1">
                                                Video
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4 ">
                                        <div class="form-check">
                                            <input class="form-check-input audio" type="checkbox" name="Evidence_Format_Audio" value="Evidence_Format_Audio" id="gridRadios1" <?php if ($Evidence_Format_Audio == "Evidence_Format_Audio") {
                                                                                                                                                                                    echo 'checked';
                                                                                                                                                                                } ?>>
                                            <label class="form-check-label" for="gridRadios1">
                                                Audio
                                            </label>
                                        </div>
                                    </div>
                                    <span class="error text-danger"><?= $Evidence_Format_error ?></span>
                                </div>

                                <hr>

                            </div>

                            <div class="allMedia">
                                <form class="mt-0" enctype="multipart/form-data">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                    <!-- Picture input section -->
                                                    <div class="form-group col-md-12 picture_format">
                                                        <div class="picture_input">
                                                            <label for="inputEmail4">Upload Picture as evidence</label><br>
                                                            <input type="file" name="Upload_Picture" class="form-control" id="inputEmail4">
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <!-- Video input section -->
                                                    <div class="form-group col-md-12 video_format">
                                                        <div class="video_input">
                                                            <label for="inputEmail4">Upload Video as evidence</label><br>
                                                            <input type="file" name="Upload_Video" class="form-control" id="inputEmail4">
                                                        </div>
                                                    </div>
                                                </td>

                                                <td>
                                                    <!-- Audio input section -->
                                                    <div class="form-group col-md-12 audio_format">
                                                        <div class="audio_input">
                                                            <label for="inputEmail4">Upload Voice note</label>
                                                            <input type="file" name="Upload_Audio" class="form-control" id="inputEmail4">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>

                                <div class="sub-buton">
                                    <button type="submit" name="submit" class="btn btn-primary px-5 py-3 my-3 submit_info form-control">Submit Information</button>
                                </div>

                                <hr>

                            </div>

                        </div>
                    </div>
                </div>
            </form>
            <!-- Paste here -->
        </div>

        <!-- <script src="js/Bootstrapjquery.js"></script> -->
        <script src="js/jquery.min.js"></script>
        <!-- <script src="js/Propper.js"></script> -->
        <script src="js/bootstrap.js"></script>
        <script defer src="FontAwesome/js/all.js"></script>
        <script src="js/page_animations.js"></script>

        <script>
            $(function() {
                $('[data-toggle="popover"]').popover()
            })
        </script>

    </body>

    </html>
<?php } ?>