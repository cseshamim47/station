public abstract class Person {
    public String firstName;
    public String lastName;

    public void describeFullName(String firstName){
        this.firstName = firstName;
    }
    public void describeProfession(String lastName){
        this.lastName = lastName;
    }
    public String getFirstName(){ return firstName; }
    public String getLastName(){ return lastName; }

    public static void main(String[] args) {
        Person objRef = new Person() {
            @Override
            public void describeFullName(String firstName) {
                super.describeFullName(firstName);
            }
            public void describeProfession(String lastName){
                super.describeProfession(lastName);
            }
        };

        objRef.describeFullName("Tonmoy Dey");
        objRef.describeProfession("Student");
        System.out.println("First Name : "+objRef.getFirstName());
        System.out.println("Profession : "+objRef.getLastName());
    }

}
