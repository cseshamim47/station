select * from emp;

DESCRIBE EMP;

select * from dept;

-- SELECT DISTINCT MGR,ENAME,JOB  FROM EMP; 

select ename,job,sal,deptno from emp where sal>=2850 and sal<5000;
select ename,job,sal,deptno from emp where sal between 2800 and 5000;

select ename,job,sal,deptno from emp where sal>2800 and sal<=5000;
select ename,job,sal,deptno from emp where sal between 2801 and 5000;

select dname,loc,deptno from dept where deptno=10 or deptno=30;
select dname,loc,deptno from dept where deptno in (10,30);

select ename,job from emp where job in('MANAGER','CLERK');
select ename,job from emp where job='manager' or job='clerk';

select ename from emp where ename like 'A%';
select ename from emp where ename like '_D%';
select ename from emp where ename like '__R%';
select ename from emp where ename like '__R_';
select ename from emp where ename like '%R';

select ename,comm from emp where comm is NULL;
select ename,comm from emp where comm is not NULL;

select ename,comm from emp where ename not like 'A%';

select max(sal) from emp; -- aggregate funcion + single row fucntion
select min(sal) from emp;
select avg(sal) from emp;
select round(avg(sal)) from emp;

select count(*) from emp;
select count(*) from emp where sal>2800;
select count(sal) from emp where sal>2800;
select sal from emp where sal>2800;

select ename,sal from emp where sal=(select max(sal) from emp);
select ename, deptno from emp order by ename asc;
select ename, deptno from emp order by deptno desc;

select ename, sal from emp order by sal desc;
select ename, sal from emp order by sal asc;
select ename, sal from emp order by sal;

select ename,job,hiredate from emp where hiredate<'31-dec-1981';
select ename,HIREDATE from emp where HIREDATE like '%81';


-- class 7
SELECT ENAME, SAL FROM EMP ORDER BY ENAME DESC;

select count(*) from emp where job = 'SALESMAN';
select count(*) from emp where job = 'ANALYST';

SELECT JOB,COUNT(*) FROM EMP GROUP BY JOB;
SELECT ENAME, DEPTNO FROM EMP WHERE DEPTNO=10;
SELECT ENAME, DEPTNO FROM EMP WHERE JOB='SALESMAN';

--AGGREGATE FUNCION CANNOT BE USED WITH NORMAL COLUMN (IF WE DO NOT USE VALID GROUP BY)

SELECT JOB, MAX(SAL) FROM EMP GROUP BY JOB;
SELECT JOB, MAX(SAL) FROM EMP; --  ERROR
SELECT MIN(SAL), MAX(SAL) FROM EMP; --  WORKS

SELECT MGR, COUNT(*) FROM EMP GROUP BY MGR;
SELECT MGR, MIN(SAL) FROM EMP GROUP BY MGR ORDER BY MGR;
SELECT JOB, MIN(SAL) FROM EMP GROUP BY JOB ORDER BY JOB;
SELECT JOB, MIN(SAL) FROM EMP GROUP BY JOB ORDER BY MIN(SAL);

SELECT MGR, SAL, ENAME FROM EMP WHERE MGR=7698;


SELECT DEPTNO, JOB, AVG(SAL) FROM EMP GROUP BY DEPTNO, JOB;
SELECT ENAME, JOB, DEPTNO, SAL FROM EMP WHERE DEPTNO=20 AND JOB='MANAGER';
SELECT JOB, DEPTNO, SAL FROM EMP WHERE DEPTNO=20 AND JOB='CLERK';
SELECT DEPTNO, JOB, MAX(SAL) FROM EMP GROUP BY DEPTNO, JOB ORDER BY DEPTNO,JOB;
SELECT DEPTNO, JOB, MAX(SAL) FROM EMP GROUP BY DEPTNO, JOB ORDER BY DEPTNO DESC,JOB DESC;
SELECT DEPTNO, JOB, MAX(SAL) FROM EMP GROUP BY DEPTNO, JOB ORDER BY DEPTNO DESC,JOB ASC;

-- 1. Write a SQL query to print details of the Employees whose Ename contains ‘a’.
select * from emp where ename like '%A%';

-- Write a SQL query to print details of the Employees whose Ename ends with ‘N’
-- 2. 
select * from emp where ename like '%N';
-- 3.
select * from emp where ename like '_____N';
-- 4.
-- Write a SQL query to print details of the Employees who have joined in NOV’1981.
select * from emp where HIREDATE like '%NOV-81';
-- 5. Compute average, minimum and maximum salaries of the group of employees having the job of ANALYST.
SELECT MIN(sal),AVG(SAL),MAX(SAL) from emp WHERE JOB='ANALYST';
-- 6. Display the TOTAL SALARY(Salary+Commission) drawn by an analyst working in 
-- dept no 20.
SELECT ENAME, JOB, DEPTNO, SAL,COMM, SAL+COMM AS "TOTAL SALARY(SALARY+COMMISION)" FROM EMP WHERE JOB = 'ANALYST' AND DEPTNO='20';
-- 7. Display all the Employees whose name’s 2nd character is L and 2nd last character is K.
SELECT * FROM EMP WHERE ENAME LIKE '_L%K_';
-- 8. Display the name of employees who have joined in 1980 and salary is greater than 2800.
8. SELECT ENAME FROM EMP WHERE HIREDATE LIKE '%80' AND SAL>2800;
SELECT * FROM EMP WHERE HIREDATE LIKE '%80';
-- 9. Display all the managers whose name doesn't start with A & S.
9. SELECT ENAME, MGR FROM EMP WHERE ENAME NOT LIKE 'A%' AND ENAME NOT LIKE 'S%';
-- 10. Display all the Employees whose name and whose job start with S.
10. SELECT ENAME,JOB FROM EMP WHERE ENAME LIKE 'S%' AND JOB LIKE 'S%';
-- 11. List the information for all employee whose job is either MANAGER or ANALYST.
-- 11. 
SELECT * FROM EMP WHERE JOB = ANY('MANAGER','ANALYST');
-- 12. Display Employees name, salary, commission whose salary is greater than commission
12. SELECT ENAME AS "NAME", SAL AS "SALARY", COMM AS "COMMISION" FROM EMP WHERE SAL>COMM;

