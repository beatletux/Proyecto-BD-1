CREATE TABLE Person
(
Id_Person NUMBER(4), CONSTRAINT pk_Person PRIMARY KEY (Id_Person),
Birth_Date DATE CONSTRAINT Birth_Date_nn NOT NULL,
Full_Name VARCHAR(30) CONSTRAINT Full_Name_nn NOT NULL,
Email VARCHAR(30) CONSTRAINT Email_nn NOT NULL,
Photo_Path VARCHAR(100) CONSTRAINT Photo_Path_nn NOT NULL,
date_last_modification date default sysdate constraint date_modification1 not null,
date_creation date default sysdate constraint date_creation1 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);

CREATE TABLE Profession
(
Id_Profession NUMBER(4), CONSTRAINT pk_Profession PRIMARY KEY (Id_Profession),
Id_Person NUMBER(4), CONSTRAINT FK_Profession FOREIGN KEY (Id_Person) REFERENCES Person(Id_Person),
Profession_Name VARCHAR(20) CONSTRAINT Profession_Name_nn NOT NULL,
date_last_modification date default sysdate constraint date_modification2 not null,
date_creation date default sysdate constraint date_creation2 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);

CREATE TABLE People_Type
(
Id_People_Type NUMBER(4), CONSTRAINT pk_People_Type PRIMARY KEY (Id_People_Type),
Id_Person NUMBER(4), CONSTRAINT FK_People_Type FOREIGN KEY (Id_Person) REFERENCES Person(Id_Person),
Type_Name VARCHAR(20) CONSTRAINT Type_name_nn NOT NULL,
date_last_modification date default sysdate constraint date_modification3 not null,
date_creation date default sysdate constraint date_creation3 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);

CREATE TABLE System_User
(
Id_System_User NUMBER(4), CONSTRAINT pk_System_User PRIMARY KEY (Id_System_User),
Id_Person NUMBER(4), CONSTRAINT FK_System_User FOREIGN KEY (Id_Person) REFERENCES Person(Id_Person),
User_Name VARCHAR(15) CONSTRAINT User_Name_nn NOT NULL,
Password VARCHAR(15) CONSTRAINT Password_nn NOT NULL,
date_last_modification date default sysdate constraint date_modification4 not null,
date_creation date default sysdate constraint date_creation4 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);


CREATE TABLE Binnacle
(
Id_Binnacle NUMBER(4), CONSTRAINT pk_Binnacle PRIMARY KEY (Id_Binnacle),
Id_System_User NUMBER(4), CONSTRAINT FK_Binnacle FOREIGN KEY (Id_System_User) REFERENCES System_User(Id_System_User),
Hour DATE CONSTRAINT Hour_nn NOT NULL,
Old_Password VARCHAR(15) CONSTRAINT Old_Password_nn NOT NULL,
New_Password VARCHAR(15) CONSTRAINT New_Password_nn NOT NULL,
date_last_modification date default sysdate constraint date_modification5 not null,
date_creation date default sysdate constraint date_creation5 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);


