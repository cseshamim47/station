package Start;

public interface EmployeeOperation {
    boolean insertEmployee(Employee e);
    boolean removeEmployee(Employee e);
    Employee getEmployee(String empId);
    void showAllEmployees( );
 
}
