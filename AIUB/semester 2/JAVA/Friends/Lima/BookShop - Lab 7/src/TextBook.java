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
}
