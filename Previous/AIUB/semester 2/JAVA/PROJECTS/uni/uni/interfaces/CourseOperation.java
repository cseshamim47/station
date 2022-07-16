package interfaces;
import java.lang.*;
import java.util.*;
import java.io.*;
import classes.*;

public interface CourseOperation
{
	
void insertCourse(Course c) ;
void removeCourse(Course c) ;
Course getCourse(int CourseNumber) ;
void showAllCourse( ) ;

}