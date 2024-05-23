import mysql.connector as c

mydb = c.connect(
    host="localhost",
    user="root",
    password="",
    database="ipl"
)
cursor = mydb.cursor()

cursor.execute('''
CREATE TABLE UmpiredBy(
	Match_ID CHAR(7),
	Umpire_ID CHAR(5),
	PRIMARY KEY (Match_ID, Umpire_ID))''')

cursor.execute('''
ALTER TABLE UmpiredBy ADD FOREIGN KEY (Match_ID) REFERENCES Matches(Match_ID) ON DELETE CASCADE ON UPDATE CASCADE''')
cursor.execute('''
ALTER TABLE UmpiredBy ADD FOREIGN KEY (Umpire_ID) REFERENCES Umpire(Umpire_ID) ON DELETE CASCADE ON UPDATE CASCADE''')

sql = """ INSERT INTO UmpiredBy (Match_ID, Umpire_ID) 
VALUES (%s,%s)"""

values = [('2015001','00001'),
('2015001','00002'),
('2015001','00003'),
('2015002','00004'),
('2015002','00005'),
('2015002','00006'),
('2015003','00007'),
('2015003','00008'),
('2015003','00009'),
('2015004','00010'),
('2015004','00001'),
('2015004','00002'),
('2015005','00003'),
('2015005','00004'),
('2015005','00005'),
('2015011','00006'),
('2015011','00007'),
('2015011','00008'),
('2015012','00009'),
('2015012','00010'),
('2015012','00001'),
('2015021','00002'),
('2015021','00003'),
('2015021','00004')]

cursor.executemany(sql, values)
mydb.commit()
cursor.close()
