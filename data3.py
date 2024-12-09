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
query = "SELECT * FROM res3"
cursor.execute(query)
data = cursor.fetchall()

# Define an HTML template string with placeholders for the data
html_template = """
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resume Form</title>
    <link rel="stylesheet" type="text/css" href="css/style3.css">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
 

</head>

<body>

    <div class="resume-box">
        <br />
        <div class="top-sec">
            <div class="top-left">
                <h2 class="name">{firstName} {lastName}</h2>
                <p class="n-p">{Profession}</p>
                <hr class="line" />
            </div>

            <div class="top-right">
                <p class="p1"><span class="span1"><img src="img/location.jpg"></span>Address<span> <br>{addr}</span></p>
                <p class="p1"><span class="span1"><img src="img/call.jpg"></span>Phone<span> <br>{Phone}</span>
                </p>
                <p class="p1"><span class="span1"><img src="img/mail.png"></span>Email<span> <br>{email}</span>
                </p>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="left-section">
            <div class="profile">
                <img src="..\online_resume_builder\image\{newImageName}">
            </div>
            <div class="info">
                <p class="heading">profile</p>
                <p class="inp">
                    {pro}
                </p>
            </div>

            <div class="info">
                <p class="heading">Education</p>
                <div class="edu">
                    <p>{deg1}</p>
                    <p><strong>{un1}</strong></p>
                </div>
                <div class="edu">
                    <p>{deg2}</p>
                    <p><strong>{un2}</strong></p>
                </div>

            </div>

            <div class="info">
                <p class="heading">Skills</p>
                <ul class="skill">
                    <li>{skill1} <span>{per1}</span></li>
                    <li>{skill2} <span>{per2}</span></li>
                    <li>{skill3} <span>{per3}</span></li>
                    <li>{skill4} <span>{per4}</span></li>
                    <li>{skill5} <span>{per5}</span></li>
                    <li>{skill6} <span>{per6}</span></li>
                </ul>
            </div>

        </div>

        <div class="right-section">

            <div class="s-box">
                <p><i class="ri-facebook-fill"></i>{face}</p>
                <p><i class="ri-twitter-fill"></i>{twitter}</p>
                <p><i class="ri-skype-fill"></i>{skype}</p>
                <p><i class="ri-linkedin-fill"></i>{linkdin}</p>
                <div class="clearfix"></div>
            </div>

            <div class="clearfix"></div>
            <br><br>
            <div class="right-heading">

                <p class="heading">Work Experience</p>
            </div>
            <div class="clearfix"></div>
            <div class="lr-box">
                <div class="left">
                    <p class="p4d">{y1}</p>

                </div>

                <div class="right">
                    <p class="p4">{post1}</p>
                    <p class="p5">{com1}</p>
                    <p class="p5">{info1}</p>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="lr-box">
                <div class="left">
                    <p class="p4d">{y2}</p>

                </div>

                <div class="right">
                    <p class="p4">{post2}</p>
                    <p class="p5">{com2}</p>
                    <p class="p5">{info2}</p>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="lr-box">
                <div class="left">
                    <p class="p4d">{y3}</p>

                </div>

                <div class="right">
                    <p class="p4">{post3}</p>
                    <p class="p5">{com3}</p>
                    <p class="p5">{info3}</p>
                </div>
                <div class="clearfix"></div>
            </div>


            <br>

            <div class="right-heading">

                <p class="heading">Employment History</p>
            </div>
            <div class="clearfix"></div>
            <div class="lr-box">
                <div class="left">
                    <p class="p4d">{y1}</p>

                </div>

                <div class="right">
                    <p class="p4">{post1}</p>
                    <p class="p5">{com1}</p>
                    <p class="p5">{info1}</p>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="lr-box">
                <div class="left">
                    <p class="p4d">{y2}</p>
                </div>

                <div class="right">
                    <p class="p4">{post2}</p>
                    <p class="p5">{com2}</p>
                    <p class="p5">{info2}</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <br>
        </div>
    </div>
    <div class="clearfix"></div>
</body>
</html>
"""
html = html_template.format(newImageName=data[0][0], firstName=data[0][1], lastName=data[0][2], Profession=data[0][3], pro=data[0][4], addr=data[0][5], Phone=data[0][6], email=data[0][7], deg1=data[0][8], un1=data[0][9], deg2=data[0][10], un2=data[0][11], skill1=data[0][12], skill2=data[0][13], skill3=data[0][14], skill4=data[0][15], skill5=data[0][16], skill6=data[0][17], per1=data[0]
                            [18], per2=data[0][19], per3=data[0][20], per4=data[0][21], per5=data[0][22], per6=data[0][23], face=data[0][24], twitter=data[0][25], skype=data[0][26], linkdin=data[0][27], y1=data[0][28], com1=data[0][29], post1=data[0][30], info1=data[0][31], y2=data[0][32], com2=data[0][33], post2=data[0][34], info2=data[0][35], y3=data[0][36], com3=data[0][37], post3=data[0][38], info3=data[0][39])
with open("output3.html", "w") as f:
    f.write(html)

# Open the output file in a web browser
webbrowser.open("output3.html")
# Close the database connection
cursor.close()
db.close()
