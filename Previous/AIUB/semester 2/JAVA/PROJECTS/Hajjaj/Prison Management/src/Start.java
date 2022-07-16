import Declaration.Prisoners;
import Implementations.PrisonersOperation;
import Implementations.Utility;
import jdk.jshell.execution.Util;

import java.util.Scanner;

public class Start {
//    public static int index = 0;
    public static void main(String[] args) {
        Scanner scanner = new Scanner(System.in);

        Prisoners[] prisoners = new Prisoners[100000];

        prisoners[PrisonersOperation.index] = new Prisoners(); // prisoners[0] = new Prisoners();
        prisoners[PrisonersOperation.index].setCellId(PrisonersOperation.cell);
        prisoners[PrisonersOperation.index].setName("Md Shamim Ahmed");
        prisoners[PrisonersOperation.index].setAge("21");
        prisoners[PrisonersOperation.index].setHeight("5'7''");
        prisoners[PrisonersOperation.index].setEyeColor("Black");
        prisoners[PrisonersOperation.index].setPunishmentDuration(10);
        prisoners[PrisonersOperation.index].setAttendance(29);
        PrisonersOperation.cell++;
        PrisonersOperation.index++;

        prisoners[PrisonersOperation.index] = new Prisoners(); // 1
        prisoners[PrisonersOperation.index].setCellId(PrisonersOperation.cell); //2
        prisoners[PrisonersOperation.index].setName("Ahmed md Shamim");
        prisoners[PrisonersOperation.index].setAge("21");
        prisoners[PrisonersOperation.index].setHeight("5'7''");
        prisoners[PrisonersOperation.index].setEyeColor("Black");
        prisoners[PrisonersOperation.index].setPunishmentDuration(10);
        prisoners[PrisonersOperation.index].setAttendance(29);
        PrisonersOperation.cell++; //3
        PrisonersOperation.index++;//2

        for(;;){
            Utility.cls();
            Utility.mainMenu();
            String option = scanner.nextLine();
            if(option.equals("0")) break;
            if(option.equals("1") || option.equals("3")){
                Utility.cls();
                Utility.masterTable();
                System.out.print("                                                                          How many prisoners do you wish to enter : ");
                int numberOfPrisoners = 0;
                    try{
                        numberOfPrisoners = scanner.nextInt();
                    }catch (Exception e){
                        System.out.println("                                                                          Exception occured : "+e);
                        Utility.pause();
                    }

                if(numberOfPrisoners > 0){
                    for (int i = 0; i < numberOfPrisoners; i++){
                        prisoners[PrisonersOperation.index] = new Prisoners(); // 2
                        PrisonersOperation.createPrisoner(prisoners[PrisonersOperation.index]); //prisoners[2]
                        System.out.println();
                    }
                }
            }

            if(option.equals("2")){
                Utility.cls();
                Utility.listTable();
                PrisonersOperation.prisonersDetails(prisoners);
                System.out.println();
                Utility.pause();
            }


            if(option.equals("4")){
                Utility.cls();
                Utility.releasePrisoner();
                System.out.print("                                                                          Enter the cell id : ");
                int cellId = scanner.nextInt();
                PrisonersOperation.deletePrisoner(prisoners, cellId);
            }

            if(option.equals("5")) {
                Utility.cls();
                Utility.editAnEntry();
                System.out.print("                                                                          Enter the cell id : ");
                int cellId = scanner.nextInt();
                scanner.nextLine();
                if(PrisonersOperation.showSinglePrisoner(prisoners,cellId)){
                    System.out.print("                                                                          Are you sure you want to edit this entry? (Y/N)   :  ");
                    String check = scanner.nextLine();
                    if(check.equalsIgnoreCase("y")){
                        PrisonersOperation.editPrisoner(prisoners,cellId);
                    }else continue;
                }

            }

            if(option.equals("6")){
                Utility.cls();
                Utility.singleUser();
                System.out.print("                                                                          Enter the cell id : ");
                int cellId = scanner.nextInt();
                PrisonersOperation.showSinglePrisoner(prisoners,cellId);
            }

            if(option.equals("7")){
                Utility.cls();
                Utility.checkAttMsg();
                PrisonersOperation.checkAttendance(prisoners);
            }
            if(option.equals("8")){
                Utility.cls();
                PrisonersOperation.releasePrisoners(prisoners);
            }
            if(option.equals("9")){
                Utility.cls();
                Utility.aboutUs();
                System.out.println("\n                                                           -------------------------------------------------------");
                Utility.typeWriteSingleTime("   ",                                                                         "PICCHI MAAM");
                System.out.println("\n                                                           -------------------------------------------------------");
                System.out.println("\n");
                Utility.pause();
            }
        }

    }

}
