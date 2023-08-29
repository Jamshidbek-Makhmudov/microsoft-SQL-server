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
• 



 */
"UPDATE tableName SET column1= value1, column2=value2... columnsN=ValueN where condition";
"UPDATE StaffSales SET SQuota = 500000";
"UPDATE StaffSales SET SQuota = SQuota + 50000";
"UPDATE StaffSales SET SQuota = SQuota + 50000, SYTD = 0, SLastYear = SLastYear * 1.05";
"UPDATE StaffSales SET TerritoryName = 'UK' WHERE TerritoryName = 'United Kingdom'";
"UPDATE StaffSales SET SalesQuota = sp.SalesQuota FROM SalesStaff ss INNER JOIN Sales.vSalesPerson sp ON ss.FullName = (sp.FirstName + ' ' + sp.LastName)";

/**DELETE statement
• The SQL DELETE statement is used to delete the existing records in a table.
• The DELETE statement is one of the primary data modification language (DML) statements available in Transact-
SQL, along with INSERT, MERGE, and UPDATE.
• WHERE clause with a DELETE query to delete the selected rows, otherwise all the records would be deleted.
• Of all the DML statements, the DELETE statement is probably the easiest to use and most POWERFUL.
• DELETE statement can be used to delete one row, multiple rows or delete entire table.

Basic DELETE Statement
• DELETE statement only require delete keyword and table name.
• DELETE tablename;
• This statement will delete all the rows in this table.
• DELETE statement supports the optional FROM keyword, which is inserted between the DELETE keyword and the name of the table
• DELETE from tablename;
• Remember DELETE works on the rows not one the columns.

DELETE statement with where clause
• To limit the rows that are updated when you issue an DELETE statement, add a WHERE clause
• The WHERE clause specifies the search conditions that define which rows in the target table should be deleted.
• DELETE FROM SalesStaff WHERE CountryRegion = 'United States';
• Another way you can remove only a subset of rows from a table is to include the TOP clause.
• DELETE TOP (20) PERCENT FROM SalesStaff;

DELETE using data from other table
• There will be times when you’ll want to delete rows from a table based on data in another table.
• One approach is to is to create a subquery that retrieves data from the other table.
• DELETE SalesStaff WHERE StaffID IN (SELECT BusinessEntityID FROM Sales.vSalesPerson WHERE SalesLastYear = 0);
• Another method you can use to achieve the same results is to join between the target table and the table that contains the lookup information.
• DELETE SalesStaff FROM Sales.vSalesPerson sp INNER JOIN dbo.SalesStaff ss ON sp.BusinessEntityID = ss.StaffID WHERE sp.SalesLastYear = 0;



 
 */

 "DELETE FROM SalesStaff WHERE CountryRegion = 'United States'";
 "DELETE TOP (20) PERCENT FROM SalesStaff";
 "DELETE FROM SalesStaff WHERE StaffID IN (SELECT BusinessEntityID FROM Sales.vSalesPerson WHERE SalesLastYear = 0)";
 "DELETE FROM SalesStaff FROM Sales.vSalesPerson sp INNER JOIN dbo.SalesStaff ss ON sp.BusinessEntityID = ss.StaffID WHERE sp.SalesLastYear = 0";

 /**TRUNCATE table statement.
• The SQL TRUNCATE TABLE command is used to delete complete data from an existing table.
• It performs the same function as a DELETE statement without a WHERE clause.
• If you truncate a table, the TRUNCATE TABLE statement can not be rolled back in some databases.
• TRUNCATE TABLE table_name;
• TRUNCATE TABLE CUSTOMERS;


Difference between DELETE and TRUNCATE
DELETE
TRUNCATE
The DELETE command is used to delete specified rows(one or more).
While this command is used to delete all the rows from a table.
It is a DML(Data Manipulation Language) command.
While it is a DDL(Data Definition Language) command.
There may be WHERE clause in DELETE command in order to filter the records.
While there may not be WHERE clause in TRUNCATE command.
The DELETE statement removes rows one at a time and records an entry in the transaction log for each deleted row.
TRUNCATE TABLE removes the data by deallocating the data pages used to store the table data and records only the page deallocations in the transaction log.
DELETE command is slower than TRUNCATE command.
While TRUNCATE command is faster than DELETE command.
To use Delete you need DELETE permission on the table.
To use Truncate on a table we need at least ALTER permission on the table.
Identity of column retains the identity after using DELETE Statement on table.
Identity of the column is reset to its seed value if the table contains an identity column.

  */
	"TRUNCATE TABLE CUSTOMERS";


	/**stored procedure information
	 A stored procedure is a prepared SQL code that you can save, so the code can be reused over and over again.

So if you have an SQL query that you write over and over again, save it as a stored procedure, and then just call it to execute it.

You can also pass parameters to a stored procedure, so that the stored procedure can act based on the parameter value(s) that is passed.

 */

 "CREATE PROCEDURE [dbo].[SelectAllPersonAddress]
