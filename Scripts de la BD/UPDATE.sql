---------------------------------------------------------------------------------
--PROCEDURE DE PERSONA
---------------------------------------------------------------------------------
  
create or replace PROCEDURE Update_Person(
	   p_ID_Person  IN Person.ID_Person%TYPE,
	   p_Birth_Date IN Person.Birth_Date%TYPE,
	   p_Full_Name  IN Person.Full_Name%TYPE,
	   p_Email      IN Person.Email%TYPE,
	   p_Photo_Path IN Person.Photo_Path%TYPE
     )
     
AS
BEGIN
UPDATE Person 
SET    Birth_Date = p_Birth_Date, Full_Name = p_Full_Name, Email = p_Email, Photo_Path = p_Photo_Path
WHERE  ID_Person = p_ID_Person;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE PROFESSION
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE Update_Profession(
	   p_ID_Profession   IN Profession.ID_Profession%TYPE,
	   p_ID_Person       IN Profession.ID_Person%TYPE,
	   p_Profession_Name IN Profession.Profession_Name%TYPE
     )
     
AS
BEGIN
UPDATE Profession 
SET    Profession_Name = p_Profession_Name 
WHERE  ID_Profession = p_ID_Profession;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE People_Type
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE Update_People_Type(
	   p_ID_People_Type   IN People_Type.ID_People_Type%TYPE,
	   p_ID_person        IN People_Type.ID_person%TYPE,
	   p_Type_Name        IN People_Type.Type_Name%TYPE
     )
     
AS
BEGIN
UPDATE People_Type
SET    Type_Name = p_Type_Name 
WHERE  ID_People_Type = p_ID_People_Type;
END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE System_USER
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE Update_System_User(
	   p_ID_System_User   IN System_USER.ID_System_User%TYPE,
	   p_ID_person        IN System_USER.ID_person%TYPE,
	   p_User_Name        IN System_USER.User_Name%TYPE,
	   p_Password         IN System_USER.Password%TYPE
     )
     
AS
BEGIN
UPDATE System_USER 
SET    User_Name = p_User_Name, Password = p_Password
WHERE  ID_System_User = p_ID_System_User;
END;

/

---------------------------------------------------------------------------------
--PROCEDURE DE Binnacle
---------------------------------------------------------------------------------

create or replace PROCEDURE Update_Binnacle(
	   p_ID_Binnacle      IN Binnacle.ID_Binnacle%TYPE,
	   p_ID_System_User   IN Binnacle.ID_System_User%TYPE,
	   p_Hour             IN Binnacle.Hour%TYPE,
	   p_Old_Password     IN Binnacle.Old_Password%TYPE,
	   p_New_Password     IN Binnacle.New_Password%TYPE
     )
     
AS
BEGIN
UPDATE Binnacle 
SET    Hour = p_Hour, Old_Password = p_Old_Password, New_Password = p_New_Password     
WHERE  ID_Binnacle = p_ID_Binnacle;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Sighting
---------------------------------------------------------------------------------

create or replace PROCEDURE Update_Sighting(
	   p_ID_Sighting    IN Sighting.ID_Sighting%TYPE,
	   p_ID_Person      IN Sighting.ID_Person%TYPE,
	   p_ID_District    IN Sighting.ID_District%TYPE,
	   p_Coordinate     IN Sighting.Coordinate%TYPE,
	   p_Date_Sighting  IN Sighting.Date_Sighting%TYPE
     )
     
AS
BEGIN
UPDATE Sighting 
SET    Coordinate = p_Coordinate, Date_Sighting = p_Date_Sighting     
WHERE  ID_Sighting = p_ID_Sighting;
END;

/

---------------------------------------------------------------------------------
--PROCEDURE DE SightingXPerson
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE Update_SightingXPerson(
	   p_ID_Person     IN SightingXPerson.ID_Person%TYPE,
	   p_ID_Sighting   IN SightingXPerson.ID_Sighting%TYPE,
	   p_Liked         IN SightingXPerson.Liked%TYPE
     )
     
AS
BEGIN
UPDATE SightingXPerson 
SET    Liked = p_Liked     
WHERE  ID_Person = p_ID_Person;
END;

/


---------------------------------------------------------------------------------
--PROCEDURE DE Picture
---------------------------------------------------------------------------------

