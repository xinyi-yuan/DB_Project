CREATE TABLE Employee (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    Name CHAR(30),
    DateHired DATE,
    DOB DATE,
    SNN INT,
    Gender CHAR(30),
    Job CHAR(30)
);

CREATE TABLE ContactInfo (
    ContactID INTEGER PRIMARY KEY AUTOINCREMENT,
    EmployeeID INT,
    Address VARCHAR(50),
    Phone INT,
    Email CHAR(30),
    EmergencyContactNumber INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employee (ID)
);

-- Create Jobs table
CREATE TABLE Jobs (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    ManagerID INT,
    JobTitle VARCHAR(30)
);

-- Create JobRequiredExp table
CREATE TABLE JobRequiredExp (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    JobID INTEGER,
    Type VARCHAR(250),
    YearsOfExp INT,
    FOREIGN KEY (JobID) REFERENCES Jobs (ID)
);

-- Create TrainingRequired table
CREATE TABLE TrainingRequired (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    JobID INTEGER,
    Name VARCHAR(50),
    DurationDays INT,
    FOREIGN KEY (JobID) REFERENCES Jobs (ID)
);

CREATE TABLE Salary (
    EmployeeID INT,
    ID INT PRIMARY KEY AUTO_INCREMENT,
    SalaryAmount DOUBLE,
    PayPeriod VARCHAR(255),
    SalaryStartDate DATE,
    SalaryEndDate DATE,
    BonusDeductions DOUBLE,
    FOREIGN KEY (EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE Schedule (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    WeekNumber INT CHECK
        (
            WeekNumber >= 1 AND WeekNumber <= 52
        ),
        HoursWorked INT,
        PTOBalance INT,
        FOREIGN KEY(EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE Experience(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    TYPE VARCHAR(255),
    YearsOfExperience INT,
    FOREIGN KEY(EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE PostEmployment(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    DateOfLeave DATE,
    Reasoning VARCHAR(255),
    FOREIGN KEY(EmployeeID) REFERENCES Employee(ID)
);

CREATE TABLE Performance(
    EmployeeID INT,
    SalaryID INT,
    ReviewDate DATE,
    Rating INT,
    Feedback TEXT,
    FOREIGN KEY(EmployeeID) REFERENCES Employee(ID),
    FOREIGN KEY(SalaryID) REFERENCES Salary(ID)
);