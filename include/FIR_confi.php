
<?php
include_once 'dbh.php';
session_start();

//Defines variables and set them to empty values
$Fname_error = $Mname_error = $Lname_error = $Program_error = $Year_error = $Hostel_error = $Room_No_error = $Others_error = $Email_error = $Contact_error = $Relationship_Details_error = $Relationship_error = "";

$Off_Fname_error = $Off_Fname_error = $Off_Lname_error = $ItemName_error = $Off_station_error = $Date_error = $Time_error = "";

$Culprit_Fname_error = $Culprit_Mname_error = $Culprit_Lname_error = $Culprit_Program_error = $Culprit_Year_error = $Culprit_Hostel_error = $Culprit_RoomNumb_error = $Culprit_OtherInfo_error = $Enough_Offence_Type_error = $Incident_Location_error = $Incident_Date_error = $Incident_Time_error = $Culprit_Contact_error = $Culprate_Addition_Info_error = "";

$Little_Offence_Type_error = $Little_Incident_Location_error = $Little_Incident_Date_error = $Little_Incident_Time_error = $Little_Just_Little_Contact_error = $Little_Just_Little_OtherInfo_error = "";

$NotSure_Offence_Type_error = $NotSure_Incident_Location_error = $NotSure_Incident_Date_error = $NotSure_Incident_Time_error = $NotSure_Contact_error = $NotSure_OtherInfo_error = "";

$Evidence_Format_error = "";
 
$Fname = $Mname = $Lname = $Program = $Year = $Hostel = $Room_No = $Others = $Email = $Contact = $Relationship_Details = $Relationship = $Report_type = $Off_Fname = $Off_Mname = $Off_Lname = $ItemName = $Off_station = $Date = $Time = $Culprit_Info = $Culprit_Fname = $Culprit_Mname = $Culprit_Lname = $Culprit_Program = $Culprit_Year = $Culprit_Hostel = $Culprit_RoomNumb = $Offence_Type = $Incident_Location = $Culprit_OtherInfo = $Incident_Date = $Incident_Time = $Voice_Note_Dir1 = $Culprit_Contact = $Culprate_Addition_Info = $Voice_Note_Dir2 = $Just_Little_Contact = $Just_Little_OtherInfo = $Evidence_Option = $Evidence_Option_error_No = $Evidence_Option_error_Yes = $Evidence_Format_Picture = $Evidence_Format_Video = $Evidence_Format_Audio = "";

$Enough_Offence_Type = $Enough_Incident_Location = $Enough_Incident_Date = $Enough_Incident_Time =  "";
$Little_Offence_Type = $Little_Incident_Location = $Little_Incident_Date = $Little_Incident_Time = $Little_Contact = $Little_OtherInfo = "";
$NotSure_Offence_Type = $NotSure_Location = $NotSure_Date = $NotSure_Time = $NotSure_Contact = $NotSure_OtherInfo = "";


