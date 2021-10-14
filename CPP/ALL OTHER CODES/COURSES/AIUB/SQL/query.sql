select * from emp;

select ename,job,sal,deptno from emp where sal>=2800 and sal<=5000;
select ename,job,sal,deptno from emp where sal between 2800 and 5000;

select ename,job,sal,deptno from emp where sal>2800 and sal<=5000;
select ename,job,sal,deptno from emp where sal between 2801 and 5000;

select dname,loc,deptno from dept where deptno=10 or deptno=30;
select dname,loc deptno from dept where deptno in (10,30);

select ename,job from emp where job in('MANAGER','CLERK');
select ename,job from emp where job='manager' or job='clerk';

select ename from emp where ename like 'A%';
select ename from emp where ename like '_D%';
select ename from emp where ename like '__R%';
select ename from emp where ename like '__R_';
select ename from emp where ename like '%R';

select ename,comm from emp where comm is NULL;
select ename,comm from emp where comm is not NULL;

select ename,comm from emp where ename not like 'A%'

select max(sal) from emp;
select min(sal) from emp;
select avg(sal) from emp;
select round(avg(sal)) from emp;

select count(*) from emp 
select count(*) from emp where sal>2800
select count(sal) from emp where sal>2800
select sal from emp where sal>2800;

select ename,sal from emp where sal=(select max(sal) from emp) 
select ename, deptno from emp order by ename
select ename, deptno from emp order by deptno desc

select ename, sal from emp order by sal desc
select ename, sal from emp order by sal asc
select ename, sal from emp order by sal

select ename,job,hiredate from emp where hiredate>'31-dec-1981';
select ename,HIREDATE from emp where HIREDATE like '%81';


-- class 7
SELECT ENAME, SAL FROM EMP ORDER BY ENAME DESC;

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
SELECT JOB, MIN(SAL) FROM EMP GROUP BY JOB ORDER BY MIN(SAL) DESC;

SELECT MGR, SAL, ENAME FROM EMP WHERE MGR=7698;


SELECT DEPTNO, JOB, AVG(SAL) FROM EMP GROUP BY DEPTNO, JOB;
SELECT JOB, DEPTNO, SAL FROM EMP WHERE DEPTNO=20 AND JOB='MANAGER';
SELECT JOB, DEPTNO, SAL FROM EMP WHERE DEPTNO=20 AND JOB='CLERK';
SELECT DEPTNO, JOB, MAX(SAL) FROM EMP GROUP BY DEPTNO, JOB ORDER BY DEPTNO,JOB;
SELECT DEPTNO, JOB, MAX(SAL) FROM EMP GROUP BY DEPTNO, JOB ORDER BY DEPTNO DESC,JOB DESC;
SELECT DEPTNO, JOB, MAX(SAL) FROM EMP GROUP BY DEPTNO, JOB ORDER BY DEPTNO DESC,JOB ASC;

-- 1. Write a SQL query to print details of the Employees whose Ename contains ‘a’.
select * from emp where ename like '%A%';

-- Write a SQL query to print details of the Employees whose Ename ends with ‘N’
2. 
select * from emp where ename like '%N';
3.
select * from emp where ename like '_____N';
4.
-- Write a SQL query to print details of the Employees who have joined in NOV’1981.
select * from emp where HIREDATE like '%81';
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
11. SELECT * FROM EMP WHERE JOB = ANY('MANAGER','ANALYST');
-- 12. Display Employees name, salary, commission whose salary is greater than commission
12. SELECT ENAME AS "NAME", SAL AS "SALARY", COMM AS "COMMISION" FROM EMP WHERE SAL>COMM;

---- Class 8
SELECT COMM+SAL FROM EMP;
SELECT COMM FROM EMP;
SELECT NVL(COMM,5) FROM EMP;
SELECT SUM(COMM) FROM EMP;
SELECT SUM(NVL(COMM,2)) FROM EMP;
SELECT COMM, NVL(COMM,2) FROM EMP;
SELECT SAL+NVL(COMM,2) FROM EMP;

-- SELECT MAX(SAL) FROM EMP WHERE MAX(SAL)>2900; -- GROUP FUNCTION NOT ALLOWED
SELECT DEPTNO, MAX(SAL) FROM EMP GROUP BY DEPTNO;
-- SELECT DEPTNO, MAX(SAL) FROM EMP WHERE MAX(SAL)>2850 GROUP BY DEPTNO;
SELECT DEPTNO, MAX(SAL) FROM EMP GROUP BY DEPTNO HAVING MAX(SAL)>2850;

SELECT JOB,SUM(SAL) FROM EMP GROUP BY JOB ORDER BY SUM(SAL);

SELECT JOB,SUM(SAL) FROM EMP 
WHERE JOB NOT LIKE 'S%' 
HAVING SUM(SAL)>4500 
GROUP BY JOB ORDER BY SUM(SAL);

-------------------------------------------------

CREATE TABLE STUDENT_INFO(
    ID NUMBER(3) 
    CONSTRAINT PK_STDINFO PRIMARY KEY,
    NAME VARCHAR2(14),
    CGPA NUMBER(3,2)
);

DESCRIBE STUDENT_INFO;

DROP TABLE STUDENT_INFO;

INSERT INTO STUDENT_INFO VALUES(
    -- '100','AMINUL',3.54
    -- '110','ASIF',3.88
    '120','TONMOY',2.47
);

ALTER TABLE STUDENT_INFO ADD(
    PROBATION VARCHAR2(5)
);

UPDATE STUDENT_INFO SET PROBATION='YES'
WHERE NAME='TONMOY' OR CGPA<2.50;

RENAME STUDENT_INFO TO STUDENTINFO;

-- SELECT * FROM STUDENT_INFO;

ALTER TABLE STUDENTINFO RENAME COLUMN NAME TO SNAME;

DELETE FROM STUDENTINFO WHERE ID=110;

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
