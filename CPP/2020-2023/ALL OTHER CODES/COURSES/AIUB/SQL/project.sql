CREATE TABLE DEPART
(
    DEPTID NUMBER(15) CONSTRAINT PK_DEPTID PRIMARY KEY,
    DNAME VARCHAR2(25)
);
DESC DEPART;

CREATE TABLE EMPLY
( 
    EMPID NUMBER(30) CONSTRAINT PK_EMPID PRIMARY KEY,
    NID NUMBER(30) NOT NULL,  
    HIREDATE DATE,
    SALARY NUMBER(30),   
    DEPTID NUMBER(20) CONSTRAINT FK_DEPTID REFERENCES DEPART
);
DESC EMPLY;


CREATE TABLE CUSTMR
(
    CUSTID NUMBER(30) CONSTRAINT PK_CUSTID PRIMARY KEY,
    GENDER VARCHAR2(15),
    TOTALBUY NUMBER(30),
    POINTS NUMBER(30),
    JOINED DATE,
    EMPID NUMBER(30) CONSTRAINT FK_EMPID REFERENCES EMPLY 
);
DESC CUSTMR;


CREATE TABLE  PERSON( 
     CUSTID NUMBER(30) CONSTRAINT FK_PCUSTID REFERENCES CUSTMR,
     EMPID NUMBER(30) CONSTRAINT FK_PEMPID REFERENCES EMPLY,
     FNAME VARCHAR2(30),
     LNAME VARCHAR2(30),
     BDATE DATE,
     AGE NUMBER(3),
     PHONE NUMBER(15),
     EMAIL VARCHAR2(30),
     ADDRESS VARCHAR2(100)
);
DESC PERSON;


CREATE TABLE PRODUCT
(
     PID NUMBER(30) CONSTRAINT PK_PID PRIMARY KEY,
     PNAME VARCHAR2(30),
     PRICE NUMBER(35)
);
DESC PRODUCT;

CREATE TABLE ODR
(
     OID NUMBER(30) CONSTRAINT PK_OID PRIMARY KEY,
     CUSTID NUMBER(30) CONSTRAINT FK_OCUSTID REFERENCES CUSTMR NOT NULL,
     PID NUMBER(30) CONSTRAINT FK_PID REFERENCES PRODUCT NOT NULL,
     ODRDATE DATE
); 
DESC ODR;

CREATE TABLE PAYMENT
( 
     PAYID NUMBER(30) CONSTRAINT PK_PAYID PRIMARY KEY,
     OID NUMBER(30) CONSTRAINT FK_POID REFERENCES ODR
); 
DESC PAYMENT;

CREATE TABLE MPAY 
( 
     MTRXID VARCHAR(30) CONSTRAINT PK_MTRXID PRIMARY KEY,
     OID NUMBER(30) CONSTRAINT FK_MOID REFERENCES ODR,
     BKASH VARCHAR2(30),
     NAGAD VARCHAR2(30)
);
DESC MPAY;

CREATE TABLE CPAY
(
     CTRXID VARCHAR2(30) CONSTRAINT PK_CTRXID PRIMARY KEY,
     OID NUMBER(30) CONSTRAINT FK_COID REFERENCES ODR,
     CDNO NUMBER(30),
     CDTYPE VARCHAR2(30),
     CVV VARCHAR2(30),
     EXPDATE  DATE
);
DESC CPAY;


CREATE TABLE CHECKOUT
( 
      OID NUMBER(30) CONSTRAINT FK_CTOID REFERENCES ODR,
      PAYID NUMBER(30) CONSTRAINT PK_CTPAYID PRIMARY KEY,
      QUANTITY NUMBER(30),
      PRICE NUMBER(30),
      VAT  NUMBER(30),
      PAID NUMBER(30),     
      DUE  NUMBER(30)
);
DESC CHECKOUT;

CREATE TABLE MEMBERSHIP
(
     PLAN VARCHAR2(50) CONSTRAINT UNQ_MEMBERSHIP UNIQUE,
     LOBUY NUMBER(20) NOT NULL,
     HIBUY NUMBER(20) NOT NULL
);
DESC MEMBERSHIP;


DESCRIBE DEPART;
DESCRIBE EMPLY;
DESCRIBE CUSTMR;
DESCRIBE PERSON;
DESCRIBE PRODUCT;
DESCRIBE ODR;
DESCRIBE PAYMENT;
DESCRIBE MPAY;
DESCRIBE CPAY;
DESCRIBE CHECKOUT;
DESC MEMBERSHIP;



