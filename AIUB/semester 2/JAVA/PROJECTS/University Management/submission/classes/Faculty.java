package classes;
import java.lang.*;
import java.util.*;
import java.io.*;
import interfaces.*;

public class Faculty
{
	private	String name ;
    private String fId ;
    private double salary ;
	
	public void setName(String name)
	{
		this.name = name ;
	}
    public void setFId (String fId)
	{
		this.fId = fId ;
	}
    public void setSalary(double salary)
	{
		this.salary = salary ;
	}
    public String getName( )
	{
		return name ;
	}
    public String getFId( )
	{
		return fId ;
	}
    public double getSalary( )
	{
	    return salary ;
	}
}