---- Class 8
SELECT SAL,COMM,COMM+SAL FROM EMP;
SELECT COMM FROM EMP;
SELECT NVL(COMM,5) FROM EMP;
SELECT SUM(COMM) FROM EMP;
SELECT SUM(NVL(COMM,2)) FROM EMP;
SELECT COMM, NVL(COMM,2) FROM EMP;
SELECT SAL+NVL(COMM,2) FROM EMP;

-- SELECT MAX(SAL) FROM EMP WHERE MAX(SAL)>2900; -- GROUP FUNCTION NOT ALLOWED
SELECT MIN(SAL) FROM EMP;
SELECT DEPTNO, MAX(SAL) FROM EMP GROUP BY DEPTNO;
-- SELECT DEPTNO, MAX(SAL) FROM EMP WHERE MAX(SAL)>2850 GROUP BY DEPTNO;
SELECT DEPTNO, MAX(SAL) FROM EMP GROUP BY DEPTNO HAVING MAX(SAL)>2850;

-----------------------------
-----------------------------

SELECT JOB,SUM(SAL) FROM EMP GROUP BY JOB ORDER BY SUM(SAL);

SELECT JOB,SUM(SAL) FROM EMP 
WHERE JOB NOT LIKE 'S%' 
HAVING SUM(SAL)>4500 
GROUP BY JOB ORDER BY SUM(SAL);

-------------------------------------------------

CREATE TABLE ST_INFO(
    ID NUMBER(3) CONSTRAINT PK_STDINFO PRIMARY KEY,
    F_NAME VARCHAR2(14),
    L_NAME VARCHAR2(14),
    DPART VARCHAR2(20),
    CGPA NUMBER(3,2)
);

DESCRIBE ST_INFO; 
-- TAKE SCREENSHOT NOW

INSERT INTO ST_INFO VALUES(
    -- 100,'AMINUL','HASAN','CSE',3.54
    -- 101,'ASIF',NULL,'CSE',3.88
    -- 102,'KING',NULL,'EEE',3.95
    105,'CINDRELLA N','ANGEL','CIVIL',3.50
);

SELECT * FROM ST_INFO;
-- TAKE SCREENSHOT NOW

------------1 end---------
SELECT DPART,MAX(CGPA) FROM ST_INFO HAVING MAX(CGPA)>3.50 GROUP BY DPART ORDER BY MAX(CGPA) ASC;
------- 2 end ----

SELECT F_NAME,L_NAME,NVL(L_NAME,'L_NAME NOT GIVEN') FROM ST_INFO;
SELECT F_NAME,L_NAME,NVL2(L_NAME,F_NAME||' '||L_NAME,F_NAME || ' ( L_NAME NOT GIVEN)') FROM ST_INFO;
SELECT F_NAME,NULLIF(100,100) FROM ST_INFO;
SELECT F_NAME,NULLIF(CGPA,ID) FROM ST_INFO;

---- 3 END ----

SELECT CONCAT(F_NAME,' '||L_NAME) AS "FULL NAME",INSTR(F_NAME,'N') AS "'N' IS AT", REPLACE(F_NAME,'N','( ''N'' WAS HERE )') "AFTER REPLACING" FROM ST_INFO;

---- 4 END ---

INSERT INTO ST_INFO VALUES(
    110,'ADU','BHAI','CSE',2.30
);

ALTER TABLE ST_INFO ADD(
    PROBATION VARCHAR2(5)
);

UPDATE ST_INFO SET PROBATION='NO'
WHERE CGPA>=2.50;

UPDATE ST_INFO SET PROBATION='YES'
WHERE F_NAME='KING' OR CGPA<2.50;

SELECT * FROM ST_INFO;

DELETE FROM ST_INFO WHERE ID=100;

SELECT * FROM ST_INFO;

----- 5 END ---


RENAME ST_INFO TO STUDENTINFO;


ALTER TABLE STUDENTINFO RENAME COLUMN NAME TO SNAME;


TRUNCATE TABLE STUDENTINFO;

SELECT * FROM STUDENTINFO;

DROP TABLE STUDENTINFO;


--------------------------class 9---------
SELECT COMM FROM EMP;
SELECT NVL(COMM,2) FROM EMP; -- SINGEL ROW FUNCTION
SELECT MAX(COMM) FROM EMP; -- MULTI ROW FUNCTION

