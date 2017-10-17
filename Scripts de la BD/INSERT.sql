---------------------------------------------------------------------------------
--PROCEDURE DE PERSONA
---------------------------------------------------------------------------------
  
create or replace PROCEDURE insert_Person(
	   p_ID_Person IN Person.ID_Person%TYPE,
	   p_Birth_Date IN Person.Birth_Date%TYPE,
	   p_Full_Name IN Person.Full_Name%TYPE,
	   p_Email IN Person.Email%TYPE,
	   p_Photo_Path IN Person.Photo_Path%TYPE
     )
     
IS
BEGIN

  INSERT INTO Person(ID_Person,Birth_Date,Full_Name,Email,Photo_Path) 
  VALUES (p_ID_Person,p_Birth_Date,p_Full_Name,p_Email,p_Photo_Path);

  COMMIT;

END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE PROFESSION
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE insert_Profession(
	   p_ID_Profession   IN Profession.ID_Profession%TYPE,
	   p_ID_Person       IN Profession.ID_Person%TYPE,
	   p_Profession_Name IN Profession.Profession_Name%TYPE
     )
     
IS
BEGIN

  INSERT INTO Profession(ID_Profession,ID_Person,Profession_Name) 
  VALUES (p_Profession_Name, p_ID_Person, p_ID_Profession);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE People_Type
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE insert_People_Type(
	   p_ID_People_Type   IN People_Type.ID_People_Type%TYPE,
	   p_ID_person        IN People_Type.ID_person%TYPE,
	   p_Type_Name        IN People_Type.Type_Name%TYPE
     )
     
IS
BEGIN

  INSERT INTO People_Type(ID_People_Type,ID_Person,Type_Name) 
  VALUES (p_ID_People_Type, p_ID_Person, p_Type_Name);

  COMMIT;

END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE System_USER
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE insert_System_User(
	   p_ID_System_User   IN System_USER.ID_System_User%TYPE,
	   p_ID_Person        IN System_USER.ID_person%TYPE,
	   p_User_Name        IN System_USER.User_Name%TYPE,
	   p_Password         IN System_USER.Password%TYPE
     )
     
IS
BEGIN

  INSERT INTO System_User(ID_System_User,ID_Person,User_Name,Password) 
  VALUES (p_ID_System_User, p_ID_Person, p_User_Name,p_Password);

  COMMIT;

END;
/


---------------------------------------------------------------------------------
--PROCEDURE DE Binnacle
---------------------------------------------------------------------------------

create or replace PROCEDURE insert_Binnacle(
	   p_ID_Binnacle      IN Binnacle.ID_Binnacle%TYPE,
	   p_ID_System_User   IN Binnacle.ID_System_User%TYPE,
	   p_Hour             IN Binnacle.Hour%TYPE,
	   p_Old_Password     IN Binnacle.Old_Password%TYPE,
	   p_New_Password     IN Binnacle.New_Password%TYPE
     )
     
IS
BEGIN

  INSERT INTO Binnacle(ID_Binnacle,ID_System_User,Hour,Old_Password,New_Password) 
  VALUES (p_ID_Binnacle, p_ID_System_User, p_Hour,p_Old_Password,p_New_Password);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Sighting
---------------------------------------------------------------------------------

create or replace PROCEDURE insert_Sighting(
     p_ID_Sighting    IN Sighting.ID_Sighting%TYPE,
     p_ID_Person      IN Sighting.ID_Person%TYPE,
     p_ID_District    IN Sighting.ID_District%TYPE,
     p_Coordinate     IN Sighting.Coordinate%TYPE,
     p_Date_Sighting  IN Sighting.Date_Sighting%TYPE,
       p_ID_KIND        IN SIGHTING.ID_KIND%TYPE
     )
     
IS
BEGIN

  INSERT INTO Sighting(ID_Sighting,ID_Person,ID_District,Coordinate,Date_Sighting,ID_KIND) 
  VALUES (p_ID_Sighting, p_ID_Person,p_ID_District,p_Coordinate,p_Date_Sighting,p_ID_KIND);

  COMMIT;

