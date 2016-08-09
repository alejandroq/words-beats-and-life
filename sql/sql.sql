-- THIS SCRIPT INCLUDES DROP, DELETE, RESEEDING, CREATE TABLE & SELECT STATEMENTS FOR ALL THE TABLES (in that order)

--DROP STATEMENTS
DROP TABLE ActivityLog;
DROP TABLE Comment;
DROP TABLE Post;
DROP TABLE Topic;
DROP TABLE Purchase;
DROP TABLE Item;
DROP TABLE QuestionOrder;
DROP TABLE Response;
DROP TABLE Question;
DROP TABLE EvalResponse;
DROP TABLE Evaluatee;
DROP TABLE Respondent;
DROP TABLE Eval;
DROP TABLE WBLEvent;
DROP TABLE ParentStudent;
DROP TABLE Attendance;
DROP TABLE Portfolio;
DROP TABLE Student;
DROP TABLE CourseStaff;
DROP TABLE Course;
DROP TABLE Staff;
DROP TABLE Administrator;
DROP TABLE Donation;
DROP TABLE Applicant;
DROP TABLE Cipher;
DROP TABLE Parent;
DROP TABLE GeneralUser;


--DELETE STATEMENTS
DELETE FROM ActivityLog;
DELETE FROM Comment;
DELETE FROM Post;
DELETE FROM Topic;
DELETE FROM Purchase;
DELETE FROM Item;
DELETE FROM QuestionOrder;
DELETE FROM Response;
DELETE FROM Question;
DELETE FROM EvalResponse;
DELETE FROM Evaluatee;
DELETE FROM Respondent;
DELETE FROM Eval;
DELETE FROM WBLEvent;
DELETE FROM ParentStudent;
DELETE FROM Attendance;
DELETE FROM Portfolio;
DELETE FROM Student;
DELETE FROM CourseStaff;
DELETE FROM Course;
DELETE FROM Staff;
DELETE FROM Administrator;
DELETE FROM Donation;
DELETE FROM Applicant;
DELETE FROM Cipher;
DELETE FROM Parent;
DELETE FROM GeneralUser;

--Auto-Increment Reset
?

--CREATE TABLE STATEMENTS
CREATE TABLE GeneralUser(
	EmailAddress VARCHAR(100) PRIMARY KEY NOT NULL,
	FirstName VARCHAR(30) NOT NULL,
	LastName VARCHAR(30) NOT NULL,
	Gender VARCHAR(30) NOT NULL,
	HomePhone VARCHAR(15) NOT NULL,
	HomeAddress VARCHAR(100) NOT NULL,
	City VARCHAR(50) NOT NULL,
	State VARCHAR(20) NOT NULL,
	ZIP	CHAR(5) NOT NULL,
	DOB DATETIME NOT NULL,
	Password VARCHAR(100) NOT NULL,
	UserType VARCHAR(30) NOT NULL,
	PasswordHash VARCHAR(32) NOT NULL,
	ShirtSize VARCHAR(20) NOT NULL,
	UserPermission INT NOT NULL,
	LastLogin DATE NOT NULL,
	Race VARCHAR(500) NOT NULL,
	CellPhone VARCHAR(15) NOT NULL,
	JoinDate DATE NOT NULL,
	ActivatedBool BIT NOT NULL
);


CREATE TABLE Parent(
	EmailAddress			VARCHAR(100) NOT NULL,
	LetterCount				INT,
	Relationship			VARCHAR(20),
	CONSTRAINT ParentFK FOREIGN KEY (EmailAddress) REFERENCES GeneralUser(EmailAddress),
	CONSTRAINT ParentPK PRIMARY KEY (EmailAddress)
);


CREATE TABLE Cipher(
	EmailAddress			VARCHAR(100) NOT NULL,
	BoolPaid				BIT,
	CONSTRAINT CipherFK FOREIGN KEY (EmailAddress) REFERENCES GeneralUser(EmailAddress),
	CONSTRAINT CipherPK PRIMARY KEY (EmailAddress));


