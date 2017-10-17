---------------------------------------------------------------------------------
--PROCEDURE DE PERSONA
---------------------------------------------------------------------------------
  
create or replace PROCEDURE delete_Person(
	   p_ID_Person  IN Person.ID_Person%TYPE
     )
     
AS
BEGIN
DELETE FROM Person 
WHERE  ID_Person = p_ID_Person;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE PROFESSION
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE delete_Profession(
	   p_ID_Profession   IN Profession.ID_Profession%TYPE
     )
     
AS
BEGIN
DELETE FROM Profession 
WHERE  ID_Profession = p_ID_Profession;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE People_Type
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE delete_People_Type(
	   p_ID_People_Type   IN People_Type.ID_People_Type%TYPE
     )
     
AS
BEGIN
DELETE FROM People_Type
WHERE  ID_People_Type = p_ID_People_Type;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE Systeem_USER
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE delete_System_User(
	   p_ID_System_User   IN System_USER.ID_System_User%TYPE
     )
     
AS
BEGIN
DELETE FROM System_USER 
WHERE  ID_System_User = p_ID_System_User;
END;

/

---------------------------------------------------------------------------------
--PROCEDURE DE Binnacle
---------------------------------------------------------------------------------

create or replace PROCEDURE delete_Binnacle(
	   p_ID_Binnacle      IN Binnacle.ID_Binnacle%TYPE
     )
     
AS
BEGIN
DELETE FROM Binnacle     
WHERE  ID_Binnacle = p_ID_Binnacle;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Sighting
---------------------------------------------------------------------------------

create or replace PROCEDURE delete_Sighting(
	   p_ID_Sighting    IN Sighting.ID_Sighting%TYPE
     )
     
AS
BEGIN
DELETE FROM Sighting    
WHERE  ID_Sighting = p_ID_Sighting;
END;

/

---------------------------------------------------------------------------------
--PROCEDURE DE SightingXPerson
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE delete_SightingXPerson(
	   p_ID_Person     IN SightingXPerson.ID_Person%TYPE
     )
     
AS
BEGIN
DELETE FROM SightingXPerson 
WHERE  ID_Person = p_ID_Person;
END;

/


---------------------------------------------------------------------------------
--PROCEDURE DE Picture
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE delete_Picture(
	   p_ID_Picture    IN Picture.ID_Picture%TYPE
     )
     
AS
BEGIN
DELETE FROM Picture    
WHERE  ID_Picture = p_ID_Picture;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Kind
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Kind(
     p_Id_Kind IN Kind.Id_Kind%TYPE
     )
     
AS
BEGIN
DELETE FROM Kind  
WHERE  Id_Kind = p_Id_Kind;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Orderliness
---------------------------------------------------------------------------------

create or replace PROCEDURE delete_Orderliness(
     p_Id_Orderliness IN Orderliness.Id_Orderliness%TYPE
     )
     
AS
BEGIN
DELETE FROM Orderliness   
WHERE  Id_Orderliness = p_Id_Orderliness;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Suborder
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Suborder(
	 p_Id_Suborder IN Suborder.Id_Suborder%TYPE
     )
     
AS
BEGIN
DELETE FROM Suborder   
WHERE  Id_Suborder = p_Id_Suborder;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Family
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Family(
	 p_Id_Family IN Family.Id_Family%TYPE
     )
     
AS
BEGIN
DELETE FROM Family   
WHERE  Id_Family = p_Id_Family;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Gender
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Gender(
	 p_Id_Gender IN Gender.Id_Gender%TYPE
     )
     
AS
BEGIN
DELETE FROM Gender   
WHERE  Id_Gender = p_Id_Gender;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE Species
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Species(
	 p_Id_Species IN Species.Id_Species%TYPE
     )
     
AS
BEGIN
DELETE FROM Species   
WHERE  Id_Species = p_Id_Species;
END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE Stature
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Stature(
	 p_Id_Stature IN Stature.Id_Stature%TYPE
	 )
     
AS
BEGIN
DELETE FROM Stature   
WHERE  Id_Stature = p_Id_Stature;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE Color
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Color(
	 p_Id_Color IN Color.Id_Color%TYPE
	 )
     
AS
BEGIN
DELETE FROM Color 
WHERE  Id_Color = p_Id_Color;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE Continent
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Continent(
	 p_Id_Continent IN Continent.Id_Continent%TYPE
	 )
     
AS
BEGIN
DELETE FROM Continent 
WHERE  Id_Continent = p_Id_Continent;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Country
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Country(
	 p_Id_Country IN Country.Id_Country%TYPE
	 )
     
AS
BEGIN
DELETE FROM Country 
WHERE  Id_Country = p_Id_Country;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Province
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_Province(
	 p_Id_Province IN Province.Id_Province%TYPE
	 )
     
AS
BEGIN
DELETE FROM Province 
WHERE  Id_Province = p_Id_Province;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE Canton
---------------------------------------------------------------------------------



create or replace PROCEDURE delete_Canton(
	 p_Id_Canton IN Canton.Id_Canton%TYPE
	 )
     
AS
BEGIN
DELETE FROM Canton 
WHERE  Id_Canton = p_Id_Canton;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE District
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_District(
	 p_Id_District IN District.Id_District%TYPE
	 )
     
AS
BEGIN
DELETE FROM District 
WHERE  Id_District = p_Id_District;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE KindsXDistrict
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_KindsXDistrict(
   p_Id_Kind IN KindsXDistrict.Id_Kind%TYPE
   )
     
AS
BEGIN
DELETE FROM KindsXDistrict   
WHERE  Id_Kind = p_Id_Kind;
END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE KindsXColor
---------------------------------------------------------------------------------


create or replace PROCEDURE delete_KindsXColor(
   p_Id_Kind IN KindsXColor.Id_Kind%TYPE
   )
     
AS
BEGIN
DELETE FROM KindsXColor   
WHERE  Id_Kind = p_Id_Kind;
END;

