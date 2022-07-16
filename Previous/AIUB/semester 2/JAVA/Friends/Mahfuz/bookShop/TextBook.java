public class TextBook extends Book{
    int standard;
    TextBook(){System.out.println("Textbook Empty constructor");}
    TextBook(String isbn, String bookTitle, String authorName, double price, int availableQuantity,int standard){
        super(isbn,bookTitle,authorName,price,availableQuantity);
        this.standard = standard;
    }
    public void setStandard(int standard) {
        this.standard = standard;
    }
    public int getStandard() {
        return standard;
    }

    public void showDetails()
    {

        System.out.println("Isbn:"+getIsbn());

        System.out.println("Book Title:"+getBookTitle());

        System.out.println("Author Name:"+getAuthorName());

        System.out.println("price:"+getPrice());

        System.out.println("availableQuantity:"+getAvailableQuantity());

        System.out.println("Standard : " + getStandard());


    }
}
