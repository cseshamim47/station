public class Library {
    public String name;
    public String address;
    public Book book[];
    public Library(){};
    public Library(String name, String address,Book book[]){
        this.name = name;
        this.address = address;
        this.book = book;
    };

    public void show(){
        System.out.println(name);
        System.out.println(address);
        System.out.println(book);
    }

}
