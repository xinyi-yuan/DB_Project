INSERT INTO Employee (Name, DateHired, DOB, SNN, Gender, Job) VALUES ("Mitchell", "11/10/2023", "03/27/2002", "999", "Male", "Student");

INSERT INTO Employee (Name, DateHired, DOB, SNN, Gender, Job) VALUES ("Sweet", "11/10/2023", "03/27/2002", "999", "Male", "Student");

-- Insert data into Jobs table
INSERT INTO Jobs (JobTitle) VALUES 
('Secretary'), 
('Senior Financial Advisor'),
('Salesman'),
('Engineer'),
('Media Intern');

-- Insert data into JobRequiredExp table
INSERT INTO JobRequiredExp (JobID, Type, YearsOfExp) VALUES (4, 'Leadership', 2),
(2, 'Leadership', 5),
(1, 'Excel', 2),
(1, 'Customer Service', 2),
(4, 'Teamwork', 3),
(3, 'Sales', 1);

-- Insert data into TrainingRequired table
INSERT INTO TrainingRequired (JobID, Name, DurationDays) VALUES 
(5, 'Shadowing', 5),
(2, 'Shadowing', 10),
(1, 'E-Learning', 2),
(5, 'E-Learning', 5),
(4, 'Safety Training', 3),
(3, 'E-Learning', 2);

INSERT INTO Salary (EmployeeID, SalaryAmount, PayPeriod, SalaryStartDate, SalaryEndDate, BonusDeductions) 
VALUES (1, 50000.00, 'Monthly', '2023-01-01', '2023-12-31', 1000.00);

INSERT INTO Schedule (EmployeeID, WeekNumber, HoursWorked, PTOBalance) 
VALUES (1, 10, 40, 15);

INSERT INTO `schedule`(`EmployeeID`, `WeekNumber`, `HoursWorked`, `PTOBalance`) 
VALUES ('1','10','35','14')

INSERT INTO Experience (EmployeeID, Type, YearsOfExperience)
VALUES (1, 'Tech', 5);

INSERT INTO PostEmployment (EmployeeID, DateOfLeave, Reasoning)
VALUES (2, '2023-11-30', 'Retirement');

INSERT INTO Performance (EmployeeID, SalaryID, ReviewDate, Rating, Feedback)
VALUES (1, 1, '2023-11-11', 4, 'Excellent performance in project management.');