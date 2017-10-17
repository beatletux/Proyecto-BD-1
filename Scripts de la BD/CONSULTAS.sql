---------------------------------------------------------------
--CONSULTAS CARACTERISTICA
---------------------------------------------------------------

--para ejecutar el siguiente codigo de consultas
--   var HOLA refcursor
--   exec CONSULTATIONS_CHARACTERISTIC(1,:HOLA)
--   print HOLA 


create or replace PROCEDURE "CONSULTATIONS_CHARACTERISTIC" (buscar NUMBER,p_recordset OUT SYS_REFCURSOR)
AS
BEGIN
    open p_recordset for

    SELECT KIND.ID_KIND, 
           KIND.SCIENTIFIC_NAME, 
           ORDERLINESS.ORDERLINESS_NAME ORDERLINESS,
           SUBORDER.SUBORDER_NAME SUBORDER,
           FAMILY.FAMILY_NAME Family,
           GENDER.GENDER_NAME GENDER,
           SPECIES.SPECIES_NAME SPECIES
    FROM KIND
    INNER JOIN ORDERLINESS ON KIND.ID_KIND = ORDERLINESS.ID_ORDERLINESS
    INNER JOIN SUBORDER    ON ORDERLINESS.ID_ORDERLINESS = SUBORDER.ID_SUBORDER
    INNER JOIN FAMILY      ON SUBORDER.ID_SUBORDER= FAMILY.ID_FAMILY
    INNER JOIN GENDER      ON FAMILY.ID_FAMILY = GENDER.ID_GENDER
    INNER JOIN SPECIES     ON GENDER.ID_GENDER = SPECIES.ID_SPECIES
    WHERE KIND.ID_KIND = buscar
    ORDER BY ORDERLINESS ASC, SUBORDER ASC, FAMILY ASC, GENDER ASC, SPECIES ASC;
    
END CONSULTATIONS_CHARACTERISTIC;

/

--para ejecutar los siguientes codigos:
--select FUNCTIONS_ORDERLINESS_COUNTING from ORDERLINESS WHERE ID_ORDERLINESS = 1;
--select FUNCTIONS_SUBORDER_COUNTING from SUBORDER WHERE ID_SUBORDER = 1;
--select FUNCTIONS_FAMILY_COUNTING from FAMILY WHERE ID_FAMILY = 1;
--select FUNCTIONS_GENDER_COUNTING from GENDER WHERE ID_GENDER = 1;
--select FUNCTIONS_SPECIES_COUNTING from SPECIES WHERE ID_SPECIES = 1;




---------------------------------------------------------------
--FUNCTIONS_ORDEN
---------------------------------------------------------------

CREATE OR REPLACE FUNCTION "FUNCTIONS_ORDERLINESS_COUNTING" 
     
RETURN NUMBER
IS
return_count NUMBER;
cursor c1 is
select count(*)
from ORDERLINESS;

BEGIN

  open c1;
  fetch c1 into return_count;
  
  close c1;
RETURN return_count;
END;
/
---------------------------------------------------------------
--FUNCTIONS_SUBORDEN
---------------------------------------------------------------
 
create or replace FUNCTION "FUNCTIONS_SUBORDER_COUNTING" 
     
RETURN NUMBER
IS
return_count NUMBER;
cursor c1 is
select count(*)
from SUBORDER;

BEGIN

  open c1;
  fetch c1 into return_count;

  close c1;
RETURN return_count;
END;
/

---------------------------------------------------------------
--FUNCTIONS_FAMILIA
---------------------------------------------------------------

create or replace FUNCTION "FUNCTIONS_FAMILY_COUNTING" 
     
RETURN NUMBER
IS
return_count NUMBER;
cursor c1 is
select count(*)
from FAMILY;

BEGIN

  open c1;
  fetch c1 into return_count;

  close c1;
RETURN return_count;
END;
/

---------------------------------------------------------------
--FUNCTIONS_GENERO
---------------------------------------------------------------

create or replace FUNCTION "FUNCTIONS_GENDER_COUNTING" 
     
RETURN NUMBER
IS
return_count NUMBER;
cursor c1 is
select count(*)
from GENDER;

BEGIN

  open c1;
  fetch c1 into return_count;

  close c1;
RETURN return_count;
END;
/
---------------------------------------------------------------
--FUNCTIONS_ORDEN
---------------------------------------------------------------

create or replace FUNCTION "FUNCTIONS_SPECIES_COUNTING" 
     
RETURN NUMBER
IS
return_count NUMBER;
cursor c1 is
select count(*)
from SPECIES;

BEGIN

  open c1;
  fetch c1 into return_count;

  close c1;
RETURN return_count;
END;
/


---------------------------------------------------------------
--PROCEDURE BIRDS X UBICATION
---------------------------------------------------------------


