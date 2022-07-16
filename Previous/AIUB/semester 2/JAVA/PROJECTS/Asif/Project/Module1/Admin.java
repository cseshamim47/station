	package Module1;
import java . lang. *;

public class Admin extends Person
{
	 String Adminname;
	 String Adminid;
	 Book Books[];
	 
	 public Admin()
	 {
		 
	 }
	 
	 public Admin(String Adminname,String Adminid) 
	 {
		 super(Adminname,Adminid);
	 
	 }
	  
	 public void addBook(Book bo[])
	 {
         Books = bo;
     }
	  public void getBook()
	 {   
         for(int i=0;i<Books.length;i++)
		 {
			 if(Books[i] != null)
			 {
		       System.out.println("Added Book Name is: "+Books[i].getBookName());
		       System.out.println("Added Book Id is: "+Books[i].getBookId());
			 }
		 }
	 }
}