--------- Insertion ----------
-- DROP SEQUENCE DEPARTSEQ;

CREATE SEQUENCE DEPARTSEQ
MINVALUE 10
MAXVALUE 9999
START WITH 10
NOCACHE
NOCYCLE
INCREMENT BY 10;

INSERT INTO DEPART VALUES(DEPARTSEQ.NEXTVAL,'MARKETING');
INSERT INTO DEPART VALUES(DEPARTSEQ.NEXTVAL,'ADMIN');
INSERT INTO DEPART VALUES(DEPARTSEQ.NEXTVAL,'SALES');
INSERT INTO DEPART VALUES(DEPARTSEQ.NEXTVAL,'ACCOUNTS');
INSERT INTO DEPART VALUES(DEPARTSEQ.NEXTVAL,'PRODUCTION');
INSERT INTO DEPART VALUES(DEPARTSEQ.NEXTVAL,'ENGINEERING');
SELECT * FROM DEPART;

-- UPDATE DEPART SET DNAME = 'ACCOUNTS' WHERE DEPTID = 40; 
-- UPDATE DEPART SET DNAME = 'PRODUCTION' WHERE DEPTID = 50; 
-- INSERT INTO DEPART VALUES(DEPARTSEQ.NEXTVAL,'MANAGER');

-----------------------------
-- DROP SEQUENCE EMPLYSEQ;
-- DROP SEQUENCE NIDSEQ;

CREATE SEQUENCE EMPLYSEQ
MINVALUE 10
MAXVALUE 9999
START WITH 10
NOCACHE
NOCYCLE
INCREMENT BY 10;

CREATE SEQUENCE NIDSEQ
MINVALUE 123456789
MAXVALUE 1234567890
START WITH 123456789
NOCACHE
NOCYCLE
INCREMENT BY 1;

-----
-- ALTER TABLE EMPLY DROP COLUMN JOB; 
-----

INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '01 Jan 2017', 'DD MON YYYY'),2050,10);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '09 MAR 2016', 'DD-MM-YYYY'),8000,20);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '31 DEC 2020', 'DD-MM-YYYY'),2500,30);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '01 DEC 2020', 'DD-MM-YYYY'),5000,40);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '01 DEC 2020', 'DD-MM-YYYY'),2750,60);

INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '02 MAR 2017', 'DD-MM-YYYY'),2380,60);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '10 JUNE 2018', 'DD-MM-YYYY'),6000,20);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '13 JULY 2017', 'DD-MM-YYYY'),2200,10);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '17 DEC 2019', 'DD-MM-YYYY'),2400,10);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '09 APRIL 2020', 'DD-MM-YYYY'),2700,30);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '26 FEB 2020', 'DD-MM-YYYY'),2500,30);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '17 OCT 2019', 'DD-MM-YYYY'),3000,40);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '20 AUG 2020', 'DD-MM-YYYY'),2400,30);
INSERT INTO EMPLY VALUES(EMPLYSEQ.NEXTVAL,NIDSEQ.NEXTVAL,TO_DATE( '25 SEP 2018', 'DD-MM-YYYY'),2000,30);

SELECT * FROM EMPLY;

-- UPDATE  EMPLY SET DEPTID = 60 WHERE DEPTID = 50;
-- SELECT * FROM EMPLY,PERSON WHERE EMPLY.EMPID = PERSON.EMPID AND DEPTID = 60;
-- DESC EMPLY;

--------------
-- DROP SEQUENCE COMMONSEQ;

CREATE SEQUENCE COMMONSEQ
MINVALUE 100
MAXVALUE 9999
START WITH 100
NOCACHE
NOCYCLE
INCREMENT BY 10;

INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',1500,200,TO_DATE('01-01-2019','DD-MM-YY'),NULL);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'FEMALE',2500,250,TO_DATE('12-03-2019','DD-MM-YY'),NULL);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',10380,230,TO_DATE('13-03-2019','DD-MM-YY'),NULL);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',280,50,TO_DATE('20-01-2019','DD-MM-YY'),NULL);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',120,20,TO_DATE('26-10-2019','DD-MM-YY'),NULL);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',1870,230,TO_DATE('13-09-2019','DD-MM-YY'),NULL);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'FEMALE',1910,260,TO_DATE('21-10-2019','DD-MM-YY'),NULL);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',5000,180,TO_DATE('15-12-2019','DD-MM-YY'),10);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'FMALE',1500,290,TO_DATE('17-09-2019','DD-MM-YY'),50);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',2800,330,TO_DATE('15-12-2019','DD-MM-YY'),30);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',1200,210,TO_DATE('05-10-2019','DD-MM-YY'),40);
INSERT INTO CUSTMR VALUES(COMMONSEQ.NEXTVAL,'MALE',23000,850,TO_DATE('15-11-2019','DD-MM-YY'),20);
SELECT * FROM CUSTMR;

