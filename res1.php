<?php
require 'connection.php';
if(isset($_POST["submit"])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $Profession = $_POST['Profession'];
    $pro = $_POST['pro'];
    $Phone = $_POST['Phone'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $linkdin = $_POST['linkdin'];
    $addr = $_POST['addr'];
    $ye1 = $_POST['ye1'];
    $deg1 = $_POST['deg1'];
    $un1 = $_POST['un1'];
    $ye2 = $_POST['ye2'];
    $deg2 = $_POST['deg2'];
    $un2 = $_POST['un2'];
    $ye3 = $_POST['ye3'];
    $deg3 = $_POST['deg3'];
    $un3 = $_POST['un3'];
    $eng = $_POST['eng'];
    $spa = $_POST['spa'];
    $hin = $_POST['hin'];
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
    $html = $_POST['html'];
    $css = $_POST['css'];
    $java = $_POST['java'];
    $photoshop = $_POST['photoshop'];
    $ill = $_POST['ill'];
    $adobe = $_POST['adobe'];
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
            $stmt = $conn->prepare("INSERT INTO res1 (newImageName, firstName ,lastName, Profession, pro, Phone, email, website, linkdin, addr, ye1, deg1, un1, ye2, deg2, un2, ye3, deg3, un3, eng, spa, hin, y1, com1, post1, info1, y2, com2, post2, info2, y3, com3, post3, info3, html, css, java, photoshop, ill, adobe)
            values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssisssssssssssssiiissssssssssssiiiiii", $newImageName, $firstName, $lastName, $Profession, $pro, $Phone, $email, $website, $linkdin, $addr, $ye1, $deg1, $un1, $ye2, $deg2, $un2, $ye3, $deg3, $un3, $eng, $spa, $hin, $y1, $com1, $post1, $info1, $y2, $com2, $post2, $info2, $y3, $com3, $post3, $info3, $html, $css, $java, $photoshop, $ill, $adobe);
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
                <div class="input_field">
                    <label for="linkdin">
                        Linkdin
                    </label>
                    <input type="text" class="input" id="linkdin" name="linkdin">
                </div>
                <div class="input_field">
                    <label for="addr">
                        Address
                    </label>
                    <textarea name="addr" id="addr" cols="21" rows="3" style="height: 57px; width: 446px;"></textarea>
                </div>
                <center>
                    <h3>Enter your educational details</h3>
                </center></br>

                <div class="input_field">
                    <label for="ye1">
                        Year
                    </label>
                    <input type="text" class="input" id="ye1" name="ye1">
                </div>
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
                    <label for="ye2">
                        Year
                    </label>
                    <input type="text" class="input" id="ye2" name="ye2">
                </div>
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
                <div class="input_field">
                    <label for="ye3">
                        Year
                    </label>
                    <input type="text" class="input" id="ye3" name="ye3">
                </div>
                <div class="input_field">
                    <label for="deg3">
                        Education
                        (Matriculation)
                    </label>
                    <input type="text" class="input" id="deg3" name="deg3">
                </div>
                <div class="input_field">
                    <label for="un3">
                        University Name 3
                    </label>
                    <input type="un3" class="input" id="un3" name="un3">
                </div>
                <center>
                    <h3>Languages</h3>
                    <p>How much knowledge do you have?(Please enter number in percentage eg.60)</p>
                </center></br>
                <div class="input_field">
                    <label for="eng">
                        English
                    </label>
                    <input type="text" class="input" id="eng" name="eng">
                </div>
                <div class="input_field">
                    <label for="spa">
                        Spanish
                    </label>
                    <input type="text" class="input" id="spa" name="spa">
                </div>
                <div class="input_field">
                    <label for="hin">
                        Hindi
                    </label>
                    <input type="text" class="input" id="hin" name="hin">
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
                <center>
                    <h3>Professional Skills</h3>
                    <p>How much knowledge do you have?(Please enter number in percentage eg.60)</p>
                </center><br>
                <div class="input_field">
                    <label for="html">
                        HTML
                    </label>
                    <input type="text" id="html" name="html" class="input">
                </div>
                <div class="input_field">
                    <label for="css">
                        CSS
                    </label>
                    <input type="text" id="css" name="css" class="input">
                </div>
                <div class="input_field">
                    <label for="java">
                        JAVASCRIPT
                    </label>
                    <input type="text" id="java" name="java" class="input">
                </div>
                <div class="input_field">
                    <label for="photoshop">
                        PHOTOSHOP
                    </label>
                    <input type="text" id="photoshop" name="photoshop" class="input">
                </div>
                <div class="input_field">
                    <label for="ill">
                        ILLUSTRATION
                    </label>
                    <input type="text" id="ill" name="ill" class="input">
                </div>
                <div class="input_field">
                    <label for="adobe">
                        ADOBE XD
                    </label>
                    <input type="text" id="adobe" name="adobe" class="input">
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