-- CHARACTER MANIPULATION FUCTIONS
SELECT CONCAT(ENAME,JOB) FROM EMP WHERE SAL>2800;
SELECT ENAME, SUBSTR(ENAME,2,3) FROM EMP;
SELECT ENAME,LENGTH(ENAME) FROM EMP;
SELECT ENAME, INSTR(ENAME,'A') FROM EMP;
SELECT JOB, TRIM('A' FROM JOB) FROM EMP;
SELECT ENAME, TRIM('T' FROM ENAME) FROM EMP;
SELECT ENAME, REPLACE(ENAME,'O','X') FROM EMP;
SELECT SAL, REPLACE(SAL,0,'*') FROM EMP;
SELECT JOB, REPLACE(JOB,'RESIDENT','*') FROM EMP;

SELECT HIREDATE FROM EMP;

SELECT HIREDATE, TO_CHAR(HIREDATE,'DD-MM-YY'), 
TO_CHAR(HIREDATE, 'DD-MONTH-YY'),
TO_CHAR(HIREDATE,'DD-MONTH-YYYY'),
TO_CHAR(HIREDATE, 'DY-MONTH-YEAR'),
TO_CHAR(HIREDATE, 'DD-DY-MONTH-YY'), 
TO_CHAR(HIREDATE, 'DAY-DY-MONTH-YY') FROM EMP;

SELECT SAL, SAL/9,ROUND(SAL/9,2) FROM EMP;

--------------------------class 10---------
SELECT JOB,SAL,DECODE(JOB, 'ANALYST',SAL+20,'CLERK',SAL+50,'MANAGER',SAL+100,SAL), 'UPDATED_SALARY' FROM EMP;
SELECT JOB,SAL,DECODE(JOB, 'ANALYST',SAL+20,'CLERK',SAL+50,'MANAGER',SAL+100,SAL) UPDATED_SALARY FROM EMP;
SELECT JOB,SAL,DECODE(JOB, 'ANALYST',SAL+20,'CLERK',SAL+50,'MANAGER',SAL+100,SAL) "UPDATED_SALARY" FROM EMP;

SELECT SAL, TO_CHAR(SAL,'$9,999') SALARY FROM EMP;

SELECT SAL, COMM, NVL2(COMM, COMM+SAL, SAL) TOTAL_SALARY FROM EMP;
SELECT MGR, COMM, NULLIF(MGR,COMM) FROM EMP;
SELECT JOB, JOB, NULLIF(JOB,JOB) FROM EMP;

SELECT ENAME, NVL(TO_CHAR(MGR), 'NO MANAGER') FROM EMP;
SELECT ENAME, NVL(TO_CHAR(COMM), 'NO COMMISION') FROM EMP;


---MY PERSONAL STUFF----
SELECT DISTINCT DEPTNO FROM EMP; 
SELECT ENAME,SAL,DEPTNO FROM EMP WHERE DEPTNO NOT IN(10,30);
SELECT SAL, SAL*12 "ANNUAL SAL" FROM EMP ORDER BY "ANNUAL SAL" DESC;
SELECT ENAME, JOB, SAL, SAL*12 "ANNUAL SAL" FROM EMP ORDER BY JOB ASC, SAL DESC;
--SORTING PRECEDENCE IS LEFT TO RIGHT


select trim(G from ename) from emp where ename='KING';
select INSTR(ENAME,'G') FROM EMP WHERE ENAME='KING';
SELECT SAL,COMM,NVL2(COMM,SAL-100,SAL+200) FROM EMP;
SELECT LENGTH('I AM ATTENDING IDM MID MCQ QUIZ') FROM EMP;

----- MID EXAM ---






-- RAILWAY 
-- TRAIN_ID
-- TRAIN_NAME
-- DEPTURE_TIME
-- STATUS
-- CURRENT_LOC

CREATE TABLE RAILWAY(
    TRAIN_ID NUMBER(3) CONSTRAINT PK_TRAININFO PRIMARY KEY,
    TRAIN_NAME VARCHAR2(30),
    DEPERTURE_TIME DATE,
    OFFDAY VARCHAR2(30),
    STATUS VARCHAR2(30),
    CURRENT_LOC VARCHAR2(30)
);

DROP TABLE RAILWAY;

DESCRIBE RAILWAY;
RENAME RAILWAY TO S_INFO;

TRUNCATE TABLE S_INFO;

INSERT INTO RAILWAY VALUES(
    -- 250,'SUNDARBAN EXPRESS','DEP_TIME','OFFDAY','STATUS','CURRENT_LOC'
    -- 250,'SUNDARBAN EXPRESS','05:37 PM','SUNDAY','ON THE WAY','DHAKA'
    250,'BONOLOTA','02:30 PM','SUNDAY','ON THE WAY','DHAKA'
);

SELECT * FROM RAILWAY;




------------------------------------------

CREATE TABLE ST_INFO(
    ID NUMBER(3) CONSTRAINT PK_STDINFO PRIMARY KEY,
    F_NAME VARCHAR2(14),
    L_NAME VARCHAR2(14),
    DPART VARCHAR2(20),
    CGPA NUMBER(3,2)
);

DESCRIBE ST_INFO; 

