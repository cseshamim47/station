import java.lang.*;

public class Start

{

    public static void main(String args[])
    {

        StoryBook sBookEmpty = new StoryBook();
        StoryBook sBook1 = new StoryBook("SBN-34756-64374-65764-64756-64785","One Hundred Years of Solitude","Gabriel Garcia Marquez",2540.0,4643,"Romantic");
        sBook1.setCategory("Romantic & Drama");
        System.out.println("\n--------------------\n");
        System.out.println("## STORY BOOK 1 ##");
        sBook1.showDetails();
        int addQ = -1;
        sBook1.addQuantity(addQ);
        if(addQ > 0)
        System.out.println("After adding availableQuantity:"+sBook1.getAvailableQuantity());
    
        
        
        System.out.println("\n--------------------\n");
        System.out.println("## STORY BOOK 2 ##");
        sBookEmpty.setIsbn("SBN-27444-76467-46748-69879-64364");
        sBookEmpty.setBookTitle("The Great Gatsby");
        sBookEmpty.setAuthorName("Scott Fitzgerald");
        sBookEmpty.setPrice(1905.0);
        sBookEmpty.setAvailableQuantity(7296);
        sBookEmpty.setCategory("Movie");
        sBookEmpty.showDetails();
        int sellQ = 8000;
        sBookEmpty.sellQuantity(sellQ);
        if(sellQ > 0)
        System.out.println("After selling - availableQuantity : "+ sBookEmpty.getAvailableQuantity());


        System.out.println("\n--------------------\n");
        TextBook tBookEmpty = new TextBook();
        TextBook tBook1 = new TextBook("SBN-34756-64374-65764-64756-64785","One Hundred Years of Solitude","Gabriel Garcia Marquez",2540.0,4643,2006);
        tBook1.setStandard(2019);
        tBook1.showDetails();




        // Book Books[]=new Book[6];

        // Book b1=new Book();

        // b1.setIsbn("SBN-27444-76467-46748-69879-64364");

        // b1.setBookTitle("The Great Gatsby");

        // b1.setAuthorName("Scott Fitzgerald");

        // b1.setPrice(1905.0);

        // b1.setAvailableQuantity(7296);

        // Book b2 = new Book("SBN-34756-64374-65764-64756-64785","One Hundred Years of Solitude","Gabriel Garcia Marquez",2540.0,4643);


        // Book b3=new Book();

        // b3.setIsbn("SBN-28751-50167-46999-69123-64365");

        // b3.setBookTitle("Effective Java");

        // b3.setAuthorName("Joshua Bloch");

        // b3.setPrice(1954.0);

        // b3.setAvailableQuantity(9756);

        // Book b4 = new Book("SBN-69346-47858-79747-08128-10987","Spring in Action","Craig Walls",1230.0,4223);

        // Book b5 =new Book();

        // b5.setIsbn("SBN-75454-34667-98725-09465-52846");

        // b5.setBookTitle("Gulliver’s Travels");

        // b5.setAuthorName("Jonathan Swift");

        // b5.setPrice(3205.0);

        // b5.setAvailableQuantity(7296);


        // Books[0]=b1;
        // Books[1]=b2;
        // Books[2]=b3;
        // Books[3]=b4;
        // Books[4]=b5;



        // for(int i=0;i<Books.length;i++)
        // {
        //     if(Books[i]!=null)
        //     {
        //         if(i==1) {
        //             System.out.println("-------------------------------");
        //             Books[0].showDetails();
        //             Books[0].addQuantity(245);
        //             System.out.println("Available Quantity After Adding New Products:" + Books[0].getAvailableQuantity());
        //             System.out.println("-------------------------------");
        //             Books[1].showDetails();
        //             Books[1].sellQuantity(342);
        //             System.out.println("Available Quantity After Selling Products:" + Books[1].getAvailableQuantity());
        //             System.out.println("-------------------------------");
        //             Books[2].showDetails();
        //             Books[2].addQuantity(134);
        //             System.out.println("Available Quantity After Adding New Products:" + Books[2].getAvailableQuantity());
        //             System.out.println("-------------------------------");
        //             Books[3].showDetails();
        //             Books[3].sellQuantity(266);
        //             System.out.println("Available Quantity After Selling Products:" + Books[3].getAvailableQuantity());
        //             System.out.println("-------------------------------");
        //             Books[4].showDetails();
        //             Books[4].addQuantity(412);
        //             System.out.println("Available Quantity After Adding New Products:" + Books[4].getAvailableQuantity());
        //         }
        //     }
        //     else
        //     {
        //         System.out.println("--------------------------------");
        //         System.out.println("No Books Available in["+i+"]");
        //     }
        // }

    }
}