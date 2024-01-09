public class Staff extends Employee{

    public static final int vacation = 10;
    public static final int sick = 7;
    public Staff(String id, String name, String dob, String email, String joindate)
    {
        super(id,name,dob,email,joindate,vacation,sick);
    }
}
