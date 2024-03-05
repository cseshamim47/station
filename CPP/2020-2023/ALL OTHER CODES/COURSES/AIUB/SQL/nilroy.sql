CREATE TABLE Order_from_C ( 
orderID NUMBER(20) CONSTRAINT PK_ORDER PRIMARY KEY,
Payment_Gateway1 VARCHAR(20), 
Payment_Gateway2 Varchar(20), 
Payment_Gateway3 VARCHAR(20), 
Tracking VARCHAR(20),
Fr_Time VARCHAR(20),
cus_phone_number NUMBER(20)
); 
describe Order_from_C;

Create table resOrder(orderID Number(20),
restaurant_ID Number(20) ); 
describe resOrder;


Create table order_to_d( 
orderID Number(20) CONSTRAINT PK_ORDER PRIMARY KEY,
Payment_Gateway1 Varchar(20), 
Payment_Gateway2 Varchar(20), 
Payment_Gateway3 Varchar(20), 
Tracking varchar(20), 
Fr_Time varchar(20), 
Del_phone_number Number(20) 
); 
describe order_to_d;



Create table del_Time ( 
Fr_Time varchar(20) primary key, 
Order_time varchar(20), 
Order_date varchar(20) 
); 
describe del_Time;

drop table del_Time;
drop table order_to_d;
drop table resOrder;
drop table Order_from_C;