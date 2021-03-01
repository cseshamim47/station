public class Account
{
    // For encapsulation all variables should be private
    private String userName;
    private String password;
    private String name;
    private int age;
    private String country;
    public static int staticVar;

    static {
        staticVar = 100;
    }
    void printStatic(){
        System.out.println("Static var : " +staticVar);
    }

    public Account(String userName, String password, String name, int age, String country)
    {

        this.userName= userName;
        this.password = password;
        this.name = name;
        this.age = age;
        this.country = country;
    }



    public String getName()
    {
        return name;
    }
    public void setName(String name)
    {
        this.name = name;
    }
    public int getAge()
    {
        return age;
    }
    public void setAge(int age)
    {
        this.age = age;
    }
    public String getCountry()
    {
        return country;
    }
    public void setCountry(String country)
    {
        this.country = country;
    }

}