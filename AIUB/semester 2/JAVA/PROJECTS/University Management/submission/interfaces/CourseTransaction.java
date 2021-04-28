package interfaces;
import java.lang.*;
import java.util.*;
import java.io.*;
import classes.*;

public interface CourseTransaction 
{
	
   void adding(int quantity, String id) ;
   void dropping(int quantity, String id) ;

}