<?php 
/**CREATE TABLE Statement
CREATE TABLE [database_name.][schema_name.]table_name ( pk_column data_type PRIMARY KEY,
column_1 data_type NOT NULL,
column_2 data_type,
..., table_constraints );
**/
"CREATE TABLE sales.visits (
	visit_id INT PRIMARY KEY IDENTITY (1, 1),
	first_name VARCHAR (50) NOT NULL,
	last_name VARCHAR (50) NOT NULL,
	visited_at DATETIME, phone VARCHAR(20),
	store_id INT NOT NULL,
	FOREIGN KEY (store_id) REFERENCES sales.stores (store_id) );";

/**What is Temporary (temp) Table
• A temporary table in SQL Server, as the name suggests, is a database table that exists temporarily on the database server.
• A temporary table stores a subset of data from a normal table for a certain period of time.
• Temporary tables are particularly useful when you have a large number of records in a table and you repeatedly need
to interact with a small subset of those records.
• In such cases instead of filtering the data again and again to fetch the subset, you can filter the data once and store it in a temporary table.
• Temporary tables are stored inside “tempdb” which is a system database.
• The name of a temporary table must start with a hash (#).

 */
//• Method 1.
"select BusinessEntityID,firstname,lastname
into #TempPersonTable
from [Person].[Person] where title = 'mr. ‘";

//• Method 2. 
"Create table #TempPersonTable (
BusinessEntityID int, Firstname nvarchar(50), lastname nvarchar(50) ) INSERT INTO #TempPersonTable
SELECT BusinessEntityID,FirstName,LastName
from [Person].[Person]
where title = 'mr.'";

/**What is a View ?
• A VIEW in SQL Server is like a virtual table that contains data from one or multiple tables.
• It does not hold any data and does not exist physically in the database.
• Similar to a SQL table, the view name should be unique in a database.
• It contains a set of predefined SQL queries to fetch data from the database..
• It can contain database tables from single or multiple databases as well.
• A VIEW does not require any storage in a database because it does not exist physically.

 */
//How to create a View
"CREATE VIEW Name AS
Select column1, Column2...Column N From tables Where conditions;
CREATE VIEW EmployeeRecords AS
SELECT FROM
TypeID WHERE
Person.Person.Title, Person.Person.FirstName, Person.Person.LastName, Person.PersonPhone.PhoneNumber, Person.PhoneNumberType.Name
Person.Person INNER JOIN
Person.PersonPhone ON Person.Person.BusinessEntityID = Person.PersonPhone.BusinessEntityID INNER JOIN
Person.PhoneNumberType ON Person.PersonPhone.PhoneNumberTypeID = Person.PhoneNumberType.PhoneNumber (Person.Person.Title = N'Mr.')";

/**SELECT Statement in detail
 SELECT expressions
From table_name
[WHERE clause]
[GROUP BY clause]
[HAVING clause]
[ORDER BY clause]


Specify Columns Name
SELECT coulmn1,column2 ,,,,,,columnN From table_name;
• List All Columns using *
SELECT *
From table_name;
• Column Order does not matter SELECT column3, column1, column6 From table_name;

 */




 /**Operators, Expressions and Conditions
	
 SQL Operators
• The symbols which are used to perform logical and mathematical operations in SQL are called SQL operators.
• There are three types of Operators used in SQL.
• Arithmetic operators.
• Relational operators.
• Logical operators.

Expressions
• An expression is a combination of one or more values, operators and SQL functions that evaluate to a value.
• These SQL EXPRESSIONs are like formulae and they are written in query language.
• You can also use them to query the database for a specific set of data.

Types of Expressions
• SQL Boolean expressions fetch data based on one-to-one matching. In other words, we can think of it as a query
that fetches one result at a time.
• Find out employees whose age is equal to 26.
Query: SELECT * FROM dataflair_employee WHERE age = 26 ;
• SQL Numerical expressions are used to perform mathematical operations on the stored data.
• Find employees whose age, if doubled, will be more than 50.
Query: SELECT * FROM dataflair_employee WHERE age*2 > 50 ;
• SQL Date expressions are used to compare and get data according to various date-related queries and conditions.
• Find the employees who were born after 1995 January.
Query: SELECT * FROM dataflair_employee WHERE DoB > DATE(‘1995/01/01’) ;



Conditions
• A condition specifies a combination of one or more expressions and logical (Boolean) operators and returns a value of TRUE, FALSE, or unknown.
• SELECT *
FROM suppliers
WHERE (state = 'California' AND supplier_id <> 900) OR (supplier_id = 100);
*/
"SELECT column1, column2, columnN FROM table_name WHERE [EXPRESSION | CONDITION|]";
"SELECT * FROM dataflair_employee WHERE age = 26";
"SELECT * FROM dataflair_employee WHERE age*2 > 50";
"SELECT * FROM dataflair_employee WHERE DoB > DATE(‘1995/01/01’)";
"SELECT *
FROM suppliers
WHERE (state = 'California' AND supplier_id <> 900) OR (supplier_id = 100)";