CREATE TABLE Applicant(
	EmailAddress			VARCHAR(100) NOT NULL,
	RequestedAccountType	VARCHAR(20),
	Approved				BIT,
	DateRequested			DATE,
	DateApproved			DATE,
	StudentInfo				VARCHAR(250),
	CONSTRAINT ApplicantFK FOREIGN KEY (EmailAddress) REFERENCES GeneralUser(EmailAddress),
	CONSTRAINT ApplicantPK PRIMARY KEY (EmailAddress));


CREATE TABLE Donation(
	DonationID					INT AUTO_INCREMENT NOT NULL,
	DonationAmount				NUMERIC(15,2),
	DonationDate				DATE,
	EmailAddress				VARCHAR(100) NOT NULL,
	CONSTRAINT DonationFK FOREIGN KEY (EmailAddress) REFERENCES Cipher(EmailAddress),
	CONSTRAINT DonationPK PRIMARY KEY  (DonationID));


CREATE TABLE Administrator(
	EmailAddress			VARCHAR(100) NOT NULL,
	ManagerEmail			VARCHAR(100) NOT NULL,
	AdminTitle				VARCHAR(100),
	HireDate				DATE,
	CONSTRAINT AdministratorFK1 FOREIGN KEY (EmailAddress) REFERENCES GeneralUser(EmailAddress),
	CONSTRAINT AdministratorPK PRIMARY KEY (EmailAddress),
	CONSTRAINT AdministratorFK2 FOREIGN KEY (ManagerEmail) REFERENCES Administrator(EmailAddress));



CREATE TABLE Staff(
	EmailAddress				VARCHAR(100) NOT NULL,
	AdminEmailAddress			VARCHAR(100) NOT NULL,
	HireDate					DATE,
	StaffType					VARCHAR(50),
	Specialty					VARCHAR(200),
	CONSTRAINT StaffFK1 FOREIGN KEY (EmailAddress) REFERENCES GeneralUser(EmailAddress),
	CONSTRAINT StaffFK2 FOREIGN KEY (AdminEmailAddress) REFERENCES Administrator(EmailAddress),
	CONSTRAINT StaffPK PRIMARY KEY  (EmailAddress));



CREATE TABLE Course(
	CourseID				INT NOT NULL,
	CourseName				VARCHAR(200),
	CourseElement			VARCHAR(50),
	LessonPlan				VARCHAR(1000),
	Capacity				INT,
	CourseDate				DATE,
	CourseTime				TIME,
	CourseLocation			VARCHAR(100),
	CONSTRAINT CoursePK PRIMARY KEY  (CourseID));



CREATE TABLE CourseStaff(
	EmailAddress			VARCHAR(100) NOT NULL,
	CourseID				INT NOT NULL,
	CONSTRAINT CourseStaffFK1 FOREIGN KEY (CourseID) REFERENCES Course (CourseID),
	CONSTRAINT CourseStaffFK2 FOREIGN KEY (EmailAddress) REFERENCES Staff (EmailAddress),
	CONSTRAINT CourseStaffPK PRIMARY KEY  (EmailAddress, CourseID));


