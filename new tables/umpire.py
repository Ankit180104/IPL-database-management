import mysql.connector

mydb = mysql.connector.connect(host='localhost', user='root', password='', database='ipl')
mycursor = mydb.cursor()

mycursor.execute("CREATE TABLE Umpire ( Umpire_ID VARCHAR(50) PRIMARY KEY, Name VARCHAR(25), YOE VARCHAR(25),\
                 Country VARCHAR(25))")
sql = "INSERT INTO Umpire (Umpire_ID,Name,YOE,Country)\
    VALUES (%s, %s, %s, %s)"


val = [("00001","Sundaram Ravi","15","Inida"),
("00002","Paul Reiffel","18","Australia"),
("00003","Nitin Menon","9","India"),
("00004","Christopher Columbus","25","New Zealand"),
("00005","Anil Chaudary","10","Inida"),
("00006","C. Shamshuddin","20","India"),
("00007","Arvindra Gohel","9","USA"),
("00008","Sumukh Chattopadhay","14","India"),
("00009","Gerard Abood","23","Australia"),
("00010","Afzal Ahmed","12","India")]
mycursor.executemany(sql, val)
mydb.commit()
mydb.close()