//WHERE Clause, ORDER BY Clause, GROUP BY Clause, HAVING Clause

/**WHERE Clause
• WHERE clause is used to specify a condition while fetching the data from a single table or by joining with multiple
tables.
• If the given condition is satisfied, then only it returns a specific value from the table.
• We use the WHERE clause to filter the records and fetching only the necessary records.
• The WHERE clause is not only used in the SELECT statement, but it is also used in the UPDATE, DELETE statement, etc.
• SELECT column1, column2, columnN FROM table_name
WHERE [condition]

ORDER BY Clause
• ORDER BY clause is used to sort the data in ascending or descending order, based on one or more columns.
• Some databases sort the query results in an ascending order by default.
• SELECT column-list
FROM table_name
[WHERE condition]
[ORDER BY column1, column2, .. columnN] [ASC | DESC];


GROUP BY Clause
• GROUP BY clause is used in collaboration with the SELECT statement to arrange identical data into groups.
• like "find the number of customers in each country".
• Often used with aggregate functions (COUNT(), MAX(), MIN(), SUM(), AVG()) to group the result-set by one or more columns.
• GROUP BY clause follows the WHERE clause in a SELECT statement and precedes the ORDER BY clause
• SELECT column1, column2
FROM table_name
WHERE [ conditions ]
GROUP BY column1, column2 ORDER BY column1, column2

HAVING Clause
• HAVING Clause enables you to specify conditions that filter which group results appear in the results.
• The WHERE clause places conditions on the selected columns.
• Whereas the HAVING clause places conditions on groups created by the GROUP BY clause.
• The HAVING clause must follow the GROUP BY clause in a query and must also precede the ORDER BY clause if used.
• SELECT column1, column2 FROM table1, table2
WHERE [ conditions ]
GROUP BY column1, column2 HAVING [ conditions ]
ORDER BY column1, column2
 */
"SELECT column1, column2, columnN FROM table_name
WHERE [condition]";

"SELECT column-list
FROM table_name
[WHERE condition]
[ORDER BY column1, column2, .. columnN] [ASC | DESC]";

"SELECT column1, column2
FROM table_name
WHERE [ conditions ]
GROUP BY column1, column2 ORDER BY column1, column2";

"SELECT column1, column2 FROM table1, table2
WHERE [ conditions ]
GROUP BY column1, column2 HAVING [ conditions ]
ORDER BY column1, column2";

/**Select from two tables - JOINS
 Why we need to select from two or more Tables
• Can’t we just dump everything into a spreadsheet and sort things out there?
• It would be incredibly time consuming, tedious, and error prone.
• The real power of SQL, however, comes from working with data from multiple tables at once.
• Relational databases are designed to be joined.
• Each table in the database contains data of a specific form or function.
• Having too much overlapping data between tables is wasteful and can negatively impact system performance.
• Analyses that involve only a single table are generally not useful.
• The interesting analyses come from datasets that combine multiple tables.
• we would need data from both tables and that’s where JOINS comes in.›





CREATE TABLE [dbo].[Course](
	[CourseID] [int] NULL, 
	[RollNO] [int] NULL
) ON [PRIMARY]

GO

----------------------------------------------------------

CREATE TABLE [dbo].[Student](
	[RollNo] [int] NOT NULL,
	[StudentName] [nvarchar](50) NULL,
	[StudentCity] [nvarchar](20) NULL,
	[StudentPhoneNo] [nvarchar](50) NULL,
	[StuentAge] [int] NULL,
 CONSTRAINT [PK_Student] PRIMARY KEY CLUSTERED 
(
	[RollNo] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
--------------------------------------------------------
select * from [dbo].[Student]
-----------------------------------------------------
select * from [dbo].[Course]
 ------------------------------------------------

select * from [dbo].[Student] s
inner join [dbo].[Course] c 
on s.RollNo = c.RollNO


-------------------------------------------

select s.RollNo,s.StudentName,c.CourseID from [dbo].[Student] s
inner join [dbo].[Course] c 
on s.RollNo = c.RollNO

----------------------------------------------------

select s.RollNo,s.StudentName,c.CourseID from [dbo].[Student] s
join [dbo].[Course] c 
on s.RollNo = c.RollNO

-----------------------------------------------------------

select s.RollNo,s.StudentName,c.CourseID from [dbo].[Student] s
left join [dbo].[Course] c 
on s.RollNo = c.RollNO


-------------------------------------------------------------

select s.RollNo,s.StudentName,c.CourseID from [dbo].[Student] s
right join [dbo].[Course] c 
on s.RollNo = c.RollNO

----------------------------------------------------

select s.RollNo,s.StudentName,c.CourseID from [dbo].[Student] s
full join [dbo].[Course] c 
on s.RollNo = c.RollNO
 */


 /**INSERT statement
• The INSERT statement lets you add one or more rows to a table or view in a SQL Server database.
• The statement is one of the primary data modification language (DML) statements available in Transact-SQL, along
with UPDATE, MERGE, and DELETE.
• INSERT statement to add data that you specifically define.
• Can add data that you retrieve from other tables or views.
• OUTPUT clause in your INSERT statement to capture the statement’s results for auditing or verification purposes.
Basic Insert Statement
• In a basic INSERT statement you must specify the name of the target table and the data values you want to insert into that table.
• INSERT INTO tableName (column1,column2,columns3....column) VALUES (value1,value2,value3...valueN)
• INSERT INTO StaffSales (staffId,fName,lname) VALUES (100, Kohn', King')
• INSERT SalesStaff1 VALUES (200, 'Michael', 'Blythe'),
(300, 'Linda', 'Mitchell'), (400, 'Jillian', 'Carson'), (500, 'Garrett', 'Vargas');

*/


