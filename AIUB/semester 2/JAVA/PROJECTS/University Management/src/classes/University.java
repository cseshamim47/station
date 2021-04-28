package classes;
import java.lang.*;
import java.util.*;
import java.io.*;
import interfaces.*;

public class University implements FacultyOperation,StudentOperation
{
	private Student student[] = new Student [100] ;
    private Faculty faculties[] = new Faculty [100]  ;
	
	//FacultyOperation
	
	public void setFaculty(Faculty e)
	{
		
	}
	
	int count1 = 0 ;
	public void insertFaculty(Faculty e)
	{
		
		
		for (int i = 0 ; i < faculties.length ; i++)
		{
			if(faculties[i] == null)
			{
				faculties[i] = e ;
				count1++ ;
				break ;
			}			
		}
		
		if(count1 == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println ("Failed To Insert Faculty Data") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
		else
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println ("Faculty Data Inserted Successfully") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
	}
	
	public void removeFaculty(Faculty e)
	{
		int i ;
        for (i = 0 ; i < count1 ; i++)
		{
			if (faculties[i].getFId() == e.getFId())	 
		    break;

		}
	   
	    if (i == count1)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
            System.out.println("No match!!!") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
	
		else 
		{
			for (int j = i; j < count1 ; j++) 
			{
				faculties[j] = faculties[j + 1] ;
			}
			count1-- ; 
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
            System.out.println("Faculty Data Has Been Deleted !") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
	
		 
        }
	
	}
	
	
	public Faculty getFaculty (String fId)
	{
		int i = 0 ;
		
		Faculty f = null;
		
		if(count1 == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println("No Faculty Data Available") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
		
		else
		{
			for (i = 0 ; i < count1 ; i++)
			{
				if(faculties[i] != null)
				{
					if(faculties[i].getFId().equals(fId))
					{
						f = faculties[i] ;
					    break ;
					}
				}
			}
		}	
	    return f ;
	}
	
	
	public void showAllFaculty()
	{
		if(count1 == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		    System.out.println("No Data!") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;

		}
		else
		{
			for(int i = 0 ; i < count1 ; i++)
			{
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			    System.out.println("Details of Faculty "+(i+1)+":") ;
				System.out.println("Faculty Name:"+faculties[i].getName()) ;
		        System.out.println("Faculty ID :"+faculties[i].getFId()) ;
		        System.out.println("Salary:"+faculties[i].getSalary()) ;
			    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		    }
			
		}
	}
	
	
	
	
	
	
	//StudentOperation
	
	public void setStudent (Student s)
	{
		
	}
	
	
	
	int count2 = 0 ;
	public void insertStudent(Student s)
	{
		for (int i = 0 ; i < student.length ; i++)
		{
			if(student[i] == null)
			{
				student[i] = s ;
				count2++ ;
				break ;
			}			
		}
		
		if(count2 == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println ("Failed To Insert Student Data") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
		else
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println ("Student Data Inserted Successfully") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
	}
	
	public void removeStudent(Student s)
	{
		int i ;
        for (i = 0 ; i < count2 ; i++)
		{
			if (student[i].getSid() == s.getSid())	 
		    break;

		}
	   
	    if (i == count2)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
            System.out.println("No match!!!") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
	
		else 
		{
			for (int j = i; j < count2 ; j++) 
			{
				student[j] = student[j + 1] ;
			}
			count2-- ; 
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
            System.out.println("Student Data has been Deleted !") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
	
		 
        }
	
	}
	
	
	
	public Student getStudent (String sid)
	{
		int i = 0 ;
		
		Student s = null ;
		
		if(count2 == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			System.out.println("No Student Data Available") ;
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		}
		else
		{
			for (i = 0 ; i < count2 ; i++)
			{
				if(student[i] != null)
				{
					if(student[i].getSid().equals(sid))
					{
						s = student[i] ;
						break ;
					}
				}
			}
		 
		}
		return s ;
	}
	
	public void showAllStudents()
	{
		if(count2 == 0)
		{
			System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		    System.out.println("No Data!") ;
		    System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;

		}
		else
		{
			for(int i = 0 ; i < count2 ; i++)
			{
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
			    System.out.println("Details of Student "+(i+1)+":") ;
				System.out.println("Student Name:"+student[i].getName()) ;
		        System.out.println("Student ID :"+student[i].getSid()) ;
				student[i].showAllCourse() ;
				System.out.println("-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-*-") ;
		    }
			
		}
	}
}