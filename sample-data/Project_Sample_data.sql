Insert into Customer(Customer_ID,PhoneNo)
Values(1,'604-111-1111'),
(2,'604-222-2222'),
(3,'604-333-3333'),
(4,'604-444-4444'),
(5,'604-555-5555'),
(6,'604-666-6666'),
(7,'604-777-7777'),
(8,'604-888-8888');

Insert into CustomerInfo(PhoneNo, Email, Name)
Values ('604-111-1111', 'test1@gmail.com','Test Customer1'),
('604-222-2222', 'test2@gmail.com','Test Customer2'),
('604-333-3333', 'test3@gmail.com','Test Customer3'),
('604-444-4444', 'test4@gmail.com','Test Customer4'),
('604-555-5555', 'test5@gmail.com','Test Customer5'),
('604-666-6666', 'test6@gmail.com','Test All Artist1'),
('604-777-7777', 'test7@gmail.com','Test All Genre Rock'),
('604-888-8888', 'test8@gmail.com','Test All Format CD');

Insert into Employees(Employee_ID, SIN, isManager, HourlyWage, isActive)
Values (1, 111111111, 0, 15.00, 1 ),
(2, 111111112, 0, 18.00, 1 ),
(3, 111111113, 0, 12.75, 0 ),
(4, 111111114, 0, 15.00, 1 ),
(5, 111111115, 1, 25.00, 1 ),
(6, 111111116, 0, 12.00, 1 ),
(7, 111111117, 1, 35.00, 1 );


Insert into EmployeeInfo(SIN, Name, PhoneNumber,Address)
Values(111111111, 'Test Employee1', '778-111-1111', '1111 Test1 Avenue, Test Province'),
(111111112, 'Test Employee2', '778-222-2222', '2222 Test2 Avenue, Test Province'),
(111111113, 'Test Employee3', '778-111-3333', '3333 Test3 Avenue, Test Province'),
(111111114, 'Test Employee4', '778-111-4444', '4444 Test4 Avenue, Test Province'),
(111111115, 'Test Employee5', '778-111-5555', '5555 Test5 Avenue, Test Province'),
(111111116, 'Test Employee6', '778-111-6666', '6666 Test6 Avenue, Test Province'),
(111111117, 'Test Employee7', '778-111-7777', '7777 Test7 Avenue, Test Province');

Insert into HoursWorked(Employee_ID, Date, NumHours)
Values(1, '2018-06-18', 6),
(1, '2018-06-19', 7),
(1, '2018-06-20', 8),
(2, '2018-06-16', 4),
(2, '2018-06-18', 5),
(3, '2018-06-10', 8),
(4, '2018-06-15', 6),
(5, '2018-06-16', 8),
(6, '2018-06-17', 6),
(7, '2018-06-18', 7),
(7, '2018-06-19', 8);

Insert into Merchandise(Merchandise_ID, UPC)
Values(1, '11111-11111'),
(2, '11111-22222'),
(3, '11111-33333'),
(4, '11111-44444'),
(5, '11111-55555'),
(6, '11111-66666'),
(7, '11111-77777'),
(8, '11111-88888'),
(9, '11111-99999'),
(10, '11111-00000'),
(11, '11111-01111'),
(12, '11111-02222'),
(13, '11111-03333'),
(14, '11111-04444'),
(15, '11111-05555'),
(16, '22222-11111'),
(17, '22222-22222'),
(18, '22222-33333'),
(19, '22222-44444'),
(20, '22222-55555');

Insert into MerchandiseInfo(UPC, StockQuantity, RetailPrice)
Values('11111-11111', 5, 15.99),
('11111-22222', 18, 7.99),
('11111-33333', 1, 25.99),
('11111-44444', 2, 5.99),
('11111-55555', 0, 7.99),
('11111-66666', 13, 13.99),
('11111-77777', 4, 6.99),
('11111-88888', 8, 17.99),
('11111-99999', 25, 12.99),
('11111-00000', 14, 13.99),
('11111-01111', 15, 13.99),
('11111-02222', 15, 13.99),
('11111-03333', 15, 15.99),
('11111-04444', 15, 14.99),
('11111-05555', 15, 12.99),
('22222-11111', 12, 18.99),
('22222-22222', 15, 29.99),
('22222-33333', 3, 6.99),
('22222-44444', 6, 8.99),
('22222-55555', 21, 9.99);

