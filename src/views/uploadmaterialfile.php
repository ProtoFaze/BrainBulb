<?php
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BrainBulb</title>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <!-- <link rel="stylesheet" href="../styles/inputs.css"> -->
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
    .mat a{
        color: black;
        font-size: 30px;
    }

    .mat li{
        padding: 10px 0px;
        font-size: 30px;
    }

    .topic{
        margin: 30px;
        margin-left:50px;
    }

    .sub{
        margin: 0 40px;
    }

    .filedrop{
        display: flex;
        /* flex-direction: row; */
        justify-content: center;
        align-items: center;
        margin:50px;
    }

    .drag-area{
        /* margin-top: 50px; */
        border: 4px dashed black;
        height: 420px;
        width: 700px;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: lightgray;
    }
    .drag-area.active{
        border: 2px solid black;
    }
    .drag-area .icon{
        font-size: 100px;
        color: black;
    }
    .drag-area h1{
        font-size: 30px;
        font-weight: 500;
        color: black;
    }
    .drag-area span{
        font-size: 25px;
        font-weight: 500;
        color: black;
        margin: 10px 0 15px 0;
    }
    .drag-area button{
        padding: 10px 25px;
        font-size: 20px;
        font-weight: 500;
        border: none;
        outline: none;
        background: black;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }
    .drag-area img{
        height: 100%;
        width: 100%;
        object-fit: cover;
        border-radius: 5px;
    }

    #forms{
        
    }

    .inputform{
        /* margin-bottom: 50px; */
        /* margin: 0 auto; */
        text-align: center;
        /* width: 300px; */
    }

    #submitbutton, #gobackbutton{
        padding: 10px 25px;
        font-size: 20px;
        font-weight: 500;
        border: none;
        outline: none;
        background: black;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .input-field{
        padding: 10px;
        border-radius: 4px;
        font-size: 20px;
        font-weight: bold;
        /* margin: 8px 0; */
        box-sizing: border-box;
        border: 3px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
        width: 100%;
    }

    .input-field:focus{
        border: 3px solid #555;
    }
</style>
<script>
    function backgo(){
        location.href = "viewlearningmaterial.php";
    }
</script>
<body>
    <?php
        $a = $_SESSION['user_id'];
        include "../database/connect.php";
        include "../components/nav.php";
        if(isset($_GET['sub'])){
            $subs = $_GET['sub'];
        }
        else{
            echo "<script>location.href='viewlearningmaterial.php' </script>";
        }
    ?>
    <div class="big">
        <div class="topic">
            <h1 style="font-size:35px;">Upload Your Learning Materials For <?php echo $subs;?></h1>
        </div>
        <hr style="border: 2px solid black; margin:0 40px;">
        <div class="filedrop">
            <div class="drag-area">
                <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                <h1 class="text">Drag & Drop to Upload File</h1>
                <span>OR</span>
                <button>Browse File</button>
                <input type="file" name="file1" hidden>
            </div>    
        </div>
        <p style="font-size:20px; text-align:center;">*Only <i style="color:red;">.pdf, .docs and .ppt </i>format allow*</p>
        <div class="inputform">
            <div style="float: left; width: 33.33%;">
                <button id="gobackbutton" onclick="backgo()">Cancel</button>
            </div> 
            <form action="" method="post" id="forms">
                <div style="float: left; width: 33.33%;">
                    <input type="text" name="mattitle" id="" class="input-field" placeholder="Material Title">
                </div>
                <input type="hidden" name="hide" value="">
                <div style="float: left; width: 33.33%;">
                    <input type="submit" value="Upload" name="subbtn" id="submitbutton">
                </div>
            </form>
        </div>
        <div style="clear:both; height:60px;"></div>
    </div>
    <?php
        if(isset($_POST['subbtn'])){
            if($_POST['mattitle'] != ""){
                if($_POST["hide"] != ""){
                    $title = $_POST['mattitle'];
                    $filename = $_POST["hide"];
                    $date = date("Y-m-d");
                    $q = "INSERT INTO `learning_material`(`course_ID`, `teacher_ID`, `material_Title`, `filename`, `post_Material_Date`) VALUES ('$subs','$a','$title','$filename','$date')";
                    $results = mysqli_query($connection,$q);
                    if($results){
                        echo "<script> alert('Uploaded Sucessfully')</script>";
                        echo "<script>location.href='viewlearningmaterial.php' </script>";
                    }else{
                        echo "<script>alert('Uploaded Unsucessfully')</script>";
                    }
                }
                else{
                    echo "<script>alert('Please upload Material')</script>";
                }
            }
            else{
                echo "<script>alert('Please enter Material Title')</script>";
            }
        }
    ?>
    <script>        
        const dropArea = document.querySelector(".drag-area"),
        dragText = dropArea.querySelector(".text"),
        button = dropArea.querySelector("button"),
        input = dropArea.querySelector("input");
        let file; 

        button.onclick = ()=>{
            input.click(); 
        }

        input.addEventListener("change", function(){
            file = this.files[0];
            dropArea.classList.add("active");
            showFile(); 
        });

        dropArea.addEventListener("dragover", (event)=>{
            event.preventDefault();
            dropArea.classList.add("active");
            dragText.textContent = "Release to Upload File";
        });

        dropArea.addEventListener("dragleave", ()=>{
            dropArea.classList.remove("active");
            dragText.textContent = "Drag & Drop to Upload File";
        });

        dropArea.addEventListener("drop", (event)=>{
            event.preventDefault(); 
            file = event.dataTransfer.files[0];
            showFile();
        });

        function showFile(){
            let fileType = file.type; 
            let validExtensions = ["application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/pdf","application/vnd.openxmlformats-officedocument.presentationml.presentation"]; 
            console.log(fileType);
            if(validExtensions.includes(fileType)){
                var form = document.getElementById("forms");
                var hiddenInput = form.querySelector('input[name="hide"]');
                hiddenInput.value = file.name;
                dropArea.innerHTML = "<img src='../../images/accept.png' style='width:90px; height:auto;'><h1>File Recognised</h1>";
            }else{
                alert("This is not a Valid File");
                dropArea.classList.remove("active");
                dragText.textContent = "Drag & Drop to Upload File";
            }
        }
    </script>
    <?php
        mysqli_close($connection);
    ?>
</body>
</html>