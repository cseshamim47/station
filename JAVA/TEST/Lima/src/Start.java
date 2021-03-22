public class Start {
    public static void main(String[] args) {
        StoryBook obj2 = new StoryBook();
        StoryBook obj1 = new StoryBook("Quran","Allah","1234567910",150.00,105,"Religion");

        TextBook obj4 = new TextBook();
        TextBook obj3 = new TextBook("See Plus Plus","Mcgonor Kobra", "243451342",506.55,255,2021);
        
        obj2.setbookTitle("Serah");
        obj2.setaurtherName("Raindrops Media");
        obj2.setisbn("1234567910");
        obj2.setprice(250.00);
        obj2.setavailableQuantity(502);
        obj2.setCategory("Religion");

        obj4.setbookTitle("Java : easy way to learn OOP");
        obj4.setaurtherName("Lima Akter");
        obj4.setisbn("3452234345");
        obj4.setprice(405.23);
        obj4.setavailableQuantity(140);
        obj4.setStandard(2005);

        obj1.ShowInfo();
        System.out.println(" Cetegory of the book : "+obj1.getCategory());
        obj1.sellQuantity(15);
        System.out.println(" After selling 15 copies, available quantity is : "+ obj1.getavailableQuantity());
        System.out.println();
        obj2.ShowInfo();
        System.out.println(" Cetegory of the book : "+obj1.getCategory());
        obj2.addQuantity(100);
        System.out.println(" After adding 100 copies, available quantity is : "+obj2.getavailableQuantity());

        System.out.println();

        obj3.ShowInfo();
        System.out.println(" Standard : "+obj3.getStandard());
        obj3.sellQuantity(60);
        System.out.println(" After selling 60 copies, available quantity is : "+ obj3.getavailableQuantity());
        System.out.println();
        obj4.ShowInfo();
        System.out.println(" Standard : "+obj4.getStandard());
        obj4.addQuantity(150);
        System.out.println(" After adding 150 copies, available quantity is : "+obj4.getavailableQuantity());
    }



}
