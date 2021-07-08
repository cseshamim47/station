public class StoryBook extends Book{
    String category;
    StoryBook(){System.out.println("StoryBook empty constructor");}    
    StoryBook(String isbn, String bookTitle, String authorName, double price, int availableQuantity, String category){
        super(isbn,bookTitle,authorName,price,availableQuantity);
        this.category = category;
    }

    public void setCategory(String category) {
        this.category = category;
    }
    public String getCategory() {
        return category;
    }

    public void showDetails()
    {

        System.out.println("Isbn:"+getIsbn());

        System.out.println("Book Title:"+getBookTitle());

        System.out.println("Author Name:"+getAuthorName());

        System.out.println("price:"+getPrice());

        System.out.println("availableQuantity:"+getAvailableQuantity());

        System.out.println("Category : " + getCategory());

    }
}
