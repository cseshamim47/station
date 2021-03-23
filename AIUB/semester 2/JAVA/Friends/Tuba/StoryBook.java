import java.lang.*;

public class StoryBook extends Book
{
	String category;


	StoryBook()
	{
		System.out.println("Inside StoryBook Default Constructor");
	}
	StoryBook(String isbn, String bookTitle, String authorName, double price, int availableQuantity,String category)
	{
		super(isbn,bookTitle,authorName,price,availableQuantity);
		this.category=category;
		
		System.out.println("Inside StoryBook Paramaterized onstructor");
	}
	
	public void setCategory(String category)
	{
		this.category=category;
	}
	public String getCategory()
	{
		return category;
	}
	
	public void showDetails()
	{
		System.out.println("The Book No. is       :"+getIsbn());
		System.out.println("The BookTitle is      :"+getBookTitle());
		System.out.println("The Name of Author is :"+getAuthorName());
		System.out.println("The Price is          :"+getPrice());
		System.out.println("The Avalilabe Q. is   :"+getAvailableQuantity());
		System.out.println("The Category is       : "+ getCategory());
	}
}