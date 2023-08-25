<?php 
// ACID:
// atomicity, consistency, isolation, and durability.
// 1. Agar 1ta joyda error bersa slogan actionlarga auto error beradi yani qolgalari bajarilmaydi
// 2. Agar negative qiymatlar kiritlsa error beradi
// 3. 1ta action tugamanguncha 2chi actionna russet berilmaydi
//4. action tuganidan song u database permament saqlanadi qachonki uni boshqa buyruq bilan ozgartirlimaguncha

//creating ytable inthe database
" CREATE TABLE presonal_info (
	firstname varchar(50) NULL,
	lastname varchar(50) NULL,
	dob datetime  NULL,
	id int NOT NULL,
) ON PRIMARY";

//inserting datas:
"INSERT INTO personal_info(
	firstname,lastname,dob,id
)VALUES('james','adams','1994-08-10')";



//DML statements- data manipulations statements: select, insert, update, delete;
"INSERT INTO tablename(table1,table2)VALUE('value1', 'value2')";
"SELECT * FROM tablename";
"SELECT * FROM tablename WHERE statements";
"UPDATE tablename SET table1='new_value' WHERE table1='old_value'";
"DELETE FROM tablename WHERE table1='value'";



//DDL statemanets data definition language: create, alter, drop, truncate;
//create;
####
//alter; //can add, modify, drop, rename
"ALTER TABLE tablename ADD (new_table varchar(20)";
//drop;
"DROP TABLE tablename";
//truncate; delete
"TRUNCET tabble tablename";




//DCL data control language  statements this is control over the data in the databse: GRANT, REVOKE;
//GRANT:  sql select, update, insert, delete, and privilage on the table or views;
"GRANT UPDATE ON ORDER_BACKLOG TO JAMES WITH GRANT OPTION"; //now JAMES has privilage to update 
"GRANT SELECT ON TABLE tablename TO PUBLIC "; //now every body can select this table

//REVOKE used to cancel previous granted or denied permision;
"REVOKE DELETE ON tablename FROM james";
"REVOKE ALL ON tablename FROM james";





//TCL- transaction control language statements; //used to manage the transaction in the database. used to manage the changes made by DML statements. also can group DML statements- COOMIT, ROLLBACK, SAVEPOINT ;
//COOMIT used to permamnetly save datas into the databse;
"BEGIN trans name";
"UPDATE tablename SET table1='new_value' WHERE table1='old_value'";
"COMMIT trans name";

//ROLLBACK- Rollback is used to undo the changes made by any command but only before a commit is done.
//• We can't Rollback data which has been committed in the database with the help of the commit keyword.
"DECLARE @BookCount int
BEGIN TRANSACTION AddBook
INSERT INTO Books VALUES (20, 'Book15', 'Cat5', 2000)
SELECT @BookCount = COUNT(*) FROM Books WHERE name = 'Book15' IF @BookCount > 1
BEGIN
ROLLBACK TRANSACTION AddBook
PRINT 'A book with the same name already exists‘
END
ELSE
BEGIN
COMMIT TRANSACTION AddStudent PRINT 'New book added successfully‘ END";
/**SAVEPOINT command is used to temporarily save a transaction so that you can roll back to that point whenever necessary.
• Savepoint names must be distinct within a given transaction.
• After a savepoint has been created, you can either continue processing, commit your work, roll back the entire
transaction, or roll back to the savepoint.
**/

"UPDATE employees SET salary = 7000 WHERE last_name = 'Banda';
SAVEPOINT banda_sal;
UPDATE employees SET salary = 12000 WHERE last_name = 'Greene'; SAVEPOINT greene_sal;
SELECT SUM(salary) FROM employees;
ROLLBACK TO SAVEPOINT banda_sal;
UPDATE employees SET salary = 11000 WHERE last_name = 'Greene'; COMMIT";