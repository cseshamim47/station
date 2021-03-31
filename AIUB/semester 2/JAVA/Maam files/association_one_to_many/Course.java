import java.lang.*;
public class Course
{
	
	private String cname;
	private String cid;
		
	public Course()
	{
		
	}
	
	public Course(String cname,String cid)
	{
		this.cname=cname;
		this.cid=cid;
	}
	
	public void setCname(String cname)
	{
		this.cname=cname;
	}
	public void setCid(String cid)
	{
		this.cid=cid;
	}
	
	public String getCname()
	{
		return cname;
	}
	public String getCid()
	{
		return cid;
	}
	
	
}