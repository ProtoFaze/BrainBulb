<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../../images/brainlogo3.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>BrainBulb</title>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
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
    }

    .drag-area{
        margin-top: 50px;
        border: 2px dashed black;
        height: 500px;
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
        background: #fff;
        color: #0fb8ac;
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
</style>
<script>
    function backgo(){
        location.href = "viewlearningmaterial.php";
    }
</script>
<body>
    <?php
        $a = "TC00000002";
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
        <div>
            <form action="" method="post" id="forms">
                <input type="text" name="mattitle" id="">
                <input type="hidden" name="hide" value="">
                <input type="submit" value="Submit" name="subbtn">
            </form>
            <button onclick="backgo()">Cancel</button>
        </div>
    </div>
    <?php
        if(isset($_POST['subbtn'])){
            $title = $_POST['mattitle'];
            $subtops = $_POST['subtop'];
            $filename = $_POST["hide"];
            $date = date("Y-m-d");
            $q = "INSERT INTO `learning_material`(`course_ID`, `teacher_ID`, `material_Title`, `filename`, `post_Material_Date`) VALUES ('$subs','$a','$title','$filename','$date')";
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
            let validExtensions = ["application/msword","application/pdf"]; 
            if(validExtensions.includes(fileType)){
                console.log(file.name);
                var form = document.getElementById("forms");
                var hiddenInput = form.querySelector('input[name="hide"]');
                hiddenInput.value = file.name;
                dropArea.innerHTML = "<h1>Uploaded Successfully</h1>"; //adding that created img tag inside dropArea container
            }else{
                alert("This is not an Image File!");
                dropArea.classList.remove("active");
                dragText.textContent = "Drag & Drop to Upload File";
            }
        }
    </script>
</body>
</html>