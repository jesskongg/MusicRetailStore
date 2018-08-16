CREATE TABLE Employees
(Employee_ID INT,
SIN INT UNIQUE,
isManager BIT(1) DEFAULT 0, HourlyWage FLOAT,
isActive BIT(1) DEFAULT 1, PRIMARY KEY(Employee_ID) );

CREATE TABLE EmployeeInfo
(SIN INT,
Name VARCHAR(225) NOT NULL, PhoneNumber CHAR(15),
Address VARCHAR(255), PRIMARY KEY(SIN),
FOREIGN KEY (SIN) REFERENCES Employees(SIN) ON DELETE CASCADE
);

CREATE TABLE Customer
(Customer_ID INT,
PhoneNo CHAR(15) NOT NULL UNIQUE, PRIMARY KEY(Customer_ID)
);

CREATE TABLE CustomerInfo
(PhoneNo CHAR(15),
Email CHAR(30),
Name VARCHAR(225),
PRIMARY KEY (PhoneNo),
FOREIGN KEY(PhoneNo) REFERENCES Customer(PhoneNo) ON DELETE CASCADE
);

CREATE TABLE Suppliers
(Supplier_ID INT,
PhoneNo CHAR(15) NOT NULL UNIQUE, IsActive BIT(1) DEFAULT 1, PRIMARY KEY(Supplier_ID)
);

CREATE TABLE SuppliersInfo
(PhoneNo CHAR(15),
Name VARCHAR(255) NOT NULL,
Address VARCHAR(255),
PRIMARY KEY(PhoneNo),
FOREIGN KEY(PhoneNo) REFERENCES Suppliers(PhoneNo) ON DELETE CASCADE
);

CREATE TABLE Merchandise
(Merchandise_ID INT,
UPC CHAR(30) NOT NULL UNIQUE, PRIMARY KEY(Merchandise_ID)
);

CREATE TABLE MerchandiseInfo
(UPC CHAR(30),
StockQuantity INT,
RetailPrice FLOAT,
PRIMARY KEY(UPC),
FOREIGN KEY(UPC) REFERENCES Merchandise(UPC) );

CREATE TABLE Music
(Merchandise_ID INT,
AlbumName VARCHAR(255) UNIQUE,
Artist VARCHAR(255),
MediaFormat CHAR(10),
CONSTRAINT AlbumNameArtist UNIQUE(AlbumName, Artist), PRIMARY KEY(Merchandise_ID),
FOREIGN KEY(Merchandise_ID) REFERENCES Merchandise(Merchandise_ID) ON DELETE CASCADE );


CREATE TABLE MusicInfo
(AlbumName VARCHAR(255),
Artist VARCHAR(255),
Genre CHAR(30),
ReleaseYear INT,
PRIMARY KEY(AlbumName, Artist),
FOREIGN KEY (AlbumName, Artist) REFERENCES Music(AlbumName, Artist) ON DELETE CASCADE
);


CREATE TABLE OtherProducts
(Merchandise_ID INT,
ProductName VARCHAR(255) NOT NULL, PRIMARY KEY(Merchandise_ID)
);

CREATE TABLE Supervises
(Supervising_Employee_ID INT,
Supervised_Employee_ID INT,
PRIMARY KEY(Supervising_Employee_ID, Supervised_Employee_ID), FOREIGN KEY(Supervising_Employee_ID) REFERENCES Employees(Employee_ID),
FOREIGN KEY(Supervised_Employee_ID) REFERENCES Employees(Employee_ID)
);

CREATE TABLE HoursWorked
(Employee_ID INT,
Date DATE NOT NULL,
NumHours INT NOT NULL, PRIMARY KEY(Employee_ID, Date),
FOREIGN KEY(Employee_ID) REFERENCES Employees(Employee_ID) );

CREATE TABLE PurchaseHistoryLog
(Customer_ID INT,
Employee_ID INT,
Merchandise_ID INT,
Quantity INT NOT NULL,
TransactionDate DATE NOT NULL,
PRIMARY KEY(Customer_ID, Employee_ID, Merchandise_ID),
FOREIGN KEY(Customer_ID) REFERENCES Customer(Customer_ID),
FOREIGN KEY(Employee_ID) REFERENCES Employees(Employee_ID),
FOREIGN KEY(Merchandise_ID) REFERENCES Merchandise(Merchandise_ID) );

CREATE TABLE SuppliesOrderedLog
(Supplier_ID INT,
Manager_ID INT,
Merchandise_ID INT,
Quantity INT NOT NULL,
RetailPrice FLOAT NOT NULL,
TransactionDate DATE NOT NULL,
PRIMARY KEY(Supplier_ID, Manager_ID, Merchandise_ID),
FOREIGN KEY(Supplier_ID) REFERENCES Suppliers(Supplier_ID),
FOREIGN KEY(Manager_ID) REFERENCES Employees(Employee_ID),
FOREIGN KEY(Merchandise_ID) REFERENCES Merchandise(Merchandise_ID));