CREATE TABLE ST_INFO(
    ID NUMBER(3) CONSTRAINT PK_STDINFO PRIMARY KEY,
    F_NAME VARCHAR2(14),
    L_NAME VARCHAR2(14),
    DPART VARCHAR2(20),
    CGPA NUMBER(3,2)
);

DESCRIBE ST_INFO;
-- TAKE SCREENSHOT NOW


-- TAKE SCREENSHOT NOW

------------1 end---------
SELECT DPART,MAX(CGPA) FROM ST_INFO WHERE DPART LIKE 'CSE' HAVING MAX(CGPA)>3.65 GROUP BY DPART ORDER BY MAX(CGPA) ASC;
------- 2 end ----

SELECT F_NAME,L_NAME,NVL(L_NAME,'L_NAME IS NULL') FROM ST_INFO;
SELECT F_NAME,L_NAME,NVL2(L_NAME,F_NAME||' '||L_NAME,F_NAME || ' ( L_NAME IS NULL)') FROM ST_INFO;
SELECT F_NAME,NULLIF(100,100) FROM ST_INFO;
SELECT F_NAME,NULLIF(CGPA,ID) FROM ST_INFO;

---- 3 END ----

SELECT CONCAT(F_NAME,' '||L_NAME) AS "FULL NAME",INSTR(F_NAME,'N') AS "'N' IS AT", REPLACE(F_NAME,'N','( ''N'' WAS HERE )') "AFTER REPLACING" FROM ST_INFO;

SELECT JOB,SAL,DECODE(JOB, 'ANALYST',SAL+20,'CLERK',SAL+50,'MANAGER',SAL+100,SAL) "UPDATED_SALARY" FROM EMP;
SELECT F_NAME,CGPA,DECODE(DPART,'CSE',CGPA+0.05,CGPA) "UPDATED_CGPA", ROUND(CGPA) "AFTER ROUNDED" FROM ST_INFO;

---- 4 END ---

INSERT INTO ST_INFO VALUES(
    110,'ADU','BHAI','CSE',2.30
);

ALTER TABLE ST_INFO ADD(
    PROBATION VARCHAR2(5)
);

UPDATE ST_INFO SET PROBATION='NO'
WHERE CGPA>=2.50;

UPDATE ST_INFO SET PROBATION='YES'
WHERE F_NAME='SOKINA' OR CGPA<2.50;

SELECT * FROM ST_INFO;

TRUNCATE TABLE ST_INFO;

DELETE FROM ST_INFO WHERE ID=100;

SELECT * FROM ST_INFO;

----- 5 END ---



RENAME ST_INFO TO STUDENTINFO;


ALTER TABLE STUDENTINFO RENAME COLUMN NAME TO SNAME;


TRUNCATE TABLE STUDENTINFO; --- DO IT

SELECT * FROM STUDENTINFO;

DROP TABLE STUDENTINFO;


-- FINAL TERM STARTED 01/NOV/21 --

-- WRITE A QUERY TO DISPLAY THE NAME AND SALARY OF EMPLOYEES 
-- WHOSE SALARY AND COMMISION MATCH THE SALARY AND COMMISION 
-- OF ANY EMPLOYEE HOLDING JOB SALESMAN.

SELECT ENAME,SAL FROM EMP;
SELECT ENAME,SAL FROM EMP WHERE (SAL,COMM) IN (SELECT SAL, COMM FROM EMP WHERE JOB='SALESMAN');

-- WRITE A QUERY TO DISPLAY EMPLOYEES WHO GET
-- HIGHER SALARY THAN EMPLOYEE WHOSE EMPLOYEE ID 
-- IS 7782

SELECT ENAME,SAL FROM EMP WHERE SAL > (SELECT SAL FROM EMP WHERE EMPNO = 7782);

SELECT * FROM EMP;

SELECT ENAME, SAL, EMPNO FROM WHERE JOB IN;

-----

SELECT * FROM EMP;

-- WHICH EMPLOYEES HAVE A SALARY GREATER THAN JONES SALARY?

SELECT ENAME,SAL FROM EMP WHERE SAL>(SELECT SAL FROM EMP WHERE ENAME='JONES');

SELECT * FROM EMP WHERE SAL = (SELECT MAX(SAL) FROM EMP);

SELECT * FROM EMP WHERE SAL IN (SELECT MAX(SAL) FROM EMP GROUP BY DEPTNO);

SELECT ENAME, DEPTNO FROM EMP WHERE DEPTNO =(SELECT DEPTNO FROM DEPT WHERE LOC='DALLAS');

SELECT * FROM DEPT;

-- WRITE A QUERY TO DISPLAY THE NAME, DEPTNO AND SALARY 
-- OF EMPLOYEES WHOSE DEPTNO AND SALARY MATCH THE DEPARTMENT 
-- NUMBER AND SALARY OF ANY EMPLOYEE WHO EARNS A COMMISSION.

SELECT ENAME, DEPTNO, SAL FROM EMP WHERE (DEPTNO,SAL) IN (SELECT DEPTNO, SAL FROM EMP WHERE COMM IS NOT NULL);

-- WRITE A QUERY TO DISPLAY THE NAME AND SALARY OF EMPLOYEES WHOSE SALARY AND COMMISSION MATCH THE SALARY AND COMMISSION OF ANY EMPLOYEE HOLDING JOB SALESMAN.

