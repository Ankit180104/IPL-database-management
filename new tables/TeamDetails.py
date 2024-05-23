import mysql.connector as c
mydb = c.connect(
 host="localhost",
 user="root",
 password="",
 database="ipl"
)
cursor = mydb.cursor()

cursor.execute('''
CREATE TABLE TeamDetails(
TeamID VARCHAR(5),CaptainID CHAR(5) NOT NULL,
CoachID CHAR(5) NOT NULL, SponsorCompany VARCHAR(50) NOT NULL,SponsorAmount INT(20) NOT NULL,	PRIMARY KEY (TeamID))''')
cursor.execute('''
ALTER TABLE TeamDetails ADD FOREIGN KEY (CoachID) REFERENCES HeadCoach (coachID) ON DELETE CASCADE ON UPDATE CASCADE''')
cursor.execute('''
ALTER TABLE TeamDetails ADD FOREIGN KEY (TeamID) REFERENCES Teams (TeamID) ON DELETE CASCADE ON UPDATE CASCADE''')
sql = """ INSERT INTO TeamDetails (TeamID,CaptainID, CoachID, SponsorCompany, SponsorAmount)
VALUES (%s,%s, %s, %s, %s)"""

value = [
('RCB','00023','10109','Star Sports Network',980000000),
('CSK','00012','10104','Kent RO Systems',700000000),
('RR','00060','10108','Myntra ',300000000),
('MI','00034','10111','PhonePe',830000000),
('KKR','00045','10107','Aircel',470000000)
]

cursor.executemany(sql, value)

















mydb.commit()
cursor.close()

