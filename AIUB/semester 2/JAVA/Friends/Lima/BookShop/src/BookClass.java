import java.sql.SQLOutput;

class BookClass {
    protected String bookTitle;
    protected String authorName;
    protected String isbn;
    protected double price;
    protected int availableQuantity;
    protected int amount;

    public BookClass() {}

    public BookClass(String bookTitle, String authorName, String isbn, double price, int availableQuantity) {
        this.bookTitle = bookTitle;
        this.authorName = authorName;
        this.isbn = isbn;
        this.price =  price;
        this.availableQuantity = availableQuantity;
    }

    public void setbookTitle(String title) {
        bookTitle = title;
    }

    public void setaurtherName(String author) {
        authorName = author;
    }

    public void setisbn(String ib) {
        isbn = ib;
    }

    public void setprice(double pr) {
        price = pr;
    }

    public void setavailableQuantity(int quantity) {
        availableQuantity = quantity;
    }

    public String getbookTitle() {
        return bookTitle;
    }

    public String getauthorName() {
        return authorName;
    }

    public String getisbn() {
        return isbn;
    }

    public double getprice() {
        return price;
    }

    public int getavailableQuantity() {
        return availableQuantity;
    }

    public void addQuantity(int amount){
        availableQuantity += amount;
    }
    public void sellQuantity(int amount){
        availableQuantity -= amount;
    }


    public void ShowInfo() {
        System.out.println(" Book Title : " + getbookTitle());
        System.out.println(" Author Name : " + getauthorName());
        System.out.println(" Book isbn No : " + getisbn());
        System.out.println(" Price of the Book : " + getprice());
        System.out.println(" Quantity of the Book : " + getavailableQuantity());
    }
}