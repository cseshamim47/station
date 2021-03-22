public class TextBook extends BookClass{
    protected int standard;
    TextBook(){}
    TextBook(String bookTitle, String authorName, String isbn, double price, int availableQuantity,int standard){
        super(bookTitle,authorName,isbn,price,availableQuantity);
        this.standard = standard;
    }

    public void setStandard(int standard){
        this.standard = standard;
    }
    public int getStandard(){return standard;}
}
