package classes;
import java.lang.*;
import java.util.*;
import java.io.*;
import interfaces.*;

public class Student implements CourseOperation
{
	private String name ;
    private String sid ;
    private Course courses[] = new Course [100] ;
	
    public void setName(String name)
	{
		this.name = name ;
	}

    public void setSid(String sid)
	{
		this.sid = sid ;
	}
    public String getName( )
	{
		return name ;
	}
    public String getSid( )
	{
		return sid ;
	}
	
	//CourseOperation
	
	int count = 0 ;
	public void insertCourse(Course c)
	{
		for (int i = 0 ; i < courses.length ; i++)
		{
			if(courses[i] == null)
			{
				courses[i] = c ;
				count++ ;
				break ;
			}			
		}
		
		if(count == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println ("Failed To Insert Course Data") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
		else
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println ("Course Data Inserted Successfully") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
	}
	
	public void removeCourse(Course c) 
	{
		int i ;
        for (i = 0 ; i < count ; i++)
		{
			if (courses[i].getCourseNumber() == c.getCourseNumber())	 
		    break;

		}
	   
	    if (i == count)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
            System.out.println("No match!!!") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
	
		else 
		{
			for (int j = i; j < count ; j++) 
			{
				courses[j] = courses[j + 1] ;
			}
			count-- ; 
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
            System.out.println("Course Has Been Deleted !") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
	
		 
        }
	
    }
	
	public Course getCourse(int CourseNumber)
	{
		int i = 0 ;
		
		Course c = null ;
		
		if(count == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println("No Course Data Available") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
		else
		{
			for (i = 0 ; i < count ; i++)
			{
				if(courses[i] != null)
				{
					if(courses[i].getCourseNumber() == CourseNumber)
					{
						c = courses[i] ;
						break ;
					}
				}
			}
		 
		}
		return c ;
	}
	
	
	public void showAllCourse()
	{
		
		if(count == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		    System.out.println("No Data!") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;

		}
		else
		{
			for(int i = 0 ; i < count ; i++)
			{
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			    System.out.println("Details of Course: ") ;
				courses[i].showInfo() ;
			    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		    }
			
		}
	}

}