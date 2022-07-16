import java.lang.*;

class Book
{
	String isbn;
	String bookTitle;
	String authorName;
	double price;
	int availableQuantity;
	
	Book()
	{
		System.out.println("Inside Book Default Constructor");
	}
	Book(String isbn, String bookTitle, String authorName, double price, int availableQuantity)
	{
		System.out.println("Inside Book Paramaterized onstructor");
		this.isbn = isbn;
		this.bookTitle = bookTitle;
		this.authorName = authorName;
		this.price = price;
		this.availableQuantity = availableQuantity;
	}	
	
	
	public void setIsbn(String isbn)
	{
		this.isbn=isbn;
	}
	
	public void setBookTitle(String bookTitle)
	{
		this.bookTitle=bookTitle;
	}
	
	public void setAuthorName(String authorName)
	{
		this.authorName=authorName;
	}
	
	public void setPrice(double price)
	{
		this.price=price;
	}
	
	public void setAvaiableQuantity(int availableQuantity)
	{
		this.availableQuantity=availableQuantity;
	}
	
	
	
	public String getIsbn()
	{
		return isbn;
	}
	public String getBookTitle()
	{
		return bookTitle;
		
	}
	public String getAuthorName()
	{
		return authorName;
	}
	public double getPrice()
	{
		return price;
	}
	public int getAvailableQuantity()
	{
		return availableQuantity;
	}
	
	
	public void addQuantity(int amount)
	{
		availableQuantity = (availableQuantity + amount);
		System.out.println("Add Q: "+availableQuantity);
	}
	public void sellQuantity(int amount)
	{
		availableQuantity = (availableQuantity - amount);
		System.out.println("Sell Q: "+availableQuantity);
	}


	
	public void showDetails()
	{

		System.out.println("The Book No. is       :"+getIsbn());
		System.out.println("The BookTitle is      :"+getBookTitle());
		System.out.println("The Name of Author is :"+getAuthorName());
		System.out.println("The Price is          :"+getPrice());
		System.out.println("The Avalilabe Q. is   :"+getAvailableQuantity());

	}
}

