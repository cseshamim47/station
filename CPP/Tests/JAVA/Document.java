
package Tests.JAVA;


public class Document {

    String authors[] = new String[10];
    String date = "27-Jul-21";

    public String getAuthors() {
        for(int i = 0; i < 10; i++){
            if(authors[i] != null)
                System.out.println("Author "+ (i+1) + " : " + authors[i]);
            else break;
        }
        return null;
    }
    public void addAuthors(String name) {
        for(int i = 0; i < 10; i++){
            if(authors[i] == null){
                authors[i] = name;
                break;
            }
        }
    }
    public String getDate() {
        return date;
    }
    public static void main(String[] args) {
        Document obj = new Document();
        obj.addAuthors("Harry Potter");
        obj.addAuthors("Harry Potter");
        obj.addAuthors("Harry Potter");
        obj.addAuthors("Harry Potter");
        obj.getAuthors();
        System.out.println(obj.getDate());       
    }
}
