package Implementations;
import Declaration.*;
import jdk.jshell.execution.Util;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.util.Scanner;

public class PrisonersOperation{

    public static File file;
    public static FileWriter fileWriter;
    public static FileReader fileReader;
    public static BufferedReader bufferedReader;

    public static int cell = 1; //2
    public static int index = 0; //1

    public static void createPrisoner(Prisoners prisoners){
        Scanner scanner = new Scanner(System.in);

        System.out.println("                                                                          Prisoner cell number : " + cell);

        System.out.print("                                                                          Enter name : ");
        String name = scanner.nextLine();

        System.out.print("                                                                          Enter age : ");
        String age = scanner.nextLine();

        System.out.print("                                                                          Height : ");
        String height = scanner.nextLine();

        System.out.print("                                                                          Eye Color : ");
        String eyeColor = scanner.nextLine();

        System.out.print("                                                                          Punishment Duration in years(must be numeric value > 0) : ");
        double punishmentDuration = scanner.nextDouble();

        System.out.print("                                                                          Set Attendance in days (must be numeric value > 0) : ");
        int attendance = scanner.nextInt();

        ///////////////////////////////////////////////////

        prisoners.setCellId(cell);
        prisoners.setName(name);
        prisoners.setAge(age);
        prisoners.setHeight(height);
        prisoners.setEyeColor(eyeColor);
        prisoners.setPunishmentDuration(punishmentDuration);
        prisoners.setAttendance(attendance);

        cell++;
        index++;

        System.out.print("                                                                          Prisoner added successfully!!!!");
        Utility.pause();
    }

    public static void prisonersDetails(Prisoners[] prisoners){
        Utility.firstRow();
        for(int i = 0; i <=index; i++){
            if(prisoners[i] != null){
                System.out.println("                                "+prisoners[i].getCellId()
                        +"\t   "+prisoners[i].getName()+"      "+prisoners[i].getAge()
                        +"\t   "+prisoners[i].getHeight()+"\t\t"+prisoners[i].getEyeColor()
                        +"\t      "+prisoners[i].getPunishmentDuration()+" Years\t\t     "
                        +prisoners[i].getAttendance()+" days");
            }
        }
    }
    
    public static boolean showSinglePrisoner(Prisoners[] prisoners,int cellId){
        cellId = cellId - 1;
        Utility.firstRow();
        if(prisoners[cellId] != null){
            System.out.println("                                "+prisoners[cellId].getCellId()
                    +"\t   "+prisoners[cellId].getName()+"      "+prisoners[cellId].getAge()
                    +"\t   "+prisoners[cellId].getHeight()+"\t\t"+prisoners[cellId].getEyeColor()
                    +"\t      "+prisoners[cellId].getPunishmentDuration()+" Years\t\t     "
                    +prisoners[cellId].getAttendance()+" days");

            Utility.pause();
            return true;
        }else{
            System.out.println("\n                                                                          No prisoner record found");
            Utility.pause();
            return false;
        }

    }

    public static void deletePrisoner(Prisoners[] prisoners,int cellId){
        int count = 0;
        for(int i = cellId-1; i <= index; i++){
            if(prisoners[i] != null){
                prisoners[i].setCellId(prisoners[i].getCellId()-1);
                prisoners[i] = prisoners[i+1];
                count++;
            }
        }
        if(count > 0){
            index--;
            System.out.println("                                                                          Sucessfully released the prisoner!!");
        }
        else System.out.println("                                                                          No such cell id found!!");
        Utility.pause();
    }

    public static void editPrisoner(Prisoners[] prisoners, int cellId){
        Scanner scanner = new Scanner(System.in);
        cellId = cellId - 1;
        for(;;){
            Utility.editPrisonerOptions();
            String option = scanner.nextLine();
            if(option.equals("0")) break;
            if(option.equals("1")){
                System.out.println("                                                                          Previous name : " + prisoners[cellId].getName());
                System.out.print("                                                                          Set New name : ");
                prisoners[cellId].setName(scanner.nextLine());
            }
            if(option.equals("2")){
                System.out.println("                                                                          Previous age : " + prisoners[cellId].getAge());
                System.out.print("                                                                          Set New age : ");
                prisoners[cellId].setAge(scanner.nextLine());
            }
            if(option.equals("3")){
                System.out.println("                                                                          Previous height : " + prisoners[cellId].getHeight());
                System.out.print("                                                                          Set New height : ");
                prisoners[cellId].setHeight(scanner.nextLine());
            }
            if(option.equals("4")){
                System.out.println("                                                                          Previous eye color : " + prisoners[cellId].getEyeColor());
                System.out.print("                                                                          Set New eye color : ");
                prisoners[cellId].setEyeColor(scanner.nextLine());
            }
            if(option.equals("5")){
                System.out.println("                                                                          Previous punishment duration : " + prisoners[cellId].getName());
                System.out.print("                                                                          Set New punishment duration : ");
                prisoners[cellId].setPunishmentDuration(scanner.nextDouble());
            }
            System.out.print("                                                                          Do you want to edit again? (Y/N) " );
            if(scanner.nextLine().equalsIgnoreCase("y")) continue;
            else break;
        }

    }

