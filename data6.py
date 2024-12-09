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
query = "SELECT * FROM res6"
cursor.execute(query)
data = cursor.fetchall()

# Define an HTML template string with placeholders for the data
html_template = """
<!Doctype HTML>
<html>
<head>
	<title>resume</title>
	<link rel="stylesheet" type="text/css" href="css/style6.css"/>
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
	<div class="box-outer">
	<div class="resume-box">
		<div class="box-1">
			<img src="..\online_resume_builder\image\{newImageName}" class="profile" />
			<div class="content">
			<h1>About me</h1>
			<p>{pro}
				
			</p>

			<br/>
			<h1>Award</h1>
			<p><span style="color:white">{awd1} </span>{ainfo1}
				<br/><br/>
			<span style="color:white">{awd2} </span> {ainfo2}
				
			</p>
			<br/>
			<h1>Contact</h1>

				<p><i class="fa fa-map"></i> &nbsp;{addr} </p>
				<p><i class="fa fa-phone"></i> &nbsp;phone {Phone}</p>
				<p><i class="fa fa-envelope"></i> &nbsp;email : {email}</p>
				<p><i class="fa fa-globe"></i> &nbsp;{website}</p>
			
			</div>

		</div>

		<div class="box-2">
			
			<div class="intro">
				
				<br/>
				<h1 class="ma">{firstName}</h1>
				<h1> <strong>{lastName}</strong></h1>

				<p class="phead">{Profession}</p>
				<div class="clearfix"></div>
				<hr class="hr1" />
			</div>
			
			<br/><br/><br/>
			<div class="content-2">
				<h1 class="head">Experience</h1>
				<hr class="hr2" />
				<div class="clearfix"></div>
				<p class="para-1">{post1}<strong> ({y1})</strong></p>
				<p class="para-21">{info1}</p>

				<p class="para-1">{post2} <strong> ({y2})</strong></p>
				<p class="para-21">{info2}</p>

				<p class="para-1">{post3}<strong> ({y3})</strong></p>
				<p class="para-21">{info3}</p>
			</div>


			<div class="content-2">
				<h1 class="head">Education</h1>
				<hr class="hr2" />
				<div class="clearfix"></div>
				<p class="para-1">{uni1} <strong> ({ye1})</strong></p>
				<p class="para-21">{uinfo1}</p>

				<p class="para-1">{uni2} <strong> ({ye2})</strong></p>
				<p class="para-21">{uinfo2}</p>

				
			</div>

			<h1 class="head">Skills</h1>
			<hr class="hr2" />
			<div class="contactInfo language">
                <ul>
                    <li>
                        <span class="text">{skill1}</span>
                        <span class="percent">
                            <div style="width:{p1}%;"></div>
                        </span>
                    </li>
                    <li>
                        <span class="text">{skill2}</span>
                        <span class="percent">
                            <div style="width:{p2}%;"></div>
                        </span>
                    </li>
                    <li>
                        <span class="text">{skill3}</span>
                        <span class="percent">
                            <div style="width:{p3}%;"></div>
                        </span>
                    </li>
                </ul>
            </div>


		</div>

	</div>
	<div class="clearfix"></div>
</div>
</body>

</html>
"""
html = html_template.format(newImageName=data[0][0], firstName=data[0][1], lastName=data[0][2], Profession=data[0][3], pro=data[0][4], awd1=data[0][5], ainfo1=data[0][6], awd2=data[0][7], ainfo2=data[0][8], addr=data[0][9], Phone=data[0][10], email=data[0][11], website=data[0][12], post1=data[0][13], y1=data[0][14], info1=data[0][15], post2=data[0][16], y2=data[0][17], info2=data[0][18],
                            post3=data[0][19], y3=data[0][20], info3=data[0][21], uni1=data[0][22], ye1=data[0][23], uinfo1=data[0][24], uni2=data[0][25], ye2=data[0][26], uinfo2=data[0][27], skill1=data[0][28], p1=data[0][29], skill2=data[0][30], p2=data[0][31], skill3=data[0][32], p3=data[0][33])
with open("output1.html", "w") as f:
    f.write(html)

# Open the output file in a web browser
webbrowser.open("output1.html")
# Close the database connection
cursor.close()
db.close()
