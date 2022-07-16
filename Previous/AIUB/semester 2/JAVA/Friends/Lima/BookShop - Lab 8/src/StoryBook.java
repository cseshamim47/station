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

    public void showDetails(){
        System.out.println(" Book Title : " + getBookTitle());
        System.out.println(" Author Name : " + getAuthorName());
        System.out.println(" Book isbn No : " + getIsbn());
        System.out.println(" Price of the Book : " + getPrice());
        System.out.println(" Quantity of the Book : " + getAvailableQuantity());

    }

}
