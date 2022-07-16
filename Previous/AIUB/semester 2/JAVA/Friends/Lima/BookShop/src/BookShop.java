public class BookShop {
    static int i = 0;
    private String name;
    TextBook textBook[] = new TextBook[100];
    StoryBook storyBook[] = new StoryBook[100];

    BookShop(){}
    BookShop(String name){ this.name = name; }

    public void setName(String name){
        this.name = name;
    }
    public String getName(){ return name; }

    boolean insertTextBook(TextBook tb){
        if(tb == null) return false;
        else {
            textBook[i] = tb;
            i++;
            return true;
        }
    }

    boolean insertStoryBook(StoryBook sb){
        if(sb == null) return false;
        else {
            storyBook[i] = sb;
            i++;
            return true;
        }
    }

    boolean removeTextBook(TextBook tb){
        if(tb == null) return false;
        else {
            for(int i = 0; i<100; i++){
                if(tb == textBook[i]) {
                    textBook[i] = textBook[i+1];
                    break;
                }
            }
            return true;
        }
    }

    boolean removeStoryBook(StoryBook sb){
        if(sb == null) return false;
        else {
            for(int i = 0; i<100; i++){
                if(sb == storyBook[i]) {
                    storyBook[i] = storyBook[i+1];
                }
            }
            return true;
        }
    }


    TextBook searchTextBook(String isbn){
            for (int i = 0; i < 100; i++) {
             if(textBook[i] != null){
                 if (textBook[i].getisbn().equals(isbn)) {
                     return textBook[i];
                 }
             }
            }
            return null;
    }


    StoryBook searchStoryBook(String isbn){
        try {
            for (int i = 0; i < 100; i++) {

                if (storyBook[i]!=null && storyBook[i].getisbn().equals(isbn)){
                    return storyBook[i];
                }
            }
            return null;
        }
        catch(NullPointerException e)   {
            System.out.print("No Book Found");
            return null;
        }
    }

    public void showAllTextBooks(){
        for (int i = 0; i < 100; i++){
            if(textBook[i] != null){
                System.out.println(" Shop Name : "+ name);
                textBook[i].ShowInfo();
                System.out.println(" Standard : "+ textBook[i].getStandard());
                System.out.println();
            }
        }
    }

    public void showAllStoryBook(){
        for (int i = 0; i < 100; i++){
            if(storyBook[i] != null){
                System.out.println(" Shop Name : "+ name);
                storyBook[i].ShowInfo();
                System.out.println(" Catagory : "+ storyBook[i].getCategory());
                System.out.println();
            }
        }
    }


}
