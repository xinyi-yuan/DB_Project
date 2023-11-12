CREATE TABLE Salary (
    EmployeeID INT,
    ID INT PRIMARY KEY AUTO_INCREMENT,
    SalaryAmount DOUBLE,
    PayPeriod VARCHAR(255),
    SalaryStartDate DATE,
    SalaryEndDate DATE,
    BonusDeductions DOUBLE,
    FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
);

CREATE TABLE Schedule (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    WeekNumber INT CHECK (WeekNumber >= 1 AND WeekNumber <= 52),
    HoursWorked INT,
    PTOBalance INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
);

CREATE TABLE Experience (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    Type VARCHAR(255),
    YearsOfExperience INT,
    FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
);

CREATE TABLE PostEmployment (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    EmployeeID INT,
    DateOfLeave DATE,
    Reasoning VARCHAR(255),
    FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID)
);

CREATE TABLE Performance (
    EmployeeID INT,
    SalaryID INT,
    ReviewDate DATE,
    Rating INT,
    Feedback TEXT,
    FOREIGN KEY (EmployeeID) REFERENCES Employee(EmployeeID),
    FOREIGN KEY (SalaryID) REFERENCES Salary(SalaryID)
);


INSERT INTO Salary (EmployeeID, SalaryAmount, PayPeriod, SalaryStartDate, SalaryEndDate, BonusDeductions) 
VALUES (1, 50000.00, 'Monthly', '2023-01-01', '2023-12-31', 1000.00);

INSERT INTO Schedule (EmployeeID, WeekNumber, HoursWorked, PTOBalance) 
VALUES (1, 10, 40, 15);

INSERT INTO Experience (EmployeeID, Type, YearsOfExperience)
VALUES (1, 'Tech', 5);

INSERT INTO PostEmployment (EmployeeID, DateOfLeave, Reasoning)
VALUES (2, '2023-11-30', 'Retirement');

INSERT INTO Performance (EmployeeID, SalaryID, ReviewDate, Rating, Feedback)
VALUES (1, 1, '2023-11-11', 4, 'Excellent performance in project management.');
