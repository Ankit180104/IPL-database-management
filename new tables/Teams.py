import mysql.connector

mydb = mysql.connector.connect(host='localhost', user='root', password='', database='ipl')
mycursor = mydb.cursor()

mycursor.execute("CREATE TABLE Teams ( TeamID VARCHAR(50) PRIMARY KEY, TeamName VARCHAR(25), OwnerCompany VARCHAR(25))")
sql = "INSERT INTO Teams (TeamID, TeamName, OwnerCompany)\
    VALUES (%s, %s, %s)"

val = [("RCB","Royal Challengers Bangalore","United Spirits"),
("MI","Mumbai Indians","Reliance Industry Ltd"),
("CSK","Chennai Super Kings","India Cements Ltd"),
("RR","Rajasthan Royals","Emerging Media IPL Ltd"),
("KKR","Kolkata Knight Riders","Red Chillies Entertainment")]
mycursor.executemany(sql, val)
mydb.commit()
mydb.close()