Insert into Music(Merchandise_ID, AlbumName, Artist, MediaFormat)
Values (1, 'Test Album1', 'Test Artist1', 'LP'),
(2, 'Test Album2', 'Test Artist2', 'CD'),
(3, 'Test Album3', 'Test Artist3', 'LP'),
(4, 'Test Album4', 'Test Artist4', 'CD'),
(5, 'Test Album5', 'Test Artist5', 'LP'),
(6, 'Test Album6', 'Test Artist1', 'LP'),
(7, 'Test Album7', 'Test Artist1', 'LP'),
(8, 'Test Album8', 'Test Artist1', 'LP'),
(9, 'Test Album9', 'Test Artist2', 'LP'),
(10, 'Test Album10', 'Test Artist2', 'LP'),
(11, 'Test Album11', 'Test Artist2', 'LP'),
(12, 'Test Album12', 'Test Artist4', 'LP'),
(13, 'Test Album13', 'Test Artist4', 'CD'),
(14, 'Test Album14', 'Test Artist5', 'LP'),
(15, 'Test Album15', 'Test Artist5', 'CD');


Insert into MusicInfo(AlbumName, Artist, Genre, ReleaseYear)
Values ('Test Album1', 'Test Artist1', 'Rock', 1980),
('Test Album2', 'Test Artist2', 'Soul', 2005),
('Test Album3', 'Test Artist3', 'Metal', 1999),
('Test Album4', 'Test Artist4', 'Electric', 2017),
('Test Album5', 'Test Artist5', 'Classic', 1975),
('Test Album6', 'Test Artist1', 'Soul', 1977),
('Test Album7', 'Test Artist1', 'Soul', 1965),
('Test Album8', 'Test Artist1', 'Rock', 1965),
('Test Album9', 'Test Artist2', 'Rock', 2003),
('Test Album10', 'Test Artist2', 'Metal', 1999),
('Test Album11', 'Test Artist2', 'Country', 1999),
('Test Album12', 'Test Artist4', 'Rock', 2015),
('Test Album13', 'Test Artist4', 'Metal', 2014),
('Test Album14', 'Test Artist5', 'Country', 1981),
('Test Album15', 'Test Artist5', 'Metal', 1977);

Insert into OtherProducts(Merchandise_ID, ProductName)
Values(16,'Test Product1'),
(17,'Test Product2'),
(18,'Test Product3'),
(19,'Test Product4'),
(20,'Test Product5');

Insert into Supervises(Supervising_Employee_ID, Supervised_Employee_ID)
Values(5,1),
(5,2),
(5,4),
(7,6),
(7,5);

Insert into PurchaseHistoryLog(Customer_ID,Employee_ID,Merchandise_ID,Quantity,TransactionDate)
Values (2, 2, 1, 2,'2018-06-18'),
(2, 1, 2, 1,'2018-06-18'),
(2, 5, 3, 3,'2018-06-16'),
(2, 7, 4, 2,'2018-06-19'),
(2, 2, 5, 4,'2018-06-18'),
(3, 5, 2, 2,'2018-06-16'),
(5, 2, 4, 3,'2018-06-18'),
(4, 7, 7, 5,'2018-06-19'),
(3, 2, 9, 2,'2018-06-18'),
(3, 2, 10, 4,'2018-06-18'),
(6, 2, 1, 1,'2018-06-15'),
(6, 2, 6, 1,'2018-06-16'),
(6, 2, 7, 1,'2018-06-17'),
(6, 2, 8, 1,'2018-06-18'),
(7, 2, 1, 1,'2018-06-15'),
(7, 2, 8, 1,'2018-06-16'),
(7, 2, 9, 1,'2018-06-17'),
(7, 2, 12, 1,'2018-06-18'),
(8, 2, 2, 1,'2018-06-15'),
(8, 2, 4, 1,'2018-06-16'),
(8, 2, 13, 1,'2018-06-17'),
(8, 2, 15, 1,'2018-06-18');

Insert into Suppliers(Supplier_ID, PhoneNo, IsActive)
Values(1, '236-111-1111', 1),
(2, '236-222-2222', 1),
(3, '236-333-3333', 1),
(4, '236-444-4444', 1),
(5, '236-555-5555', 0);

Insert into SuppliersInfo(PhoneNo, Name, Address)
Values('236-111-1111', 'Test Supplier1', '111 Test Street, Test Province'),
('236-222-2222', 'Test Supplier2', '222 Test Street, Test Province'),
('236-333-3333', 'Test Supplier3', '333 Test Street, Test Province'),
('236-444-4444', 'Test Supplier4', '444 Test Street, Test Province'),
('236-555-5555', 'Test Supplier5', '555 Test Street, Test Province');

Insert into SuppliesOrderedLog(Supplier_ID, Manager_ID, Merchandise_ID, Quantity, RetailPrice, TransactionDate)
Values(1, 5, 1, 3, 15.99, '2018-06-05'),
(1, 5, 3, 2, 25.99, '2018-06-08'),
(1, 5, 5, 3, 7.99, '2018-06-04'),
(1, 5, 7, 5, 6.99, '2018-06-09'),
(1, 5, 9, 4, 12.99, '2017-08-05');