SELECT ENAME, SAL, COMM FROM EMP WHERE (SAL,COMM) IN (SELECT SAL, COMM FROM EMP WHERE JOB='SALESMAN');

-- MULTI COLUMN SUBQURIES
SELECT ENAME, SAL,COMM,JOB FROM EMP WHERE (SAL,COMM) IN (SELECT SAL, COMM FROM EMP WHERE JOB='SALESMAN');

SELECT ENAME, SAL, COMM FROM EMP WHERE SAL IN (SELECT SAL FROM EMP WHERE JOB='SALESMAN') AND COMM IN (SELECT COMM FROM EMP WHERE JOB='SALESMAN');

SELECT * FROM EMP;

-- 1) WRITE A QUERY TO DISPLAY EMPLOYEES WHO GET HIGHER SALARY THAN EMPLOYEE WHOSE EMPLOYEE ID IS 7782.
SELECT ENAME, SAL,EMPNO FROM EMP WHERE SAL > (SELECT SAL FROM EMP WHERE EMPNO=7782);
-- 2) WRITE A QUERY TO DISPLAY THE INFORMATION OF EMPLOYEES WHOSE DESIGNATION IS SAME AS THE EMPLOYEE WHOSE EMPLOYEE IS 7782.
SELECT ENAME, SAL, EMPNO FROM EMP WHERE JOB IN (SELECT JOB FROM EMP WHERE EMPNO=7782);


----- CLASS 2 ----

--SINGLE ROW SUBQUERIES
SELECT ENAME, SAL FROM EMP WHERE SAL=(SELECT MIN(SAL) FROM EMP);
SELECT ENAME, SAL FROM EMP WHERE SAL>(SELECT MIN(SAL) FROM EMP);
SELECT ENAME, SAL FROM EMP WHERE SAL<>(SELECT MIN(SAL) FROM EMP);

SELECT SAL FROM EMP WHERE SAL = 3000;
SELECT SAL FROM EMP WHERE SAL = (SELECT MIN(SAL) FROM EMP GROUP BY DEPTNO);
SELECT ENAME, SAL FROM EMP WHERE SAL IN (SELECT MIN(SAL) FROM EMP GROUP BY DEPTNO);
-- =, <, >, <=, <>

SELECT ENAME, SAL, JOB FROM EMP WHERE SAL > (SELECT SAL FROM EMP WHERE JOB = 'CLERK'); -- ERROR
SELECT ENAME, SAL, JOB FROM EMP WHERE SAL > (SELECT MAX(SAL) FROM EMP WHERE JOB = 'CLERK');
SELECT ENAME, SAL, JOB FROM EMP WHERE SAL > ALL(SELECT SAL FROM EMP WHERE JOB = 'CLERK'); 
SELECT ENAME, SAL, JOB FROM EMP WHERE SAL > ANY(SELECT SAL FROM EMP WHERE JOB = 'CLERK'); 

SELECT MAX(SAL) FROM EMP WHERE SAL <> (SELECT MAX(SAL) FROM EMP);
SELECT MAX(SAL) FROM EMP WHERE SAL < (SELECT MAX(SAL) FROM EMP WHERE SAL < (SELECT MAX(SAL) FROM EMP));

SELECT * FROM DEPT WHERE LOC = 'DALLAS';
SELECT * FROM EMP WHERE DEPTNO IN (SELECT DEPTNO FROM DEPT WHERE LOC = 'DALLAS');

SELECT * FROM DEPT;

SELECT ENAME, SAL, JOB FROM EMP WHERE SAL > ALL(SELECT SAL FROM EMP WHERE JOB = 'MANAGER'); 

SELECT * FROM EMP WHERE DEPTNO <> (SELECT DEPTNO FROM DEPT WHERE LOC = 'DALLAS') AND JOB = 'SALESMAN';

SELECT * FROM DEPT;


-------------- Final Term Class 3 -------------

SELECT * FROM EMP WHERE DEPTNO = (SELECT DEPTNO FROM EMP WHERE ENAME = 'SCOTT');

SELECT * FROM EMP WHERE SAL>ALL(SELECT SAL FROM EMP WHERE JOB = 'MANAGER');

SELECT * FROM EMP WHERE SAL>ANY(SELECT SAL FROM EMP WHERE JOB = 'MANAGER');

SELECT * FROM EMP WHERE SAL = (SELECT SAL FROM EMP WHERE ENAME = 'SMITH');

SELECT * FROM EMP WHERE SAL > (SELECT AVG(SAL) FROM EMP);

SELECT MIN(SAL) FROM EMP WHERE SAL > (SELECT MIN(SAL) FROM EMP); 

SELECT MIN(SAL) FROM EMP WHERE SAL > (SELECT MIN(SAL) FROM EMP WHERE SAL > (SELECT MIN(SAL) FROM EMP WHERE SAL > (SELECT MIN(SAL) FROM EMP))); 

SELECT DNAME, LOC FROM DEPT WHERE DEPTNO IN(SELECT DEPTNO FROM EMP WHERE MGR = (SELECT EMPNO FROM EMP WHERE ENAME = 'CLARK'));

SELECT EMPNO, JOB, SAL FROM EMP WHERE JOB = 'ANALYST' AND SAL > ANY(SELECT SAL FROM EMP WHERE JOB = 'SALESMAN');

SELECT * FROM EMP;

