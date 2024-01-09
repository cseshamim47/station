@VeryImportant
public class Cat {
    int legs = 4;

    @VeryImportant
    public void mew()
    {
        System.out.println("I need some food");
    }

    public void info()
    {
        System.out.println("I have " + legs + " legs. They are very soft!");
    }

    @SuppressWarnings("unused")
    public void pet()
    {
        System.out.println("Please pet me!!!");
    }
}
