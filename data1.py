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
query = "SELECT * FROM res1"
cursor.execute(query)
data = cursor.fetchall()

# Define an HTML template string with placeholders for the data
html_template = """
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width ,initial-scale=1.0">
    <title>
        Responsive CV
    </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="css/style1.css">
</head>
<body>
    <div class="container">
        <div class="left_side">
            <div class="profileText">
                <div class="img8x">
                    <img src="..\online_resume_builder\image\{newImageName}">
                    
                </div>
                <h2>{firstName} {lastName}<br><span>{Profession}</span></h2>
            </div>
            <div class="contactInfo">
                <h3 class="title">Contact Info</h3>
                <ul>
                    <li>
                        <span class="icon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        <span class="text">{Phone}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                        <span class="text">{email}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-globe" aria-hidden="true"></i></span>
                        <span class="text">{website}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-linkedin" aria-hidden="true"></i></span>
                        <span class="text">{linkdin}</span>
                    </li>
                    <li>
                        <span class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                        <span class="text">{addr}</span>
                    </li>
                </ul>
            </div>
            <div class="contactInfo education">
                <h3 class="title">Education</h3>
                <ul>
                    <li>
                        <h5>{ye1}</h5>
                        <h4>{deg1}</h4>
                        <h4>{un1}</h4>
                    </li>
                    <li>
                        <h5>{ye2}</h5>
                        <h4>{deg2}</h4>
                        <h4>{un2}</h4>
                    </li>
                    <li>
                        <h5>{ye3}</h5>
                        <h4>{deg3}</h4>
                        <h4>{un3}</h4>
                    </li>
                </ul>
            </div>

            <div class="contactInfo language">
                <h3 class="title">Languages</h3>
                <ul>
                    <li>
                        <span class="text">English</span>
                        <span class="percent">
                            <div style="width:{eng}%;"></div>
                        </span>
                    </li>
                    <li>
                        <span class="text">Spanish</span>
                        <span class="percent">
                            <div style="width:{spa}%;"></div>
                        </span>
                    </li>
                    <li>
                        <span class="text">Hindi</span>
                        <span class="percent">
                            <div style="width:{hin}%;"></div>
                        </span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="right_side">
            <div class="about">
                <h2 class="title2">Profile</h2>
                <p>
                    {pro}
                </p>
            </div>
            <div class="about">
                <h2 class="title2">Experience</h2>
                <div class="box">
                    <div class="year_company">
                        <h5>{y1}</h5>
                        <h5>{com1}</h5>
                    </div>
                    <div class="text">
                        <h4>{post1}</h4>
                        <p>{info1}</p>
                    </div>
                </div>

                <div class="box">
                    <div class="year_company">
                        <h5>{y2}</h5>
                        <h5>{com2}</h5>
                    </div>
                    <div class="text">
                        <h4>{post2}</h4>
                        <p>{info2}</p>
                    </div>
                </div>
                <div class="box">
                    <div class="year_company">
                        <h5>{y3}</h5>
                        <h5>{com3}</h5>
                    </div>
                    <div class="text">
                        <h4>{post3}</h4>
                        <p>{info3}</p>
                    </div>
                </div>
            </div>
            <div class="about skills">
                <h2 class="title2">Professional Skills</h2>
                <div class="box">
                    <h4>Html</h4>
                    <div class="percent">
                        <div style="width: {html}%;"></div>
                    </div>
                </div>
                <div class="box">
                    <h4>CSS</h4>
                    <div class="percent">
                        <div style="width: {css}%;"></div>
                    </div>
                </div>
                <div class="box">
                    <h4>Javascript</h4>
                    <div class="percent">
                        <div style="width: {java}%;"></div>
                    </div>
                </div>
                <div class="box">
                    <h4>Photoshop</h4>
                    <div class="percent">
                        <div style="width: {photoshop}%;"></div>
                    </div>
                </div>
                <div class="box">
                    <h4>Illustration</h4>
                    <div class="percent">
                        <div style="width: {ill}%;"></div>
                    </div>
                </div>
                <div class="box">
                    <h4>Adobe XD</h4>
                    <div class="percent">
                        <div style="width:{adobe}%;"></div>
                    </div>
                </div>
            </div>
            <div class="about interest">
                <h2 class="title2">Interest</h2>
                <ul>
                    <li><i class="fa fa-gamepad" aria-hidden="true"></i>Gaming</li>
                    <li><i class="fa fa-microphone" aria-hidden="true"></i>Singing</li>
                    <li><i class="fa fa-book" aria-hidden="true"></i>Reading</li>
                    <li><i class="fa fa-cutlery" aria-hidden="true"></i>Cooking</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
"""

html = html_template.format(newImageName=data[0][0], firstName=data[0][1], lastName=data[0][2], Profession=data[0][3], pro=data[0][4], Phone=data[0][5], email=data[0][6], website=data[0][7], linkdin=data[0][8], addr=data[0][9], ye1=data[0][10], deg1=data[0][11], un1=data[0][12], ye2=data[0][13], deg2=data[0][14], un2=data[0][15], ye3=data[0][16], deg3=data[0][17], un3=data[0][18],
                            eng=data[0][19], spa=data[0][20], hin=data[0][21], y1=data[0][22], com1=data[0][23], post1=data[0][24], info1=data[0][25], y2=data[0][26], com2=data[0][27], post2=data[0][28], info2=data[0][29], y3=data[0][30], com3=data[0][31], post3=data[0][32], info3=data[0][33], html=data[0][34], css=data[0][35], java=data[0][36], photoshop=data[0][37], ill=data[0][38], adobe=data[0][39])
with open("output1.html", "w") as f:
    f.write(html)

# Open the output file in a web browser
webbrowser.open("output1.html")
# Close the database connection
cursor.close()
db.close()
