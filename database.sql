DROP DATABASE IF EXISTS asg3;
CREATE DATABASE asg3;
USE asg3;

CREATE TABLE clinic(
    clinicID INT(11) NOT NULL	AUTO_INCREMENT,
    clinicName VARCHAR(50) NOT NULL,
    PRIMARY KEY (clinicID)
    );
    
CREATE TABLE physician(
    physicianID INT(11) NOT NULL AUTO_INCREMENT,
    physicianFirstName CHAR(50) NOT NULL,
    physicianLastname  CHAR(50) NOT NULL,
    clinicID INT(11) NOT null,
    PRIMARY KEY (physicianID),
    FOREIGN KEY (clinicID) REFERENCES clinic(clinicID)
    );
	
	
INSERT INTO physician VALUES 
(111,'Al','Bundy',1), 
(221,'Peggy','Bundy',2), 
(331,'Charley','Kelly',3), 
(441,'Rob','Mcheleny',4),
(551,'Dennis','Reynolds',5);

INSERT INTO clinic VALUES
(1,'Red'), 
(2,'Blue'), 
(3,'Yellow'),
(4,'Black'),
(5,'Pink')

