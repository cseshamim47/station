
import java.time.LocalDate;
import java.time.temporal.ChronoUnit;

import static java.time.temporal.TemporalAdjusters.firstDayOfYear;
import static java.time.temporal.TemporalAdjusters.lastDayOfYear;


public class Employee {

    String id,name,dob,email,joindate;
    int vacation,sick;

    double vacationLeave = 0,sickLeave = 0;
    public Employee(String id, String name, String dob, String email, String joindate, int vacation, int sick)
    {
        this.id = id;
        this.name = name;
        this.dob = dob;
        this.email = email;
        this.joindate = joindate;
        this.vacation = vacation;
        this.sick = sick;
    }

    public int CalculateVacationLeave()
    {
        LocalDate now = LocalDate.now();
        LocalDate firstDay = now.with(firstDayOfYear());
        LocalDate lastDay = now.with(lastDayOfYear());
        long daysInYear = ChronoUnit.DAYS.between(firstDay, lastDay);

        LocalDate start = LocalDate.parse(joindate);

        long diffInDays = ChronoUnit.DAYS.between(start, lastDay);

        double equation = (double) ((diffInDays + 1) * vacation) /daysInYear;

        return (int) Math.round(equation);
    }

    public int CalculateSickLeave()
    {
        LocalDate now = LocalDate.now();
        LocalDate firstDay = now.with(firstDayOfYear());
        LocalDate lastDay = now.with(lastDayOfYear());
        long daysInYear = ChronoUnit.DAYS.between(firstDay, lastDay);

        LocalDate start = LocalDate.parse(joindate);

        long diffInDays = ChronoUnit.DAYS.between(start, lastDay);

        double equation = (double) ((diffInDays + 1) * sick) /daysInYear;

        return (int) Math.round(equation);
    }



    public void print()
    {
        System.out.println("##### PRINTING EMPLOYEE INFO #####");
        System.out.println("Id : " + this.id);
        System.out.println("Name : " + this.name);
        System.out.println("DOB : " + this.dob);
        System.out.println("Email : " + this.email);
        System.out.println("Joining Date : " + this.joindate);
        System.out.println("Vacation Leave : " + CalculateVacationLeave());
        System.out.println("Sick Leave : " + CalculateSickLeave());
        System.out.println();
    }




}