CREATE TABLE Student(
	EmailAddress			VARCHAR(100) NOT NULL,
	StudentLevel			VARCHAR(50),
	WebActivity				DECIMAL,
	ClassAttendance			DECIMAL,
	TotalBucks				NUMERIC(15,2),
	CurrentBucks			NUMERIC(15,2),
	SignedWaiver			BIT,
	DC1Card					VARCHAR(30),
	WardOfResidence			VARCHAR(100),
	ProfilePicture			VARCHAR(100),
	StudentBio				VARCHAR(1000),
	EmployedBool			BIT,
	JobDescr				VARCHAR(200),
	Salary					NUMERIC(15,2),
	CareerGoal				VARCHAR(100),
	SalaryGoal				NUMERIC(15,2),
	ResumeBool				BIT,
	ArtResumeBool			BIT,
	Workshops				VARCHAR(100),
	StudentStatus			VARCHAR(50),
	YearInSchool			DATE,
	SchoolName				VARCHAR(50),
	GradYear				DATE,
	CollegePlansBool		BIT,
	DesiredMajor			VARCHAR(50),
	DesiredCollege			VARCHAR(50),
	PrevSchoolName			VARCHAR(50),
	PrevStudy				VARCHAR(50),
	FutureEduBool			BIT,
	PrimaryCare				VARCHAR(50),
	InsurCo					VARCHAR(50),
	InsurGroupNum			VARCHAR(20),
	InsurPolicyNum			VARCHAR(20),
	DietaryRestriction		VARCHAR(100),
	Allergies				VARCHAR(100),
	CONSTRAINT StudentFK FOREIGN KEY (EmailAddress) REFERENCES GeneralUser(EmailAddress),
	CONSTRAINT StudentPK PRIMARY KEY  (EmailAddress));


CREATE TABLE Portfolio(
	AdminEmailAddress	VARCHAR(100) NOT NULL,
	StudentEmailAddress	VARCHAR(100) NOT NULL,
	DateApproved		DATE,
	ApprovalBool		BIT,
	ContentType			VARCHAR(50),
	ContentLink			VARCHAR(100),
	PortfolioID			INT AUTO_INCREMENT NOT NULL,
	CONSTRAINT PortfolioFK1 FOREIGN KEY (AdminEmailAddress) REFERENCES Administrator(EmailAddress),
	CONSTRAINT PortfolioFK2 FOREIGN KEY (StudentEmailAddress) REFERENCES Student(EmailAddress),
	CONSTRAINT PortfolioPK PRIMARY KEY  (PortfolioID));


CREATE TABLE Attendance(
	EmailAddress			VARCHAR(100) NOT NULL,
	CourseID				INT NOT NULL,
	AttendanceDate			DATE NOT NULL,
	PresentBool				BIT,
	CONSTRAINT AttendanceFK1 FOREIGN KEY (EmailAddress) REFERENCES Student (EmailAddress),
	CONSTRAINT AttendanceFK2 FOREIGN KEY (CourseID) REFERENCES Course (CourseID),
	CONSTRAINT AttendancePK PRIMARY KEY  (EmailAddress, CourseID, AttendanceDate));


CREATE TABLE ParentStudent(
	StudentEmailAddress		VARCHAR(100) NOT NULL,
	ParentEmailAddress		VARCHAR(100) NOT NULL,
	LetterTitel				VARCHAR(100),
	LetterText				VARCHAR(8000),
	LetterDate				DATE,
	CONSTRAINT ParentStudentFK1 FOREIGN KEY(StudentEmailAddress) REFERENCES Student (EmailAddress),
	CONSTRAINT ParentStudentFK2 FOREIGN KEY (ParentEmailAddress) REFERENCES Parent (EmailAddress),
	CONSTRAINT ParentStudentPK PRIMARY KEY  (StudentEmailAddress, ParentEmailAddress));


CREATE TABLE WBLEvent(
	EventID					INT AUTO_INCREMENT NOT NULL,
	EventName				VARCHAR(50),
	EventType				VARCHAR(50),
	EventDescription		VARCHAR(200),
	EventDATE				DATE,
	EventLocation			VARCHAR(100),
	PrimaryContact			VARCHAR(100),
	PCEmail					VARCHAR(100),
	PCPhone					VARCHAR(15),
	EventImage				VARCHAR(200),
	SponsorEmail			VARCHAR(100),
	EmailAddress			VARCHAR(100),
	CONSTRAINT EventFK FOREIGN KEY (EmailAddress) REFERENCES Administrator (EmailAddress),
	CONSTRAINT EventPK PRIMARY KEY  (EventID));


