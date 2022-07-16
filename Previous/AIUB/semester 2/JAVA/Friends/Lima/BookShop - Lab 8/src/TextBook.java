public class TextBook extends Book{
    protected int standard;
    TextBook(){}
    TextBook(String isbn, String bookTitle, String authorName, double price, int availableQuantity,int standard){
        super(bookTitle,authorName,isbn,price,availableQuantity);
        this.standard = standard;
    }

    public void setStandard(int standard){
        this.standard = standard;
    }
    public int getStandard(){return standard;}

    public void showDetails(){
        System.out.println(" Book Title : " + getBookTitle());
        System.out.println(" Author Name : " + getAuthorName());
        System.out.println(" Book isbn No : " + getIsbn());
        System.out.println(" Price of the Book : " + getPrice());
        System.out.println(" Quantity of the Book : " + getAvailableQuantity());

    }
}