SELECT DISTINCT SAL FROM EMP ORDER BY SAL;

SELECT JOB, MIN(SAL) FROM EMP GROUP BY JOB HAVING MIN(SAL)>(SELECT MIN(SAL) FROM EMP WHERE JOB='SALESMAN');

---------------------------Final Term Class 3------------------------

SELECT * FROM SALGRADE;

SELECT * FROM EMP,DEPT;

--EQUI-JOINING
SELECT * FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO;
SELECT ENAME,JOB,DNAME,SAL,LOC FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO;
-- SELECT ENAME,JOB,DNAME,SAL,LOC,DEPTNO FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO; --column ambiguously defined
-- SOLVE BY USING TABLE PREFIX

SELECT EMP.ENAME, EMP.JOB,EMP.SAL,DEPT.DNAME,DEPT.LOC,DEPT.DEPTNO FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO; -- TABLE PREFIX

SELECT ENAME, JOB, SAL,DNAME, LOC FROM EMP E, DEPT D WHERE E.DEPTNO = D.DEPTNO; -- ANOTHER WAY(2)

SELECT E.ENAME,E.JOB,E.SAL,D.DNAME,D.LOC,D.DEPTNO FROM EMP E,DEPT D WHERE E.DEPTNO = D.DEPTNO; -- 3RD WAY
SELECT E.ENAME,E.JOB,E.SAL,D.DNAME,D.LOC,D.DEPTNO FROM EMP E,DEPT D WHERE E.DEPTNO = D.DEPTNO AND ENAME = 'KING'; -- OR CANNOT BE USED HERE(ULTA PALTA ASHE) 

--NON-EQUIJOINING
SELECT * FROM SALGRADE;
SELECT ENAME, JOB, SAL, GRADE, LOSAL, HISAL FROM EMP, SALGRADE;
SELECT ENAME, JOB, SAL, GRADE, LOSAL, HISAL FROM EMP, SALGRADE WHERE SAL BETWEEN LOSAL AND HISAL;
SELECT ENAME, JOB, SAL, GRADE, LOSAL, HISAL FROM EMP, SALGRADE WHERE SAL BETWEEN LOSAL AND HISAL AND GRADE = 3;

SELECT E.ENAME, E.JOB, D.DNAME, D.LOC FROM EMP E, DEPT D WHERE E.DEPTNO = D.DEPTNO AND D.LOC = 'DALLAS';


---------------------------Final Term Class 4------------------------
-- EMPLOYEE NAME WORKS FOR MANAGER NAME
-- BLAKE WORKS FOR KING

-- //SELF JOINING

SELECT WORKER.ENAME || ' WORKS FOR ' || MANAGER.ENAME "EMPLOYEE-MANAGER" FROM 
EMP WORKER, EMP MANAGER WHERE WORKER.MGR = MANAGER.EMPNO;

SELECT WORKER.ENAME || ' WORKS FOR ' || MANAGER.ENAME "EMPLOYEE-MANAGER" FROM 
EMP WORKER, EMP MANAGER WHERE WORKER.MGR = MANAGER.EMPNO AND MANAGER.ENAME = 'KING';

SELECT ENAME, EMP.DEPTNO, DNAME, DEPT.DEPTNO FROM EMP, DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO;

--OUTER JOINING
--1. LEFT OUTER JOINING
SELECT DNAME, DEPT.DEPTNO, NVL(ENAME,'NO EMPLOYEE') AS ENAME FROM DEPT LEFT OUTER JOIN EMP ON (DEPT.DEPTNO = EMP.DEPTNO);
-- SELECT DNAME, DEPT.DEPTNO, NVL(ENAME,'NO EMPLOYEE') AS ENAME FROM EMP LEFT OUTER JOIN DEPT ON (DEPT.DEPTNO = EMP.DEPTNO);
--2. RIGHT OUTER JOINING
SELECT DNAME, DEPT.DEPTNO, NVL(ENAME,'NO EMPLOYEE') AS ENAME FROM EMP RIGHT OUTER JOIN DEPT ON (DEPT.DEPTNO = EMP.DEPTNO);
--3. FULL OR COMPLETE OUTER JOINING
SELECT DNAME, DEPT.DEPTNO, NVL(ENAME,'NO EMPLOYEE') AS ENAME FROM EMP FULL OUTER JOIN DEPT ON (DEPT.DEPTNO = EMP.DEPTNO);

SELECT DNAME, DEPT.DEPTNO, ENAME FROM EMP, DEPT WHERE EMP.DEPTNO(+)=DEPT.DEPTNO; -- 
SELECT DNAME, DEPT.DEPTNO, ENAME FROM EMP, DEPT WHERE EMP.DEPTNO=DEPT.DEPTNO(+);
SELECT DNAME, DEPT.DEPTNO, ENAME FROM EMP, DEPT WHERE EMP.DEPTNO=DEPT.DEPTNO(+);

---- LAB 3 --

SELECT * FROM EMP;
SELECT * FROM DEPT;

SELECT ENAME,JOB,DNAME FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO AND ;

-- 1. Display all the managers & clerks who work in Accounts and Marketing departments. 
SELECT ENAME,JOB,DNAME FROM EMP,DEPT WHERE JOB IN('MANAGER','CLERK') AND EMP.DEPTNO = DEPT.DEPTNO AND DNAME IN('ACCOUNTING','MARKETING');