-- DESC CUSTMR;
-- SELECT * FROM CUSTMR WHERE CUSTID IS NOT NULL AND EMPID IS NOT NULL;


-------

-- ALTER TABLE PERSON MODIFY (PHONE VARCHAR2(20));

INSERT INTO PERSON VALUES(100,NULL,'MD SHAMIM','AHMED',TO_DATE('01-01-1999','DD-MM-YY'),ROUND((SYSDATE - TO_DATE('01-01-1999','DD-MM-YY'))/365),'01903482811','SHAMIM@GMAIL.COM','37 NO HOUSE, 13D, BANANI');
INSERT INTO PERSON VALUES(110,NULL,'SADIA','KHAN',TO_DATE('01-05-1999','DD-MM-YY'),ROUND((SYSDATE - TO_DATE('01-05-1999','DD-MM-YY'))/365),'01903482811','SADIA@GMAIL.COM','TOWNHALL MATH,DHAKA');
INSERT INTO PERSON VALUES(120,NULL,'RABBI','HOSSEN',TO_DATE('08-05-2000','DD-MM-YY'),22 ,'01721068190','AMARMAIL.RH@GMAIL.COM','PUKUR PAR, KHULNA');
INSERT INTO PERSON VALUES(130,NULL,'SAJID','ALAM',TO_DATE('12-03-2001','DD-MM-YY'),21 ,'01829123581','ALAM34@GMAIL.COM','MOJOMPUR, KUSHITA');
INSERT INTO PERSON VALUES(140,NULL,'SOUROV','JOY',TO_DATE('10-09-1988','DD-MM-YY'),33 ,'01629123582','JOYFB12@GMAIL.COM','MONTU CHOTTOR, BARISAL');
INSERT INTO PERSON VALUES(150,NULL,'TANVIR','HASAN',TO_DATE('10-09-1995','DD-MM-YY'),26 ,'01329123585','60TANVIR@GMAIL.COM','KHALIR MOR, NOAKHALI');
INSERT INTO PERSON VALUES(160,NULL,'ARINA','HOSSEN',TO_DATE('28-08-1991','DD-MM-YY'),30 ,'01429123579','ARHOSSEN@GMAIL.COM','SEC#1 UTTORA, DHAKA');
INSERT INTO PERSON VALUES(170,10,'ROHIM','CHOWDHURY ',TO_DATE('21-06-1995','DD-MM-YY'),26 ,'01529123573','ROHIM78@GMAIL.COM','C/3 SHUKRABAD, DHAKA');
INSERT INTO PERSON VALUES(180,20,'MUNNI','ISLAM',TO_DATE('13-09-1997','DD-MM-YY'),24 ,'01729123572','MI44@GMAIL.COM','ANATOLI TONGGI, DHAKA');
INSERT INTO PERSON VALUES(190,30,'NUZRUL','MOLLA',TO_DATE('26-07-2000','DD-MM-YY'),21 ,'01429123571','MOLLA78@GMAIL.COM','rd#8 MIRPUR-12, DHAKA');
INSERT INTO PERSON VALUES(200,40,'FOYSAL','KAZI',TO_DATE('14-02-2000','DD-MM-YY'),21 ,'01629123580','KZ.FOYSAL@GMAIL.COM','F/3  GULSHAN, DHAKA');
INSERT INTO PERSON VALUES(210,50,'FAYYAT','AKON',TO_DATE('14-02-1985','DD-MM-YY'),36,'01729123580','FYT@GMAIL.COM','G/9 GULSHAN, DHAKA');
INSERT INTO PERSON VALUES(NULL,60,'SHADIN','BEPARI',TO_DATE('14-02-1985','DD-MM-YY'),36,'01624687891','SHADIN2@GMAIL.COM.COM','A/6 DHANMONDI, DHAKA');
INSERT INTO PERSON VALUES(NULL,70,'TONMOY','KHALASHI',TO_DATE('13-03-1980','DD-MM-YY'),41,'01324687890','TK33@GMAIL.COM.COM','C/4 BARIDHARA, DHAKA');
INSERT INTO PERSON VALUES(NULL,80,'TOWFIQ','ELAHI',TO_DATE('19-03-1983','DD-MM-YY'),38,'01624687870','ELAHI223@GMAIL.COM.COM','D/2 DOHS, DHAKA');
INSERT INTO PERSON VALUES(NULL,90,'KAWSHIK','SHIKDER',TO_DATE('12-08-1988','DD-MM-YY'),33,'01424687810','KHAN@GMAIL.COM.COM','F/8 MIRPUR-14, DHAKA');
INSERT INTO PERSON VALUES(NULL,100,'MUTORJA','HOSSEN',TO_DATE('18-05-1990','DD-MM-YY'),31,'01724687845','MUT_H@GMAIL.COM.COM','F/8  KOMLAPUR, DHAKA');
INSERT INTO PERSON VALUES(NULL,110,'KHALED','BHUYAN',TO_DATE('28-10-1992','DD-MM-YY'),29,'01524687843','K_BHUYAN@GMAIL.COM.COM','J/2  MOTIZIL, DHAKA');
INSERT INTO PERSON VALUES(NULL,120,'TONMOY','DEY',TO_DATE('21-12-1998','DD-MM-YY'),23,'01424687812','TDFROMBD@GMAIL.COM.COM','E/2  ARAMBAG, DHAKA');
INSERT INTO PERSON VALUES(NULL,130,'RIDWAN','HAQ',TO_DATE('13-02-1999','DD-MM-YY'),22,'01924687826','HAQ997@GMAIL.COM.COM','A/2  LALMATI, DHAKA');
INSERT INTO PERSON VALUES(NULL,140,'MALEK','MATUBAR',TO_DATE('10-06-2000','DD-MM-YY'),21,'01824687827','MALEKKK@GMAIL.COM.COM','C/2  BADDA, DHAKA');
SELECT * FROM PERSON;