AS
SELECT * FROM  Person.Address
go;

GO


-----------------------

exec [dbo].[SelectAllPersonAddress]

-------------------------------------------------

drop procedure [dbo].[SelectAllPersonAddressWithParams]

----------------
CREATE PROCEDURE [dbo].[SelectAllPersonAddressWithParams] (@City NVARCHAR(30))
AS

BEGIN
SET NOCOUNT ON

SELECT * FROM  Person.Address where City = @city;

END
GO";


/**What is a Function
• A function is a set of SQL statements that perform a specific task.
• Basically, it is a set of SQL statements that accept only input parameters, perform actions and return the result.
Function can return an only single value or a table.
• We can’t use a function to Insert, Update, Delete records in the database table(s).
• If you have to repeatedly write large SQL scripts to perform the same task, you can create a function that performs that task.
• A function accepts inputs in the form of parameters and returns a value.
• Of course, you could create a stored procedure to group a set of SQL statements and execute them, however, stored procedures cannot be called within SQL statements. Functions, on the other hand, can be.

Built-In Functions
• SQL server adds some built-in functions to every database.
• Built-in functions are grouped into different types depending upon their functionality.
• Scalar Function: Scalar functions operate on a single value and return a single value
• upper('dotnet'), lower('DOTNET'), convert(int, 15.56)
• Aggregate Functions: Aggregate functions operate on a collection of values and return a single value.
• max(), min(), avg(), count()
• Date and Time Functions: Related to date and time
• GETDATE(), Datediff(), DateAdd(), Day(),Month(), Year()


User-Defined Functions
• These functions are created by the user in the system database or in a user-defined database.
• Scalar Function: The user-defined scalar function also returns a single value as a result of actions performed by
the function.
• Inline Table-Valued Function: The user-defined inline table-valued function returns a table variable as a result of actions performed by the function.
• Multi-Statement Table-Valued Function: A user-defined multi-statement table-valued function returns a table variable as a result of actions performed by the function. In this, a table variable must be explicitly declared and defined whose value can be derived from multiple SQL statements.


Difference between Functions and Stored Procedures
• The function must return a value but in Stored Procedure it is optional. Even a procedure can return zero or n
values.
• Functions can have only input parameters for it whereas Procedures can have input or output parameters.
• Functions can be called from Procedure whereas Procedures cannot be called from a Function.
• The procedure allows SELECT as well as DML(INSERT/UPDATE/DELETE) statement in it whereas Function allows only SELECT statement in it.
• Procedures cannot be utilized in a SELECT statement whereas Function can be embedded in a SELECT statement.
• Stored Procedures cannot be used in the SQL statements anywhere in the WHERE/HAVING/SELECT section whereas Function can be.
• An exception can be handled by try-catch block in a Procedure whereas try-catch block cannot be used in a Function.
• We can use Transactions in Procedure whereas we can't use Transactions in Function.
*/


"CREATE FUNCTION [database_name.]function_name (parameters) RETURNS data_type AS
BEGIN
SQL statements RETURN value END";
"SELECT min(value) FROM table_name";
"SELECT count(*) FROM table_name
PRINT upper('dotnet'), lower('DOTNET'), convert(int, 15.56)";

"CREATE TABLE myFunction (
	visit_id INT PRIMARY KEY IDENTITY (1, 1),
	first_name VARCHAR (50) NOT NULL,
	last_name VARCHAR (50) NOT NULL,
	visited_at DATETIME, phone VARCHAR(20),
	store_id INT NOT NULL,
	FOREIGN KEY (store_id) REFERENCES sales.stores (store_id) );";
"INSERT INTO myFunction (first_name, last_name, visited_at, phone) VALUES('John', 'Doe', '2018-01-01 0', '123-456-7890')";
"INSERT INTO myFunction (first_name, last_name, visited_at, phone) VALUES('Johns', 'Does', '2019-01-01 0', '113-456-7890')";
"SELECT * FROM myFunction";

