package interfaces;
import java.lang.*;
import java.util.*;
import java.io.*;
import classes.*;


public interface StudentOperation
{
	
//void setStudent(Student s) ;
public Student getStudent(String sid) ;
void insertStudent(Student s) ;
void removeStudent(Student s) ;
void showAllStudents() ;

}	