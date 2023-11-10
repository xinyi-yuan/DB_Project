-- Create Jobs table
CREATE TABLE IF NOT EXISTS Jobs (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    ManagerID INT,
    JobTitle VARCHAR(30)
);

-- Create JobRequiredExp table
CREATE TABLE IF NOT EXISTS JobRequiredExp (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    JobID INTEGER,
    Type VARCHAR(250),
    YearsOfExp INT,
    FOREIGN KEY (JobID) REFERENCES Jobs (ID)
);

-- Create TrainingRequired table
CREATE TABLE IF NOT EXISTS TrainingRequired (
    ID INTEGER PRIMARY KEY AUTOINCREMENT,
    JobID INTEGER,
    Name VARCHAR(50),
    DurationDays INT,
    FOREIGN KEY (JobID) REFERENCES Jobs (ID)
);

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

-- Example query using a join
SELECT JobTitle, Name FROM Jobs JOIN TrainingRequired on Jobs.ID = JobID;