CREATE OR REPLACE PROCEDURE Update_Picture(
	   p_ID_Picture    IN Picture.ID_Picture%TYPE,
	   p_ID_Sighting   IN Picture.ID_Sighting%TYPE,
	   p_Photo_Path    IN Picture.Photo_Path%TYPE
     )
     
AS
BEGIN
UPDATE Picture 
SET    Photo_Path = p_Photo_Path     
WHERE  ID_Picture = p_ID_Picture;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Kind
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Kind(
     p_Id_Kind IN Kind.Id_Kind%TYPE,
     p_Type_Kind IN Kind.Type_Kind%TYPE,
     p_Animal_Name IN Kind.Animal_Name%TYPE,
     p_English_Name IN Kind.English_Name%TYPE,
     p_Scientific_Name IN Kind.Scientific_Name%TYPE
     )
     
AS
BEGIN
UPDATE Kind 
SET    Id_Kind = p_Id_Kind,  
	   Type_Kind = p_Type_Kind,
	   Animal_Name = p_Animal_Name,
	   English_Name = p_English_Name,
	   Scientific_Name = p_Scientific_Name   
WHERE  Id_Kind = p_Id_Kind;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Orderliness
---------------------------------------------------------------------------------

create or replace PROCEDURE update_Orderliness(
     p_Id_Orderliness IN Orderliness.Id_Orderliness%TYPE,
     p_Id_Kind IN Orderliness.Id_Kind%TYPE,
     p_Orderliness_Name IN Orderliness.Orderliness_Name%TYPE
     )
     
AS
BEGIN
UPDATE Orderliness 
SET    Id_Orderliness = p_Id_Orderliness,
	   Id_Kind = p_Id_Kind,  
	   Orderliness_Name = p_Orderliness_Name   
WHERE  Id_Orderliness = p_Id_Orderliness;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Suborder
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Suborder(
	 p_Id_Suborder IN Suborder.Id_Suborder%TYPE,
     p_Id_Orderliness IN Suborder.Id_Orderliness%TYPE,     
     p_Suborder_Name IN Suborder.Suborder_Name%TYPE
     )
     
AS
BEGIN
UPDATE Suborder 
SET    Id_Suborder = p_Id_Suborder,
	   Id_Orderliness = p_Id_Orderliness,  
	   Suborder_Name = p_Suborder_Name   
WHERE  Id_Suborder = p_Id_Suborder;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Family
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Family(
	 p_Id_Family IN Family.Id_Family%TYPE,
	 p_Id_Suborder IN Family.Id_Suborder%TYPE,     
     p_Family_Name IN Family.Family_Name%TYPE
     )
     
AS
BEGIN
UPDATE Family 
SET    Id_Family = p_Id_Family,
	   Id_Suborder = p_Id_Suborder,  
	   Family_Name = p_Family_Name   
WHERE  Id_Family = p_Id_Family;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Gender
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Gender(
	 p_Id_Gender IN Gender.Id_Gender%TYPE,     
	 p_Id_Family IN Gender.Id_Family%TYPE,
     p_Gender_Name IN Gender.Gender_Name%TYPE
     )
     
AS
BEGIN
UPDATE Gender 
SET    Id_Gender = p_Id_Gender,
	   Id_Family = p_Id_Family,  
	   Gender_Name = p_Gender_Name   
WHERE  Id_Gender = p_Id_Gender;
END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE Species
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Species(
	 p_Id_Species IN Species.Id_Species%TYPE,
	 p_Id_Gender IN Species.Id_Gender%TYPE,     	 
	 p_Is_Extinct IN Species.Is_Extinct%TYPE,
     p_Species_Name IN Species.Species_Name%TYPE
     )
     
AS
BEGIN
UPDATE Species 
SET    Id_Species = p_Id_Species,
	   Id_Gender = p_Id_Gender,  
	   Is_Extinct = p_Is_Extinct,
	   Species_Name = p_Species_Name   
WHERE  Id_Species = p_Id_Species;
END;
/


---------------------------------------------------------------------------------
--PROCEDURE DE Stature
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Stature(
	 p_Id_Stature IN Stature.Id_Stature%TYPE,
	 p_Id_Kind IN Stature.Id_Kind%TYPE,
	 p_Bird_Stature IN Stature.Bird_Stature%TYPE
	 )
     
