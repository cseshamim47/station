import java.lang.*;

public class Book

{

    private String isbn;

    private String bookTitle;

    private String authorName;

    private double price;

    private int availableQuantity;

    public Book()

    {

        System.out.println("");

    }

    public Book(String isbn,String bookTitle,String authorName,double price,int availableQuantity)

    {

        this.isbn=isbn;

        this.bookTitle=bookTitle;

        this.authorName=authorName;

        this.price=price;

        this.availableQuantity=availableQuantity;

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

    public void setAvailableQuantity(int availableQuantity)

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

    public void showDetails()

    {

        System.out.println("Isbn:"+isbn);

        System.out.println("Book Title:"+bookTitle);

        System.out.println("Author Name:"+authorName);

        System.out.println("price:"+price);

        System.out.println("availableQuantity:"+availableQuantity);

    }

    public void addQuantity(int amount)

    {

        if(amount > 0){
            availableQuantity=availableQuantity+amount;
        }else System.out.println("Cannot add 0 or less books");

    }

    public void sellQuantity(int amount)

    {

        if(availableQuantity - amount >= 0 && amount > 0){
            availableQuantity=availableQuantity-amount;
        }else System.out.println("Deducting quatity is less than 0 or Available quantity is less than deducting amount");

    }


}