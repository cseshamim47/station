public class Officer extends Employee {

    public static final int vacation = 15;
    public static final int sick = 10;
    public Officer(String id, String name, String dob, String email, String joindate)
    {
        super(id,name,dob,email,joindate,vacation,sick);
    }

}
