<?php
require 'connection.php';
if(isset($_POST["submit"])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Profession = $_POST['Profession'];
    $pro = $_POST['pro'];
    $awd1 = $_POST['awd1'];
    $ainfo1 = $_POST['ainfo1'];
    $awd2 = $_POST['awd2'];
    $ainfo2 = $_POST['ainfo2'];
    $addr = $_POST['addr'];
    $Phone = $_POST['Phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $post1 = $_POST['post1'];
    $y1 = $_POST['y1'];
    $info1 = $_POST['info1'];
    $post2 = $_POST['post2'];
    $y2 = $_POST['y2'];
    $info2 = $_POST['info2'];
    $post3 = $_POST['post3'];
    $y3 = $_POST['y3'];
    $info3 = $_POST['info3'];
    $uni1 = $_POST['uni1'];
    $ye1 = $_POST['ye1'];
    $uinfo1 = $_POST['uinfo1'];
    $uni2 = $_POST['uni2'];
    $ye2 = $_POST['ye2'];
    $uinfo2 = $_POST['uinfo2'];
    $skill1 = $_POST['skill1'];
    $p1 = $_POST['p1'];
    $skill2 = $_POST['skill2'];
    $p2 = $_POST['p2'];
    $skill3 = $_POST['skill3'];
    $p3 = $_POST['p3'];
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
            $stmt = $conn->prepare("INSERT INTO res6 (newImageName, firstName ,lastName, Profession, pro, awd1, ainfo1, awd2, ainfo2, addr, Phone, email, website, post1, y1, info1, post2, y2, info2, post3, y3, info3, uni1, ye1, uinfo1, uni2, ye2, uinfo2, skill1, p1, skill2, p2, skill3, p3)
            values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssssssissssssssssssssssssisisi", $newImageName, $firstName, $lastName, $Profession, $pro, $awd1, $ainfo1, $awd2, $ainfo2, $addr, $Phone, $email, $website, $post1, $y1, $info1, $post2, $y2, $info2, $post3, $y3, $info3, $uni1, $ye1, $uinfo1, $uni2, $ye2, $uinfo2, $skill1, $p1, $skill2, $p2, $skill3, $p3);
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
                    <h3>Awards</h3>
                </center></br>
                <div class="input_field">
                    <label for="awd1">
                        Award 1
                    </label>
                    <input type="text" class="input" id="awd1" name="awd1">
                </div>
                <div class="input_field">
                    <label for="ainfo1">
                        Information about it
                    </label>
                    <input type="text" class="input" id="ainfo1" name="ainfo1">
                </div>
                <div class="input_field">
                    <label for="awd2">
                    Award 2
                    </label>
                    <input type="text" class="input" id="awd2" name="awd2">
                </div>
                <div class="input_field">
                    <label for="ainfo2">
                    Information about it
                    </label>
                    <input type="text" class="input" id="ainfo2" name="ainfo2">
                </div>
                <center>
                    <h3>Enter your contact details</h3>
                </center></br>
                <div class="input_field">
                    <label for="addr">
                        Address
                    </label>
                    <input type="text" class="input" name="addr" id="addr">
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
                    <label for="website">
                        Website
                    </label>
                    <input type="text" class="input" id="website" name="website">
                </div>
                <center>
                    <h3>Experience</h3>
                    <p>Please write Position with company name(eg.UI Designer In Lorem Ipsum)</p>
                </center>
                <div class="input_field">
                    <label for="post1">
                        Position
                    </label>
                    <input type="post1" class="input" id="post1" name="post1">
                </div>
                <div class="input_field">
                    <label for="y1">
                        Year
                    </label>
                    <input type="text" class="input" id="y1" name="y1">
                </div>
                <div class="input_field">
                    <label for="info1">
                        Information
                    </label>
                    <textarea name="info1" id="info1" name="info1" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <div class="input_field">
                    <label for="post2">
                        Position
                    </label>
                    <input type="post2" class="input" id="post2" name="post2">
                </div>
                <div class="input_field">
                    <label for="y2">
                        Year
                    </label>
                    <input type="text" class="input" id="y2" name="y2">
                </div>
                <div class="input_field">
                    <label for="info2">
                        Information
                    </label>
                    <textarea name="info2" id="info2" name="info2" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <div class="input_field">
                    <label for="post3">
                        Position
                    </label>
                    <input type="post3" class="input" id="post3" name="post3">
                </div>
                <div class="input_field">
                    <label for="y3">
                        Year
                    </label>
                    <input type="text" class="input" id="y3" name="y3">
                </div>
                <div class="input_field">
                    <label for="info3">
                        Information
                    </label>
                    <textarea name="info3" id="info3" name="info3" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <center>
                    <h3>Enter your educational details</h3>
                </center></br>
                <div class="input_field">
                    <label for="uni1">
                    Education(Master's Degree)
                    </label>
                    <input type="text" class="input" id="uni1" name="uni1">
                </div>
                <div class="input_field">
                    <label for="ye1">
                        Year
                    </label>
                    <input type="text" class="input" id="ye1" name="ye1">
                </div>
                <div class="input_field">
                    <label for="uinfo1">
                        Information
                    </label>
                    <input type="text" class="input" id="uinfo1" name="uinfo1">
                </div>
                <br>
                <div class="input_field">
                    <label for="uni2">
                        Education(Bachelor's Degree)
                    </label>
                    <input type="text" class="input" id="uni2" name="uni2">
                </div>
                <div class="input_field">
                    <label for="ye2">
                        Year
                    </label>
                    <input type="text" class="input" id="ye2" name="ye2">
                </div>
                <div class="input_field">
                    <label for="uinfo2">
                        Information
                    </label>
                    <input type="text" class="input" id="uinfo2" name="uinfo2">
                </div>
                <br>
                <center>
                    <h3>Professional Skills</h3>
                    <p>How much knowledge do you have?(Please enter number in percentage eg.60)</p>
                </center><br>
                <div class="input_field">
                    <label for="skill1">
                        Skill 1
                    </label>
                    <input type="text" id="skill1" name="skill1" class="input">
                </div>
                <div class="input_field">
                    <label for="p1">
                    Percentage
                    </label>
                    <input type="text" id="p1" name="p1" class="input">
                </div>
                <div class="input_field">
                    <label for="skill2">
                        Skill 2
                    </label>
                    <input type="text" id="skill2" name="skill2" class="input">
                </div>
                <div class="input_field">
                    <label for="p2">
                    Percentage
                    </label>
                    <input type="text" id="p2" name="p2" class="input">
                </div>
                <div class="input_field">
                    <label for="skill3">
                        Skill 3
                    </label>
                    <input type="text" id="skill3" name="skill3" class="input">
                </div>
                <div class="input_field">
                    <label for="p3">
                        Percentage
                    </label>
                    <input type="text" id="p3" name="p3" class="input">
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