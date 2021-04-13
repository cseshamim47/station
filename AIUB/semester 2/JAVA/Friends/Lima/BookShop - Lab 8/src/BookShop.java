public class BookShop implements BookShopOperations{
    static int i = 0;
    private String name;
    Book[] books = new Book[100];

    BookShop(){}
    BookShop(String name){ this.name = name; }

    public void setName(String name){
        this.name = name;
    }
    public String getName(){ return name; }


    public boolean insertBook(Book b){
        if(b == null) return false;
        else {
            books[i] = b;
            i++;
            return true;
        }
    }


    public boolean removeBook(Book b){
        if(b == null) return false;
        else {
            for(int i = 0; i<100; i++){
                if(b == books[i]) {
                    books[i] = books[i+1];
                }
            }
            return true;
        }
    }


    public Book searchBook(String isbn){
            for (int i = 0; i < 100; i++) {
             if(books[i] != null){
                 if (books[i].getIsbn().equals(isbn)) {
                     return books[i];
                 }
             }
            }
            return null;
    }

    public void showAllBooks(){
        for (int i = 0; i < 100; i++){
            if(books[i] != null){
                System.out.println(" Shop Name : "+ name);
                books[i].ShowInfo();
                System.out.println();
            }
        }
    }


}