-- 2. Display all the salesmen who are not located at DALLAS.
SELECT ENAME,JOB,LOC FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO AND LOC = 'DALLAS' AND JOB <> 'SALESMAN';

-- 3. Select department name & location of all the employees working for CLARK.

SELECT WORKER.ENAME || ' IS WORKING FOR ' || MANAGER.ENAME "EMPLOYEE-MANAGER" FROM EMP WORKER,EMP MANAGER WHERE WORKER.MGR = MANAGER.EMPNO AND MANAGER.ENAME = 'CLARK';

-- 4. Select all the departmental information for all the managers

SELECT ENAME,JOB,DEPT.* FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO AND JOB = 'MANAGER';

-- 5. Select all the employees who work in DALLAS.
SELECT ENAME,JOB,LOC FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO AND LOC = 'DALLAS';

-- 6. Display all the departmental information for all the existing employees and if a department 
-- has no employees display it as “No employees”.

SELECT DNAME, DEPT.DEPTNO, NVL(ENAME,'NO EMPLOYEE') AS ENAME FROM DEPT LEFT OUTER JOIN EMP ON (DEPT.DEPTNO = EMP.DEPTNO);

-- 7. Get all the employees who work in the same departments as of SCOTT

SELECT * FROM EMP WHERE ENAME = 'SCOTT';
SELECT * FROM DEPT;

SELECT ENAME,DNAME FROM EMP,DEPT WHERE EMP.DEPTNO = DEPT.DEPTNO AND EMP.DEPTNO = (SELECT DEPTNO FROM EMP WHERE ENAME = 'SCOTT');

-- 8. Display all the employees who have joined before their managers
select ename,job,hiredate from emp where hiredate>'31-dec-1981';

SELECT EM.ENAME AS "EMP NAME", EM.HIREDATE AS "EMP HIREDATE", MG.ENAME AS "MGR NAME", MG.HIREDATE AS "MGR HIREDATE" FROM EMP EM,EMP MG WHERE EM.hiredate < MG.hiredate AND EM.MGR = MG.EMPNO;

SELECT EM.ENAME AS "EMP NAME", EM.SAL AS "EMP SALARY", MG.ENAME AS "MGR NAME", MG.SAL AS "MGR SALARY" FROM EMP EM,EMP MG WHERE EM.SAL > MG.SAL AND EM.MGR = MG.EMPNO;

SELECT E.ENAME,E.SAL,ESAME.ENAME,ESAME.SAL FROM EMP E, EMP ESAME WHERE E.SAL = ESAME.SAL AND E.EMPNO != ESAME.EMPNO;


-- practice

SELECT SAL FROM EMP WHERE SAL = 1250;

SELECT JOB, SAL FROM EMP WHERE SAL IN (SELECT MAX(SAL) FROM EMP GROUP BY JOB);


---------------------------class 5---------

CREATE VIEW ASIF AS SELECT EMPNO,JOB,ENAME FROM EMP WHERE DEPTNO = 20;
SELECT * FROM ASIF;
DELETE FROM ASIF WHERE EMPLOYEE_NAME = 'JONES';
DROP VIEW ASIF;

SELECT * FROM EMPVIEW50;
SELECT * FROM EMPVIEW50 WHERE JOB = 'CLERK';
DELETE FROM EMPVIEW50 WHERE ENAME = 'SMITH';
DROP VIEW EMPVIEW50;

SELECT MIN(SALARY),MAX(SALARY) FROM EMPVIEW50;

-- MODIFY VIEW
CREATE OR REPLACE VIEW EMPVIEW50 (EMPLOYEE_NAME, EMPLOYEE_ID, SALARY, DEPARTMENT_NUMBER) AS SELECT ENAME,EMPNO, SAL, DEPTNO FROM EMP WHERE DEPTNO = 20; 
CREATE OR REPLACE VIEW ASIF (EMPLOYEE_NAME, EMPLOYEE_ID, SALARY, DEPARTMENT_NUMBER) AS SELECT ENAME,EMPNO, SAL, DEPTNO FROM EMP WHERE DEPTNO = 20 WITH READ ONLY; 
UPDATE ASIF SET EMPLOYEE_NAME = 'ASIF' WHERE EMPLOYEE_NAME = 'SCOTT';

-- COLUMN ALIASES
CREATE VIEW EMPVIEW50 AS SELECT ENAME AS EMPLOYEE_NAME, EMPNO AS EMPLOYEE_ID, SAL AS SALARY, DEPTNO AS DEPARTMENT_NUMBER FROM EMP WHERE DEPTNO = 30;
-- without permission to delete
CREATE OR REPLACE VIEW EMPVIEW50 (EMPLOYEE_NAME, EMPLOYEE_ID, SALARY, DEPARTMENT_NUMBER) AS SELECT ENAME,EMPNO, SAL, DEPTNO FROM EMP WHERE DEPTNO = 20 WITH READ ONLY; 
-- DELETE FROM EMPVIEW50 WHERE EMPLOYEE_NAME = 'FORD'; -- CANNOT DELETE

