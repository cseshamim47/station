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

        bookShopObj1.insertBook(storyBookObject1);
        bookShopObj1.insertBook(storyBookObject2);
        bookShopObj1.insertBook(storyBookObject3);
        bookShopObj1.insertBook(storyBookObject4);
        bookShopObj1.insertBook(storyBookObject5);
        bookShopObj1.showAllBooks();
        bookShopObj1.removeBook(storyBookObject1);
        if(bookShopObj1.searchBook("1234567913") != null) bookShopObj1.searchBook("1234567913").ShowInfo();
        else System.out.println("Book not found");
        System.out.println("--------------------------------------------------------------------------");

        bookShopObj1.insertBook(textBookObject1);
        bookShopObj1.insertBook(textBookObject2);
        bookShopObj1.insertBook(textBookObject3);
        bookShopObj1.insertBook(textBookObject4);
        bookShopObj1.insertBook(textBookObject5);
        bookShopObj1.showAllBooks();
        bookShopObj1.removeBook(textBookObject1);
        if(bookShopObj1.searchBook("126") != null) bookShopObj1.searchBook("126").ShowInfo();
        else System.out.println("Book not found");


    }



}
