import mysql.connector

mydb = mysql.connector.connect(host='localhost', user='root', password='', database='ipl')
mycursor = mydb.cursor()

mycursor.execute("CREATE TABLE Matches ( Match_ID VARCHAR(50) PRIMARY KEY, "
                 "Match_Type VARCHAR(25), Date VARCHAR(25),\
                 Stadium_Name VARCHAR(25),City VARCHAR(25),Team_ID VARCHAR(25))")
sql = ("INSERT INTO Matches (Match_ID,Match_Type,Date,Stadium_Name,City,Team_ID)\
    VALUES (%s, %s, %s, %s, %s, %s)")

val = [("2015001","League","2015-03-27","Wankhede Stadium","Mumbai","00012"),
("2015002","League","2015-03-29","Sawai Mansingh Stadium","Jaipur","00057"),
("2015003","League","2015-04-02","Arun Jaitley Stadium","New Delhi","00042"),
("2015004","League","2015-04-05","Sawai Mansingh Stadium","Jaipur","00020"),
("2015005","League","2015-04-07","Arun Jaitley Stadium","New Delhi","00029"),
("2015011","Semifinal","2015-04-10","Rajiv Gandhi International Cricket Stadium","Hyderabad","00040"),
("2015012","Semifinal","2015-04-12","Narendra Modi Stadium","Ahmedabad","00012"),
("2015021","Final","2015-04-16","Narendra Modi Stadium","Ahmedabad","00038")]
mycursor.executemany(sql, val)
mydb.commit()
mydb.close()


