CREATE TABLE Elements (
	--doens't currently exist. composite address
);

ALTER TABLE GeneralUser 
ADD COLUMN CreateDate TIMESTAMP NOT NULL

ALTER TABLE GeneralUser
ADD COLUMN token TEXT NULL

ALTER TABLE EvalResponse
ADD COLUMN CourseID INT NULL

ALTER TABLE EvalResponse
ADD FOREIGN KEY (CourseID)
REFERENCES Course(CourseID)

ALTER TABLE Section
DROP COLUMN CourseTime

ALTER TABLE Section
ADD COLUMN CourseTime DATETIME NULL

ALTER TABLE Response
DROP FOREIGN KEY ResponseFK3

ALTER TABLE Enrollment
DROP COLUMN StudentEvalBool

ALTER TABLE Enrollment
DROP COLUMN InstructorEvalBool

ALTER TABLE Enrollment
ADD COLUMN EvalBool TINYINT(1) NULL

ALTER TABLE Student
ADD COLUMN UserLevel INT NULL

UPDATE Student 
SET UserLevel = 1

ALTER TABLE Enrollment
DROP FOREIGN KEY EnrollmentFK1 --may affect me later

ALTER TABLE RespondentFK1
DROP FOREIGN KEY RespondentFK1 --may affect me later

ALTER TABLE GeneralUser 
ADD COLUMN ProfilePicture TEXT NULL

ALTER TABLE Student
DROP COLUMN ProfilePicture

ALTER TABLE Portfolio
DROP FOREIGN KEY PortfolioFK1

ALTER TABLE Portfolio
DROP COLUMN AdminEmailAddress --nuisance and not making any reason for existing.

ALTER TABLE Portfolio
ADD COLUMN Title VARCHAR(25) NOT NULL

ALTER TABLE Portfolio
ADD COLUMN Element VARCHAR(25) NOT NULL

ALTER TABLE Portfolio
ADD COLUMN Upload TIMESTAMP NULL

CREATE TABLE Likes(
	PortfolioID INT NOT NULL,
	Likee VARCHAR(100) NOT NULL,
	Liked VARCHAR(100) NOT NULL,
	Checked TINYINT(1) NULL
);

ALTER TABLE Likes 
ADD FOREIGN KEY (PortfolioID) 
REFERENCES Portfolio(PortfolioID);

ALTER TABLE Likes 
ADD FOREIGN KEY (Likee) 
REFERENCES GeneralUser(EmailAddress);

ALTER TABLE Likes 
ADD FOREIGN KEY (Liked) 
REFERENCES GeneralUser(EmailAddress);

ALTER TABLE Portfolio
ADD COLUMN FeaturedBool TINYINT(1) NULL

UPDATE Portfolio
SET FeaturedBool = 0; 

ALTER TABLE GeneralUser
MODIFY COLUMN ProfilePicture VARCHAR(200) NOT NULL

ALTER TABLE GeneralUser
ALTER ProfilePicture SET DEFAULT 'default.jpg'

UPDATE GeneralUser 
SET ProfilePicture = 'default.jpg'

  ----- server is here

 
-- IDs should be PK rather than changeable emails
-- ALTER TABLE GeneralUser
-- ADD COLUMN General_User_ID INT AUTO_INCREMENT NOT NULL