create or replace PROCEDURE BIRDSXLOCATION(
   p_Id_District IN KINDSXDISTRICT.Id_District%TYPE, p_recordset OUT SYS_REFCURSOR
   )
     
IS
    colum1 KIND.ID_KIND%TYPE;
    colum2 KIND.ANIMAL_NAME%TYPE;
    colum3 KIND.SCIENTIFIC_NAME%TYPE;
BEGIN
  open p_recordset for
  SELECT KIND.ID_KIND,
         KIND.ANIMAL_NAME,
         KIND.SCIENTIFIC_NAME
         INTO colum1, colum2, colum3
         FROM KIND
         INNER JOIN KINDSXDISTRICT ON KIND.ID_KIND = KINDSXDISTRICT.ID_KIND
         WHERE KINDSXDISTRICT.ID_DISTRICT = p_Id_District;

  COMMIT;

END;

/


---------------------------------------------------------------
--PROCEDURE BIRDS X STATURE
---------------------------------------------------------------

create or replace PROCEDURE BIRDSXSTATURE(
   p_BIRD_STATURE IN STATURE.BIRD_STATURE%TYPE, p_recordset OUT SYS_REFCURSOR
   )
     
IS
    colum1 KIND.ID_KIND%TYPE;
    colum2 KIND.ANIMAL_NAME%TYPE;
    colum3 KIND.SCIENTIFIC_NAME%TYPE;
BEGIN
  open p_recordset for
  SELECT KIND.ID_KIND,
         KIND.ANIMAL_NAME,
         KIND.SCIENTIFIC_NAME
         INTO colum1, colum2, colum3
         FROM KIND
         INNER JOIN STATURE ON KIND.ID_KIND = STATURE.ID_KIND
         WHERE STATURE.BIRD_STATURE = p_BIRD_STATURE;

  COMMIT;

END;
/



---------------------------------------------------------------
--PROCEDURE BIRDS X DISTRICT
---------------------------------------------------------------


create or replace PROCEDURE "CONSULTATIONS_DISTRICT" (buscar NUMBER,p_recordset OUT SYS_REFCURSOR)
AS
BEGIN
    open p_recordset for

     SELECT    
        DISTRICT.ID_DISTRICT,
        DISTRICT.DISTRICT_NAME,
        CANTON.CANTON_NAME CANTON,
        PROVINCE.PROVINCE_NAME PROVINCE,
        COUNTRY.COUNTRY_NAME COUNTRY,
        CONTINENT.CONTINENT_NAME CONTINENT
    FROM DISTRICT
    INNER JOIN CANTON ON CANTON.ID_CANTON = DISTRICT.ID_DISTRICT
    INNER JOIN PROVINCE ON CANTON.ID_CANTON = PROVINCE.ID_PROVINCE
    INNER JOIN COUNTRY ON PROVINCE.ID_PROVINCE = COUNTRY.ID_COUNTRY 
    INNER JOIN CONTINENT ON COUNTRY.ID_COUNTRY = CONTINENT.ID_CONTINENT 
    WHERE DISTRICT.ID_DISTRICT = buscar;

END CONSULTATIONS_DISTRICT;

/

---------------------------------------------------------------
--FUNCTION SIGHTXPER TOP VIEW
---------------------------------------------------------------

create or replace FUNCTION "FUNCTIONS_SIGHXPER_TOP_VIEW" 
     
RETURN NUMBER
IS
return_count NUMBER;
cursor c1 is
select max(ID_PERSON) from sightingxperson;

BEGIN

  open c1;
  fetch c1 into return_count;

  close c1;
RETURN return_count;
END;
/


---------------------------------------------------------------
--PROCEDURE SIGHTING X PERSON
---------------------------------------------------------------

create or replace PROCEDURE "CONSULTATIONS_SIGHTINGXPERSON" (buscar NUMBER,p_recordset OUT SYS_REFCURSOR)
AS
BEGIN
    open p_recordset for

 SELECT    PERSON.ID_PERSON,
           PERSON.FULL_NAME,
           SIGHTING.ID_SIGHTING SIGHTING,
           SIGHTING.COORDINATE,
           KIND.ID_KIND KIND,
           DISTRICT.ID_DISTRICT DISTRICT
    FROM PERSON
    INNER JOIN SIGHTING ON SIGHTING.ID_PERSON = PERSON.ID_PERSON
    INNER JOIN KIND ON KIND.ID_KIND = SIGHTING.ID_KIND 
    INNER JOIN DISTRICT ON DISTRICT.ID_DISTRICT = SIGHTING.ID_DISTRICT 
    WHERE PERSON.ID_PERSON = BUSCAR;

END CONSULTATIONS_SIGHTINGXPERSON;