CREATE TABLE Eval(
	EvalID				INT AUTO_INCREMENT NOT NULL,
	EvalType			VARCHAR(50),
	EvalDescription		VARCHAR(200),
	EvalUpdated			DATE,
	CONSTRAINT EvalPK PRIMARY KEY  (EvalID));


CREATE TABLE Respondent(
	RespondentEmail			VARCHAR (100) NOT NULL,
	StudentEmailAddress		VARCHAR(100),
	StaffEmailAddress		VARCHAR(100),
	CONSTRAINT RespondentFK1 FOREIGN KEY (StudentEmailAddress) REFERENCES Student(EmailAddress),
	CONSTRAINT RespondentFK2 FOREIGN KEY (StaffEmailAddress) REFERENCES Staff(EmailAddress),
	CONSTRAINT RespondentPK PRIMARY KEY  (RespondentEmail));


CREATE TABLE Evaluatee (
	EvaluateeEmail			VARCHAR(100) NOT NULL,
	StudentEmailAddress		VARCHAR(100),
	StaffEmailAddress		VARCHAR(100),
	CONSTRAINT EvaluateeFK1 FOREIGN KEY (StudentEmailAddress) REFERENCES Student(EmailAddress),
	CONSTRAINT EvaluateeFK2 FOREIGN KEY (StaffEmailAddress) REFERENCES Staff(EmailAddress),
	CONSTRAINT EvaluateePK PRIMARY KEY  (EvaluateeEmail));

	
CREATE TABLE EvalResponse(
	EvalResponseID			INT AUTO_INCREMENT NOT NULL,
	RespondentEmail			VARCHAR (100) NOT NULL,
	EvalID					INT NOT NULL,
	EvaluateeEmail			VARCHAR(100) NOT NULL,
	ResponseDate			DATE,
	CONSTRAINT EvalResponseFK1 FOREIGN KEY (EvalID) REFERENCES Eval (EvalID),
	CONSTRAINT EvalResponseFK2 FOREIGN KEY (RespondentEmail) REFERENCES Respondent (RespondentEmail),
	CONSTRAINT EvalresponseFK3 FOREIGN KEY (EvaluateeEmail) REFERENCES Evaluatee (EvaluateeEmail),
	CONSTRAINT EvalResponsePK PRIMARY KEY  (EvalResponseID));


CREATE TABLE Question(
	QuestionID				INT AUTO_INCREMENT NOT NULL,
	QuestionText			VARCHAR(200),
	CONSTRAINT QuestionPK PRIMARY KEY  (QuestionID));


CREATE TABLE Response(
	RespondentEmail			VARCHAR (100) NOT NULL,
	EvalResponseID			INT NOT NULL,
	ResponseText			VARCHAR(200),
	QuestionID				INT NOT NULL,
	CONSTRAINT ResponseFK1 FOREIGN KEY (RespondentEmail) REFERENCES Respondent(RespondentEmail),
	CONSTRAINT ResponseFK2 FOREIGN KEY (EvalResponseID) REFERENCES EvalResponse (EvalResponseID),
	CONSTRAINT ResponseFK3 FOREIGN KEY (QuestionID) REFERENCES Question (QuestionID),
	CONSTRAINT ResponsePK PRIMARY KEY  (RespondentEmail, EvalResponseID, QuestionID));


CREATE TABLE QuestionOrder(
	EvalID					INT NOT NULL,
	QuestionID				INT NOT NULL,
	QuestionNumber			INT,
	CONSTRAINT QuestionOrderFK1 FOREIGN KEY (EvalID) REFERENCES Eval (EvalID),
	CONSTRAINT QuestionOrderFK2 FOREIGN KEY (QuestionID) REFERENCES Question (QuestionID),
	CONSTRAINT QuestionOrderPK PRIMARY KEY  (EvalID, QuestionID));


