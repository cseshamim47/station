package interfaces;
import java.lang.*;
import java.util.*;
import java.io.*;
import classes.*;

public interface FacultyOperation 
{
	
//void setFaculty(Faculty e) ;
public Faculty getFaculty(String fId) ;
void insertFaculty(Faculty e) ;
void removeFaculty(Faculty e) ;
void showAllFaculty() ;

}