ALTER TABLE PERSON MODIFY (
     CUSTID NUMBER(30) UNIQUE,
     EMPID NUMBER(30) UNIQUE, 
     EMAIL VARCHAR2(30) UNIQUE,
     ADDRESS VARCHAR(100),
     PHONE VARCHAR2(20)
);

-- UPDATE PERSON SET PHONE = NULL WHERE CUSTID > 110;
-- DELETE FROM PERSON WHERE CUSTID > 110;
-- DELETE FROM PERSON;
-- TRUNCATE TABLE PERSON;
-- SELECT * FROM PERSON;
-- SELECT * FROM EMPLY;


-- ALTER TABLE PERSON RENAME COLUMN HOUSENO TO ADDRESS;

-- DESC PERSON;
-- SELECT * FROM EMPLY;

-- DESC PERSON;
----------------------------
-- DESCRIBE PRODUCT;
-- ALTER TABLE PRODUCT DROP COLUMN QTY;
-- PID	NOT NULL	NUMBER(30)
-- PNAME		VARCHAR2(30)
-- PRICE		NUMBER(35)

INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'MEN JACKET',1250);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'CASUAL SHOE',850);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'HAWAIIAN SHIRT',1850);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'JEANS',1280);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'GLOVES',550);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'POLO T-SHIRT',1500);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'DENIN JINS PANT',1700);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'JACK & SONS HODIES',2500);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'ADIDS INNER-WEAR',700);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,' Gini & Jony SHIRT',1550);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'HOHO SOCKS',80);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'CASIO WATCH',20000);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'SKY BLUE SUNCLASS',300);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'APEX SHOES',2500);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'BEAUTY PACK',3500);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'NANT2 CAPS',500);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'LONDON BOY  CENTO GANJI',150);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'PAIJA LUNGI',800);

INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'PUMA TSHIRT',850);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'JOGGERS VK',1000);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'VERSITY JUMPER',1300);
INSERT INTO PRODUCT VALUES(COMMONSEQ.NEXTVAL,'PAKHI DRESS',2500);

SELECT * FROM PRODUCT;

-- TRUNCATE TABLE PRODUCT;

------------------- 
-- DESCRIBE ODR;
-- DESCRIBE PERSON;
-- ALTER TABLE PERSON DROP COLUMN PID;
-- ALTER TABLE ODR ADD(PID NUMBER(30) CONSTRAINT FK_PID REFERENCES PRODUCT NOT NULL);
-- SELECT * FROM CUSTMR,PERSON WHERE PERSON.CUSTID = 100 AND CUSTMR.CUSTID = PERSON.CUSTID;
-- SELECT * FROM CUSTMR;