CREATE TABLE District
    ( Id_District NUMBER(6), CONSTRAINT pk_Id_District PRIMARY KEY (Id_District),
      Id_Canton NUMBER(6),
      District_Name VARCHAR2(25) CONSTRAINT District_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification6 not null,
      date_creation date default sysdate constraint date_creation6 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Canton
    ( Id_Canton NUMBER(6), CONSTRAINT pk_Id_Canton PRIMARY KEY (Id_Canton),
      Id_Province NUMBER(6),
      Canton_Name VARCHAR2(25) CONSTRAINT Canton_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification7 not null,
      date_creation date default sysdate constraint date_creation7 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Province
    ( Id_Province NUMBER(6), CONSTRAINT pk_Id_Province PRIMARY KEY (Id_Province),
      Id_Country NUMBER(6),
      Province_Name VARCHAR2(25) CONSTRAINT Province_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification8 not null,
      date_creation date default sysdate constraint date_creation8 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Country
    ( Id_Country NUMBER(6), CONSTRAINT pk_Id_Country PRIMARY KEY (Id_Country),
      Id_Continent NUMBER(6),
      Country_Name VARCHAR2(25) CONSTRAINT Country_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification9 not null,
      date_creation date default sysdate constraint date_creation9 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Continent
    ( Id_Continent NUMBER(6), CONSTRAINT pk_Id_Continent PRIMARY KEY (Id_Continent),      
      Continent_Name VARCHAR2(25) CONSTRAINT Continent_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification10 not null,
      date_creation date default sysdate constraint date_creation10 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

ALTER TABLE Country
ADD CONSTRAINT fk_Id_Continent
  FOREIGN KEY (Id_Continent)
  REFERENCES Continent(Id_Continent);

ALTER TABLE Province
ADD CONSTRAINT fk_Id_Country
  FOREIGN KEY (Id_Country)
  REFERENCES Country(Id_Country);

ALTER TABLE Canton
ADD CONSTRAINT fk_Id_Province
  FOREIGN KEY (Id_Province)
  REFERENCES Province(Id_Province);

ALTER TABLE District
ADD CONSTRAINT fk_Id_Canton
  FOREIGN KEY (Id_Canton)
  REFERENCES Canton(Id_Canton);



CREATE TABLE Sighting
(
Id_Sighting NUMBER(4), CONSTRAINT pk_Sighting PRIMARY KEY (Id_Sighting),
Id_Person NUMBER(4), CONSTRAINT FK_Sighting FOREIGN KEY (Id_Person) REFERENCES Person(Id_Person),
Id_District NUMBER(4), CONSTRAINT FK_Id_District FOREIGN KEY (Id_District) REFERENCES District(Id_District),
Coordinate VARCHAR(15) CONSTRAINT Coordinate_nn NOT NULL,
Date_Sighting Date CONSTRAINT Date_Sighting_nn NOT NULL,
date_last_modification date default sysdate constraint date_modification11 not null,
date_creation date default sysdate constraint date_creation11 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);

CREATE TABLE SightingXPerson
(
CONSTRAINT PK_SightingXPerson PRIMARY KEY (Id_Person,Id_Sighting), 
Id_Person NUMBER(4), CONSTRAINT FK1_SightingXPerson FOREIGN KEY (Id_Person) REFERENCES Person(Id_Person),
Id_Sighting NUMBER(4), CONSTRAINT FK2_SightingXPerson FOREIGN KEY (Id_Sighting) REFERENCES Sighting(Id_Sighting),
Liked VARCHAR(15) CONSTRAINT Liked NOT NULL,
date_last_modification date default sysdate constraint date_modification12 not null,
date_creation date default sysdate constraint date_creation12 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);




CREATE TABLE Picture
(
Id_Picture NUMBER(4), CONSTRAINT pk_Picture PRIMARY KEY (Id_Picture),
Id_Sighting NUMBER(4), CONSTRAINT FK_Picture FOREIGN KEY (Id_Sighting) REFERENCES Sighting(Id_Sighting),
Photo_Path VARCHAR(100) CONSTRAINT Photo_Path_nn2 NOT NULL,
date_last_modification date default sysdate constraint date_modification13 not null,
date_creation date default sysdate constraint date_creation13 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);

CREATE TABLE Kind
( Id_Kind NUMBER(6), CONSTRAINT pk_Id_Kind PRIMARY KEY (Id_Kind),
  Type_Kind VARCHAR2(25) CONSTRAINT Type_Kind_nn NOT NULL,
  Animal_Name VARCHAR2(25) CONSTRAINT Animal_Name_nn NOT NULL,
  English_Name VARCHAR2(25) CONSTRAINT English_Name_nn NOT NULL,
  Scientific_Name VARCHAR2(25) CONSTRAINT Scientific_Name_nn NOT NULL,
  date_last_modification date default sysdate constraint date_modification14 not null,
  date_creation date default sysdate constraint date_creation14 not null,
  user_last_modification varchar2(10),
  user_creation varchar2(10)
) ;

CREATE TABLE KindsXDistrict
(
CONSTRAINT PK_KindsXDistrict PRIMARY KEY (Id_Kind,Id_District), 
Id_Kind NUMBER(4), CONSTRAINT FK1_KindsXDistrict FOREIGN KEY (Id_Kind) REFERENCES Kind(Id_Kind),
Id_District NUMBER(4), CONSTRAINT FK2_KindsXDistrict FOREIGN KEY (Id_District) REFERENCES District(Id_District),
date_last_modification date default sysdate constraint date_modification15 not null,
date_creation date default sysdate constraint date_creation15 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);


CREATE TABLE Orderliness
    ( Id_Orderliness NUMBER(6), CONSTRAINT pk_Id_Orderliness PRIMARY KEY (Id_Orderliness),
      Id_Kind NUMBER(6),
      Orderliness_Name VARCHAR2(25) CONSTRAINT Orderliness_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification16 not null,
      date_creation date default sysdate constraint date_creation16 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Suborder
    ( Id_Suborder NUMBER(6), CONSTRAINT pk_Id_Suborder PRIMARY KEY (Id_Suborder),
      Id_Orderliness NUMBER(6),
      Suborder_Name VARCHAR2(25) CONSTRAINT Suborder_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification17 not null,
      date_creation date default sysdate constraint date_creation17 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Family
    ( Id_Family NUMBER(6), CONSTRAINT pk_Id_Family PRIMARY KEY (Id_Family),
      Id_Suborder NUMBER(6),
      Family_Name VARCHAR2(25) CONSTRAINT Family_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification18 not null,
      date_creation date default sysdate constraint date_creation18 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Gender
    ( Id_Gender NUMBER(6), CONSTRAINT pk_Id_Gender PRIMARY KEY (Id_Gender),
      Id_Family NUMBER(6),
      Gender_Name VARCHAR2(25) CONSTRAINT Gender_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification19 not null,
      date_creation date default sysdate constraint date_creation19 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Species
    ( Id_Species NUMBER(6), CONSTRAINT pk_Id_Species PRIMARY KEY (Id_Species),
      Id_Gender NUMBER(6),
      Is_Extinct NUMBER(1) CONSTRAINT Is_Extinct_nn NOT NULL,
      Species_Name VARCHAR2(25) CONSTRAINT Species_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification not null,
      date_creation date default sysdate constraint date_creation20 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Stature
    ( Id_Stature NUMBER(6), CONSTRAINT pk_Id_Stature PRIMARY KEY (Id_Stature),
      Id_Kind NUMBER(6), 
      Bird_Stature NUMBER(6) CONSTRAINT Bird_Stature_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification21 not null,
      date_creation date default sysdate constraint date_creation21 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    ) ;

CREATE TABLE Color
    ( Id_Color NUMBER(6), CONSTRAINT pk_Id_Color PRIMARY KEY (Id_Color),
      Color_Name VARCHAR2(25) CONSTRAINT Color_Name_nn NOT NULL,
      date_last_modification date default sysdate constraint date_modification22 not null,
      date_creation date default sysdate constraint date_creation22 not null,
      user_last_modification varchar2(10),
      user_creation varchar2(10)
    );

CREATE TABLE KindsXColor
(
CONSTRAINT PK_KindsXColor PRIMARY KEY (Id_Kind,Id_Color), 
Id_Kind NUMBER(4), CONSTRAINT FK1_KindsXColor FOREIGN KEY (Id_Kind) REFERENCES Kind(Id_Kind),
Id_Color NUMBER(4), CONSTRAINT FK2_KindsXColor FOREIGN KEY (Id_Color) REFERENCES Color(Id_Color),
date_last_modification date default sysdate constraint date_modification23 not null,
date_creation date default sysdate constraint date_creation23 not null,
user_last_modification varchar2(10),
user_creation varchar2(10)
);

    
ALTER TABLE Orderliness
ADD CONSTRAINT fk_Id_Kind
  FOREIGN KEY (Id_Kind)
  REFERENCES Kind(Id_Kind);

ALTER TABLE Suborder
ADD CONSTRAINT fk_Id_Orderliness
  FOREIGN KEY (Id_Orderliness)
  REFERENCES Orderliness(Id_Orderliness);

ALTER TABLE Family
ADD CONSTRAINT fk_Id_Suborder
  FOREIGN KEY (Id_Suborder)
  REFERENCES Suborder(Id_Suborder);

ALTER TABLE Gender
ADD CONSTRAINT fk_Id_Family
  FOREIGN KEY (Id_Family)
  REFERENCES Family(Id_Family);

ALTER TABLE Species
ADD CONSTRAINT fk_Id_Gender
  FOREIGN KEY (Id_Gender)
  REFERENCES Gender(Id_Gender);

ALTER TABLE SIGHTING
  ADD  ID_KIND number(4);
  
ALTER TABLE SIGHTING
ADD CONSTRAINT fk_kind_cmp
  FOREIGN KEY (ID_KIND)
  REFERENCES KIND(ID_KIND);
ALTER TABLE SYSTEM_USER MODIFY PASSWORD VARCHAR2(128);
