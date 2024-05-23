import mysql.connector

mydb = mysql.connector.connect(host='localhost', user='root', password='', database='ipl')
cursor = mydb.cursor()
cursor.execute('''
CREATE TABLE Played(
	MatchID CHAR(7),
	TeamID VARCHAR(5),
	TeamRuns INT NOT NULL,
	4s INT NOT NULL,
	6s INT NOT NULL,
	Wickets INT NOT NULL,
	Winner CHAR(1) NOT NULL, 
	PRIMARY KEY(MatchID,TeamID))''')


cursor.execute('''
ALTER TABLE Played ADD  FOREIGN KEY (TeamID) 
REFERENCES Teams (TeamID) ON DELETE CASCADE ON UPDATE CASCADE''')
cursor.execute('''
ALTER TABLE Played ADD FOREIGN KEY (MatchID) 
REFERENCES Matches (Match_ID) ON DELETE CASCADE ON UPDATE CASCADE''')



sql = """ INSERT INTO Played (MatchID,TeamID,TeamRuns,4s,6s,Wickets,Winner) 
VALUES (%s,%s,%s,%s,%s,%s,%s)"""

values = [('2015001','RR',123,11,2,5,'0'),
('2015001','CSK',125,13,3,7,'1'),
('2015002','RR',180,14,4,5,'1'),
('2015002','RCB',177,11,3,9,'0'),
('2015003','KKR',130,9,3,10,'0'),
('2015003','MI',190,10,6,3,'1'),
('2015004','KKR',213,15,6,9,'0'),
('2015004','CSK',214,12,5,9,'1'),
('2015005','MI',200,16,7,10,'0'),
('2015005','RCB',224,9,6,3,'1'),
('2015011','MI',240,13,6,9,'1'),
('2015011','RR',239,12,7,2,'0'),
('2015012','CSK',145,7,3,8,'1'),
('2015012','RCB',110,4,2,10,'0'),
('2015021','MI',240,18,8,8,'1'),
('2015021','CSK',239,14,4,5,'0')
]
cursor.executemany(sql, values)
mydb.commit()
cursor.close()
