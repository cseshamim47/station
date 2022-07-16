package Start;

public class Gym implements MemberOperation, EmployeeOperation {

	public Employee employees[] = new Employee[100];
	public Member members[] = new Member[100];
	
    public boolean insertEmployee(Employee e) 
	{
         boolean flag = false;

        for(int i = 0;i<employees.length;i++)
        {
            if(employees[i] == null)
            {
                employees[i] = e;
                flag = true;
                break;
            }
        }
        return flag;
    }

    public boolean removeEmployee(Employee e) 
	{
        boolean flag = false;

        for(int i = 0;i<employees.length;i++)
        {
            if(employees[i] == e)
            {
                employees[i] = null;
                flag = true;
                break;
            }
        }
        return flag;
    }

    public Employee getEmployee(String empId)
	{
        Employee e = null;
        
        for(int i=0; i<employees.length; i++)
        {
            if(employees[i] != null)
            {
                if(employees[i].getEmpId().equals(empId))
                {
                    e = employees[i];
                    break;
                }
            }
        }
        return e; 
    }

    public void showAllEmployees() 
	{
        System.out.println("\n");
        for(int i=0; i<employees.length; i++)
        {
            if(employees[i] != null)
            {
                System.out.println("Employee Name: "+ employees[i].getName());
                System.out.println("Employee ID: "+ employees[i].getEmpId());
                System.out.println("Employee Address: "+ employees[i].getAddress());
				System.out.println("Employee Salary: "+ employees[i].getSalary());
				System.out.println("Employee DOB: "+ employees[i].getDob());
				System.out.println("Employee Phn No: "+ employees[i].getPhoneno());
                System.out.println();
            } 
        }
        System.out.println("\n");
    }

    public boolean insertCustomer(Member m) 
	{
        boolean flag = false;

        for(int i = 0;i<members.length;i++)
        {
            if(members[i] == null)
            {
                members[i] = m;
                flag = true;
                break;
            }
        }
        return flag;
    }

    public boolean removeCustomer(Member m) 
	{
         boolean flag = false;

        for(int i = 0;i<members.length;i++)
        {
            if(members[i] == m)
            {
                members[i] = null;
                flag = true;
                break;
            }
        }
        return flag;
    }

    public Member getMember(String nid) 
	{
        Member m = null;
        
        for(int i=0; i<members.length; i++)
        {
            if(members[i] != null)
            {
                if(members[i].getMId().equals(nid))
                {
                    m = members[i];
                    break;
                }
            }
        }
        return m;
    }

    public void showAllMember() 
	{
        System.out.println("\n");
        for(int i=0; i<members.length; i++)
        {
            if(members[i] != null)
            {
                System.out.println("Members Name: "+ members[i].getName());
				System.out.println("Members ID: "+ members[i].getMId());
				System.out.println("Members Address: "+ members[i].getAddress());
				System.out.println("Members DOB: "+ members[i].getDob());
				System.out.println("Members Phn No: "+ members[i].getPhoneno());
                System.out.println();
            } 
        }
        System.out.println("\n");
    }
    
}

