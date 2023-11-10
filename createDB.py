import csv
import sqlite3
from datetime import datetime
from pathlib import Path

Path('EmployeeTest.db').touch()

create_employee_table = """CREATE TABLE Employee (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    Name CHAR(30),
    DateHired DATE,
    DOB DATE,
    SNN INT,
    Gender CHAR(30),
    Job CHAR(30)
);
"""

create_contact_table = """CREATE TABLE IF NOT EXISTS ContactInfo (
    ContactID INTEGER PRIMARY KEY AUTOINCREMENT,
    EmployeeID INT,
    Address VARCHAR(50),
    Phone INT,
    Email CHAR(30),
    EmergencyContactNumber INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID)
);
"""

conn = sqlite3.connect('EmployeeTest.db')
cur = conn.cursor()

if conn is not None:
    cur.execute(create_employee_table)
    cur.execute(create_contact_table)
else:
    print("Error! cannot create the database connection.")
    
insertData1 = """INSERT INTO Employee (Name, DateHired, DOB, SNN, Gender, Job) VALUES ("Mitchell", "11/10/2023", "03/27/2002", "999", "Male", "Student");"""
insertData2 = """INSERT INTO Employee (Name, DateHired, DOB, SNN, Gender, Job) VALUES ("Sweet", "11/10/2023", "03/27/2002", "999", "Male", "Student");"""

if conn is not None:
    cur.execute(insertData1)
    print(cur.lastrowid)
    cur.execute(insertData2)
    print(cur.lastrowid)
    
    
selectData = """SELECT * FROM Employee"""
print(cur.execute(selectData).fetchall())

insertContact = """INSERT INTO ContactInfo (Address, Phone, Email, EmergencyContactNumber) VALUES ("UIOWA", '847', 'mswt', '708')"""
cur.execute(insertContact)
print(cur.execute("""SELECT * FROM ContactInfo""").fetchall())
conn.close()