"INSERT INTO tableName (column1,column2,columns3....column) VALUES (value1,value2,value3...valueN)";
"INSERT INTO StaffSales (staffId,fName,lname) VALUES (100, Kohn', King')";
"INSERT SalesStaff1 VALUES (200, 'Michael', 'Blythe')(300, 'Linda', 'Mitchell'), (400, 'Jillian', 'Carson'), (500, 'Garrett', 'Vargas')";

/**Inserting Specific Column Values
• In many cases, you’ll want to insert values into specific columns, but not all columns.
• If you have an IDENTITY column, you might not want to insert a value into that, but instead allow the database
engine to generate the next value automatically.
• The INSERT statement supports an additional component that lets you specify which columns should receive values.
• Columns that are not specified are assumed to generate their own values, as is the case with IDENTITY columns, calculated columns, or columns for which a default value has been defined


Inserting from other tables
• In the previous examples, the VALUES clause includes a set of values that are enclosed in parentheses and separated by commas..
• But you don’t always have to explicitly specify the values. You can instead retrieve the values through a SELECT statement or through a stored procedure.
• INSERT tableName1 (value1,value2)
• Select value11,value12 from tableName2 where (condition)

SELECT INTO statement
• The SELECT INTO statement creates a new table and inserts rows from the query into it.
• SELECT select_list INTO destination FROM source [WHERE condition].
• SELECT * INTO marketing.customers FROM sales.customers;



*/
"INSERT tableName1 (value1,value2)";
"SELECT value11,value12 from tableName2 where (condition)";

"SELECT select_list INTO destination FROM source [WHERE condition]";
"SELECT * INTO marketing.customers FROM sales.customers";


/**UPDATE statement
• The SQL UPDATE statement is used to modify the existing records in a table.
• The UPDATE statement is one of the primary data modification language (DML) statements available in Transact-
SQL, along with INSERT, MERGE, and DELETE.
• An UPDATE statement must always include a SET clause, which identifies the columns to be updated.
• The UPDATE statement can include a WHERE clause, which determines what rows to modify.
• Or FROM clause, which identifies tables or views that provide values for the expressions defined in the SET clause


Basic UPDATE Statement
• UPDATE statement must include a SET clause.
• The clause identifies which columns in the target table should be modified and what the new values should be


UPDATE statement with where clause
• To limit the rows that are updated when you issue an UPDATE statement, add a WHERE clause after the SET clause.
• The WHERE clause specifies the search conditions that define which rows in the target table should be updated.



UPDATE using data from other table
• At times, you might want to retrieve values from a table other than the target table (the table you plan to update) when you modify data
• In other words, you might want to update data in one table with data from another table.
• UPDATE StaffSales SET SalesQuota = sp.SalesQuota FROM SalesStaff ss INNER JOIN Sales.vSalesPerson sp ON ss.FullName = (sp.FirstName + ' ' + sp.LastName)



 */
"UPDATE tableName SET column1= value1, column2=value2... columnsN=ValueN where condition";
"UPDATE StaffSales SET SQuota = 500000";
"UPDATE StaffSales SET SQuota = SQuota + 50000";
"UPDATE StaffSales SET SQuota = SQuota + 50000, SYTD = 0, SLastYear = SLastYear * 1.05";
"UPDATE StaffSales SET TerritoryName = 'UK' WHERE TerritoryName = 'United Kingdom'";