END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE SightingXPerson
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE insert_SightingXPerson(
	   p_ID_Person     IN SightingXPerson.ID_Person%TYPE,
	   p_ID_Sighting   IN SightingXPerson.ID_Sighting%TYPE,
	   p_Liked         IN SightingXPerson.Liked%TYPE
     )
     
IS
BEGIN

  INSERT INTO SightingXPerson(ID_Person,ID_Sighting,Liked) 
  VALUES (p_ID_Person, p_ID_Sighting, p_Liked);

  COMMIT;

END;


/
---------------------------------------------------------------------------------
--PROCEDURE DE Picture
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE insert_Picture(
	   p_ID_Picture    IN Picture.ID_Picture%TYPE,
	   p_ID_Sighting   IN Picture.ID_Sighting%TYPE,
	   p_Photo_Path    IN Picture.Photo_Path%TYPE
     )
     
IS
BEGIN

  INSERT INTO Picture(ID_Picture,ID_Sighting,Photo_Path) 
  VALUES (p_ID_Picture, p_ID_Sighting, p_Photo_Path);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Kind
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Kind(
     p_Id_Kind IN Kind.Id_Kind%TYPE,
     p_Type_Kind IN Kind.Type_Kind%TYPE,
     p_Animal_Name IN Kind.Animal_Name%TYPE,
     p_English_Name IN Kind.English_Name%TYPE,
     p_Scientific_Name IN Kind.Scientific_Name%TYPE
     )
     
