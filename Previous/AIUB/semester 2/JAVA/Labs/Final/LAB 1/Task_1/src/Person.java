public class Person extends Human{
    private String name;
    private String gender;
    private int age;
    Person(){}
    Person(String type,String name, String gender, int age){
        super(type);
        this.name = name;
        this.gender = gender;
        this.age = age;
    }

    public void setName(String name){
        this.name = name;
    }
    public void setGender(String gender){
        this.gender = gender;
    }
    public void setAge(int age){
        this.age = age;
    }
    public String getName(){return name;}
    public String getGender(){return gender;}
    public int getAge(){return age;}

}