"CREATE FUNCTION getFullName
(@firstName VARCHAR(50), @lastName VARCHAR(50))
RETURNS VARCHAR(101)
AS BEGIN 
RETURN (SELECT @first_name + '' @last_name)
END
";
"SELECT getFullName('first_name', 'last_name') as FullName Salary FROM table_name";

/**What is a Trigger
• SQL Server triggers are special stored procedures that are executed automatically in response to the database object, database, and server events.
• Data manipulation language (DML) triggers which are invoked automatically in response to INSERT, UPDATE, and DELETE events against tables.
• Data definition language (DDL) triggers which fire in response to CREATE, ALTER, and DROP statements. DDL triggers also fire in response to some system stored procedures that perform DDL-like operations.
• Logon triggers which fire in response to LOGON events

• The CREATE TRIGGER statement allows you to create a new trigger that is fired automatically whenever an event such as INSERT, DELETE, or UPDATE occurs against a table.




*/
" CREATE TRIGGER [schema_name.]trigger_name ON table_name
AFTER {[INSERT],[UPDATE],[DELETE]} [NOT FOR REPLICATION]
AS
{sql_statements}";


//Examples of Trigger
"CREATE TRIGGER AfterInsertTrigger ON TriggerDemo_Parent AFTER INSERT
AS INSERT INTO TriggerDemo_History VALUES ((SELECT TOP 1 ID FROM TriggerDemo_Parent), 'Insert')
GO";

"CREATE TRIGGER AfterDeleteTrigger ON TriggerDemo_Parent
AFTER DELETE
AS INSERT INTO TriggerDemo_History VALUES ((SELECT TOP 1 ID FROM TriggerDemo_Parent), 'Delete') GO";

 "CREATE TRIGGER AfterUPDATETrigger ON TriggerDemo_Parent AFTER UPDATE
AS INSERT INTO TriggerDemo_History VALUES ((SELECT TOP 1 ID FROM TriggerDemo_Parent), 'UPDATE') GO";


/**Why We need INDEX and what is Table Scan
• Consider the example of a book
• Imagine it has 10 chapters about human anatomy , but with NO INDEX at the end
• To find about HEART and its functions you have to read the whole book to find which chapter have information.
• Similarly if we have a table with no INDEX, Its Called a HEAP.
• A heap is a table that is stored without any underlying order.
• When rows are inserted into a heap, there is no way to ensure where the pages will be written nor are those pages guaranteed to remain in the same order as the table is written to or when maintenance is performed against it.
• To find a row the SQL Server engine has to do TABLE SCAN
• A TABLE SCAN is a pretty straightforward process. When your query engine performs a table scan it starts from the physical beginning of the table and goes through every row in the table. If a row matches the criterion then it includes that into the result set.




*/