ALTER TABLE ODR DROP COLUMN PID;
ALTER TABLE ODR ADD(PID NUMBER(30) CONSTRAINT FK_PID REFERENCES PRODUCT NOT NULL);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,100,TO_DATE('01-01-2017','DD-MM-YY'),270);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,100,TO_DATE('15-09-2018','DD-MM-YY'),280);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,110,TO_DATE('15-09-2018','DD-MM-YY'),280);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,110,TO_DATE('15-09-2018','DD-MM-YY'),270);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,120,TO_DATE('15-09-2018','DD-MM-YY'),280);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,130,TO_DATE('15-09-2018','DD-MM-YY'),290);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,140,TO_DATE('15-09-2018','DD-MM-YY'),300);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,150,TO_DATE('15-09-2018','DD-MM-YY'),310);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,160,TO_DATE('16-08-2019','DD-MM-YY'),280);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,200,TO_DATE('02-06-2021','DD-MM-YY'),280);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,130,TO_DATE('14-09-2018','DD-MM-YY'),290);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,170,TO_DATE('26-02-2019','DD-MM-YY'),320);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,150,TO_DATE('10-02-2019','DD-MM-YY'),310);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,150,TO_DATE('14-02-2021','DD-MM-YY'),270);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,180,TO_DATE('18-09-2018','DD-MM-YY'),220);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,120,TO_DATE('25-11-2020','DD-MM-YY'),230);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,140,TO_DATE('19-09-2019','DD-MM-YY'),240);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,210,TO_DATE('15-09-2020','DD-MM-YY'),250);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,100,TO_DATE('13-08-2021','DD-MM-YY'),260);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,120,TO_DATE('19-06-2017','DD-MM-YY'),390);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,190,TO_DATE('06-12-2018','DD-MM-YY'),380);

INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,190,TO_DATE('06-10-2018','DD-MM-YY'),0);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,190,TO_DATE('06-07-2018','DD-MM-YY'),1000);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,190,TO_DATE('01-12-2019','DD-MM-YY'),1001);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,190,TO_DATE('05-12-2018','DD-MM-YY'),1002);
INSERT INTO ODR VALUES(COMMONSEQ.NEXTVAL,190,TO_DATE('06-04-2020','DD-MM-YY'),0);
SELECT * FROM ODR;

ALTER TABLE ODR DROP CONSTRAINT FK_PID;
ALTER TABLE ODR MODIFY(
     PID NUMBER(30) CONSTRAINT FK_PID REFERENCES PRODUCT
); 

-- 
-- SELECT PID FROM PRODUCT ORDER BY PID;
-- SELECT PID FROM ODR ORDER BY PID;
-- UPDATE ODR SET PID = 270;
-- TRUNCATE TABLE ODR;

----------------
-- DESCRIBE PAYMENT;
-- DESCRIBE MPAY;
-- DESCRIBE CPAY;
-- DESCRIBE CHECKOUT;
-----------------
-- SELECT OID FROM ODR;
-- DESC PAYMENT;
-- SELECT * FROM ODR;

ALTER TABLE PAYMENT DROP CONSTRAINT PK_PAYID;
INSERT INTO PAYMENT VALUES(123,400);
INSERT INTO PAYMENT VALUES(123,410);
INSERT INTO PAYMENT VALUES(123,420);
INSERT INTO PAYMENT VALUES(222,430);
INSERT INTO PAYMENT VALUES(222,440);
INSERT INTO PAYMENT VALUES(222,450);
INSERT INTO PAYMENT VALUES(333,460);
INSERT INTO PAYMENT VALUES(125,470);
INSERT INTO PAYMENT VALUES(125,480);
INSERT INTO PAYMENT VALUES(126,490);
INSERT INTO PAYMENT VALUES(227,500);
INSERT INTO PAYMENT VALUES(228,510);
INSERT INTO PAYMENT VALUES(228,520);
INSERT INTO PAYMENT VALUES(125,530);
INSERT INTO PAYMENT VALUES(423,540);
INSERT INTO PAYMENT VALUES(125,550);
INSERT INTO PAYMENT VALUES(623,560);
INSERT INTO PAYMENT VALUES(722,570);
INSERT INTO PAYMENT VALUES(125,580);
INSERT INTO PAYMENT VALUES(922,590);
INSERT INTO PAYMENT VALUES(922,600);
SELECT * FROM PAYMENT;


-- TRUNCATE TABLE PAYMENT;
------------
SELECT COMMONSEQ.NEXTVAL FROM DUAL;
-- SELECT * FROM DUAL;

-- DESC MPAY;
-- SELECT * FROM ODR;
-- SELECT * FROM MPAY;
-- UPDATE MPAY SET MTRXID = 'TRX_BKASH00700';

