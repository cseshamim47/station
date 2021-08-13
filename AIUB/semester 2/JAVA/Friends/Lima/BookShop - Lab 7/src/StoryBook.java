public class StoryBook extends Book{
    protected String category;
    StoryBook(){};
    StoryBook(String isbn, String bookTitle, String authorName, double price, int availableQuantity, String category){
        super(bookTitle,authorName,isbn,price,availableQuantity);
        this.category = category;
    }
    public void setCategory(String category){
        this.category = category;
    }
    public String getCategory(){return category;}

}