/**Clustered Index
• A clustered index stores the actual data rows at the leaf level of the index.
• that would mean that the entire row of data associated with the primary key value of 123 would be stored in that leaf
node.
• An important characteristic of the clustered index is that the indexed values are sorted in either ascending or descending order.
• As a result, there can be only one clustered index on a table or view.
• In addition, data in a table is sorted only if a clustered index has been defined on a table.

NonClustered Index
• Unlike a clustered indexed, the leaf nodes of a nonclustered index contain only the values from the indexed columns and row locators that point to the actual data rows, rather than contain the data rows themselves.
• This means that the query engine must take an additional step in order to locate the actual data.
• A row locator’s structure depends on whether it points to a clustered table or to a heap. If referencing a clustered table, the row locator points to the clustered index, using the value from the clustered index to navigate to the correct data row.
• If referencing a heap, the row locator points to the actual data row.
• Nonclustered indexes cannot be sorted like clustered indexes.
• SQL Server support up to 999 nonclustered indexes.
• This certainly doesn’t mean you should create that many indexes. Indexes can both help and hinder performance.
• In addition to being able to create multiple nonclustered indexes on a table or view, you can also add included columns to your index


Index types based on configuration
• Composite index: An index that contains more than one column. In both SQL Server you can include up to 16 columns in an index, as long as the index doesn’t exceed the 900-byte limit. Both clustered and nonclustered indexes can be composite indexes.
• Unique Index: An index that ensures the uniqueness of each value in the indexed column. If the index is a composite, the uniqueness is enforced across the columns as a whole, not on the individual columns. For example, if you were to create an index on the FirstName and LastName columns in a table, the names together must be unique, but the individual names can be duplicated.
• A unique index is automatically created when you define a primary key or unique constraint
• Primary key: When you define a primary key constraint on one or more columns, SQL Server automatically creates
a unique, clustered index if a clustered index does not already exist on the table or view.
• Unique: When you define a unique constraint, SQL Server automatically creates a unique, nonclustered index.
• Covering index: A type of index that includes all the columns that are needed to process a particular query. For example, your query might retrieve the FirstName and LastName columns from a table, based on a value in the ContactID column. You can create a covering index that includes all three columns.

Index design consideration
• As beneficial as indexes can be, they must be designed carefully.
• They can take up significant disk space, you don’t want to implement more indexes than necessary.
• Indexes are automatically updated when the data rows themselves are updated, which can lead to additional overhead and can affect performance.
• For tables that are heavily updated, use as few columns as possible in the index, and don’t over-index the tables.
• on small tables because the query engine might take longer to navigate the index than to perform a table scan.
• For clustered indexes, try to keep the length of the indexed columns as short as possible.
• Try to implement your clustered indexes on unique columns that do not permit null values.
• When possible, implement unique indexes.
• For composite indexes, take into consideration the order of the columns in the index definition.
• Try to insert or modify as many rows as possible in a single statement, rather than using multiple queries.
• Create nonclustered indexes on columns used frequently in your statement’s predicates and join conditions.


Create Index Syntax
• -- Create a nonclustered index on a table or view
• CREATE INDEX index1 ON schema1.table1 (column1);
• -- Create a clustered index on a table and use a 3-part name for the table
• CREATE CLUSTERED INDEX index1 ON database1.schema1.table1 (column1);
• -- Create a nonclustered index with a unique constraint
• -- on 3 columns and specify the sort order for each column
• CREATE UNIQUE INDEX index1 ON schema1.table1 (column1 DESC, column2 ASC, column3 DESC);
*/

"CREATE INDEX index1 ON schema1.table1 (column1)";
"CREATE CLUSTERED INDEX index1 ON database1.schema1.table1 (column1)";
"CREATE UNIQUE INDEX index1 ON schema1.table1 (column1 DESC, column2 ASC, column3 DESC)";

/**Index Fragmentation
• SQL Server index fragmentation is a common source of database performance degradation.
• Fragmentation occurs when there is a lot of empty space on a data page (internal fragmentation)
• When the logical order of pages in the index doesn’t match the physical order of pages in the data file (external fragmentation).
• Fragmentation-related performance issues are most often observed when executing queries that perform index scans.
• Queries that perform index seeks may not be affected by high index fragmentation.
• The index fragmentation is the index performance value in percentage, which can be fetched by SQL Server DMV


Internal index fragmentation
• Internal fragmentation occurs when data pages have too much free space.
• This extra space is introduced through a few different avenues:
• SQL Server stores data on 8KB pages. So when you insert less than 8KB of data into a table, you’re left with blank space on the page.
• if you insert more data than the page has space for, the excess is sent to another page. It’s unlikely that the additional data will perfectly fill the subsequent pages, so you are, again, left with blank space on a page.
• Blank space on a data page also occurs when data is deleted from a table.
• Internal fragmentation primarily causes performance issues when SQL Server does an index scan.
• Performance slows when SQL Server has to scan many partially filled pages to find the data it’s looking for.


External index fragmentation
• External fragmentation is a result of data pages being out of order.
• This is caused by inserting or updating data to full leaf pages. When data is added to a full page, SQL Server
creates a page split to accommodate the extra data, and the new page is separated from the original page.
• External fragmentation causes performance issues by increasing random I/O.
• When pages are not sequential, SQL Server has to read data from multiple locations, which is more time- consuming than reading in order.



Fix SQL Server Index fragmentation
• Preventing fragmentation 100 percent of the time is impossible, it’s important to know how to fix SQL Server index fragmentation if performance is suffering.
• Before you can decide how to approach your SQL Server index fragmentation problem, you first have to determine how extensive a problem you are dealing with.
• The best place to start is using the sys.dm_db_index_physical_stats DMF to analyze the fragmentation level of your indexes.
• Once you know how extensive the index fragmentation is, you can plot your plan of attack with one of three solutions: rebuild the index, reorganize the index, or do nothing.
• Rebuild: Rebuild indexes when fragmentation reaches greater than 30 percent.
• Reorganize: Reorganize indexes with between 11-30 percent fragmentation.
• Ignore: Fragmentation levels of 10 percent or less should not pose a performance problem, so you don’t need to do anything.
*/