ALTER TABLE MPAY MODIFY(OID NUMBER(30) UNIQUE);
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),400,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),410,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),420,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),430,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),440,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),450,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),460,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),470,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),480,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),490,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),500,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),510,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),520,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),530,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),540,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),550,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),560,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),570,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),580,NULL,'YES');
INSERT INTO MPAY VALUES('TRX_BKASH00'||TO_CHAR(COMMONSEQ.NEXTVAL),590,'YES',NULL);
INSERT INTO MPAY VALUES('TRX_NAGAD00'||TO_CHAR(COMMONSEQ.NEXTVAL),600,NULL,'YES');


TRUNCATE TABLE MPAY;

------------
-- SELECT * FROM ODR;
-- DESC CPAY;

ALTER TABLE CPAY MODIFY(OID NUMBER(30) UNIQUE,CDNO NUMBER(30) UNIQUE);
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),400,NIDSEQ.NEXTVAL,'VISA','123',TO_DATE('01-01-2023','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),410,NIDSEQ.NEXTVAL,'VISA','124',TO_DATE('07-09-2026','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),420,NIDSEQ.NEXTVAL,'MASTER CARD','123',TO_DATE('01-06-2024','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),430,NIDSEQ.NEXTVAL,'VISA','125',TO_DATE('01-01-2023','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),440,NIDSEQ.NEXTVAL,'QCARD','126',TO_DATE('01-01-2023','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),450,NIDSEQ.NEXTVAL,'VISA','127',TO_DATE('01-01-2028','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),460,NIDSEQ.NEXTVAL,'SHOPPINGCARD','128',TO_DATE('01-01-2027','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),470,NIDSEQ.NEXTVAL,'VISA','123',TO_DATE('01-10-2025','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),480,NIDSEQ.NEXTVAL,'NEXUSPAY','124',TO_DATE('20-01-2023','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),490,NIDSEQ.NEXTVAL,'VISA','125',TO_DATE('21-01-2024','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),500,NIDSEQ.NEXTVAL,' SHOPPINGCARD ','224',TO_DATE('01-06-2025','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),510,NIDSEQ.NEXTVAL,'VISA','323',TO_DATE('01-12-2026','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),520,NIDSEQ.NEXTVAL,'VISA','523',TO_DATE('21-07-2024','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),530,NIDSEQ.NEXTVAL,'VISA','223',TO_DATE('01-06-2027','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),540,NIDSEQ.NEXTVAL,'VISA','823',TO_DATE('01-02-2023','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),550,NIDSEQ.NEXTVAL,'VISA','122',TO_DATE('01-01-2029','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),560,NIDSEQ.NEXTVAL,'VISA','122',TO_DATE('01-01-2029','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),570,NIDSEQ.NEXTVAL,'VISA','122',TO_DATE('01-01-2029','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),580,NIDSEQ.NEXTVAL,'VISA','122',TO_DATE('01-01-2029','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),590,NIDSEQ.NEXTVAL,'VISA','122',TO_DATE('01-01-2029','DD-MM-YY'));
INSERT INTO CPAY VALUES('CARD_TRX00'||TO_CHAR(COMMONSEQ.NEXTVAL),600,NIDSEQ.NEXTVAL,'VISA','122',TO_DATE('01-11-2024','DD-MM-YY'));
SELECT * FROM CPAY;

----------------

-- SELECT * FROM PRODUCT;

-- DESC CHECKOUT;

-- SELECT * FROM ODR;
-- SELECT * FROM PAYMENT;

ALTER TABLE CHECKOUT DROP CONSTRAINT PK_CTPAYID;
INSERT INTO CHECKOUT VALUES(400,123,1,1250,50,1300,NULL);
INSERT INTO CHECKOUT VALUES(420,123,1,1250,50,1300,NULL);
INSERT INTO CHECKOUT VALUES(430,123,1,850,50,800,100);
INSERT INTO CHECKOUT VALUES(440,222,2,1250,50,2000,550);
INSERT INTO CHECKOUT VALUES(450,222,1,1700,50,1000,750);
INSERT INTO CHECKOUT VALUES(460,222,1,1850,50,1000,900);
INSERT INTO CHECKOUT VALUES(470,333,1,1250,50,0,1300);
INSERT INTO CHECKOUT VALUES(480,125,2,1800,50,1850,NULL);
INSERT INTO CHECKOUT VALUES(490,125,1,850,50,900,NULL);
INSERT INTO CHECKOUT VALUES(500,126,3,2700,50,2500,250);
INSERT INTO CHECKOUT VALUES(510,227,2,3800,0,3800,NULL);
INSERT INTO CHECKOUT VALUES(520,228,1,3550,50,3000,600);
INSERT INTO CHECKOUT VALUES(530,125,2,1800,0,1800,NULL);
INSERT INTO CHECKOUT VALUES(540,125,1,900,0,900,NULL);
INSERT INTO CHECKOUT VALUES(550,623,8,28400,0,28400,NULL);
INSERT INTO CHECKOUT VALUES(560,722,2,1500,50,1000,550);
INSERT INTO CHECKOUT VALUES(570,125,1,900,50,900,50);
INSERT INTO CHECKOUT VALUES(580,922,4,5200,50,5200,50);
INSERT INTO CHECKOUT VALUES(590,922,1,850,50,850,50);
INSERT INTO CHECKOUT VALUES(600,922,1,150,50,200,0);
SELECT * FROM CHECKOUT;

CREATE TABLE TEMP AS SELECT * FROM CHECKOUT;
-- SELECT * FROM TEMP;
UPDATE CHECKOUT SET PAYID = NULL;
-- SELECT * FROM CHECKOUT;
ALTER TABLE CHECKOUT DROP COLUMN PAYID;

-- SELECT PAYID FROM PAYMENT WHERE OID = 600;
-- SELECT PRICE FROM PRODUCT WHERE PID = (SELECT PID FROM ODR WHERE OID = 600);

-- TRUNCATE TABLE CHECKOUT;


----------------------------

INSERT INTO MEMBERSHIP VALUES('IRON',100,500);
INSERT INTO MEMBERSHIP VALUES('BRONZE',501,1500);
INSERT INTO MEMBERSHIP VALUES('SILVER',1501,4000);
INSERT INTO MEMBERSHIP VALUES('GOLD',4001,10000);
INSERT INTO MEMBERSHIP VALUES('PLATINUM',10001,20000);
INSERT INTO MEMBERSHIP VALUES('DIAMOND',20001,50000);

SELECT * FROM MEMBERSHIP;


----------------------------


DESCRIBE DEPART;
DESCRIBE EMPLY;
DESCRIBE CUSTMR;
DESCRIBE PERSON;
DESCRIBE PRODUCT;
DESCRIBE ODR;
DESCRIBE PAYMENT;
DESCRIBE MPAY;
DESCRIBE CPAY;
DESCRIBE CHECKOUT;

--- 1
SELECT FNAME,CUSTID,EMPID,BDATE,AGE,PHONE FROM PERSON WHERE AGE BETWEEN 22 AND 25;

--- 2
SELECT * FROM CUSTMR WHERE GENDER = 'FEMALE';

-- SELECT * FROM CHECKOUT;
-- SELECT * FROM PAYMENT;

-- 3
SELECT CUSTID,NVL2(EMPID,'ALSO AN EMPLOYEE','NOT AN EMPLOYEE') AS "SINGLE ROW FUNCTION",EMPID FROM PERSON WHERE CUSTID IS NOT NULL; 

SELECT MAX(PRICE) FROM PRODUCT;

-- 4 
SELECT * FROM CUSTMR;
SELECT * FROM PERSON WHERE CUSTID  = (SELECT CUSTID FROM ODR WHERE OID = 400);
SELECT * FROM EMPLY WHERE DEPTID = (SELECT DEPTID FROM DEPART WHERE DNAME = 'ENGINEERING');
SELECT * FROM EMPLY WHERE SALARY > (SELECT AVG(TOTALBUY) FROM CUSTMR);

-- SELECT * FROM PRODUCT WHERE PID IN (SELECT PID FROM ODR WHERE OID IN (SELECT OID FROM CHECKOUT WHERE PRICE = 1250)); 
-- SELECT * FROM PRODUCT WHERE PRICE = 1250;

SELECT * FROM CHECKOUT WHERE OID IN (SELECT OID FROM ODR WHERE CUSTID BETWEEN 100 AND 130);
SELECT * FROM PERSON WHERE CUSTID IN (SELECT CUSTID FROM ODR WHERE OID IN (SELECT OID FROM CHECKOUT WHERE DUE IS NOT NULL));

------
-- SELECT COUNT(*),DEPTID FROM EMPLY GROUP BY DEPTID ORDER BY COUNT(*) DESC FETCH FIRST 1 ROW WITH TIES;
-- (SELECT DEPTID FROM DEPART WHERE MAX(COUNT(DEPTID))) GROUP BY DEPTID);

