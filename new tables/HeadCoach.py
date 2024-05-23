import mysql.connector

mydb = mysql.connector.connect(host='localhost', user='root', password='', database='ipl')
mycursor = mydb.cursor()

mycursor.execute("CREATE TABLE HeadCoach ( CoachID CHAR(5) PRIMARY KEY, CoachName VARCHAR(25), "
                 "Years_of_Experience VARCHAR(25), DoB VARCHAR(20), Country VARCHAR(25))")

sql = "INSERT INTO HeadCoach (CoachID, CoachName, Years_of_Experience, DoB, Country)\
    VALUES (%s, %s, %s, %s, %s)"

val = [("10104","Gary Kirsten",24,"1977-12-27","South Africa"),
       ("10107","Kumar Sngakkara",2,"1977-12-27","Sri Lanka"),
       ("10108","Andy Flower",5,"1968-04-28","Zimbabwe"),
       ("10109","Sanjay Bangar",19,"1972-10-11","India"),
       ("10111","Anil Kumble",27,"1970-12-17","India"),
       ("10112","Trevor Bayliss",13,"1962-12-21","Australia")]
mycursor.executemany(sql, val)
mydb.commit()
mydb.close()

