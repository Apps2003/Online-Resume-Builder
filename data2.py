import mysql.connector
import webbrowser
import base64
import binascii
# Establish a connection to the database
db = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="resume"
)
# Create a cursor object
cursor = db.cursor()
# Execute a query to retrieve the data from the database
query = "SELECT * FROM res2"
cursor.execute(query)
data = cursor.fetchall()

# Define an HTML template string with placeholders for the data
html_template = """
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume Form</title>
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
    <div class="main">
        <div class="top-section">
           <img src="..\online_resume_builder\image\{newImageName}" class="profile"> 
           <p class="p1">{firstName}
            <span>{lastName}</span>
           </p>
           <p class="p2">{Profession}</p>
        </div>
        <div class="clearfix">

        </div>

        <div class="col-div-4">
            <div class="content-box" style="padding-left: 40px;">
                <p class="head">Contact</p>
                <p class="p3"><i class="ri-phone-fill"></i>&nbsp;&nbsp;{Phone}
                </p>
                <p class="p3"><i class="ri-mail-fill"></i>&nbsp;&nbsp;{email}
                </p>
                <p class="p3"><i class="ri-home-4-fill"></i>&nbsp;&nbsp;{addr}
                </p>

            </br>
            <p class="head">My Skills</p>
            <ul class="skills">
                <li>
                    <span>{skill1}</span>
                </li>
                <li>
                    <span>{skill2}</span>
                </li>
                <li>
                    <span>{skill3}</span>
                </li>
                <li>
                    <span>{skill4}</span>
                </li>
                <li>
                    <span>{skill5}</span>
                </li>
                <li>
                    <span>{skill6}</span>
                </li>
            </ul>
            <br/>
            <p class="head">awards</p>
            <p class="p3">{award1}</p>
            <p class="p3">{award2}</p>
            <p class="p3">{award3}</p>
            <p class="p3">{award4}</p>
            <p class="p3">{award5}</p>
        </br>
        <p class="head">Languages</p>
        <p class="p3">{lan1}</p>
        <p class="p3">{lan2}</p>
        <p class="p3">{lan3}</p>
            </div>
        </div>
        <div class="line"></div>
        <div class="col-div-8">
            <div class="content-box">
                <p class="head">Profile</p>
            <p class="p3" style="font-size: 14px;">{pro}</p>
        </br>
        <p class="head">experience</p> 
        <p>{exp1}</p>
        <p class="p-4">{info1}</p>
        <p>{exp2}</p>
        <p class="p-4">{info2}</p> 
        <p>{exp3}</p>
        <p class="p-4">{info3}</p>  
        <p class="head">education</p>
        <p class="p-4">{edu1}
        </br>{edu2}
        </br>{edu3}</p>
        </div>
        </div>

    </div>
</body>
</html>
"""
html = html_template.format(newImageName=data[0][0], firstName=data[0][1], lastName=data[0][2], Profession=data[0][3], pro=data[0][4], Phone=data[0][5], email=data[0][6], addr=data[0][7], skill1=data[0][8], skill2=data[0][9], skill3=data[0][10], skill4=data[0][11], skill5=data[0][12], skill6=data[0][13], award1=data[0][14], award2=data[0][15], award3=data[0][16], award4=data[0][17], award5=data[0][18], lan1=data[0][19], lan2=data[0][20], lan3=data[0][21], exp1=data[0][22], info1=data[0][23], exp2=data[0][24], info2=data[0][25], exp3=data[0][26], info3=data[0][27], edu1=data[0][28], edu2=data[0][29], edu3=data[0][30])
with open("output2.html", "w") as f:
    f.write(html)
# Open the output file in a web browser
webbrowser.open("output2.html")
# Close the database connection
cursor.close()
db.close()