-- SELECT MAX(COUNT(DEPTID)) FROM EMPLY GROUP BY DEPTID;

-- ORDER BY COUNT(*) 
-- DESC FETCH FIRST 1 ROW WITH TIES ;

SELECT * FROM PERSON WHERE EMPID IN (SELECT EMPID FROM EMPLY WHERE DEPTID IN (SELECT DEPTID FROM DEPART WHERE DNAME = 'SALES') AND HIREDATE < '29-DEC-21');

SELECT * FROM PERSON WHERE EMPID IN (SELECT EMPID FROM EMPLY WHERE SALARY < (SELECT AVG(MAX(SALARY)) FROM EMPLY GROUP BY DEPTID));

--- EQUIJION

SELECT FNAME||' '||LNAME NAME,P.CUSTID,AGE,PHONE,EMAIL FROM PERSON P, CUSTMR C WHERE P.CUSTID = C.CUSTID;


---- NON-EQUI-JOIN
SELECT CUSTID,JOINED,GENDER,TOTALBUY,POINTS,PLAN FROM CUSTMR,MEMBERSHIP WHERE (TOTALBUY BETWEEN LOBUY AND HIBUY) AND JOINED > '01-JUN-19';
SELECT * FROM MEMBERSHIP;

SELECT * FROM ODR;
SELECT * FROM CHECKOUT;

