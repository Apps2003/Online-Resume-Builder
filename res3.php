<?php
require 'connection.php';
if(isset($_POST["submit"])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Profession = $_POST['Profession'];
    $pro = $_POST['pro'];
    $addr = $_POST['addr'];
    $Phone = $_POST['Phone'];
    $email = $_POST['email'];
    $deg1 = $_POST['deg1'];
    $un1 = $_POST['un1'];
    $deg2 = $_POST['deg2'];
    $un2 = $_POST['un2'];
    $skill1 = $_POST['skill1'];
    $skill2 = $_POST['skill2'];
    $skill3 = $_POST['skill3'];
    $skill4 = $_POST['skill4'];
    $skill5 = $_POST['skill5'];
    $skill6 = $_POST['skill6'];
    $per1 = $_POST['per1'];
    $per2 = $_POST['per2'];
    $per3 = $_POST['per3'];
    $per4 = $_POST['per4'];
    $per5 = $_POST['per5'];
    $per6 = $_POST['per6'];
    $face = $_POST['face'];
    $twitter = $_POST['twitter'];
    $skype = $_POST['skype'];
    $linkdin = $_POST['linkdin'];
    $y1 = $_POST['y1'];
    $com1 = $_POST['com1'];
    $post1 = $_POST['post1'];
    $info1 = $_POST['info1'];
    $y2 = $_POST['y2'];
    $com2 = $_POST['com2'];
    $post2 = $_POST['post2'];
    $info2 = $_POST['info2'];
    $y3 = $_POST['y3'];
    $com3 = $_POST['com3'];
    $post3 = $_POST['post3'];
    $info3 = $_POST['info3'];
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
            $stmt = $conn->prepare("INSERT INTO res3 (newImageName, firstName ,lastName, Profession, pro, addr, Phone, email, deg1, un1, deg2, un2, skill1, skill2, skill3, skill4, skill5, skill6, per1, per2, per3, per4, per5, per6, face, twitter, skype, linkdin, y1, com1, post1, info1, y2, com2, post2, info2, y3, com3, post3, info3)
            values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssisssssssssssssssssssssssssssssssss", $newImageName, $firstName, $lastName, $Profession, $pro, $addr, $Phone, $email, $deg1, $un1, $deg2, $un2, $skill1, $skill2, $skill3, $skill4, $skill5, $skill6, $per1, $per2, $per3, $per4, $per5, $per6, $face, $twitter, $skype, $linkdin, $y1, $com1, $post1, $info1, $y2, $com2, $post2, $info2, $y3, $com3, $post3, $info3);
            $stmt->execute();
            
            echo
            "<script> alert('Successfully Added');
            </script>";
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
            <form action="" method="POST" enctype="multipart/form-data">
                
                <div class="input_field">
                    <label for="newImageName">
                        Upload your photo
                    </label>
                        <input type="file" class="input" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
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
                    <label for="addr">
                        Address
                    </label>
                    <input type="text" class="input" id="addr" name="addr">
                </div>
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
                    <label for="face">
                        Facebook
                    </label>
                    <input type="text" class="input" id="face" name="face">
                </div>
                <div class="input_field">
                    <label for="twitter">
                        Twitter
                    </label>
                    <input type="text" class="input" id="twitter" name="twitter">
                </div>
                <div class="input_field">
                    <label for="skype">
                        Skype
                    </label>
                    <input type="text" class="input" id="skype" name="skype">
                </div>
                <div class="input_field">
                    <label for="linkdin">
                        Linkdin
                    </label>
                    <input type="text" class="input" id="linkdin" name="linkdin">
                </div>
                <center>
                    <h3>Enter your educational details</h3>
                    <p>Please write Year with degree (eg. 2010-2114,BCA)</p>
                </center></br>
                <div class="input_field">
                    <label for="deg1">
                        Education
                        (Master's Degree)
                    </label>
                    <input type="text" class="input" id="deg1" name="deg1">
                </div>
                <div class="input_field">
                    <label for="un1">
                        University Name 1
                    </label>
                    <input type="un1" class="input" id="un1" name="un1">
                </div><br>
                <div class="input_field">
                    <label for="deg2">
                        Education
                        (Bachelor's Degree)
                    </label>
                    <input type="text" class="input" id="deg2" name="deg2">
                </div>
                <div class="input_field">
                    <label for="un2">
                        University Name 2
                    </label>
                    <input type="un2" class="input" id="un2" name="un2">
                </div><br>
                <center>
                    <h3>Enter your Professional Skills</h3>
                    <p>Please tell us how much do you know in percentage.</p>
                </center><br> 
                <div class="input_field">
                    <label for="skill1">
                        Skill 1
                    </label>
                    <input type="text" id="skill1" name="skill1" class="input">
                </div>
                <div class="input_field">
                    <label for="per1">
                        Percentage
                    </label>
                    <input type="text" id="per1" name="per1" class="input">
                </div>
                <div class="input_field">
                    <label for="skill2">
                        Skill 2
                    </label>
                    <input type="text" id="skill2" name="skill2" class="input">
                </div>
                <div class="input_field">
                    <label for="per2">
                        Percentage
                    </label>
                    <input type="text" id="per2" name="per2" class="input">
                </div>
                <div class="input_field">
                    <label for="skill3">
                        Skill 3
                    </label>
                    <input type="text" id="skill3" name="skill3" class="input">
                </div>
                <div class="input_field">
                    <label for="per3">
                    Percentage
                    </label>
                    <input type="text" id="per3" name="per3" class="input">
                </div>
                <div class="input_field">
                    <label for="skill4">
                        Skill 4
                    </label>
                    <input type="text" id="skill4" name="skill4" class="input">
                </div>
                <div class="input_field">
                    <label for="per4">
                    Percentage
                    </label>
                    <input type="text" id="per4" name="per4" class="input">
                </div>
                <div class="input_field">
                    <label for="skill5">
                        Skill 5
                    </label>
                    <input type="text" id="skill5" name="skill5" class="input">
                </div>
                <div class="input_field">
                    <label for="per5">
                    Percentage
                    </label>
                    <input type="text" id="per5" name="per5" class="input">
                </div>
                <div class="input_field">
                    <label for="skill6">
                        Skill 6
                    </label>
                    <input type="text" id="skill6" name="skill6" class="input">
                </div>
                <div class="input_field">
                    <label for="per6">
                        Percentage
                    </label>
                    <input type="text" id="per6" name="per6" class="input">
                </div>
                <center>
                    <h3>Experience</h3>
                </center>
                <div class="input_field">
                    <label for="y1">
                        Year
                    </label>
                    <input type="text" class="input" id="y1" name="y1">
                </div>
                <div class="input_field">
                    <label for="com1">
                        Company Name 1
                    </label>
                    <input type="text" class="input" id="com1" name="com1">
                </div>
                <div class="input_field">
                    <label for="post1">
                        Position
                    </label>
                    <input type="post1" class="input" id="post1" name="post1">
                </div>
                <div class="input_field">
                    <label for="info1">
                        Information
                    </label>
                    <textarea name="info1" id="info1" name="info1" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <div class="input_field">
                    <label for="y2">
                        Year
                    </label>
                    <input type="text" class="input" id="y2" name="y2">
                </div>
                <div class="input_field">
                    <label for="com2">
                        Company Name 2
                    </label>
                    <input type="text" class="input" id="com2" name="com2">
                </div>
                <div class="input_field">
                    <label for="post2">
                        Position
                    </label>
                    <input type="post2" class="input" id="post2" name="post2">
                </div>
                <div class="input_field">
                    <label for="info2">
                        Information
                    </label>
                    <textarea name="info2" id="info2" name="info2" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <div class="input_field">
                    <label for="y3">
                        Year
                    </label>
                    <input type="text" class="input" id="y3" name="y3">
                </div>
                <div class="input_field">
                    <label for="com3">
                        Company Name 3
                    </label>
                    <input type="text" class="input" id="com3" name="com3">
                </div>
                <div class="input_field">
                    <label for="post3">
                        Position
                    </label>
                    <input type="post3" class="input" id="post3" name="post3">
                </div>
                <div class="input_field">
                    <label for="info3">
                        Information
                    </label>
                    <textarea name="info3" id="info3" name="info3" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <div class="input_field_terms">
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