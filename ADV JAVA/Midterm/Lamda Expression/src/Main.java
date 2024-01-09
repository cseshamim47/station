public class Main {
    public static int count = 0;
    public static void main(String[] args) {

        Cat cat = new Cat();
        cat.print(++count); // normal way
        printHere(cat); // using interface

        printHere( // using Lamda Expression
            (count)->{
                System.out.println("meaww " + count);
            }
        );

//        Printable lambdaPrintable = (count)->System.out.println("meaww " + count);
        Printable lambdaPrintable = count->System.out.println("meaww " + count);
//        printHere(lambdaPrintable); // more cleaner way to do it


//        ###################

    }

    public static void printHere(Printable pr)
    {
        pr.print(++count);
    }
}