-- COMPLEX VIEW
CREATE VIEW EMP_DEPT50(DEPARTMENT_NAME, MINIMUM_SAL, AVERAGE_SALARY, MAXIMUM_SALARY) AS SELECT D.DNAME, MIN(E.SAL), AVG(E.SAL), MAX(E.SAL) FROM EMP E, DEPT D WHERE E.DEPTNO=D.DEPTNO GROUP BY DNAME;
SELECT * FROM EMP_DEPT50;

DELETE FROM EMP_DEPT50 WHERE MINIMUM_SAL = 1100;





-------------------------- other files practice ----------------------------

SELECT ENAME,LENGTH(ENAME) FROM EMP; -- SINGLE ROW
SELECT * FROM EMP;

SELECT ENAME,SAL FROM EMP WHERE SAL < 2800; -- SINGLE ROW QUERY
SELECT MAX(SAL) FROM EMP; -- MULTIROW

SELECT AVG(SAL) FROM EMP;
SELECT SAL FROM EMP WHERE DEPTNO = 20;

--- normal : multi row return = single row query
--- normal : single row return = multi row query

--- subquery : single row return = single
--- subquery : multi row return = multi

SELECT ENAME,SAL,DEPTNO FROM EMP WHERE SAL > (SELECT AVG(SAL) FROM EMP); -- SINGLE ROW
SELECT ENAME,SAL,DEPTNO FROM EMP WHERE SAL IN (SELECT SAL FROM EMP WHERE DEPTNO = 20); -- MULTI ROW

SELECT * FROM EMP WHERE DEPTNO = 20;

CREATE VIEW SHAMIM AS SELECT ENAME,SAL,DEPTNO FROM EMP WHERE DEPTNO = 20;
SELECT * FROM SHAMIM;

UPDATE SHAMIM SET ENAME = 'SHAMIM' WHERE ENAME = 'XYU';

CREATE OR REPLACE VIEW SHAMIM AS SELECT ENAME,SAL,DEPTNO FROM EMP WHERE DEPTNO = 20 WITH CHECK OPTION;

UPDATE VIEW SHAMIM AS SELECT EMPNO,SAL,ENAME FROM EMP WHERE DEPTNO = 20;


select * from dept;
select * from emp;

DESC EMP;

----- last class --------

-- //CREATE TABLE
CREATE TABLE STUDENTINFO(STUDENT_ID NUMBER(3) CONSTRAINT PK_STUDENT PRIMARY KEY, STUDENT_NAME VARCHAR2(10));

-- //INSERT ONE ROW IN THE TABLE
INSERT INTO STUDENTINFO VALUES (10, 'MIMMY');

-- //DISPLAY TABLE
SELECT * FROM STUDENTINFO;

-- //INSERT IN THE TABLE WITH SAME EXISTING STUDENT_ID. STUDENT_ID IS PRIMARY KEY THEREFORE, SHOULD BE UNIQUE.
INSERT INTO STUDENTINFO VALUES (10, 'TIMMY')//ERROR

-- //TO SOLVE THE ISSUE AND REDUCE WORKLOAD, CREATE A SEQUENCE
CREATE SEQUENCE STUDENTINFO_SEQ
    MINVALUE 10
    MAXVALUE 100
    START WITH 20
    NOCACHE
    NOCYCLE
    INCREMENT BY 10;

-- //CONNECT THE SEQUENCE WITH THE TABLE AND INSERT ONE ROW. AS STUDENT_ID 10 IS ALREADY PRESENT IN THE TABLE. THEREFORE, THE ID WILL BE STARTED FROM 20.
INSERT INTO STUDENTINFO VALUES (STUDENTINFO_SEQ.NEXTVAL, 'TIMMY');

SELECT * FROM STUDENTINFO;

INSERT INTO STUDENTINFO VALUES (STUDENTINFO_SEQ.NEXTVAL, 'MINA');

SELECT * FROM STUDENTINFO;

-- //MODIFY SEQUENCE
ALTER SEQUENCE STUDENTINFO_SEQ
    MAXVALUE 200
    NOCACHE
    NOCYCLE
    INCREMENT BY 5;

INSERT INTO STUDENTINFO VALUES (STUDENTINFO_SEQ.NEXTVAL, 'RAJU');
SELECT * FROM STUDENTINFO;

INSERT INTO STUDENTINFO VALUES (STUDENTINFO_SEQ.NEXTVAL, 'MITHU');
SELECT * FROM STUDENTINFO;

-- //DISTROY SEQUENCE
DROP SEQUENCE STUDENTINFO_SEQ;
-- //DISTROY TABLE
DROP TABLE STUDENTINFO;


-- //SEQUENCE FOR AN EMPTY TABLE(WITHOUT ANY ROW)
-- //CREATE TABLE
CREATE TABLE STUDENTINFO(STUDENT_ID NUMBER(3) CONSTRAINT PK_STUDENT PRIMARY KEY, STUDENT_NAME VARCHAR2(10));

-- //CREATE SEQUENCE
CREATE SEQUENCE STUDENTINFO_SEQ
MINVALUE 10
MAXVALUE 100
START WITH 10
NOCACHE
NOCYCLE
INCREMENT BY 10;

-- //ROW INSERTION
INSERT INTO STUDENTINFO VALUES (STUDENTINFO_SEQ.NEXTVAL, 'MITHU');
SELECT * FROM STUDENTINFO;

desc payment;
select * from payment;
select * from emply,payment;

select * from dept;

select * from emp;

SELECT * FROM SALGRADE;