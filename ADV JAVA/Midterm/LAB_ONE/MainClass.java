import java.sql.SQLOutput;
import java.time.temporal.ChronoUnit;
import java.util.ArrayList;
import java.util.Scanner;

import java.time.LocalDate;
import static java.time.temporal.TemporalAdjusters.firstDayOfYear;
import static java.time.temporal.TemporalAdjusters.lastDayOfYear;


public class MainClass {
    public static void main(String[] args) {

        Employee emp;
        ArrayList<Employee> list =  new ArrayList<>();
        Scanner in = new Scanner(System.in);
        int User = 1;
        while(true)
        {
            System.out.println("\nPress one of the following option(1/2/3) and hit enter.");
            System.out.println("1. Officer Type Input\n2. Staff Type Input\n3. Exit & Print All Employee Info");

            System.out.print("Option : ");
            int option = in.nextInt();

            if(option == 3) break;
            System.out.println("###### Input User " + (User++) + " Information ###### ");


            in.nextLine();
            System.out.print("Enter your ID : ");
            String id = in.nextLine();
            System.out.print("Enter your Name : ");
            String name = in.nextLine();
            System.out.print("Enter your DOB (yyyy-mm-dd) : ");
            String dob = in.nextLine();
            System.out.print("Enter your Email : ");
            String email = in.nextLine();
            System.out.print("Enter your joining date (yyyy-mm-dd) : ");
            String joinDate = in.nextLine();

            if(option == 1)
            {
                emp = new Officer(id,name,dob,email,joinDate);
                list.add(emp);
                emp.print();
            }else if(option == 2)
            {
                emp = new Staff(id,name,dob,email,joinDate);
                list.add(emp);
                emp.print();
            }
        }

        System.out.println("#### Printing All Employee Info Below ####");
        for(var x : list)
        {
            x.print();
        }

    }
}
