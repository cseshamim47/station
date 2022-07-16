package Buy_A_Ticket;


public class TravelInfo  //// Encapsulation + Inheritance
{
    private double ticketPrice,classPrice,tax,totalPrice;
    private String startPoint,endPoint,availableTime,travelDate,phoneNumber,classType;
    int member;

    public TravelInfo(){}


/////////////************************** SETTER GETTER METHODS*****************************\\\\\\\\\\\\\\\\\


    public void setTicketPrice(double ticketPrice) { this.ticketPrice = ticketPrice*member; }

    public double getTicketPrice() { return ticketPrice; }

    public void setClassPrice(double classPrice) { this.classPrice = classPrice; }

    public double getClassPrice() { return classPrice; }

    public void setTax(double tax) { this.tax = tax; }

    public double getTax() { return tax; }

    public void setMember(int member) { this.member = member; }

    public int getMember() { return member; }

    public void setTotalPrice(double totalPrice) { this.totalPrice = totalPrice; }

    public double getTotalPrice() { return totalPrice; } //// This is main

    public void setStartPoint(String startPoint) { this.startPoint = startPoint; }

    public String getStartPoint() {return startPoint; }

    public void setEndPoint(String endPoint) { this.endPoint = endPoint; }

    public String getEndPoint() { return endPoint;}

    public void setAvailableTime(String availableTime) { this.availableTime = availableTime; }

    public String getAvailableTime() { return availableTime; }

    public void setTravelDate(String travelDate) { this.travelDate = travelDate; }

    public String getTravelDate() { return travelDate;}

    public String getPhoneNumber() { return phoneNumber; }

    public void setPhoneNumber(String phoneNumber) { this.phoneNumber = phoneNumber; }

    public String getClassType() { return classType; }

    public void setClassType(String classType) { this.classType = classType; }

    ////////******************************  CLASS METHODS  ******************************\\\\\\\\\\\\\

    //********* Class price initialization
    public void classSelect(int classSelect) {
        switch(classSelect){

            case 1: {
                classPrice = 200;
                classType = "First Class";
                tax = classPrice + classPrice*(7.0/100);
                break;
            }

            case 2: {
                classPrice =  100;
                classType = "Business Class";
                tax = classPrice*(5.0/100);
                break;
            }

            case 3: {
                classPrice = 0;
                classType = "Economic Class";
                tax = classPrice*(5.0/100);
                break;
            }
            default:{
                System.out.println("Enter a Valid Number !");
                break;
            }


        }

    }

    ////************ Checking Location is available or not
    public int travelLocation(String location){
        switch (location){

            case "Dhaka":
            {
//                System.out.println("Match Found !");
                ticketPrice = 200;
                return 1;
            }
            case "Rajshahi":
            {
//                System.out.println("Match Found !");
                ticketPrice = 500.1;
                return 1;
            }
            case "Khulna":
            {
//                System.out.println("Match Found !");
                ticketPrice = 800.1;
                return 1;
            }
            case "Barishal":
            {
//                System.out.println("Match Found !");
                ticketPrice = 400.1;
                return 1;
            }
            case "Chittagong":
            {
//                System.out.println("Match Found !");
                ticketPrice = 800.2;
                return 1;
            }
            case "Sylhet":
            {
//                System.out.println("Match Found !");
                ticketPrice = 500.2;
                return 1;
            }
            case "Mymensingh":
            {
//                System.out.println("Match Found !");
                ticketPrice = 400.2;
                return 1;
            }
            case "Rangpur":
            {
//                System.out.println("Match Found !");
                ticketPrice = 700;
                return 1;
            }
            default:
            {
                System.out.println("                                                            Train is not available in this area !!");
                return 0;
                //System.exit(0);
            }




        }

    }

    ////************ Checking Available Time
    public void selectAvailableTime(int time){
        switch (time) {
            case 1:{availableTime = "8:00 AM";break;}
            case 2:{availableTime = "12:00 PM";break;}
            case 3:{availableTime = "8:00 PM";break;}
            default:{ System.out.println("Invalid Option");break; }
        }


    }

    ////************ Calculating Total Cost
    public double trainPayment(TrainInfo train){ /// Associastion

        totalPrice = (train.getAcCost()+classPrice+ticketPrice+tax)*member;

     return totalPrice;
    }

     /*
    public double busPayment(BusInfo bus){

        totalPrice = bus.getAcCost()+getClassPrice()+getTicketPrice()+getTax();

        return totalPrice;
    }

    public double busPayment(PlaneInfo plane){

        totalPrice = plane.getFoodCost()+getClassPrice()+getTicketPrice()+getTax();

        return totalPrice;
    }
     */







}
