public class Main
{
    public static void main(String args[])
    {
        // create an array
        int[] age = {12, 4, 5};

        // loop through the array
        // using for loop
        System.out.println("Using for Loop:");
        for(int i = 0; i < age.length; i++)
        {
            System.out.println(age[i]);
        }
        Account obj = new Account("javagoal", "myblog", "Ram", 27, "India");

        // Here we can update variable those have setter

        System.out.println("Name : "+ obj.getName());
        System.out.println("Age : "+ obj.getAge());
        System.out.println("Country : "+ obj.getCountry());
        System.out.println(Account.staticVar);
        obj.printStatic();

    }

}