//_____________________________________________TAKES INPUT DATA____________________________________________________
if (isset($_POST['submit'])) {
    //_______Complainant Info_______
    $Fname                 =    mysqli_escape_string($conn, $_POST['Fname']);
    $Mname                 =    mysqli_escape_string($conn, $_POST['Mname']);
    $Lname                 =    mysqli_escape_string($conn, $_POST['Lname']);
    $Program               =    mysqli_escape_string($conn, $_POST['Program']);
    $Year                  =    mysqli_escape_string($conn, $_POST['Year']);
    $Hostel                =    mysqli_escape_string($conn, $_POST['Hostel']);
    $Room_No               =    mysqli_escape_string($conn, $_POST['Room_No']);
    $Others                =    mysqli_escape_string($conn, $_POST['Others']);
    $Email                 =    mysqli_escape_string($conn, $_POST['Email']);
    $Contact               =    mysqli_escape_string($conn, $_POST['Contact']);
    $Relationship_Details  =    mysqli_escape_string($conn, $_POST['Relationship_Details']);
    $Relationship          =    mysqli_escape_string($conn, $_POST['Relationship']);

    //_______Report Type________
    if (isset($_POST['Report_type'])) {
        $Report_type       =    mysqli_escape_string($conn, $_POST['Report_type']);
    }

     //_______Missing Items______
    $Off_Fname             =   mysqli_escape_string($conn, $_POST['Off_Fname']);
    $Off_Mname             =   mysqli_escape_string($conn, $_POST['Off_Mname']);
    $Off_Lname             =   mysqli_escape_string($conn, $_POST['Off_Lname']);
    $ItemName              =   mysqli_escape_string($conn, $_POST['ItemName']);
    $Off_station           =   mysqli_escape_string($conn, $_POST['Off_station']);
    $Date                  =   mysqli_escape_string($conn, $_POST['Date']);
    $Time                  =   mysqli_escape_string($conn, $_POST['Time']);

    //_______Culprit Information Option_______
    if (isset($_POST['Culprit_Info'])) {
        $Culprit_Info          =     mysqli_escape_string($conn, $_POST['Culprit_Info']);
    }

    //_______Enough and Valid Information________
    $Culprit_Fname              =    mysqli_escape_string($conn, $_POST['Culprit_Fname']);
    $Culprit_Mname              =    mysqli_escape_string($conn, $_POST['Culprit_Mname']);
    $Culprit_Lname              =    mysqli_escape_string($conn, $_POST['Culprit_Lname']);
    $Culprit_Program            =    mysqli_escape_string($conn, $_POST['Culprit_Program']);
    $Culprit_Year               =    mysqli_escape_string($conn, $_POST['Culprit_Year']);
    $Culprit_Hostel             =    mysqli_escape_string($conn, $_POST['Culprit_Hostel']);
    $Culprit_RoomNumb           =    mysqli_escape_string($conn, $_POST['Culprit_RoomNumb']);
    $Culprit_OtherInfo          =    mysqli_escape_string($conn, $_POST['Culprit_OtherInfo']);
    $Enough_Offence_Type        =    mysqli_escape_string($conn, $_POST['Enough_Offence_Type']);
    $Enough_Incident_Location   =    mysqli_escape_string($conn, $_POST['Enough_Incident_Location']);
    $Enough_Incident_Date       =    mysqli_escape_string($conn, $_POST['Enough_Incident_Date']);
    $Enough_Incident_Time       =    mysqli_escape_string($conn, $_POST['Enough_Incident_Time']);
    $Culprit_Contact            =    mysqli_escape_string($conn, $_POST['Culprit_Contact']);
    //_______Culprite Additional Info__________
    if (isset($_POST['$Culprate_Addition_Info'])) {
        $Culprate_Addition_Info =  mysqli_escape_string($conn, $_POST['Culprate_Addition_Info']);
    }

    //_______Just Little Information________
    $Little_Offence_Type        =    mysqli_escape_string($conn, $_POST['Little_Offence_Type']);
    $Little_Incident_Location   =    mysqli_escape_string($conn, $_POST['Little_Incident_Location']);
    $Little_Incident_Date       =    mysqli_escape_string($conn, $_POST['Little_Incident_Date']);
    $Little_Incident_Time       =    mysqli_escape_string($conn, $_POST['Little_Incident_Time']);
    $Little_Contact             =    mysqli_escape_string($conn, $_POST['Little_Contact']);
    $Little_OtherInfo           =    mysqli_escape_string($conn, $_POST['Little_OtherInfo']);

    //_______Not Sure Information________
    $NotSure_Offence_Type        =   mysqli_escape_string($conn, $_POST['NotSure_Offence_Type']);
    $NotSure_Location            =   mysqli_escape_string($conn, $_POST['NotSure_Location']);
    $NotSure_Date                =   mysqli_escape_string($conn, $_POST['NotSure_Date']);
    $NotSure_Time                =   mysqli_escape_string($conn, $_POST['NotSure_Time']);
    $NotSure_Contact             =   mysqli_escape_string($conn, $_POST['NotSure_Contact']);
    $NotSure_OtherInfo           =   mysqli_escape_string($conn, $_POST['NotSure_OtherInfo']);

     //______Evidence Yes / No __________
   if (isset($_POST['Evidence_Option'])) {
    $Evidence_Option            =    mysqli_escape_string($conn, $_POST['Evidence_Option']);
   }

    if (isset($_POST['Evidence_Format_Picture'])) {
        $Evidence_Format_Picture =  mysqli_escape_string($conn, $_POST['Evidence_Format_Picture']);
    }else {
        $Evidence_Format_Picture =  " ";
    }

    if (isset($_POST['Evidence_Format_Video'])) {
        $Evidence_Format_Video  =  mysqli_escape_string($conn, $_POST['Evidence_Format_Video']);
    }else {
        $Evidence_Format_Video  =  "";
    }

    if (isset($_POST['Evidence_Format_Audio'])) {
        $Evidence_Format_Audio  =  mysqli_escape_string($conn, $_POST['Evidence_Format_Audio']);
    }else {
        $Evidence_Format_Audio  =  "";
    }

    //------>First Name validation 
    if(empty($Fname)){
        $Fname_error = "First name is required";
    }else {
        $Fname = test_input($Fname);
        if(!preg_match("/^[a-zA-Z ]*$/",$Fname)){
            $Fname_error = "Only letters are allowed";
        }
    }

    //------>Middle Name validation (Optional)
    if(empty($Mname)){
        $Mname = "";
    }else{
        $Mname = test_input($Mname);
        if (!preg_match("/^\-|[a-zA-Z ]*$/", $Mname)) {
            $Mname_error = "Only letters are allowed";
        }
    }

    //------>Last Name validation
    if (empty($Lname)) {
        $Lname_error = "Last name is required";
    } else {
        $Lname = test_input($Lname);
        if (!preg_match("/^\-|[a-zA-Z ]*$/", $Lname)) {
            $Lname_error = "Only letters and white spaces are allowed";
        }
    }

    //------>Program of study validation 
    if (empty($Program)) {
        $Program_error = "Program of study is required";
    } else {
        $Program = test_input($Program);
        if (!preg_match("/^\.|[a-zA-Z ]*$/", $Program)) {
            $Program_error = "Only letters and white spaces are allowed";
        }
    }

    //------> year
    if (empty($Year)) {
        $Year_error = "Please select an option";
    }

    //------>Hostel validation 
    if (empty($Hostel)) {
        $Hostel_error = "Hostel is required";
    } else {
        $Hostel = test_input($Hostel);
        if (!preg_match("/^\-|[a-zA-Z ]*$/", $Hostel)) {
            $Hostel_error = "Only letters are allowed";
        }
    }

    //------>Room number validation
    if (empty($Room_No)) {
        $Room_No_error = " ";
    } 

    //------->Others
    if (empty($Others)) {
        $Others_error = "";
    }else{    
        $Others = test_input($Others);
        if (!preg_match("/^[a-zA-Z ]*$/", $Others)) {
            $Others_error = "Only letters are allowed";
        }
    }

    //------>Email validation
    if (empty($Email)) {
        $Email_error = "Email is required";
    } else {
        $Email = test_input($Email);
        //Checks if email address is well formed
        if (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
            $Email_error = "Invalid email";
        }
    }

    //------>Contact validation
    if (empty($Contact)) {
        $Contact_error = "Contact is required";
    } else {
        $Contact = test_input($Contact);
        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $Contact)) {
            $Contact_error = "Invalid contact";
        }
    }

    //-------> Relationship-typing(Optional)
    if (empty($Relationship_Details)) {
        $Relationship_Details = "";
    } else {
        $message = test_input($Relationship_Details);
    }

    //------->Relationship options validation
    if (empty($Relationship)) {
        $Relationship_error = "Please select an option";
    }


    //Missing Case and Special Case Condition
    if ($Report_type == 'Missing_case') {
        //------>Officer's First Name validation 
        if (empty($Off_Fname)) {
            $Off_Fname_error = "First name is required";
        } else {
            $Off_Fname = test_input($Off_Fname);
            if (!preg_match("/^[a-zA-Z ]*$/", $Off_Fname)) {
                $Off_Fname_error = "Only letters are allowed";
            }
        }

        //------>Officer's Middle Name validation 
        if (empty($Off_Mname)) {
            $Off_Mname_error = " ";
        } else {
            $Off_Mname = test_input($Off_Mname);
            if (!preg_match("/^[a-zA-Z ]*$/", $Off_Mname)) {
                $Off_Mname_error = "Only letters are allowed";
            }
        }

        //------>Officer's Last Name validation 
        if (empty($Off_Lname)) {
            $Off_Lname_error = "Last name is required";
        } else {
            $Off_Lname = test_input($Off_Lname);
            if (!preg_match("/^\-|[a-zA-Z ]*$/", $Off_Lname)) {
                $Off_Lname_error = "Only letters are allowed";
            }
        }

        //------>Type of Item validation 
        if (empty($ItemName)) {
            $ItemName_error = "Item is required";
        } else {
            $ItemName = test_input($ItemName);
            if (!preg_match("/^[a-zA-Z ]*$/", $ItemName)) {
                $ItemName_error = "Only letters are allowed";
            }
        }

        //------>Officers Station Item validation 
        if (empty($Off_station)) {
            $Off_station_error = "Location is required";
        } else {
            $Off_station = test_input($Off_station);
            if (!preg_match("/^[a-zA-Z ]*$/", $Off_station)) {
                $Off_station_error = "Only letters are allowed";
            }
        }

        //------>Date validation
        if (empty($Date)) {
            $Date_error = "Required";
        } else {
            $Date_check = $Date;
            $Date_check  = explode('-', $Date_check);
            //print_r($Date_check . 'hii');
            if (!count($Date_check) == 3) {
                $Date_error = "Wrong format";
            } else {
                if (checkdate($Date_check[1], $Date_check[2], $Date_check[0]) == false) {
                    $Date_error = "Wrong format";
                }
            }
        }

        //------>Time validation
        if (empty($Time)) {
            $Time_error = "Required";
        }
    } elseif ($Report_type == 'Special_case') {

        if ($Culprit_Info == 'Enough_and_Valid_Info') {
            //------>$Culprate Addition Info validation
            if (empty($Culprate_Addition_Info)) {
                $Culprate_Addition_Info_error = "";
            }

            //------>Culprit Fname validation 
            if (empty($Culprit_Fname)) {
                $Culprit_Fname_error = "First name is required";
            } else {
                $Culprit_Fname = test_input($Culprit_Fname);
                if (!preg_match("/^[a-zA-Z ]*$/", $Culprit_Fname)) {
                    $Culprit_Fname_error = "Only letters are allowed";
                }
            }

            //------>Culprit Mname validation 
            if (empty($Culprit_Mname)) {
                $Culprit_Mname_error = " ";
            } else {
                $Culprit_Mname = test_input($Culprit_Mname);
                if (!preg_match("/^\-|[a-zA-Z ]*$/", $Culprit_Mname)) {
                    $Culprit_Mname_error = "Only letters are allowed";
                }
            }

            //------>Culprit Lname validation 
            if (empty($Culprit_Lname)) {
                $Culprit_Lname_error = "Last name is required";
            } else {
                $Culprit_Lname = test_input($Culprit_Lname);
                if (!preg_match("/^\-|[a-zA-Z ]*$/", $Culprit_Lname)) {
                    $Culprit_Lname_error = "Only letters are allowed";
                }
            }

            //------>Culprit Program validation 
            if (empty($Culprit_Program)) {
                $Culprit_Program_error = "Program of study is required";
            } else {
                $Culprit_Program = test_input($Culprit_Program);
                if (!preg_match("/^\.|[a-zA-Z ]*$/", $Culprit_Program)) {
                    $Culprit_Program_error = "Only letters are allowed";
                }
            }

            //------>Culprit Year
            if (empty($Culprit_Year)) {
                $Culprit_Year_error = "Please select an option";
            }

            //------>$Culprit Hostel validation 
            if (empty($Culprit_Hostel)) {
                $Culprit_Hostel_error = "Hostel is required";
            } else {
                $Culprit_Hostel = test_input($Culprit_Hostel);
                if (!preg_match("/^\-|[a-zA-Z ]*$/", $Culprit_Hostel)) {
                    $Culprit_Hostel_error = "Only letters are allowed";
                }
            }

            //------>Culprit RoomNumb validation
            if (empty($Culprit_RoomNumb)) {
                $Culprit_RoomNumb_error = " ";
            }

            //------->Culprit OtherInfo
            if (empty($Culprit_OtherInfo)) {
                $Culprit_OtherInfo_error = "";
            } else {
                $Culprit_OtherInfo = test_input($Culprit_OtherInfo);
                if (!preg_match("/^[a-zA-Z ]*$/", $Culprit_OtherInfo)) {
                    $Culprit_OtherInfo_error = "Only letters are allowed";
                }
            }

            //------>Culprit Contact validation
            if (empty($Culprit_Contact)) {
                $Culprit_Contact_error = "Contact is required";
                echo '<script> alert("Contact is required") </script>';
            } else {
                $Culprit_Contact = test_input($Culprit_Contact);
                if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $Culprit_Contact)) {
                    $Culprit_Contact_error = "Invalid contact";
                }
            }

            //------>$Offence Type validation
            if (empty($Enough_Offence_Type)) {
                $Enough_Offence_Type_error = "Please select an option Enough";
                echo '<script> alert("Please select an option Enough") </script>';
            }


            //------>$Incident Location validation
            if (empty($Enough_Incident_Location)) {
                $Incident_Location_error = "Location is required";
                echo '<script> alert("Location is required") </script>';
            } else {
                $Incident_Location = test_input($Enough_Incident_Location);
                if (!preg_match("/^\-|[a-zA-Z ]*$/", $Enough_Incident_Location)) {
                    $Incident_Location_error = "Only letters and white spaces are allowed";
                }
            }

            //------>$Incident Date validation
            if (empty($Enough_Incident_Date)) {
                $Incident_Date_error = "Required";
                echo '<script> alert("Date is required") </script>';
            } else {
                $Date_check = $Enough_Incident_Date;
                $Date_check  = explode('-', $Date_check);

                if (!count($Date_check) == 3) {
                    $Incident_Date_error = "Wrong format";
                } else {
                    if (!checkdate($Date_check[1], $Date_check[2], $Date_check[0])) {
                        $Incident_Date_error = "Wrong format";
                    }
                }
            }

            //------>$Incident Time validation
            if (empty($Enough_Incident_Time)) {
                $Incident_Time_error = "Required";
            }

        } elseif ($Culprit_Info == 'Just_little_and_valid') {
            //------>$Offence Type validation
            if (empty($Little_Offence_Type)) {
                $Little_Offence_Type_error = "Please select an option...";
            }

            //------>$Incident Location validation
            if (empty($Little_Incident_Location)) {
                    $Little_Incident_Location_error = "Location is required_Little";
            } else {
                    $Little_Incident_Location = test_input($Little_Incident_Location);
                if (!preg_match("/^\-|[a-zA-Z ]*$/", $Little_Incident_Location)) {
                    $Little_Incident_Location_error = "Only letters and white spaces are allowed";
                }
            }

            //------>$Incident Date validation
            if (empty($Little_Incident_Date)) {
                $Little_Incident_Date_error = "Required";
            } else {
                $Date_check = $Little_Incident_Date;
                $Date_check  = explode('-', $Date_check);

                if (!count($Date_check) == 3) {
                    $Little_Incident_Date_error = "Wrong format";
                } else {
                    if (!checkdate($Date_check[1], $Date_check[2], $Date_check[0])) {
                        $Little_Incident_Date_error = "Wrong format";
                    }
                }
            }

            //------>$Incident Time validation
            if (empty($Little_Incident_Time)) {
                $Little_Incident_Time_error = "Required_Little";
            }

            //------>Just Little Contact validation
            if (empty($Little_Contact)) {
                $Little_Just_Little_Contact_error = "";
            } else {
                $Little_Contact = test_input($Little_Contact);
                if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $Little_Contact)) {
                    $Little_Just_Little_Contact_error = "Invalid contact";
                }
            }

            //------->Just Little OtherInfo
            if (empty($Little_OtherInfo)) {
                $Little_Just_Little_OtherInfo_error = "";
            } else {
                $Little_OtherInfo = test_input($Little_OtherInfo);
                if (!preg_match("/^\,\.\-[a-zA-Z ]*$/", $Little_OtherInfo)) {
                    $Little_Just_Little_OtherInfo_error = "Only letters are allowed";
                }
            }

        } elseif($Culprit_Info == 'Just_little_and_not_sure'){

            //------>$Offence Type validation
            if (empty($NotSure_Offence_Type)) {
                $NotSure_Offence_Type_error = "Please select an option_Not Sure";
            }

            //------>$Incident Location validation
            if (empty($NotSure_Location)) {
                $NotSure_Incident_Location_error = "Location is required";
            } else {
                $NotSure_Location = test_input($NotSure_Location);
                if (!preg_match("/^\-|[a-zA-Z ]*$/", $NotSure_Location)) {
                    $NotSure_Incident_Location_error = "Only letters and white spaces are allowed";
                }
            }

            //------>$Incident Date validation
            if (empty($NotSure_Date)) {
                $NotSure_Incident_Date_error = "Required";
            } else {
                $Date_check = $NotSure_Date;
                $Date_check  = explode('-', $Date_check);

                if (!count($Date_check) == 3) {
                    $NotSure_Incident_Date_error = "Wrong format";
                } else {
                    if (!checkdate($Date_check[1], $Date_check[2], $Date_check[0])) {
                        $NotSure_Incident_Date_error = "Wrong format";
                    }
                }
            }

            //------>$Incident Time validation
            if (empty($NotSure_Time)) {
                $NotSure_Incident_Time_error = "Required";
            }

            //------>Just Little Contact validation
            if (empty($NotSure_Contact)) {
                $NotSure_Contact_error = "";
            } else {
                $NotSure_Contact = test_input($NotSure_Contact);
                if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i", $NotSure_Contact)) {
                    $$NotSure_Contact_error = "Invalid contact";
                }
            }

            //------->Just Little OtherInfo
            if (empty($NotSure_OtherInfo)) {
                $NotSure_OtherInfo_error = "";
            } else {
                $NotSure_OtherInfo = test_input($NotSure_OtherInfo);
                if (!preg_match("/^[a-zA-Z ]*$/", $NotSure_OtherInfo)) {
                    $NotSure_OtherInfo_error = "Only letters are allowed";
                }
            }
        }
        
    }
    
    if ($Evidence_Option == 'No') {
        $Evidence_Option_error_No = '';
    }elseif($Evidence_Option == 'Yes'){
        //------>Evidence Format Picture, Video, Audio validation
        if (empty($_POST['Evidence_Format_Picture']) &&  empty($_POST['Evidence_Format_Video']) && empty($_POST['Evidence_Format_Audio'])) {
            $Evidence_Option_error_Yes = "Please select NO if you have no evidence";
            $Evidence_Format_error     = "Select any of the options";
        } else {
            $Evidence_Option_error_Yes = "";
        }
    }

    

    if ($Fname_error == '' && $Lname_error == '' && $Program_error == '' &&  $Year_error == '' && $Hostel_error == '' && $Email_error =='' && $Contact_error == '' && $Relationship_error == '') {

        if ($Report_type == 'Missing_case') {
            if ($Off_Fname_error == "" && $Off_Lname_error == "" && $ItemName_error == "" && $Off_station_error == "" && $Date_error == "" && $Time_error == "") {
                if ($Evidence_Option == 'No') {

                    //--------Insertion Into Report Type------
                    $sql = "INSERT INTO Report_Type(Report_Type)
                    VALUES('$Report_type');";
                    $result = mysqli_query($conn, $sql);

                    //_____Get Report Id From Report Type _______
                    $ReportID = mysqli_insert_id($conn);

                    //_____Variable For User Login Id_____
                    $LoginID = $_SESSION["LoginId"];

                    // //--------Insertion Into culprit Information ------
                    // $sql = "INSERT INTO Culprit_Information(ReportId,Culprit_Information_Type)
                    //             VALUES($ReportID,'$Culprit_Info');";
                    // $result = mysqli_query($conn, $sql);

                    // //_____Get Culprit Information Id From Culprit Information _______
                    // $Culprit_InformationID = mysqli_insert_id($conn);

                    //--------Insertion Into Evidence Option ------
                    $sql = "INSERT INTO Evidence_Option(Evidence_Option)
                            VALUE('$Evidence_Option');";
                    $result = mysqli_query($conn, $sql);


                    //_____Get Evidence Option Id From Evidence Option _______
                    $Evidence_OptionID = mysqli_insert_id($conn);

                    
                    //--------Insertion Into Complainant------
                    $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                    $result = mysqli_query($conn, $sql);

                    //--------Insertion Into Officers Details [Missing Case]------
                    $sql = "INSERT INTO Officerss_Details(ReportId,EvidenceId, Off_Fname, Off_Mname, Off_Lname, Off_station,Date, Time, Item_Name) 
                    VALUES($ReportID,$Evidence_OptionID,'$Off_Fname','$Off_Mname','$Off_Lname','$Off_station','$Date','$Time','$ItemName');";
                    $result = mysqli_query($conn, $sql);
                    
                    unset($_POST['submit']);
                    echo "
                        <script>
                        alert('Report successfuly sent');
                        </script>
                    ";
                    header("Location:FIR.php?Entry=successful");
                }elseif($Evidence_Option == 'Yes'){
                    if (empty($_POST['Evidence_Format_Picture']) &&  empty($_POST['Evidence_Format_Video']) && empty($_POST['Evidence_Format_Audio'])) {
                        // echo '<script> alert("Data validation Process"); </script>';
                    }else{
                        //--------Insertion Into Report Type------
                        $sql = "INSERT INTO Report_Type(Report_Type)
                        VALUES('$Report_type');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Report Id From Report Type _______
                        $ReportID = mysqli_insert_id($conn);

                        //_____Variable For User Login Id_____
                        $LoginID = $_SESSION["LoginId"];

                        // //--------Insertion Into culprit Information ------
                        // $sql = "INSERT INTO Culprit_Information(Culprit_Information_Type)
                        // VALUES('$Culprit_Info');";
                        // $result = mysqli_query($conn, $sql);

                        // //_____Get Culprit Information Id From Culprit Information _______
                        // $Culprit_InformationID = mysqli_insert_id($conn);

                        //--------Insertion Into Evidence Option ------
                        $sql = "INSERT INTO Evidence_Option(Evidence_Option)
                            VALUE('$Evidence_Option');";
                        $result = mysqli_query($conn, $sql);


                        //_____Get Evidence Option Id From Evidence Option _______
                        $Evidence_OptionID = mysqli_insert_id($conn);

                        //--------Insertion Into Complainant------
                        $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                        $result = mysqli_query($conn, $sql);

                        //--------Insertion Into Officers Details [Missing Case]------
                        $sql = "INSERT INTO Officerss_Details(ReportId,EvidenceId, Off_Fname, Off_Mname, Off_Lname, Off_station,Date, Time, Item_Name) 
                        VALUES($ReportID,$Evidence_OptionID,'$Off_Fname','$Off_Mname','$Off_Lname','$Off_station','$Date','$Time','$ItemName');";
                        $result = mysqli_query($conn, $sql);

                        

                        //______Insertion into Pictures,Videos and Audio base on selected condition______
                        $file_Name      =   $_FILES['Upload_Picture']['name'];
                        if (!empty($file_Name)) {

                            //Taking recorde of Picture
                            $file           =   $_FILES['Upload_Picture'];
                            $file_Name      =   $_FILES['Upload_Picture']['name'];
                            $file_Type      =   $_FILES['Upload_Picture']['type'];
                            $file_TempName  =   $_FILES['Upload_Picture']['tmp_name'];
                            $file_Error     =   $_FILES['Upload_Picture']['error'];
                            $file_Size      =   $_FILES['Upload_Picture']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('jpeg', 'jpg', 'png');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 70000000) {

                                        $picture     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $picture_dir =   '../TechSecurity_Data/uploads/Pictures/' . $picture;

                                        move_uploaded_file($file_TempName, $picture_dir);

                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Picture(EvidenceId,Picture_Dir)
                                            VALUES($Evidence_OptionID,'$picture');";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        echo 'Size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }

                        $file_Name      =   $_FILES['Upload_Video']['name'];
                        if (!empty($file_Name)) {
                            
                            //Taking recorde of Video
                            $file           =   $_FILES['Upload_Video'];
                            $file_Name      =   $_FILES['Upload_Video']['name'];
                            $file_Type      =   $_FILES['Upload_Video']['type'];
                            $file_TempName  =   $_FILES['Upload_Video']['tmp_name'];
                            $file_Error     =   $_FILES['Upload_Video']['error'];
                            $file_Size      =   $_FILES['Upload_Video']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('mp4', 'wav');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 7000000000) {

                                        $video     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $video_dir =   '../TechSecurity_Data/uploads/Videos/' . $video;

                                        move_uploaded_file($file_TempName, $video_dir);

                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Video(EvidenceId,Video_Dir)
                                            VALUES($Evidence_OptionID,'$video');";
                                        $result = mysqli_query($conn, $sql);
                                        echo $video_dir . '_____<br />';
                                        echo $Evidence_OptionID . '____>>>';
                                    } else {
                                        echo 'Video size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }

                        $file_Name      =   $_FILES['Upload_Audio']['name'];
                        if (!empty($file_Name)) {
                            
                            //Taking recorde of Audio
                            $file           =   $_FILES['Upload_Audio'];
                            $file_Name      =   $_FILES['Upload_Audio']['name'];
                            $file_Type      =   $_FILES['Upload_Audio']['type'];
                            $file_TempName  =   $_FILES['Upload_Audio']['tmp_name'];
                            $file_Error     =   $_FILES['Upload_Audio']['error'];
                            $file_Size      =   $_FILES['Upload_Audio']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('mp4', 'wav');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 70000000) {

                                        $audio     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $audio_dir =   '../TechSecurity_Data/uploads/Audio/' . $audio;

                                        move_uploaded_file($file_TempName, $audio_dir);
                                        
                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Audio(EvidenceId,Audio_Dir)
                                            VALUES($Evidence_OptionID,'$audio');";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        echo 'Size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }
                        
                        unset($_POST['submit']);
                        header("Location:FIR.php?Entry=successful");
                    }
                }
               
            }
        } elseif ($Report_type == 'Special_case') {
            if ($Culprit_Info == 'Enough_and_Valid_Info') {
                if ($Culprit_Fname_error == "" && $Culprit_Lname_error == "" && $Culprit_Program_error == "" && $Culprit_Year_error == "" && $Culprit_Hostel_error == "" && $Enough_Offence_Type_error == "" && $Incident_Location_error == "" && $Incident_Date_error == "" && $Incident_Time_error == "" && $Culprit_Contact_error == "") {
                    if ($Evidence_Option == 'No') {
                            
                        //--------Insertion Into Report Type------
                        $sql = "INSERT INTO Report_Type(Report_Type)
                                VALUES('$Report_type');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Report Id From Report Type _______
                        $ReportID = mysqli_insert_id($conn);

                        //_____Variable For User Login Id_____
                        $LoginID = $_SESSION["LoginId"];

                        //--------Insertion Into culprit Information ------
                        $sql = "INSERT INTO Culprit_Information(ReportId,Culprit_Information_Type)
                                VALUES($ReportID,'$Culprit_Info');";
                        $result = mysqli_query($conn,$sql);

                        //_____Get Culprit Information Id From Culprit Information _______
                        $Culprit_InformationID = mysqli_insert_id($conn);

                        //--------Insertion Into Evidence Option ------
                        $sql = "INSERT INTO Evidence_Option(Evidence_Option)
                            VALUE('$Evidence_Option');";
                        $result = mysqli_query($conn, $sql);


                        //_____Get Evidence Option Id From Evidence Option _______
                        $Evidence_OptionID = mysqli_insert_id($conn);
                        
                        $file_Name      =   $_FILES['Voice_Note_Dir1']['name'];
                        if(empty($file_Name)){
                            
                            //------Insertion Into Offence Type---------
                            $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Additional_Info)
                            VALUE($Evidence_OptionID,'$Enough_Offence_Type','$Enough_Incident_Location','$Enough_Incident_Date','$Enough_Incident_Time','$Culprate_Addition_Info');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Offence Id From Offence Type _______
                            $OffenceID = mysqli_insert_id($conn);

                            //--------Insertion Into Complainant------
                            $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                            $result = mysqli_query($conn, $sql);

                            //---------Insertion into Enough and Valid Info------------
                            $sql = "INSERT INTO Enough_and_Valid_Info(Culprit_Informationid,OffenceId,Culprit_Fname,Culprit_Mname,Culprit_Lname,Culprit_Program,Culprit_Year,Culprit_Hostel,Culprit_Room_Numb,Culprit_OtherInfo,Culprit_Contact) 
                            VALUES($Culprit_InformationID,$OffenceID,'$Culprit_Fname','$Culprit_Mname','$Culprit_Lname','$Culprit_Program','$Culprit_Year','$Culprit_Hostel','$Culprit_RoomNumb','$Culprit_OtherInfo','$Culprit_Contact');";
                            $result = mysqli_query($conn, $sql);
                            
                            unset($_POST['submit']);
                            header("Location:FIR.php?Entry=successful");
                            echo '<script> alert("Data entry successful") </script>';

                            
                        }else{
                            //Taking audio recorde
                            $file           =   $_FILES['Voice_Note_Dir1'];
                            $file_Name      =   $_FILES['Voice_Note_Dir1']['name'];
                            $file_Type      =   $_FILES['Voice_Note_Dir1']['type'];
                            $file_TempName  =   $_FILES['Voice_Note_Dir1']['tmp_name'];
                            $file_Error     =   $_FILES['Voice_Note_Dir1']['error'];
                            $file_Size      =   $_FILES['Voice_Note_Dir1']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('wav', 'mp4');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 70000000) {
                                        
                                        $voice_note     =   "voice_note" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $voice_note_dir1 =   '../TechSecurity_Data/uploads/culprit_info_audio/' . $voice_note;

                                        move_uploaded_file($file_TempName, $voice_note_dir1);
                                        
                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Voice_Note_Dir,Additional_Info)
                                         VALUE($Evidence_OptionID,'$Enough_Offence_Type','$Enough_Incident_Location','$Enough_Incident_Date','$Enough_Incident_Time',' $voice_note',' $Culprate_Addition_Info');";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        //_____Get Offence Id From Offence Type _______
                                        $OffenceID = mysqli_insert_id($conn);

                                        //--------Insertion Into Complainant------
                                        $sql = "INSERT INTO Complainant(LoginId,ReportId,OffenceId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,$OffenceID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                                        $result = mysqli_query($conn, $sql);

                                        //---------Insertion into Enough and Valid Info------------
                                        $sql = "INSERT INTO Enough_and_Valid_Info(Culprit_Informationid,OffenceId,Culprit_Fname,Culprit_Mname,Culprit_Lname,Culprit_Program,Culprit_Year,Culprit_Hostel,Culprit_Room_Numb,Culprit_OtherInfo,Culprit_Contact) 
                                        VALUES($Culprit_InformationID,$OffenceID,'$Culprit_Fname','$Culprit_Mname','$Culprit_Lname','$Culprit_Program','$Culprit_Year','$Culprit_Hostel','$Culprit_RoomNumb','$Culprit_OtherInfo','$Culprit_Contact');";
                                        $result = mysqli_query($conn, $sql);

                                    
                                        unset($_POST['submit']);
                                        header("Location:FIR.php?Entry=successful");
                                        echo '<script> alert("Data entry sucessful!")</script>';
                                        
                                    } else {
                                        echo 'Size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }

                        }                   
                      
                    }elseif($Evidence_Option == 'Yes'){
                        if (empty($_POST['Evidence_Format_Picture']) &&  empty($_POST['Evidence_Format_Video']) && empty($_POST['Evidence_Format_Audio'])) {
                            echo '<script>  alert("Please select \'No\' if you have no evidence"); </script>';
                        }else{

                            //--------Insertion Into Report Type------
                            $sql = "INSERT INTO Report_Type(Report_Type)
                            VALUES('$Report_type');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Report Id From Report Type _______
                            $ReportID = mysqli_insert_id($conn);

                            //_____Variable For User Login Id_____
                            $LoginID = $_SESSION["LoginId"];

                            //--------Insertion Into culprit Information ------
                            $sql = "INSERT INTO Culprit_Information(ReportId,Culprit_Information_Type)
                                VALUES($ReportID,'$Culprit_Info');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Culprit Information Id From Culprit Information _______
                            $Culprit_InformationID = mysqli_insert_id($conn);

                            //--------Insertion Into Evidence Option ------
                            $sql = "INSERT INTO Evidence_Option(Evidence_Option)
                            VALUE('$Evidence_Option');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Evidence Option Id From Evidence Option _______
                            $Evidence_OptionID = mysqli_insert_id($conn);

                            $file_Name      =   $_FILES['Voice_Note_Dir1']['name'];
                            if (empty($file_Name)) {
                                
                                //------Insertion Into Offence Type---------
                                $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Additional_Info)
                                VALUE($Evidence_OptionID,'$Enough_Offence_Type','$Enough_Incident_Location','$Enough_Incident_Date','$Enough_Incident_Time','$Culprate_Addition_Info');";
                                $result = mysqli_query($conn, $sql);

                                //_____Get Offence Id From Offence Type _______
                                $OffenceID = mysqli_insert_id($conn);

                                //--------Insertion Into Complainant------
                                $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                                $result = mysqli_query($conn, $sql);

                                //---------Insertion into Enough and Valid Info------------
                                $sql = "INSERT INTO Enough_and_Valid_Info(Culprit_Informationid,OffenceId,Culprit_Fname,Culprit_Mname,Culprit_Lname,Culprit_Program,Culprit_Year,Culprit_Hostel,Culprit_Room_Numb,Culprit_OtherInfo,Culprit_Contact) 
                                VALUES($Culprit_InformationID,$OffenceID,'$Culprit_Fname','$Culprit_Mname','$Culprit_Lname','$Culprit_Program','$Culprit_Year','$Culprit_Hostel','$Culprit_RoomNumb','$Culprit_OtherInfo','$Culprit_Contact');";
                                $result = mysqli_query($conn, $sql);

                            } else {
                                //Taking audio recorde
                                $file           =   $_FILES['Voice_Note_Dir1'];
                                $file_Name      =   $_FILES['Voice_Note_Dir1']['name'];
                                $file_Type      =   $_FILES['Voice_Note_Dir1']['type'];
                                $file_TempName  =   $_FILES['Voice_Note_Dir1']['tmp_name'];
                                $file_Error     =   $_FILES['Voice_Note_Dir1']['error'];
                                $file_Size      =   $_FILES['Voice_Note_Dir1']['size'];

                                $fileExt        =   explode('.', $file_Name);
                                $file_ActualExt =   strtolower(end($fileExt));

                                $allowed        =   array('wav', 'mp4');

                                if (in_array($file_ActualExt, $allowed)) {
                                    if ($file_Error === 0) {
                                        if ($file_Size < 70000000) {
                                            
                                            $voice_note     =   "voice_note" . $Evidence_OptionID . "." . $file_ActualExt;
                                            $voice_note_dir1 =   '../TechSecurity_Data/uploads/culprit_info_audio/' . $voice_note;

                                            move_uploaded_file($file_TempName, $voice_note_dir1);
                                            
                                            //------Insertion Into Offence Type---------
                                            $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Voice_Note_Dir,Additional_Info)
                                            VALUE($Evidence_OptionID,'$Enough_Offence_Type','$Enough_Incident_Location','$Enough_Incident_Date','$Enough_Incident_Time',' $voice_note',' $Culprate_Addition_Info');";
                                            $result = mysqli_query($conn, $sql);
                                            
                                            //_____Get Offence Id From Offence Type _______
                                            $OffenceID = mysqli_insert_id($conn);

                                            //--------Insertion Into Complainant------
                                            $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                                            $result = mysqli_query($conn, $sql);

                                            //---------Insertion into Enough and Valid Info------------
                                            $sql = "INSERT INTO Enough_and_Valid_Info(Culprit_Informationid,OffenceId,Culprit_Fname,Culprit_Mname,Culprit_Lname,Culprit_Program,Culprit_Year,Culprit_Hostel,Culprit_Room_Numb,Culprit_OtherInfo,Culprit_Contact) 
                                             VALUES($Culprit_InformationID,$OffenceID,'$Culprit_Fname','$Culprit_Mname','$Culprit_Lname','$Culprit_Program','$Culprit_Year','$Culprit_Hostel','$Culprit_RoomNumb','$Culprit_OtherInfo','$Culprit_Contact');";
                                            $result = mysqli_query($conn, $sql);

                                            
                                        } else {
                                            echo 'Size too large';
                                        }
                                    } else {
                                        echo 'Error uploading your file';
                                    }
                                } else {
                                    echo 'File type must be .wav or .mp4';
                                }
                            }                       

                            //______Insertion into Pictures,Videos and Audio base on selected condition______
                            $file_Name      =   $_FILES['Upload_Picture']['name'];
                            if (!empty($file_Name)) {

                                //Taking recorde of Picture
                                $file           =   $_FILES['Upload_Picture'];
                                $file_Name      =   $_FILES['Upload_Picture']['name'];
                                $file_Type      =   $_FILES['Upload_Picture']['type'];
                                $file_TempName  =   $_FILES['Upload_Picture']['tmp_name'];
                                $file_Error     =   $_FILES['Upload_Picture']['error'];
                                $file_Size      =   $_FILES['Upload_Picture']['size'];

                                $fileExt        =   explode('.', $file_Name);
                                $file_ActualExt =   strtolower(end($fileExt));

                                $allowed        =   array('jpeg', 'jpg', 'png');

                                if (in_array($file_ActualExt, $allowed)) {
                                    if ($file_Error === 0) {
                                        if ($file_Size < 70000000) {

                                            $picture     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                            $picture_dir =   '../TechSecurity_Data/uploads/Pictures/' . $picture;

                                            move_uploaded_file($file_TempName, $picture_dir);

                                            //------Insertion Into Offence Type---------
                                            $sql = "INSERT INTO Picture(EvidenceId,Picture_Dir)
                                            VALUES($Evidence_OptionID,'$picture');";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            echo 'Size too large';
                                        }
                                    } else {
                                        echo 'Error uploading your file';
                                    }
                                } else {
                                    echo 'File type must be .wav or .mp4';
                                }
                            }

                            $file_Name      =   $_FILES['Upload_Video']['name'];
                            if (!empty($file_Name)) {
                                
                                //Taking recorde of Video
                                $file           =   $_FILES['Upload_Video'];
                                $file_Name      =   $_FILES['Upload_Video']['name'];
                                $file_Type      =   $_FILES['Upload_Video']['type'];
                                $file_TempName  =   $_FILES['Upload_Video']['tmp_name'];
                                $file_Error     =   $_FILES['Upload_Video']['error'];
                                $file_Size      =   $_FILES['Upload_Video']['size'];

                                $fileExt        =   explode('.', $file_Name);
                                $file_ActualExt =   strtolower(end($fileExt));

                                $allowed        =   array('mp4', 'wav');

                                if (in_array($file_ActualExt, $allowed)) {
                                    if ($file_Error === 0) {
                                        if ($file_Size < 7000000000) {

                                            $video     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                            $video_dir =   '../TechSecurity_Data/uploads/Videos/' . $video;

                                            move_uploaded_file($file_TempName, $video_dir);

                                            //------Insertion Into Offence Type---------
                                            $sql = "INSERT INTO Video(EvidenceId,Video_Dir)
                                            VALUES($Evidence_OptionID,'$video');";
                                            $result = mysqli_query($conn, $sql);
                                            
                                        } else {
                                            echo 'Video size too large';
                                        }
                                    } else {
                                        echo 'Error uploading your file';
                                    }
                                } else {
                                    echo 'File type must be .wav or .mp4';
                                }
                            }

                            $file_Name      =   $_FILES['Upload_Audio']['name'];
                            if (!empty($file_Name)) {
                                
                                //Taking recorde of Audio
                                $file           =   $_FILES['Upload_Audio'];
                                $file_Name      =   $_FILES['Upload_Audio']['name'];
                                $file_Type      =   $_FILES['Upload_Audio']['type'];
                                $file_TempName  =   $_FILES['Upload_Audio']['tmp_name'];
                                $file_Error     =   $_FILES['Upload_Audio']['error'];
                                $file_Size      =   $_FILES['Upload_Audio']['size'];

                                $fileExt        =   explode('.', $file_Name);
                                $file_ActualExt =   strtolower(end($fileExt));

                                $allowed        =   array('mp4', 'wav');

                                if (in_array($file_ActualExt, $allowed)) {
                                    if ($file_Error === 0) {
                                        if ($file_Size < 70000000) {

                                            $audio     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                            $audio_dir =   '../TechSecurity_Data/uploads/Audio/' . $audio;

                                            move_uploaded_file($file_TempName, $audio_dir);
                                            
                                            //------Insertion Into Offence Type---------
                                            $sql = "INSERT INTO Audio(EvidenceId,Audio_Dir)
                                            VALUES($Evidence_OptionID,'$audio');";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            echo 'Size too large';
                                        }
                                    } else {
                                        echo 'Error uploading your file';
                                    }
                                } else {
                                    echo 'File type must be .wav or .mp4';
                                }
                            }
                            
                            unset($_POST['submit']);
                            header("Location:FIR.php?Entry=successful");
                        }
                    }
                }
            } elseif($Culprit_Info == 'Just_little_and_valid') {
                if ($Little_Offence_Type_error == "" && $Little_Incident_Location_error == "" && $Little_Incident_Date_error == "" && $Little_Incident_Time_error == "") {
                    if ($Evidence_Option == 'No') {

                        //--------Insertion Into Report Type------
                        $sql = "INSERT INTO Report_Type(Report_Type)
                         VALUES('$Report_type');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Report Id From Report Type _______
                        $ReportID = mysqli_insert_id($conn);

                        //_____Variable For User Login Id_____
                        $LoginID = $_SESSION["LoginId"];

                        //--------Insertion Into culprit Information ------
                        $sql = "INSERT INTO Culprit_Information(ReportId,Culprit_Information_Type)
                                VALUES($ReportID,'$Culprit_Info');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Culprit Information Id From Culprit Information _______
                        $Culprit_InformationID = mysqli_insert_id($conn);

                        //--------Insertion Into Evidence Option ------
                        $sql = "INSERT INTO Evidence_Option(Evidence_Option)
                            VALUE('$Evidence_Option');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Evidence Option Id From Evidence Option _______
                        $Evidence_OptionID = mysqli_insert_id($conn);

                        $file_Name      =   $_FILES['Voice_Note_Dir2']['name'];
                        if (empty($file_Name)) {
                            
                            //------Insertion Into Offence Type---------
                            $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Additional_Info)
                            VALUE($Evidence_OptionID,'$Little_Offence_Type','$Little_Incident_Location','$Little_Incident_Date','$Little_Incident_Time',' $Little_OtherInfo');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Offence Id From Offence Type _______
                            $OffenceID = mysqli_insert_id($conn);

                            //--------Insertion Into Complainant------
                            $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                            $result = mysqli_query($conn, $sql);

                            //---------Insertion into Just little and valid Info------------
                            $sql = "INSERT INTO Little_but_Valid_Info(Culprit_Informationid,OffenceId,Just_Little_Contact,Just_Little_OtherInfo)
                            VALUES($Culprit_InformationID,$OffenceID,'$Little_Contact','$Little_OtherInfo');";
                            $result = mysqli_query($conn, $sql);
                            
                            unset($_POST['submit']);
                            header("Location:FIR.php?Entry=successful");
                        } else {
                            //Taking audio recorde
                            $file           =   $_FILES['Voice_Note_Dir2'];
                            $file_Name      =   $_FILES['Voice_Note_Dir2']['name'];
                            $file_Type      =   $_FILES['Voice_Note_Dir2']['type'];
                            $file_TempName  =   $_FILES['Voice_Note_Dir2']['tmp_name'];
                            $file_Error     =   $_FILES['Voice_Note_Dir2']['error'];
                            $file_Size      =   $_FILES['Voice_Note_Dir2']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('wav', 'mp4');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 70000000) {
                                        // echo 'Audio available';
                                        $voice_note     =   "voice_note" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $voice_note_dir2 =   '../TechSecurity_Data/uploads/culprit_info_audio/' . $voice_note;

                                        move_uploaded_file($file_TempName, $voice_note_dir2);

                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Voice_Note_Dir,Additional_Info)
                                        VALUE($Evidence_OptionID,'$Little_Offence_Type','$Little_Incident_Location','$Little_Incident_Date','$Little_Incident_Time',' $voice_note',' $Little_OtherInfo');";
                                        $result = mysqli_query($conn, $sql);

                                        //_____Get Offence Id From Offence Type _______
                                        $OffenceID = mysqli_insert_id($conn);

                                        //--------Insertion Into Complainant------
                                        $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                                        $result = mysqli_query($conn, $sql);

                                        //---------Insertion into Just little and valid Info------------
                                        $sql = "INSERT INTO Little_but_Valid_Info(Culprit_Informationid,OffenceId,Just_Little_Contact,Just_Little_OtherInfo)
                                        VALUES($Culprit_InformationID,$OffenceID,'$Little_Contact','$Little_OtherInfo');";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        unset($_POST['submit']);
                                        header("Location:FIR.php?Entry=successful");
                                    } else {
                                        echo 'Size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }
                        

                    }elseif($Evidence_Option == 'Yes'){
                    if (empty($_POST['Evidence_Format_Picture']) &&  empty($_POST['Evidence_Format_Video']) && empty($_POST['Evidence_Format_Audio'])) {
                        echo '<br /> Please select if you have no Evidence';
                    }else{
                        //--------Insertion Into Report Type------
                        $sql = "INSERT INTO Report_Type(Report_Type)
                        VALUES('$Report_type');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Report Id From Report Type _______
                        $ReportID = mysqli_insert_id($conn);

                        //_____Variable For User Login Id_____
                        $LoginID = $_SESSION["LoginId"];

                        //--------Insertion Into culprit Information ------
                        $sql = "INSERT INTO Culprit_Information(ReportId,Culprit_Information_Type)
                            VALUES($ReportID,'$Culprit_Info');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Culprit Information Id From Culprit Information _______
                        $Culprit_InformationID = mysqli_insert_id($conn);

                        //--------Insertion Into Evidence Option ------
                        $sql = "INSERT INTO Evidence_Option(Evidence_Option)
                        VALUE('$Evidence_Option');";
                        $result = mysqli_query($conn, $sql);


                        //_____Get Evidence Option Id From Evidence Option _______
                        $Evidence_OptionID = mysqli_insert_id($conn);

                        $file_Name      =   $_FILES['Voice_Note_Dir2']['name'];
                        if (empty($file_Name)) {

                            //------Insertion Into Offence Type---------
                            $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Additional_Info)
                            VALUE($Evidence_OptionID,'$Little_Offence_Type','$Little_Incident_Location','$Little_Incident_Date','$Little_Incident_Time',' $Little_OtherInfo');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Offence Id From Offence Type _______
                            $OffenceID = mysqli_insert_id($conn);

                            //--------Insertion Into Complainant------
                            $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                            $result = mysqli_query($conn, $sql);

                            //---------Insertion into Just little and valid Info------------
                            $sql = "INSERT INTO Little_but_Valid_Info(Culprit_Informationid,OffenceId,Just_Little_Contact,Just_Little_OtherInfo)
                            VALUES($Culprit_InformationID,$OffenceID,'$Little_Contact','$Little_OtherInfo');";
                            $result = mysqli_query($conn, $sql);

                        } else {
                            //Taking audio recorde
                            $file           =   $_FILES['Voice_Note_Dir2'];
                            $file_Name      =   $_FILES['Voice_Note_Dir2']['name'];
                            $file_Type      =   $_FILES['Voice_Note_Dir2']['type'];
                            $file_TempName  =   $_FILES['Voice_Note_Dir2']['tmp_name'];
                            $file_Error     =   $_FILES['Voice_Note_Dir2']['error'];
                            $file_Size      =   $_FILES['Voice_Note_Dir2']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('wav', 'mp4');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 70000000) {
                                        echo 'Audio available';
                                        $voice_note     =   "voice_note" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $voice_note_dir2 =   '../TechSecurity_Data/uploads/culprit_info_audio/' . $voice_note;

                                        move_uploaded_file($file_TempName, $voice_note_dir2);

                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Voice_Note_Dir,Additional_Info)
                                        VALUE($Evidence_OptionID,'$Little_Offence_Type','$Little_Incident_Location','$Little_Incident_Date','$Little_Incident_Time',' $voice_note',' $Little_OtherInfo');";
                                        $result = mysqli_query($conn, $sql);

                                        //_____Get Offence Id From Offence Type _______
                                        $OffenceID = mysqli_insert_id($conn);

                                        //--------Insertion Into Complainant------
                                        $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                                        $result = mysqli_query($conn, $sql);

                                        //---------Insertion into Just little and valid Info------------
                                        $sql = "INSERT INTO Little_but_Valid_Info(Culprit_Informationid,OffenceId,Just_Little_Contact,Just_Little_OtherInfo)
                                        VALUES($Culprit_InformationID,$OffenceID,'$Little_Contact','$Little_OtherInfo');";
                                        $result = mysqli_query($conn, $sql);

                                    } else {
                                        echo 'Size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }

                        //______Insertion into Pictures,Videos and Audio base on selected condition______
                        $file_Name      =   $_FILES['Upload_Picture']['name'];
                        if (!empty($file_Name)) {

                            //Taking recorde of Picture
                            $file           =   $_FILES['Upload_Picture'];
                            $file_Name      =   $_FILES['Upload_Picture']['name'];
                            $file_Type      =   $_FILES['Upload_Picture']['type'];
                            $file_TempName  =   $_FILES['Upload_Picture']['tmp_name'];
                            $file_Error     =   $_FILES['Upload_Picture']['error'];
                            $file_Size      =   $_FILES['Upload_Picture']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('jpeg', 'jpg', 'png');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 70000000) {

                                        $picture     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $picture_dir =   '../TechSecurity_Data/uploads/Pictures/' . $picture;

                                        move_uploaded_file($file_TempName, $picture_dir);

                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Picture(EvidenceId,Picture_Dir)
                                        VALUES($Evidence_OptionID,'$picture');";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        echo 'Size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }

                        $file_Name      =   $_FILES['Upload_Video']['name'];
                        if (!empty($file_Name)) {
                            
                            //Taking recorde of Video
                            $file           =   $_FILES['Upload_Video'];
                            $file_Name      =   $_FILES['Upload_Video']['name'];
                            $file_Type      =   $_FILES['Upload_Video']['type'];
                            $file_TempName  =   $_FILES['Upload_Video']['tmp_name'];
                            $file_Error     =   $_FILES['Upload_Video']['error'];
                            $file_Size      =   $_FILES['Upload_Video']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('mp4', 'wav');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 7000000000) {

                                        $video     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $video_dir =   '../TechSecurity_Data/uploads/Videos/' . $video;

                                        move_uploaded_file($file_TempName, $video_dir);

                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Video(EvidenceId,Video_Dir)
                                        VALUES($Evidence_OptionID,'$video');";
                                        $result = mysqli_query($conn, $sql);
                                        
                                    } else {
                                        echo 'Video size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }

                        $file_Name      =   $_FILES['Upload_Audio']['name'];
                        if (!empty($file_Name)) {
                            
                            //Taking recorde of Audio
                            $file           =   $_FILES['Upload_Audio'];
                            $file_Name      =   $_FILES['Upload_Audio']['name'];
                            $file_Type      =   $_FILES['Upload_Audio']['type'];
                            $file_TempName  =   $_FILES['Upload_Audio']['tmp_name'];
                            $file_Error     =   $_FILES['Upload_Audio']['error'];
                            $file_Size      =   $_FILES['Upload_Audio']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('mp4', 'wav');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 70000000) {

                                        $audio     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $audio_dir =   '../TechSecurity_Data/uploads/Audio/' . $audio;

                                        move_uploaded_file($file_TempName, $audio_dir);

                                        //------Insertion Into Offence Type---------
                                        $sql = "INSERT INTO Audio(EvidenceId,Audio_Dir)
                                        VALUES($Evidence_OptionID,'$audio');";
                                        $result = mysqli_query($conn, $sql);
                                    } else {
                                        echo 'Size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }
                        exit;
                        unset($_POST['submit']);
                        header("Location:FIR.php?Entry=successful");
                   
                    }
                }
            }
            }elseif($Culprit_Info == 'Just_little_and_not_sure'){
                if ($NotSure_Offence_Type_error == "" && $NotSure_Incident_Location_error == "" && $NotSure_Incident_Date_error == "" && $NotSure_Incident_Time_error == "") {
                    if ($Evidence_Option == 'No') {

                        //--------Insertion Into Report Type------
                        $sql = "INSERT INTO Report_Type(Report_Type)
                        VALUES('$Report_type');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Report Id From Report Type _______
                        $ReportID = mysqli_insert_id($conn);

                        //_____Variable For User Login Id_____
                        $LoginID = $_SESSION["LoginId"];

                        //--------Insertion Into culprit Information ------
                        $sql = "INSERT INTO Culprit_Information(ReportId,Culprit_Information_Type)
                                VALUES($ReportID,'$Culprit_Info');";
                        $result = mysqli_query($conn, $sql);

                        //_____Get Culprit Information Id From Culprit Information _______
                        $Culprit_InformationID = mysqli_insert_id($conn);

                        //--------Insertion Into Evidence Option ------
                        $sql = "INSERT INTO Evidence_Option(Evidence_Option)
                             VALUE('$Evidence_Option');";
                        $result = mysqli_query($conn, $sql);


                        //_____Get Evidence Option Id From Evidence Option _______
                        $Evidence_OptionID = mysqli_insert_id($conn);

                        $file_Name      =   $_FILES['Voice_Note_Dir3']['name'];
                        if (empty($file_Name)) {
                            
                            //------Insertion Into Offence Type---------
                            $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Additional_Info)
                            VALUE($Evidence_OptionID,'$NotSure_Offence_Type','$NotSure_Location','$NotSure_Date','$NotSure_Time','$NotSure_OtherInfo');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Offence Id From Offence Type _______
                            $OffenceID = mysqli_insert_id($conn);

                            //--------Insertion Into Complainant------
                            $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                            $result = mysqli_query($conn, $sql);

                            //---------Insertion into Just little and valid Info------------
                            $sql = "INSERT INTO Little_but_Valid_Info(Culprit_Informationid,OffenceId,Just_Little_Contact,Just_Little_OtherInfo)
                            VALUES($Culprit_InformationID,$OffenceID,'$NotSure_Contact','$NotSure_OtherInfo');";
                            $result = mysqli_query($conn, $sql);
                            
                            unset($_POST['submit']);
                            header("Location:FIR.php?Entry=successful");
                        } else {
                            //Taking audio recorde
                            $file           =   $_FILES['Voice_Note_Dir3'];
                            $file_Name      =   $_FILES['Voice_Note_Dir3']['name'];
                            $file_Type      =   $_FILES['Voice_Note_Dir3']['type'];
                            $file_TempName  =   $_FILES['Voice_Note_Dir3']['tmp_name'];
                            $file_Error     =   $_FILES['Voice_Note_Dir3']['error'];
                            $file_Size      =   $_FILES['Voice_Note_Dir3']['size'];

                            $fileExt        =   explode('.', $file_Name);
                            $file_ActualExt =   strtolower(end($fileExt));

                            $allowed        =   array('wav', 'mp4');

                            if (in_array($file_ActualExt, $allowed)) {
                                if ($file_Error === 0) {
                                    if ($file_Size < 70000000) {
                                        
                                        $voice_note     =   "voice_note" . $Evidence_OptionID . "." . $file_ActualExt;
                                        $voice_note_dir3 =   '../TechSecurity_Data/uploads/culprit_info_audio/' . $voice_note;

                                        move_uploaded_file($file_TempName, $voice_note_dir3);

                                        $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Voice_Note_Dir,Additional_Info)
                                        VALUE($Evidence_OptionID,'$NotSure_Offence_Type','$NotSure_Location','$NotSure_Date','$NotSure_Time',' $voice_note','$NotSure_OtherInfo');";
                                        $result = mysqli_query($conn, $sql);

                                        //_____Get Offence Id From Offence Type _______
                                        $OffenceID = mysqli_insert_id($conn);

                                        //--------Insertion Into Complainant------
                                        $sql = "INSERT INTO Complainant(LoginId,ReportId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                                        $result = mysqli_query($conn, $sql);

                                        //---------Insertion into Just little and valid Info------------
                                        $sql = "INSERT INTO Little_but_Valid_Info(Culprit_Informationid,OffenceId,Just_Little_Contact,Just_Little_OtherInfo)
                                        VALUES($Culprit_InformationID,$OffenceID,'$NotSure_Contact','$NotSure_OtherInfo');";
                                        $result = mysqli_query($conn, $sql);
                                        
                                        unset($_POST['submit']);
                                        header("Location:FIR.php?Entry=successful");
                                    } else {
                                        echo 'Size too large';
                                    }
                                } else {
                                    echo 'Error uploading your file';
                                }
                            } else {
                                echo 'File type must be .wav or .mp4';
                            }
                        }

                    }elseif($Evidence_Option == 'Yes'){
                        if (empty($_POST['Evidence_Format_Picture']) &&  empty($_POST['Evidence_Format_Video']) && empty($_POST['Evidence_Format_Audio'])) {
                            echo '<script> alert (Please select if you have no Evidence) <\script>';
                        }else{

                            //--------Insertion Into Report Type------
                            $sql = "INSERT INTO Report_Type(Report_Type)
                            VALUES('$Report_type');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Report Id From Report Type _______
                            $ReportID = mysqli_insert_id($conn);

                            //_____Variable For User Login Id_____
                            $LoginID = $_SESSION["LoginId"];

                            $sql = "INSERT INTO Culprit_Information(ReportId,Culprit_Information_Type)
                                VALUES($ReportID,'$Culprit_Info');";
                            $result = mysqli_query($conn, $sql);

                            //_____Get Culprit Information Id From Culprit Information _______
                            $Culprit_InformationID = mysqli_insert_id($conn);

                            //--------Insertion Into Evidence Option ------
                            $sql = "INSERT INTO Evidence_Option(Evidence_Option)
                             VALUE('$Evidence_Option');";
                            $result = mysqli_query($conn, $sql);


                            //_____Get Evidence Option Id From Evidence Option _______
                            $Evidence_OptionID = mysqli_insert_id($conn);

                            $file_Name      =   $_FILES['Voice_Note_Dir3']['name'];
                            if (empty($file_Name)) {
                                
                                //------Insertion Into Offence Type---------
                                $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Additional_Info)
                                VALUE($Evidence_OptionID,'$NotSure_Offence_Type','$NotSure_Location','$NotSure_Date','$NotSure_Time','$NotSure_OtherInfo');";
                                $result = mysqli_query($conn, $sql);

                                //_____Get Offence Id From Offence Type _______
                                $OffenceID = mysqli_insert_id($conn);

                                //--------Insertion Into Complainant------
                                $sql = "INSERT INTO Complainant(LoginId,ReportId,OffenceId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,$OffenceID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                                $result = mysqli_query($conn, $sql);

                                //---------Insertion into Just little and valid Info------------
                                $sql = "INSERT INTO Little_but_Valid_Info(Culprit_Informationid,OffenceId,Just_Little_Contact,Just_Little_OtherInfo)
                                VALUES($Culprit_InformationID,$OffenceID,'$NotSure_Contact','$NotSure_OtherInfo');";
                                $result = mysqli_query($conn, $sql);
                                
                            } else {
                                //Taking audio recorde
                                $file           =   $_FILES['Voice_Note_Dir3'];
                                $file_Name      =   $_FILES['Voice_Note_Dir3']['name'];
                                $file_Type      =   $_FILES['Voice_Note_Dir3']['type'];
                                $file_TempName  =   $_FILES['Voice_Note_Dir3']['tmp_name'];
                                $file_Error     =   $_FILES['Voice_Note_Dir3']['error'];
                                $file_Size      =   $_FILES['Voice_Note_Dir3']['size'];

                                $fileExt        =   explode('.', $file_Name);
                                $file_ActualExt =   strtolower(end($fileExt));

                                $allowed        =   array('wav', 'mp4');

                                if (in_array($file_ActualExt, $allowed)) {
                                    if ($file_Error === 0) {
                                        if ($file_Size < 70000000) {
                                            
                                            $voice_note     =   "voice_note" . $Evidence_OptionID . "." . $file_ActualExt;
                                            $voice_note_dir3 =   '../TechSecurity_Data/uploads/culprit_info_audio/' . $voice_note;

                                            move_uploaded_file($file_TempName, $voice_note_dir3);

                                            $sql = "INSERT INTO Offence_Type(EvidenceId,Offence_Type,Incident_Location,Date,Time,Voice_Note_Dir,Additional_Info)
                                            VALUE($Evidence_OptionID,'$NotSure_Offence_Type','$NotSure_Location','$NotSure_Date','$NotSure_Time',' $voice_note','$NotSure_OtherInfo');";
                                            $result = mysqli_query($conn, $sql);

                                            //_____Get Offence Id From Offence Type _______
                                            $OffenceID = mysqli_insert_id($conn);

                                            //--------Insertion Into Complainant------
                                            $sql = "INSERT INTO Complainant(LoginId,ReportId,OffenceId,Fname,Mname,Lname,Program,Year,Hostel,Room_Numb,Others,Email,Contact,Relationship,Detail_Relation) VALUE ($LoginID,$ReportID,$OffenceID,'$Fname','$Mname','$Lname','$Program','$Year','$Hostel','$Room_No','$Others','$Email','$Contact','$Relationship_Details','$Relationship');";
                                            $result = mysqli_query($conn, $sql);

                                            //---------Insertion into Just little and valid Info------------
                                            $sql = "INSERT INTO Little_but_Valid_Info(Culprit_Informationid,OffenceId,Just_Little_Contact,Just_Little_OtherInfo)
                                             VALUES($Culprit_InformationID,$OffenceID,'$NotSure_Contact','$NotSure_OtherInfo');";
                                            $result = mysqli_query($conn, $sql);
                                            
                                        } else {
                                            echo 'Size too large';
                                        }
                                    } else {
                                        echo 'Error uploading your file';
                                    }
                                } else {
                                    echo 'File type must be .wav or .mp4';
                                }
                            }

                            //______Insertion into Pictures,Videos and Audio base on selected condition______
                            $file_Name      =   $_FILES['Upload_Picture']['name'];
                            if (!empty($file_Name)) {

                                //Taking recorde of Picture
                                $file           =   $_FILES['Upload_Picture'];
                                $file_Name      =   $_FILES['Upload_Picture']['name'];
                                $file_Type      =   $_FILES['Upload_Picture']['type'];
                                $file_TempName  =   $_FILES['Upload_Picture']['tmp_name'];
                                $file_Error     =   $_FILES['Upload_Picture']['error'];
                                $file_Size      =   $_FILES['Upload_Picture']['size'];

                                $fileExt        =   explode('.', $file_Name);
                                $file_ActualExt =   strtolower(end($fileExt));

                                $allowed        =   array('jpeg', 'jpg', 'png');

                                if (in_array($file_ActualExt, $allowed)) {
                                    if ($file_Error === 0) {
                                        if ($file_Size < 70000000) {

                                            $picture     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                            $picture_dir =   '../TechSecurity_Data/uploads/Pictures/' . $picture;

                                            move_uploaded_file($file_TempName, $picture_dir);

                                            //------Insertion Into Offence Type---------
                                            $sql = "INSERT INTO Picture(EvidenceId,Picture_Dir)
                                            VALUES($Evidence_OptionID,'$picture');";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            echo 'Size too large';
                                        }
                                    } else {
                                        echo 'Error uploading your file';
                                    }
                                } else {
                                    echo 'File type must be .wav or .mp4';
                                }
                            }

                            $file_Name      =   $_FILES['Upload_Video']['name'];
                            if (!empty($file_Name)) {

                                //Taking recorde of Video
                                $file           =   $_FILES['Upload_Video'];
                                $file_Name      =   $_FILES['Upload_Video']['name'];
                                $file_Type      =   $_FILES['Upload_Video']['type'];
                                $file_TempName  =   $_FILES['Upload_Video']['tmp_name'];
                                $file_Error     =   $_FILES['Upload_Video']['error'];
                                $file_Size      =   $_FILES['Upload_Video']['size'];

                                $fileExt        =   explode('.', $file_Name);
                                $file_ActualExt =   strtolower(end($fileExt));

                                $allowed        =   array('mp4', 'wav');

                                if (in_array($file_ActualExt, $allowed)) {
                                    if ($file_Error === 0) {
                                        if ($file_Size < 7000000000) {

                                            $video     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                            $video_dir =   '../TechSecurity_Data/uploads/Videos/' . $video;

                                            move_uploaded_file($file_TempName, $video_dir);

                                            //------Insertion Into Offence Type---------
                                            $sql = "INSERT INTO Video(EvidenceId,Video_Dir)
                                            VALUES($Evidence_OptionID,'$video');";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            echo 'Video size too large';
                                        }
                                    } else {
                                        echo 'Error uploading your file';
                                    }
                                } else {
                                    echo 'File type must be .wav or .mp4';
                                }
                            }

                            $file_Name      =   $_FILES['Upload_Audio']['name'];
                            if (!empty($file_Name)) {

                                //Taking recorde of Audio
                                $file           =   $_FILES['Upload_Audio'];
                                $file_Name      =   $_FILES['Upload_Audio']['name'];
                                $file_Type      =   $_FILES['Upload_Audio']['type'];
                                $file_TempName  =   $_FILES['Upload_Audio']['tmp_name'];
                                $file_Error     =   $_FILES['Upload_Audio']['error'];
                                $file_Size      =   $_FILES['Upload_Audio']['size'];

                                $fileExt        =   explode('.', $file_Name);
                                $file_ActualExt =   strtolower(end($fileExt));

                                $allowed        =   array('mp4', 'wav');

                                if (in_array($file_ActualExt, $allowed)) {
                                    if ($file_Error === 0) {
                                        if ($file_Size < 70000000) {

                                            $audio     =   "evidence" . $Evidence_OptionID . "." . $file_ActualExt;
                                            $audio_dir =   '../TechSecurity_Data/uploads/Audio/' . $audio;

                                            move_uploaded_file($file_TempName, $audio_dir);
                                            
                                            //------Insertion Into Offence Type---------
                                            $sql = "INSERT INTO Audio(EvidenceId,Audio_Dir)
                                        VALUES($Evidence_OptionID,'$audio');";
                                            $result = mysqli_query($conn, $sql);
                                        } else {
                                            echo 'Size too large';
                                        }
                                    } else {
                                        echo 'Error uploading your file';
                                    }
                                } else {
                                    echo 'File type must be .wav or .mp4';
                                }
                            }
                            
                            unset($_POST['submit']);
                            header("Location:FIR.php?Entry=successful");
                        }
                    }
                    }
                }
            
        }
        
    }
}

//External validation
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>