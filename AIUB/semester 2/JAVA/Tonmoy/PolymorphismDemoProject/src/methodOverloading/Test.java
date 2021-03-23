package methodOverloading;

import java.util.Scanner;

public class Test {
    public static void showTask1(){
        System.out.println("************************ Task 1 ********************");
        DifferentTypesOfParameter obj1 = new DifferentTypesOfParameter();
        obj1.disp('c');
        obj1.disp(200);
        obj1.disp(true);
        obj1.disp(10.0);
        obj1.disp(5.00);
        obj1.disp("hi");
    }
    public static void showTask2(){
        System.out.println("************************ Task 2 ********************");
        DifferentNumberOfParameter addObj = new DifferentNumberOfParameter();
        addObj.add(5);
        addObj.add(5,5);
        addObj.add(5,5,5);
        addObj.add(5,5,5,5);
        addObj.add(5,5,5,5,5);
    }
    public static void showTask3(){
        System.out.println("************************ Task 3 ********************");
    }
    public static void showTask4(){
        System.out.println("************************ Task 4 ********************");
    }
    public static void showTask5(){
        System.out.println("************************ Task 5 ********************");
    }
    public static void showTask6(){
        System.out.println("************************ Task 6 ********************");
    }
    public static void main(String[] args) {
        mainMenu();
    }

    public static void mainMenu(){
        Scanner input = new Scanner(System.in);
        System.out.println("******************** Main Menu Choose numbers accordingly to show the Tasks ********************");
        System.out.println("1 >>:Task 1");
        System.out.println("2 >>:Task 2");
        System.out.println("3 >>:Task 3");
        System.out.println("4 >>:Task 4");
        System.out.println("5 >>:Task 5");
        System.out.println("6 >>:Task 6");
        System.out.print("Enter your choice (1 / 2 /3 / 4 /5 /6) : ");
        int option = input.nextInt();
        if(option == 1) showTask1();
        if(option == 2) showTask2();
        if(option == 3) showTask3();
        if(option == 4) showTask4();
        if(option == 5) showTask5();
        if(option == 6) showTask6();
        if(option>6 && option <=0)
            System.out.println("Wrong input");
    }
}
