public class Start {
    public static void main(String[] args) {

        StoryBook storyBookEmptyObject = new StoryBook();
        StoryBook storyBookObject1 = new StoryBook("Story Book 1","Newton","1234567910",150.00,105,"Religion");
        StoryBook storyBookObject2 = new StoryBook("Story Book 2","Newton","1234567911",150.00,105,"Religion");
        StoryBook storyBookObject3 = new StoryBook("Story Book 3","Newton","1234567912",150.00,105,"Religion");
        StoryBook storyBookObject4 = new StoryBook("Story Book 4","Newton","1234567913",150.00,105,"Religion");
        StoryBook storyBookObject5 = new StoryBook("Story Book 5","Newton","1234567914",150.00,105,"Religion");

        TextBook textBookEmpty = new TextBook();
        TextBook textBookObject1 = new TextBook("Text Book 1","Mcgonor Kobra", "123",506.55,255,2021);
        TextBook textBookObject2 = new TextBook("Text Book 2","Mcgonor Kobra", "124",506.55,255,2021);
        TextBook textBookObject3 = new TextBook("Text Book 3","Mcgonor Kobra", "125",506.55,255,2021);
        TextBook textBookObject4 = new TextBook("Text Book 4","Mcgonor Kobra", "126",506.55,255,2021);
        TextBook textBookObject5 = new TextBook("Text Book 5","Mcgonor Kobra", "127",506.55,255,2021);

        BookShop empty = new BookShop();
        BookShop bookShopObj1 = new BookShop("Bismillah Book Store");

        bookShopObj1.insertStoryBook(storyBookObject1);
        bookShopObj1.insertStoryBook(storyBookObject2);
        bookShopObj1.insertStoryBook(storyBookObject3);
        bookShopObj1.insertStoryBook(storyBookObject4);
        bookShopObj1.insertStoryBook(storyBookObject5);
        bookShopObj1.showAllStoryBook();
        bookShopObj1.removeStoryBook(storyBookObject1);
        if(bookShopObj1.searchStoryBook("1234567913") != null) bookShopObj1.searchStoryBook("1234567913").ShowInfo();

        System.out.println("--------------------------------------------------------------------------");

        bookShopObj1.insertTextBook(textBookObject1);
        bookShopObj1.insertTextBook(textBookObject2);
        bookShopObj1.insertTextBook(textBookObject3);
        bookShopObj1.insertTextBook(textBookObject4);
        bookShopObj1.insertTextBook(textBookObject5);
        bookShopObj1.showAllTextBooks();
        bookShopObj1.removeTextBook(textBookObject1);
        if(bookShopObj1.searchTextBook("200") != null) bookShopObj1.searchTextBook("200").ShowInfo();



//        storyBookEmptyObject.setbookTitle("Serah");
//        storyBookEmptyObject.setaurtherName("Raindrops Media");
//        storyBookEmptyObject.setisbn("1234567910");
//        storyBookEmptyObject.setprice(250.00);
//        storyBookEmptyObject.setavailableQuantity(502);
//        storyBookEmptyObject.setCategory("Religion");
//
//        textBookObject1.setbookTitle("Java : easy way to learn OOP");
//        textBookObject1.setaurtherName("Lima Akter");
//        textBookObject1.setisbn("3452234345");
//        textBookObject1.setprice(405.23);
//        textBookObject1.setavailableQuantity(140);
//        textBookObject1.setStandard(2005);
//
//        storyBookObject1.ShowInfo();
//        System.out.println(" Cetegory of the book : "+storyBookObject1.getCategory());
//        storyBookObject1.sellQuantity(15);
//        System.out.println(" After selling 15 copies, available quantity is : "+ storyBookObject1.getavailableQuantity());
//        System.out.println();
//        storyBookEmptyObject.ShowInfo();
//        System.out.println(" Cetegory of the book : "+storyBookObject1.getCategory());
//        storyBookEmptyObject.addQuantity(100);
//        System.out.println(" After adding 100 copies, available quantity is : "+storyBookEmptyObject.getavailableQuantity());
//
//        System.out.println();

//        textBookObject2.ShowInfo();
//        System.out.println(" Standard : "+textBookObject2.getStandard());
//        textBookObject2.sellQuantity(60);
//        System.out.println(" After selling 60 copies, available quantity is : "+ textBookObject2.getavailableQuantity());
//        System.out.println();
//        textBookObject1.ShowInfo();
//        System.out.println(" Standard : "+textBookObject1.getStandard());
//        textBookObject1.addQuantity(150);
//        System.out.println(" After adding 150 copies, available quantity is : "+textBookObject1.getavailableQuantity());

    }



}
