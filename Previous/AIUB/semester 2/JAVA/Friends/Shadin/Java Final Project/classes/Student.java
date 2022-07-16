package  classes;
import java.lang.*;
public  class Student 
{

	
	private String sId;
	private String name;
	private float lastSemisterCGPA;
    private int  totalcompletedcredit;
	public void setSId(String sId)
	{
		this.sId = sId;
	}
	public void setName(String name)
	{
		this.name = name;
	}
	public String getSId()
	{
		return sId;
    } 
	public String getName()
	{
		return name;
	}
	
	public float getLastSemisterCGPA() {
		return lastSemisterCGPA;
	}
	public  void setLastSemisterCGPA(float lastSemisterCGPA) {
		this.lastSemisterCGPA = lastSemisterCGPA;
	}
	
	public int getTotalcompletedcredit() {
		return totalcompletedcredit;
	}
	public void setTotalcompletedcredit(int totalcompletedcredit) {
		this.totalcompletedcredit = totalcompletedcredit;
	}
	public String checkstudentstatus()
	{
		if(getLastSemisterCGPA()>=2.50)
		{
			return "Regular";
		}
		else{
			return"Probation";
		}
	}
	public boolean graduationeligibilitycheck()
	{
		if(getTotalcompletedcredit()>=148&&getLastSemisterCGPA()>=2.50)
		{
			return true;
		}
		else{
			return false;
		}
	}
	
	
	
	
	}
