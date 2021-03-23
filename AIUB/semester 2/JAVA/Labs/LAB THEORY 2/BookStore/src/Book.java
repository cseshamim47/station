public class Book {
    private String bookid;
    private String bookname;
    private double price;
    Book(){}
    Book(String bid,String bname,double pri){
        bookid = bid;
        bookname = bname;
        price = pri;
    }
    void setBookid(String bid){
        bookid = bid;
    }
    void setBookName(String bname){
        bookname = bname;
    }
    void setPrice(double pri){
        price = pri;
    }
    String getBookId(){
        return bookid;
    }
    String getBookName(){
        return bookname;
    }
    double getPrice(){
        return price;
    }

}
