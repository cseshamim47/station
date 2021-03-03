public class Hello {

    private void myVar(){
        int x = 10;
    }

    static int y = 10;
    int x = 10;
    int n = 100;

    int mult = x*n;


    public static void main(String[] args){

        System.out.println("Hello Shamim");
        int MyFirstNumber = (10+5) + (10*2);
        int MySecondNumber = 12;
        int MyThirdNumber = 5;
        int total = MyFirstNumber + MySecondNumber + MyThirdNumber;
        int MyLastOne = 1000 - total;
        //System.out.print(MyLastOne);

        // default = visible to package
        // private = visible to the class only
        // public = visible to the world
        // protected = visible to the packages and all subclasses

        int myVar = 10;
        myVar = 1000;
        Hello obj = new Hello();
        obj.myVar();
        Hello obj1 = new Hello();

        obj.y = 100;
        obj1.y = 500;

        obj.x = 1000;
        obj1.x = 5000;
        System.out.println(obj1.x);
        System.out.println(obj.x);

        System.out.println(y);

    }
}