    public static void checkAttendance(Prisoners[] prisoners){
        Scanner scanner = new Scanner(System.in);
        System.out.println();
        System.out.println("                                                      " +
                "Cell-No\t   Name\t\t\tPunishment Duration     Attendance\n");
        System.out.println();
        for(int i = 0; i <= index; i++) {
            if (prisoners[i] != null) {
                System.out.println("                                                      "
                        + prisoners[i].getCellId() + "\t\t   " + prisoners[i].getName()
                        + "      " + prisoners[i].getPunishmentDuration() + " Years\t\t"
                        + prisoners[i].getAttendance() + " days");
            }
        }
        System.out.println();
        System.out.print("                                                          Do you want to decrese punishment Duration? (Y/N) : ");
        String confirmation = scanner.nextLine();
        int cellId;
        if(confirmation.equalsIgnoreCase("y")){
            System.out.print("                                                          Enter cell no : ");
            cellId = scanner.nextInt();
            cellId = cellId - 1;
            if(prisoners[cellId] != null){
                System.out.print("                                                          Enter how many years do you want to decrease : ");
                double decrease = scanner.nextDouble();
                if(prisoners[cellId].getPunishmentDuration() - decrease >= 0){
                    prisoners[cellId].setPunishmentDuration(prisoners[cellId].getPunishmentDuration() - decrease); //setPunishmentDuration(0);
                    System.out.println("                                                          Operation Successfull!!");
                }else System.out.println("                                                          Operation Failed!! ( Decrease duration <= Current punishment duration )");
                System.out.println();
//                Utility.cls();
                Utility.singleUser();
                showSinglePrisoner(prisoners,cellId+1);
//                Utility.pause();
            }
        }
    }
    
    public static void releasePrisoners(Prisoners[] prisoners){
        Scanner scanner = new Scanner(System.in);
        Utility.releasePrisoner();
        int availableToRelease = 0;
        Utility.firstRow();
        for(int i = 0; i <= index; i++){
            if(prisoners[i] != null && prisoners[i].getPunishmentDuration() == 0){
                System.out.println("                                "+prisoners[i].getCellId()
                        +"\t   "+prisoners[i].getName()+"      "+prisoners[i].getAge()
                        +"\t   "+prisoners[i].getHeight()+"\t\t"+prisoners[i].getEyeColor()
                        +"\t      "+prisoners[i].getPunishmentDuration()+" Years\t\t     "
                        +prisoners[i].getAttendance()+" days");
                availableToRelease++;
            }
        }
        System.out.println();
        System.out.println("                                                                          Found : "
        +availableToRelease+" prisoner to release");
        if(availableToRelease > 0) {
            System.out.print("                                                                          Enter cell id to remove : ");
            int cellId = scanner.nextInt();
            if (prisoners[cellId - 1] != null && prisoners[cellId - 1].getPunishmentDuration() == 0) {
                String releasedPrisoner = prisoners[cellId-1].getCellId()
                        +"\t   "+prisoners[cellId-1].getName()+"      "+prisoners[cellId-1].getAge()
                        +"\t   "+prisoners[cellId-1].getHeight()+"\t\t"+prisoners[cellId-1].getEyeColor()
                        +"\t      "+prisoners[cellId-1].getPunishmentDuration()+" Years\t\t     "
                        +prisoners[cellId-1].getAttendance()+" days";
                writeInFile(releasedPrisoner);
                deletePrisoner(prisoners, cellId);
            } else{
                System.out.println("                                                                          Something went wrong!! Try again.");
                Utility.pause();
            }
        } else{
            System.out.println("                                                                          Something went wrong!! Try again.");
            Utility.pause();
        }
    }

    public static void writeInFile(String releasedPrisoner){
        try{
            file = new File("Released.txt");
            file.createNewFile();
            fileWriter = new FileWriter(file, true);
            fileWriter.write(releasedPrisoner+"\r"+"\n");
            fileWriter.flush();
            fileWriter.close();
        }catch (Exception ignored){ }
    }

}
