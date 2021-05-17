package SetGet;

//package SetGet;
public class Book {
    private String bName;
    private int bId;
    private String bAuthor;

    public void setbName(String bName) {
        this.bName = bName;
    }

    public void setbId(int bId) {
        this.bId = bId;
    }

    public void setbAuthor(String bAuthor) {
        this.bAuthor = bAuthor;
    }

    public String getbName() {
        return bName;
    }

    public int getbId() {
        return bId;
    }

    public String getbAuthor() {
        return bAuthor;
    }
      
    public void showInfo(){
        System.out.println("Book Name : "+getbName());
        System.out.println("Book ID : "+getbId());
        System.out.println("Book Author : "+getbAuthor());
        System.out.println();
    }
    
}
