public class StoryBook extends BookClass{
    protected String category;
    StoryBook(){};
    StoryBook(String bookTitle, String authorName, String isbn, double price, int availableQuantity,String category){
        super(bookTitle,authorName,isbn,price,availableQuantity);
        this.category = category;
    }

    public void setCategory(String category){
        this.category = category;
    }
    public String getCategory(){return category;}

}
