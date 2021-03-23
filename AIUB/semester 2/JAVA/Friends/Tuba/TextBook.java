import java.lang.*;

public class TextBook extends Book
{
	int standard;

	TextBook()
	{
		System.out.println("Inside TextBook Default Constructor");
	}
	TextBook(String isbn, String bookTitle, String authorName, double price, int availableQuantity,int standard)
	{
		super(isbn,bookTitle,authorName,price,availableQuantity);
		this.standard= standard;
		
		System.out.println("Inside TextBook Paramaterized onstructor");
	}
	
	public void setStandard(int standard)
	{
		this.standard=standard;
	}
 
    public int getStandard() 
	{
		return standard;
	}
	
	public void showDetails()
	{
		System.out.println("The Book No. is       :"+getIsbn());
		System.out.println("The BookTitle is      :"+getBookTitle());
		System.out.println("The Name of Author is :"+getAuthorName());
		System.out.println("The Price is          :"+getPrice());
		System.out.println("The Avalilabe Q. is   :"+getAvailableQuantity());
		System.out.println("Standard is           : "+ getStandard());
	}
}