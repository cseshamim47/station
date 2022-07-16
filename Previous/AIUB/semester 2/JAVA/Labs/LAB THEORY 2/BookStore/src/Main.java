public class Main {

    public static void main(String[] args) {
	    Book b1 = new Book();
	    b1.setBookid("1001drama");
	    b1.setBookName("Dorjar Opashe");
	    b1.setPrice(180.00d);

	    Book b2 = new Book("1002drama","Opekkha",190.00d);

        System.out.println("Book id is : "+b1.getBookId());
        System.out.println("Book name is : "+b1.getBookName());
        System.out.println("Price is : "+b1.getPrice()+" taka");

        System.out.println("Book id is : "+b2.getBookId());
        System.out.println("Book name is : "+b2.getBookName());
        System.out.println("Old Price is : "+b2.getPrice()+" taka");

        b2.setPrice(210.00d);
        System.out.println("New Price is : "+b2.getPrice()+" taka");

    }
}
