public class Day_3 {

    // static : done
    // function : dekhe ashba
    // while loop : dekhe ashaba
    // if / else
    // for loop : dekhe ashba
    // String init : done

    static String name = "Tonmoy";
    static String name2 = "Tonmoy";
    static String name3 = "Tonmoy Dey";

    static String name_init = new String("Tonmoy");  // explicit initialization of a string
    static String name_init1 = new String("Tonmoy");  // explicit initialization of a string
    static String name_init2 = new String("Tonmoy");  // explicit initialization of a string

    // String = class
    // name = object reference
    // == : memory location

    public static void main(String[] args) {
        System.out.println(name==name2);
        System.out.println(name_init1==name_init2); // == checks memory location

        System.out.println(name.equals(name2)); // equals() = checks string
        System.out.println(name_init1.equals(name_init2));

        System.out.println(name.charAt(2));
        System.out.println(name.indexOf('n'));
        System.out.println(name.toUpperCase());
        System.out.println(name.length());
        System.out.println(name3.substring(7,10)); // \0 ----- // Tonmoy = {'T','o','n','m','o','\0','y',};
                                                        //name3.substring(1,5); // o n m o


        int small = 10;
        int big = 20;

        if(small<big) System.out.println(small);
        else System.out.println(big);

        if(small==big) System.out.println("same");
        else System.out.println("Not same");

        boolean myTrueBool = true;
        if(myTrueBool) System.out.println("true");
        else System.out.println("False");

//        if(condition converts to boolean expression) {
//            multi line codes
//        }else {
//            multi line of codes
//        }
    }

    // initialize 3 int value and find the maximum and minimum of them using if else statement
    // && ||
}
