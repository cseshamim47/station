public abstract class Book implements BookOperations{
    protected String bookTitle;
    protected String authorName;
    protected String isbn;
    protected double price;
    protected int availableQuantity;

    Book(){}
    Book(String isbn, String bookTitle, String authorName, double price, int availableQuantity){
        this.isbn = isbn;
        this.bookTitle = bookTitle;
        this.authorName = authorName;
        this.price = price;
        this.availableQuantity = availableQuantity;
    }

    public void setIsbn(String isbn) {
        this.isbn = isbn;
    }

    public void setBookTitle(String bookTitle) {
        this.bookTitle = bookTitle;
    }

    public void setAuthorName(String authorName) {
        this.authorName = authorName;
    }

    public void setPrice(double price) {
        this.price = price;
    }

    public void setAvailableQuantity(int availableQuantity) {
        this.availableQuantity = availableQuantity;
    }

    public String getIsbn() {
        return isbn;
    }

    public String getBookTitle() {
        return bookTitle;
    }

    public String getAuthorName() {
        return authorName;
    }

    public double getPrice() {
        return price;
    }

    public int getAvailableQuantity() {
        return availableQuantity;
    }

    public void addQuantity(int amount){
        availableQuantity += amount;
    }
    public void sellQuantity(int amount){
        availableQuantity -= amount;
    }


    public abstract void showDetails();

    public void ShowInfo() {
        System.out.println(" Book Title : " + getBookTitle());
        System.out.println(" Author Name : " + getAuthorName());
        System.out.println(" Book isbn No : " + getIsbn());
        System.out.println(" Price of the Book : " + getPrice());
        System.out.println(" Quantity of the Book : " + getAvailableQuantity());
    }
}