SELECT * FROM DEPART;
SELECT * FROM  EMPLY; 
SELECT * FROM  CUSTMR;
SELECT * FROM  PERSON;
SELECT * FROM  PRODUCT;
SELECT * FROM  ODR;
SELECT * FROM  PAYMENT;
SELECT * FROM  MPAY;
SELECT * FROM  CPAY;
SELECT * FROM  CHECKOUT;

-- SELECT DNAME, DEPT.DEPTNO, NVL(ENAME,'NO EMPLOYEE') AS ENAME FROM DEPT LEFT OUTER JOIN EMP ON (DEPT.DEPTNO = EMP.DEPTNO);

SELECT EMPLY.*,NVL2(CUSTMR.CUSTID,TO_CHAR(CUSTMR.CUSTID),'NOT A CUSTOMER') "CUSTOMER ID" FROM EMPLY LEFT OUTER JOIN CUSTMR ON(EMPLY.EMPID = CUSTMR.EMPID);
SELECT * FROM EMPLY;

SELECT * FROM MPAY,CPAY,CHECKOUT;

SELECT PERSON.FNAME,ODR.OID,ODR.CUSTID,CHECKOUT.DUE FROM PERSON, ODR RIGHT OUTER JOIN CHECKOUT ON (CHECKOUT.OID = ODR.OID AND PERSON.CUSTID = ODR.CUSTID); 

SELECT EMPLY.EMPID,DEPART.DEPTID FROM EMPLY RIGHT OUTER JOIN DEPART ON (DEPART.DEPTID = EMPLY.DEPTID);
SELECT NVL2(EMPLY.EMPID,TO_CHAR(EMPLY.EMPID),'NO EMPLOYEE') "EMPLOYEE ID",DEPART.DEPTID FROM EMPLY,DEPART WHERE EMPLY.DEPTID(+) = DEPART.DEPTID ORDER BY DEPART.DEPTID DESC;

--- FULL OUTER JOIN

SELECT * FROM PRODUCT;
SELECT * FROM ODR;

SELECT ODR.*,PRODUCT.* FROM ODR FULL OUTER JOIN PRODUCT ON (PRODUCT.PID = ODR.PID) ORDER BY ODR.PID DESC;

--- SELF JOIN
SELECT A.FNAME||' '||A.LNAME||' & '||B.FNAME|| ' '||B.LNAME||' IS BOTH '||A.AGE||' YEARS OLD' "SAME AGE TABLE" FROM PERSON A,PERSON B WHERE A.AGE = B.AGE AND (A.CUSTID <> B.CUSTID OR A.EMPID <> B.EMPID);

--- VIEW

-- SELECT FNAME,CUSTID,PID,PRICE FROM PERSON P,CUSTMR

CREATE VIEW ECOMVIEW AS SELECT C.OID AS "ORDER ID",PS.FNAME AS "NAME",PS.PHONE,P.PNAME AS "PRODUCT NAME",C.PRICE,C.VAT,C.PAID,C.DUE 
FROM ODR O, CHECKOUT C, PRODUCT P,PERSON PS WHERE C.OID = O.OID AND O.PID = P.PID AND O.CUSTID = PS.CUSTID WITH READ ONLY;

SELECT * FROM CHECKOUT;

SELECT * FROM ECOMVIEW;
DROP VIEW ECOMVIEW;


--------------extrassss



SELECT * FROM PERSON;