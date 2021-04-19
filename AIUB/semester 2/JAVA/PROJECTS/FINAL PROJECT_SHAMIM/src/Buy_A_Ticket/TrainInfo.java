package Buy_A_Ticket;

import java.io.*;
import java.util.Scanner;

public class TrainInfo implements IVehicle /// Interface + Abstraction + Polymorphism
{
    private String vehicleName;
    private String vehicleType;
    private String vehicleNo;
    private String seatNo;
    private String food;
    private String ac;
    private double acCost;
    private double foodCost;
    protected String code;

    public TrainInfo(){}

    TrainInfo[] objArr = new TrainInfo[100];

    public void insertTrainInfo(TrainInfo obj){
        for(int i = 0; i < objArr.length; i++){
            if(objArr[i] == null){
                objArr[i] = obj;
                break;
            }
        }
    }

    public void verifyTicket(String code){
        for(int i = 0; i < objArr.length; i++){
            if (objArr[i] != null && code.equals(objArr[i].getCode())) {
//                System.out.print("                                                    Train Name      : "+objArr[i].getVehicleName()+"     Seat No        : "); for (int k=0;k<member;k++){ System.out.print(seats[k]+" "); }
//                System.out.println("                                                                                                          Departure Date  : "+ti.getTravelDate()+"               Departure Time : "+ti.getAvailableTime());
//                System.out.println("                                                    Departure From  : "+ti.getStartPoint()+"                 Destination     : "+ti.getEndPoint());
//                System.out.println("                                                    AC/Non-AC       : "+train.getAc()+"                    Passengers         : "+ti.getMember());
//                System.out.println("                                                    Ticket Price    : "+ti.getTicketPrice()+"                 Total Cost     : "+ti.getTotalPrice());
//                System.out.println("                                                    Class           : "+ti.getClassType()+"        Verification Code : "+ti.getPhoneNumber());
            }
        }
    }
    public void setCode(String code){
        this.code = code;
    }
    public String getCode(){
        return code;
    }


    ///////******************************** SETTER METHODS *****************************************\\


    //////******************  Inherited from Vehicle class ********************\\
    public void setVehicleName(String vehicleName) { this.vehicleName = vehicleName; }

    public void setVehicleType(String vehicleType) { this.vehicleType = "TRAIN"; }

    public void setVehicleNo(String vehicleNo) { this.vehicleNo = vehicleNo; }

    //////******************   TrainInfo class ********************\\

    public void setSeatNo(String seatNo) { this.seatNo =seatNo; }

    public void setFood(String food) { this.food =food; }

    public void setAc(String ac) { this.ac =ac; }

    public void setAcCost(double acCost) { this.acCost =acCost; }

    public void setFoodCost(double foodCost) { this.foodCost =foodCost; }



    ///////******************************** GETTER METHODS *****************************************\\



    public String getVehicleName() { return vehicleName; }

    public String getVehicleType() { return vehicleType; }

    public String geVehicleNo() { return vehicleNo; }

    //////******************   TrainInfo class ********************\\

    public String getSeatNo() { return seatNo; }

    public String getFood() { return food; }

    public String getAc() { return ac; }

    public double getAcCost() { return acCost; }

    public double getFoodCost() { return foodCost; }



    //////******************   TrainInfo class OWN METHODS ********************\\

    public void showTrainList() {
        ///// 8 DIVISION MAIL TRAINS
        try {

           /*
              //***************** Write From File ****************************************\\
            BufferedWriter bw = new BufferedWriter(new FileWriter("E:\\TrainList.txt"));
            bw.write("username ");
            bw.write("I AM ");
            bw.write("Yaarian");
            bw.close();
           */

            //***************** Reading Train Names From File ****************************************\\
            BufferedReader br = new BufferedReader(new FileReader("Database/TrainList.txt")); /// FileReader er kaj Location Read kora
            //BufferedReader er kaj file er content read kora
            String trainName;
            while ((trainName = br.readLine()) != null) {
                System.out.println("                                                                      " + trainName);
            }
            br.close();
        } catch (Exception e) {
            System.out.println();
        }

        }


    //***************** Reading Train Seat Plan From File ****************************************\\

       public void showTrainSeatPlan() {

          try {

              //***************** Reading Train Seat Plan From File ****************************************\\
            BufferedReader br = new BufferedReader(new FileReader("DataBase/Seatplan.txt"));

            String trainSeat1;
            //String trainSeat2  ;
           // String trainSeat3  ;
            //String trainSeat4  ;

            while ((trainSeat1 = br.readLine()) != null) {
                System.out.println("                                                                       "+trainSeat1);
            }
            br.close();
        } catch (Exception e) {
            System.out.println();
        }

    }

    //***************** Showing The seat that I,ve selected ****************************************\\

    public void showMySeat(String[] seats,int n) {
        String seat[][] = new String[9][4];
        seat[0][0] = "1A";seat[0][1] = "2A";seat[0][2] = "3A";seat[0][3] = "4A";
        seat[1][0] = "1B";seat[1][1] = "2B";seat[1][2] = "3B";seat[1][3] = "4B";
        seat[2][0] = "1C";seat[2][1] = "2C";seat[2][2] = "3C";seat[2][3] = "4C";
        seat[3][0] = "1D";seat[3][1] = "2D";seat[3][2] = "3D";seat[3][3] = "4D";
        seat[4][0] = "1E";seat[4][1] = "2E";seat[4][2] = "3E";seat[4][3] = "4E";
        seat[5][0] = "1F";seat[5][1] = "2F";seat[5][2] = "3F";seat[5][3] = "4F";
        seat[6][0] = "1G";seat[6][1] = "2G";seat[6][2] = "3G";seat[6][3] = "4G";
        seat[7][0] = "1H";seat[7][1] = "2H";seat[7][2] = "3H";seat[7][3] = "4H";
        seat[8][0] = "1I";seat[8][1] = "2I";seat[8][2] = "3I";seat[8][3] = "4I";

        //System.out.print("                          ");
        for (int row = 0; row < 9; row++) {
            ///////********* 90 Space Right (Wrong)
            System.out.print("                                                                           "); //// 73 Spaces Right
            for (int col = 0; col < 4; col++) {

                for (int i=0;i<n;i++){
                    if (seat[row][col].equalsIgnoreCase(seats[i])) {
                        seat[row][col] = "**";
                    }
                }
                if (col == 3) {
                        System.out.println(seat[row][col] + " ");
                    } else {
                        if (col == 1) {
                            System.out.print(seat[row][col] + "   ");
                        } else {//col = 0;
                            System.out.print(seat[row][col] + " ");
                        } // else of col == 1
                    } // else of col == 3
                } // col
            } // row
    }



    }// class