AS
BEGIN
UPDATE Stature 
SET    Id_Stature = p_Id_Stature,
	   Id_Kind = p_Id_Kind,
	   Bird_Stature = p_Bird_Stature   
WHERE  Id_Stature = p_Id_Stature;
END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE Color
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Color(
	 p_Id_Color IN Color.Id_Color%TYPE,
	 p_Color_Name IN Color.Color_Name%TYPE
	 )
     
AS
BEGIN
UPDATE Color 
SET    Id_Color = p_Id_Color,
	   Color_Name = p_Color_Name
WHERE  Id_Color = p_Id_Color;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE Continent
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Continent(
	 p_Id_Continent IN Continent.Id_Continent%TYPE,
	 p_Continent_Name IN Continent.Continent_Name%TYPE
	 )
     
AS
BEGIN
UPDATE Continent 
SET    Id_Continent = p_Id_Continent,
	   Continent_Name = p_Continent_Name
WHERE  Id_Continent = p_Id_Continent;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Country
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Country(
	 p_Id_Country IN Country.Id_Country%TYPE,
	 p_Id_Continent IN Continent.Id_Continent%TYPE,
	 p_Country_Name IN Country.Country_Name%TYPE
	 )
     
AS
BEGIN
UPDATE Country 
SET    Id_Country = p_Id_Country,
	   Id_Continent = p_Id_Continent,
	   Country_Name = p_Country_Name
WHERE  Id_Country = p_Id_Country;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE Province
---------------------------------------------------------------------------------


create or replace PROCEDURE update_Province(
	 p_Id_Province IN Province.Id_Province%TYPE,
	 p_Id_Country IN Province.Id_Country%TYPE,	 
	 p_Province_Name IN Province.Province_Name%TYPE
	 )
     
AS
BEGIN
UPDATE Province 
SET    Id_Province = p_Id_Province,
	   Id_Country = p_Id_Country,
	   Province_Name = p_Province_Name
WHERE  Id_Province = p_Id_Province;
END;

/
---------------------------------------------------------------------------------
--PROCEDURE DE Canton
---------------------------------------------------------------------------------



create or replace PROCEDURE update_Canton(
	 p_Id_Canton IN Canton.Id_Canton%TYPE,
	 p_Id_Province IN Canton.Id_Province%TYPE,	 	 
	 p_Canton_Name IN Canton.Canton_Name%TYPE
	 )
     
AS
BEGIN
UPDATE Canton 
SET    Id_Canton = p_Id_Canton,
	   Id_Province = p_Id_Province,
	   Canton_Name = p_Canton_Name
WHERE  Id_Canton = p_Id_Canton;
END;
/

---------------------------------------------------------------------------------
--PROCEDURE DE District
---------------------------------------------------------------------------------


create or replace PROCEDURE update_District(
	 p_Id_District IN District.Id_District%TYPE,
	 p_Id_Canton IN District.Id_Canton%TYPE,	 	 	
	 p_District_Name IN District.District_Name%TYPE
	 )
     
AS
BEGIN
UPDATE District 
SET    Id_District = p_Id_District,
	   Id_Canton = p_Id_Canton,
	   District_Name = p_District_Name
WHERE  Id_District = p_Id_District;
END;
/
---------------------------------------------------------------------------------
--PROCEDURE DE KindsXDistrict
---------------------------------------------------------------------------------


create or replace PROCEDURE Update_KindsXDistrict(
   p_Id_Kind IN KindsXDistrict.Id_Kind%TYPE,
   p_Id_District IN KindsXDistrict.Id_District%TYPE
   )
     
AS
BEGIN
UPDATE KindsXDistrict 
SET    Id_District = p_Id_District    
WHERE  Id_Kind = p_Id_Kind;
END;
/


---------------------------------------------------------------------------------
--PROCEDURE DE KindsXColor
---------------------------------------------------------------------------------


create or replace PROCEDURE Update_KindsXColor(
   p_Id_Kind IN KindsXColor.Id_Kind%TYPE,
   p_Id_Color IN KindsXColor.Id_Color%TYPE
   )
     
AS
BEGIN
UPDATE KindsXColor 
SET    Id_Color= p_Id_Color   
WHERE  Id_Kind = p_Id_Kind;
END;