IS
BEGIN

  INSERT INTO Kind(Id_Kind,Type_Kind,Animal_Name, English_Name, Scientific_Name) 
  VALUES (p_Id_Kind,p_Type_Kind,p_Animal_Name, p_English_Name, p_Scientific_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Orderliness
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Orderliness(
     p_Id_Orderliness IN Orderliness.Id_Orderliness%TYPE,
     p_Id_Kind IN Orderliness.Id_Kind%TYPE,
     p_Orderliness_Name IN Orderliness.Orderliness_Name%TYPE
     )
     
IS
BEGIN

  INSERT INTO Orderliness(Id_Orderliness,Id_Kind, Orderliness_Name) 
  VALUES (p_Id_Orderliness,p_Id_Kind, p_Orderliness_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Suborder
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Suborder(
   p_Id_Suborder IN Suborder.Id_Suborder%TYPE,
     p_Id_Orderliness IN Suborder.Id_Orderliness%TYPE,     
     p_Suborder_Name IN Suborder.Suborder_Name%TYPE
     )
     
IS
BEGIN

  INSERT INTO Suborder(Id_Suborder, Id_Orderliness, Suborder_Name) 
  VALUES (p_Id_Suborder,p_Id_Orderliness, p_Suborder_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Family
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Family(
   p_Id_Family IN Family.Id_Family%TYPE,
   p_Id_Suborder IN Family.Id_Suborder%TYPE,     
     p_Family_Name IN Family.Family_Name%TYPE
     )
     
IS
BEGIN

  INSERT INTO Family(Id_Family, Id_Suborder, Family_Name) 
  VALUES (p_Id_Family,p_Id_Suborder, p_Family_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Gender
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Gender(
   p_Id_Gender IN Gender.Id_Gender%TYPE,     
   p_Id_Family IN Gender.Id_Family%TYPE,
     p_Gender_Name IN Gender.Gender_Name%TYPE
     )
     
IS
BEGIN

  INSERT INTO Gender(Id_Gender, Id_Family, Gender_Name) 
  VALUES (p_Id_Gender,p_Id_Family, p_Gender_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Species
---------------------------------------------------------------------------------



create or replace PROCEDURE insert_Species(
   p_Id_Species IN Species.Id_Species%TYPE,
   p_Id_Gender IN Species.Id_Gender%TYPE,        
   p_Is_Extinct IN Species.Is_Extinct%TYPE,
     p_Species_Name IN Species.Species_Name%TYPE
     )
     
IS
BEGIN

  INSERT INTO Species(Id_Species, Id_Gender, Is_Extinct, Species_Name) 
  VALUES (p_Id_Species,p_Id_Gender, p_Is_Extinct, p_Species_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Stature
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Stature(
   p_Id_Stature IN Stature.Id_Stature%TYPE,
   p_Id_Kind IN Stature.Id_Kind%TYPE,
   p_Bird_Stature IN Stature.Bird_Stature%TYPE
   )
     
IS
BEGIN

  INSERT INTO Stature(Id_Stature, Id_Kind, Bird_Stature) 
  VALUES (p_Id_Stature, p_Id_Kind, p_Bird_Stature);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Color
---------------------------------------------------------------------------------



create or replace PROCEDURE insert_Color(
   p_Id_Color IN Color.Id_Color%TYPE,
   p_Color_Name IN Color.Color_Name%TYPE
   )
     
IS
BEGIN

  INSERT INTO Color(Id_Color, Color_Name) 
  VALUES (p_Id_Color, p_Color_Name);

  COMMIT;

END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE Continent
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Continent(
   p_Id_Continent IN Continent.Id_Continent%TYPE,
   p_Continent_Name IN Continent.Continent_Name%TYPE
   )
     
IS
BEGIN

  INSERT INTO Continent(Id_Continent, Continent_Name) 
  VALUES (p_Id_Continent, p_Continent_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Country
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Country(
   p_Id_Country IN Country.Id_Country%TYPE,
   p_Id_Continent IN Continent.Id_Continent%TYPE,
   p_Country_Name IN Country.Country_Name%TYPE
   )
     
IS
BEGIN

  INSERT INTO Country(Id_Country, Country_Name) 
  VALUES (p_Id_Country, p_Country_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Province
---------------------------------------------------------------------------------


create or replace PROCEDURE insert_Province(
   p_Id_Province IN Province.Id_Province%TYPE,
   p_Id_Country IN Province.Id_Country%TYPE,   
   p_Province_Name IN Province.Province_Name%TYPE
   )
     
IS
BEGIN

  INSERT INTO Province(Id_Province, Id_Country, Province_Name) 
  VALUES (p_Id_Province, p_Id_Country, p_Province_Name);

  COMMIT;

END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE Canton
---------------------------------------------------------------------------------



create or replace PROCEDURE insert_Canton(
   p_Id_Canton IN Canton.Id_Canton%TYPE,
   p_Id_Province IN Canton.Id_Province%TYPE,     
   p_Canton_Name IN Canton.Canton_Name%TYPE
   )
     
IS
BEGIN

  INSERT INTO Canton(Id_Canton, Id_Province, Canton_Name) 
  VALUES (p_Id_Canton, p_Id_Province, p_Canton_Name);

  COMMIT;

END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE District
---------------------------------------------------------------------------------

create or replace PROCEDURE insert_District(
   p_Id_District IN District.Id_District%TYPE,
   p_Id_Canton IN District.Id_Canton%TYPE,      
   p_District_Name IN District.District_Name%TYPE
   )
     
IS
BEGIN

  INSERT INTO District(Id_District, Id_Canton, District_Name) 
  VALUES (p_Id_District, p_Id_Canton, p_District_Name);

  COMMIT;

END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE KindsXDistrict
---------------------------------------------------------------------------------

create or replace PROCEDURE insert_KindsXDistrict(
   p_Id_Kind IN KindsXDistrict.Id_Kind%TYPE,
   p_Id_District IN KindsXDistrict.Id_District%TYPE
   )
     
IS
BEGIN

  INSERT INTO KindsXDistrict(Id_Kind,Id_District) 
  VALUES (p_Id_Kind, p_Id_District);

  COMMIT;

END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE KindsXColor
---------------------------------------------------------------------------------

create or replace PROCEDURE insert_KindsXColor(
   p_Id_Kind IN KindsXColor.Id_Kind%TYPE,
   p_Id_Color IN KindsXColor.Id_Color%TYPE
   )
     
IS
BEGIN

  INSERT INTO KindsXColor(Id_Kind,Id_Color) 
  VALUES (p_Id_Kind, p_Id_Color);

  COMMIT;

END;











