 
import java.util.Scanner;
import java.io.File;

public class TravelLocation 
{
    Scanner input = new Scanner(System.in);
    double travelCost;
    String start,end;
    int startInt,endInt;

    public void startLocation()
    {
        locations();
        System.out.print("           Enter Starting Point(number) : ");
        for(;;){
            start = input.nextLine();
            try{
                startInt = Integer.parseInt(start);
                if(startInt>=1 && startInt <= 22 ) break;
                else System.out.print("           Enter valid Starting Point(number) : ");
            }catch (Exception e){
                System.out.print("           Enter valid Starting Point(number) : ");
            }
        }
        //return start;
    }
    
    public void endLocation()
    {
        locations();
        System.out.print("           Enter Destination Point(number) : ");
        for(;;){
            end = input.nextLine();
            try{
                endInt = Integer.parseInt(end);
                if(endInt>=1 && endInt <= 22 ) break;
                else System.out.print("           Enter valid Destination Point(number) : ");
            }catch (Exception e){
                System.out.print("           Enter valid Destination Point(number) : ");
            }
        }
        //return end;
    }
    public double travelCost()
    {
        if(endInt==startInt) { return travelCost = 200; }
        else{
            if(endInt >= 1 && endInt<5) travelCost = 600;
            else if(endInt >= 5 && endInt<10) travelCost = 800;
            else if(endInt >= 10 && endInt <17) travelCost = 900;
            else if(endInt >= 17 && endInt < 23) travelCost = 1100;
            return travelCost;
        }
    }


    public static void locations(){
        try
        {
            File file = new File("DataBase/TravelLocation.txt");
            Scanner scanner = new Scanner(file);
            while(scanner.hasNext())
            {
                String zilla = scanner.next();
                if(zilla.equals("#")){
                    System.out.println();
                    continue;
                }
                System.out.print(zilla + " ");
            }
            scanner.close();
        }
        catch(Exception ignored){}
    }

}
