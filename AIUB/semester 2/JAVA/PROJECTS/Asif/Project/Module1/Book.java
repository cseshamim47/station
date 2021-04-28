package Module1;
import java . lang. *;
public class Book
{
	 String Bookname;
	 String Bookid;
	
	 public Book()
	 {

	 }
	 public Book(String Bookname,String Bookid)
	 {
		 this.Bookname=Bookname;
		 this.Bookid=Bookid;
		 
	 }
	 
	 public void setBookName(String Bookname)
	 {
		 this.Bookname=Bookname;
	 }
	 public String getBookName()
	 {
		 return Bookname;
	 }
	 public void setBookId(String Bookid)
	 {
		 this.Bookid=Bookid;
	 }
	 public String getBookId()
	 {
		 return Bookid;
	 } 	 
	 
	
}