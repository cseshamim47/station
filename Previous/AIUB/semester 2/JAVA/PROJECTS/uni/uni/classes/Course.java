package classes;
import java.lang.*;
import java.util.*;
import java.io.*;
import interfaces.*;

public class Course implements CourseTransaction
{
	private int courseNumber ;
	private int credit ;
	
	public void setCourseNumber(int courseNumber)
	{
		this.courseNumber = courseNumber ;
	}
	
    public void setCredit(int credit)
	{
		this.credit = credit ; 
	}
    public int getCourseNumber( )
	{
		return courseNumber ;
	}
	
    public int getCredit( )
	{
		return credit ;
	}
    public void showInfo( )
	{
		System.out.println(" Total Number Of Courses : " + getCourseNumber() ) ;
	    System.out.println(" Totat Number Of Credits : " + getCredit() ) ;
	}
	
	//CourseTransaction
	
	File file ; 
	private FileWriter writer ;
	
	public void writeInFile(String s)
	{
		
		try
		{
			file = new File("History.txt") ; 
			
			file.createNewFile() ;
			
			writer = new FileWriter(file, true) ; 
							
			writer.write(s+"\r\n") ; 
			writer.flush() ;
			writer.close() ;		
		
		}
		catch(IOException ioe)
		{
			ioe.printStackTrace() ;

		}
	}
	
	public void adding(int quantity,String id) 
	{
		if(quantity > 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			credit = credit + quantity ;
			System.out.println("Number Of Credits Added: " +credit) ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			Course c = new Course();
			c.writeInFile("Student of ID:"+id+" Added " +quantity+" credits.") ;
		}
		else
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println("Invalid Amount Of Credit") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
	}
	
	public void dropping(int quantity, String id) 
	{
		if(quantity > 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			credit = quantity ;
			System.out.println("Number Of Credits Dropped: " +credit) ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			Course c = new Course();
			c.writeInFile("Student of ID:"+id+" Dropped " +quantity+" credits.") ;
			
		}
		else
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println("Invalid Amount Of Credits") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
	}
}