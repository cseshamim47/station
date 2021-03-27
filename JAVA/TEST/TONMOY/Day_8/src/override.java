public class override extends day_8{
    public int sum = 0;

    override(){
        System.out.println("Child : empty");
    }
    override(int x){
        sum = sum + x;
        System.out.println("Child : integer" + " " + sum);
    }
    // constructor is also a method but it is invoked automatically when a object is created
    // override : different class , same method , same parameter

    static void tonmoy(double salary){
        System.out.println("My salary is " + salary);
        System.out.println("Next month : " + salary*2);
    }

}
