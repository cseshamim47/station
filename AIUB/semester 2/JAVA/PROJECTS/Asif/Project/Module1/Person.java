package Module1;
import java.lang. *;
public class Person
{
	 String Name;
	 String Id;
	 
	 public Person()
	 {
		 
	 }
	 
	 public Person(String Name,String Id)
	 {
		 this.Name=Name;
		 this.Id=Id;
	 }
	 public void setName(String Name)
	 {
		 this.Name=Name;
	 }
	 public String getName()
	 {
		 return Name;
	 }
	 public void setId(String id)
	 {
		 this.Id=Id;
	 }
	 public String getId()
	 {
		 return Id;
	 }
}