CREATE TABLE Item(
	ItemID					INT AUTO_INCREMENT NOT NULL,
	EmailAddress			VARCHAR(100) NOT NULL,
	ItemName				VARCHAR(50),
	ItemCost				NUMERIC(15,2),
	ItemDescription			VARCHAR(200),
	ItemImage				VARCHAR(100),
	DateAdded				DATE,
	CONSTRAINT ItemFK FOREIGN KEY (EmailAddress) REFERENCES Cipher (EmailAddress),
	CONSTRAINT ItemPK PRIMARY KEY  (ItemID));


CREATE TABLE Purchase(
	PurchaseID				INT AUTO_INCREMENT NOT NULL,
	EmailAddress			VARCHAR(100) NOT NULL,
	ItemID					INT NOT NULL,
	ApprovedBool			BIT,
	PurchaseDate			DATE,
	CONSTRAINT PurchaseFK1 FOREIGN KEY (EmailAddress) REFERENCES Student (EmailAddress),
	CONSTRAINT PurchaseFK2 FOREIGN KEY (ItemID) REFERENCES Item (ItemID),
	CONSTRAINT PurchasePK PRIMARY KEY  (PurchaseID));


CREATE TABLE Topic(
	TopicID					INT AUTO_INCREMENT NOT NULL,
	TopicName				VARCHAR(100),
	CONSTRAINT TopicPK PRIMARY KEY  (TopicID));


CREATE TABLE Post(
	PostID					INT AUTO_INCREMENT NOT NULL,
	TopicID					INT NOT NULL,
	EmailAddress			VARCHAR(100) NOT NULL,
	PostText				VARCHAR(1000),
	PostDate				DATE,
	CONSTRAINT PostFK1 FOREIGN KEY (TopicID) REFERENCES Topic (TopicID),
	CONSTRAINT PostFK2	FOREIGN KEY (EmailAddress) REFERENCES GeneralUser (EmailAddress),
	CONSTRAINT PostPK PRIMARY KEY  (PostID));


CREATE TABLE Comment(
	CommentID				INT AUTO_INCREMENT NOT NULL,
	PostID					INT NOT NULL,
	CommentText				VARCHAR(1000),
	CommentDate				DATE,
	CONSTRAINT CommentFK FOREIGN KEY (PostID) REFERENCES Post (PostID),
	CONSTRAINT CommentPK PRIMARY KEY  (CommentID));


CREATE TABLE ActivityLog (
	ActivityLogID INT AUTO_INCREMENT NOT NULL,
	EmailAddress VARCHAR(100) NOT NULL,
	Activity VARCHAR(100),
	PageUrl VARCHAR(500),
	ActivityDate DATE,
	UserType VARCHAR(50),
	CONSTRAINT ActivityLogFK FOREIGN KEY (EmailAddress) REFERENCES GeneralUser (EmailAddress),
	CONSTRAINT ActivityLogPK PRIMARY KEY  (ActivityLogID));
	




-- SELECT STATEMENTS
SELECT * FROM Comment;
SELECT * FROM Post;
SELECT * FROM Topic;
SELECT * FROM Purchase;
SELECT * FROM Item;
SELECT * FROM QuestionOrder;
SELECT * FROM Response;
SELECT * FROM Question;
SELECT * FROM EvalResponse;
SELECT * FROM Evaluatee;
SELECT * FROM Respondent;
SELECT * FROM Eval;
SELECT * FROM WBLEvent;
SELECT * FROM ParentStudent;
SELECT * FROM Attendance;
SELECT * FROM Portfolio;
SELECT * FROM Student;
SELECT * FROM CourseStaff;
SELECT * FROM Course;
SELECT * FROM Staff;
SELECT * FROM Administrator;
SELECT * FROM Donation;
SELECT * FROM Applicant;
SELECT * FROM Cipher;
SELECT * FROM Parent;
SELECT * FROM GeneralUser;




