
<?php
require 'connection.php';
if(isset($_POST["submit"])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Profession = $_POST['Profession'];
    $pro = $_POST['pro'];
    $Phone = $_POST['Phone'];
    $email = $_POST['email'];
    $addr = $_POST['addr'];
    $skill1 = $_POST['skill1'];
    $skill2 = $_POST['skill2'];
    $skill3 = $_POST['skill3'];
    $skill4 = $_POST['skill4'];
    $skill5 = $_POST['skill5'];
    $skill6 = $_POST['skill6'];
    $award1 = $_POST['award1'];
    $award2 = $_POST['award2'];
    $award3 = $_POST['award3'];
    $award4 = $_POST['award4'];
    $award5 = $_POST['award5'];
    $lan1 = $_POST['lan1'];
    $lan2 = $_POST['lan2'];
    $lan3 = $_POST['lan3'];
    $exp1 = $_POST['exp1'];
    $info1 = $_POST['info1'];
    $exp2 = $_POST['exp2'];
    $info2 = $_POST['info2'];
    $exp3 = $_POST['exp3'];
    $info3 = $_POST['info3'];
    $edu1 = $_POST['edu1'];
    $edu2 = $_POST['edu2'];
    $edu3 = $_POST['edu3'];
    if($_FILES["image"]["error"] === 4){
        echo 
        "<script> alert('Image does not exist');</script>"
        ;
    }
    else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];

        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if(!in_array($imageExtension, $validImageExtension)){
            echo
            "<script> alert('Invalid Image Extension');</script>"
            ;
        }
        else if($fileSize > 1000000){
            echo
            "<script> alert('Image size is too large');</script>"
            ;
        }
        else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpName, 'image/' . $newImageName);
            $stmt = $conn->prepare("INSERT INTO res2(newImageName, firstName ,lastName, Profession, pro, Phone, email, addr, skill1, skill2, skill3, skill4, skill5, skill6, award1, award2, award3, award4, award5, lan1, lan2, lan3, exp1, info1, exp2, info2, exp3, info3, edu1, edu2, edu3)
            values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssisssssssssssssssssssssssss", $newImageName, $firstName, $lastName, $Profession, $pro, $Phone, $email, $addr, $skill1, $skill2, $skill3, $skill4, $skill5, $skill6, $award1, $award2, $award3, $award4, $award5, $lan1, $lan2, $lan3, $exp1, $info1, $exp2, $info2, $exp3, $info3, $edu1, $edu2, $edu3);
            $stmt->execute();
            
            echo
            "<script> alert('Successfully Added');
            </script>"
            ;
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Form</title>
</head>
<style>
    table,
    td {
        border: 1px solid black;
    }
</style>

<body>
    <div class="container">
        <div class="title">
            requried details
        </div>
        <div class="form">
            <form action="res2.php" method="POST" enctype="multipart/form-data">
                
                <div class="input_field">
                    <label for="image">
                        Upload your photo
                    </label>    
                        <input type="file" class="input" name="image" id="image">
                        <input type="submit" value="Upload Image" name="submit">
                    
                    <script>
                        const fileInput = document.getElementById('file-input');

                        fileInput.addEventListener('change', (e) =>
                            doSomethingWithFiles(e.target.files),
                        );    
                    </script> 
                </div>
            <br>
                <div class="input_field">
                    <label for="firstName">
                        First Name
                    </label>
                    <input type="text" class="input" id="firstName" name="firstName">
                </div>
                <div class="input_field">
                    <label for="lastName">
                        Last Name
                    </label>
                    <input type="text" class="input" id="lastName" name="lastName">
                </div>
                <div class="input_field">
                    <label for="Profession">
                        Profession
                    </label>
                    <input type="text" class="input" id="Profession" name="Profession">
                </div>
                <div class="input_field">
                    <label for="pro">
                        Profile Information
                    </label>
                    <textarea name="pro" id="pro" name="pro" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <center>
                    <h3>Enter your contact details</h3>
                </center></br>
                <div class="input_field">
                    <label for="Phone">
                        Phone Number
                    </label>
                    <input type="text" class="input" id="Phone" name="Phone">
                </div>
                <div class="input_field">
                    <label for="email">
                        Email
                    </label>
                    <input type="text" class="input" id="email" name="email">
                </div> 
                <div class="input_field">
                    <label for="addr">
                        Address
                    </label>
                    <textarea name="addr" id="addr" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <center>
                    <h3>Enter your Professional Skills</h3>
                </center><br> 
                <div class="input_field">
                    <label for="skill1">
                        Skill 1
                    </label>
                    <input type="text" id="skill1" name="skill1" class="input">
                </div>
                <div class="input_field">
                    <label for="skill2">
                        Skill 2
                    </label>
                    <input type="text" id="skill2" name="skill2" class="input">
                </div>
                <div class="input_field">
                    <label for="skill3">
                        Skill 3
                    </label>
                    <input type="text" id="skill3" name="skill3" class="input">
                </div>
                <div class="input_field">
                    <label for="skill4">
                        Skill 4
                    </label>
                    <input type="text" id="skill4" name="skill4" class="input">
                </div>
                <div class="input_field">
                    <label for="skill5">
                        Skill 5
                    </label>
                    <input type="text" id="skill5" name="skill5" class="input">
                </div>
                <div class="input_field">
                    <label for="skill6">
                        Skill 6
                    </label>
                    <input type="text" id="skill6" name="skill6" class="input">
                </div>
                <center>
                    <h3>Enter your Awards</h3>
                </center>
                <div class="input_field">
                    <label for="award1">
                        Award 1
                    </label>
                    <input type="text" id="award1" name="award1" class="input">
                </div>
                <div class="input_field">
                    <label for="award2">
                        Award 2
                    </label>
                    <input type="text" id="award2" name="award2" class="input">
                </div>
                <div class="input_field">
                    <label for="award3">
                        Award 3
                    </label>
                    <input type="text" id="award3" name="award3" class="input">
                </div>
                <div class="input_field">
                    <label for="award4">
                        Award 4
                    </label>
                    <input type="text" id="award4" name="award4" class="input">
                </div>
                <div class="input_field">
                    <label for="award5">
                        Award 5
                    </label>
                    <input type="text" id="award5" name="award5" class="input">
                </div>
                <center>
                    <h3>Which Languages do you know</h3>
                </center></br>
                <div class="input_field">
                    <label for="lan1">
                        Language 1
                    </label>
                    <input type="text" class="input" id="lan1" name="lan1">
                </div>
                <div class="input_field">
                    <label for="lan2">
                        Language 2
                    </label>
                    <input type="text" class="input" id="lan2" name="lan2">
                </div>
                <div class="input_field">
                    <label for="lan3">
                        Language 3
                    </label>
                    <input type="text" class="input" id="lan3" name="lan3">
                </div>
                <center>
                    <h3>Experience</h3>
                    Write your experience in format of :-Position with Company Name(year) (For eg. UI Designer in Lorem(2012-2014))
                    <p></p>
                </center>
                <div class="input_field">
                    <label for="exp1">
                        Experience 1
                    </label>
                    <input type="text" class="input" id="exp1" name="exp1">
                </div>
                <div class="input_field">
                    <label for="info1">
                        Information
                    </label>
                    <textarea name="info1" id="info1" name="info1" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <div class="input_field">
                    <label for="exp2">
                        Experience 2
                    </label>
                    <input type="text" class="input" id="exp2" name="exp2">
                </div>
                <div class="input_field">
                    <label for="info2">
                        Information
                    </label>
                    <textarea name="info2" id="info2" name="info2" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <div class="input_field">
                    <label for="exp3">
                        Experience 3
                    </label>
                    <input type="text" class="input" id="exp3" name="exp3">
                </div>
                <div class="input_field">
                    <label for="info3">
                        Information
                    </label>
                    <textarea name="info3" id="info3" name="info3" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <center>
                    <h3>Enter your educational details</h3>
                    <p>Enter your Education with year.(For eg. Bachelor of Computer Application(2013-2015))</p>
                </center></br>

                <div class="input_field">
                    <label for="edu1">
                        Details about high school
                    </label>
                    <input type="text" class="input" id="edu1" name="edu1">
                </div>
                <div class="input_field">
                    <label for="edu2">
                        Details about Degree
                    </label>
                    <input type="text" class="input" id="edu2" name="edu2">
                </div>
                <div class="input_field">
                    <label for="edu3">
                        Details about Master Degree
                    </label>
                    <input type="text" class="input" id="edu3" name="edu3">
                </div>
                
                
                <div class="input_field terms">
                    <label class="check">
                        <input type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                    <p>Agree to terms and conditions</p>
                </div>
                <div class="input_field">
                    <input type="submit" value="Submit" name="submit" class="btn">
                </div>
            </form>
        </div>
    </div>
</body>

</html>