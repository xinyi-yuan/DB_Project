CREATE TABLE Employee (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    Name CHAR(30),
    DateHired DATE,
    DOB DATE,
    SNN INT,
    Gender CHAR(30),
    Job CHAR(30)
);

CREATE TABLE IF NOT EXISTS ContactInfo (
    ContactID INTEGER PRIMARY KEY AUTOINCREMENT,
    EmployeeID INT,
    Address VARCHAR(50),
    Phone INT,
    Email CHAR(30),
    EmergencyContactNumber INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID)
);

INSERT INTO Employee (Name, DateHired, DOB, SNN, Gender, Job) VALUES ("Mitchell", "11/10/2023", "03/27/2002", "999", "Male", "Student");
INSERT INTO Employee (Name, DateHired, DOB, SNN, Gender, Job) VALUES ("Sweet", "11/10/2023", "03/27/2002", "999", "Male", "Student");